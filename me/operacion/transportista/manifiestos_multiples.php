<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	redirigir_a_seccion($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'], SECCION_TRANSPORTISTA);

	$smarty  = inicializar_smarty();
$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
		$smarty->assign('NUEVOS',         $cantidad1);
	$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS',         $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS',    $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);

	$smarty->display('operacion/transportista/manifiestos_multiples.tpl');

	session_write_close();
?>
