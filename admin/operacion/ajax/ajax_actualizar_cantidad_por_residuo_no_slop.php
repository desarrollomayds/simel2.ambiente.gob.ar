<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode(stripslashes($_POST['params']));
list($start_date, $end_date) = get_dates_from_params($params);
$estadisticas = new estadisticas($start_date, $end_date);
$rows = $estadisticas->getCantidadPorResiduo($params->csc);

$final_array = array(
	'table_data' => array(),
	'charts_data' => array(
		'pie_chart_no_slop' => array(array('key' => 'info', 'values' => array())),
	),
);

foreach ($rows as $row) {
	$temp_table['csc'] = $row->csc;
	$temp_table['descripcion'] = utf8_encode($row->descripcion);
	$temp_table['cantidad'] = $row->cantidad;

	$temp_chart['label'] = $row->csc;
	$temp_chart['value'] = $row->cantidad;

	$final_array['table_data'][] = $temp_table;
	$final_array['charts_data']['pie_chart_no_slop'][0]['values'][] = $temp_chart;
}

echo json_encode($final_array);
exit(0);
