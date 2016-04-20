<?
class Establecimiento extends ActiveRecord\Model
{
	// tipos de establecimiento
	const GENERADOR = 1;
	const TRANSPORTISTA = 2;
	const OPERADOR = 3;
	const EMPRESA_NAVIERA = 4; // es un generador, pero con este id logico sabemos que tenemos que comparar la columna empresa_naviera

	static $table_name = 'establecimientos';

	static $has_many = array(
		array('vehiculos', 'class_name' => 'Vehiculo'),
		array('permisos_establecimientos', 'class_name' => 'PermisoEstablecimiento'),
		array('establecimientos_favoritos', 'class_name' => 'EstablecimientoFavorito'),
	);

	static $belongs_to = array(
		array('empresa'),
	);

	static $validates_presence_of = array(
		array('nombre', 'message' => 'Debe indicar el nombre del Establecimiento.'),
		array('calle', 'message' => 'Debe indicar la calle.'),
		array('email', 'message' => 'Debe indicar una direcci&oacute;n de correo electr&oacute;nico.'),
		array('codigo_postal', 'message' => 'Debe indicar el c&oacute;digo postal.')
	);

	// doc: http://www.phpactiverecord.org/projects/main/wiki/Validations#validates_numericality_of
	static $validates_numericality_of = array(
		array('numero', 'greater_than_or_equal_to' => 0, 'message' => 'Debe indicar el número de la calle.'),
		array('provincia', 'greater_than' => 0, 'message' => 'Debe indicar una provincia.'),
		array('localidad', 'greater_than_or_equal_to' => 0, 'message' => 'Debe indicar una localidad.'),
	);

	public function getErrors()
	{
		$errors = array();
		$errors['nombre'] = $this->errors->on('nombre');
		$errors['provincia'] = $this->errors->on('provincia');
		$errors['localidad'] = $this->errors->on('localidad');
		$errors['calle'] = $this->errors->on('calle');
		$errors['numero'] = $this->errors->on('numero');
		$errors['codigo_postal'] = $this->errors->on('codigo_postal');

		// extra porque el $validates_format_of no es confiable.
		if ( ! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Formato de email inv&aacute;lido";
		}

		return $errors;
	}

	public function obtener_por_cuit($cuit)
	{
		$resultado = array();

		if ($cuit) {

			$query = "
				SELECT est.*
				FROM empresas emp,
				     establecimientos est
				WHERE emp.id = est.empresa_id
				  AND emp.cuit = ? ";

			$resultado = Establecimiento::find_by_sql($query, array($cuit));
		}

		return $resultado;
	}

	/**
	 * El CAA siempre es validado para el TRANS y OPER.
	 * Un GEN puede no tener CAA, pero si lo tiene también checkeamos el flag del config para saber si debemos validarlo.
	 */
	public function caa_expirado()
	{
		$config = new config;
		$validar_caa_generador = $config->getParameters("framework::caa::validar_generador");

		if ($this->tipo == Establecimiento::GENERADOR)
		{
			if ($this->caa_numero AND $this->caa_vencimiento AND $validar_caa_generador) {
				$now = new Datetime('now');
				return ($this->caa_vencimiento < $now);
			} else {
				return false;
			}
		}

		$now = new Datetime('now');
		return ($this->caa_vencimiento < $now);
	}

	public function es_favorito($user)
	{
		$ids_establecimientos_favoritos_del_user = array();
		foreach ($user->establecimientos_favoritos as $fav) {
			$ids_establecimientos_favoritos_del_user[] = $fav->establecimiento_favorito_id;
		}

		return in_array($this->id, $ids_establecimientos_favoritos_del_user);
	}

	public function es_alta_temprana()
	{
		return ($this->alta_temprana == 1);
	}

