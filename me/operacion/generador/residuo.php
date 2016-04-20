<?
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$retorno = $errores = $vehiculo = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;

		#validaciones
		$campos = False;

		if($_POST['accion'] != 'baja'){
			$campos = array(
				'contenedor'            => array('nombre' => 'Tipo de contenedor',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad_contenedores' => array('nombre' => 'Cantidad de contenedores',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9\.]+)$/')),
				'residuo'               => array('nombre' => 'Codigo de residuo',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad_estimada'     => array('nombre' => 'Cantidad estimada',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9,\.]+)$/')),
				'estado'                => array('nombre' => 'Estado',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
			);
		}

		// checkeos base genericos
		if ($post_valido && $campos !== False) {
			$validaciones = filter_input_array(INPUT_POST, $campos);

			foreach($validaciones as $campo => $resultado){
				if(strlen($resultado) == 0 or $resultado == 'null'){
					$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
					$post_valido = false;
				}
			}
		}

		if ( ! count($errores)) 
		{
			if ($_POST['accion'] == 'alta') {
				$ultimo_id = 0;

				foreach ($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $residuo) {
					if($residuo['ID'] > $ultimo_id)
						$ultimo_id = $residuo['ID'];
				}

				$ultimo_id++;

				$residuo = array(
					'ID'                    => $ultimo_id,
					'GENERADOR'             => $_SESSION['DATOS_MANIFIESTO']['GENERADORES'][0]['ID'],
					'CONTENEDOR'            => $_POST['contenedor'],
					'CANTIDAD_CONTENEDORES' => $_POST['cantidad_contenedores'],
					'RESIDUO'               => $_POST['residuo'],
					'PELIGROSIDAD'          => $_POST['peligrosidad'],
					'CANTIDAD_ESTIMADA'     => $_POST['cantidad_estimada'],
					'ESTADO'                => $_POST['estado'],
				);

				$residuos_del_manifiesto = obtener_residuos_manifiesto_actual_as_array();
				$ya_existe = in_array($_POST['residuo'], $residuos_del_manifiesto);

				if ( ! $ya_existe) {

					$residuo['CONTENEDOR_'] = obtener_contenedor($residuo['CONTENEDOR']);
					$residuo['RESIDUO_']    = obtener_categoria_residuo($residuo['RESIDUO']);
					$residuo['ESTADO_']     = obtener_estado($residuo['ESTADO']);

					// multiple solo trabaja con un residuo asi que limpio el que tenia antes de agregar el nuevo elegido.
					if ($_POST['tipo_manifiesto'] == TipoManifiesto::MULTIPLE) {
						$_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] = array();
					}

					$_SESSION['DATOS_MANIFIESTO']['RESIDUOS'][] = $residuo;
					$retorno['datos'] = $residuo;
				} else {
					$errores['duplicado'] = "El residuo ya fue agregado al manifiesto";
				}

			} else if ($_POST['accion'] == 'baja') {
				$estado = 1;
				foreach($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $indice => $residuo){
					if($residuo['ID'] == $_POST['id']){
						$estado = 0;
						unset($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'][$indice]);
						break;
					}
				}

				if($estado){
					$errores['baja'] = 'el residuo no pudo ser localizado';
				}
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
        
	} else if($_SERVER['REQUEST_METHOD'] == 'GET') {

		$tipo_manifiesto = $_GET['tipo_manifiesto'];
		$residuos = $residuos_generador = $residuos_transportista = $residuos_operador = $residuos_final = array();
		//var_dump($tipo_manifiesto);

		// residuos generador/es. No aplica para los MANIFIESTO_SIMPLE_RES_544_94
		foreach ($_SESSION['DATOS_MANIFIESTO']['GENERADORES'] as $generador) {
			$modelo = Establecimiento::find($generador['ID']);
			$residuos = obtener_permisos_por_establecimiento($generador['ID']);
			foreach ($residuos as $res) {
				$residuos_generador[$res['RESIDUO']] = $res;
				$residuos[$res['RESIDUO']] = $res;
			}
		}

		// residuos transportista
		foreach ($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] as $transportista) {
			$residuos = obtener_permisos_por_establecimiento($transportista['ID']);
			foreach ($residuos as $res) {
				$residuos_transportista[$res['RESIDUO']] = $res;
				$residuos[$res['RESIDUO']] = $res;
			}
		}

		// residuos operador. No aplica para los MANIFIESTO_SIMPLE_CONCENTRADOR. El generador actua como tal.
		if ($tipo_manifiesto != TipoManifiesto::SIMPLE_CONCENTRADOR)
		{
			foreach ($_SESSION['DATOS_MANIFIESTO']['OPERADORES'] as $operador) {
				$residuos = obtener_permisos_por_establecimiento($operador['ID']);
				foreach ($residuos as $res) {
					$residuos_operador[$res['RESIDUO']] = $res;
					$residuos[$res['RESIDUO']] = $res;
				}
			}
		}

		if ($tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {
			// intersect solo entre generador y transportista
			$Ys_en_comun = array_intersect(array_keys($residuos_generador), array_keys($residuos_transportista));
		} else {
			$Ys_en_comun = array_intersect(array_keys($residuos_generador), array_keys($residuos_transportista), array_keys($residuos_operador));
		}

		// var_dump(array('generador' => array_keys($residuos_generador)), array('transportista' => array_keys($residuos_transportista)), array('operador', array_keys($residuos_operador)));
		// var_dump($Ys_en_comun);
		foreach ($Ys_en_comun as $y) {
			$residuos_final[] = array(
				'CODIGO'      => $residuos[$y]['RESIDUO'],
				'DESCRIPCION' => utf8_decode($residuos[$y]['RESIDUO_'])
			);
		}

		// var_dump($residuos_final);die;
		$smarty->assign('ACCION', 'alta');
		$smarty->assign('RESIDUOS', $residuos_final);
		$smarty->assign('ESTADOS', obtener_estados());
		$smarty->assign('CONTENEDORES', obtener_contenedores());
		$smarty->assign('TIPO_MANIFIESTO', $tipo_manifiesto);
		$smarty->assign('PELIGROSIDAD', listadoDePeligrosidad());
		$smarty->display('operacion/generador/residuo.tpl');
	}

	session_write_close();
?>
