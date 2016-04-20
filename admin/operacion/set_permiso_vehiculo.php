<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

$categorias = obtener_categorias_residuos();

$smarty  = inicializar_smarty();
$errores = Array();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$retorno = $errores = array();
	$conexion = PermisoVehiculo::connection();
	$conexion->transaction();

	try
	{
		$establecimiento = Establecimiento::find($_POST['establecimiento_id']);

		if ($_POST['accion'] == 'set') {
			$errores = validarDatosRecibidos();

			if ( ! $errores) {
				$permiso_vehiculo_obj = setPermisoVehiculo($establecimiento);
			}

			$conexion->commit();
		}

		if ($_POST['accion'] == 'delete') {
			deletePermisoVehiculo();
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

	if (isset($permiso_vehiculo_obj)) {
		$retorno['permiso_vehiculo_obj'] = $permiso_vehiculo_obj;
	}

    echo json_encode($retorno);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$establecimiento = Establecimiento::find($_GET['establecimiento_id']);
	$vehiculo = Vehiculo::find($_GET['vehiculo_id']);

	if ($establecimiento AND $vehiculo)
	{
		if ($_GET['permiso_vehiculo_id'] != '') {
			$permiso_vehiculo = PermisoVehiculo::find($_GET['permiso_vehiculo_id']);
			$smarty->assign('permiso_vehiculo', $permiso_vehiculo);
		}

		$smarty->assign('establecimiento', $establecimiento);
		$smarty->assign('vehiculo', $vehiculo);
		$smarty->assign('residuos', Residuo::get_residuos_by_establecimiento($establecimiento));
		$smarty->assign('estados', Estado::find('all'));
		$smarty->display('drp/operacion/set_permiso_vehiculo.tpl');
	}
}

session_write_close();

function validarDatosRecibidos()
{
	$permiso_vehiculo_id = $_POST['permiso_vehiculo_id'];
	$vehiculo_id = $_POST['vehiculo_id'];
	$residuo = $_POST['residuo'];
	$cantidad = $_POST['cantidad'];
	$estado = $_POST['estado'];

	if (trim($residuo) == '') {
		$errores['residuo'] = 'Debe seleccionar un residuo.';
	} else {
		// si estamos editando excluimos el permiso_id en la consulta
		if ($permiso_vehiculo_id != '') {
			$existe_permiso = PermisoVehiculo::find('first', array('conditions' => array('residuo = ? AND vehiculo_id = ? AND id != ?', $residuo, $vehiculo_id, $permiso_vehiculo_id)));
		} else {
			$existe_permiso = PermisoVehiculo::find('first', array('conditions' => array('residuo = ? AND vehiculo_id = ?', $residuo, $vehiculo_id)));
		}
		
		if ($existe_permiso) {
			$errores['residuo'] = 'El permiso ya se encuentra asignado al veh&iacute;culo.';
		}
	}

	if ( ! is_numeric($cantidad) OR $cantidad == '0' OR $cantidad == '') {
		$errores['cantidad'] = 'Ingrese una cantidad v&aacute;lida en Kg.';
	}

	if ($estado == '0') {
		$errores['estado'] = 'Especifique el estado del residuo';
	}

	return isset($errores) ? $errores : array();
}

function setPermisoVehiculo($establecimiento)
{
	$permiso_vehiculo = $_POST['permiso_vehiculo_id'] != '' ? PermisoVehiculo::find($_POST['permiso_vehiculo_id']) : new PermisoVehiculo;

	$permiso_vehiculo->vehiculo_id = $_POST['vehiculo_id'];
	$permiso_vehiculo->residuo = $_POST['residuo'];
	$permiso_vehiculo->cantidad = $_POST['cantidad'];
	$permiso_vehiculo->estado = $_POST['estado'];
	$permiso_vehiculo->fecha_ultima_modificacion = new Datetime;
	$permiso_vehiculo->save();

	return createResponsePermisoVehiculoObject($establecimiento, $permiso_vehiculo);
}

function createResponsePermisoVehiculoObject($establecimiento, $permiso_vehiculo)
{
	$objdata = array(
		'id' => $permiso_vehiculo->id,
		'establecimiento_id' => $establecimiento->id,
		'tipo_establecimiento' => obtener_tipo($establecimiento->tipo),
		'permiso_vehiculo_id' => $permiso_vehiculo->id,
		'vehiculo_id' => $permiso_vehiculo->vehiculo_id,
		'residuo' => $permiso_vehiculo->residuo,
		'descripcion' => utf8_encode(obtener_categoria_residuo($permiso_vehiculo->residuo)),
		'cantidad' => $permiso_vehiculo->cantidad,
		'estado' => utf8_encode(obtener_estado($permiso_vehiculo->estado)),
	);

	return $objdata;
}

function deletePermisoVehiculo()
{
	$error = true;
	$vehiculo_id = $_POST['vehiculo_id'];
	$permiso_vehiculo_id = $_POST['permiso_vehiculo_id'];

	$permiso_vehiculo = PermisoVehiculo::find('first', array('conditions' => array('id = ? AND vehiculo_id = ?', $permiso_vehiculo_id, $vehiculo_id)));

	if ($permiso_vehiculo)
	{
		$permiso_vehiculo->delete();
		$error = false;
	}

	return $error;
}
?>
