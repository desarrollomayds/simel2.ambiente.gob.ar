<?
/**
 * errorhandler()
 *
 * Con esta funcion caputarmos todos los Fatal error del sistema usando try cath
 *
 * @param mixed $errno
 * @param mixed $errstr
 * @param mixed $errfile
 * @param mixed $errline
 * @return
 */
function errorhandler($errno, $errstr, $errfile, $errline) {
	if ( E_RECOVERABLE_ERROR===$errno ) {
		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
		return true;
	}
	return false;
}

/**
 * inicializar_smarty()
 *
 * @return
 */
function inicializar_smarty(){
	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	// Se define el Path de la app actual
	$smarty->assign("ACTUAL_PATH", mel::getBasePath());
	// Se define el Base Path para los assets
	$smarty->assign("BASE_PATH", mel::getBaseAssetPath());
	// Path para el sitio MEL
	$smarty->assign("MEL_PATH", mel::getBaseMelPath());
	// Path para el sitio de Administración
	$smarty->assign("ADMIN_PATH", mel::getBaseAdminPath());

	$config = new config;
	$modulo = $config->getParameters("framework::boletas::modulo_activo");
	$smarty->assign("MODULO_BOLETAS", $modulo);

	if(__SYSTEM__ == "mel"){
		//URL Home del perfil seleccionado
		$tipo = isset($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) ? $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'] : null;

		if ($tipo) {
			$smarty->assign("PERFIL", obtener_tipo($tipo));
		}

		$smarty->assign("HOME_URL", mel::getHomeURL($tipo,false));
		$smarty->assign("SYSTEM_PATH", mel::getBaseMelPath());
	}
	elseif(__SYSTEM__ == "admin"){
		$smarty->assign("SYSTEM_PATH", mel::getBaseAdminPath());
		$usuario = Usuario::find($_SESSION['INFORMACION_USUARIO']['ID']);
		$smarty->assign('USUARIO', $usuario);
		if ($usuario) {
			$smarty->assign('MODULOS_ADMINISTRACION', $usuario->get_modulos_disponibles());
			//var_dump($usuario->get_modulos_disponibles());die;
		}
		$smarty->assign("SHOWMENU", true);
	}

	// precargamos al tpl la alerta (de no haber, es NULL y no se va a mostrar nada)
	$alerta = new alertas;
	$alerta->runAlertas();
	$smarty->assign("ALERTA", $alerta->getAlerta());

	return $smarty;
}

function forzar_argumentos_uppercase(){
	$blacklist_campos = Array(	'accion', 'contrasenia', 'usuario', 'direccion_email' );

	foreach($_GET as $key => &$argumento){
		if(!in_array($key, $blacklist_campos))
			$argumento = strtoupper($argumento);
	}

	foreach($_POST as $key => &$argumento){
		if(!in_array($key, $blacklist_campos))
			$argumento = strtoupper($argumento);
	}
}

function redirigir_a_seccion($tipo_establecimiento, $seccion_actual)
{
	$sesion = new sesion;

	$secciones = Array(
		SECCION_GENERADOR => mel::getBaseMelPath().'/operacion/generador/',
		SECCION_TRANSPORTISTA => mel::getBaseMelPath().'/operacion/transportista/',
		SECCION_OPERADOR => mel::getBaseMelPath().'/operacion/operador/'
	);

	if ($tipo_establecimiento != $seccion_actual) {
		header('location: '. $secciones[$tipo_establecimiento]);
		return true;
	}

	return false;

}

function obtener_tipo($codigo) {
	$tipos = Array(	1 => 'generador',
					2 => 'transportista',
					3 => 'operador');

	return $tipos[$codigo];
}

function obtener_tipos_arr($codigo) {
	$tiposA = Array(	1 => 'generador',
					2 => 'transportista',
					3 => 'operador');

    foreach($tiposA as $k=>&$tipo){
        $tipos[] = array("value"=>$k, "text"=>utf8_encode($tipo));
    }

	return $tipos;
}

function obtener_tipo_manifiesto($id)
{
	$tipo = '';

	switch ($id) {
		case TipoManifiesto::SIMPLE:
			$tipo = 'Simple';
			break;
		case TipoManifiesto::SIMPLE_RES_544_94:
			$tipo = 'Simple Resoluci&oacute;n 544/94';
			break;
		case TipoManifiesto::SIMPLE_CONCENTRADOR:
			$tipo = 'Simple Concentrador';
			break;
		case TipoManifiesto::MULTIPLE:
			$tipo = 'M&uacute;ltiple';
			break;
		case TipoManifiesto::SLOP:
			$tipo = 'SLOP';
			break;
		default:
			throw new Exception("El id de manifiesto especificado no es V&aacute;lido");
			break;
	}

	return $tipo;
}
/*
   function obtener_unidad($id){
   $unidades = Array(	1 => 'kg',
   2 => 'm3');

   return $unidades[$id];
   }
*/
function obtener_estado($id){
	$estado = Estado::find('first', array('conditions' => array('id = ?', $id)));

	if($estado){
		$estado = $estado->descripcion;
	}

	return $estado;
}

function obtener_estados(){
	$estados  = Array();
	$estados_ = Estado::find('all');

	foreach($estados_ as &$estado){
		$estados[] = Array( 'ID'          => $estado->id,
							'DESCRIPCION' => $estado->descripcion
						  );
	}

	return $estados;
}

function obtener_estados_arr(){
	$estados  = Array();
	$estados_ = Estado::find('all');

	foreach($estados_ as &$estado){
        $estados[] = array("value"=>$estado->id, "text"=>utf8_encode(html_entity_decode($estado->descripcion)));
	}

	return $estados;
}

function obtener_contenedor($codigo){
	$contenedor = '';
	$contenedor_ = Contenedor::find('first', array('conditions' => array('codigo = ?', $codigo)));

	if($contenedor_){
		$contenedor = $contenedor_->descripcion;
	}

	return $contenedor;
}

function obtener_contenedores(){
	$contenedores  = Array();
	$contenedores_ = Contenedor::find('all');

	foreach($contenedores_ as &$contenedor){
		$contenedores[] = Array(	'CODIGO'      => $contenedor->codigo,
									'DESCRIPCION' => $contenedor->descripcion
						  );
	}

	return $contenedores;
}

function obtener_cat_operaciones_residuos(){
	$operaciones_residuos  = Array();
	$operaciones_residuos_ = OperacionesResiduos::find('all');

	foreach($operaciones_residuos_ as &$contenedor){
		$operaciones_residuos[] = Array(
		'ID'      => $contenedor->id,
		'CODIGO'      => $contenedor->codigo,
							'DESCRIPCION' => $contenedor->descripcion
						  );
	}

	return $operaciones_residuos;
}

function obtener_tipo_documento($id){
	$tipo = TipoDocumento::find('first', array('conditions' => array('id = ? and flag = ?', $id, 't')));

	if($tipo){
		$tipo = $tipo->descripcion;
	}

	return $tipo;
}

function obtener_tipos_documento(){
	$tipos  = Array();
	$tipos_ = TipoDocumento::find('all', array('conditions' => array('flag = ?', 't')));

	foreach($tipos_ as &$tipo){
		$tipos[] = Array( 'ID'          => $tipo->id,
						  'DESCRIPCION' => $tipo->descripcion
						  );
	}

	return $tipos;
}

function obtener_tipos_documento_arr(){
	$tipos  = Array();
	$tipos_ = TipoDocumento::find('all', array('conditions' => array('flag = ?', 't')));

	foreach($tipos_ as &$tipo){
        $tipos[] = array("value"=>$tipo->id, "text"=>utf8_encode($tipo->descripcion));
	}

	return $tipos;
}

function obtener_actividad($codigo){
	$actividad = Actividad::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($actividad){
		$actividad = $actividad->descripcion;
	}

	return $actividad;
}

function obtener_actividades(){
	$actividades  = Array();
	$actividades_ = Actividad::find('all', array('conditions' => array('flag = ?', 't')));

	foreach($actividades_ as &$actividad){
		$actividades[] = Array( 'CODIGO'      => $actividad->codigo,
								'DESCRIPCION' => $actividad->descripcion
						 	  );
	}

	return $actividades;
}

function obtener_categoria_residuo($codigo){
	$residuo = Residuo::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($residuo){
		$residuo = $residuo->descripcion;
	}

	return $residuo;
}

function obtener_categoria_residuo_arr($codigo){
	$residuos = Residuo::find('all', array('conditions' => array('flag = ?', 't')));
    foreach($residuos as &$residuo){
        $residuosArr[] = array("value"=>$residuo->codigo, "text"=>utf8_encode(html_entity_decode($residuo->codigo." - ".$residuo->descripcion)));
    }

	return ($residuosArr);
}

function obtener_vehiculos_traslados($id_manifiesto,$id_vehiculo){
	$residuos_procesados = ResiduosTransportados::find('all', array('conditions' => array('id_manifiesto = ? and id_vehiculo = ?' , $id_manifiesto,$id_vehiculo)));
	$pendientes =  array();

	foreach($residuos_procesados as $pendiente){

		$pendiente = Array(
		'ID'                             => $pendiente->id,
		'ID_VEHICULO'                  => $pendiente->id_vehiculo,
		'ID_MANIFIESTO'             => $pendiente->id_manifiesto,
		'ID_RESIDUO_MANIFIESTO'         => $pendiente->id_residuo_manifiesto,
		'CANTIDAD'             => $pendiente->cantidad,
		'FECHA_TRASLADO'                  => formatear_fecha_activerecord($pendiente->fecha_traslado),

	);



		$pendientes[] = $pendiente;
	}


	return $pendientes;
}

function obtener_vehiculos_traslados_mani($id_manifiesto){
	$residuos_procesados = ResiduosTransportados::find('all', array('conditions' => array('id_manifiesto = ? ' , $id_manifiesto)));
	$pendientes =  array();

	foreach($residuos_procesados as $pendiente){

		$pendiente = Array(
		'ID'                             => $pendiente->id,
		'ID_VEHICULO'                  => $pendiente->id_vehiculo,
		'ID_MANIFIESTO'             => $pendiente->id_manifiesto,
		'ID_RESIDUO_MANIFIESTO'         => $pendiente->id_residuo_manifiesto,
		'CANTIDAD'             => $pendiente->cantidad,
		'FECHA_TRASLADO'                  => formatear_fecha_activerecord($pendiente->fecha_traslado),

	);



		$pendientes[] = $pendiente;
	}


	return $pendientes;
}

function obtener_residuos_trasladados($id_manifiesto, $id_vehiculo){
	$residuos_procesados = ResiduosTransportados::find('all', array('conditions' => array('id_manifiesto = ? and id_vehiculo = ?' , $id_manifiesto, $id_vehiculo)));
	return $residuos_procesados;
}

function obtener_nombre_establecimiento($id_establecimiento){
	$establecimiento = Establecimiento::find('all', array('conditions' => array('id = ? ' , $id_establecimiento)));
	$pendientes =  array();

	foreach($establecimiento as $pendiente){

		$pendiente = Array(
			'NOMBRE'                             => $pendiente->nombre,
			'EMPRESA_ID'                             => $pendiente->empresa_id,


	);



		$pendientes[] = $pendiente;
	}
	return $pendientes;

}

function obtener_categorias_residuos(){
	$residuos  = Array();
	$residuos_ = Residuo::find('all', array('conditions' => array('flag = ?', 't'), 'order' => 'LEFT(codigo,1),CAST(MID(codigo,2) AS UNSIGNED)'));

	foreach($residuos_ as &$residuo){
		$residuos[] = Array( 'CODIGO'      => $residuo->codigo,
							 'DESCRIPCION' => $residuo->descripcion
						   );
	}

	return $residuos;
}

function obtener_provincia($codigo){
	$provincia = Provincia::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($provincia){
		$provincia = utf8_encode($provincia->descripcion);
	}

	return $provincia;
}

function obtener_provincias(){
    $provincias  = Array();
    $provincias_ = Provincia::find('all', array('conditions' => array('flag = ?', 't'), 'order' => 'descripcion asc'));

    foreach($provincias_ as &$provincia){
        $provincias[] = Array(	'CODIGO'      => $provincia->codigo,
            'DESCRIPCION' => utf8_encode($provincia->descripcion)
        );
    }

    return $provincias;
}

function obtener_provincias_arr(){
    $provincias  = Array();
    $provincias_ = Provincia::find('all', array('conditions' => array('flag = ?', 't'), 'order' => 'descripcion asc'));

    foreach($provincias_ as &$provincia){
        $provincias[] = array("value"=>$provincia->codigo, "text"=>utf8_encode($provincia->descripcion));
    }

    return $provincias;
}

function obtener_municipio_por_localidad($codigo){
	$localidad = Localidad::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($localidad){
		$municipio = Municipio::find('first', array('conditions' => array('codigo = ? and flag = ?', $localidad->codigo_municipio, 't')));

		if($municipio){
			$municipio = utf8_encode($municipio->descripcion);
		}

		return $municipio;
	}

	return "";
}

