<?
require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../../global_incs/configuracion/configuracion.php");
require_once("../../../../global_incs/librerias/local.inc.php");

session_start();

if (@strval($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) == '') {
	header('location: /');
	exit;
}

$conexion = Empresa::connection();

if ( ! isset($_GET['p'])) {
	$p = 0;
} else {
	$p = (int)$_GET['p'];
	if(is_null($p))
		$p = 0;
}

$mensajes = obtener_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_DRP, '', $p);
$cantidad = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_DRP, '');
$paginas  = @range(0, ($cantidad / 20) + 1);

$smarty  = inicializar_smarty();
$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
$smarty->assign('NUEVOS',         $cantidad1);
$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
$smarty->assign('MENSAJES',        $mensajes);
$smarty->assign('PAGINAS',         $paginas);
$smarty->assign('ALERTAS',         $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
$smarty->assign('ESTADISTICAS',    $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
$smarty->assign('GENERADOR',       $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);

$smarty->display('operacion/compartido/mensajeria/bandeja_de_salida.tpl');

session_write_close();
?>
