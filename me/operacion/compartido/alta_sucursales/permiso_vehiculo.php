<?
/*
	require_once("../librerias/smarty/Smarty.class.php");
	require_once("../configuracion/configuracion.php");
	require_once("../librerias/local.inc.php");
*/
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$categorias = obtener_categorias_residuos();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno = array();
		$errores = array();
		$permiso = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;

		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'vehiculo'        => array('nombre' => 'Identificador de vehiculo',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
//				'establecimiento' => array('nombre' => 'Identificador de establecimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'residuo'         => array('nombre' => 'Codigo de residuo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad'        => array('nombre' => 'Cantidad',                         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'estado'          => array('nombre' => 'Estado',                           'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'fecha_inicio'    => array('nombre' => 'Fecha de inicio',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
				'fecha_fin'       => array('nombre' => 'Fecha de fin',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
			);

			if($post_valido){
				$validaciones = filter_input_array(INPUT_POST, $campos);

				foreach($validaciones as $campo => $resultado){
					if(strlen($resultado) == 0 or $resultado == 'null'){
						$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
						$post_valido = false;
					}
				}
			}
		}
		#validaciones

		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['VEHICULOS'] as &$vehiculo){
					if($vehiculo['ID'] == $_POST['vehiculo'])
						break;
				}

				if(empty($vehiculo['PERMISOS'])){
					$vehiculo['PERMISOS'] = array();
				}

				$ultimo_id = 0;

				foreach($vehiculo['PERMISOS'] as $permiso){
					if($permiso['ID'] > $ultimo_id)
						$ultimo_id = $permiso['ID'];
				}

				$ultimo_id++;

				$permiso = array(
							'ID'                 => $ultimo_id,
							'RESIDUO'            => $_POST['residuo'],
							'CANTIDAD'           => $_POST['cantidad'],
							'ESTADO'             => $_POST['estado'],
							'FECHA_INICIO'       => $_POST['fecha_inicio'],
							'FECHA_FIN'          => $_POST['fecha_fin']
							);

				$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
				$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);

				$vehiculo['PERMISOS'][] = $permiso;
			}else if($_POST['accion'] == 'baja'){
				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['VEHICULOS'] as &$vehiculo){
					if($vehiculo['ID'] == $_POST['vehiculo'])
						break;
				}

				$estado = 1;
				foreach($vehiculo['PERMISOS'] as $indice => $permiso){
					if($permiso['ID'] == $_POST['id']){
						unset($vehiculo['PERMISOS'][$indice]);
						$estado = 0;
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el permiso no pudo ser localizado';
				}
			}else{
				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['VEHICULOS'] as &$vehiculo){
					if($vehiculo['ID'] == $_POST['vehiculo'])
						break;
				}

				foreach($vehiculo['PERMISOS'] as &$permiso){
					if($permiso['ID'] == $_POST['id']){
						$permiso['RESIDUO']          = $_POST['residuo'];
						$permiso['CANTIDAD']         = $_POST['cantidad'];
						$permiso['ESTADO']           = $_POST['estado'];
						$permiso['FECHA_INICIO']     = $_POST['fecha_inicio'];
						$permiso['FECHA_FIN']        = $_POST['fecha_fin'];

						$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
						$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);

						break;
					}
				}
			}
		}

		$retorno['datos']   = $permiso;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(!empty($_GET['id']) && !empty($_GET['vehiculo'])){
			$smarty->assign('ACCION', 'modificacion');

			foreach($_SESSION['DATOS_ESTABLECIMIENTO']['VEHICULOS'] as &$vehiculo){
				if($vehiculo['ID'] == $_GET['vehiculo'])
					break;
			}

			foreach($vehiculo['PERMISOS'] as &$permiso){
				if($permiso['ID'] == $_GET['id']){
					$smarty->assign('PERMISO', $permiso);
					break;
				}
			}
		}else{
			$smarty->assign('ACCION', 'alta');
		}

		foreach($categorias as $categoria_key => $categoria_datos){
			$encontrado = False;
			foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as $permiso){
				if($categoria_datos['CODIGO'] == $permiso['RESIDUO']){
					$encontrado = True;
					break;
				}
			}
			if(!$encontrado){
				unset($categorias[$categoria_key]);
			}
		}

		$smarty->assign('ESTABLECIMIENTO', $_GET['establecimiento']);
		$smarty->assign('VEHICULO',        $_GET['vehiculo']);
		$smarty->assign('RESIDUOS',        $categorias);

		$smarty->display('operacion/generador/alta_sucursales/permiso_vehiculo.tpl');
	}

	session_write_close();
?>
