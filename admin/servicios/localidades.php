<?
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	$localidades = obtener_localidades($_GET['provincia'], 0);

	header("content-type: application/json");

	echo json_encode($localidades);
?>
