<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "16";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$start = $end = new DateTime();
$estadisticas = new estadisticas($start->format('Y-m-d'), $end->format('Y-m-d'));

$smarty = inicializar_smarty();
$smarty->assign('residuos', Residuo::get_all());

// estadisticas no slop

$rows = $estadisticas->getCantidadPorResiduo('all');
$smarty->assign('estadisticas_no_slop', $rows);
$smarty->assign('estadisticas_no_slop_json', parse_data_for_pie_chart($rows));

// estadisticas slop
$excluir_tipos = array(TipoManifiesto::SIMPLE, TipoManifiesto::MULTIPLE, TipoManifiesto::SIMPLE_RES_544_94, TipoManifiesto::SIMPLE_CONCENTRADOR);
$rows = $estadisticas->getCantidadPorResiduo('all', $excluir_tipos);
$smarty->assign('estadisticas_slop', $rows);
$smarty->assign('estadisticas_slop_json', parse_data_for_pie_chart($rows));

$smarty->display('drp/operacion/estadisticas_cantidad_por_residuo.tpl');

session_write_close();

function parse_data_for_pie_chart($estadisticas)
{
	$arr = array('key' => 'info', 'values' => array());
	foreach ($estadisticas as $row)	{
		$arr['values'][] = array("label" => $row->csc, "value" => $row->cantidad);
	}

	return json_encode(array($arr));
}