function obtener_municipio($codigo){
	$municipio = Municipio::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($municipio){
		$municipio = utf8_encode($municipio->descripcion);
	}

	return $municipio;
}

function obtener_municipios($codigo_provincia){
	$municipios  = Array();
	$municipios_ = Municipio::find('all', array('conditions' => array('codigo_provincia = ? and flag = ?', $codigo_provincia, 't'), 'order' => 'descripcion asc'));

	foreach($municipios_ as &$municipio){
		$municipios[$municipio->codigo] = utf8_encode($municipio->descripcion);
	}

	return $municipios;
}

function obtener_localidad($codigo){
	$localidad = Localidad::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

	if($localidad){
		$localidad = utf8_encode($localidad->descripcion);
	}

	return $localidad;
}

function obtener_localidades($codigo_provincia, $codigo_municipio){
	$localidades  = Array();
	$localidades_ = Localidad::find('all', array('conditions' => array('codigo_provincia = ? and (codigo_municipio = ? or ? = 0)and flag = ?', $codigo_provincia, $codigo_municipio, $codigo_municipio, 't'), 'order' => 'descripcion asc'));

	foreach($localidades_ as &$localidad){
		$localidades[$localidad->codigo] = utf8_encode($localidad->descripcion);
	}

	return $localidades;
}

function obtener_localidades_arr($codigo_provincia, $codigo_municipio){
    $localidades  = Array();
    $localidades_ = Localidad::find('all', array('conditions' => array('codigo_provincia = ? and (codigo_municipio = ? or ? = 0)and flag = ?', $codigo_provincia, $codigo_municipio, $codigo_municipio, 't'), 'order' => 'descripcion asc'));

    foreach($localidades_ as &$localidad){
        $localidades[] = array("value"=>$localidad->codigo, "text"=>utf8_encode($localidad->descripcion));
    }

    return $localidades;
}

function obtener_id_maximo_establecimiento($empresa_id){
	$id_establecimiento = Establecimiento::last(array('conditions' => array('empresa_id = ?', $empresa_id), 'order' => 'id asc'));

	$datos = explode('/', $id_establecimiento->usuario);

	return intval($datos[1]);
}

function obtener_cambios_pendientes($criterio, $pagina){
	$pendientes  = Array();
	$pendientes_ = CambioEstablecimiento::find('all', array('conditions' => array('flag = ?', 'p'), 'limit' => 20, 'offset' => $pagina * 20, 'order' => 'id desc'));
	$estados     = Array(	'p' => 'pendiente',
							'r' => 'rechazado',
							't' => 'funcional',
							'f' => 'baja logica');

	foreach($pendientes_ as $pendiente){
		$establecimiento = obtener_informacion_por_establecimiento($pendiente->establecimiento_id);

		if($pendiente->establecimiento_id == 0){
			$empresa = obtener_empresa_habilitada($pendiente->empresa_id);
		}else{
			$empresa = obtener_empresa_habilitada($establecimiento['EMPRESA']['ID']);
		}

		$pendiente = Array(
								'ID'                => $pendiente->id,
								'NOMBRE'            => $empresa['NOMBRE'],
								'CUIT'              => $empresa['CUIT'],
								'DOMICILIO_REAL'    => $empresa['CALLE_R'] . ' ' . $empresa['NUMERO_R'],
								'FECHA_INSCRIPCION' => $empresa['FECHA_INSCRIPCION'],
								'ESTADO'            => $pendiente->flag
							 );

		$pendiente['ESTADO_'] = $estados[$pendiente['FLAG']];

		$pendientes[] = $pendiente;
	}

	return $pendientes;
}

function obtener_cantidad_cambios_pendientes($criterio, $pagina){
	$pendientes = CambioEstablecimiento::count(array('conditions' => array('flag = ?', 'p')));

	if(is_null($pendientes))
		$pendientes = 0;

	return $pendientes;
}

function obtener_empresas_habilitadas($criterio, $pagina){
	$pendientes  = Array();
	$pendientes_ = Empresa::find('all', array('conditions' => array('(cuit like ? or nombre like ?) and flag = ?', $criterio, $criterio, 't'), 'limit' => 20, 'offset' => $pagina * 20, 'order' => 'id desc'));
	$estados     = Array(	'p' => 'pendiente',
							'r' => 'rechazado',
							't' => 'funcional',
							'f' => 'baja logica');

	foreach($pendientes_ as $pendiente){
		$pendiente = Array(
								'ID'                => $pendiente->id,
								'ID_PROTOCOLO'      => $pendiente->id_protocolo,
								'NOMBRE'            => $pendiente->nombre,
								'CUIT'              => $pendiente->cuit,
								'DOMICILIO_REAL'    => $pendiente->calle . ' ' . $pendiente->numero,
								'ROLES'             => Array(	'GENERADOR'     => $pendiente->rol_generador,
																'TRANSPORTISTA' => $pendiente->rol_transportista,
																'OPERADOR'      => $pendiente->rol_operador),
								'FECHA_INSCRIPCION' => formatear_fecha_activerecord($pendiente->fecha_inscripcion),
								'ESTADO'            => $pendiente->flag
							 );

		$pendiente['ROLES_']  = implode(', ', array_keys(array_filter(array_combine(Array('G', 'T', 'O'), $pendiente['ROLES']))));
		$pendiente['ESTADO_'] = $estados[$pendiente['ESTADO']];

		$pendientes[] = $pendiente;
	}

	return $pendientes;
}

function obtener_cantidad_empresas_habilitadas($criterio, $pagina){
	$pendientes = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?) and flag = ?', $criterio, $criterio, 't')));

	if(is_null($pendientes))
		$pendientes = 0;

	return $pendientes;
}

function obtener_empresa_habilitada_contacto($id){
	$habilitada = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $id, 't')));
	$empresa = Array(

							'NUMERO_TELEFONICO'         => $habilitada->numero_telefonico,
						);
	return $empresa;
}

function obtener_empresa_habilitada($id){
	$habilitada = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $id, 't')));

	if($habilitada){
		$empresa = Array(
							'ID'                        => $habilitada->id,
							'NOMBRE'                    => $habilitada->nombre,
							'CUIT'                      => $habilitada->cuit,
							'ROLES'                     => Array(  'GENERADOR'     => $habilitada->rol_generador,
													   			   'TRANSPORTISTA' => $habilitada->rol_transportista,
												 				   'OPERADOR'      => $habilitada->rol_operador),

							'FECHA_INICIO_ACT'          => formatear_fecha_activerecord($habilitada->fecha_inicio_act),
							'FECHA_INSCRIPCION'         => formatear_fecha_activerecord($habilitada->fecha_inscripcion),

							'CALLE_R'                   => $habilitada->calle,
							'NUMERO_R'                  => $habilitada->numero,
							'PISO_R'                    => $habilitada->piso,
							'OFICINA_R'                 => $habilitada->oficina,
							'PROVINCIA_R'               => $habilitada->provincia,
							'LOCALIDAD_R'	            => $habilitada->localidad,

							'CALLE_L'                   => $habilitada->calle_l,
							'NUMERO_L'                  => $habilitada->numero_l,
							'PISO_L'                    => $habilitada->piso_l,
							'OFICINA_L'                 => $habilitada->oficina_l,
							'PROVINCIA_L'               => $habilitada->provincia_l,
							'LOCALIDAD_L'	            => $habilitada->localidad_l,

							'CALLE_C'                   => $habilitada->calle_c,
							'NUMERO_C'                  => $habilitada->numero_c,
							'PISO_C'                    => $habilitada->piso_c,
							'OFICINA_C'                 => $habilitada->oficina_c,
							'PROVINCIA_C'               => $habilitada->provincia_c,
							'LOCALIDAD_C'	            => $habilitada->localidad_c,

							'NUMERO_TELEFONICO'         => $habilitada->numero_telefonico,

							'PROVINCIA_R_'              => obtener_provincia($habilitada->provincia),
							'LOCALIDAD_R_'              => obtener_localidad($habilitada->localidad),

							'PROVINCIA_L_'              => obtener_provincia($habilitada->provincia_l),
							'LOCALIDAD_L_'              => obtener_localidad($habilitada->localidad_l),

							'PROVINCIA_C_'              => obtener_provincia($habilitada->provincia_c),
							'LOCALIDAD_C_'              => obtener_localidad($habilitada->localidad_c),

							'ESTABLECIMIENTOS'          => Array(),
							'REPRESENTANTES_LEGALES'    => Array(),
							'REPRESENTANTES_TECNICOS'   => Array()
						);

		$representantes_legales = RepresentanteLegal::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_legales){
			foreach($representantes_legales as $representante){
				$empresa['REPRESENTANTES_LEGALES'][] = Array(
																'ID'               => $representante->id,
																'NOMBRE'           => $representante->nombre,
																'APELLIDO'         => $representante->apellido,
																'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
																'TIPO_DOCUMENTO'   => $representante->tipo_documento,
																'NUMERO_DOCUMENTO' => $representante->numero_documento,
																'CUIT'             => $representante->cuit,

																'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento)
															);
			}
		}

		$representantes_tecnicos = RepresentanteTecnico::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_tecnicos){
			foreach($representantes_tecnicos as $representante){
				$empresa['REPRESENTANTES_TECNICOS'][] = Array(
																'ID'               => $representante->id,
																'NOMBRE'           => $representante->nombre,
																'APELLIDO'         => $representante->apellido,
																'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
																'TIPO_DOCUMENTO'   => $representante->tipo_documento,
																'NUMERO_DOCUMENTO' => $representante->numero_documento,
																'CARGO'            => $representante->cargo,
																'CUIT'             => $representante->cuit,

																'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento)
															);
			}
		}

		$establecimientos = Establecimiento::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($establecimientos){
			foreach($establecimientos as $establecimiento){
				$establecimiento_ = Array(
											'ID'                               => $establecimiento->id,
											'NOMBRE'                           => $establecimiento->nombre,
											'TIPO'                             => $establecimiento->tipo,
											'USUARIO'                          => $establecimiento->usuario,
											'CONTRASENIA'                      => $establecimiento->contrasenia,
											'ACTIVIDAD'                        => $establecimiento->codigo_actividad,
											'DESCRIPCION'                      => $establecimiento->descripcion,

											'CALLE_R'                          => $establecimiento->calle,
											'NUMERO_R'                         => $establecimiento->numero,
											'PISO_R'                           => $establecimiento->piso,
											'PROVINCIA_R'                      => $establecimiento->provincia,
											'LOCALIDAD_R'                      => $establecimiento->localidad,

											'CALLE_C'                          => $establecimiento->calle_c,
											'NUMERO_C'                         => $establecimiento->numero_c,
											'PISO_C'                           => $establecimiento->piso_c,
											'PROVINCIA_C'                      => $establecimiento->provincia_c,
											'LOCALIDAD_C'                      => $establecimiento->localidad_c,

											'NOMENCLATURA_CATASTRAL'           =>	$establecimiento->nomenclatura_catastral_circ . " - " .
																					$establecimiento->nomenclatura_catastral_sec  . " - " .
																					$establecimiento->nomenclatura_catastral_manz . " - " .
																					$establecimiento->nomenclatura_catastral_parc . " - " .
																					$establecimiento->nomenclatura_catastral_sub_parc,

											'NOMENCLATURA_CATASTRAL_CIRC'      => $establecimiento->nomenclatura_catastral_circ,
											'NOMENCLATURA_CATASTRAL_SEC'       => $establecimiento->nomenclatura_catastral_sec,
											'NOMENCLATURA_CATASTRAL_MANZ'      => $establecimiento->nomenclatura_catastral_manz,
											'NOMENCLATURA_CATASTRAL_PARC'      => $establecimiento->nomenclatura_catastral_parc,
											'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $establecimiento->nomenclatura_catastral_sub_parc,
											'HABILITACIONES'                   => $establecimiento->habilitaciones,
											'VEHICULOS'                        => Array(),
											'PERMISOS'                         => Array(),

											'TIPO_'                            => obtener_tipo($establecimiento->tipo),
											'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($establecimiento->codigo_actividad)),

											'PROVINCIA_R_'                     => obtener_provincia($establecimiento->provincia),
											'LOCALIDAD_R_'                     => obtener_localidad($establecimiento->localidad),

											'PROVINCIA_C_'                     => obtener_provincia($establecimiento->provincia_c),
											'LOCALIDAD_C_'                     => obtener_localidad($establecimiento->localidad_c)
										);

				$permisos = PermisoEstablecimiento::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $establecimiento_['ID'], 't')));

				if($permisos){
					foreach($permisos as $permiso){
						$establecimiento_['PERMISOS'][] = Array(
																	'ID'                 => $permiso->id,
																	'RESIDUO'            => $permiso->residuo,
																	'CANTIDAD'           => $permiso->cantidad,
																	'ESTADO'             => $permiso->estado,
																	'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo),
																	'ESTADO_'            => obtener_estado($permiso->estado)
																);
					}
				}

				$vehiculos = Vehiculo::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $establecimiento_['ID'], 't')));

				if($vehiculos){
					foreach($vehiculos as $vehiculo){
						$vehiculo_ = Array(
											'ID'                => $vehiculo->id,
											'DOMINIO'           => $vehiculo->dominio,
											'DESCRIPCION'       => $vehiculo->descripcion,
											'CREDENCIAL_NUMERO' => $vehiculo->credencial_numero,
											'CREDENCIAL_SERIE'  => $vehiculo->credencial_serie,
											'PERMISOS'          => Array()
										 );

						$permisos = PermisoVehiculo::find('all', array('conditions' => array('vehiculo_id = ? and flag = ?', $vehiculo_['ID'], 't')));

						if($permisos){
							foreach($permisos as $permiso){
								$vehiculo_['PERMISOS'][] = Array(
																			'ID'                 => $permiso->id,
																			'RESIDUO'            => $permiso->residuo,
																			'CANTIDAD'           => $permiso->cantidad,
																			'ESTADO'             => $permiso->estado,
																			'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo),
																			'ESTADO_'            => obtener_estado($permiso->estado)
																		);
							}
						}

						$establecimiento_['VEHICULOS'][] = $vehiculo_;
					}
				}

				$empresa['ESTABLECIMIENTOS'][] = $establecimiento_;
			}
		}
	}

	return $empresa;
}

