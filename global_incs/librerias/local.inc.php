<?
	ini_set('display_errors', 'On');
//	ini_set('error_reporting', E_ALL);
	ini_set('error_reporting', E_ALL ^ E_NOTICE);

	define('__ROOT__',dirname(dirname(__FILE__)));

	require_once(__ROOT__ . "/librerias/activerecord/activerecord.php");
	require_once(__ROOT__ . "/librerias/smarty/Smarty.class.php");
	require_once(__ROOT__ . "/configuracion/configuracion.php");
	require_once(__ROOT__ . "/librerias/mensajeria.inc.php");
	require_once(__ROOT__ . "/librerias/local_functions.inc.php");

	spl_autoload_register('spyc_autoload');
	spl_autoload_register('classes_autoload');
	spl_autoload_register('classes_email_autoload');

	set_error_handler('errorhandler');

	function spyc_autoload($class) {
		$file = __ROOT__ .'/librerias/spyc-master/' . $class . '.php';
		if(file_exists($file))
			include_once $file;
	}

	function classes_autoload($class) {
		$file = __ROOT__ .'/classes/' . $class . '.class.php';
		if(file_exists($file))
			include_once $file;
	}

	function classes_email_autoload($class) {
		$file = __ROOT__ .'/classes/mail_classes/' . $class . '.class.php';
		if(file_exists($file))
			include_once $file;
	}

	$params = Spyc::YAMLLoad(__ROOT__."/configuracion/parametros.yml");

	ActiveRecord\Config::initialize(function($cfg){
		$cfg->set_model_directory(ACTIVERECORD_DIR_MODELOS);
		$cfg->set_connections(array('development' => DATABASE_ENGINE . '://' . DATABASE_USER . ':' . DATABASE_PASS. '@' . DATABASE_HOST. '/' . DATABASE_NAME));
	});

	define('__SYSTEM__' , mel::getSystem());

	$sesion = new sesion();

	$sesion->validarMantenimientoSistema();

	if($sesion->validarPrivacidad()){
		$sesion->validaSesionActiva();
	}



	// utf8_decode a $_GET y $_POST
	decode_get_utf8();
	decode_post_utf8();
?>