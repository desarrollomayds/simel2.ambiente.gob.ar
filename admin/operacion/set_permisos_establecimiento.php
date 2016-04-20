<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();
$smarty  = inicializar_smarty();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$retorno = $errores = array();
	$conexion = PermisoEstablecimiento::connection();
	$conexion->transaction();

	try
	{
		$establecimiento = Establecimiento::find($_POST['establecimiento_id']);

		if ($_POST['accion'] == 'set') {
			$errores = validarDatosRecibidos($establecimiento);

			if ( ! $errores) {
				$permiso_obj = setPermisoEstablecimiento($establecimiento);
			}

			$conexion->commit();
		}

		if ($_POST['accion'] == 'delete') {
			$errores = deletePermisoEstablecimiento($establecimiento);
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

	if (isset($permiso_obj)) {
		$retorno['permiso_obj'] = $permiso_obj;
	}

    echo json_encode($retorno);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$establecimiento = Establecimiento::find($_GET['establecimiento_id']);

	if ($establecimiento)
	{
		if ($_GET['permiso_id'] != '') {
			$permiso_establecimiento = PermisoEstablecimiento::find($_GET['permiso_id']);
			$smarty->assign('permiso_establecimiento', $permiso_establecimiento);
		}

		$smarty->assign('establecimiento', $establecimiento);
		$smarty->assign('residuos', Residuo::get_all());
		$smarty->assign('tratamientos', TratamientoResiduo::find('all'));
		$smarty->display('drp/operacion/set_permisos_establecimiento.tpl');
	}
}

session_write_close();

/**
 * La validación varía por rol porque cada uno ingresa distintos datos.
 */
function validarDatosRecibidos($establecimiento)
{
	$permiso_id = isset($_POST['permiso_id']) ? $_POST['permiso_id'] : NULL;
	$residuo = $_POST['residuo'];
	$cantidad = $_POST['cantidad'];
	$tratamientos = $_POST['tratamientos'] != NULL ? json_decode(stripslashes($_POST['tratamientos'])) : array();

	// común para todo rol
	if ($residuo == '') {
		$errores['residuo'] = 'Debe indicar el residuo.';
	} else {
		// si estamos editando excluimos el permiso_id en la consulta
		if ($permiso_id != '') {
			$existe_permiso = PermisoEstablecimiento::find('first', array('conditions' => array('residuo = ? AND establecimiento_id = ? AND id != ?', $residuo, $establecimiento->id, $permiso_id)));
		} else {
			$existe_permiso = PermisoEstablecimiento::find('first', array('conditions' => array('residuo = ? AND establecimiento_id = ?', $residuo, $establecimiento->id)));
		}
		if ($existe_permiso) {
			$errores['residuo'] = 'El permiso ya se encuentra asignado el establecimiento.';
		}
	}

	switch ($establecimiento->tipo)
	{
		case Establecimiento::GENERADOR:
			if ( ! is_numeric($cantidad)) { $errores['cantidad'] = 'Debe indicar la cantidad.'; }
			break;
		case Establecimiento::OPERADOR:
			if ( ! $tratamientos) { $errores['tratamientos'] = 'Debe indicar al menos un tratamiento.'; }
			break;
	}

	return isset($errores) ? $errores : array();
}

/**
 * El save varía por rol porque cada uno ingresa distintos datos.
 */
function setPermisoEstablecimiento($establecimiento)
{
	$permiso_establecimiento = isset($_POST['permiso_id']) ? PermisoEstablecimiento::find($_POST['permiso_id']) : new PermisoEstablecimiento;

	// comun para los 3 roles
	$permiso_establecimiento->residuo = $_POST['residuo'];
	$permiso_establecimiento->establecimiento_id = $establecimiento->id;

	// generador
	if ($establecimiento->tipo == Establecimiento::GENERADOR) {
		$permiso_establecimiento->cantidad = $_POST['cantidad'];
	}

	$permiso_establecimiento->save();

	// Siendo operador hay que grabar los tratamientos en la tabla de relacion (permisos_establecimientos_residuos).
	// Como puede que hayan eliminado tratamientos, limpio tratamientos si ya tenia seteados y escribo los recibidos.
	if ($establecimiento->tipo == Establecimiento::OPERADOR) {

		foreach ($permiso_establecimiento->tratamientos as $old_trat) {
			$old_trat->delete();
		}
		
		$nuevos_tratamientos = json_decode(stripslashes($_POST['tratamientos']));
		foreach ($nuevos_tratamientos as $new_trat) {
			$data = array(
				'permiso_establecimiento' => $permiso_establecimiento->id,
				'operacion_residuo' => $new_trat,
				'fecha_registro' => new Datetime
			);

			PermisoEstablecimientoResiduo::create($data);
		}
	}

	return createResponsePermisoObject($establecimiento, $permiso_establecimiento);
}

function createResponsePermisoObject($establecimiento, $permiso_establecimiento)
{
	$objdata = array(
		'id' => $permiso_establecimiento->id,
		'establecimiento_id' => $permiso_establecimiento->establecimiento_id,
		'tipo_establecimiento' => obtener_tipo($establecimiento->tipo),
		'residuo' => $permiso_establecimiento->residuo,
		'descripcion' => utf8_encode(obtener_categoria_residuo($permiso_establecimiento->residuo)),
		'cantidad' => $permiso_establecimiento->cantidad,
		'tratamientos' => array(),
	);


	if ($establecimiento->tipo == Establecimiento::OPERADOR)
	{
		// obtengo los tratamientos de esta manera porque si se trata de un nuevo registro con tratamientos
		// hasta no hacer el commit en la transaccion no puedo acceder a traves de las relaciones del orm ($permiso_establecimiento->tratamientos)
		$objdata['tratamientos'] = json_decode(stripslashes($_POST['tratamientos']));
	}

	return $objdata;
}

function deletePermisoEstablecimiento($establecimiento)
{
	$errores = array();
	$permiso_id = $_POST['permiso_id'];
	$establecimiento_id = $_POST['establecimiento_id'];

	$permiso = PermisoEstablecimiento::find('first', array('conditions' => array('id = ? AND establecimiento_id = ?', $permiso_id, $establecimiento_id)));
	
	if ($permiso) {

		// en caso de ser TRANS. checkeamos que el residuo no este siendo usado por un vehiculo.
		if ($establecimiento->tipo == Establecimiento::TRANSPORTISTA) {
			$model = new PermisoVehiculo;
			$permisos_asignados_a_vehiculos = $model->getPermisosVehiculosByEstablecimiento($establecimiento);
			// itero sobre los permisos, al primer matcheo ya puedo salir
			foreach ($permisos_asignados_a_vehiculos as $perm) {
				if ($permiso->residuo == $perm->residuo) {
					$errores['delete_error'] = 'No se puede eliminar el permiso ya que est&aacute; siendo utilizado por un veh&iacute;culo';
					return $errores;
				}
			}
		}

		foreach ($permiso->tratamientos as $trat) {
			$trat->delete();
		}

		$permiso->delete();
	}

	return $errores;
}

?>