function obtener_cambio_pendiente($id){
	$cambio_ = CambioEstablecimiento::find('first', array('conditions' => array('id = ? and flag = ?', $id, 'p')));
	$cambio  = Array();

	if($cambio_){
		$cambio = Array(
							'ID'                               => $cambio_->id,
							'NOMBRE'                           => $cambio_->nombre,
							'DESCRIPCION'                      => $cambio_->descripcion,

							'CAA_NUMERO'                       => $cambio_->caa_numero,
							'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($cambio_->caa_vencimiento),

							'CALLE_R'                          => $cambio_->calle,
							'NUMERO_R'                         => $cambio_->numero,
							'PISO_R'                           => $cambio_->piso,
							'PROVINCIA_R'                      => $cambio_->provincia,
							'LOCALIDAD_R'                      => $cambio_->localidad,

							'CALLE_C'                          => $cambio_->calle_c,
							'NUMERO_C'                         => $cambio_->numero_c,
							'PISO_C'                           => $cambio_->piso_c,
							'PROVINCIA_C'                      => $cambio_->provincia_c,
							'LOCALIDAD_C'                      => $cambio_->localidad_c,

							'NOMENCLATURA_CATASTRAL'           =>	$cambio_->nomenclatura_catastral_circ . " - " .
																	$cambio_->nomenclatura_catastral_sec  . " - " .
																	$cambio_->nomenclatura_catastral_manz . " - " .
																	$cambio_->nomenclatura_catastral_parc . " - " .
																	$cambio_->nomenclatura_catastral_sub_parc,

							'NOMENCLATURA_CATASTRAL_CIRC'      => $cambio_->nomenclatura_catastral_circ,
							'NOMENCLATURA_CATASTRAL_SEC'       => $cambio_->nomenclatura_catastral_sec,
							'NOMENCLATURA_CATASTRAL_MANZ'      => $cambio_->nomenclatura_catastral_manz,
							'NOMENCLATURA_CATASTRAL_PARC'      => $cambio_->nomenclatura_catastral_parc,
							'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $cambio_->nomenclatura_catastral_sub_parc,
							'HABILITACIONES'                   => $cambio_->habilitaciones,


							'PROVINCIA_R_'                     => obtener_provincia($cambio_->provincia),
							'LOCALIDAD_R_'                     => obtener_localidad($cambio_->localidad),

							'PROVINCIA_C_'                     => obtener_provincia($cambio_->provincia_c),
							'LOCALIDAD_C_'                     => obtener_localidad($cambio_->localidad_c),
							'PERMISOS'                         => Array(),
							'VEHICULOS'                        => Array()
						);

		if($cambio_->tipo_cambio == 1){
			$cambio['ALTA'] = true;

			$permisos_ = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $cambio['ID'], 'p')));

			foreach($permisos_ as $permiso){
				$permiso_ = Array(
									'ID'                 => $permiso->id,
									'RESIDUO'            => $permiso->residuo,
									'CANTIDAD'           => $permiso->cantidad,
									'ESTADO'             => $permiso->estado,
									'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo),
									'ESTADO_'            => obtener_estado($permiso->estado)
								);

				$cambio['PERMISOS'][] = $permiso_;
			}

			$vehiculos_ = CambioVehiculo::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $cambio['ID'], 'p')));

			foreach($vehiculos_ as $vehiculo){
				$vehiculo_ = Array(
									'ID'                => $vehiculo->id,
									'DOMINIO'           => $vehiculo->dominio,
									'DESCRIPCION'       => $vehiculo->descripcion,
									'CREDENCIAL_NUMERO' => $vehiculo->credencial_numero,
									'CREDENCIAL_SERIE'  => $vehiculo->credencial_serie,
									'PERMISOS'          => Array()
								 );

				$permisos_ = CambioPermisoVehiculo::find('all', array('conditions' => array('cambio_id = ? and vehiculo_id = ? and flag = ?', $cambio['ID'], $vehiculo_['ID'], 'p')));

				foreach($permisos_ as $permiso){
					$permiso_ = Array(
										'ID'                 => $permiso->id,
										'RESIDUO'            => $permiso->residuo,
										'CANTIDAD'           => $permiso->cantidad,
										'ESTADO'             => $permiso->estado,
										'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo),
										'ESTADO_'            => obtener_estado($permiso->estado)
									);

					$vehiculo_['PERMISOS'][] = $permiso_;
				}

				$cambio['VEHICULOS'][] = $vehiculo_;
			}

		}else{
			$cambio['ALTA'] = false;
		}
	}

	return $cambio;
}

function asignar_registracion_pendiente($id)
{
	$pendiente = Empresa::find('first', array('conditions' => array('id = ? and flag = ? and asignado_a IS NULL', $id, 'p')));

	if ($pendiente)
	{
		$mysql_datetime = strftime('%Y-%m-%d %H:%M:%S', time());

		$pendiente->asignado_a = $_SESSION['INFORMACION_USUARIO']['ID'];
		$pendiente->asignado_el = $mysql_datetime;

		$pendiente->save();
	}

	return true;
}

function asignar_registracion_total($id)
{
	$pendiente = Empresa::find('first', array('conditions' => array('id = ? and asignado_a IS NULL', $id)));

	if ($pendiente)
	{
		$mysql_datetime = strftime('%Y-%m-%d %H:%M:%S', time());

		$pendiente->asignado_a = $_SESSION['INFORMACION_USUARIO']['ID'];
		$pendiente->asignado_el = $mysql_datetime;

		$pendiente->save();
	}

	return true;
}

