<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();
$smarty  = inicializar_smarty();

$solicitud_id = (isset($_REQUEST['solicitud_id']) AND is_numeric($_REQUEST['solicitud_id'])) ? $_REQUEST['solicitud_id'] : NULL;
$solicitud = CambioSolicitadoEstablecimiento::find($solicitud_id);

if ( ! $solicitud) {
	echo 'error';
	exit(1);
} else {
	$solicitud->asignar_a_usuario($_SESSION['INFORMACION_USUARIO']['ID']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$conexion = CambioSolicitadoEstablecimiento::connection();
	$conexion->transaction();

	try
	{
		if ( ! $solicitud->hasCambiosPendientes()) {
			$solicitud->procesar();
			$conexion->commit();
		} else {
			$error = 'La solicitud a&uacute;n posee cambios pendientes de Aprobaci&oacute;n/Rechazo.';
		}
	}
	catch (Exception $e)
	{
		$conexion->rollback();
		$error = $e->getMessage();
	}

	$retorno['resultado'] = !$error ? 'success' : 'error';
	$retorno['error'] = $error;
	echo json_encode($retorno);
	exit(0);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$smarty->assign('solicitud', $solicitud);
	$smarty->assign('data', $solicitud->getEstructuraCambios($solicitud));
	$smarty->assign('establecimiento', Establecimiento::find($solicitud->establecimiento_id));
	$smarty->display('drp/operacion/set_solicitud_de_cambios.tpl');
}

session_write_close();

