<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "8";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$model = new Manifiesto;
list($manifiestos_pendientes, $paginador) = $model->get_listado_manifiestos_pendientes_drp($_GET['criterio']);

$smarty  = inicializar_smarty();
$smarty->assign('manifiestos_pendientes', $manifiestos_pendientes);
$smarty->assign('criterio', isset($_GET['criterio']) ? $_GET['criterio'] : '');
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/listado_manifiestos_pendientes_de_aprobacion.tpl');

session_write_close();
?>
