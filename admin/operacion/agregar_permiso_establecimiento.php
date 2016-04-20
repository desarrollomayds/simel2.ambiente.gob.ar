<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	$categorias = obtener_categorias_residuos();

	$smarty  = inicializar_smarty();
	// acl
	$modulo_id = 24;


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno = array();
		$errores = array();
		$permiso = array();

		$post_valido = true;
	
		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'establecimiento' => array('nombre' => 'Identificador de establecimiento', 'filter' => FILTER_VALIDATE_INT),
				'residuo'         => array('nombre' => 'Codigo de residuo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad'        => array('nombre' => 'Cantidad',                         'filter' => FILTER_VALIDATE_INT),
				'estado'          => array('nombre' => 'Estado',                           'filter' => FILTER_VALIDATE_INT),
//				'fecha_inicio'    => array('nombre' => 'Fecha de inicio',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
//				'fecha_fin'       => array('nombre' => 'Fecha de fin',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
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
		}
		#validaciones

		if(!count($errores)){
			$conexion = Manifiesto::connection();

			$conexion->transaction();

			try{
				$permiso = PermisoEstablecimiento::create(Array(
																'establecimiento_id'          => $_POST['establecimiento'], 
																'residuo'                     => $_POST['residuo'], 
																'cantidad'                    => $_POST['cantidad'], 
																'estado'                      => $_POST['estado'], 
																'fecha_inicio'                => convertir_fecha_es_en($_POST['fecha_inicio']), 
																'fecha_fin'                   => convertir_fecha_es_en($_POST['fecha_fin']), 
																'fecha_ultima_modificacion'   => strftime('%Y-%m-%d'), 
																'usuario_ultima_modificacion' => $_SESSION['INFORMACION_USUARIO']['ID'] 
																));

				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
				$errores['general'] = $e->getMessage();
			}
		}

		$retorno['datos']   = $permiso;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$registracion     = obtener_registracion_pendiente($_GET['id']);
		$establecimientos = $registracion['ESTABLECIMIENTOS'];

		$smarty->assign('ESTABLECIMIENTOS', $establecimientos);
		$smarty->assign('RESIDUOS',         $categorias);

		$smarty->display('drp/operacion/agregar_permiso_establecimiento.tpl');
	}

	session_write_close();
?>
