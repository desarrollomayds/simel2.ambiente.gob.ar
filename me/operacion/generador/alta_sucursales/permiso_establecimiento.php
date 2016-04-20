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
//				'establecimiento' => array('nombre' => 'Identificador de establecimiento', 'filter' => FILTER_VALIDATE_INT),
				'permiso_residuo'         => array('nombre' => 'Codigo de residuo',                'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		
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

		// Si el establecimiento es generador
		if ($_GET['rol'] == 1)
		{
			$campos = array(
				'permiso_cantidad' => array('nombre' => 'Cantidad', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/'))
			);
		
			$validaciones = filter_input_array(INPUT_POST, $campos);

			foreach ($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}

		}

		// Recorremos los permisos del establecimiento actual en búsqueda de 'Y' duplicadas
		foreach ($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as $key => $value)
		{	

			//Detecta si existe el permiso actual en el establecimiento actual
			if ( $value['RESIDUO'] == $_POST['permiso_residuo'])
			{	
				// En caso de que se este editanto algun permiso, evitar que lo identifique como duplicado si no se está dando de alta
				if ( $value['ID'] != $_POST['id'])
				{
					// Devuelve error para que no se procese el formulario
					$errores['duplicado'] = 'Ya existe un permiso para el residuo <b>'.$_POST['permiso_residuo'].'</b> en el establecimiento actual.';
					$post_valido = false;
				}
			}
		}

		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				if(empty($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'])){
					$_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] = array();
				}

				$ultimo_id = 0;

				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as $permiso){
					if($permiso['ID'] > $ultimo_id)
						$ultimo_id = $permiso['ID'];
				}

				$ultimo_id++;

				$permiso = array(
							'ID'                 => $ultimo_id,
							'RESIDUO'            => $_POST['permiso_residuo'],
							'CANTIDAD'           => $_POST['permiso_cantidad']
							);

				$permiso['RESIDUO_'] = obtener_categoria_residuo($permiso['RESIDUO']);
				$permiso['ESTADO_']  = obtener_estado($permiso['ESTADO']);

				$_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'][] = $permiso;
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;
				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as $indice => $permiso){
					if($permiso['ID'] == $_POST['id']){
						unset($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'][$indice]);
						$estado = 0;
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el permiso no pudo ser localizado';
				}
			}else{
				foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as &$permiso){
					if($permiso['ID'] == $_POST['id']){
						$permiso['RESIDUO']          = $_POST['permiso_residuo'];
						$permiso['CANTIDAD']         = $_POST['permiso_cantidad'];


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
		if(!empty($_GET['id'])){
			$smarty->assign('ACCION', 'modificacion');

			foreach($_SESSION['DATOS_ESTABLECIMIENTO']['PERMISOS'] as &$permiso){
				if($permiso['ID'] == $_GET['id']){
					$smarty->assign('PERMISO', $permiso);
					break;
				}
			}
			
		}else{
			$smarty->assign('ACCION', 'alta');
		}

		$smarty->assign('RESIDUOS',          $categorias);

		$smarty->assign('ROL_ID', $_GET['rol']);

		$smarty->display('operacion/generador/alta_sucursales/permiso_establecimiento.tpl');
	}

	session_write_close();
?>
