<?
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/csv.php");

// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode(stripslashes($_GET['params']));
list($start_date, $end_date) = get_dates_from_params($params);

$estadisticas = new estadisticas($start_date, $end_date);

$usuario = $params->usuario_establecimiento != '' ? $params->usuario_establecimiento : NULL;
$tipo_establecimiento = $params->tipo_establecimiento != 'all' ? $params->tipo_establecimiento : NULL;
$estados = array('a', 'e', 'f'); // los estados que nos interesan para esta estadisticas.
$tipo_manifiesto = $params->tipo_manifiesto != 'all' ? $params->tipo_manifiesto : NULL;
	
$rows = $estadisticas->getManifiestosPorEstablecimiento($usuario, $tipo_establecimiento, $estados, $tipo_manifiesto, false);


// armamos csv file
$csv = new CSV();
$csv_data = getDataForCSV($rows);
$csv->setHeading('Est. creador', 'Tipo Manif.', 'Protocolo', 'Estado', 'Y', 'KG', 'KG recibidos', 'KG tratados');
$csv->addData($csv_data);
$csv->output("D", "estadisticas_manifiestos_por_establecimiento.csv");
$csv->clear();

exit(0);

function getDataForCSV($rows)
{
	$final_array = array();

	foreach ($rows as $row) {
		$tmp['creador'] = $row->nombre_establecimiento_creador;
		$tmp['tipo'] = $row->tipo_manifiesto;
		$tmp['protocolo'] = formatear_id_protocolo_manifiesto($row->protocolo_id);
		$tmp['estado'] = $row->estado_manifiesto;
		$tmp['residuo'] = $row->residuo;
		$tmp['cantidad'] = $row->cantidad_estimada;
		$tmp['cantidad_recibida'] = $row->cantidad_recibida;
		$tmp['cantidad_tratada'] = $row->cantidad_tratada;

		$final_array[] = $tmp;
	}

	return $final_array;
}
