<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();
	
	redirigir_a_seccion($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'], SECCION_TRANSPORTISTA);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;
	
		#validaciones
		$campos = False;

		if($_POST['accion'] == 'alta'){
			$campos = array(
				'descripcion' => array('nombre' => 'Descripcion de la nueva ruta', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		}

		if($post_valido && $campos !== False){
			$validaciones = filter_input_array(INPUT_POST, $campos);
	
			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0 or $resultado == 'null'){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}
		#validaciones

		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$ruta = Ruta::create(array(
											'establecimiento_id' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], 
											'descripcion'        => $_POST['descripcion'], 
										));

					$conexion->commit();


					$retorno['datos'] = Array(
												'ID' => $ruta->id, 
												'DESCRIPCION' => $ruta->descripcion
											);

				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'baja'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$ruta = Ruta::find('first', array('conditions' => array('id = ?', $_POST['id'])));

					if($ruta){
						$establecimientos = EstablecimientoRuta::find('all', array('conditions' => array('ruta_id = ?', $_POST['id'])));

						foreach($establecimientos as $establecimiento){ 
							$establecimiento->delete();
						}

						$ruta->delete();
					}else{
						throw new Exception("Ruta inexistente");
					}

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
		$smarty  = inicializar_smarty();

		if($_GET['opcion'] == 'detalle'){
			$ruta = obtener_informacion_ruta($_GET['id']);

			$_SESSION['DATOS_RUTA'] = $ruta;

			$smarty->assign('RUTA', $_SESSION['DATOS_RUTA']);

			$smarty->display('operacion/transportista/ruta_detalle.tpl');
		}else{
			$smarty->display('operacion/transportista/ruta.tpl');
		}
	}

	session_write_close();
?>
