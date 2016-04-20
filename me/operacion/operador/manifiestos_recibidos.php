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
	$manifiestos = $model->get_listado_manifiestos_a_procesar($criterios, false);
	$csv_data = parseDataForCSV($manifiestos);
	$csv = new CSV();
	$csv->setHeading('ID Protocolo', 'Fecha', 'Empresa Creadora', 'Establecimiento', 'Sucursal', 'Estado');
	$csv->addData($csv_data);
	$csv->output("D", "manifiestos_recibidos.csv");
	$csv->clear();
}
else
{
	list($manifiestos, $pagination) = $model->get_listado_manifiestos_a_procesar($criterios);

	$smarty = inicializar_smarty();
	$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS',         $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS',    $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('MANIFIESTOS',     $manifiestos);
	$smarty->assign('TIPO_MANIFIESTO', isset($_GET['tipo_manifiesto']) ? $_GET['tipo_manifiesto'] : 0);
	$smarty->assign('filtros_buscador', array('protocolo_id', 'creador_empresa', 'fecha_recepcion'));
	$smarty->assign('criterios', $criterios);
	$smarty->assign('pagination', $pagination);
	$smarty->display('operacion/operador/manifiestos_recibidos.tpl');
}

session_write_close();

function parseDataForCSV($manifiestos)
{
	$final_array = array();

	foreach ($manifiestos as $manifiesto) {
		$final_array[] = Array(
			'id_protocolo_manifiesto' => formatear_id_protocolo_manifiesto($manifiesto->id_protocolo_manifiesto),
			'fecha_creacion' => $manifiesto->fecha_creacion->format('Y-m-d H:i:s'),
			'nombre_empresa' => $manifiesto->nombre_empresa,
			'nombre_establecimiento' => $manifiesto->nombre_establecimiento,
			'sucursal' => $manifiesto->sucursal,
			'estado' => 'Recibido',
		);
	}

	return $final_array;
}
?>
