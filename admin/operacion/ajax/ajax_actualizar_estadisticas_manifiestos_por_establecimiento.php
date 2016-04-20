<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

// acl
$modulo_id = "19";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode(stripslashes($_POST['params']));
list($start_date, $end_date) = get_dates_from_params($params);

$estadisticas = new estadisticas($start_date, $end_date);

$usuario = $params->establecimiento != ''    ? $params->establecimiento : NULL;
$tipo_establecimiento = $params->tipo_establecimiento != 'all' ? $params->tipo_establecimiento : NULL;
$estados = array('a', 'e', 'f'); // los estados que nos interesan para esta estadisticas.
$tipo_manifiesto = $params->tipo_manifiesto != 'all' ? $params->tipo_manifiesto : NULL;

// run!
list($manifiestos, $paginador) = $estadisticas->getManifiestosPorEstablecimiento($usuario, $tipo_establecimiento, $estados, $tipo_manifiesto);
var_dump($manifiestos, $paginador);die;

foreach ($result['operador'] as $row) {
	$tmp['nombre_establecimiento'] = utf8_encode($row->nombre_establecimiento);
	$tmp['tipo'] = $row->tipo;
	$tmp['protocolo'] = $row->protocolo;
	$tmp['residuo'] = $row->residuo;
	$tmp['kg_estimada'] = $row->kg_estimada;

	$final_array['operador'][] = $tmp;
}

echo json_encode($final_array);
exit(0);