function obtener_registracion_pendiente($id){
	$pendiente = Empresa::find('first', array('conditions' => array('id = ? and flag = ? and asignado_a = ?', $id, 'p', $_SESSION['INFORMACION_USUARIO']['ID'])));

	if($pendiente)
	{
		$empresa = Array(
			'ID'                        => $pendiente->id,
			'NOMBRE'                    => $pendiente->nombre,
			'CUIT'                      => $pendiente->cuit,
			'ROLES'                     => Array(  'GENERADOR'     => $pendiente->rol_generador,
									   			   'TRANSPORTISTA' => $pendiente->rol_transportista,
								 				   'OPERADOR'      => $pendiente->rol_operador),

			'FECHA_INICIO_ACT'          => formatear_fecha_activerecord($pendiente->fecha_inicio_act),

			'CALLE_R'                   => $pendiente->calle,
			'NUMERO_R'                  => $pendiente->numero,
			'PISO_R'                    => $pendiente->piso,
			'OFICINA_R'                 => $pendiente->oficina,
			'PROVINCIA_R'               => $pendiente->provincia,
			'LOCALIDAD_R'	            => $pendiente->localidad,
			'CODIGO_POSTAL'	            => $pendiente->codigo_postal,

			'CALLE_L'                   => $pendiente->calle_l,
			'NUMERO_L'                  => $pendiente->numero_l,
			'PISO_L'                    => $pendiente->piso_l,
			'OFICINA_L'                 => $pendiente->oficina_l,
			'PROVINCIA_L'               => $pendiente->provincia_l,
			'LOCALIDAD_L'	            => $pendiente->localidad_l,
			'CODIGO_POSTAL_L'	        => $pendiente->codigo_postal_l,

			'CALLE_C'                   => $pendiente->calle_c,
			'NUMERO_C'                  => $pendiente->numero_c,
			'PISO_C'                    => $pendiente->piso_c,
			'OFICINA_C'                 => $pendiente->oficina_c,
			'PROVINCIA_C'               => $pendiente->provincia_c,
			'LOCALIDAD_C'	            => $pendiente->localidad_c,
			'CODIGO_POSTAL_C'	        => $pendiente->codigo_postal_c,

			'NUMERO_TELEFONICO'         => $pendiente->numero_telefonico,

			'PROVINCIA_R_'              => obtener_provincia($pendiente->provincia),
			'PROVINCIA_R_ID'              => $pendiente->provincia,
			'PROVINCIA_ARR'              => json_encode(obtener_provincias_arr()),
			'LOCALIDAD_R_'              => obtener_localidad($pendiente->localidad),
			'LOCALIDAD_R_ID'              => $pendiente->localidad,
			'LOCALIDAD_ARR'              => json_encode(obtener_localidades_arr($pendiente->provincia, 0)),

			'PROVINCIA_L_'              => obtener_provincia($pendiente->provincia_l),
			'PROVINCIA_L_ID'              => $pendiente->provincia_l,
			'PROVINCIA_L_ARR'              => json_encode(obtener_provincias_arr()),
			'LOCALIDAD_L_'              => obtener_localidad($pendiente->localidad_l),
			'LOCALIDAD_L_ID'              => $pendiente->localidad_l,
			'LOCALIDAD_L_ARR'              => json_encode(obtener_localidades_arr($pendiente->provincia_l, 0)),

			'PROVINCIA_C_'              => obtener_provincia($pendiente->provincia_c),
            'PROVINCIA_C_ID'              => $pendiente->provincia_c,
            'PROVINCIA_C_ARR'              => json_encode(obtener_provincias_arr()),
			'LOCALIDAD_C_'              => obtener_localidad($pendiente->localidad_c),
            'LOCALIDAD_C_ID'              => $pendiente->localidad_c,
            'LOCALIDAD_C_ARR'              => json_encode(obtener_localidades_arr($pendiente->provincia_c, 0)),

			'ESTABLECIMIENTOS'          => Array(),
			'REPRESENTANTES_LEGALES'    => Array(),
			'REPRESENTANTES_TECNICOS'   => Array()
		);

		$representantes_legales = RepresentanteLegal::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_legales){
			foreach($representantes_legales as $representante){
				$empresa['REPRESENTANTES_LEGALES'][] = Array(
					'ID'               => $representante->id,
					'NOMBRE'           => $representante->nombre,
					'APELLIDO'         => $representante->apellido,
					'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
					'TIPO_DOCUMENTO'   => $representante->tipo_documento,
					'NUMERO_DOCUMENTO' => $representante->numero_documento,
					'CUIT'             => $representante->cuit,

                    'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento),
                    'TIPO_DOCUMENTO_ID'  => $representante->tipo_documento,
                    'TIPO_DOCUMENTO_ARR'  => json_encode(obtener_tipos_documento_arr())
				);
			}
		}

		$representantes_tecnicos = RepresentanteTecnico::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_tecnicos){
			foreach($representantes_tecnicos as $representante){
				$empresa['REPRESENTANTES_TECNICOS'][] = Array(
					'ID'               => $representante->id,
					'NOMBRE'           => $representante->nombre,
					'APELLIDO'         => $representante->apellido,
					'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
					'TIPO_DOCUMENTO'   => $representante->tipo_documento,
					'NUMERO_DOCUMENTO' => $representante->numero_documento,
					'CARGO'            => $representante->cargo,
					'CUIT'             => $representante->cuit,

					'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento),
					'TIPO_DOCUMENTO_ID'  => $representante->tipo_documento,
					'TIPO_DOCUMENTO_ARR'  => json_encode(obtener_tipos_documento_arr())
				);
			}
		}

		$establecimientos = Establecimiento::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($establecimientos){
			foreach($establecimientos as $establecimiento){
				$establecimiento_ = Array(
					'ID'                               => $establecimiento->id,
					'NOMBRE'                           => $establecimiento->nombre,
					'TIPO'                             => $establecimiento->tipo,
					'USUARIO'                          => $establecimiento->usuario,
					'CONTRASENIA'                      => $establecimiento->contrasenia,
					'CAA_NUMERO'                       => $establecimiento->caa_numero,
					'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($establecimiento->caa_vencimiento),
					'ACTIVIDAD'                        => utf8_encode($establecimiento->codigo_actividad),
					'FLAG'							   => $establecimiento->flag,
					'EXPEDIENTE_NUMERO'                => $establecimiento->expediente_numero,
					'EXPEDIENTE_ANIO'                  => $establecimiento->expediente_anio,
					'DESCRIPCION'                      => $establecimiento->descripcion,
					'EMAIL'                      	   => $establecimiento->email,

					'CALLE_R'                          => $establecimiento->calle,
					'NUMERO_R'                         => $establecimiento->numero,
					'PISO_R'                           => $establecimiento->piso,
					'PROVINCIA_R'                      => $establecimiento->provincia,
					'LOCALIDAD_R'                      => $establecimiento->localidad,
					'CODIO_POSTAL'                      => $establecimiento->codigo_postal,

					'CALLE_C'                          => $establecimiento->calle_c,
					'NUMERO_C'                         => $establecimiento->numero_c,
					'PISO_C'                           => $establecimiento->piso_c,
					'PROVINCIA_C'                      => $establecimiento->provincia_c,
					'LOCALIDAD_C'                      => $establecimiento->localidad_c,
					'CODIO_POSTAL_C'                      => $establecimiento->codigo_postal_c,

					'NOMENCLATURA_CATASTRAL'           =>	$establecimiento->nomenclatura_catastral_circ . " - " .
															$establecimiento->nomenclatura_catastral_sec  . " - " .
															$establecimiento->nomenclatura_catastral_manz . " - " .
															$establecimiento->nomenclatura_catastral_parc . " - " .
															$establecimiento->nomenclatura_catastral_sub_parc,

					'NOMENCLATURA_CATASTRAL_CIRC'      => $establecimiento->nomenclatura_catastral_circ,
					'NOMENCLATURA_CATASTRAL_SEC'       => $establecimiento->nomenclatura_catastral_sec,
					'NOMENCLATURA_CATASTRAL_MANZ'      => $establecimiento->nomenclatura_catastral_manz,
					'NOMENCLATURA_CATASTRAL_PARC'      => $establecimiento->nomenclatura_catastral_parc,
					'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $establecimiento->nomenclatura_catastral_sub_parc,
					'HABILITACIONES'                   => $establecimiento->habilitaciones,

					'VEHICULOS'                        => Array(),
					'PERMISOS'                         => Array(),

					'TIPO_'                            => obtener_tipo($establecimiento->tipo),
					'TIPO_ID'                            => $establecimiento->tipo,
					'TIPO_ARR'                            => json_encode(obtener_tipos_arr($establecimiento->tipo)),
					'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($establecimiento->codigo_actividad)),
					'ACTIVIDAD_ID'                       => $establecimiento->codigo_actividad,
					'ACTIVIDAD_ARR'                       => json_encode(obtener_actividad($establecimiento->codigo_actividad, 0)),

                    'PROVINCIA_R_'              => obtener_provincia($establecimiento->provincia),
                    'PROVINCIA_R_ID'              => $establecimiento->provincia,
                    'PROVINCIA_ARR'              => json_encode(obtener_provincias_arr()),
                    'LOCALIDAD_R_'              => obtener_localidad($establecimiento->localidad),
                    'LOCALIDAD_R_ID'              => $establecimiento->localidad,
                    'LOCALIDAD_ARR'              => json_encode(obtener_localidades_arr($establecimiento->provincia, 0)),

					'PROVINCIA_C_'                     => obtener_provincia($establecimiento->provincia_c),
                    'PROVINCIA_C_ID'              => $establecimiento->provincia_c,
                    'PROVINCIA_C_ARR'              => json_encode(obtener_provincias_arr()),
                    'LOCALIDAD_C_'              => obtener_localidad($establecimiento->localidad_c),
                    'LOCALIDAD_C_ID'              => $establecimiento->localidad_c,
                    'LOCALIDAD_C_ARR'              => json_encode(obtener_localidades_arr($establecimiento->provincia_c, 0))
				);

				$permisos = PermisoEstablecimiento::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $establecimiento_['ID'], 't')));

				if($permisos){
					foreach($permisos as $permiso){
						$informacion_del_permiso = Array(
							'ID'			=> $permiso->id,
							'RESIDUO'		=> $permiso->residuo,
							'CANTIDAD'		=> $permiso->cantidad,
							'ESTADO'		=> $permiso->estado,
							'RESIDUO_'		=> obtener_categoria_residuo($permiso->residuo),
							'RESIDUO_ARR'	=> json_encode(obtener_categoria_residuo_arr($permiso->residuo)),
							'ESTADO_'		=> obtener_estado($permiso->estado),
							'ESTADO_ID'		=> $permiso->estado,
							'ESTADO_ARR'	=> json_encode(obtener_estado($permiso->estado, 0))
						);

						$tratamientos = array();

						foreach ($permiso->tratamientos as $trat) {
							$tratamientos[] = $trat->operacion_residuo;
						}

						$informacion_del_permiso['TRATAMIENTOS'] = $tratamientos;
						$establecimiento_['PERMISOS'][] = $informacion_del_permiso;
					}
				}

				$vehiculos = Vehiculo::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $establecimiento_['ID'], 't')));

				if($vehiculos){
					foreach($vehiculos as $vehiculo){
						$vehiculo_ = Array(
							'ID'                => $vehiculo->id,
							'DOMINIO'           => $vehiculo->dominio,
							'TIPO_VEHICULO'     => $vehiculo->tipo_vehiculo,
							'TIPO_CAJA'         => $vehiculo->tipo_caja,
							'DESCRIPCION'       => $vehiculo->descripcion,
							'PERMISOS'          => Array()
						 );

						$permisos = PermisoVehiculo::find('all', array('conditions' => array('vehiculo_id = ? and flag = ?', $vehiculo_['ID'], 't')));

						if($permisos){
							foreach($permisos as $permiso){
								$vehiculo_['PERMISOS'][] = Array(
                                    'ID'                 => $permiso->id,
                                    'RESIDUO'            => $permiso->residuo,
                                    'CANTIDAD'           => $permiso->cantidad,
                                    'ESTADO'             => $permiso->estado,
                                    'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo, 0),
                                    'RESIDUO_ARR'           => json_encode(obtener_categoria_residuo_arr($permiso->residuo)),
                                    'ESTADO_'            => obtener_estado($permiso->estado),
                                    'ESTADO_ID'            => $permiso->estado,
                                    'ESTADO_ARR'            => json_encode(obtener_estados_arr($permiso->estado, 0))
                                );
							}
						}

						$establecimiento_['VEHICULOS'][] = $vehiculo_;
					}
				}

				$empresa['ESTABLECIMIENTOS'][] = $establecimiento_;
			}
		}


		return $empresa;
	}
	else
	{
		return false;
	}

}

function obtener_informacion_por_usuario_drp($login){
	$usuario  = Array();
	$usuario_ = Usuario::find('first', array('conditions' => array('login = ?', $login)));

	if ($usuario_) {
		$usuario['ID'] = $usuario_->id;
		$usuario['USUARIO'] = $usuario_->login;
		$usuario['CONTRASENIA'] = $usuario_->password;
		$usuario['SALT'] = $usuario_->salt;
		$usuario['NOMBRE'] = $usuario_->nombre;
		$usuario['APELLIDO'] = $usuario_->apellido;
		$usuario['TIPO_DOCUMENTO'] = $usuario_->tipo_documento;
		$usuario['NRO_DOCUMENTO'] = $usuario_->nro_documento;
		$usuario['ROL'] = $usuario_->codigo_rol;
		$usuario['FECHA_NACIMIENTO'] = formatear_fecha_activerecord($usuario_->fecha_nacimiento);
		$usuario['SEXO'] = $usuario_->sexo;
	}

	return $usuario;
}

function obtener_informacion_por_usuario($usuario, $contrasenia)
{
	$informacion = Array();
	$establecimiento = Establecimiento::find('first', array('conditions' => array('usuario = ? and contrasenia = ?', $usuario, $contrasenia)));

	if($establecimiento){
		$informacion = obtener_informacion_por_establecimiento($establecimiento->id,$establecimiento);
	}

	return $informacion;
}

function obtener_permisos_por_establecimientos($establecimientos){
	$residuos_  = Array();
	$residuos__ = Array();

	foreach($establecimientos as $establecimiento){
		$id_establecimiento = $establecimiento;

		if(is_array($establecimiento))
			$id_establecimiento = $establecimiento['ID'];

		if(((int)$id_establecimiento) == 0) #objeto erroneo?
			continue;

		$residuos__ = obtener_permisos_por_establecimiento($id_establecimiento);

		for($x = 0 ; $x < count($residuos__) ; $x++){
			$presente = False;
			for($y = 0 ; $y < count($residuos_) ; $y++){
				if($residuos__[$x]['RESIDUO'] == $residuos_[$y]['RESIDUO']){
					$presente = True;
					break;
				}
			}
			if($presente === False){
				$residuos_[] = $residuos__[$x];
			}
		}
	}

	return $residuos_;
}

function obtener_permisos_por_establecimiento($id_establecimiento){
	$permisos = Array();
	$permisos_ = PermisoEstablecimiento::find('all', array('conditions' => array('establecimiento_id = ?', $id_establecimiento)));


	foreach($permisos_ as $permiso_){
		$permiso = Array(
							'RESIDUO'                 => $permiso_->residuo,
							'CANTIDAD'                => $permiso_->cantidad,
							'ESTADO'                  => $permiso_->estado,
						);

		$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
		$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);

		$permisos[] = $permiso;
	}

	return $permisos;
}

function obtener_permisos_por_vehiculo($id_vehiculo){
	$permisos = Array();
	$permisos_ = PermisoVehiculo::find('all', array('conditions' => array('vehiculo_id = ?', $id_vehiculo)));

	foreach($permisos_ as $permiso_){
		$permiso = Array(
							'RESIDUO'                 => $permiso_->residuo,
							'CANTIDAD'                => $permiso_->cantidad,
							'ESTADO'                  => $permiso_->estado,
							'FECHA_INICIO'            => formatear_fecha_activerecord($permiso_->fecha_inicio),
							'FECHA_FIN'               => formatear_fecha_activerecord($permiso_->fecha_fin),
						);

		$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
		$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);

		$permisos[] = $permiso;
	}

	return $permisos;
}

