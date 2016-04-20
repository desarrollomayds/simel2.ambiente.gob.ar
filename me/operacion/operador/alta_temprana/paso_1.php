<?
	require_once("../../../../global_incs/librerias/securimage/securimage.php");
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/librerias/local.inc.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty  = inicializar_smarty();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$post_valido = true;
	
		$campos = array(
			'cuit'    => array('nombre' => 'Cuit',    'filter' => FILTER_CALLBACK, 'options' => 'validar_cuit'),
			'captcha' => array('nombre' => 'Captcha', 'filter' => FILTER_CALLBACK, 'options' => 'validar_captcha')
		);

		if($post_valido){
			$validaciones = filter_input_array(INPUT_POST, $campos);
		
			foreach($validaciones as $campo => $resultado){
				if(!$resultado){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}

		if(validar_registracion_pendiente($_POST['cuit']) === True){
			$errores['cuit'] = 'Sr Usuario, Usted ya tiene un tramite pendiente. Espere a que el mismo finalice para ingresar una nueva peticion de alta.';
		}

		if(validar_registracion_activa($_POST['cuit']) === True){
			$errores['cuit'] = 'Sr Usuario, Usted ya tiene usuario. Presentarse ante la Direcci&oacute;n de Residuos Peligrosos.';
		}

		if(!count($errores)){
			$_SESSION['DATOS_EMPRESA'] = Array( 
												'CUIT'                    => $_POST['cuit'], 
												'ESTABLECIMIENTOS'        => Array(), 
												'REPRESENTANTES_LEGALES'  => Array(), 
												'REPRESENTANTES_TECNICOS' => Array(),
												'PERMITIR_MODIFICACION'   => true
											  );

			$retorno['siguiente'] = '/operacion/operador/alta_temprana/paso_2.php';

			$_SESSION['PASOS_CORRECTOS'][1] = 1;
		}

		$retorno['estado']    = (!count($errores)) ? 0 : 1;
		$retorno['errores']   = $errores;

		echo json_encode($retorno);
	}else{
		$_SESSION['ALTA_FINALIZADA'] = false;
		$_SESSION['PASOS_CORRECTOS'] = Array();

		$smarty->assign('CUIT', $_SESSION['DATOS_EMPRESA']['CUIT']);
		$smarty->display('operacion/operador/alta_temprana/paso_1.tpl');
	}

	session_write_close();
?>
