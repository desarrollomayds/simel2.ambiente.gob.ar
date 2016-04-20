<?php
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

$boletas = new boletas;
if ($boletas->modulo_boleta_activo() == 'si'){

if($_POST['accion'] == 'crear'){
	$boletas = new boletas;
	$response = $boletas->crearBoletaPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_POST['cantidad']);
	$_SESSION['INFORMACION_GENERAL']['EMPRESA']['BOLETAS'] = '';

	$retorno = array(
			'id'					=> $response[0]->id,
			'establecimiento_id'	=> $response[0]->establecimiento_id,
			'importe'				=> $response[0]->importe,
			'cantidad_manifiestos'	=> $response[0]->cantidad_manifiestos,
		);

	echo json_encode($retorno);
} else {
	$smarty  = inicializar_smarty();
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



	$smarty->assign('BOLETAS', $detalle);
	$smarty->assign('NUEVOS', $cantidad1);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('TRANSPORTISTA', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('PERFIL', $nombre_perfil);
	$smarty->assign('PAGINADOR', $pagination);
	$smarty->display('operacion/compartido/boletas_de_pago.tpl');
}
} else {
	return false;
}
?>