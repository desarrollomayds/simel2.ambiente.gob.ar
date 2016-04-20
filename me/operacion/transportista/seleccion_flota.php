<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$retorno = $errores = array();
	$permisos_manifiesto = array();
	
	foreach ($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $res) {
		$permisos_manifiesto[] = $res['RESIDUO'];
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$vehiculo = array();

		$post_valido = true;

		#validaciones
		$campos = False;

		$campos = array(
			'id' => array('nombre' => 'Id de flota', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		);

		if ($post_valido && $campos !== False) {
			$validaciones = filter_input_array(INPUT_POST, $campos);

			foreach ($validaciones as $campo => $resultado) {
				if (strlen($resultado) == 0) {
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}
		#validaciones
		if ( ! count($errores)) {

			$flota = obtener_informacion_flota($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['id']);

			if(!$flota){
				$errores['general'] = "Flota inexistente";
			}

			if(!count($errores)){

				unset($_SESSION['DATOS_MANIFIESTO']['VEHICULOS']);

				$vehiculos = Flota::getVehiculosFlotaConPermisos($_POST['id'], $permisos_manifiesto);

				foreach ($vehiculos as $v) {
					$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'][] = $v;
				}

				$retorno['datos'] = $vehiculos;
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);

	} else if($_SERVER['REQUEST_METHOD'] == 'GET') {

		$establecimiento_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
		$flotas = Flota::getFlotasConPermisos($establecimiento_id, $permisos_manifiesto);

		$smarty->assign('flotas_vehiculos', $flotas);
		$smarty->display('operacion/transportista/seleccion_flota.tpl');
	}

	session_write_close();
?>
