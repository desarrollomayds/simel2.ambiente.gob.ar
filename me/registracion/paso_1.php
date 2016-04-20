<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/recaptcha_autoload.php");

session_start();

forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

$smarty  = inicializar_smarty();

$session = new sesion();

// Esta activado el captcha?
$captcha = (Boolean) $session->getParameters("framework::seguridad::recaptcha_activo");

if ($captcha)
{	
	// ReCaptcha Private Key
	$rc_privada = $session->getParameters("framework::seguridad::key::recaptcha_key_privada");
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$retorno  = array();
	$errores  = array();

	$campos = array(
		'cuit'    => array('nombre' => 'Cuit',    'filter' => FILTER_CALLBACK, 'options' => 'validar_cuit_tabla')
	);

	$validaciones = filter_input_array(INPUT_POST, $campos);

	foreach ($validaciones as $campo => $resultado) {
		if ( ! $resultado) {
			$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
		}
	}

	if($captcha)
	{	
		if (isset($_POST['captcha']) && !empty($_POST['captcha']))
		{
			$recaptcha = new \ReCaptcha\ReCaptcha($rc_privada);
			$resp = $recaptcha->verify($_POST['captcha'], $_SERVER['REMOTE_ADDR']);	
		}
		else
		{
			$errores['captcha'] = 'Error en la carga del C&oacute;digo de Seguridad.';
			$post_valido = false;
		}
	}


	if (validar_registracion_pendiente($_POST['cuit']) === true) {
		$errores['cuit'] = 'Sr Usuario, Usted ya tiene un tr&aacute;mite pendiente. Espere a que el mismo finalice para ingresar una nueva petici&oacute;n de alta.';
	}

	if (validar_registracion_activa($_POST['cuit']) === true) {
		$errores['cuit'] = 'Sr Usuario, Usted ya tiene usuario. Presentarse ante la Direcci&oacute;n de Residuos Peligrosos.';
	}

	if ( ! count($errores)) {
		$_SESSION['DATOS_EMPRESA'] = array(
			'CUIT'                    => $_POST['cuit'],
			'ESTABLECIMIENTOS'        => array(),
			'REPRESENTANTES_LEGALES'  => array(),
			'REPRESENTANTES_TECNICOS' => array(),
			'PERMITIR_MODIFICACION'   => true
		);

		$retorno['siguiente'] = $_SESSION['siguiente_paso'] = 'paso_2.php';

		$_SESSION['PASOS_CORRECTOS'][1] = 1;
	}

	$retorno['estado']    = (!count($errores)) ? 0 : 1;
	$retorno['errores']   = $errores;

	echo json_encode($retorno);
}else{
	$_SESSION['ALTA_FINALIZADA'] = false;
	$_SESSION['PASOS_CORRECTOS'] = array();

	$smarty->assign('CUIT', $_SESSION['DATOS_EMPRESA']['CUIT']);
	$smarty->assign('CAPTCHA_KEY', $session->getParameters("framework::seguridad::key::recaptcha_key_publica"));
	$smarty->display('registracion/paso_1.tpl');
}

session_write_close();
?>
