<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores  = Array();

	$empresa = obtener_registracion_pendiente($_GET['id']);

	$smarty->assign('USUARIO', $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('EMPRESA', $empresa);

	$smarty->display('drp/operacion/imprimir.tpl');

	session_write_close();
?>
