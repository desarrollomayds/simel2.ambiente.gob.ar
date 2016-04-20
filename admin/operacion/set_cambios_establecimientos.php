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
		$cambio_establecimiento = isset($_POST['cambio_id']) ? CambioEstablecimiento::find($_POST['cambio_id']) : NULL;

		if ($_POST['accion'] == 'rechazar') {
			$cambio_establecimiento->estado = 'R';
			// si lo que se rechaza es un alta de sucursal, tambien rechazamos los permisos que se hayan pedido:
			if ($cambio_establecimiento->tipo_cambio == 'A') {
				$perms_sucursal = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_establecimiento_id = ?', $cambio_establecimiento->id)));
				foreach ($perms_sucursal as $ps) {
					$retorno['permisos_sucursal'][] = $ps->id;
					$ps->estado = 'R';
					$ps->save();
				}
			}
		}
		elseif ($_POST['accion'] == 'aceptar') {
			$cambio_establecimiento->estado = 'A';
		}

		$cambio_establecimiento->save();
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
	$cambio_establecimiento_id = (isset($_GET['cambio_id']) AND is_numeric($_GET['cambio_id'])) ? $_GET['cambio_id'] : NULL;
	$solicitud = CambioSolicitadoEstablecimiento::find($solicitud_id);
	$cambio_establecimiento = CambioEstablecimiento::find($cambio_establecimiento_id);

	if ($solicitud AND $cambio_establecimiento) {
		$smarty = inicializar_smarty();
		$smarty->assign('solicitud', $solicitud);
		$smarty->assign('cambio', $cambio_establecimiento);
		$smarty->display('drp/operacion/set_cambios_establecimientos.tpl');
	} else {
		echo 'error';
		exit(1);
	}
}

session_write_close();