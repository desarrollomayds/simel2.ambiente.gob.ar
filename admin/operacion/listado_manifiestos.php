<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "12";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$model = new Manifiesto;
$filtros = array(
    'manifiesto_id' => $_GET['manifiesto_id'],
    'protocolo_id' => $_GET['protocolo_id'],
    'establecimiento' => $_GET['establecimiento'],
    'tipo_manifiesto' => $_GET['tipo_manifiesto'],
    'estado' => $_GET['estado'],
);

list($manifiestos, $paginador) = $model->get_listado_manifiestos_por_estado($filtros);

$estados = array(
    "a" => "Aprobado",
    "f" => "Finalizado",
    "p" => "Pendiente",
    "r" => "Rechazado",
    "e" => "Recibido",
    "v" => "Vencido",
);

$smarty  = inicializar_smarty();
$smarty->assign('manifiestos', $manifiestos);
$smarty->assign('establecimiento', isset($_GET['establecimiento']) ? $_GET['establecimiento'] : '');
$smarty->assign('paginador', $paginador);
$smarty->assign('estados', $estados);
$smarty->assign('filtros', $filtros);
$smarty->display('drp/operacion/listado_manifiestos.tpl');

session_write_close();
?>