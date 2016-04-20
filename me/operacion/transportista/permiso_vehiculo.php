<?php
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];

	// Empresa ID
	$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
	// Establecimiento ID
	$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

	$model = new CambioSolicitadoEstablecimiento;
	$solicitud = $model->getSolicitud($empresaID, $establecimientoID);

	$categorias = obtener_categorias_residuos();

	$vehiculo_id = isset($_GET['vehiculo']) ? $_GET['vehiculo'] : $_POST['vehiculo'];

	$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

	$query = "SELECT A.residuo AS codigo, B.descripcion FROM permisos_establecimientos A, cat_residuos_peligrosos B WHERE establecimiento_id = ".$establecimientoID." AND A.residuo=B.codigo";

	$permisosEstablecimientos = PermisoEstablecimiento::find_by_sql($query);

	if ($permisosEstablecimientos)
	{
		$extra = true;
		$smarty->assign("RESIDUOS", $permisosEstablecimientos);
	}
	else
	{
		$extra = false;
	}

	$errores = Array();


	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] != 'baja'){

		$retorno = array();
		$errores = array();
		$permiso = array();

		$post_valido = true;

		$campos = array(
			'vehiculo'        => array('nombre' => 'Identificador de vehiculo',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
			'residuo'         => array('nombre' => 'Codigo de residuo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'cantidad'        => array('nombre' => 'Cantidad',                         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
			'estado'          => array('nombre' => 'Estado',                           'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
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

		}

		if ($_POST['accion'] == 'editar' && $post_valido)
		{

			foreach ($permisosEstablecimientos as $key => $value)
			{
				if ($value->codigo == $_POST['residuo'])
				{

					// Compruebo que el residuo no esté en uso
					$permisoEnUso = PermisoVehiculo::find("first", array("conditions" => array("vehiculo_id=? AND id<>? AND residuo=?", $_POST['vehiculo'], $_POST['permiso'], $_POST['residuo'])));
					// Compruebo que el residuo no esté en estado pendiente de aprobación
					$permisoPendienteAprobacion = CambioPermisoVehiculo::find("first", array("conditions" => array("solicitud_id=? AND vehiculo_id=? AND residuo=? AND estado='P'", $solicitud->id, $_POST['vehiculo'], $_POST['residuo'])));

					if ( ! $permisoEnUso && ! $permisoPendienteAprobacion)
					{
						$solicitud->save();

						$editarPermisoVehiculo = new CambioPermisoVehiculo(array(
							'solicitud_id'	=> $solicitud->id,
							'vehiculo_id'	=> $_POST['vehiculo'],
							'vehiculo_permiso_id' => $_POST['permiso'],
							'tipo_cambio'	=> 'E',
							'estado_residuo' => $_POST['estado'],
							'cantidad'	=> $_POST['cantidad'],
							'residuo'	=> $_POST['residuo'],
						));

						$editarPermisoVehiculo->save();
					}
					else
					{
						if ($permisoEnUso)
						{
							$errores['duplicado'] = 'Ya existe el resiudo <b>'.$_POST['residuo'].'</b> para el veh&iacute;culo actual.';
						}
						else
						{
							$errores['duplicado'] = 'El residuo <b>'.$_POST['residuo'].'</b> para el veh&iacute;culo actual esta en proceso de aprobaci&oacute;n';
						}
					}

				}
			}

		}

		if ($_POST['accion'] == 'agregar' && $post_valido)
		{

			foreach ($permisosEstablecimientos as $key => $value)
			{
				if ($value->codigo == $_POST['residuo'])
				{

					// Compruebo que el residuo no esté en uso
					$permisoEnUso = PermisoVehiculo::find("first", array("conditions" => array("vehiculo_id=? AND residuo=?", $_POST['vehiculo'], $_POST['residuo'])));
					// Compruebo que el residuo no esté en estado pendiente de aprobación
					$permisoPendienteAprobacion = CambioPermisoVehiculo::find("first", array("conditions" => array("solicitud_id=? AND vehiculo_id=? AND residuo=?", $solicitud->id, $_POST['vehiculo'], $_POST['residuo'])));

					if ( ! $permisoEnUso && ! $permisoPendienteAprobacion)
					{
						$solicitud->save();

						$crearPermisoVehiculo = new CambioPermisoVehiculo(array(
							'solicitud_id' => $solicitud->id,
							'vehiculo_id'	=> $_POST['vehiculo'],
							'tipo_cambio' => 'A',
							'estado_residuo' => $_POST['estado'],
							'cantidad'	=> $_POST['cantidad'],
							'residuo'	=> $_POST['residuo'],
						));

						$crearPermisoVehiculo->save();
					}
					else
					{
						if ($permisoEnUso)
						{
							$errores['duplicado'] = 'Ya existe el resiudo <b>'.$_POST['residuo'].'</b> para el veh&iacute;culo actual.';
						}
						else
						{
							$errores['duplicado'] = 'El residuo <b>'.$_POST['residuo'].'</b> para el veh&iacute;culo actual esta en proceso de aprobaci&oacute;n';
						}
					}

				}
			
			}

		}

		$retorno['datos']   = $permiso;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        exit(json_encode($retorno));

	}

	if ($_POST['accion'] == 'baja')
	{
		
		// Agregarle mas seguridad incluyendo el id del establecimiento!
		$existePermiso = PermisoVehiculo::find('first', array('conditions' => array('vehiculo_id=? AND id=?', $_POST['vehiculo'], $_POST['permiso'])));

		if ($existePermiso)
		{	

			$solicitud->save();

			$cambio_permiso = new CambioPermisoVehiculo(Array(
				'solicitud_id'	=> $solicitud->id,
				'vehiculo_id'	=> $existePermiso->vehiculo_id,
				'vehiculo_permiso_id'	=> $existePermiso->id,
				'tipo_cambio'	=> 'B'
			));

			$cambio_permiso->save();

			exit(	json_encode(true));
		}
		else
		{
			exit(	json_encode(false));
		}

	}

	// GET para editar
	if ($_GET['accion'] == 'editar' && !empty($_GET['vehiculo']) && !empty($_GET['permiso']))
	{
		$permiso = PermisoVehiculo::connection();
		$permiso = PermisoVehiculo::find('first', array('conditions' => array('vehiculo_id=? and id=?', $_GET['vehiculo'], $_GET['permiso'])));

		$smarty->assign('PERMISO', $permiso);
		$smarty->assign("PERMISO_ID", $_GET['permiso']);
	}

	$smarty->assign("EXTRA", $extra);

	$smarty->assign("VEHICULO_ID", $vehiculo_id);

	$smarty->assign("ACCION", $accion);
	
 	$smarty->display('operacion/transportista/permiso_vehiculo.tpl');

	session_write_close();