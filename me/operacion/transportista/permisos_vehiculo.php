<?php
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];

	// Empresa ID
	$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
	// Establecimiento ID
	$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	$model = new CambioSolicitadoEstablecimiento;
	$solicitud = $model->getSolicitud($empresaID, $establecimientoID);

	$categorias = obtener_categorias_residuos();

	$vehiculo_id = isset($_GET['vehiculo']) ? $_GET['vehiculo'] : $_POST['vehiculo'];

	$query = "SELECT B.id, B.residuo, B.cantidad, B.estado as estado_residuo, C.tipo_cambio
			FROM permisos_vehiculos B, vehiculos A
			LEFT JOIN cambios_permisos_vehiculos C
				ON (C.solicitud_id=? AND A.id=C.vehiculo_id AND C.estado=? AND C.tipo_cambio <> 'A')
			WHERE A.id=? AND A.id=B.vehiculo_id AND A.establecimiento_id=?";

	$permisos_vehiculo = CambioVehiculo::find_by_sql($query, array($solicitud->id, 'P', $vehiculo_id, $establecimientoID));

	$query = "SELECT A.id, A.residuo, A.cantidad, A.estado as estado_residuo, A.tipo_cambio
			FROM cambios_permisos_vehiculos A
			WHERE A.solicitud_id=? AND A.estado=? AND A.tipo_cambio=? AND A.vehiculo_id=?";

	$permisos_vehiculo_pendientes = CambioVehiculo::find_by_sql($query, array($solicitud->id, 'P', 'A', $vehiculo_id));
	
	$smarty->assign("VEHICULO_ID", $vehiculo_id);

	$smarty->assign("PERMISOS", $permisos_vehiculo);

	$smarty->assign("PERMISOS_PENDIENTES", $permisos_vehiculo_pendientes);
	     
 	$smarty->display('operacion/transportista/permisos_vehiculo.tpl');

	session_write_close();

