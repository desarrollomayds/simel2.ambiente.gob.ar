<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	$empresa = obtener_registracion_pendiente($_GET['id']);
	//var_dump($empresa);

	$empresa_activa = validar_registracion_activa($empresa['CUIT']);

	$smarty->assign('GOOGLE_MAPS_KEY',     GOOGLE_MAPS_KEY);
	$smarty->assign('USUARIO',             $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('FLAG_EMPRESA_ACTIVA', $empresa_activa);
	$smarty->assign('EMPRESA',             $empresa);

	$smarty->display('drp/operacion/detalle.tpl');

	session_write_close();
?>
