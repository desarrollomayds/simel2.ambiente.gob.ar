<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");

require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();
// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$model = new CambioSolicitadoEstablecimiento;
$cambios_solicitados = $model->getListado($_GET['cuit']);

/*
$cantidad   = obtener_cantidad_registraciones_pendientes('%' . $_GET['criterio'] . '%');
if($cantidad >= 20)
	$paginas    = range(0, $cantidad / 20);
else
	$paginas = 0;
*/
$smarty  = inicializar_smarty();
$smarty->assign('PAGINAS', $paginas);
$smarty->assign('cambios_solicitados', $cambios_solicitados);
$smarty->assign('tipo_cambio', $tipo_cambio);
$smarty->assign('cuit', isset($_GET['cuit']) ? $_GET['cuit'] : NULL);
$smarty->display('drp/operacion/listado_cambios_establecimientos.tpl');

session_write_close();
?>
