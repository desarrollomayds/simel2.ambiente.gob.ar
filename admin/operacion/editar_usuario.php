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
				'id' => array('nombre' => 'Id', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'username'         => array('nombre' => 'Nombre de usuario',   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
#				'password'         => array('nombre' => 'Contrasenia',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'rol'              => array('nombre' => 'Rol',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'nombre'           => array('nombre' => 'Nombre',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'apellido'         => array('nombre' => 'Apellido',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'tipo_documento'   => array('nombre' => 'Tipo de documento',   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'numero_documento' => array('nombre' => 'Numero de documento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'fecha_nacimiento' => array('nombre' => 'Fecha de nacimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
				'sexo'             => array('nombre' => 'Sexo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([f,m])$/')),
			);

			$validaciones = filter_input_array(INPUT_POST, $campos);

			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}

/*		
			if($_POST['cambiar_password'] == '1' && strlen($_POST['password']) == 0){
					$errores["password"] = 'Error en la carga del campo Contrasenia.';
			}*/
		}
		#validaciones
		if(count($errores) == 0){
			if($_POST['accion'] == 'baja'){
				$conexion = Usuario::connection();

				$conexion->transaction();

				try{
					if($_POST['id'] == $_SESSION['INFORMACION_USUARIO']['ID']){
						throw new Exception("Es imposible eliminar el usuario actual.");
					}

					$usuario = Usuario::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					$usuario->flag = 'f';

					$usuario->save();

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}			
			}else{
				$conexion = Usuario::connection();

				$conexion->transaction();

				try{
					$usuario = Usuario::first(Array('conditions' => Array('id = ?', $_POST['id'])));

					if($_POST['cambiar_password'] == '1')
						$usuario->password = $_POST['password'];

					$usuario->nombre           = $_POST['nombre'];
					$usuario->apellido         = $_POST['apellido'];
					$usuario->codigo_rol       = $_POST['rol'];
					$usuario->tipo_documento   = $_POST['tipo_documento'];
					$usuario->nro_documento    = $_POST['numero_documento'];
					$usuario->fecha_nacimiento = convertir_fecha_es_en($_POST['fecha_nacimiento']);
					$usuario->sexo             = $_POST['sexo'];
					
					#$usuario->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
					#$usuario->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

					$usuario->save();

					$conexion->commit();
				} catch (\Exception $e) {
					$conexion->rollback();
					$errores['general'] = $e->getMessage();
				}
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$informacion = obtener_informacion_usuario_drp($_GET['id']);
		$tipos_doc   = obtener_tipos_documento();
		$roles       = obtener_roles('%', 0);

		$smarty->assign('TIPOS_DOCUMENTO', $tipos_doc);
		$smarty->assign('USUARIO',         $informacion);
		$smarty->assign('ROLES',           $roles);
		$smarty->display('drp/operacion/editar_usuario.tpl');
	}

	session_write_close();
?>
