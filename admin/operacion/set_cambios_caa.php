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
		$solicitud = isset($_POST['solicitud_id']) ? CambioSolicitadoEstablecimiento::find($_POST['solicitud_id']) : NULL;
		$cambio_caa = isset($_POST['cambio_id']) ? CambioCaaEstablecimiento::find($_POST['cambio_id']) : NULL;

		if ($_POST['accion'] == 'rechazar') {
			$cambio_caa->estado = 'R';
		} elseif ($_POST['accion'] == 'aceptar') {
			$cambio_caa->estado = 'A';
		}

		$cambio_caa->save();

		$retorno['estado'] = 'success';
		echo json_encode($retorno);
		exit(0);
	}
	catch (Exception $e)
	{
		$retorno['estado']  = 'error';
		$retorno['error']  = $e->getMessage();
		echo json_encode($retorno);
		exit(1);
	}
}

session_write_close();