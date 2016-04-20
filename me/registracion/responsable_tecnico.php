<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty    = inicializar_smarty();
	$errores   = Array();
	$tipos_doc = obtener_tipos_documento();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno       = array();
		$errores       = array();
		$representante = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;
	
		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'nombre'            => array('nombre' => 'Nombre',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'apellido'          => array('nombre' => 'Apellido',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'fecha_nacimiento'  => array('nombre' => 'Fecha de nacimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
				'tipo_doc'          => array('nombre' => 'Tipo de documento',   'filter' => FILTER_VALIDATE_INT),
				'nro_doc'           => array('nombre' => 'Numero de documento', 'filter' => FILTER_VALIDATE_INT),
				'cargo'             => array('nombre' => 'Cargo',               'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cuit'              => array('nombre' => 'Cuit',                'filter' => FILTER_VALIDATE_INT)
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

		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				if(empty($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'])){
					$_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] = array();
				}

				$ultimo_id = 0;

				foreach($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] as $representante){
					if($representante['ID'] > $ultimo_id)
						$ultimo_id = $representante['ID'];
				}

				$ultimo_id++;

				$representante = array(
							'ID'               => $ultimo_id,
							'NOMBRE'           => $_POST['nombre'],
							'APELLIDO'         => $_POST['apellido'],
							'FECHA_NACIMIENTO' => $_POST['fecha_nacimiento'],
							'TIPO_DOCUMENTO'   => $_POST['tipo_doc'],
							'NUMERO_DOCUMENTO' => $_POST['nro_doc'],
							'CARGO'            => $_POST['cargo'],
							'CUIT'             => $_POST['cuit']
							);

				$representante['TIPO_DOCUMENTO_']  = obtener_tipo_documento($representante['TIPO_DOCUMENTO']);

				$_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'][] = $representante;
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;
				foreach($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] as $indice => $representante){
					if($representante['ID'] == $_POST['id']){
						unset($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'][$indice]);
						$estado = 0;
						break;
					}
				}

				if($estado){
					$errores['borrado'] = 'el representante no pudo ser localizado';
				}
			}else{
				foreach($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] as &$representante){
					if($representante['ID'] == $_POST['id']){
						$representante['NOMBRE']           = $_POST['nombre'];
						$representante['APELLIDO']         = $_POST['apellido'];
						$representante['FECHA_NACIMIENTO'] = $_POST['fecha_nacimiento'];
						$representante['TIPO_DOCUMENTO']   = $_POST['tipo_doc'];
						$representante['NUMERO_DOCUMENTO'] = $_POST['nro_doc'];
						$representante['CARGO']            = $_POST['cargo'];
						$representante['CUIT']             = $_POST['cuit'];

						$representante['TIPO_DOCUMENTO_']  = obtener_tipo_documento($representante['TIPO_DOCUMENTO']);

						break;
					}
				}
			}
		}

		$retorno['datos']   = $representante;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

	        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(!empty($_GET['id'])){
			$smarty->assign('ACCION', 'modificacion');

			foreach($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] as &$representante){
				if($representante['ID'] == $_GET['id']){
					$smarty->assign('REPRESENTANTE', $representante);
					break;
				}
			}

		}else{
			$smarty->assign('ACCION', 'alta');
		}

		$smarty->assign('TIPOS_DOCUMENTO', $tipos_doc);

		$smarty->display('registracion/responsable_tecnico.tpl');
	}

	session_write_close();
?>
