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
			'username'         => array('nombre' => 'Nombre de usuario',   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'password'         => array('nombre' => 'Contrasenia',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
		#validaciones


		if(count($errores) == 0){
			$conexion = Usuario::connection();

			$conexion->transaction();

			try{
				$usuario = Usuario::create(Array(
													'login'            => $_POST['username'],
													'password'         => $_POST['password'],
													'nombre'           => $_POST['nombre'],
													'apellido'         => $_POST['apellido'],
													'codigo_rol'       => $_POST['rol'],
													'tipo_documento'   => $_POST['tipo_documento'],
													'nro_documento'    => $_POST['numero_documento'],
													'fecha_nacimiento' => convertir_fecha_es_en($_POST['fecha_nacimiento']),
													'sexo'             => $_POST['sexo'],
													'flag'             => 't'
												));


				$usuario->save();

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
		$tipos_doc   = obtener_tipos_documento();
		$roles       = obtener_roles('%', 0);

		$smarty->assign('USUARIO',         $_SESSION['INFORMACION_USUARIO']);
		$smarty->assign('TIPOS_DOCUMENTO', $tipos_doc);
		$smarty->assign('ROLES',           $roles);
		$smarty->display('drp/operacion/agregar_usuario.tpl');
	}

	session_write_close();
?>
