<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores = Array();

	$mensaje = obtener_mensaje_por_id_drp($_GET['id']);
        
        $smarty->assign('USUARIO', $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('MENSAJE', $mensaje);
        
	$smarty->display('drp/operacion/visualizar_mensaje.tpl');

	session_write_close();
?>
