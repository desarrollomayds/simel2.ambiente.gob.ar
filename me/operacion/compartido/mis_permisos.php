<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty = inicializar_smarty();

	$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];

	// Empresa ID
	$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
	// Establecimiento ID
	$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	$model = new CambioSolicitadoEstablecimiento;
	$solicitud = $model->getSolicitud($empresaID, $establecimientoID);

	$query = "SELECT A.id, A.establecimiento_id, A.residuo, A.cantidad, A.estado, B.tipo_cambio, C.descripcion
				FROM cat_residuos_peligrosos C, permisos_establecimientos A
					LEFT JOIN cambios_permisos_establecimientos B
						ON (B.solicitud_id=? AND A.id=B.permiso_id AND B.estado=?)
				WHERE A.establecimiento_id=? AND C.codigo=A.residuo AND C.flag='t' AND A.flag='t'";

	$permisos = PermisoEstablecimiento::connection();
	$permisos = PermisoEstablecimiento::find_by_sql($query, array($solicitud->id, 'P', $establecimientoID));

	// Borrar establecimiento
	if ( $_POST['accion'] == 'baja' )
	{
		foreach ($permisos as $key => $value)
		{
			if ($_POST['id'] == $value->id)
			{

				$solicitud->save();

				$cambio_permiso = new CambioPermisoEstablecimiento(Array(
					'solicitud_id'				 => $solicitud->id,
					'permiso_id'				 => $_POST['id'],
					'tipo_cambio'				 => 'B',
				));

				$cambio_permiso->save();

				exit(	json_encode(true));
			}

		}
		
	}


	$permisos_pendientes = CambioPermisoEstablecimiento::find('all', array('conditions' => array('solicitud_id=? AND tipo_cambio=? AND estado=?', $solicitud->id, 'A', 'P')));


	$smarty->assign('ROL_ID', $ROL_ID);

	$smarty->assign('PERMISOS', $permisos);

	$smarty->assign('PERMISOS_APROBACION', $permisos_pendientes);

	$smarty->assign('PERFIL', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));

	$smarty->display('operacion/compartido/mis_permisos.tpl');

	session_write_close();
?>