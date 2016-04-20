<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$nomenclatura_catastral_circ = Range(0, 22);
	$nomenclatura_catastral_sec  = array_merge(Range(0, 99), Range('A', 'Z'));

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores = Array();


		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'id'                              => array('nombre' => 'Id',                              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'nombre'                          => array('nombre' => 'Nombre',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'usuario'                         => array('nombre' => 'Usuario de gestion',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'contrasenia'                     => array('nombre' => 'Contrasenia de gestion',          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
	//			'caa_numero'                      => array('nombre' => 'Numero de CAA',                   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
	//			'caa_vencimiento'                 => array('nombre' => 'Fecha de vencimiento de CAA',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'expediente_numero'               => array('nombre' => 'Numero de expediente',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'expediente_anio'                 => array('nombre' => 'A&ntilde;o de expediente',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'actividad'                       => array('nombre' => 'Actividad desarrollada',          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'descripcion'                     => array('nombre' => 'Descripcion',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'calle_r'                         => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'numero_r'                        => array('nombre' => 'Numeracion (real)',               'filter' => FILTER_VALIDATE_INT),
				'piso_r'                          => array('nombre' => 'Piso (real)',                     'filter' => FILTER_VALIDATE_INT),
				'provincia_r'                     => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
				'localidad_r'                     => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),

				'latitud_r'                       => array('nombre' => 'Latitud (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'longitud_r'                      => array('nombre' => 'Longitud (real)',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'calle_c'                         => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'numero_c'                        => array('nombre' => 'Numeracion (constituido)',        'filter' => FILTER_VALIDATE_INT),
				'piso_c'                          => array('nombre' => 'Piso (constituido)',              'filter' => FILTER_VALIDATE_INT),
				'provincia_c'                     => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
				'localidad_c'                     => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),

				'nomenclatura_catastral_circ'     => array('nombre' => 'Nomenclatura catastral circ',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_sec'      => array('nombre' => 'Nomenclatura catastral sec',      'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_manz'     => array('nombre' => 'Nomenclatura catastral manz',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_parc'     => array('nombre' => 'Nomenclatura catastral parc',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_sub_parc' => array('nombre' => 'Nomenclatura catastral sub parc', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'habilitaciones'                  => array('nombre' => 'Habilitaciones',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);

			if($post_valido){
				$validaciones = filter_input_array(INPUT_POST, $campos);
		
				foreach($validaciones as $campo => $resultado){
					if(strlen($resultado) == 0){
						$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
						$post_valido = false;
					}
				}
			}

			if($_POST['tipo'] != 1){
				$campos = array(
									'caa_numero'                      => array('nombre' => 'Numero de CAA',                   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
									'caa_vencimiento'                 => array('nombre' => 'Fecha de vencimiento de CAA',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
								);

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


		if(count($errores) == 0){
			if($_POST['accion'] == 'baja'){

				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$establecimiento = Establecimiento::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					if($establecimiento){
						//dar de baja los vehiculos
						$vehiculos = Vehiculo::all(Array('conditions' => Array('establecimiento_id = ?', $establecimiento->id)));
						foreach($vehiculos as $vehiculo){
							$permisos = PermisoVehiculo::all(Array('conditions' => Array('vehiculo_id = ?', $vehiculo->id)));
						
							foreach($permisos as $permiso){
								$permiso->flag                        = 'f';
								$permiso->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
								$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
								$permiso->save();
							}

							$vehiculo->flag                        = 'f';
							$vehiculo->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
							$vehiculo->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
							$vehiculo->save();
						}
						//dar de baja los vehiculos

						//dar de baja los permisos del establecimiento
						$permisos = PermisoEstablecimiento::all(Array('conditions' => Array('establecimiento_id = ?', $establecimiento->id)));
					
						foreach($permisos as $permiso){
							$permiso->flag                        = 'f';
							$permiso->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
							$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
							$permiso->save();
						}
						//dar de baja los permisos del establecimiento

						$establecimiento->flag                            = 'f';

						$establecimiento->fecha_ultima_modificacion       = strftime('%Y-%m-%d');
						$establecimiento->usuario_ultima_modificacion     = $_SESSION['INFORMACION_USUARIO']['ID'];

						$establecimiento->save();
					}

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}		


			}else{
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$establecimiento = Establecimiento::first(Array('conditions' => Array('id = ?', $_POST['id'])));


					$establecimiento->nombre                          = $_POST['nombre'];
	//				$establecimiento->fecha_inicio_act                = $_POST['fecha_inicio_act'];

					$establecimiento->caa_numero                      = $_POST['caa_numero'];
					$establecimiento->caa_vencimiento                 = convertir_fecha_es_en($_POST['caa_vencimiento']);
					$establecimiento->expediente_numero               = $_POST['expediente_numero'];
					$establecimiento->expediente_anio                 = $_POST['expediente_anio'];

					$establecimiento->codigo_actividad                = $_POST['actividad'];
					$establecimiento->descripcion                     = $_POST['descripcion'];

					$establecimiento->nomenclatura_catastral_circ     = $_POST['nomenclatura_catastral_circ'];
					$establecimiento->nomenclatura_catastral_sec      = $_POST['nomenclatura_catastral_sec'];
					$establecimiento->nomenclatura_catastral_manz     = $_POST['nomenclatura_catastral_manz'];
					$establecimiento->nomenclatura_catastral_parc     = $_POST['nomenclatura_catastral_parc'];
					$establecimiento->nomenclatura_catastral_sub_parc = $_POST['nomenclatura_catastral_sub_parc'];

					$establecimiento->habilitaciones                  = $_POST['habilitaciones'];

					$establecimiento->calle                           = $_POST['calle_r'];
					$establecimiento->numero                          = $_POST['numero_r'];
					$establecimiento->piso                            = $_POST['piso_r'];
					$establecimiento->provincia                       = $_POST['provincia_r'];
					$establecimiento->localidad                       = $_POST['localidad_r'];

					$establecimiento->latitud                         = $_POST['latitud_r'];
					$establecimiento->longitud                        = $_POST['longitud_r'];

					$establecimiento->calle_c                         = $_POST['calle_c'];
					$establecimiento->numero_c                        = $_POST['numero_c'];
					$establecimiento->piso_c                          = $_POST['piso_c'];
					$establecimiento->provincia_c                     = $_POST['provincia_c'];
					$establecimiento->localidad_c                     = $_POST['localidad_c'];

					$establecimiento->fecha_ultima_modificacion       = strftime('%Y-%m-%d');
					$establecimiento->usuario_ultima_modificacion     = $_SESSION['INFORMACION_USUARIO']['ID'];

					$establecimiento->save();

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}		
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$smarty->template_dir = SMARTY_DIR_TEMPLATES;
		$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
		$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
		$smarty->cache_dir    = SMARTY_DIR_CACHE;

		$informacion = obtener_informacion_establecimiento_drp($_GET['id']);

		$localidades_r = Array();
		$localidades_c = Array();

		$actividades = obtener_actividades();

		$provincias  = obtener_provincias();
		if($informacion){
			$localidades_r = obtener_localidades($informacion['PROVINCIA_R'], 0);
			$localidades_c = obtener_localidades($informacion['PROVINCIA_C'], 0);
		}

		if(empty($localidades_r))
			$localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);

		if(empty($localidades_c))
			$localidades_c = obtener_localidades($provincias[0]['CODIGO'], 0);

		$punto_inicio = $informacion['CALLE_R'] . " " .$informacion['NUMERO_R'] . ", " . obtener_localidad($informacion['LOCALIDAD_R']) . ", " . obtener_municipio_por_localidad($informacion['LOCALIDAD_R']) . ", " . obtener_provincia($informacion['PROVINCIA_R']) . ", " . " argentina";

		$smarty->assign('ACTIVIDADES',     $actividades);
		$smarty->assign('ESTABLECIMIENTO', $informacion);
		$smarty->assign('PROVINCIAS',      $provincias);
		$smarty->assign('PUNTO_INICIO',    $punto_inicio);
		$smarty->assign('LOCALIDADES_R',   $localidades_r);
		$smarty->assign('LOCALIDADES_C',   $localidades_c);
		$smarty->assign('NOMENCLATURA_CATASTRAL_CIRC', $nomenclatura_catastral_circ);
		$smarty->assign('NOMENCLATURA_CATASTRAL_SEC',  $nomenclatura_catastral_sec);

		$smarty->display('drp/operacion/editar_establecimiento.tpl');
	}

	session_write_close();
?>
