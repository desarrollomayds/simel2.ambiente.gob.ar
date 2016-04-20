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
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'codigo' => array('nombre' => 'Codigo', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
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
		}
		#validaciones


		if(count($errores) == 0){
			if($_POST['accion'] == 'baja'){
				$conexion = Rol::connection();

				$conexion->transaction();

				try{
					if($_POST['codigo'] == $_SESSION['INFORMACION_USUARIO']['ROL']){
						throw new Exception("Es imposible eliminar el rol del usuario actual.");
					}

					$rol = Rol::first(Array('conditions' => Array('codigo = ?', $_POST['codigo'])));

					$rol->flag = 'f';

					$rol->save();

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}			
			}else{
				/*
				$conexion = RepresentanteTecnico::connection();

				$conexion->transaction();

				try{
					$representante = RepresentanteTecnico::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					$representante->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
					$representante->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

					$representante->save();

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
				*/
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$informacion = obtener_informacion_rol_drp($_GET['codigo']);

		$smarty->assign('ROL',   $informacion);
		$smarty->display('drp/operacion/editar_rol.tpl');
	}

	session_write_close();
?>
