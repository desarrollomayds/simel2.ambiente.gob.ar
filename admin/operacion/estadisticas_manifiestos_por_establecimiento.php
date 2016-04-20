<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/csv.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "19";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$smarty = inicializar_smarty();

if ($_GET['usuario_establecimiento'])
{
	$params = arrayToObject($_GET);
	list($start_date, $end_date) = get_dates_from_params($params);

	$estadisticas = new estadisticas($start_date, $end_date);

	$usuario = $params->usuario_establecimiento != '' ? $params->usuario_establecimiento : NULL;
	$tipo_establecimiento = $params->tipo_establecimiento != 'all' ? $params->tipo_establecimiento : NULL;
	$estados = array('a', 'e', 'f'); // los estados que nos interesan para esta estadisticas.
	$tipo_manifiesto = $params->tipo_manifiesto != 'all' ? $params->tipo_manifiesto : NULL;

	// run!
	list($manifiestos, $paginador) = $estadisticas->getManifiestosPorEstablecimiento($usuario, $tipo_establecimiento, $estados, $tipo_manifiesto);

	$smarty->assign('manifiestos', $manifiestos);
	$smarty->assign('paginador', $paginador);
	$smarty->assign('params', $params);
	$smarty->assign('start_date', $_GET['start_date']);
	$smarty->assign('end_date', $_GET['end_date']);
}

$smarty->display('drp/operacion/estadisticas_manifiestos_por_establecimiento.tpl');

session_write_close();
