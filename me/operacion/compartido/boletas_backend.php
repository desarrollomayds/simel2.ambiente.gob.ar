<?php
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

if($_FILES['file']){
	$_SESSION['INFORMACION_GENERAL']['EMPRESA']['BOLETAS'] = '';
	$file = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];

    $path_info = pathinfo($name);
	if ($path_info['extension'] == "csv"){
		if(($handle = fopen($file, 'r')) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ';', '"')) !== FALSE) {
		        	$final[] = $data;
		    }
		    fclose($handle);
		}

		$boletas = new boletas;
		$check = $boletas->verificarBoletasPorCSV($final);

foreach ($final as $key => $value) {
	$value[3] = $check[$key];
	$resultados[] = $value;
}

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=log.csv");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: 0");

	$output = fopen("php://output", "w");
    foreach ($resultados as $row) {
        fputcsv($output, $row,',');
    }
    fclose($output);
	} else {
		die("El archivo no es CSV");
	}
} else {

	if (!$_SESSION['INFORMACION_GENERAL']['EMPRESA']['BOLETAS']){
		$boletas = new boletas;
		$boletas_detalle = $boletas->detalleDeBoletasPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
		$_SESSION['INFORMACION_GENERAL']['EMPRESA']['BOLETAS'] = $boletas_detalle;
	}

	$detalle = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['BOLETAS'];

	$total_results = count($detalle); // total results from a query
	$maximum_per_page = 25; // maximum results to show per page
	$maximum_links = 5; // maximum links to show

	$page = new Paginator();
	$pagination = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");
	
	$valores = explode(",", $page->limit);
	$detalle = array_slice($detalle, $valores['0'], $valores['1']);

	$tipo_user = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
	$nombre_perfil = obtener_tipo($tipo_user);
	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty  = inicializar_smarty();
	$smarty->assign('BOLETAS', $detalle);
	$smarty->assign('NUEVOS', $cantidad1);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('TRANSPORTISTA', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('PERFIL', $nombre_perfil);
	$smarty->assign('PAGINADOR', $pagination);
	$smarty->display('operacion/compartido/boletas_backend.tpl');
}
?>