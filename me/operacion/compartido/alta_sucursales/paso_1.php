<?php

require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../../global_incs/configuracion/configuracion.php");
require_once("../../../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();

// Compruebo si el establecimiento actual es Tipo 1 (Generador) o Tipo 3 (Operador)
$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];

// Empresa ID
$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];

// Establecimiento ID
$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

$model = new CambioSolicitadoEstablecimiento;
$solicitud = $model->getSolicitud($empresaID, $establecimientoID);

$actividades                 = obtener_actividades();
$categorias                  = obtener_categorias_residuos();
$provincias                  = obtener_provincias();
$localidades                 = Array();
$nomenclatura_catastral_circ = Range(0, 22);
$nomenclatura_catastral_sec  = array_merge(Range(0, 99), Range('A', 'Z'));

$errores = Array();

if ($ROL_ID == 2)
{
	exit("No puede acceder acá");
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$retorno  = array();
	$errores  = array();
	$establecimiento   = array();

	if(empty($_POST['accion'])){
		exit;
	}

	$post_valido = true;

	#validaciones
	if($_POST['accion'] != 'baja'){

		$campos = array(
			'establecimiento_numero'    	  => array('nombre' => 'N&uacute;mero', 'filter' => FILTER_VALIDATE_INT),
			'establecimiento_nombre'          => array('nombre' => 'Nombre',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
//				'tipo'            				  => array('nombre' => 'Tipo de establecimiento',         'filter' => FILTER_VALIDATE_INT),
			'contrasenia'     				  => array('nombre' => 'Contrasenia de gestion',          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'expediente_numero'               => array('nombre' => 'Numero de expediente',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'expediente_anio'                 => array('nombre' => 'A&ntilde;o de expediente',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'establecimiento_actividad'       => array('nombre' => 'Actividad desarrollada',          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'descripcion'                     => array('nombre' => 'Descripcion',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

			'provincia_r'                     => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
			'localidad_r'                     => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),
			'calle_r'                         => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_r'                        => array('nombre' => 'Numeracion (real)',               'filter' => FILTER_VALIDATE_INT),
			'cpostal_r'         			  => array('nombre' => 'C&oacute;digo Postal (real)',     'filter' => FILTER_VALIDATE_INT), 
			
			'latitud_r'                       => array('nombre' => 'Latitud (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'longitud_r'                      => array('nombre' => 'Longitud (real)',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

			'provincia_c'                     => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'localidad_c'                     => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'calle_c'                         => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_c'                        => array('nombre' => 'Numeracion (constituido)',        'filter' => FILTER_VALIDATE_INT),
			'cpostal_c'         			  => array('nombre' => 'C&oacute;digo Postal (constituido)',     'filter' => FILTER_VALIDATE_INT),

			'nomenclatura_catastral_circ'     => array('nombre' => 'Nomenclatura catastral circ',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'nomenclatura_catastral_sec'      => array('nombre' => 'Nomenclatura catastral sec',      'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'habilitaciones'                  => array('nombre' => 'Habilitaciones',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'direccion_email'   			  => array('nombre' => 'Direccion de email', 'filter' => FILTER_VALIDATE_EMAIL)
		);

		if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'] != Establecimiento::GENERADOR) {
			$campos['caa_numero'] = array('nombre' => 'Numero de CAA', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/'));
			$campos['caa_vencimiento'] = array('nombre' => 'Fecha de vencimiento de CAA', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/'));
		}

		if($post_valido){
			$validaciones = filter_input_array(INPUT_POST, $campos);
	
			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}
	}
	#validaciones

	if(!count($errores))
	{
		if($_POST['accion'] == 'alta')
		{
			if (empty($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS']))
			{
				$errores['permisos_establecimientos'] = 'Debe ingresar al menos un permiso para el establecimiento actual.';
			}
			else
			{

				$conexion = CambioEstablecimiento::connection();

				$conexion->transaction();

				try{	

					// Clase de encriptación de contraseña
					$encrypt = new sesion();

					// LLamada a la clase de seguridad, devuelve salt y hash
					$r = $encrypt->getHash("", $_POST['contrasenia']);


					$solicitud->save();

					$cambio = CambioEstablecimiento::create(Array(
						'solicitud_id'					  => $solicitud->id,
						'empresa_id' 					  => $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'],
						'nombre'                          => $_POST['establecimiento_nombre'],
						'usuario'                         => $_POST['usuario'],
						'contrasenia'                     => $r[1], // Contraseña encriptada
						'salt'							  => $r[0], // Salt generado
						'tipo'                            => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'],
						'caa_numero'                      => $_POST['caa_numero'], 
						'caa_vencimiento'                 => convertir_fecha_es_en($_POST['caa_vencimiento']),
						'expediente_numero'               => $_POST['expediente_numero'],
						'expediente_anio'                 => $_POST['expediente_anio'],
						'codigo_actividad'                => $_POST['establecimiento_actividad'], 
						'descripcion'                     => $_POST['descripcion'], 
						'provincia'                       => $_POST['provincia_r'],
						'localidad'                       => $_POST['localidad_r'],
						'calle'                           => $_POST['calle_r'],
						'numero'                          => $_POST['numero_r'],
						'piso'                            => $_POST['piso_r'], 
						'latitud'                         => $_POST['latitud_r'],
						'longitud'                        => $_POST['longitud_r'],
						'provincia_c'                     => $_POST['provincia_c'],
						'localidad_c'                     => $_POST['localidad_c'],
						'calle_c'                         => $_POST['calle_c'],
						'numero_c'                        => $_POST['numero_c'],
						'piso_c'                          => $_POST['piso_c'],
						'codigo_postal'		  		  	  => $_POST['cpostal_r'],			
						'codigo_postal_c'		  		  => $_POST['cpostal_c'],			
						'nomenclatura_catastral_circ'     => $_POST['nomenclatura_catastral_circ'],
						'nomenclatura_catastral_sec'      => $_POST['nomenclatura_catastral_sec'], 
						'nomenclatura_catastral_manz'     => $_POST['nomenclatura_catastral_manz'], 
						'nomenclatura_catastral_parc'     => $_POST['nomenclatura_catastral_parc'], 
						'nomenclatura_catastral_sub_parc' => $_POST['nomenclatura_catastral_sub_parc'], 
						'habilitaciones'                  => $_POST['habilitaciones'],
						'email' 						  => $_POST['direccion_email'],
						'tipo_cambio'                     => 'A',
					));

					foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as $permiso)
					{
						$permiso_ = CambioPermisoEstablecimiento::create(Array(
								'solicitud_id'				=> $solicitud->id,
								'cambio_establecimiento_id' => $cambio->id, 
								'residuo'                	=> $permiso['RESIDUO'], 
								'cantidad'               	=> $permiso['CANTIDAD'], 
								'tipo_cambio'            	=> 'A', 
						));
					}

				$conexion->commit();
				unset($_SESSION['DATOS_ESTABLECIMIENTO']);
			}
			catch (\Exception $e)
			{
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
			}
		}
	}
	}

	$retorno['datos']   = $establecimiento;
	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_SESSION['DATOS_ESTABLECIMIENTO'])){
		$smarty->assign('ACCION', 'modificacion');

		$smarty->assign('ESTABLECIMIENTO', $_SESSION['DATOS_ESTABLECIMIENTO']);

		$punto_inicio = $_SESSION['DATOS_ESTABLECIMIENTO']['CALLE_R'] . " " .$_SESSION['DATOS_ESTABLECIMIENTO']['NUMERO_R'] . ", " . obtener_localidad($_SESSION['DATOS_ESTABLECIMIENTO']['LOCALIDAD_R']) . ", " . obtener_municipio_por_localidad($_SESSION['DATOS_ESTABLECIMIENTO']['LOCALIDAD_R']) . ", " . obtener_provincia($_SESSION['DATOS_ESTABLECIMIENTO']['PROVINCIA_R']) . ", " . " argentina";

		$localidades_r = obtener_localidades($_SESSION['DATOS_ESTABLECIMIENTO']['PROVINCIA_R'], 0);
		$localidades_c = obtener_localidades($_SESSION['DATOS_ESTABLECIMIENTO']['PROVINCIA_C'], 0);

		if(!count($localidades_r)){
			$localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);
		}
		if(!count($localidades_c)){
			$localidades_c = obtener_localidades(2, 0);
		}
	}else{

		$_SESSION['DATOS_ESTABLECIMIENTO'] = Array( 
			'PERMISOS' => Array()
		);

		$localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);
		$localidades_c = obtener_localidades(2, 0);
		$punto_inicio = "av. de mayo 1, ciudad autonoma de buenos aires, argentina";
		$smarty->assign('ACCION', 'alta');
	}

	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('NOMBRE_USUARIO', get_usuario_para_nueva_sucursal());
	$smarty->assign('SUCURSAL', get_nueva_sucursal()); // se creo una nueva función para traer la sucursal
	$smarty->assign('ACTIVIDADES', $actividades);
	$smarty->assign('CATEGORIAS', $categorias);
	$smarty->assign('RESIDUOS', $categorias);
	$smarty->assign('PROVINCIAS', $provincias);
	$smarty->assign('PUNTO_INICIO', $punto_inicio);
	$smarty->assign('LOCALIDADES_R', $localidades_r);
	$smarty->assign('LOCALIDADES_C', $localidades_c);
	$smarty->assign('NOMENCLATURA_CATASTRAL_CIRC', $nomenclatura_catastral_circ);
	$smarty->assign('NOMENCLATURA_CATASTRAL_SEC', $nomenclatura_catastral_sec);
	$smarty->assign('CAMBIOS_PENDIENTES', $cambios_pendientes);
	$smarty->assign('PERFIL', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));

	$smarty->display('operacion/compartido/alta_sucursales/paso_1.tpl');
}

session_write_close();

function get_usuario_para_nueva_sucursal()
{
	$ultimo_id = obtener_id_maximo_establecimiento($_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID']);
	// sumamos 1 para la nueva sucursal
	$ultimo_id = $ultimo_id + 1;
	// hay que tener en cuenta que pueden haber altas pendientes de sucursales. Consultamos para evitar duplicar nombre de usuarios.
	$sql = "SELECT cse.id AS solicitud_id,	ce.id as cambio_id
			FROM cambios_solicitados_establecimientos cse, cambios_establecimientos ce
			WHERE cse.id = ce.solicitud_id
			  AND cse.estado = 'P'
			  AND cse.empresa_id = ? 
			  AND cse.establecimiento_id = ?
			  AND ce.tipo_cambio = 'A'";

	$rows = CambioSolicitadoEstablecimiento::find_by_sql($sql, array($_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']));
	// aumentamos el ultimo_id teniendo en cuenta los cambios de alta de sucursal pendientes.
	$ultimo_id = $ultimo_id + count($rows);

	return $_SESSION['INFORMACION_GENERAL']['EMPRESA']['CUIT'].'/'.$ultimo_id;
	
}
// Nueva funcion para traer la sucursal en relacion al numero de usuario generado
function get_nueva_sucursal()
{
	$ultimo_id = obtener_id_maximo_establecimiento($_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID']);
	// sumamos 1 para la nueva sucursal
	$ultimo_id = $ultimo_id + 1;
	// hay que tener en cuenta que pueden haber altas pendientes de sucursales. Consultamos para evitar duplicar nombre de usuarios.
	$sql = "SELECT cse.id AS solicitud_id,	ce.id as cambio_id
			FROM cambios_solicitados_establecimientos cse, cambios_establecimientos ce
			WHERE cse.id = ce.solicitud_id
			  AND cse.estado = 'P'
			  AND cse.empresa_id = ? 
			  AND cse.establecimiento_id = ?
			  AND ce.tipo_cambio = 'A'";

	$rows = CambioSolicitadoEstablecimiento::find_by_sql($sql, array($_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']));
	// aumentamos el ultimo_id teniendo en cuenta los cambios de alta de sucursal pendientes.
	$ultimo_id = $ultimo_id + count($rows);

	return $ultimo_id;
	
}

?>