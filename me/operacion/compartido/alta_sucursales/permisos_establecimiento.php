<?
/*
	require_once("../librerias/smarty/Smarty.class.php");
	require_once("../configuracion/configuracion.php");
	require_once("../librerias/local.inc.php");
*/
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty  = inicializar_smarty();
	$errores = Array();

	$smarty->assign('ACCION', 'modificacion');

	$smarty->assign('ESTABLECIMIENTO', $_SESSION['DATOS_ESTABLECIMIENTO']);

	$smarty->assign('ROL_ID',  $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']);

	$smarty->display('operacion/compartido/alta_sucursales/permisos_establecimiento.tpl');

	session_write_close();
?>
