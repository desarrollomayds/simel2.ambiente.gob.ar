<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();
$smarty  = inicializar_smarty();

$retorno = $errores = array();
$drp_user_id = $_SESSION['INFORMACION_USUARIO']['ID'];

$conexion = CambioSolicitadoEstablecimiento::connection();
$conexion->transaction();

try
{
	$solicitud = isset($_POST['solicitud_id']) ? CambioSolicitadoEstablecimiento::find($_POST['solicitud_id']) : NULL;
	$cambio_permiso = isset($_POST['cambio_id']) ? CambioPermisoVehiculo::find($_POST['cambio_id']) : NULL;

	if ($solicitud AND $cambio_permiso)
	{
		if ($_POST['accion'] == 'rechazar') {
			$cambio_permiso->estado = 'R';
		}
		elseif ($_POST['accion'] == 'aceptar') {
			$cambio_permiso->estado = 'A';
		}

		$cambio_permiso->save();
		$conexion->commit();
	}
}
catch (Exception $e)
{
	$conexion->rollback();
	$errores = $e->getMessage();
	die($e->getMessage());
}

$retorno['estado']  = (!$error) ? 'success' : 'error';
$retorno['error'] = $error;

echo json_encode($retorno);

session_write_close();