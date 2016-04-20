<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "17";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$start = $end = new DateTime();
$estadisticas = new estadisticas($start->format('Y-m-d'), $end->format('Y-m-d'));

$rows_table = $estadisticas->getCantidadPorResiduoTratamiento();
$rows_chart_residuos = $estadisticas->getCantidadPorResiduo();
$rows_chart_tratamientos = $estadisticas->getCantidadPorTratamiento();

$smarty = inicializar_smarty();
$smarty->assign('residuos', Residuo::get_all());
$smarty->assign('estadisticas_residuo_y_tratamiento', $rows_table);


$smarty->assign('estadisticas_residuos_json', parse_data_for_pie_chart('csc', $rows_chart_residuos));
$smarty->assign('estadisticas_tratamientos_json', parse_data_for_pie_chart('tratamiento', $rows_chart_tratamientos));
$smarty->display('drp/operacion/estadisticas_cantidad_por_residuo_y_tratamiento.tpl');

session_write_close();

function parse_data_for_pie_chart($label_name, $estadisticas)
{
	$arr = array('key' => 'info', 'values' => array());
	foreach ($estadisticas as $row)	{
		$arr['values'][] = array("label" => $row->{$label_name}, "value" => $row->cantidad);
	}

	return json_encode(array($arr));
}
