<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();
$smarty  = inicializar_smarty();

$solicitud = isset($_GET['solicitud_id']) ? CambioSolicitadoEstablecimiento::find($_GET['solicitud_id']) : NULL;
$cambio = isset($_GET['cambio_id']) ? CambioEstablecimiento::find($_GET['cambio_id']) : NULL;

if ($solicitud AND $cambio)
{
	$smarty->assign('solicitud', $solicitud);
	$smarty->assign('cambio', $cambio);

	// si es un alta de sucursal nueva, buscamos los rows relacionados de permisos
	if ($cambio->tipo_cambio == 'A')
	$smarty->display('drp/operacion/detalle_cambios_establecimientos.tpl');
}
else
{
	echo "error";
}

session_write_close();