<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	try
	{
		$retorno = array();
		$conexion = CambioSolicitadoEstablecimiento::connection();
		$conexion->transaction();

		$solicitud = isset($_POST['solicitud_id']) ? CambioSolicitadoEstablecimiento::find($_POST['solicitud_id']) : NULL;
		$cambio_vehiculo = isset($_POST['cambio_id']) ? CambioVehiculo::find($_POST['cambio_id']) : NULL;

		if ($_POST['accion'] == 'rechazar') {
			$cambio_vehiculo->estado = 'R';
		}
		elseif ($_POST['accion'] == 'aceptar') {
			$cambio_vehiculo->estado = 'A';
		}

		$cambio_vehiculo->save();
		$conexion->commit();

		$retorno['estado'] = 'success';
		echo json_encode($retorno);
		exit(0);
	}
	catch (Exception $e)
	{
		$conexion->rollback();
		$retorno['estado']  = 'error';
		$retorno['error']  = $e->getMessage();
		echo json_encode($retorno);
		exit(1);
	}
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$solicitud_id = (isset($_GET['solicitud_id']) AND is_numeric($_GET['solicitud_id'])) ? $_GET['solicitud_id'] : NULL;
	$cambio_vehiculo_id = (isset($_GET['cambio_id']) AND is_numeric($_GET['cambio_id'])) ? $_GET['cambio_id'] : NULL;
	$solicitud = CambioSolicitadoEstablecimiento::find($solicitud_id);
	$cambio_vehiculo = CambioVehiculo::find($cambio_vehiculo_id);

	if ($solicitud AND $cambio_vehiculo) {
		$smarty = inicializar_smarty();
		$smarty->assign('solicitud', $solicitud);
		$smarty->assign('cambio', $cambio_vehiculo);
		$smarty->display('drp/operacion/set_cambios_vehiculos.tpl');
	} else {
		echo 'error';
		exit(1);
	}
}

session_write_close();