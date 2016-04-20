<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$model = new CambioSolicitadoEstablecimiento;
list($cambios_solicitados, $paginador) = $model->get_listado_solicitudes_pendientes($_GET['criterio']);

$smarty  = inicializar_smarty();
$smarty->assign('cambios_solicitados', $cambios_solicitados);
$smarty->assign('tipo_cambio', $tipo_cambio);
$smarty->assign('criterio', isset($_GET['criterio']) ? $_GET['criterio'] : '');
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/listado_solicitud_de_cambios.tpl');

session_write_close();

