<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty = inicializar_smarty();

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


	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		$retorno  = array();
		$errores  = array();
		$vehiculo = array();

		$post_valido = true;
	
		#validaciones
		if($_POST['accion'] != 'baja')
		{
			$campos = array(
				'dominio'           => array('nombre' => 'Dominio',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'tipo_vehiculo'     => array('nombre' => 'Tipo Vehiculo',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'descripcion'       => array('nombre' => 'Descripcion',                      'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);

			if($post_valido){
				$validaciones = filter_input_array(INPUT_POST, $campos);
		
				foreach($validaciones as $campo => $resultado){
					if(strlen($resultado) == 0){
						$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
						$post_valido = false;
					}
				}
			}

			if(!count($errores))
			{

				if ($_POST['accion'] == 'editar')
				{	

					$buscarVehiculo = Vehiculo::find('first', array('conditions' => array('establecimiento_id=? AND id=?', $establecimientoID, $_POST['id'])));
		
					if ($buscarVehiculo)
					{
						// busco que no exista un mismo dominio para el establecimiento, sin tener en cuenta el actual
						$buscarDuplicados = Vehiculo::find('first', array('conditions' => array('id <> ? AND establecimiento_id=? AND dominio=?', $_POST['id'], $establecimientoID, $_POST['dominio'])));

						if ( ! $buscarDuplicados)
						{
								$solicitud->save();

								$crearVehiculo = new CambioVehiculo(array(
									'solicitud_id'	=> $solicitud->id,
									'vehiculo_id' => $_POST['id'],
									'dominio' => $_POST['dominio'],
									'tipo_vehiculo' => $_POST['tipo_vehiculo'],
									'tipo_caja'	=> $_POST['tipo_caja'],
									'descripcion' => $_POST['descripcion'],
									'tipo_cambio' => 'E',
								));

								$crearVehiculo->save();
						}
						else
						{
							$errores['dominio_uso'] = 'El dominio <b>'.$_POST['dominio'].'</b> est&aacute; en uso o en estado pendiente de aprobaci&oacute;n.';
							$post_valido = false;
						}
					}
				}
				// Agregar
				else
				{
					$query = "SELECT A.*, B.* FROM vehiculos A
								LEFT JOIN cambios_vehiculos B ON (B.solicitud_id = ? AND B.dominio = ?)
								WHERE A.establecimiento_id = ? AND A.dominio = ?";

					$comprobarExistencia = Vehiculo::find_by_sql($query, array($solicitud->id, $_POST['dominio'], $establecimientoID, $_POST['dominio']));

					if ( ! $comprobarExistencia)
					{
						
						$solicitud->save();

						$crearVehiculo = new CambioVehiculo(array(
							'solicitud_id'	=> $solicitud->id,
							'dominio' => $_POST['dominio'],
							'tipo_vehiculo' => $_POST['tipo_vehiculo'],
							'tipo_caja'	=> $_POST['tipo_caja'],
							'descripcion' => $_POST['descripcion'],
							'tipo_cambio' => 'A',
						));

						$crearVehiculo->save();
					}
					else
					{
						$errores['dominio_uso'] = 'El dominio <b>'.$_POST['dominio'].'</b> est&aacute; en uso o en estado pendiente de aprobaci&oacute;n.';
						$post_valido = false;
					}

				}
			
			}

		}

		$retorno['datos']   = $vehiculo;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        exit(json_encode($retorno));

	}
	else
	{	
		// es el get del display
		if ($_GET['accion']=='editar' && !empty($_GET['vehiculo']))
		{
			// Busco que exista el ID
			$buscarVehiculo = Vehiculo::find('first', array('conditions' => array('establecimiento_id=? AND id=?', $establecimientoID, $_GET['vehiculo'])));
		
			$smarty->assign("VEHICULO", $buscarVehiculo);

			$smarty->assign("ACCION", $_GET['accion']);
		}
	}

	$smarty->assign("ROL_ID", $ROL_ID);
	$smarty->assign('TIPOS_VEHICULO', TipoVehiculo::all());
	$smarty->assign('TIPOS_CAJA', TipoCaja::all());

	$smarty->display('operacion/transportista/vehiculos.tpl');

	session_write_close();
