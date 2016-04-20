<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	$modulo_id = "3";

	session_start();

	$permisos = new permisos();
	$permisos->validarAccesoSeccion($modulo_id);

	$smarty  = inicializar_smarty();

	$estadistica_manifiestos    = obtener_estadistica_manifiestos();
	$estadistica_registraciones = obtener_estadistica_registraciones();

	$smarty->assign('USUARIO',                    $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('ESTADISTICA_MANIFIESTOS',    $estadistica_manifiestos);
	$smarty->assign('ESTADISTICA_REGISTRACIONES', $estadistica_registraciones);

	$provincias  = obtener_provincias();
	if($informacion){
		$localidades_r = obtener_localidades($informacion['PROVINCIA_R'], 0);
		$localidades_c = obtener_localidades($informacion['PROVINCIA_C'], 0);
	}

	$residuos = obtener_categorias_residuos();

	$smarty->assign('PROVINCIAS',      $provincias);
	$smarty->assign('RESIDUOS'  ,      $residuos);



	$smarty->display('drp/operacion/reportes.tpl');

	session_write_close();
?>
