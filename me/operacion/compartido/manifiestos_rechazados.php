<?php
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/csv.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

session_write_close();
$criterios = obtener_criterios_busqueda_manifiestos();

if ( ! isset($criterios['rechazados_por'])) {
	$criterios['rechazados_por'] = 'mi';
}

$model = new Manifiesto;

if (isset($_GET['exportar']))
{
	$manifiestos = $model->get_listado_manifiestos_rechazados($criterios, false);
	$csv = new CSV();
	$csv_data = parseDataForCSV($manifiestos);
	$csv->setHeading('Fecha', 'Empresa Creadora', 'Establecimiento', 'Sucursal', 'Estado', 'Empresa Rechazo',
	 'Establecimiento', 'Sucursal', 'Fecha Rechazo', 'Motivo');
	$csv->addData($csv_data);
	$csv->output("D", "manifiestos_rechazados.csv");
	$csv->clear();
}
else
{
	list($manifiestos, $pagination) = $model->get_listado_manifiestos_rechazados($criterios);
	$smarty = inicializar_smarty();

	if ( ! isset($_GET['solo_rows'])) {
		$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
		$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
		$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
		$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
		$smarty->assign('PERFIL', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']);
	} else {
		$smarty->assign('solo_rows', true);
	}

	$smarty->assign('MANIFIESTOS', $manifiestos);
	$smarty->assign('filtros_buscador', array('protocolo_id', 'creador_empresa', 'fecha_rechazo'));
	$smarty->assign('criterios', $criterios);
	$smarty->assign('pagination', $pagination);
	$smarty->display('operacion/compartido/manifiestos_rechazados.tpl');
}

session_write_close();

function parseDataForCSV($manifiestos)
{
	$final_array = array();

	foreach ($manifiestos as $manifiesto) {
		$final_array[] = Array(
			'fecha_creacion' => $manifiesto->fecha_creacion->format('Y-m-d H:i:s'),
			'nombre_empresa' => $manifiesto->nombre_empresa,
			'nombre_establecimiento' => $manifiesto->nombre_establecimiento,
			'sucursal' => $manifiesto->sucursal,
			'estado' => 'Rechazado',
			'empresa_rechazo' => $manifiesto->empresa_rechazo,
			'establecimiento_rechazo' => $manifiesto->establecimiento_rechazo,
			'sucursal_rechazo' => $manifiesto->sucursal_rechazo,
			'fecha_rechazo' => $manifiesto->fecha_rechazo->format('Y-m-d H:i:s'),
			'motivo_rechazo' => $manifiesto->motivo_rechazo,
		);
	}

	return $final_array;
}
?>