<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

// acl
$modulo_id = "17";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode(stripslashes($_POST['params']));
list($start_date, $end_date) = get_dates_from_params($params);

$estadisticas = new estadisticas($start_date, $end_date);
$rows_tabla = $estadisticas->getCantidadPorResiduoTratamiento($params->csc, $params->tratamiento);
$rows_chart_residuos = $estadisticas->getCantidadPorResiduo($params->csc, array(), $params->tratamiento);
$rows_chart_tratamientos = $estadisticas->getCantidadPorTratamiento($params->csc, $params->tratamiento);

$final_array = array(
	'table_data' => array(),
	'charts_data' => array(
		'pie_chart_residuos' => array(array('key' => 'info','values' => array())),
		'pie_chart_tratamientos' => array(array('key' => 'info','values' => array())),
	)
);

foreach ($rows_tabla as $row) {
	$temp_table['csc'] = $row->csc;
	$temp_table['descripcion'] = utf8_encode($row->descripcion);
	$temp_table['tratamiento'] = $row->tratamiento;
	$temp_table['cantidad'] = $row->cantidad;

	$final_array['table_data'][] = $temp_table;
}

foreach ($rows_chart_residuos as $row) {
	$temp_chart['label'] = $row->csc;
	$temp_chart['value'] = $row->cantidad;

	$final_array['charts_data']['pie_chart_residuos'][0]['values'][] = $temp_chart;
}

foreach ($rows_chart_tratamientos as $row) {
	$temp_chart['label'] = $row->tratamiento;
	$temp_chart['value'] = $row->cantidad;

	$final_array['charts_data']['pie_chart_tratamientos'][0]['values'][] = $temp_chart;
}

echo json_encode($final_array);
exit(0);
