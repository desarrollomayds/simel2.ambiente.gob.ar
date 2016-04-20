<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores = Array();
		}
/*
	$establecimiento = Establecimiento::connection();
	$usuario = Establecimiento::find('first', array('conditions' => array('usuario = ?', $_GET["establecimiento_id"])));

	$encrypt	= new sesion();
	$r = $encrypt->getHash("", $_POST["password"]);
	$usuario->salt 			= $r[0];
	$usuario->contrasenia 	= $r[1];//hash
	$usuario->reset_contrasenia	= "N";
	$usuario->save();
*/

		$conexion = Usuario::connection();
		$conexion->transaction();

		try{
			$usuario = Usuario::first(Array('conditions' => Array('id = ?', $_POST['id'])));
			$encrypt	= new sesion();
			$r = $encrypt->getHash("", $_POST["password"]);
			$usuario->salt = $r[0];
			$usuario->password = $r[1];//hash
			$usuario->save();
			$conexion->commit();
		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);

	session_write_close();
?>