function obtener_informacion_por_establecimiento($id_establecimiento,$establecimiento = false){
	$informacion = Array();

	if(!$establecimiento)
		$establecimiento = Establecimiento::find('first', array('conditions' => array('id = ?', $id_establecimiento)));

	if($establecimiento){
		$empresa = Empresa::find('first', array('conditions' => array('id = ?', $establecimiento->empresa_id)));

		if(!$empresa)
			return false;

		$empresa_ = Array(
					'ID'                        => $empresa->id,
					'NOMBRE'                    => $empresa->nombre,
					'SUCURSAL'                  => '',
					'CUIT'                      => $empresa->cuit,
					'FECHA_INSCRIPCION'         => formatear_fecha_activerecord($empresa->fecha_inscripcion),
					'FLAG'						=> $empresa->flag,
			#temporal
					'CALLE'                     => $empresa->calle,
					'NUMERO'                    => $empresa->numero,
					'PISO'                      => $empresa->piso,
					'OFICINA'                   => $empresa->oficina,
					'PROVINCIA'                 => $empresa->provincia,
					'LOCALIDAD'	                => $empresa->localidad,
			#temporal

					'CALLE_R'                   => $empresa->calle,
					'NUMERO_R'                  => $empresa->numero,
					'PISO_R'                    => $empresa->piso,
					'OFICINA_R'                 => $empresa->oficina,
					'PROVINCIA_R'               => $empresa->provincia,
					'LOCALIDAD_R'	            => $empresa->localidad,
					'CPOSTAL_R'					=> $empresa->codigo_postal,

					'CALLE_L'                   => $empresa->calle_l,
					'NUMERO_L'                  => $empresa->numero_l,
					'PISO_L'                    => $empresa->piso_l,
					'OFICINA_L'                 => $empresa->oficina_l,
					'PROVINCIA_L'               => $empresa->provincia_l,
					'LOCALIDAD_L'	            => $empresa->localidad_l,
					'CPOSTAL_L'					=> $empresa->codigo_postal_l,

					'CALLE_C'                   => $empresa->calle_c,
					'NUMERO_C'                  => $empresa->numero_c,
					'PISO_C'                    => $empresa->piso_c,
					'OFICINA_C'                 => $empresa->oficina_c,
					'PROVINCIA_C'               => $empresa->provincia_c,
					'LOCALIDAD_C'	            => $empresa->localidad_c,
					'CPOSTAL_C'					=> $empresa->codigo_postal_c,

					'NUMERO_TELEFONICO'         => $empresa->numero_telefonico,

			#temporal
					'PROVINCIA_'                => obtener_provincia($pendiente->provincia),
					'LOCALIDAD_'                => obtener_localidad($pendiente->localidad),
			#temporal
					'PROVINCIA_R_'              => obtener_provincia($pendiente->provincia),
					'LOCALIDAD_R_'              => obtener_localidad($pendiente->localidad),

					'PROVINCIA_L_'              => obtener_provincia($pendiente->provincia_l),
					'LOCALIDAD_L_'              => obtener_localidad($pendiente->localidad_l),

					'PROVINCIA_C_'              => obtener_provincia($pendiente->provincia_c),
					'LOCALIDAD_C_'              => obtener_localidad($pendiente->localidad_c),
				);

		if(!is_null($establecimiento->caa_vencimiento)){
			$vencimiento = intval(floor((strtotime(formatear_fecha_activerecord_en($establecimiento->caa_vencimiento)) - time()) /  86400));
		}else{
			$vencimiento = -1;
		}

		$establecimiento_ = Array(
										'ID'                               => $establecimiento->id,
										'CUIT'                             => $empresa->cuit,
										'NOMBRE_EMPRESA'                   => $empresa->nombre,
										'NOMBRE'                           => $establecimiento->nombre,
										'ALTA_TEMPRANA'                    => $establecimiento->alta_temprana,
										'SUCURSAL'                  	   => $establecimiento->sucursal,
										'NOMBRE'                           => $establecimiento->nombre,
										'TIPO'                             => $establecimiento->tipo,
										'USUARIO'                          => $establecimiento->usuario,
										'CONTRASENIA'                      => $establecimiento->contrasenia,
										'CAA_NUMERO'                       => $establecimiento->caa_numero,
										'FLAG'							   => $establecimiento->flag,
										'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($establecimiento->caa_vencimiento),
										'CAA_VENCIMIENTO_DIAS'             => $vencimiento,

										'EXPEDIENTE_NUMERO'                => $establecimiento->expediente_numero,
										'EXPEDIENTE_ANIO'                  => $establecimiento->expediente_anio,
										'ACTIVIDAD'                        => $establecimiento->codigo_actividad,
										'DESCRIPCION'                      => $establecimiento->descripcion,

		#temporal
										'CALLE'                            => $establecimiento->calle,
										'NUMERO'                           => $establecimiento->numero,
										'PISO'                             => $establecimiento->piso,
										'PROVINCIA'                        => $establecimiento->provincia,
										'LOCALIDAD'                        => $establecimiento->localidad,
		#temporal

										'CALLE_R'                          => $establecimiento->calle,
										'NUMERO_R'                         => $establecimiento->numero,
										'PISO_R'                           => $establecimiento->piso,
										'PROVINCIA_R'                      => $establecimiento->provincia,
										'LOCALIDAD_R'                      => $establecimiento->localidad,
										'LATITUD_R'	            		   => $establecimiento->latitud,
										'LONGITUD_R'	            	   => $establecimiento->longitud,
										'CPOSTAL_R'						   => $establecimiento->codigo_postal,

										'CALLE_C'                          => $establecimiento->calle_c,
										'NUMERO_C'                         => $establecimiento->numero_c,
										'PISO_C'                           => $establecimiento->piso_c,
										'PROVINCIA_C'                      => $establecimiento->provincia_c,
										'LOCALIDAD_C'                      => $establecimiento->localidad_c,
										'CPOSTAL_C'						   => $establecimiento->codigo_postal_c,

										'EMAIL'                      	   => $establecimiento->email,

										'NOMENCLATURA_CATASTRAL_CIRC'      => $establecimiento->nomenclatura_catastral_circ,
										'NOMENCLATURA_CATASTRAL_SEC'       => $establecimiento->nomenclatura_catastral_sec,
										'NOMENCLATURA_CATASTRAL_MANZ'      => $establecimiento->nomenclatura_catastral_manz,
										'NOMENCLATURA_CATASTRAL_PARC'      => $establecimiento->nomenclatura_catastral_parc,
										'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $establecimiento->nomenclatura_catastral_sub_parc,
										'HABILITACIONES'                   => $establecimiento->habilitaciones,


										'TIPO_'                            => obtener_tipo($establecimiento->tipo),
										'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($establecimiento->codigo_actividad)),

		#temporal
										'PROVINCIA_'                       => obtener_provincia($establecimiento->provincia),
										'LOCALIDAD_'                       => obtener_localidad($establecimiento->localidad),
		#temporal

										'PROVINCIA_R_'                     => obtener_provincia($establecimiento->provincia),
										'LOCALIDAD_R_'                     => obtener_localidad($establecimiento->localidad),

										'PROVINCIA_C_'                     => obtener_provincia($establecimiento->provincia_c),
										'LOCALIDAD_C_'                     => obtener_localidad($establecimiento->localidad_c)
									);

		$alertas_ = Array(
								'MENSAJES_NUEVOS' => 0
							);

		$informacion['EMPRESA'] = $empresa_;
		$informacion['ALERTAS'] = $alertas_;
		$informacion['ESTADISTICAS'] = obtener_estadisticas_establecimiento($id_establecimiento);
		$informacion['ESTABLECIMIENTO'] = $establecimiento_;

	}

	return $informacion;
}

/**
 * $cuit	string		cuit de la empresa
 * $tipo 	integer 	transportista | operador | generador
 */
//
function buscar_establecimientos_por_criterio($cuit, $tipo_establecimiento, $tipo_manifiesto)
{
	$est = new establecimientos();
	return $est->buscarEstablecimientosParaManifiesto($cuit, $tipo_establecimiento, $tipo_manifiesto);
}

// es el formato que espera el response quien llama estas funciones. por ahora lo dejamos para mantener compatibilidad.
function formatear_establecimiento($empresa, $establecimiento)
{
	$user = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
	$vencimiento = intval(floor((strtotime(formatear_fecha_activerecord_en($establecimiento->caa_vencimiento)) - time()) /  86400));

	$data = array(
		'ID'                               => $establecimiento->id,
		'SUCURSAL'                         => $establecimiento->sucursal,
		'CUIT'                             => $empresa->cuit,
		'NOMBRE_EMPRESA'                   => utf8_encode($empresa->nombre),
		'NOMBRE_ESTABLECIMIENTO'		   => utf8_encode($establecimiento->nombre),// mantengo indice por compatibilidad
		'NOMBRE'                           => utf8_encode($establecimiento->nombre),
		'TIPO'                             => $establecimiento->tipo,
		'USUARIO'                          => $establecimiento->usuario,
		'CONTRASENIA'                      => $establecimiento->contrasenia,
		'ES_FAVORITO'                      => $establecimiento->es_favorito($user) ? 'yes' : 'no',
		'CAA_NUMERO'                       => $establecimiento->caa_numero,
		'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($establecimiento->caa_vencimiento),
		'CAA_VENCIMIENTO_DIAS'             => $vencimiento,
		'FLAG'							   => $establecimiento->flag,
		'ALTA_TEMPRANA'					   => $establecimiento->es_alta_temprana() ? 'yes' : 'no',

		'EXPEDIENTE_NUMERO'                => $establecimiento->expediente_numero,
		'EXPEDIENTE_ANIO'                  => $establecimiento->expediente_anio,
		'ACTIVIDAD'                        => $establecimiento->codigo_actividad,
		'DESCRIPCION'                      => $establecimiento->descripcion,

		#temporal
		'CALLE'                            => $establecimiento->calle,
		'NUMERO'                           => $establecimiento->numero,
		'PISO'                             => $establecimiento->piso,
		'PROVINCIA'                        => $establecimiento->provincia,
		'LOCALIDAD'                        => $establecimiento->localidad,

		#temporal
		'CALLE_R'                          => $establecimiento->calle,
		'NUMERO_R'                         => $establecimiento->numero,
		'PISO_R'                           => $establecimiento->piso,
		'PROVINCIA_R'                      => $establecimiento->provincia,
		'LOCALIDAD_R'                      => $establecimiento->localidad,

		'CALLE_C'                          => $establecimiento->calle_c,
		'NUMERO_C'                         => $establecimiento->numero_c,
		'PISO_C'                           => $establecimiento->piso_c,
		'PROVINCIA_C'                      => $establecimiento->provincia_c,
		'LOCALIDAD_C'                      => $establecimiento->localidad_c,

		'NOMENCLATURA_CATASTRAL_CIRC'      => $establecimiento->nomenclatura_catastral_circ,
		'NOMENCLATURA_CATASTRAL_SEC'       => $establecimiento->nomenclatura_catastral_sec,
		'NOMENCLATURA_CATASTRAL_MANZ'      => $establecimiento->nomenclatura_catastral_manz,
		'NOMENCLATURA_CATASTRAL_PARC'      => $establecimiento->nomenclatura_catastral_parc,
		'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $establecimiento->nomenclatura_catastral_sub_parc,
		'HABILITACIONES'                   => $establecimiento->habilitaciones,


		'TIPO_'                            => obtener_tipo($establecimiento->tipo),
		'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($establecimiento->codigo_actividad)),

		#temporal
		'PROVINCIA_'                       => obtener_provincia($establecimiento->provincia),
		'LOCALIDAD_'                       => obtener_localidad($establecimiento->localidad),

		#temporal
		'PROVINCIA_R_'                     => obtener_provincia($establecimiento->provincia),
		'LOCALIDAD_R_'                     => obtener_localidad($establecimiento->localidad),

		'PROVINCIA_C_'                     => obtener_provincia($establecimiento->provincia_c),
		'LOCALIDAD_C_'                     => obtener_localidad($establecimiento->localidad_c)
	);

	return $data;
}

function buscar_vehiculos_por_criterio($id_establecimiento, $criterio, $excluir_barcazas = false){
	$informacion = Array();

	if ($excluir_barcazas) {
		$query_string = "establecimiento_id = ? and (dominio like ? or descripcion like ?) and flag = ? and tipo_vehiculo != 'BA'";
	} else {
		$query_string = "establecimiento_id = ? and (dominio like ? or descripcion like ?) and flag = ?";
	}

	$vehiculos = Vehiculo::find('all', array('conditions' => array($query_string, $id_establecimiento, $criterio, $criterio, 't')));

	if($vehiculos){
		foreach($vehiculos as $vehiculo){
			$vehiculo_= Array(
										'ID'                 => $vehiculo->id,
										'DOMINIO'            => $vehiculo->dominio,
										'DESCRIPCION'        => $vehiculo->descripcion,
										'TIPO_VEHICULO'		 => $vehiculo->tipo_vehiculo,
										'TIPO_CAJA'		 	 => $vehiculo->tipo_caja,
									);

			$informacion[] = $vehiculo_;
		}
	}

	return $informacion;
}

function obtener_informacion_por_vehiculo($id_establecimiento, $id_vehiculo){
	$vehiculo = Array();

	$vehiculo_ = Vehiculo::find('first', array('conditions' => array('establecimiento_id = ? and id = ?', $id_establecimiento, $id_vehiculo)));

	if($vehiculo_){
		$vehiculo= Array(
							'ID'                 => $vehiculo_->id,
							'DOMINIO'            => $vehiculo_->dominio,
							'TIPO_VEHICULO'		 => $vehiculo_->tipo_vehiculo,
							'TIPO_CAJA'		 	 => $vehiculo_->tipo_caja,
							'DESCRIPCION'        => $vehiculo_->descripcion
						);
	}

	return $vehiculo;
}

function obtener_datos_por_vehiculo($id_vehiculo){
	$vehiculo = Array();

	$vehiculo_ = Vehiculo::find('first', array('conditions' => array('establecimiento_id = ? and id = ?', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $id_vehiculo)));

	if($vehiculo_){
		$vehiculo= Array(
							'ID'                 => $vehiculo_->id,
							'DOMINIO'            => $vehiculo_->dominio,
							'DESCRIPCION'        => $vehiculo_->descripcion,
							'TIPO_VEHICULO'		 => $vehiculo_->tipo_vehiculo,
							'TIPO_CAJA'		 	 => $vehiculo_->tipo_caja,
						);
	}

	return $vehiculo;
}

function obtener_participantes_pendientes($id_manifiesto){
	$id_manifiesto = (int)$id_manifiesto;

	$pendientes  = 0;
	$pendientes += GeneradorManifiesto::count(Array("conditions"     => Array("manifiesto_id = ? and estado = ?", $id_manifiesto, 'p')));
	$pendientes += TransportistaManifiesto::count(Array("conditions" => Array("manifiesto_id = ? and estado = ?", $id_manifiesto, 'p')));
	$pendientes += OperadorManifiesto::count(Array("conditions"      => Array("manifiesto_id = ? and estado = ?", $id_manifiesto, 'p')));

	return $pendientes;
}

