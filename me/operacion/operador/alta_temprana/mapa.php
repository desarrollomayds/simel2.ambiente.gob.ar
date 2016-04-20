<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty  = inicializar_smarty();

	$punto_inicio = $_POST['calle_inicio'] . " " . $_POST['numero_inicio'] . ", " . obtener_localidad($_POST['localidad_inicio']) . ", " . obtener_municipio_por_localidad($_POST['localidad_inicio']) . ", " . obtener_provincia($_POST['provincia_inicio']) . ", " . " argentina";

	$smarty->assign('CAMPO_LATITUD',    $_POST['campo_latitud']);
	$smarty->assign('CAMPO_LONGITUD',   $_POST['campo_longitud']);
	$smarty->assign('PUNTO_INICIO',     $punto_inicio);

	$smarty->display('registracion/mapa.tpl');

	session_write_close();
?>
