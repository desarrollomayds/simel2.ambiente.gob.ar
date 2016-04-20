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

		if($_POST['accion'] != 'busqueda'){
			$campos = array(
				'id' => array('nombre' => 'Id de establecimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		}

		if($post_valido && $campos !== False){
			$validaciones = filter_input_array(INPUT_POST, $campos);

			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0){
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
					$ruta = Ruta::find('first', array('conditions' => array('id = ?', $_SESSION['DATOS_RUTA']['ID'])));

					if($ruta){
						$ruta->create_establecimientos_ruta(Array(
															'ruta_id'            => $_SESSION['DATOS_RUTA']['ID'],
															'establecimiento_id' => $_POST['id']
													));
					}else{
						throw new Exception("Ruta inexistente");
					}

					$informacion = obtener_informacion_por_establecimiento($_POST['id']);
					$establecimiento = $informacion['ESTABLECIMIENTO'];

					$establecimiento = array(
												'ID'                => $establecimiento['ID'],
												'NOMBRE'            => $establecimiento['NOMBRE_EMPRESA'],
												'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
												'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
												'CUIT'              => $establecimiento['CUIT'],
												'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
											);

					$retorno['datos'] = $establecimiento;

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'baja'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$ruta = Ruta::find('first', array('conditions' => array('id = ?', $_SESSION['DATOS_RUTA']['ID'])));

					if($ruta){
						$establecimiento = EstablecimientoRuta::find('first', array('conditions' => array('ruta_id = ? and establecimiento_id = ?', $_SESSION['DATOS_RUTA']['ID'], $_POST['id'])));
						if($establecimiento){
							$establecimiento->delete();
						}else{
							throw new Exception("Establecimiento inexistente en la ruta ");
						}
					}else{
						throw new Exception("Ruta inexistente");
					}

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'busqueda'){
				$generadores = buscar_establecimientos_por_criterio('%' . $_POST['criterio'] . '%', 1);

				if(!$generadores){
					$errores['busqueda'] = 'no se encontraron generadores que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $generadores['establecimientos'];
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$smarty  = inicializar_smarty();

		$smarty->display('operacion/transportista/establecimiento_ruta.tpl');
	}

	session_write_close();
?>
