<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();

if ( ! isset($_SESSION['INFORMACION_USUARIO']['ID'])) {
	throw new Exception("No fue posible acceder a Mi Cuenta. Contacte al administrador.");
};

$smarty  = inicializar_smarty();
$errores = array();
$post_and_saved = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST['volver_button'])) {
		header('location: ../operacion');
	}

	$errores = validar_fields();

	#validaciones
	if ( ! $errores)
	{
		$conexion = Usuario::connection();
		$conexion->transaction();

		try
		{
			$usuario = Usuario::find('first', array('conditions' => Array('id = ?', $_SESSION['INFORMACION_USUARIO']['ID'])));
			$usuario->nombre = $_POST['nombre'];
			$usuario->apellido = $_POST['apellido'];
			$usuario->tipo_documento = $_POST['tipo_documento'];
			$usuario->nro_documento = $_POST['nro_documento'];
			$usuario->fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $_POST['fecha_nacimiento']);
			$usuario->sexo = $_POST['sexo'];
			$usuario->updated = new Datetime();

			if (isset($_POST['restablecer_password'])) {
				$encrypt = new sesion();
				$r = $encrypt->getHash("", $_POST['new_password_1']);
				$usuario->salt = $r[0];
				$usuario->password = $r[1];
			}

			$usuario->save();
			$conexion->commit();

			// update de session
			$user_info = $_SESSION['INFORMACION_USUARIO'] = obtener_informacion_usuario_drp($usuario->id);
			$post_and_saved = true;
		}
		catch (\Exception $e)
		{
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}
	}
	else
	{
		// pisamos la info con post para mostrar los errores.
		$user_info = merge_user_info_with_post();
	}
}
else
{
	$user_info = obtener_informacion_usuario_drp($_SESSION['INFORMACION_USUARIO']['ID']);
}

$smarty->assign('USER', $user_info);
$smarty->assign('TIPOS_DOCUMENTO', obtener_tipos_documento());
$rol = obtener_informacion_rol_drp($user_info['ROL']);
$smarty->assign('DESCRIPCION_ROL', $rol['DESCRIPCION']);
$smarty->assign('ERRORES', count($errores));
$smarty->assign('POST_AND_SAVED', $post_and_saved);
$smarty->assign('JSON_ERRORS', json_encode($errores));
$smarty->display('drp/operacion/mi_cuenta.tpl');

session_write_close();

function validar_fields()
{
	$errores = array();

	$campos = array(
		'nombre'           => array('nombre' => 'Nombre',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		'apellido'         => array('nombre' => 'Apellido',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		'tipo_documento'   => array('nombre' => 'Tipo de documento',   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
		'nro_documento'    => array('nombre' => 'Numero de documento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
		'fecha_nacimiento' => array('nombre' => 'Fecha de nacimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
		'sexo'             => array('nombre' => 'Sexo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([f,m])$/')),
	);

	$validaciones = filter_input_array(INPUT_POST, $campos);

	foreach ($validaciones as $campo => $resultado) {
		if(strlen($resultado) == 0){
			$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
			$post_valido = false;
		}
	}

	// validacion cambio de password
	if (isset($_POST['restablecer_password'])) {
		// password match
		if ($_POST['new_password_1'] != $_POST['new_password_2'])
		{
			$errores['new_password_1'] = $errores['new_password_2'] = 'Las contrase&ntilde;as no coinciden.';
		}
		else
		{
			$config = new config;
			$pass_regex = $config->getParameters("framework::seguridad::password_regex");

		    if ( ! preg_match_all($pass_regex,$_POST['new_password_1'], $matches)) {
		        $errores['new_password_1'] = $errores['new_password_2'] = 'La contrase&ntilde;a debe ser alfanum&eacute;rica con al menos una mayuscula y un m&iacute;nimo de 8 caracteres.';
		    }
		}
		
	}

	return $errores;
}

function merge_user_info_with_post()
{
	$user_info = obtener_informacion_usuario_drp($_SESSION['INFORMACION_USUARIO']['ID']);

	foreach ($_POST as $key => $value) {
		$upper_post[strtoupper($key)] = $value;
	}

	return array_merge($user_info, $upper_post);
}

?>
