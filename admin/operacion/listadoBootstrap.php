<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();
$smarty  = inicializar_smarty();

$p = (int)$_GET['p'];
if(is_null($p))
	$p = 0;

$pendientes = obtener_registraciones_pendientes('%' . $_GET['criterio'] . '%', $p);
$cantidad   = obtener_cantidad_registraciones_pendientes('%' . $_GET['criterio'] . '%');
if($cantidad >= 20)
	$paginas    = range(0, $cantidad / 20);
else
	$paginas = 0;

$smarty->assign('USUARIO', $_SESSION['INFORMACION_USUARIO']);
$smarty->assign('PAGINAS', $paginas);
$smarty->assign('PENDIENTES', $pendientes);
$smarty->display('drp/operacion/listadoBootstrap.tpl');

session_write_close();
?>
