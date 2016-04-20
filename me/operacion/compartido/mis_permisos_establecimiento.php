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

	$categorias = obtener_categorias_residuos();


	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$retorno = array();
		$errores = array();
		$permiso = array();


		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;

		$campos = array(
			'permiso_residuo' => array('nombre' => 'Codigo de residuo', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		);

		if($post_valido)
		{
			$validaciones = filter_input_array(INPUT_POST, $campos);
	
			foreach($validaciones as $campo => $resultado)
			{
				if(strlen($resultado) == 0)
				{
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}

			if ($ROL_ID==3)
			{
				// Decode de los permisos debido al JSON.stringify
				$eliminacion = json_decode(stripslashes($_POST['operaciones_residuo']));
				
				// Si no se seleccionó ningúna operación de eliminación devuelve error
			    if (!$eliminacion)
			    {	
			    	// Devuelve error para que no se procese el formulario
      				$errores['operaciones_residuo'] = 'Debe seleccionar al menos una operaci&oacute;n de residuo';
      				$post_valido = false;
			    }

			}

		}

		if ($_POST['accion'] == 'editar' && $post_valido)
		{

			$existePermiso = PermisoEstablecimiento::connection();


			$existePermiso = PermisoEstablecimiento::find('first', array('conditions' => array('id <> ? and establecimiento_id=? and residuo=?', $_POST['id'], $establecimientoID, $_POST['permiso_residuo'])));

			if (!$existePermiso)
			{

				$existePermisoPendiente = CambioPermisoEstablecimiento::find('first', array('conditions' => array('solicitud_id=? AND residuo=? AND estado=?', $solicitud->id, $_POST['permiso_residuo'], 'P')));

				if ( ! $existePermisoPendiente)
				{	

					$solicitud->save();

					$crearPermisoPendiente = new CambioPermisoEstablecimiento(array(
						'solicitud_id' 		 => $solicitud->id,		
						'permiso_id' 		 => $_POST['id'],
						'residuo'			 => $_POST['permiso_residuo'],
						'cantidad'			 => (isset($_POST['permiso_cantidad']) ? $_POST['permiso_cantidad'] : NULL),
						'tratamientos'		 => (isset($_POST['operaciones_residuo']) ? stripslashes($_POST['operaciones_residuo']) : NULL),
						'tipo_cambio'		 => 'E',
					));

					$crearPermisoPendiente->save();

				}
				else
				{
					$errores['residuo_pendiente'] = 'Ya existe un residuo <b>'.$_POST['permiso_residuo'].'</b> en estado pendiente de aprobaci&oacute;n';
					$post_valido = false;
				}
			}
			else
			{
				$errores['residuo_pendiente'] = 'Ya existe un residuo <b>'.$_POST['permiso_residuo'].'</b> en el establecimiento.';
				$post_valido = false;
			}

		}
		// Crear
		elseif($post_valido)
		{
			$existePermiso = PermisoEstablecimiento::connection();

			$existePermiso = PermisoEstablecimiento::find('first', array('conditions' => array('establecimiento_id=? and residuo=?', $establecimientoID, $_POST['permiso_residuo'])));

			if (!$existePermiso)
			{

				$existePermisoPendiente = CambioPermisoEstablecimiento::find('first', array('conditions' => array('solicitud_id=? AND residuo=? AND estado=?', $solicitud->id, $_POST['permiso_residuo'], 'P')));

				if ( ! $existePermisoPendiente)
				{	

					$solicitud->save();

					$crearPermisoPendiente = new CambioPermisoEstablecimiento(array(
						'solicitud_id' 		 => $solicitud->id,
						'residuo'			 => $_POST['permiso_residuo'],
						'cantidad'			 => (isset($_POST['permiso_cantidad']) ? $_POST['permiso_cantidad'] : NULL),
						'tratamientos'		 => (isset($_POST['operaciones_residuo']) ? stripslashes($_POST['operaciones_residuo']) : NULL),
						'tipo_cambio'		 => 'A',
					));

					$crearPermisoPendiente->save();

				}
				else
				{
					$errores['residuo_pendiente'] = 'Ya existe un residuo <b>'.$_POST['permiso_residuo'].'</b> en estado pendiente de aprobaci&oacute;n';
					$post_valido = false;
				}
			}
			else
			{
				$errores['residuo_pendiente'] = 'Ya existe un residuo <b>'.$_POST['permiso_residuo'].'</b> en el establecimiento.';
				$post_valido = false;
			}

		}

			$retorno['estado']  = (!count($errores)) ? 0 : 1;
			$retorno['errores'] = $errores;


			//var_dump($retorno);

	        exit(	json_encode($retorno));
	}



	if ($_GET['accion'] == 'editar' && !empty($_GET['id']))
	{
		$permiso = PermisoEstablecimiento::connection();
		$permiso = PermisoEstablecimiento::find('first', array('conditions' => array('id=? and establecimiento_id=?', $_GET['id'], $establecimientoID)));

		$smarty->assign('PERMISO', $permiso);


		$query = "SELECT B.* FROM permisos_establecimientos A, permisos_establecimientos_residuos B WHERE A.establecimiento_id=". $establecimientoID ." AND A.id = ".$_GET['id']." AND A.id=B.permiso_establecimiento";

		$residuos = PermisoEstablecimientoResiduo::find_by_sql($query);

		$smarty->assign('MIS_RESIDUOS', $residuos);
	}

	// Si el establecimiento es operador
	if ($ROL_ID == 3)
	{	
		// Se carga el listado de operaciones de elimación
		$smarty->assign('OPERACIONES', obtener_categorias_operaciones());
	}



	$smarty->assign('ACCION', $_GET['accion']);
	$smarty->assign('ROL_ID', $ROL_ID);
	$smarty->assign('RESIDUOS', $categorias);

	$smarty->display('operacion/compartido/mis_permisos_establecimiento.tpl');

	session_write_close();
?>