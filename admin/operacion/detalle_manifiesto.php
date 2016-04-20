<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$manifiesto = obtener_informacion_manifiesto($_GET['id']);

	$smarty->assign('USUARIO',         $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('GENERADORES',     $manifiesto['GENERADORES']);
	$smarty->assign('TRANSPORTISTAS',  $manifiesto['TRANSPORTISTAS']);
	$smarty->assign('OPERADORES',      $manifiesto['OPERADORES']);
	$smarty->assign('RESIDUOS',        $manifiesto['RESIDUOS']);
	$smarty->assign('MANIFIESTO',      $manifiesto);

	$smarty->display('drp/operacion/detalle_manifiesto.tpl');

	session_write_close();
?>
