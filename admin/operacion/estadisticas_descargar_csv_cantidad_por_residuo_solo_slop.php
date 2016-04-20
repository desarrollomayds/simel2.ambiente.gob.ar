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
$excluir_tipos = array(TipoManifiesto::SIMPLE, TipoManifiesto::MULTIPLE, TipoManifiesto::SIMPLE_RES_544_94, TipoManifiesto::SIMPLE_CONCENTRADOR);
$rows = $estadisticas->getCantidadPorResiduo($params->csc, $excluir_tipos);

// armamos csv file
$csv = new CSV();
$csv_data = getDataForCSV($rows);
$csv->setHeading('CSC', 'Descripcion', 'Cantidad');
$csv->addData($csv_data);
$csv->output("D", "estadisticas_cantidad_por_residuo_solo_slop.csv");
$csv->clear();

exit(0);

function getDataForCSV($rows)
{
	$final_array = array();

	foreach ($rows as $row) {
		$tmp['csc'] = $row->csc;
		$tmp['descripcion'] = utf8_encode($row->descripcion);
		$tmp['cantidad'] = $row->cantidad;

		$final_array[] = $tmp;
	}

	return $final_array;
}
