<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

  if(@strval($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) == ''){
    header('location: /');
    exit;
  }

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();

		if(!count($errores)){
			$conexion = Mensaje::connection();

			$conexion->transaction();

			try{
				$mensaje = Mensaje::find('first', array('conditions' => array('id_establecimiento = ? and id = ?', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['id'])));

				if(!$mensaje){
					throw Exception('');
				}

				$mensaje->estado = 'b';
				$mensaje->save();

				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
				$errores['general'] = 'Ocurrio un error al eliminar el mensaje, por favor intente mas tarde.';
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}

	session_write_close();
?>