function obtener_aprobados_manifiesto($id_manifiesto){
	$id_manifiesto = (int)$id_manifiesto;

	$generador_estado[] = GeneradorManifiesto::find('all',array("select" => "estado", "conditions" => Array("manifiesto_id = ?", $id_manifiesto)));
	$transportista_estado = TransportistaManifiesto::find(array("select" => "estado", "conditions" => Array("manifiesto_id = ?", $id_manifiesto)));
	$operador_estado = OperadorManifiesto::find(array("select" => "estado", "conditions" => Array("manifiesto_id = ?", $id_manifiesto)));
	foreach ($generador_estado[0] as $key => $value) {
		$generador_estado_completo[] = $value->estado;
	}
	$estado = array("generador" => $generador_estado_completo, "transportista" => $transportista_estado->estado, "operador" => $operador_estado->estado);
	return $estado;
}

function obtener_generador_aceptacion_manifiesto($id_manifiesto, $id_establecimiento){
	$id_manifiesto = (int)$id_manifiesto;
	$pendientes  = 0;
	$pendientes += GeneradorManifiesto::count(Array("conditions"     => Array("manifiesto_id = ? and establecimiento_id  = ? and estado = ?", $id_manifiesto,$id_establecimiento ,'p')));
	return $pendientes;
}

function obtener_operador_aceptacion_manifiesto($id_manifiesto, $id_establecimiento){
	$id_manifiesto = (int)$id_manifiesto;
	$pendientes  = 0;
	$pendientes += OperadorManifiesto::count(Array("conditions"      => Array("manifiesto_id = ? and estado = ?", $id_manifiesto, 'p')));
	return $pendientes;
}

function obtener_transportista_aceptacion_manifiesto($id_manifiesto, $id_establecimiento){
	$id_manifiesto = (int)$id_manifiesto;
	$pendientes  = 0;
	$pendientes += TransportistaManifiesto::count(Array("conditions" => Array("manifiesto_id = ? and estado = ?", $id_manifiesto, 'p')));
	return $pendientes;
}

function obtener_vehiculo($id_vehiculo){
	$vehiculos = Array();
	$vehiculo_ = Vehiculo::find('all', array('conditions' => array('id = ? ', $id_vehiculo)));
	foreach($vehiculo_ as $vehiculo){
		$vehiculos= Array(
									'ID'                 => $vehiculo->id,
									'DOMINIO'            => $vehiculo->dominio,
									'DESCRIPCION'        => $vehiculo->descripcion,
									'TIPO_VEHICULO'		 => $vehiculo_->tipo_vehiculo,
									'TIPO_CAJA'		 	 => $vehiculo_->tipo_caja,
								);

	}



	return $vehiculos;

}

function obtener_id_manifiesto_valido($id_manifiesto){
	$manifiestos  = Array();
	$manifiestos_ = Manifiesto::find_by_sql("select * from manifiestos where id='$id_manifiesto'");
	return $manifiestos_;
}

/**
 * obtener_estadisticas_establecimiento()
 *
 * @param mixed $id_establecimiento
 * @return
 */
function obtener_estadisticas_establecimiento($id_establecimiento)
{
	$m = new Manifiesto();
	$manifiestos = $m->obtener_manifiestos_creados_establecimiento($id_establecimiento);

	$estadisticas = array(
		"MANIFIESTOS_CREADOS" => 0,
		"MANIFIESTOS_PENDIENTES" => 0,
		"MANIFIESTOS_ACEPTADOS" => 0,
		"MANIFIESTOS_RECHAZADOS" =>0,
		"MANIFIESTOS_RECIBIDOS" =>0,
		"MANIFIESTOS_FINALIZADOS" => 0,
		"MANIFIESTOS_VENCIDOS" => 0,
	);

	foreach($manifiestos as $unManifiesto)
	{
		$estadisticas["MANIFIESTOS_CREADOS"] += $unManifiesto->cantidad;
		switch ($unManifiesto->estado) {
			case "p":
				$estadisticas["MANIFIESTOS_PENDIENTES"] = $unManifiesto->cantidad;
				break;
			case "a":
				$estadisticas["MANIFIESTOS_ACEPTADOS"] = $unManifiesto->cantidad;
				break;
			case "e":
				$estadisticas["MANIFIESTOS_RECIBIDOS"] = $unManifiesto->cantidad;
				break;
			case "r":
				$estadisticas["MANIFIESTOS_RECHAZADOS"] = $unManifiesto->cantidad;
				break;
			case "f":
				$estadisticas["MANIFIESTOS_FINALIZADOS"] = $unManifiesto->cantidad;
				break;
			case "v":
				$estadisticas["MANIFIESTOS_VENCIDOS"] = $unManifiesto->cantidad;
				break;
		}
	}

	// formularios
	$formulario = new formularios;
	$estadisticas["FORMULARIOS_DISPONIBLES"] = $formulario->cantidadDeFormulariosNPorEmpresa($id_establecimiento);

	return $estadisticas;
}

/**
 * actualizar_estadisticas_del_usuario()
 *
 * @param mixed $id_establecimiento
 */
function actualizar_estadisticas_del_usuario()
{
	$user_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
	$_SESSION['INFORMACION_GENERAL']['ESTADISTICAS'] = obtener_estadisticas_establecimiento($user_id);
}

function obtener_informacion_manifiesto($id_manifiesto)
{
	$manifiesto  = Array();
	$manifiesto_ = Manifiesto::find('first', array('conditions' => array('id = ?', $id_manifiesto)));

	if($manifiesto_){
		$creador = @obtener_informacion_por_establecimiento($manifiesto_->establecimiento_creador);
		$creador = $creador['ESTABLECIMIENTO'];

		$manifiesto['ID']                 = $manifiesto_->id;
		$manifiesto['TIPO_MANIFIESTO']	  = $manifiesto_->tipo_manifiesto;
		$manifiesto['FECHA_CREACION']     = formatear_fecha_activerecord($manifiesto_->fecha_creacion);
		$manifiesto['FECHA_ACEPTACION']   = formatear_fecha_activerecord($manifiesto_->fecha_aceptacion);
		$manifiesto['FECHA_RECEPCION']    = formatear_fecha_activerecord($manifiesto_->fecha_recepcion);
		$manifiesto['FECHA_TRATAMIENTO']  = formatear_fecha_activerecord($manifiesto_->fecha_tratamiento);
		$manifiesto['NUMERO_PROTOCOLO']   = $manifiesto_->id_protocolo_manifiesto;
		$manifiesto['OBSERVACIONES']      = $manifiesto_->observaciones;
		$manifiesto['ESTADO_AUTORIZACION_DRP'] = $manifiesto_->estado_autorizacion_drp;
		$manifiesto['MANIFIESTO_PADRE']	  = $manifiesto_->manifiesto_padre;
		$manifiesto['CREADOR']            = Array(
			'ID' => $creador['ID'],
			'CUIT' => $creador['CUIT'],
			'NOMBRE_ESTABLECIMIENTO' => $creador['NOMBRE'],
		);

		$generadores_ = GeneradorManifiesto::find('all', array('conditions' => array('manifiesto_id = ?', $manifiesto_->id)));
		foreach($generadores_ as $generador_){
			$generador = obtener_informacion_por_establecimiento($generador_->establecimiento_id);

			if($generador){
				$nro_tel   = $generador['EMPRESA']['NUMERO_TELEFONICO'];
				$generador = $generador['ESTABLECIMIENTO'];

				$generador__ = Array(
										'ID'                => $generador['ID'],
										'CUIT'              => $generador['CUIT'],
										'NOMBRE'    		=> $generador['NOMBRE'],
										'NOMBRE_EMPRESA'    => $generador['NOMBRE_EMPRESA'],
										'CALLE'             => $generador['CALLE_R'],
										'NUMERO'            => $generador['NUMERO_R'],
										'PISO'              => $generador['PISO_R'],
										'CALLE_C'           => $generador['CALLE_C'],
										'NUMERO_C'          => $generador['NUMERO_C'],
										'PISO_C'            => $generador['PISO_C'],
										'LOCALIDAD'         => obtener_localidad($generador['LOCALIDAD']),
										'EXPEDIENTE_NUMERO' => $generador['EXPEDIENTE_NUMERO'],
										'EXPEDIENTE_ANIO'   => $generador['EXPEDIENTE_ANIO'],
										'CAA_NUMERO'        => $generador['CAA_NUMERO'],
										'CAA_VENCIMIENTO'   => $generador['CAA_VENCIMIENTO'],
										'FLAG'				=> $generador['FLAG'],
										'EMAIL' 			=> $generador['EMAIL'],
										'NUMERO_TELEFONICO' => $nro_tel,
										'CANT_RESIDUO' 		=> $generador_->cant_residuo,
									 );

				$manifiesto['GENERADORES'][] = $generador__;
			}
		}

		$transportistas_ = TransportistaManifiesto::find('all', array('conditions' => array('manifiesto_id = ?', $manifiesto_->id)));
		foreach($transportistas_ as $transportista_){
			$transportista = obtener_informacion_por_establecimiento($transportista_->establecimiento_id);

			if($transportista){
				$nro_tel       = $transportista['EMPRESA']['NUMERO_TELEFONICO'];
				$transportista = $transportista['ESTABLECIMIENTO'];

				$transportista__ = Array(
										'ID'                => $transportista['ID'],
										'CUIT'              => $transportista['CUIT'],
										'NOMBRE'    		=> $transportista['NOMBRE'],
										'NOMBRE_EMPRESA'	=> $transportista['NOMBRE_EMPRESA'],
										'CALLE'             => $transportista['CALLE_R'],
										'NUMERO'            => $transportista['NUMERO_R'],
										'PISO'              => $transportista['PISO_R'],
										'CALLE_C'           => $transportista['CALLE_C'],
										'NUMERO_C'          => $transportista['NUMERO_C'],
										'PISO_C'            => $transportista['PISO_C'],
										'EXPEDIENTE_NUMERO' => $transportista['EXPEDIENTE_NUMERO'],
										'EXPEDIENTE_ANIO'   => $transportista['EXPEDIENTE_ANIO'],
										'CAA_NUMERO'        => $transportista['CAA_NUMERO'],
										'FLAG'				=> $transportista['FLAG'],
										'CAA_VENCIMIENTO'   => $transportista['CAA_VENCIMIENTO'],
										'NUMERO_TELEFONICO' => $nro_tel,
										'VEHICULOS'         => Array()
									 );

				//					$vehiculos_ = VehiculoManifiesto::find('all', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $manifiesto_->id, $transportista['ID'])));
				$vehiculos_ = VehiculoManifiesto::find('all', array('conditions' => array('manifiesto_id = ?', $manifiesto_->id)));
				foreach($vehiculos_ as $vehiculo_){
					$vehiculo = obtener_informacion_por_vehiculo($transportista['ID'], $vehiculo_->vehiculo_id);

					if($vehiculo){
						$vehiculo['UTILIZADO'] = $vehiculo_->utilizado;
						$transportista__['VEHICULOS'][] = $vehiculo;
					}
				}

				$manifiesto['TRANSPORTISTAS'][] = $transportista__;
			}
		}

		$operadores_ = OperadorManifiesto::find('all', array('conditions' => array('manifiesto_id = ?', $manifiesto_->id)));
		foreach($operadores_ as $operador_){
			$operador = obtener_informacion_por_establecimiento($operador_->establecimiento_id);

			if($operador){
				$nro_tel  = $operador['EMPRESA']['NUMERO_TELEFONICO'];
				$operador = $operador['ESTABLECIMIENTO'];

				$operador__ = Array(
										'ID'                => $operador['ID'],
										'CUIT'              => $operador['CUIT'],
										'NOMBRE'    		=> $operador['NOMBRE'],
										'NOMBRE_EMPRESA'	=> $operador['NOMBRE_EMPRESA'],
										'CALLE'             => $operador['CALLE_R'],
										'NUMERO'            => $operador['NUMERO_R'],
										'PISO'              => $operador['PISO_R'],
										'CALLE_C'           => $operador['CALLE_C'],
										'NUMERO_C'          => $operador['NUMERO_C'],
										'PISO_C'            => $operador['PISO_C'],
										'EXPEDIENTE_NUMERO' => $operador['EXPEDIENTE_NUMERO'],
										'EXPEDIENTE_ANIO'   => $operador['EXPEDIENTE_ANIO'],
										'CAA_NUMERO'        => $operador['CAA_NUMERO'],
										'FLAG'				=> $operador['FLAG'],
										'CAA_VENCIMIENTO'   => $operador['CAA_VENCIMIENTO'],
										'NUMERO_TELEFONICO' => $nro_tel,
									 );

				$manifiesto['OPERADORES'][] = $operador__;
			}
		}

		$residuos_ = ResiduoManifiesto::find('all', array('conditions' => array('manifiesto_id = ?', $manifiesto_->id)));
		foreach($residuos_ as $residuo_){
			$residuo__ = Array(
									'ID'                     => $residuo_->id,
									'RESIDUO'                => $residuo_->residuo_id,
									'CONTENEDOR'             => $residuo_->contenedor_tipo_id,
									'CANTIDAD_CONTENEDORES'  => $residuo_->contenedor_cantidad,
									'CANTIDAD_ESTIMADA'      => $residuo_->cantidad_estimada,
									'CANTIDAD_REAL'          => $residuo_->cantidad_real,
									'ESTADO'                 => $residuo_->estado,
									'FECHA_TRATAMIENTO'		 => $residuo_->fecha_tratamiento,
									'TRATAMIENTO'            => $residuo_->tratamiento,
									'PELIGROSIDAD'           => $residuo_->peligrosidad,
								);

			$residuo__['RESIDUO_']    = obtener_categoria_residuo($residuo_->residuo_id);
			$residuo__['CONTENEDOR_'] = obtener_contenedor($residuo_->contenedor_tipo_id);
			$residuo__['ESTADO_']     = obtener_estado($residuo_->estado);

			$manifiesto['RESIDUOS'][] = $residuo__;
		}
	}

	return $manifiesto;
}

