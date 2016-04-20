<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$vehiculo = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;

		#validaciones
		$campos = False;

		if($_POST['accion'] == 'alta'){
			$campos = array(
				'id' => array('nombre' => 'Id de generador', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
				/*
				foreach($_SESSION['DATOS_MANIFIESTO']['GENERADORES'] as $generador){
					if($generador['ID'] == $_POST['id']){
						$errores['alta'] = 'el generador ya se encuentra en la lista de generadores';
						break;
					}
				}*/

				if(!count($errores)){
					$informacion = obtener_informacion_por_establecimiento($_POST['id']);

					if(!$informacion){
						$errores['alta'] = 'no se encontraron generadores que coincidieran con el especificado';
					}else{
						$establecimiento = $informacion['ESTABLECIMIENTO'];

						$generador = array(
											'ID'                => $establecimiento['ID'],
											'NOMBRE'            => $establecimiento['NOMBRE_EMPRESA'],
											'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
											'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
											'CUIT'              => $establecimiento['CUIT'],
											'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
											'ALTA_TEMPRANA'     => $establecimiento['ALTA_TEMPRANA'],
											);

						$_SESSION['DATOS_MANIFIESTO']['GENERADORES'][] = $generador;

						$retorno['datos'] = $generador;
					}
				}
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;

				foreach($_SESSION['DATOS_MANIFIESTO']['GENERADORES'] as $indice => $generador){
					if($generador['ID'] == $_POST['id']){
						$estado = 0;
						unset($_SESSION['DATOS_MANIFIESTO']['GENERADORES'][$indice]);
						break;
					}
				}
				// reordeno el array
				$array_reordenado = array_values($_SESSION['DATOS_MANIFIESTO']['GENERADORES']);
				unset($_SESSION['DATOS_MANIFIESTO']['GENERADORES']);
				$_SESSION['DATOS_MANIFIESTO']['GENERADORES'] = $array_reordenado; 

				if($estado){
					$errores['baja'] = 'el generador indicado no se encuentra en la lista de generadores especificados';
				}
			}else if($_POST['accion'] == 'busqueda'){
				$generadores = buscar_establecimientos_por_criterio('%' . $_POST['criterio'] . '%', 1);

				if(!$generadores){
					$errores['busqueda'] = 'No se encontr&oacute; un generador con el CUIT especificado.';
				}

				$retorno['datos']   = $generadores['establecimientos'];
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$smarty->display('operacion/transportista/generadores.tpl');
	}

	session_write_close();
?>
