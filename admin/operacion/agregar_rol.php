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

		#validaciones
		$campos = array(
			'descripcion'       => array('nombre' => 'Descripcion', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
		#validaciones

		if(count($errores) == 0){
			$conexion = Rol::connection();

			$conexion->transaction();

			try{
				$rol = Rol::create(Array(
											'descripcion' => $_POST['descripcion'], 
											'flag'        => 't'
									));

				$rol->save();

				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
				$errores['general'] = $e->getMessage();
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$smarty->assign('USUARIO', $_SESSION['INFORMACION_USUARIO']);

		$smarty->display('drp/operacion/agregar_rol.tpl');
	}

	session_write_close();
?>
