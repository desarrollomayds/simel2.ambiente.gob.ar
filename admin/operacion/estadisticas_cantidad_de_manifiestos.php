<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "20";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$start = $end = new DateTime();
//$start = new DateTime('first day of this month');
//$start->modify('-6 month');
//$end = new DateTime();
$estadisticas = new estadisticas($start->format('Y-m-d'), $end->format('Y-m-d'));

$smarty = inicializar_smarty();
$res = $estadisticas->getCantidadManifiestos();
$smarty->assign('res_array', $res);
$smarty->display('drp/operacion/estadisticas_cantidad_de_manifiestos.tpl');

session_write_close();
