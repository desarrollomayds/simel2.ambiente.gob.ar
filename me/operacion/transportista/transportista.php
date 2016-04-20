<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$retorno  = array();
		$errores  = array();
		$vehiculo = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;

		#validaciones
		$campos = False;

		if($_POST['accion'] == 'alta') {
			$campos = array(
				'id' => array('nombre' => 'Id de transportista', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		} else if($_POST['accion'] == 'baja') {
			$campos = array(
				'id' => array('nombre' => 'Id de transportista', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
				if(empty($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'])){
					$_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] = array();
				}else{
					foreach($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] as $indice => $transportista){
						if($transportista['ID'] == $_POST['id']){
							$errores['alta'] = 'el transportista indicado ya se encuentra presente en la lista de transportistas';
							break;
						}
					}
				}

				if(!count($errores)){
					$informacion = obtener_informacion_por_establecimiento($_POST['id']);

					if(!$informacion){
						$errores['alta'] = 'no se encontraron transportistas que coincidieran con el especificado';
					}else{
						$establecimiento = $informacion['ESTABLECIMIENTO'];

						$transportista = array(
							'ID'                => $establecimiento['ID'],
							'NOMBRE'            => $establecimiento['NOMBRE_EMPRESA'],
							'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
							'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
							'CUIT'              => $establecimiento['CUIT'],
							'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
						);

						$_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][] = $transportista;

						$retorno['datos'] = $transportista;
					}
				}
			}else if($_POST['accion'] == 'busqueda'){
				$transportistas = buscar_establecimientos_por_criterio('%' . $_POST['criterio'] . '%', 2);

				if(!$transportistas){
					$errores['busqueda'] = 'no se encontraron transportistas que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $transportistas['establecimientos'];
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;
				foreach($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] as $indice => $transportista){
					if($transportista['ID'] == $_POST['id']){
						$estado = 0;
						unset($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][$indice]);
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el transportista no pudo ser localizado';
				}
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$smarty->display('operacion/transportista/transportista.tpl');
	}

	session_write_close();
?>