<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$categorias = obtener_categorias_residuos();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$vehiculo = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;
	
		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'establecimiento'   => array('nombre' => 'Identificador de establecimiento', 'filter' => FILTER_VALIDATE_INT),
				'dominio'           => array('nombre' => 'Dominio',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'tipo_vehiculo'     => array('nombre' => 'Tipo Vehiculo',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'descripcion'       => array('nombre' => 'Descripcion',                      'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
					if($establecimiento['ID'] == $_POST['establecimiento'])
						break;
				}

				if(empty($establecimiento['VEHICULOS'])){
					$establecimiento['VEHICULOS'] = array();
				}

				$ultimo_id = 0;

				foreach($establecimiento['VEHICULOS'] as $vehiculo){
					if($vehiculo['ID'] > $ultimo_id)
						$ultimo_id = $vehiculo['ID'];
				}

				$ultimo_id++;

				$vehiculo = array(
					'ID'                => $ultimo_id,
					'DOMINIO'           => $_POST['dominio'],
					'DESCRIPCION'       => $_POST['descripcion'],
					'TIPO_VEHICULO'     => $_POST['tipo_vehiculo'],
					'TIPO_CAJA'         => $_POST['tipo_caja'],  
					'PERMISOS'          => Array()
				);

				$establecimiento['VEHICULOS'][] = $vehiculo;
			}else if($_POST['accion'] == 'baja'){
				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
					if($establecimiento['ID'] == $_POST['establecimiento'])
						break;
				}

				$estado = 1;
				foreach($establecimiento['VEHICULOS'] as $indice => $vehiculo){
					if($vehiculo['ID'] == $_POST['id']){
						unset($establecimiento['VEHICULOS'][$indice]);
						$estado = 0;
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el vehiculo no pudo ser localizado';
				}
			}else{
				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
					if($establecimiento['ID'] == $_POST['establecimiento'])
						break;
				}

				foreach($establecimiento['VEHICULOS'] as &$vehiculo){
					if($vehiculo['ID'] == $_POST['id']){
						$vehiculo['DOMINIO']           = $_POST['dominio'];
						$vehiculo['DESCRIPCION']       = $_POST['descripcion'];
						$vehiculo['TIPO_VEHICULO']     = $_POST['tipo_vehiculo'];
						$vehiculo['TIPO_CAJA']        = $_POST['tipo_caja'];
						break;
					}
				}
			}
		}


		$retorno['datos']   = $vehiculo;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){

		if(!empty($_GET['id']) && !empty($_GET['establecimiento'])){
			$smarty->assign('ACCION', 'modificacion');

			foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
				if($establecimiento['ID'] == $_GET['establecimiento'])
					break;
			}

			foreach($establecimiento['VEHICULOS'] as &$vehiculo){
				if($vehiculo['ID'] == $_GET['id']){
					$smarty->assign('VEHICULO', $vehiculo);
					break;
				}
			}
		}else{
			$smarty->assign('ACCION', 'alta');
		}

		//	var_dump($vehiculo);die;

		$smarty->assign('ESTABLECIMIENTO', $_GET['establecimiento']);
		$smarty->assign('TIPOS_VEHICULO', TipoVehiculo::all());
		$smarty->assign('TIPOS_CAJA', TipoCaja::all());
		$smarty->display('registracion/vehiculo.tpl');
	}

	session_write_close();
?>
