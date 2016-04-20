<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");
/*
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors' , true);
	* */
	//session_start();

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$smarty->caching = false;

	$estadistica_manifiestos    = obtener_estadistica_manifiestos();
	$estadistica_registraciones = obtener_estadistica_registraciones();

	$smarty->assign('USUARIO',                    $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('ESTADISTICA_MANIFIESTOS',    $estadistica_manifiestos);
	$smarty->assign('ESTADISTICA_REGISTRACIONES', $estadistica_registraciones);


	$smarty->display('drp/operacion/reportes.old.tpl');

	session_write_close();
?>
