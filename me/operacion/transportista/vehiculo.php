<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

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
		$campos = False;

		if($_POST['accion'] == 'alta'){
			$campos = array(
				'id' => array('nombre' => 'Id de vehiculo', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		}else if($_POST['accion'] == 'baja'){
			$campos = array(
				'id' => array('nombre' => 'Id de vehiculo', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			);
		}

		if($post_valido && $campos !== False){
			$validaciones = filter_input_array(INPUT_POST, $campos);
	
			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0 or $resultado == 'null'){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}
		#validaciones
		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				if(empty($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'])){
					$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = array();
				}else{
					foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $indice => $vehiculo){
						if($vehiculo['ID'] == $_POST['id']){
							$errores['alta'] = 'el vehiculo indicado ya se encuentra presente en la lista de vehiculos';
							break;
						}
					}
				}

				if(!count($errores)){
					$informacion = obtener_informacion_por_vehiculo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['id']);

					if(!$informacion){
						$errores['alta'] = 'no se encontraron vehiculos que coincidieran con el especificado';
					}else{
						$vehiculo = array(
							'ID'                => $informacion['ID'],
							'DOMINIO'           => $informacion['DOMINIO'],
							'TIPO_VEHICULO'     => $informacion['TIPO_VEHICULO'],
							'TIPO_CAJA'         => is_null($informacion['TIPO_CAJA']) ? '' : $informacion['TIPO_CAJA'],
							'DESCRIPCION'       => $informacion['DESCRIPCION']
						);

						$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'][] = $vehiculo;

						$retorno['datos'] = $vehiculo;
					}
				}
			}
			else if($_POST['accion'] == 'busqueda')
			{
				$permisos_manifiesto = array();
				$excluir_barcazas = false;

				$transportista_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

				// obtenemos los residuos que van a ser usados en el manifiesto para saber buscar vehiculos que los transporten
				foreach ($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $res) {
					$permisos_manifiesto[] = $res['RESIDUO'];
				}

				if (isset($_POST['excluir_barcazas'])) {
					$excluir_barcazas = true;
				}

				$vehiculos = Vehiculo::getVehiculosConPermisos($transportista_id, $permisos_manifiesto, $excluir_barcazas);

				if(!$vehiculos){
					$errores['busqueda'] = 'No se encontraron vehiculos que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $vehiculos;

			}
			else if($_POST['accion'] == 'busqueda_unica')
			{
				$vehiculos = obtener_informacion_por_vehiculo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['id']);

				if(!$vehiculos){
					$errores['busqueda'] = 'No se encontraron vehiculos que coincidieran con el criterio de busqueda';
				}

				$retorno['datos']   = $vehiculos;
			}else if($_POST['accion'] == 'baja') {

				$estado = 1;
				foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $indice => $vehiculo) {
					if($vehiculo['ID'] == $_POST['id']){
						$estado = 0;
						unset($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'][$indice]);
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el vehiculo no pudo ser localizado';
				}
				if (empty($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'])){
					$retorno['vacio'] = "vacio";
				}
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$smarty->display('operacion/transportista/vehiculo.tpl');
	}

	session_write_close();
?>
