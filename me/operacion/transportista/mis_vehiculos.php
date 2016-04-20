<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
	
	if ($ROL_ID!=2)
	{
		header("Location: mi_cuenta.php");
	}


	// Empresa ID
	$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
	// Establecimiento ID
	$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	$model = new CambioSolicitadoEstablecimiento;
	$solicitud = $model->getSolicitud($empresaID, $establecimientoID);


	$query = "SELECT A.id, A.establecimiento_id, A.dominio, A.tipo_vehiculo, A.tipo_caja, A.descripcion, B.tipo_cambio
			FROM vehiculos A
			LEFT JOIN cambios_vehiculos B
				ON (B.solicitud_id=? AND A.id=B.vehiculo_id AND B.estado=?)
			WHERE A.establecimiento_id=? AND A.flag='t' ";

	$vehiculos = CambioVehiculo::connection();
	$vehiculos = CambioVehiculo::find_by_sql($query, array($solicitud->id, 'P', $establecimientoID));

	// Borrar establecimiento
	if ( $_POST['accion'] == 'baja' )
	{

		foreach ($vehiculos as $key => $value)
		{

			if ($_POST['vehiculo'] == $value->id)
			{

				$solicitud->save();

				$cambio_permiso = new CambioVehiculo(Array(
					'solicitud_id'				 => $solicitud->id,
					'vehiculo_id'				 => $_POST['vehiculo'],
					'tipo_cambio'				 => 'B',
				));

				$cambio_permiso->save();

				exit(	json_encode(true));
			}

		}
		
	}


	$vehiculos_pendientes = CambioVehiculo::find('all', array('conditions' => array('solicitud_id=? AND tipo_cambio=? AND estado=?', $solicitud->id, 'A', 'P')));

	$smarty->assign("VEHICULOS", $vehiculos);

	$smarty->assign('VEHICULOS_APROBACION', $vehiculos_pendientes);

	$smarty->assign("ROL_ID", $ROL_ID);

	$smarty->display('operacion/transportista/mis_vehiculos.tpl');

	session_write_close();
?>