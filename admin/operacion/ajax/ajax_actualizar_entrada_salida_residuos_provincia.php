<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

// acl
$modulo_id = "18";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode($_POST['params']);
list($start_date, $end_date) = get_dates_from_params($params);

$estadisticas = new estadisticas($start_date, $end_date);
$rows_table = $estadisticas->getCantidadEntradaSalidaResiduos($params->csc, $params->provincia_desde, $params->provincia_hacia);
$rows_chart_salidas = $estadisticas->getCantidadSalidaPorProvincia($params->provincia_desde, $params->csc);
$rows_chart_entradas = $estadisticas->getCantidadEntradaPorProvincia($params->provincia_hacia, $params->csc);

$final_array = array(
	'table_data' => array(),
	'charts_data' => array(
		'pie_chart_prov_salida' => array(array('key' => 'info','values' => array())),
		'pie_chart_prov_entrada' => array(array('key' => 'info','values' => array())),
	)
);

foreach ($rows_table as $row) {
	$temp_table['csc'] = $row->csc;
	$temp_table['descripcion'] = utf8_encode($row->descripcion);
	$temp_table['cantidad'] = $row->cantidad;
	$temp_table['cantidad_real'] = $row->cantidad_real;
	$temp_table['enviado'] = $row->enviado;
	$temp_table['recibido'] = $row->recibido;

	$final_array['table_data'][] = $temp_table;
}

foreach ($rows_chart_salidas as $row) {
	$temp_chart['label'] = $row->csc;
	$temp_chart['value'] = $row->cantidad;

	$final_array['charts_data']['pie_chart_prov_salida'][0]['values'][] = $temp_chart;
}

foreach ($rows_chart_entradas as $row) {
	$temp_chart['label'] = $row->csc;
	$temp_chart['value'] = $row->cantidad;

	$final_array['charts_data']['pie_chart_prov_entrada'][0]['values'][] = $temp_chart;
}

echo json_encode($final_array);
exit(0);
