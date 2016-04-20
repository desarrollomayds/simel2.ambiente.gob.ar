<?
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	$categorias = obtener_categorias_residuos();

	header("content-type: application/json");

	echo json_encode($categorias);
?>
