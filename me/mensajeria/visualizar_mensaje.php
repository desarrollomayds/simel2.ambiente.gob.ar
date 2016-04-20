<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

  if(@strval($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) == ''){
    header('location: /');
    exit;
  }

	$smarty  = inicializar_smarty();
	$errores = Array();

	$mensaje = obtener_mensaje_por_id($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_GET['id']);

	$smarty->assign('MENSAJE', $mensaje);

	$smarty->display('mensajeria/visualizar_mensaje.tpl');

	session_write_close();
?>
