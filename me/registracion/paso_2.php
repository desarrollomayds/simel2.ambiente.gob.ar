<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(1, $_SESSION['PASOS_CORRECTOS'])){
		header("Location: /registracion/paso_1.php");
		exit;
	}

	$provincias  = obtener_provincias();
	$localidades = Array();

	$smarty  = inicializar_smarty();
	$errores = Array();

	$post_valido = FALSE;

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$post_valido = true;

		$campos = array(
			'nombre'            => array('nombre' => 'Razo social',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'fecha_inicio_act'  => array('nombre' => 'Fecha de inicio de actividades',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
			'calle_r'           => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'provincia_r'       => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
			'localidad_r'       => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),
			'numero_r'          => array('nombre' => 'Numero (real)',                   'filter' => FILTER_VALIDATE_INT),
			'cpostal_r'			=> array('nombre' => 'C&oacute;digo Postal (real)',		'filter' => FILTER_VALIDATE_INT),
			'latitud_r'         => array('nombre' => 'Latitud (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'longitud_r'        => array('nombre' => 'Longitud (real)',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'calle_l'           => array('nombre' => 'Calle (legal)',                   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_l'          => array('nombre' => 'Numero (legal)',                  'filter' => FILTER_VALIDATE_INT),
			'provincia_l'       => array('nombre' => 'Provincia (legal)',               'filter' => FILTER_VALIDATE_INT),
			'localidad_l'       => array('nombre' => 'Localidad (legal)',               'filter' => FILTER_VALIDATE_INT),
			'cpostal_l'			=> array('nombre' => 'C&oacute;digo Postal (legal)',	'filter' => FILTER_VALIDATE_INT),
			'calle_c'           => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_c'          => array('nombre' => 'Numero (constituido)',            'filter' => FILTER_VALIDATE_INT),
			'provincia_c'       => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'localidad_c'       => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'cpostal_c'			=> array('nombre' => 'C&oacute;digo Postal (constituido)',	'filter' => FILTER_VALIDATE_INT),
			'numero_telefonico' => array('nombre' => 'Numero telefonico',               'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/'))
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

		if($_POST['rol_generador'] + $_POST['rol_transportista'] + $_POST['rol_operador'] == 0){
			$campo = 'roles';
			$errores[$campo] = 'Debe elegir al menos un rol';
		}
		if(count($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES']) == 0){
			$campo = 'lista_resp_legales';
			$errores[$campo] = 'Debe elegir al menos un responsable legal';
		}
		if(count($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS']) == 0){
			$campo = 'lista_resp_tecnicos';
			$errores[$campo] = 'Debe elegir al menos un responsable tecnico';
		}

		if(!count($errores)){
			#hacer validaciones
			$_SESSION['DATOS_EMPRESA']['NOMBRE']                  = $_POST['nombre'];
			$_SESSION['DATOS_EMPRESA']['ROLES']                   = Array(  'GENERADOR'     => $_POST['rol_generador'],
																			'TRANSPORTISTA' => $_POST['rol_transportista'],
																			'OPERADOR'      => $_POST['rol_operador']);
			$_SESSION['DATOS_EMPRESA']['FECHA_INICIO_ACT']        = $_POST['fecha_inicio_act'];

			$_SESSION['DATOS_EMPRESA']['CALLE_R']                 = $_POST['calle_r'];
			$_SESSION['DATOS_EMPRESA']['NUMERO_R']                = $_POST['numero_r'];
			$_SESSION['DATOS_EMPRESA']['PISO_R']                  = ((int)$_POST['piso_r']) or 0;
			$_SESSION['DATOS_EMPRESA']['OFICINA_R']               = ((int)$_POST['oficina_r']) or 0;
			$_SESSION['DATOS_EMPRESA']['PROVINCIA_R']             = $_POST['provincia_r'];
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']             = $_POST['localidad_r'];
			$_SESSION['DATOS_EMPRESA']['CPOSTAL_R']               = $_POST['cpostal_r'];

			$_SESSION['DATOS_EMPRESA']['LATITUD_R']               = $_POST['latitud_r'];
			$_SESSION['DATOS_EMPRESA']['LONGITUD_R']              = $_POST['longitud_r'];

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_L']             = $_POST['provincia_l'];
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_L']             = $_POST['localidad_l'];
			$_SESSION['DATOS_EMPRESA']['NUMERO_L']                = $_POST['numero_l'];
			$_SESSION['DATOS_EMPRESA']['CALLE_L']                 = $_POST['calle_l'];
			$_SESSION['DATOS_EMPRESA']['PISO_L']                  = $_POST['piso_l'];
			$_SESSION['DATOS_EMPRESA']['OFICINA_L']               = $_POST['oficina_l'];
			$_SESSION['DATOS_EMPRESA']['CPOSTAL_L']               = $_POST['cpostal_l'];

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_C']             = $_POST['provincia_c'];
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_C']             = $_POST['localidad_c'];
			$_SESSION['DATOS_EMPRESA']['CALLE_C']                 = $_POST['calle_c'];
			$_SESSION['DATOS_EMPRESA']['NUMERO_C']                = $_POST['numero_c'];
			$_SESSION['DATOS_EMPRESA']['PISO_C']                  = $_POST['piso_c'];
			$_SESSION['DATOS_EMPRESA']['OFICINA_C']               = $_POST['oficina_c'];
			$_SESSION['DATOS_EMPRESA']['CPOSTAL_C']               = $_POST['cpostal_c'];

			$_SESSION['DATOS_EMPRESA']['NUMERO_TELEFONICO']       = $_POST['numero_telefonico'];

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_R_']            = obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_R']);
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_R_']            = obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']);

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_L_']            = obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_L']);
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_L_']            = obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_L']);

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_C_']            = obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_C']);
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_C_']            = obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_C']);

			// Redirecciona al primer rol que se haya seleccionado
			foreach ($_SESSION['DATOS_EMPRESA']['ROLES'] as $rol => $id)
			{
				if ($id > 0)
				{
					$retorno['siguiente'] = $_SESSION['siguiente_paso'] = 'paso_3.php?rol='.$id;
					break;
				}
			}

			$_SESSION['PASOS_CORRECTOS'][2] = 2;
		}

		$retorno['estado'] = (!count($errores)) ? 0 : 1;
		$retorno['session_data'] = $_SESSION;
		$retorno['errores'] = $errores;

		echo json_encode($retorno);
	}else{

		unset($_SESSION['PASOS_CORRECTOS'][2]);

		if(!empty($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES'])){
			$representantes_legales = $_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES'];
		}

		if(!empty($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'])){
			$representantes_tecnicos = $_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'];
		}

		$smarty->assign('EMPRESA',                 $_SESSION['DATOS_EMPRESA']);
		$smarty->assign('PROVINCIAS',              $provincias);
		$smarty->assign('LOCALIDADES',             $localidades);
		$smarty->assign('LOCALIDADES_C',           $localidades_c);
		$smarty->assign('REPRESENTANTES_LEGALES',  $representantes_legales);
		$smarty->assign('REPRESENTANTES_TECNICOS', $representantes_tecnicos);

		$smarty->assign('LOCALIDADES_R', obtener_localidades($_SESSION['DATOS_EMPRESA']['PROVINCIA_R'],0));
		$smarty->assign('LOCALIDADES_L', obtener_localidades($_SESSION['DATOS_EMPRESA']['PROVINCIA_L'],0));
		$smarty->assign('LOCALIDADES_C', obtener_localidades($_SESSION['DATOS_EMPRESA']['PROVINCIA_C'],0));

		$smarty->assign('RAZON_SOCIAL', obtener_razon_social($_SESSION['DATOS_EMPRESA']['CUIT']));

		$smarty->assign('ERRORES',       $errores);

		$smarty->display('registracion/paso_2.tpl');
	}

	session_write_close();
?>
