<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "18";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$start = $end = new DateTime();
$estadisticas = new estadisticas($start->format('Y-m-d'), $end->format('Y-m-d'));

$rows_table = $estadisticas->getCantidadEntradaSalidaResiduos();
$rows_chart_salidas = $estadisticas->getCantidadSalidaPorProvincia();
$rows_chart_entradas = $estadisticas->getCantidadEntradaPorProvincia();

$smarty = inicializar_smarty();
$smarty->assign('residuos', Residuo::get_all());
$smarty->assign('provincias', Provincia::get_all());
$smarty->assign('estadisticas_entrada_salida_de_residuos', $rows_table);
$smarty->assign('estadisticas_salida_json', parse_data_for_pie_chart($rows_chart_salidas));
$smarty->assign('estadisticas_entrada_json', parse_data_for_pie_chart($rows_chart_entradas));
$smarty->display('drp/operacion/estadisticas_entrada_salida_de_residuos.tpl');

session_write_close();

function parse_data_for_pie_chart($estadisticas)
{
	$arr = array('key' => 'info', 'values' => array());
	foreach ($estadisticas as $row)	{
		$arr['values'][] = array("label" => $row->csc, "value" => $row->cantidad);
	}

	return json_encode(array($arr));
}