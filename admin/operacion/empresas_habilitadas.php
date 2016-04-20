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

	$p = (int)$_GET['p'];
	if(is_null($p))
		$p = 0;
		
	$empresas   = obtener_empresas_habilitadas('%' . $_POST['criterio'] . '%', $p);
	$cantidad   = obtener_cantidad_empresas_habilitadas('%' . $_POST['criterio'] . '%');
	$paginas    = range(0, $cantidad / 20);

	$smarty->assign('USUARIO',    $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('PAGINAS',    $paginas);
	$smarty->assign('EMPRESAS',   $empresas);
	$smarty->display('drp/operacion/empresas_habilitadas.tpl');

	session_write_close();
?>
