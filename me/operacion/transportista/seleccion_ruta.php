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

		$post_valido = true;
	
		#validaciones
		$campos = False;

		$campos = array(
			'id' => array('nombre' => 'Id de ruta', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		);

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
			$ruta = obtener_informacion_ruta($_POST['id']);

			if(!$ruta){
				$errores['general'] = "Ruta inexistente";
			}

			if(!count($errores)){
				$_SESSION['DATOS_MANIFIESTO']['GENERADORES'] = array();
				$_SESSION['DATOS_MANIFIESTO']['RESIDUOS']    = array();

				foreach($ruta['ESTABLECIMIENTOS'] as $establecimiento){
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
				}

				$retorno['datos'] = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'];
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$rutas = obtener_rutas($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);

		$smarty->assign('RUTAS', $rutas);

		$smarty->display('operacion/transportista/seleccion_ruta.tpl');
	}

	session_write_close();
?>
