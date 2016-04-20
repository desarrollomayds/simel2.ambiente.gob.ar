<?
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/csv.php");

// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$params = json_decode($_GET['params']);
//list($start_date, $end_date) = get_dates_from_params($params);
list($)
$manifiestos = new manifiestos($id, $protocolo, $cuit, $establecimiento, $fecha, $tipo, $estado);
/$rows = $manifiestos->getListadoManifiestos($params->id, $params->protocolo, $params->cuit, $params->establecimiento, $params->fecha,  $params->tipo,  $params->estado);

//$rows = $estadisticas->getCantidadEntradaSalidaResiduos($params->csc, $params->provincia_desde, $params->provincia_hacia);


//Armamos csv file
$csv = new CSV();
$csv_data = getDataForCSV($rows);
$csv->setHeading('ID', 'Protocolo', 'Cuit', 'Establecimiento creador', 'Fecha creacion', 'tipo', 'Estado');
$csv->addData($csv_data);
$csv->output("D", "listado_manifiestos.csv");
$csv->clear();

exit(0);

function getDataForCSV($rows)
{
	$final_array = array();

	foreach ($rows as $row) {
		$tmp['id'] = $row->csc;
		$tmp['protocolo'] = utf8_encode($row->descripcion);
		$tmp['cuit'] = $row->enviado;
		$tmp['establecimiento'] = $row->recibido;
		$tmp['fecha'] = $row->cantidad;
		$tmp['tipo'] = $row->cantidad_real;
		$tmp['estado'] = $row->cantidad_real;

		$final_array[] = $tmp;
	}

	return $final_array;
}
