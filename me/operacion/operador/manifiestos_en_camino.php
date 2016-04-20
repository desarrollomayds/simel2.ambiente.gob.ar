<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/csv.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

session_write_close();

$criterios = obtener_criterios_busqueda_manifiestos();
$tipo_manifiesto = $criterios['tipo_manifiesto'];

$model = new Manifiesto;

if (isset($_GET['exportar']))
{
	$manifiestos = $model->get_listado_manifiestos_en_camino($criterios, false);
	$csv_data = parseDataForCSV($manifiestos, $tipo_manifiesto);
	$csv = new CSV();
	if ($tipo_manifiesto == TipoManifiesto::SLOP) {
		$csv->setHeading('ID Protocolo', 'Empresa Naviera', 'Buque', 'Estado');
	} else {
		$csv->setHeading('ID Protocolo', 'Empresa Creadora', 'Establecimiento', 'Sucursal', 'Estado');
	}
	$csv->addData($csv_data);
	$csv->output("D", "manifiestos_en_camino.csv");
	$csv->clear();
}
else
{
	list($manifiestos, $pagination) = $model->get_listado_manifiestos_en_camino($criterios);

	$smarty  = inicializar_smarty();
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('MANIFIESTOS', $manifiestos);
	$smarty->assign('TIPO_MANIFIESTO', $tipo_manifiesto);
	$smarty->assign('filtros_buscador', array('protocolo_id', 'creador_empresa', 'fecha_creacion'));
	$smarty->assign('criterios', $criterios);
	$smarty->assign('pagination', $pagination);
	$smarty->display('operacion/operador/manifiestos_en_camino.tpl');
}

session_write_close();

function parseDataForCSV($manifiestos, $tipo_manifiesto)
{
	$final_array = array();

	foreach($manifiestos as $manifiesto){
		$temp['id_protocolo_manifiesto'] = formatear_id_protocolo_manifiesto($manifiesto->id_protocolo_manifiesto);
	
		$temp['nombre_empresa'] = $manifiesto->nombre_empresa;
		$temp['nombre_establecimiento'] = $manifiesto->nombre_establecimiento;

		if ($tipo_manifiesto != TipoManifiesto::SLOP) {
			$temp['sucursal'] = $manifiesto->sucursal;
		}

		$temp['estado_manifiesto'] = 'Aprobado';

		$final_array[] = $temp;
	}

	return $final_array;
}
?>
