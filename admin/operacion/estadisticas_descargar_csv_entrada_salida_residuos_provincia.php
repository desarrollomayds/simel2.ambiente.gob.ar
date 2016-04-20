<?
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/csv.php");

// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode($_GET['params']);
list($start_date, $end_date) = get_dates_from_params($params);
$estadisticas = new estadisticas($start_date, $end_date);
$rows = $estadisticas->getCantidadEntradaSalidaResiduos($params->csc, $params->provincia_desde, $params->provincia_hacia);


// armamos csv file
$csv = new CSV();
$csv_data = getDataForCSV($rows);
$csv->setHeading('CSC', 'Descripcion', 'Enviado desde', 'Recibido en', 'Cantidad Estimada', 'Cantidad Real');
$csv->addData($csv_data);
$csv->output("D", "estadisticas_entrada_salida_residuos_por_provincia.csv");
$csv->clear();

exit(0);

function getDataForCSV($rows)
{
	$final_array = array();

	foreach ($rows as $row) {
		$tmp['csc'] = $row->csc;
		$tmp['descripcion'] = utf8_encode($row->descripcion);
		$tmp['enviado'] = $row->enviado;
		$tmp['recibido'] = $row->recibido;
		$tmp['cantidad'] = $row->cantidad;
		$tmp['cantidad_real'] = $row->cantidad_real;

		$final_array[] = $tmp;
	}

	return $final_array;
}
