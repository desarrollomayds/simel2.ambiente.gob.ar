<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();
	
	//redirigir_a_seccion($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'], SECCION_TRANSPORTISTA);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;
	
		#validaciones
		$campos = False;

		if($_POST['accion'] == 'grabar'){
			$campos = array(
				'id' => array('nombre' => 'Id de manifiesto', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		}else if($_POST['accion'] == 'asignar'){
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
			if($_POST['accion'] == 'grabar'){
				$conexion = Manifiesto::connection();

				$conexion->transaction();

				try{
					$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $_POST['id'])));

					if($manifiesto){
						foreach($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] as &$transportista){
							if($transportista['NUEVO'] === True){
								$manifiesto->create_transportistas_manifiesto(Array(
									'manifiesto_id'      => $manifiesto->id,
									'establecimiento_id' => $transportista['ID']
								));
							}
						}

						foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as &$vehiculo){
							if($vehiculo['NUEVO'] === True){
								$manifiesto->create_vehiculos_manifiesto(Array(
									'manifiesto_id'      => $manifiesto->id,
									'establecimiento_id' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'],
									'vehiculo_id'        => $vehiculo['ID'],
									'utilizado'          => ($vehiculo['UTILIZADO'] == 1) ? 1 : 0
							));
							}else{
								$vehiculo_manifiesto = VehiculoManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ? and vehiculo_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $vehiculo['ID'])));

								if($vehiculo_manifiesto){
									$vehiculo_manifiesto->utilizado = ($vehiculo['UTILIZADO'] == 1) ? 1 : 0;
									$vehiculo_manifiesto->save();
								}
							}
						}

						foreach($_SESSION['DATOS_MANIFIESTO']['OPERADORES'] as &$operador){
							if($operador['NUEVO'] === True){
								$manifiesto->create_operadores_manifiesto(Array(
										'manifiesto_id'      => $manifiesto->id,
										'establecimiento_id' => $operador['ID']
								));
							}
						}
					}else{
						throw new Exception("Manifiesto inexistente");
					}

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}else if($_POST['accion'] == 'desasignar'){
				$estado = 1;

				foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $indice => &$vehiculo){
					if($vehiculo['ID'] == $_POST['id']){
						$estado = 0;
						$vehiculo['UTILIZADO'] = 0;
						break;
					}
				}

				if($estado){
					$errores['general'] = 'el vehiculo no pudo ser localizado';
				}
			}else if($_POST['accion'] == 'asignar'){
				$estado = 1;

				foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $indice => &$vehiculo){
					if($vehiculo['ID'] == $_POST['id']){
						$estado = 0;
						$vehiculo['UTILIZADO'] = 1;
						break;
					}
				}

				if($estado){
					$errores['general'] = 'el vehiculo no pudo ser localizado';
				}
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);

	}else{

		$manifiesto = obtener_informacion_manifiesto($_GET['id']);

		$_SESSION['DATOS_MANIFIESTO'] = $manifiesto;

		$smarty  = inicializar_smarty();
		
		$vehiculos = Array();
		foreach($manifiesto['TRANSPORTISTAS'] as $transportista){
			if($transportista['ID'] == $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']){
				$vehiculos = $transportista['VEHICULOS'];
				break;
			}
		}
		
		
		if(isset($_GET['editable'])){
		$editable = 'no';
		
			
		}else{
		$editable = 'yes';
		
		}
		$id = $_GET['id'];
                $vehiculo = obtener_vehiculo($id);
                $id_manifiesto = $_SESSION['DATOS_MANIFIESTO']['ID'];
                $traslados = obtener_vehiculos_traslados_mani($id_manifiesto);
                //$traslados = obtener_vehiculos_traslados($id_manifiesto, $id);
		if(empty($traslados)) {
                    $anexo = 0;
                }else{
                    $anexo = 1;
                }
                
                $_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = $vehiculos;
		$smarty->assign('EXTRA',     $editable);
		$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
		$smarty->assign('NUEVOS',         $cantidad1);
		$smarty->assign('GENERADORES',     $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTAS',  $manifiesto['TRANSPORTISTAS']);
		$smarty->assign('OPERADORES',      $manifiesto['OPERADORES']);
		$smarty->assign('RESIDUOS',        $manifiesto['RESIDUOS']);
		$smarty->assign('VEHICULOS',       $vehiculos);
		$smarty->assign('MANIFIESTO',      $manifiesto);
                $smarty->assign('ANEXO',      $anexo);
		$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
		$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
		


		$smarty->display('operacion/transportista/editar_manifiesto.tpl');
	}

	session_write_close();
?>
