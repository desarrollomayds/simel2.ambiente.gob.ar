<?php
/*
	$alerta_class = new alertas;
	$alerta_class->runAlertas();
	$alerta = $alerta_class->getAlerta();

	//var_dump($alerta);
	// logica para mostrar alerga
	if (!$alerta['seccion'][0] == ""){
		if (!in_array($_SERVER['PHP_SELF'], $alerta['seccion'])) {
			$alerta = NULL;
		}
	}
*/
	//die("ESTAS EN formularios_y_alertas.php");

/*
	$form = new formularios;

	$limite = 0;

	if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'] == "1"){
		$config = new config;
        $limite = $config->getParameters("framework::vencimiento::vencimiento_generador");
	}
	
	if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_VENCIMIENTO_DIAS'] > $limite) {
			if ($form->cantidadDeFormulariosNPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']) <= $form->formulariosMinimo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])){
			if ($form->cantidadDeFormulariosNPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])){
				$alerta = alertas::parse(alertas::ALERTA_STOCK_FORMULARIOS);
			} else {
				$alerta = alertas::parse(alertas::ALERTA_FORMULARIOS_NO_UTILIZADOS);
			}
		}
	} else {
		$alerta = alertas::parse(alertas::ALERTA_CAA);
	}

	// si tiene url muestra en esa seccion, sino en todos lados.
	if (!$alerta[seccion][0] == ""){
		if (!in_array($_SERVER['PHP_SELF'], $alerta[seccion])) {
			$alerta = NULL;
		}
	}
*/
?>