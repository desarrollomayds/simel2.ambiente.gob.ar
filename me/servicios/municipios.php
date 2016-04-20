<?
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	$municipios = obtener_municipios($_GET['provincia']);

	header("content-type: application/json");

	echo json_encode($municipios);
?>
