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
	$cambio_permiso = isset($_POST['cambio_id']) ? CambioPermisoEstablecimiento::find($_POST['cambio_id']) : NULL;

	if ($solicitud AND $cambio_permiso)
	{
		$cambio_nueva_sucursal = $cambio_permiso->cambio_establecimiento_id ? CambioEstablecimiento::find($cambio_permiso->cambio_establecimiento_id) : false;

		// solo accionaremos en el caso que no se trate de un alta de permiso para sucursal o, dado el caso, que el cambio de nueva sucursal ya haya sido aceptado.
		if ( ! $cambio_nueva_sucursal or $cambio_nueva_sucursal->estado == 'A')
		{
			if ($_POST['accion'] == 'rechazar') {
				$cambio_permiso->estado = 'R';
			}
			elseif ($_POST['accion'] == 'aceptar') {
				$cambio_permiso->estado = 'A';
			}

			$cambio_permiso->save();
			$conexion->commit();
		} else {
			$error = 'Para operar sobre el permiso primero debe aceptar el Alta de nueva sucursal';
		}
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