function obtener_flotas($establecimiento_id)
{
	$flotas  = Array();
	$flotas = Flota::find('all', array('conditions' => array('establecimiento_id = ? ', $establecimiento_id)));

	$flotas_ = Array();
	foreach($flotas as $flota){
		$flotas_[] = Array(
						'ID'					=> $flota->id,
						'ESTABLECIMIENTO_ID'	=> $flota->establecimiento_id,
						'DESCRIPCION'			=> $flota->descripcion
						);
	}

	return $flotas_;
}

function obtener_informacion_flota($establecimiento_id, $flota_id){
	$flota      = Array();
	$vehiculos_ = VehiculoFlota::find('all', array('conditions' => array('flota_id = ? ', $flota_id)));

	$vehiculos = Array();
	foreach($vehiculos_ as $vehiculo_){
		$vehiculo = obtener_informacion_por_vehiculo($establecimiento_id, $vehiculo_->vehiculo_id);

		$vehiculos[] = $vehiculo;
	}

	$flota['ID']        = $flota_id;
	$flota['VEHICULOS'] = $vehiculos;

	return $flota;
}

function obtener_rutas($establecimiento_id){
	$rutas  = Array();
	$rutas = Ruta::find('all', array('conditions' => array('establecimiento_id = ? ', $establecimiento_id)));

	$rutas_ = Array();
	foreach($rutas as $ruta){
		$rutas_[] = Array(
						'ID'					=> $ruta->id,
						'ESTABLECIMIENTO_ID'	=> $ruta->establecimiento_id,
						'DESCRIPCION'			=> $ruta->descripcion
						);
	}

	return $rutas_;
}

function obtener_informacion_ruta($ruta_id){
	$ruta             = Array();
	$establecimientos_= EstablecimientoRuta::find('all', array('conditions' => array('ruta_id = ? ', $ruta_id)));

	$establecimientos = Array();
	foreach($establecimientos_ as $establecimiento_){
		$establecimiento = obtener_informacion_por_establecimiento($establecimiento_->establecimiento_id);

		if ($establecimiento['ESTABLECIMIENTO']) {
			$establecimientos[] = $establecimiento['ESTABLECIMIENTO'];
		}
	}

	$ruta['ID']               = $ruta_id;
	$ruta['ESTABLECIMIENTOS'] = $establecimientos;

	return $ruta;
}

function guardar_nueva_ruta(){
	$rutas  = Array();
	$atributos = array('establecimiento_id' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], 'descripcion'=> $_SESSION['GENERADORES']['NOMBRE']);
	$ruta = Ruta::create($atributos);
	foreach ($_SESSION['GENERADORES']['RUTAS'] as $value) {
		$atributos = array('establecimiento_id' => $value, 'ruta_id'=> $ruta->id);
		$resultado[] = EstablecimientoRuta::create($atributos);
	}

	return $resultado;
}

function eliminar_ruta_por_id($id){

		$resultado = array();
		try {
			$establecimiento = EstablecimientoRuta::find('all',array('conditions' => array('ruta_id=?', $id)));
			foreach ($establecimiento as $value) {
				$value->delete();
			}
			$ruta = Ruta::find($id);
			$ruta->delete();
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
}

function eliminar_generador($ruta_id, $establecimiento_id){

		$resultado = array();
		try {
			$query = EstablecimientoRuta::first(array('conditions' => array('ruta_id = ? AND establecimiento_id = ?', $ruta_id, $establecimiento_id)));
			$query->delete();
			$resultado['establecimiento_id'] = trim($establecimiento_id);
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
}

function agregar_generador($ruta_id, $establecimiento_id){

		$resultado = array();
		try {
			$atributos = array('establecimiento_id' => $establecimiento_id, 'ruta_id'=> $ruta_id);
			$resultado = EstablecimientoRuta::create($atributos);
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
}

function obtener_informacion_representante_legal_drp($id){
	$representante = Array();
	$informacion   = RepresentanteLegal::find('first', array('conditions' => array('id = ?', $id)));

	if($informacion){
		$representante = Array(
									'ID'               => $informacion->id,
									'NOMBRE'           => $informacion->nombre,
									'APELLIDO'         => $informacion->apellido,
									'FECHA_NACIMIENTO' => formatear_fecha_activerecord($informacion->fecha_nacimiento),
									'TIPO_DOCUMENTO'   => $informacion->tipo_documento,
									'NUMERO_DOCUMENTO' => $informacion->numero_documento,
									'CUIT'             => $informacion->cuit,

									'TIPO_DOCUMENTO_'  => obtener_tipo_documento($informacion->tipo_documento)
								);
	}

	return $representante;
}

function obtener_informacion_representante_tecnico_drp($id){
	$representante = Array();
	$informacion   = RepresentanteTecnico::find('first', array('conditions' => array('id = ?', $id)));

	if($informacion){
		$representante = Array(
									'ID'               => $informacion->id,
									'NOMBRE'           => $informacion->nombre,
									'APELLIDO'         => $informacion->apellido,
									'FECHA_NACIMIENTO' => formatear_fecha_activerecord($informacion->fecha_nacimiento),
									'TIPO_DOCUMENTO'   => $informacion->tipo_documento,
									'NUMERO_DOCUMENTO' => $informacion->numero_documento,
									'CARGO'            => $informacion->cargo,
									'CUIT'             => $informacion->cuit,

									'TIPO_DOCUMENTO_'  => obtener_tipo_documento($informacion->tipo_documento)
								);
	}

	return $representante;
}

function obtener_informacion_empresa_drp($id){
	$empresa     = Array();
	$informacion = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $id, 'p')));

	if($informacion){
		$empresa = Array(
							'ID'                        => $informacion->id,
							'NOMBRE'                    => $informacion->nombre,
							'CUIT'                      => $informacion->cuit,
							'ROLES'                     => Array(  'GENERADOR'     => $informacion->rol_generador,
													   			   'TRANSPORTISTA' => $informacion->rol_transportista,
												 				   'OPERADOR'      => $informacion->rol_operador),

							'FECHA_INICIO_ACT'          => formatear_fecha_activerecord($informacion->fecha_inicio_act),

							'CALLE_R'                   => $informacion->calle,
							'NUMERO_R'                  => $informacion->numero,
							'PISO_R'                    => $informacion->piso,
							'OFICINA_R'                 => $informacion->oficina,
							'PROVINCIA_R'               => $informacion->provincia,
							'LOCALIDAD_R'	            => $informacion->localidad,

							'CALLE_L'                   => $informacion->calle_l,
							'NUMERO_L'                  => $informacion->numero_l,
							'PISO_L'                    => $informacion->piso_l,
							'OFICINA_L'                 => $informacion->oficina_l,
							'PROVINCIA_L'               => $informacion->provincia_l,
							'LOCALIDAD_L'	            => $informacion->localidad_l,

							'CALLE_C'                   => $informacion->calle_c,
							'NUMERO_C'                  => $informacion->numero_c,
							'PISO_C'                    => $informacion->piso_c,
							'OFICINA_C'                 => $informacion->oficina_c,
							'PROVINCIA_C'               => $informacion->provincia_c,
							'LOCALIDAD_C'	            => $informacion->localidad_c,

							'NUMERO_TELEFONICO'         => $informacion->numero_telefonico,

							'PROVINCIA_R_'              => obtener_provincia($informacion->provincia),
							'LOCALIDAD_R_'              => obtener_localidad($informacion->localidad),

							'PROVINCIA_L_'              => obtener_provincia($informacion->provincia_l),
							'LOCALIDAD_L_'              => obtener_localidad($informacion->localidad_l),

							'PROVINCIA_C_'              => obtener_provincia($informacion->provincia_c),
							'LOCALIDAD_C_'              => obtener_localidad($informacion->localidad_c),
						);
	}

	return $empresa;
}

function obtener_informacion_establecimiento_drp($id){
	$establecimiento = Array();
	$informacion     = Establecimiento::find('first', array('conditions' => array('id = ?', $id)));

	if($informacion){
		$establecimiento = Array(
									'ID'                               => $informacion->id,
									'NOMBRE'                           => $informacion->nombre,
									'TIPO'                             => $informacion->tipo,
									'USUARIO'                          => $informacion->usuario,
									'CONTRASENIA'                      => $informacion->contrasenia,
									'CAA_NUMERO'                       => $informacion->caa_numero,
									'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($informacion->caa_vencimiento),
									'FLAG'							   => $informacion->flag,
									'EXPEDIENTE_NUMERO'                => $informacion->expediente_numero,
									'EXPEDIENTE_ANIO'                  => $informacion->expediente_anio,
									'ACTIVIDAD'                        => $informacion->codigo_actividad,
									'DESCRIPCION'                      => $informacion->descripcion,

									'CALLE_R'                          => $informacion->calle,
									'NUMERO_R'                         => $informacion->numero,
									'PISO_R'                           => $informacion->piso,
									'PROVINCIA_R'                      => $informacion->provincia,
									'LOCALIDAD_R'                      => $informacion->localidad,

									'LATITUD'                          => $informacion->latitud,
									'LONGITUD'                         => $informacion->longitud,


									'CALLE_C'                          => $informacion->calle_c,
									'NUMERO_C'                         => $informacion->numero_c,
									'PISO_C'                           => $informacion->piso_c,
									'PROVINCIA_C'                      => $informacion->provincia_c,
									'LOCALIDAD_C'                      => $informacion->localidad_c,

									'NOMENCLATURA_CATASTRAL_CIRC'      => $informacion->nomenclatura_catastral_circ,
									'NOMENCLATURA_CATASTRAL_SEC'       => $informacion->nomenclatura_catastral_sec,
									'NOMENCLATURA_CATASTRAL_MANZ'      => $informacion->nomenclatura_catastral_manz,
									'NOMENCLATURA_CATASTRAL_PARC'      => $informacion->nomenclatura_catastral_parc,
									'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $informacion->nomenclatura_catastral_sub_parc,
									'HABILITACIONES'                   => $informacion->habilitaciones,


									'TIPO_'                            => obtener_tipo($informacion->tipo),
									'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($informacion->codigo_actividad)),

							#temporal
									'PROVINCIA_'                       => obtener_provincia($informacion->provincia),
									'LOCALIDAD_'                       => obtener_localidad($informacion->localidad),
							#temporal

									'PROVINCIA_R_'                     => obtener_provincia($informacion->provincia),
									'LOCALIDAD_R_'                     => obtener_localidad($informacion->localidad),

									'PROVINCIA_C_'                     => obtener_provincia($informacion->provincia_c),
									'LOCALIDAD_C_'                     => obtener_localidad($informacion->localidad_c)
								);
	}

	return $establecimiento;
}

function obtener_informacion_permiso_establecimiento_drp($id){
	$permiso     = Array();
	$informacion = PermisoEstablecimiento::find('first', array('conditions' => array('id = ?', $id)));

	if($informacion){
		$permiso = Array(
									'ID'           => $informacion->id,
									'RESIDUO'      => $informacion->residuo,
									'CANTIDAD'     => $informacion->cantidad,
									'ESTADO'       => $informacion->estado,
								);

		$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
		$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);
	}

	return $permiso;
}

function obtener_informacion_permiso_vehiculo_drp($id){
	$permiso     = Array();
	$informacion = PermisoVehiculo::find('first', array('conditions' => array('id = ?', $id)));

	if($informacion){
		$permiso = Array(
									'ID'           => $informacion->id,
									'RESIDUO'      => $informacion->residuo,
									'CANTIDAD'     => $informacion->cantidad,
									'ESTADO'       => $informacion->estado,
									'FECHA_INICIO' => formatear_fecha_activerecord($informacion->fecha_inicio),
									'FECHA_FIN'    => formatear_fecha_activerecord($informacion->fecha_fin),
								);

		$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
		$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);
	}

	return $permiso;
}

