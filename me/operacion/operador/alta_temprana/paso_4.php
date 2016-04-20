<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(3, $_SESSION['PASOS_CORRECTOS'])){
		header("Location: /operacion/operador/alta_temprana/paso_3.php");
		exit;
	}

	$smarty  = inicializar_smarty();
	$errores  = Array();

	$smarty->assign('EMPRESA', $_SESSION['DATOS_EMPRESA']);

	$smarty->display('operacion/operador/alta_temprana/paso_4.tpl');

	session_write_close();
?>
