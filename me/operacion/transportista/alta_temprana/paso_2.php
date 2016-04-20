<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(1, $_SESSION['PASOS_CORRECTOS'])){
		header("Location: /operacion/transportista/alta_temprana/paso_1.php");
		exit;
	}

	$provincias  = obtener_provincias();
	$localidades = Array();

	$smarty  = inicializar_smarty();
	$errores = Array();

	$post_valido = FALSE;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$post_valido = true;
	
		$campos = array(
			'nombre'            => array('nombre' => 'Razo social',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'fecha_inicio_act'  => array('nombre' => 'Fecha de inicio de actividades',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),

			'calle_r'           => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_r'          => array('nombre' => 'Numero (real)',                   'filter' => FILTER_VALIDATE_INT),
//			'piso_r'            => array('nombre' => 'Piso (real)',                     'filter' => FILTER_VALIDATE_INT),
//			'oficina_r'         => array('nombre' => 'Oficina (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'provincia_r'       => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
			'localidad_r'       => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),

			'latitud_r'         => array('nombre' => 'Latitud (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'longitud_r'        => array('nombre' => 'Longitud (real)',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

			'calle_c'           => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_c'          => array('nombre' => 'Numero (constituido)',            'filter' => FILTER_VALIDATE_INT),
			'piso_c'            => array('nombre' => 'Piso (constituido)',              'filter' => FILTER_VALIDATE_INT),
			'oficina_c'         => array('nombre' => 'Oficina (constituido)',           'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
#			'provincia_c'       => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'localidad_c'       => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),

			'numero_telefonico' => array('nombre' => 'Numero telefonico',               'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'direccion_email'   => array('nombre' => 'Direccion de email',              'filter' => FILTER_VALIDATE_EMAIL)
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
/*
		if(count($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES']) == 0){
			$campo = 'lista_resp_legales';
			$errores[$campo] = '
Debe elegir al menos un responsable legal';
		}
		if(count($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS']) == 0){
			$campo = 'lista_resp_tecnicos';
			$errores[$campo] = '
Debe elegir al menos un responsable tecnico';
		}
*/
		if(!count($errores)){
			#hacer validaciones
			$_SESSION['DATOS_EMPRESA']['NOMBRE']                  = $_POST['nombre'];
			$_SESSION['DATOS_EMPRESA']['ROLES']                   = Array(  'GENERADOR'     => 1, 
																			'TRANSPORTISTA' => 0, 
																			'OPERADOR'      => 0);
			$_SESSION['DATOS_EMPRESA']['FECHA_INICIO_ACT']        = $_POST['fecha_inicio_act'];

			$_SESSION['DATOS_EMPRESA']['CALLE_R']                 = $_POST['calle_r'];
			$_SESSION['DATOS_EMPRESA']['NUMERO_R']                = $_POST['numero_r'];
			$_SESSION['DATOS_EMPRESA']['PISO_R']                  = ((int)$_POST['piso_r']) or 0;
			$_SESSION['DATOS_EMPRESA']['OFICINA_R']               = ((int)$_POST['oficina_r']) or 0;
			$_SESSION['DATOS_EMPRESA']['PROVINCIA_R']             = $_POST['provincia_r'];
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']             = $_POST['localidad_r'];

			$_SESSION['DATOS_EMPRESA']['LATITUD_R']               = $_POST['latitud_r'];
			$_SESSION['DATOS_EMPRESA']['LONGITUD_R']              = $_POST['longitud_r'];

			$_SESSION['DATOS_EMPRESA']['CALLE_C']                 = $_POST['calle_c'];
			$_SESSION['DATOS_EMPRESA']['NUMERO_C']                = $_POST['numero_c'];
			$_SESSION['DATOS_EMPRESA']['PISO_C']                  = $_POST['piso_c'];
			$_SESSION['DATOS_EMPRESA']['OFICINA_C']               = $_POST['oficina_c'];
#			$_SESSION['DATOS_EMPRESA']['PROVINCIA_C']             = $_POST['provincia_c'];
			$_SESSION['DATOS_EMPRESA']['PROVINCIA_C']             = 2; //VALOR ARBITRARIO DE CAPITAL FEDERAL

			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_C']             = $_POST['localidad_c'];
			
			$_SESSION['DATOS_EMPRESA']['NUMERO_TELEFONICO']       = $_POST['numero_telefonico'];
			$_SESSION['DATOS_EMPRESA']['DIRECCION_EMAIL']         = $_POST['direccion_email'];

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_R_']            = obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_R']);
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_R_']            = obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']);

			$_SESSION['DATOS_EMPRESA']['PROVINCIA_C_']            = obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_C']);
			$_SESSION['DATOS_EMPRESA']['LOCALIDAD_C_']            = obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_C']);

			$retorno['siguiente'] = '/operacion/transportista/alta_temprana/paso_3.php';

			$_SESSION['PASOS_CORRECTOS'][2] = 2;
		}

		$retorno['estado']    = (!count($errores)) ? 0 : 1;
		$retorno['errores']   = $errores;

		echo json_encode($retorno);
	}else{
		unset($_SESSION['PASOS_CORRECTOS'][2]);

		$localidades_c = obtener_localidades('2', 0); //valor arbitrario para capital federal

		if(!empty($_SESSION['DATOS_EMPRESA']['PROVINCIA'])){
			$localidades = obtener_localidades($_SESSION['DATOS_EMPRESA']['PROVINCIA'], 0);
		}else{
			$localidades = obtener_localidades($provincias[0]['CODIGO'], 0);
			$localidades_= array_keys($localidades);

			$smarty->assign('LOCALIDAD_DEFAULT', $localidades_[0]);
			$smarty->assign('PROVINCIA_DEFAULT', $provincias[0]['CODIGO']);
		}

		if(!empty($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES'])){
			$representantes_legales = $_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES'];
		}

		if(!empty($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'])){
			$representantes_tecnicos = $_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'];
		}

		if(strlen($_SESSION['DATOS_EMPRESA']['CALLE_R'])){
			$punto_inicio = $_SESSION['DATOS_EMPRESA']['CALLE_R'] . " " . $_SESSION['DATOS_EMPRESA']['NUMERO_R'] . ", " . obtener_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']) . ", " . obtener_municipio_por_localidad($_SESSION['DATOS_EMPRESA']['LOCALIDAD_R']) . ", " . obtener_provincia($_SESSION['DATOS_EMPRESA']['PROVINCIA_R']) . ", " . " argentina";
		}else{
			$punto_inicio = "av. de mayo 1, ciudad autonoma de buenos aires, argentina";
		}

		$smarty->assign('EMPRESA',                 $_SESSION['DATOS_EMPRESA']);
		$smarty->assign('PROVINCIAS',              $provincias);
		$smarty->assign('LOCALIDADES',             $localidades);
		$smarty->assign('LOCALIDADES_C',           $localidades_c);
		$smarty->assign('REPRESENTANTES_LEGALES',  $representantes_legales);
		$smarty->assign('REPRESENTANTES_TECNICOS', $representantes_tecnicos);
		$smarty->assign('PUNTO_INICIO',            $punto_inicio);
		$smarty->assign('GOOGLE_MAPS_KEY',         GOOGLE_MAPS_KEY);

		$smarty->assign('ERRORES',                 $errores);

		$smarty->display('operacion/transportista/alta_temprana/paso_2.tpl');	
	}

	session_write_close();
?>
