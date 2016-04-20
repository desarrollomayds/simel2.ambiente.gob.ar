<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

// acl
$modulo_id = "20";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode(stripslashes($_POST['params']));
list($start_date, $end_date) = get_dates_from_params($params);

$estadisticas = new estadisticas($start_date, $end_date);
$res = $estadisticas->getCantidadManifiestos();

echo json_encode($res);
exit(0);
