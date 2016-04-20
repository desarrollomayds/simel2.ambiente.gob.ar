<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

$smarty  = inicializar_smarty();
$errores = false;

$post_valido = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_valido = true;

	$establecimiento = Establecimiento::connection();
	$usuario = Establecimiento::find('first', array('conditions' => array('usuario = ?', $_POST["usuario"])));

	if (!$usuario) {
		$errores['LOGIN'] = 'Usuario o contrase&ntilde;a incorrectas';
		$post_valido = false;
	} else {
		//con el salt de la base y el pass ingresado, lo comparo con el hash del password
		$sesion	= new sesion();
		$r = $sesion->getHash($usuario->salt, $_POST["contrasenia"]);

		if ($usuario->contrasenia === $r[1]) {
			$informacion = obtener_informacion_por_usuario($_POST['usuario'], $usuario->contrasenia);
		} else {
			$errores['LOGIN'] = 'Usuario o contrase&ntilde;a incorrectas';
			$post_valido = false;
		}
	}
}

if ($post_valido)
{
	$_SESSION['INFORMACION_GENERAL'] = $informacion;
	sesion::resetSessionTime();

	switch ($informacion['ESTABLECIMIENTO']['FLAG'])
	{
		case 'p':
			header('location: '. mel::getBaseMelPath().'/usuario_pendiente_aprobacion.php');
			break;
		case 'r':
			header('location: '. mel::getBaseMelPath().'/usuario_rechazado.php');
			break;
		case 't':
			$establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
			if ($establecimiento->es_alta_temprana() && ! $establecimiento->alta_temprana_habilitada()) {
				header('location: '. mel::getBaseMelPath().'/alta_temprana_pendiente_aprobacion.php');
			} else {
				redirigir_a_seccion($informacion['ESTABLECIMIENTO']['TIPO'], 0, false); // redirect al index de su rol.
			}
			break;
	}
}
else
{
	$smarty->assign('ERRORES', $errores);
	$smarty->display('login/login_usuario.tpl');
}

session_write_close();
?>
