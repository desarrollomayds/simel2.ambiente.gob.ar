<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	$categorias = obtener_categorias_residuos();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno = array();
		$errores = array();
		$permiso = array();

		if(empty($_POST['accion'])){
			exit;
		}

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
			if($_POST['accion'] == 'baja'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$permiso = PermisoEstablecimiento::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					if($permiso){
						$permiso->flag                            = 'f'; //baja logica

						$permiso->fecha_ultima_modificacion       = strftime('%Y-%m-%d');
						$permiso->usuario_ultima_modificacion     = $_SESSION['INFORMACION_USUARIO']['ID'];

						$permiso->save();
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
					$permiso = PermisoEstablecimiento::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					if($permiso){
						$permiso->residuo                         = $_POST['residuo'];
						$permiso->cantidad                        = $_POST['cantidad'];
						$permiso->estado                          = $_POST['estado'];
						$permiso->fecha_inicio                    = convertir_fecha_es_en($_POST['fecha_inicio']);
						$permiso->fecha_fin                       = convertir_fecha_es_en($_POST['fecha_fin']);

						$permiso->fecha_ultima_modificacion       = strftime('%Y-%m-%d');
						$permiso->usuario_ultima_modificacion     = $_SESSION['INFORMACION_USUARIO']['ID'];

						$permiso->save();
					}

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}
		}

		$retorno['datos']   = $permiso;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(!empty($_GET['id_permiso'])){
			$smarty->assign('ACCION', 'modificacion');

			$permiso = obtener_informacion_permiso_establecimiento_drp(((int)$_GET['id_permiso']));

			$smarty->assign('PERMISO', $permiso);

			$smarty->assign('ESTABLECIMIENTO', $_GET['id_establecimiento']);
			$smarty->assign('RESIDUOS',        $categorias);

			$smarty->display('drp/operacion/editar_permiso_establecimiento.tpl');
		}
	}

	session_write_close();
?>
