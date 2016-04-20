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
				'id' => array('nombre' => 'Id de vehiculo', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
					$flota = Flota::find('first', array('conditions' => array('id = ?', $_SESSION['DATOS_FLOTA']['ID'])));

					// chequea que no este duplicado
					$informacion = obtener_informacion_por_vehiculo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['id']);

					foreach ($_SESSION['DATOS_FLOTA']['VEHICULOS'] as $value) {
					    if ($value['DOMINIO'] == $informacion['DOMINIO']){
					    	$errores['alta'] = "El vehiculo ya se encuentra en la lista";
					    	throw new Exception("El vehiculo ya se encuentra en la lista");
					    }
					}

					if($flota){
						$flota->create_vehiculos_flota(Array(
															'flota_id'    => $_SESSION['DATOS_FLOTA']['ID'], 
															'vehiculo_id' => $_POST['id']
													));
					}else{
						throw new Exception("Flota inexistente");
					}

					$vehiculo = array(
												'ID'                 => $informacion['ID'],
												'DOMINIO'            => $informacion['DOMINIO'],
												'DESCRIPCION'        => $informacion['DESCRIPCION'],
												'CREDENCIAL_SERIE'   => $informacion['CREDENCIAL_SERIE'], 
												'CREDENCIAL_NUMERO'  => $informacion['CREDENCIAL_NUMERO'],
											);

					$retorno['datos'] = $vehiculo;
					
					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'baja'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$flota = Flota::find('first', array('conditions' => array('id = ?', $_SESSION['DATOS_FLOTA']['ID'])));

					if($flota){
							$vehiculo = VehiculoFlota::find('first', array('conditions' => array('flota_id = ? and vehiculo_id = ?', $_SESSION['DATOS_FLOTA']['ID'], $_POST['id'])));
						if($vehiculo){ 
							$vehiculo->delete();
						}else{
							throw new Exception("Vehiculo inexistente en la flota");
						}
					}else{
						throw new Exception("Flota inexistente");
					}

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'busqueda'){
				$vehiculos = buscar_vehiculos_por_criterio($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], '%' . $_POST['criterio'] . '%');

				if(!$vehiculos){
					$errores['busqueda'] = 'no se encontraron vehiculos que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $vehiculos;
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$smarty  = inicializar_smarty();

		$smarty->display('operacion/transportista/vehiculo_flota.tpl');
	}

	session_write_close();
?>
