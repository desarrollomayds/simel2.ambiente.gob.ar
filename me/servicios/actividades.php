<?
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	$actividades = obtener_actividades();

	header("content-type: application/json");

	echo json_encode($actividades);
?>