	/**
	 * Verifica que el alta temprana se encuentre entre el lapso de días permitidos por la drp antes de
	 * tener que generar un expediente.
	 */
	public function alta_temprana_habilitada()
	{
		$config = new config;
		$dias_permitidos = $config->getParameters("framework::vencimiento::alta_temprana");

		$today = new Datetime;

		$interval = (int) $this->fecha_creacion->diff($today)->format('%a');
		
		if ($interval > $dias_permitidos) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * @param $tipo_establecimiento	int 	tipo_de_establecimiento a buscar
	 * @param $tipo_manifiesto 		int 	tipo manifiesto para saber si filtrar por alguna Y en especial
	 */
	public function obtener_favoritos($tipo_establecimiento, $tipo_manifiesto)
	{
		$resultado = array();
		$model = new TipoManifiesto;
		$residuos_limitados_a = $model->getResiduosAsArray($tipo_manifiesto);

		if ($tipo_establecimiento) {

			$query = "
				SELECT
				  emp.nombre AS nombre_empresa,
				  emp.cuit,
				  est.id AS establecimiento_id,
				  est.nombre AS nombre_establecimiento,
				  prov.descripcion AS nombre_provincia,
				  loc.descripcion AS nombre_localidad,
				  favs.id AS id_relacion_favorito,
				  est.*

				FROM establecimientos_favoritos favs,
				  establecimientos est,
				  empresas emp,
				  cat_provincias prov,
				  cat_localidades loc";

			if ( ! empty($residuos_limitados_a)) {
				$query .= ", permisos_establecimientos perm";
			}

			$query .= "
				WHERE favs.establecimiento_id = ? # establecimiento en cuestion
				  AND favs.tipo = ?
				  AND est.id = favs.establecimiento_favorito_id
				  AND emp.id = est.empresa_id
				  AND est.provincia = prov.codigo
				  AND est.localidad = loc.codigo
				  AND emp.flag = 't'
				  AND est.alta_temprana = 0";

			if ( ! empty($residuos_limitados_a)) {
				$query .= " 
					AND est.id = perm.establecimiento_id
					AND perm.residuo IN ('".implode("', '", $residuos_limitados_a)."')";
			}

			if ($tipo_establecimiento != Establecimiento::GENERADOR) {
				$query .= " AND (est.caa_vencimiento > now())";
			}

			$query .= "
				GROUP BY est.id
				ORDER BY emp.nombre";

			$resultado = Establecimiento::find_by_sql($query, array($this->id, $tipo_establecimiento));
			// echo self::connection()->last_query;die;
		}

		return $resultado;
	}


	public function getHTMLCambioConstrasenia(){
		$html = '<script>
$("#btn_aceptar_pass").click(function() {

	if ($("#contrasenia").val()!=$("#contrasenia_r").val()) {
		$("#alerta").html("<br><b>Las contrase&ntilde;as no coinciden.</b>");
		return false;
	}

	var data	= new Object();
	data.check 				= "uahsd721gwdsu21ghw7dsgh21wd";
	data.contrasenia	= $("#contrasenia").val();

	$.ajax({
		type: "POST",
		url: "/login/restablecer/index.php",
		data:	data,
		dataType: "json",
		success: function(msg){
			var json_x = msg;
			if (json_x["error"]==true) {
				//cerrar();
				mostrarMensaje("exclamation-triangle","Ocurrio un error al modificar el password.","error");
				return false;
			} else {
				//cerrar();
				mostrarMensaje("exclamation-triangle","El password se modifico correctamente","success");
			}
		}
	});

});
</script>
<div class="backGrey">
		<div >
			<div class="textLeft">CAMBIO DE CONTRASE&Ntilde;A</div>
			<div class="imgCerrar" onclick="cerrar();">
				<img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
			</div>
		</div>
		<div class="clear20"></div>
		<table width="495" border="0" cellspacing="0" cellpadding="5">
			<tr>
				<td width="167" height="25" align="right" bordercolor="#EAEAE5">Nueva Contrase&ntilde;a :</td>
				<td width="318" style="text-align:left;" bordercolor="#EAEAE5"><input type="password" name="contrasenia" id="contrasenia" value=""/></td>
			</tr>
			<tr>
				<td width="167" height="25" align="right" bordercolor="#EAEAE5">Repita la Contrase&ntilde;a :</td>
				<td width="318" style="text-align:left;" bordercolor="#EAEAE5"><input type="password" name="contrasenia_r" id="contrasenia_r" value=""/></td>
			</tr>
		</table>
	<div id="alerta">&nbsp;</div>
	<div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id="btn_aceptar_pass">
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight" id="btn_cancelar" onclick="cerrar();">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>
</div>';
		return $html;
	}

	public function restablecer_pass($hash){

		$esta_hash = EstablecimientoHash::Connection();
		$res_est_hash = EstablecimientoHash::find('first', array('conditions' => array('hash = ? and estado_hash=?', $_GET['v'], 'A')));

		if (!$res_est_hash)
			return array(-1, "El link desde el que esta intentando acceder no es válido.");
		else {

			//obtengo el usuario y hash para comparar
			$res_est = Establecimiento::find('first', array('conditions' => array('id = ?', $res_est_hash->establecimiento_id)));
			if (!$res_est)
				return array(-2, "Ocurrio un error al obtener los datos del usuario.");
			else
			{
				//CAMBIAR EL ESTADO DEL ESTABLECIMIENTO
				$res_est->reset_contrasenia = 'S';
				$res_est->save();
				//CAMBIAR EL ESTADO DEL HASH
				$res_est_hash->estado_hash = 'U';
				$res_est_hash->save();
			}
		}
		return array(1, $res_est->usuario, $res_est->contrasenia);
	}

	/**
	 * Establecimiento::buscarEstablecimientosParaManifiesto()
	 *
	 * @param array $parametros
	 * @return
	 */
	public function buscarEstablecimientosParaManifiesto($cuit, $tipo_establecimiento, $tipo_manifiesto)
	{
		$resultado = array();

		$model = new TipoManifiesto;
		$residuos_limitados_a = $model->getResiduosAsArray($tipo_manifiesto);

		$query = "
			SELECT est.*
			FROM empresas emp,
			     establecimientos est";

		if ( ! empty($residuos_limitados_a)) {
			$query .= ", permisos_establecimientos perm";
		}

		$query .= "
			WHERE emp.id = est.empresa_id
			AND emp.cuit = ?
			AND est.tipo = ?
			AND est.flag = 't' ";

		if ( ! empty($residuos_limitados_a)) {
			$query .= " 
				AND est.id = perm.establecimiento_id
				AND perm.residuo IN ('".implode("', '", $residuos_limitados_a)."')";
		}

		$query .= " GROUP BY est.id";

		$resultado = Establecimiento::find_by_sql($query, array($cuit, $tipo_establecimiento));
		// echo self::connection()->last_query;die;
		return $resultado;
	}

	public function obtener_establecimiento_sin_permisos($cuit)
	{
		$resultado = array();

		if ($cuit) {

			$query = "SELECT est.id, est.nombre, est.calle, est.numero, est.localidad, est.usuario, est.flag
              FROM establecimientos est
              LEFT JOIN permisos_establecimientos pest 
                ON (est.id = pest.establecimiento_id)
              WHERE est.flag = 't'
                AND est.tipo = 1
                AND est.usuario LIKE ? 
                AND pest.residuo IS NULL
                GROUP BY est.id";

 			$resultado = Establecimiento::find_by_sql($query, array($cuit.'%'));
		}

		return $resultado;
	}
	public function get_listado_altas_tempranas($criterio = '')
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$criterio = "%$criterio%";

		// obtenemos total de rows sin paginar
		$count_query = "SELECT count(est.id) as cantidad FROM establecimientos est, empresas emp WHERE est.empresa_id = emp.id AND est.alta_temprana = 1 AND est.flag = 't' AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)";
		$count_obj = Establecimiento::find_by_sql($count_query, array($criterio, $criterio));

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");

		// obtenemos los rows paginados aplicando criterio de busqueda
		$query = "SELECT emp.cuit as cuit,
					emp.nombre as razon_social,
					est.nombre as establecimiento,
					est.id as establecimiento_id,
					est.sucursal as sucursal,
					est.tipo as tipo
			      FROM establecimientos est, empresas emp
			      WHERE est.empresa_id = emp.id
			        AND est.alta_temprana = 1
			        AND est.flag = 't'
			        AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)
			      ORDER BY est.id DESC
			      LIMIT ".$page->limit;

		$altas_tempranas = Establecimiento::find_by_sql($query, array($criterio, $criterio));

		return array($altas_tempranas, $paginate);
	}
}
?>
