<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/csv.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

session_write_close();
$criterios = obtener_criterios_busqueda_manifiestos();

if ( ! isset($criterios['pendiente_por'])) {
	$criterios['pendiente_por'] = 'mi';
}

$model = new Manifiesto;

if (isset($_GET['exportar']))
{
	$manifiestos = $model->get_listado_manifiestos_pendientes($criterios, false);
	$csv = new CSV();
	$csv->setHeading('Id', 'Fecha', 'Empresa Creadora', 'Estado');
	$csv->addData($manifiestos);
	 
	$csv->output("D", "manifiestos_pendientes.csv");
	$csv->clear();
}
else
{
	list($manifiestos, $pagination) = $model->get_listado_manifiestos_pendientes($criterios);

	$smarty = inicializar_smarty();
	$smarty->assign('ROL', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('MANIFIESTOS', $manifiestos);
	$smarty->assign('filtros_buscador', array('manifiesto_id', 'creador_empresa', 'fecha_creacion'));
	$smarty->assign('criterios', $criterios);
	$smarty->assign('pagination', $pagination);
	$smarty->display('operacion/compartido/manifiestos_pendientes.tpl');
}

session_write_close();
?>
