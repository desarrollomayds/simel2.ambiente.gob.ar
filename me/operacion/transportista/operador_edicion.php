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
				'id' => array('nombre' => 'Id de operador', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
				$_SESSION['DATOS_MANIFIESTO']['OPERADORES'] = array();

				$informacion = obtener_informacion_por_establecimiento($_POST['id']);

				if(!$informacion){
					$errores['alta'] = 'no se encontraron operadores que coincidieran con el especificado';
				}else{
					$establecimiento = $informacion['ESTABLECIMIENTO'];

					$operador = array(
										'ID'                => $establecimiento['ID'],
										'NUEVO'             => True,
										'NOMBRE'            => $establecimiento['NOMBRE_EMPRESA'],
										'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
										'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
										'CUIT'              => $establecimiento['CUIT'],
										'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
										);

					$_SESSION['DATOS_MANIFIESTO']['OPERADORES'][] = $operador;

					$retorno['datos'] = $operador;
				}
			}else if($_POST['accion'] == 'busqueda'){
				$operadores = buscar_establecimientos_por_criterio('%' . $_POST['criterio'] . '%', 3);

				if(!$operadores){
					$errores['busqueda'] = 'no se encontraron operadores que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $operadores['establecimientos'];
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$smarty->display('operacion/transportista/operador_edicion.tpl');
	}

	session_write_close();
?>