#filtros
function filtrar_residuos_compatibles($residuos_a, $residuos_b, $inverso = False)
{
	$incompatibles = Array();

	for($x = 0 ; $x < count($residuos_a) ; $x++){
		$compatible = False;

		for($y = 0 ; $y < count($residuos_b) ; $y++){
			if($residuos_a[$x]['RESIDUO'] == $residuos_b[$y]['RESIDUO']){
				$compatible = True;
				break;
			}
		}

		if($inverso === True && $compatible === True){
			$incompatibles[] = $x;
		}else if($inverso === False && $compatible === False){
			$incompatibles[] = $x;
		}

	}

	foreach ($incompatibles as $id_residuo) {
		unset($residuos_a[$id_residuo]);
	}

	return $residuos_a;
}
#filtros

#formato

function convertir_fecha_es_en($fecha){
	$formato = 'd/m/Y';
	$retorno = '';

	try {
		$fecha_ = DateTime::createFromFormat($formato, $fecha);

		if($fecha_ != null){
			$retorno = $fecha_->format('Y-m-d');
		}
	}catch (Exception $e){
		$retorno = '';
	}

	return $retorno;
}

function formatear_fecha_activerecord($fecha){
	$retorno = '';

	if(!is_null($fecha)){
		try {
			$retorno = $fecha->format('d/m/Y');
		}catch (Exception $e){
			$retorno = '';
		}
	}

	return $retorno;
}

function formatear_fecha_activerecord_en($fecha){
	$retorno = '';

	if(!is_null($fecha)){
		try {
			$retorno = $fecha->format('d-m-Y');
		}catch (Exception $e){
			$retorno = '';
		}
	}

	return $retorno;
}
#formato

#estadisticas
function obtener_estadistica_registraciones(){
	$resultado = Array();

	$resultado['PENDIENTES'] = Empresa::count(array('conditions' => array('flag = ? ', 'p')));

	$cantidades = Empresa::all(array('select' => 'count(id) as cantidad, week(fecha_inscripcion) as semana',  'from' => 'empresas', 'group' => 'week(fecha_inscripcion)'));
	foreach($cantidades as $cantidad){
		$resultado['SEMANALES'][] = Array(	'SEMANA'   => $cantidad->semana,
											'CANTIDAD' => $cantidad->cantidad
										);
	}

	$cantidades = Empresa::all(array('select' => 'count(id) as cantidad, month(fecha_inscripcion) as mes',  'from' => 'empresas', 'group' => 'month(fecha_inscripcion)'));
	foreach($cantidades as $cantidad){
		$resultado['MENSUALES'][] = Array(	'MES'      => $cantidad->mes,
											'CANTIDAD' => $cantidad->cantidad
										);
	}

	return $resultado;
}

function obtener_estadistica_manifiestos(){
	#		$resultado = Empresa::count(array('conditions' => array('flag = p ')));

	#		print_r($resultado);exit;

	#		return $resultado;
}

#validacion
function validar_registracion_pendiente($cuit){
	$registracion = Empresa::find('first', array('conditions' => array('cuit = ? and flag = ?', $cuit, 'p')));

	return !is_null($registracion);
}

#validacion
function validar_registracion_activa($cuit){
	$registracion = Empresa::find('first', array('conditions' => array('cuit = ? and flag = ?', $cuit, 't')));

	return !is_null($registracion);
}

function validar_captcha($valor){
	$captcha = new Securimage();
	$captcha_valido = $captcha->check($valor);
	return ($captcha_valido == 1);
}

function validar_cuit($valor){
	return verificar_cuit($valor);
}

function validar_cuit_tabla($valor)
{
	$pj = PersonaJuridica::find_by_cuit($valor);
	$pje = PersonaJuridicaExcepcion::find_by_cuit($valor);

	return ($pj OR $pje) ? true : false;
}

/**
* Devuelve el listado de operaciones de eliminación (cat_operaciones_residuos)
* @return array
*/
function obtener_categorias_operaciones(){
	$operaciones  = Array();
	//$operaciones_ = OperacionesResiduos::find('all');
	$operaciones_ = TratamientoResiduo::find('all');

	foreach($operaciones_ as &$residuo){
		$operaciones[] = Array( 'CODIGO'      => $residuo->codigo,
							 'DESCRIPCION' => $residuo->descripcion
						   );
	}

	return $operaciones;
}

/**
* Devuelve la descripcion de una operacion de residuos
* @return String
*/
function obtener_categoria_operaciones_residuos($codigo){

	$operaciones = Array();

	// Codigo contiene los permisos de elimnacion
	foreach ($codigo as $key)
	{
		$operacion = OperacionesResiduos::find('first', array('conditions' => array('codigo = ?', $key)));

		if($operacion)
		{
			$operaciones[$key] = utf8_encode($operacion->descripcion);
		}
	}

	return $operaciones;
}

/**
* Devuelve la razon social según cuit
* @return String
*/
function obtener_razon_social($cuit)
{
	$razon_social = PersonaJuridica::get_RazonSocial($cuit);

	if ( ! $razon_social) {
		$razon_social = PersonaJuridicaExcepcion::find('first', array('conditions' => array('cuit = ?', $cuit)))->razon_social;
	}

	return $razon_social;
}

/**
 * Verifica que el cuit pasado sea valido
 *
 * @param string $cuit
 * @return bool
 */
function verificar_cuit($cuit)
{
	$verificador = obtener_digito_verificador($cuit);
	$cuit = str_replace('-', '', $cuit);

	if(strlen($cuit) != 11)
		return false;

	if($cuit[10] == $verificador)
	{
		return true;
	}
	else
	{
		return false;
	}
}

/**
 * Obtiene el digito verificador para el cuit
 *
 * @param string $cuit
 * @return int
 */
function obtener_digito_verificador($cuit)
{
	$cuit = substr($cuit,0,10);

	if(strlen($cuit)===10){
		$ab = $cuit[0].$cuit[1];
	}
	else
	{
		return false;
	}

	if(!($ab == 20 or $ab == 23 or $ab == 24 or $ab == 27 or $ab == 30 or $ab == 33 or $ab == 34)){
		return false;
	}
	else
	{
		$multiplicadores = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);

		$i=0;
		$suma = 0;
		while($i<10)
		{
			$suma += $cuit[$i] * $multiplicadores[$i];
			$i++;
		}

		$verificador = 11 - ($suma % 11);

		switch(true) {
			case $verificador == 11:
				$verificador = 0;
				break;
			case $verificador == 10:
				$verificador = 9;
				break;
			case $verificador < 10:
				$verificador;
				break;
			default:
				return false;
		}
		return $verificador;
	}
}

/**
* Devuelve el nombre del tipo de empresa según id
*	@return String
*/
function obtener_nombre_paso($id)
{
	switch($id)
	{
		case '1':
			$nombre = 'Generador';
			break;

		case '2':
			$nombre = 'Transportista';
			break;

		case '3':
			$nombre = 'Operador';
			break;

		default:
			exit('No tiene permisos para acceder a esta sección');
	}

	return $nombre;
}

/**
 * Devuelve las Ys que lleva el manifiesto actual. Guardado en session mientras se genera.
 */
function obtener_residuos_manifiesto_actual_as_array()
{

	$residuos_manifiesto  = array();

	foreach ($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $residuo) {
		$residuos_manifiesto[$residuo['RESIDUO']] = $residuo['RESIDUO'];
	}

	return $residuos_manifiesto;
}

function formatear_id_protocolo_manifiesto($id)
{
	$ceros = "";
	$id = trim($id);
	if (strlen($id) < 10) {
	    for ($i = strlen($id); $i < 10; $i++) {
	        $ceros .="0";
	    }
	}

	$protocolo_formateado = $ceros.$id;
	return $protocolo_formateado;
}
function listadoDePeligrosidad(){
	$query = Peligrosidad::find('all');

	foreach ($query as $value) {
		$peligrosidad[] = array(
		    "id" => $value->id,
		    "codigo" => $value->codigo,
			"descripcion" => $value->descripcion
		);
	}
	return $peligrosidad;
}

function decode_post_utf8()
{
	if ($_POST)
	{
		foreach ($_POST as $key => &$value) {
			if ( ! is_array($value)) {
				$_POST[$key] = utf8_decode($value);
			}
		}
	}
}

function decode_get_utf8()
{
	if ($_GET)
	{
		foreach ($_GET as $key => &$value) {
			if ( ! is_array($value)) {
				$_GET[$key] = utf8_decode($value);
			}
		}
	}
}

/**
 * Parsea los criterios de búsqueda para manifiestos (si existen) y los devuelve en un array.
 * De momento existen 5:
 *  - ID Establecimiento.
 *  - Tipo Manifiesto: siempre debe existir. De no ser así trabajaremos con manifiestos simples.
 *  - ID o Protocolo: no conviven. La idea es usar ID para pendientes y luego siempre el protocolo.
 *  - Cuit/Razón social de la empresa.
 *  - Fecha de creación del manifiesto.
 */
function obtener_criterios_busqueda_manifiestos()
{
	$params = array();
	$params['establecimiento_id'] = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	// tipo_manifiesto
	if (isset($_GET['tipo_manifiesto']) AND in_array($_GET['tipo_manifiesto'], array(TipoManifiesto::SIMPLE, TipoManifiesto::MULTIPLE, TipoManifiesto::SLOP))) {
		$params['tipo_manifiesto'] = $_GET['tipo_manifiesto'];
	} else {
		$params['tipo_manifiesto'] = TipoManifiesto::SIMPLE;
	}

	// manifiesto_id
	if (isset($_GET['manifiesto_id']) AND is_numeric($_GET['manifiesto_id'])) {
		$params['manifiesto_id'] = $_GET['manifiesto_id'];
	}

	// protocolo_id
	if (isset($_GET['protocolo_id']) AND is_numeric($_GET['protocolo_id'])) {
		$params['protocolo_id'] = $_GET['protocolo_id'];
	}

	// empresa
	if (isset($_GET['empresa']) AND trim($_GET['empresa']) != '') {
		$params['empresa'] = $_GET['empresa'];
	}

	// fecha_creacion
	if (isset($_GET['fecha_creacion']) AND trim($_GET['fecha_creacion']) != '') {
		$params['fecha_creacion'] = $_GET['fecha_creacion'];
	}

	// fecha_recepcion
	if (isset($_GET['fecha_recepcion']) AND trim($_GET['fecha_recepcion']) != '') {
		$params['fecha_recepcion'] = $_GET['fecha_recepcion'];
	}

	// fecha_tratamiento
	if (isset($_GET['fecha_tratamiento']) AND trim($_GET['fecha_tratamiento']) != '') {
		$params['fecha_tratamiento'] = $_GET['fecha_tratamiento'];
	}

	// fecha_rechazo
	if (isset($_GET['fecha_rechazo']) AND trim($_GET['fecha_rechazo']) != '') {
		$params['fecha_rechazo'] = $_GET['fecha_rechazo'];
	}

	if (isset($_GET['rechazados_por']) AND in_array($_GET['rechazados_por'], array('mi', 'otros'))) {
		$params['rechazados_por'] = $_GET['rechazados_por'];
	}

	if (isset($_GET['pendiente_por']) AND in_array($_GET['pendiente_por'], array('mi', 'otros'))) {
		$params['pendiente_por'] = $_GET['pendiente_por'];
	}

	return $params;
}

/**
 * Funcion para obtener rangos acorde a los filtros de busqueda en Estadísticas.
 */
function get_dates_from_params($params)
{
	$rango = isset($params->rango_estadisticas) ? $params->rango_estadisticas : $params->rango_estadisticas_slop;

	switch ($rango) {
		case 'last_month':
			$start = new DateTime('first day of last month');
			$end = new DateTime('last day of last month');
		break;
		case 'last_6_months':
			$start = new DateTime('first day of this month');
			$start->modify('-6 month');
			$end = new DateTime();
		break;
		case 'custom':
			if ($params->start_date AND $params->end_date) {
				$start = DateTime::createFromFormat('d/m/Y', $params->start_date);
				$end = DateTime::createFromFormat('d/m/Y', $params->end_date);
			} elseif ($params->start_date_slop AND $params->end_date_slop) {
				$start = DateTime::createFromFormat('d/m/Y', $params->start_date_slop);
				$end = DateTime::createFromFormat('d/m/Y', $params->end_date_slop);
			} else {
				$start = new DateTime('first day of this month');
				$end = new DateTime();	
			}
		break;
		case 'current_month':
			$start = new DateTime('first day of this month');
			$end = new DateTime();
		break;
		case 'today':
			$start = $end = new DateTime();
		break;
	}

	return array($start->format('Y-m-d'), $end->format('Y-m-d'));
}

function format_number_with_thousand_separator($number)
{
	return number_format($number, 2, "," , ".");
}

function arrayToObject($array)
{
	$obj = new stdclass;

	foreach ($_GET as $k => $v) {
		$obj->{$k} = $v;
	}

	return $obj;
}

?>
