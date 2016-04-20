<?php
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(3, $_SESSION['PASOS_CORRECTOS'])){
		header("Location: /registracion/paso_3.php");
		exit;
	}

	$conexion = Empresa::connection();

	$conexion->transaction();
$fecha = time();
//echo $fecha; 
$mysql_datetime= strftime('%Y-%m-%d %H:%M:%S', $fecha);
//echo $mysql_datetime; 
$fecha = strftime('%Y-%m-%d');
	try{
		if($_SESSION['ALTA_FINALIZADA'] == true){
			throw new Exception("Es imposible grabar los datos ya que el tramite fue finalizado.");
		}

		$empresa = Empresa::create(Array(
										'nombre'             => $_SESSION['DATOS_EMPRESA']['NOMBRE'], 
										'cuit'               => $_SESSION['DATOS_EMPRESA']['CUIT'], 
										'fecha_inscripcion'  => $mysql_datetime,  
										'fecha_inicio_act'   => convertir_fecha_es_en($_SESSION['DATOS_EMPRESA']['FECHA_INICIO_ACT']), 
										'calle'              => $_SESSION['DATOS_EMPRESA']['CALLE_R'], 
										'numero'             => $_SESSION['DATOS_EMPRESA']['NUMERO_R'], 
										'piso'               => $_SESSION['DATOS_EMPRESA']['PISO_R'], 
										'oficina'            => $_SESSION['DATOS_EMPRESA']['OFICINA_R'],  
										'provincia'          => $_SESSION['DATOS_EMPRESA']['PROVINCIA_R'], 
										'localidad'          => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_R'], 
										'latitud'            => $_SESSION['DATOS_EMPRESA']['LATITUD_R'], 
										'longitud'           => $_SESSION['DATOS_EMPRESA']['LONGITUD_R'], 
										'calle_l'            => $_SESSION['DATOS_EMPRESA']['CALLE_L'], 
										'numero_l'           => $_SESSION['DATOS_EMPRESA']['NUMERO_L'], 
										'piso_l'             => $_SESSION['DATOS_EMPRESA']['PISO_L'], 
										'oficina_l'          => $_SESSION['DATOS_EMPRESA']['OFICINA_L'],  
										'provincia_l'        => $_SESSION['DATOS_EMPRESA']['PROVINCIA_L'], 
										'localidad_l'        => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_L'], 
										'calle_c'            => $_SESSION['DATOS_EMPRESA']['CALLE_C'], 
										'numero_c'           => $_SESSION['DATOS_EMPRESA']['NUMERO_C'], 
										'piso_c'             => $_SESSION['DATOS_EMPRESA']['PISO_C'], 
										'oficina_c'          => $_SESSION['DATOS_EMPRESA']['OFICINA_C'],  
										'provincia_c'        => $_SESSION['DATOS_EMPRESA']['PROVINCIA_C'], 
										'localidad_c'        => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_C'], 
										'numero_telefonico'  => $_SESSION['DATOS_EMPRESA']['NUMERO_TELEFONICO'], 
										'direccion_email'    => $_SESSION['DATOS_EMPRESA']['DIRECCION_EMAIL'], 
										'rol_generador'      => $_SESSION['DATOS_EMPRESA']['ROLES']['GENERADOR']     or 0, 
										'rol_transportista'  => $_SESSION['DATOS_EMPRESA']['ROLES']['TRANSPORTISTA'] or 0, 
										'rol_operador'       => $_SESSION['DATOS_EMPRESA']['ROLES']['OPERADOR']      or 0,  
										'flag'               => 't', 
							  ));

		foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento){
			$establecimiento_ = $empresa->create_establecimientos(Array(
																		'nombre'                          => $establecimiento['NOMBRE'], 
																		'tipo'                            => $establecimiento['TIPO'], 
																		'usuario'                         => $establecimiento['USUARIO'], 
																		'contrasenia'                     => $establecimiento['CONTRASENIA'], 
																		'caa_numero'                      => $establecimiento['CAA_NUMERO'], 
																		'caa_vencimiento'                 => convertir_fecha_es_en($establecimiento['CAA_VENCIMIENTO']), 
																		'expediente_numero'               => $establecimiento['EXPEDIENTE_NUMERO'], 
																		'expediente_anio'                 => $establecimiento['EXPEDIENTE_ANIO'], 
																		'codigo_actividad'                => $establecimiento['ACTIVIDAD'], 
																		'descripcion'                     => $establecimiento['DESCRIPCION'], 
																		'calle'                           => $establecimiento['CALLE_R'], 
																		'numero'                          => $establecimiento['NUMERO_R'], 
																		'piso'                            => $establecimiento['PISO_R'], 
																		'provincia'                       => $establecimiento['PROVINCIA_R'], 
																		'localidad'                       => $establecimiento['LOCALIDAD_R'], 
																		'latitud'                         => $establecimiento['LATITUD_R'], 
																		'longitud'                        => $establecimiento['LONGITUD_R'], 
																		'calle_c'                         => $establecimiento['CALLE_C'], 
																		'numero_c'                        => $establecimiento['NUMERO_C'], 
																		'piso_c'                          => $establecimiento['PISO_C'], 
																		'provincia_c'                     => $establecimiento['PROVINCIA_C'], 
																		'localidad_c'                     => $establecimiento['LOCALIDAD_C'], 
																		'nomenclatura_catastral_circ'     => $establecimiento['NOMENCLATURA_CATASTRAL_CIRC'], 
																		'nomenclatura_catastral_sec'      => $establecimiento['NOMENCLATURA_CATASTRAL_SEC'], 
																		'nomenclatura_catastral_manz'     => $establecimiento['NOMENCLATURA_CATASTRAL_MANZ'], 
																		'nomenclatura_catastral_parc'     => $establecimiento['NOMENCLATURA_CATASTRAL_PARC'], 
																		'nomenclatura_catastral_sub_parc' => $establecimiento['NOMENCLATURA_CATASTRAL_SUB_PARC'], 
																		'habilitaciones'                  => $establecimiento['HABILITACIONES'], 
															));

			foreach($establecimiento['PERMISOS'] as $permiso){
				$permiso_ = $establecimiento_->create_permisos_establecimientos(Array(
																						'residuo'                => $permiso['RESIDUO'], 
																						'cantidad'               => $permiso['CANTIDAD'], 
																						'estado'                 => $permiso['ESTADO'], 
																						'fecha_inicio'           => convertir_fecha_es_en($permiso['FECHA_INICIO']), 
																						'fecha_fin'              => convertir_fecha_es_en($permiso['FECHA_FIN']) 
																	));
			}
		}

		$_SESSION['DATOS_EMPRESA']['PERMITIR_MODIFICACION'] = false;
		$conexion->commit();
		$_SESSION['DATOS_EMPRESA']['ID'] = $empresa->id;
		$_SESSION['ALTA_FINALIZADA'] = true;
		$error = null;
	} catch (\Exception $e) {
		$conexion->rollback();
		$error = $e->getMessage();
	}

	$smarty   = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$smarty->assign('EMPRESA', $_SESSION['DATOS_EMPRESA']);
	$smarty->assign('ERROR',   $error);

	$smarty->display('operacion/operador/alta_temprana/finalizar.tpl');

	session_write_close();
?>
