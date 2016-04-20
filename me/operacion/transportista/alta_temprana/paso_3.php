<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(2, $_SESSION['PASOS_CORRECTOS'])){
		header("Location: /operacion/transportista/alta_temprana/paso_2.php");
		exit;
	}

	$smarty  = inicializar_smarty();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();

		if(count($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS']) == 0){
			$campo = 'establecimientos';
			$errores[$campo] = 'Debe dar de alta al menos un establecimiento';
		}

		foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento){
			if(count($establecimiento['PERMISOS']) == 0){
				$campo = 'permisos_establecimientos';

				if(!isset($errores[$campo])){
					$errores[$campo] = Array();
				}

				$errores[$campo][] = 'Debe asignar al menos un permiso al establecimiento <strong>'.$establecimiento['NOMBRE'].'</strong>';
			}
		}

		if(!count($errores)){
			$retorno['siguiente'] = '/operacion/transportista/alta_temprana/paso_4.php';
			$_SESSION['PASOS_CORRECTOS'][3] = 3;
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

		echo json_encode($retorno);
	}else{
		unset($_SESSION['PASOS_CORRECTOS'][3]);

		$smarty->assign('ESTABLECIMIENTOS', $_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS']);
		$smarty->assign('EMPRESA',          $_SESSION['DATOS_EMPRESA']);
		$smarty->assign('GOOGLE_MAPS_KEY',  GOOGLE_MAPS_KEY);

		$smarty->display('operacion/transportista/alta_temprana/paso_3.tpl');
	}

	session_write_close();
?>
