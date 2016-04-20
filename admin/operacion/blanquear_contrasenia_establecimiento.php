<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$establecimiento = Establecimiento::find('first', array('conditions' => array('id = ? and flag = ?', $_POST['id'], 't')));
	if($establecimiento){
		$conexion = Establecimiento::connection();

		$conexion->transaction();

		try{
			$establecimiento->contrasenia                 = $establecimiento->usuario;
			$establecimiento->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
			$establecimiento->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
			$establecimiento->save();

			$conexion->commit();
		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}

	}else{
		$errores['general'] = 'Identificador de establecimiento incorrecto, en caso de persistir el error contacte al administrador.';
	}

	$retorno['estado']    = (!count($errores)) ? 0 : 1;
	$retorno['errores']   = $errores;

	echo json_encode($retorno);

	session_write_close();
?>
