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

		if($_POST['accion'] != 'baja') {
			$campos = array(
				'contenedor'            => array('nombre' => 'Tipo de contenedor',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad_contenedores' => array('nombre' => 'Cantidad de contenedores',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'residuo'               => array('nombre' => 'Codigo de residuo',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'cantidad_estimada'     => array('nombre' => 'Cantidad estimada',         'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
				'estado'                => array('nombre' => 'Estado',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
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
				$ultimo_id = 0;

				foreach($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $residuo){
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

				$residuo['CONTENEDOR_'] = obtener_contenedor($residuo['CONTENEDOR']);
				$residuo['RESIDUO_']    = obtener_categoria_residuo($residuo['RESIDUO']);
				$residuo['ESTADO_']     = obtener_estado($residuo['ESTADO']);

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
					// cualquier alta de residuo nos obliga a limpiar el array de vehiculos
					$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = array();
					$retorno['datos'] = $residuo;
				} else {
					$errores['duplicado'] = "El residuo ya fue agregado al manifiesto";
				}

			}else if($_POST['accion'] == 'permisos'){
				$permisos_r  = Array();
				$vehiculos   = buscar_vehiculos_por_criterio($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], '%');
				$permisos_g  = obtener_permisos_por_establecimiento($_POST['generador']);

				foreach($permisos_g as $permiso){
					$permisos_r[] = $permiso;
				}

				foreach($vehiculos as $vehiculo){
					$permisos_v = obtener_permisos_por_vehiculo($vehiculo['ID']);
					
					foreach($permisos_v as $permiso){
						$encontrado = 0;
						foreach($permisos_r as $permiso_){
							if($permiso['RESIDUO'] == $permiso_['RESIDUO']){
								$encontrado = 1;
								break;
							}
						}

						if(!$encontrado)
							$permisos_r[] = $permiso;
					}
				}

				$retorno['datos'] = $permisos_r;
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;
				foreach($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $indice => $residuo){
					if($residuo['ID'] == $_POST['id']){
						$estado = 0;
						unset($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'][$indice]);
						break;
					}
				}

				// quitar un residuo implica volver a cargar vehiculos
				$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = array();

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
		$generador_por_alta_temprana = false;
		//var_dump($tipo_manifiesto);

		// residuos generador/es. No aplica para los MANIFIESTO_SIMPLE_RES_544_94
		if ($tipo_manifiesto != TipoManifiesto::SIMPLE_RES_544_94) {
			foreach ($_SESSION['DATOS_MANIFIESTO']['GENERADORES'] as $generador) {
				// si el generador fue dado de alta temprana no tendrá permisos hasta grabado el manifiesto, lo dejamos pasar
				$modelo = Establecimiento::find($generador['ID']);
				if ( ! $modelo->es_alta_temprana()) {
					$residuos_establecimiento = obtener_permisos_por_establecimiento($generador['ID']);

					foreach ($residuos_establecimiento as $res) {
						$residuos_generador[$res['RESIDUO']] = $res;
						$residuos[$res['RESIDUO']] = $res;
					}

				} else {
					$generador_por_alta_temprana = true;
				}
			}
		}
		
		If (! $generador_por_alta_temprana)
		foreach ($_SESSION['DATOS_MANIFIESTO']['GENERADORES'] as $generador) {
			$residuos_establecimiento = obtener_permisos_por_establecimiento($generador['ID']);
			foreach ($residuos_establecimiento as $res) {
				$residuos_generador[$res['RESIDUO']] = $res;
				$residuos[$res['RESIDUO']] = $res;
			}
		}
		// residuos transportista
		foreach ($_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'] as $transportista) {
			$residuos_establecimiento = obtener_permisos_por_establecimiento($transportista['ID']);
			foreach ($residuos_establecimiento as $res) {
				$residuos_transportista[$res['RESIDUO']] = $res;
				$residuos[$res['RESIDUO']] = $res;
			}
		}

		// residuos operador
		foreach ($_SESSION['DATOS_MANIFIESTO']['OPERADORES'] as $operador) {
			$residuos_establecimiento = obtener_permisos_por_establecimiento($operador['ID']);
			foreach ($residuos_establecimiento as $res) {
				$residuos_operador[$res['RESIDUO']] = $res;
				$residuos[$res['RESIDUO']] = $res;
			}
		}
// Esto es lo modificado, cuando esta toda la pregunta junta no funciona, habria que ver por que
		if ($tipo_manifiesto == TipoManifiesto::SIMPLE_RES_544_94 OR  $generador_por_alta_temprana) {
			// intersect solo entre transportista y operador
			$Ys_en_comun = array_intersect(array_keys($residuos_transportista), array_keys($residuos_operador));
			} else  if ($tipo_manifiesto == TipoManifiesto::SLOP){
			$Ys_en_comun = array_intersect(array_keys($residuos_transportista), array_keys($residuos_operador));
			} 
		else {
			$Ys_en_comun = array_intersect(array_keys($residuos_generador), array_keys($residuos_transportista), array_keys($residuos_operador));
		} 


       //Aqui se agrego la modificacion para que en manifiesto multiple solo permita Y1
  			
			if ($tipo_manifiesto == TipoManifiesto::MULTIPLE){
				$residuos_final[] = array(
				'CODIGO'      =>'Y1',
				'DESCRIPCION' => utf8_decode($residuos[$Ys_en_comun]['Y1'])
			);
			} Else	{
				foreach ($Ys_en_comun as $y) {
				 $residuos_final[] = array(
				 'CODIGO'      => $residuos[$y]['RESIDUO'],
				 'DESCRIPCION' => utf8_decode($residuos[$y]['RESIDUO_'])
			);
			}}
		// Hasta aqui 
		// var_dump(array('generador' => array_keys($residuos_generador)), array('transportista' => array_keys($residuos_transportista)), array('operador', array_keys($residuos_operador)));
		// var_dump($Ys_en_comun);
	
	

		// var_dump($residuos_final);die;
		$smarty->assign('ACCION', 'alta');
		$smarty->assign('RESIDUOS', $residuos_final);
		$smarty->assign('ESTADOS', obtener_estados());
		$smarty->assign('CONTENEDORES', obtener_contenedores());
		$smarty->assign('TIPO_MANIFIESTO', $tipo_manifiesto);
		$smarty->assign('PELIGROSIDAD', listadoDePeligrosidad());
		$smarty->display('operacion/transportista/residuo.tpl');
	}

	session_write_close();
?>
