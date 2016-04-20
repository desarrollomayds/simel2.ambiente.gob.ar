<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();

$smarty  = inicializar_smarty();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$retorno = $errores = array();
	$conexion = Vehiculo::connection();
	$conexion->transaction();

	try
	{
		$establecimiento = Establecimiento::find($_POST['establecimiento_id']);

		if ($_POST['accion'] == 'set') {
			$errores = validarDatosRecibidos();

			if ( ! $errores) {
				$vehiculo_obj = setVehiculo($establecimiento);
			}

			$conexion->commit();
		}

		if ($_POST['accion'] == 'delete') {
			deleteVehiculo($establecimiento);
			$conexion->commit();
		}
	}
	catch (\Exception $e)
	{
		$conexion->rollback();
		$errores['exception'] = $e->getMessage();
	}

	$retorno['estado']  = $errores ? 'error' : 'success';
	$retorno['errores'] = $errores;

	if (isset($vehiculo_obj)) {
		$retorno['vehiculo_obj'] = $vehiculo_obj;
	}

    echo json_encode($retorno);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$establecimiento = Establecimiento::find($_GET['establecimiento_id']);

	if ($establecimiento)
	{
		if ($_GET['vehiculo_id'] != '') {
			$vehiculo = Vehiculo::find($_GET['vehiculo_id']);
			$smarty->assign('vehiculo', $vehiculo);
		}

		$smarty->assign('establecimiento', $establecimiento);
		$smarty->assign('tipos_vehiculo', TipoVehiculo::get_all());
		$smarty->assign('tipos_caja', TipoCaja::get_all());
		$smarty->display('drp/operacion/set_vehiculo.tpl');
	}
}

session_write_close();

function validarDatosRecibidos()
{
	$dominio = $_POST['dominio'];
	$tipo_vehiculo = $_POST['tipo_vehiculo'];
	$descripcion = $_POST['descripcion'];

	if (trim($dominio) == '') {
		$errores['dominio'] = 'Dominio inv&aacute;lido.';
	}

	if ($tipo_vehiculo == '0') {
		$errores['tipo_vehiculo'] = 'Debe indicar el tipo de veh&iacute;culo.';
	}

	if (trim($descripcion) == '') {
		$errores['descripcion'] = 'Escriba una descripci&oacute;n';
	}

	return isset($errores) ? $errores : array();
}

function setVehiculo($establecimiento)
{
	$vehiculo = $_POST['vehiculo_id'] != '' ? Vehiculo::find($_POST['vehiculo_id']) : new Vehiculo;

	$vehiculo->establecimiento_id = $establecimiento->id;
	$vehiculo->dominio = $_POST['dominio'];
	$vehiculo->tipo_vehiculo = $_POST['tipo_vehiculo'];
	$vehiculo->tipo_caja = $_POST['tipo_caja'] != '0' ? $_POST['tipo_caja'] : NULL;
	$vehiculo->descripcion = $_POST['descripcion'];
	$vehiculo->fecha_ultima_modificacion = new Datetime;
	$vehiculo->save();

	return createResponseVehiculoObject($establecimiento, $vehiculo);
}

function createResponseVehiculoObject($establecimiento, $vehiculo)
{
	$objdata = array(
		'vehiculo_id' => $vehiculo->id,
		'establecimiento_id' => $vehiculo->establecimiento_id,
		'dominio' => $vehiculo->dominio,
		'tipo_vehiculo' => TipoVehiculo::get_descripcion_by_codigo($vehiculo->tipo_vehiculo),
		'tipo_caja' => TipoCaja::get_descripcion_by_codigo($vehiculo->tipo_caja),
		'descripcion' => $vehiculo->descripcion,
	);

	return $objdata;
}

function deleteVehiculo($establecimiento)
{
	$error = true;
	$vehiculo_id = $_POST['vehiculo_id'];

	$vehiculo = Vehiculo::find('first', array('conditions' => array('id = ? AND establecimiento_id = ?', $vehiculo_id, $establecimiento->id)));

	if ($vehiculo)
	{
		foreach ($vehiculo->permisos_vehiculos as $perm_vehiculo) {
			$perm_vehiculo->delete();
		}

		$vehiculo->delete();
		$error = false;
	}

	return $error;
}
?>
