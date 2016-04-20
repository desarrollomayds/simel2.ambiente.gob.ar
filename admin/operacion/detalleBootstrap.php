<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty  = inicializar_smarty();
	$errores  = Array();

	/*foreach ($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $key=>$unEst) {
		foreach ($unEst['PERMISOS'] as $keyE=>$unPermiso) {
			$_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'][$key]['PERMISOS'][$keyE]["RESIDUO_"] = utf8_decode($unPermiso["RESIDUO_"]);
		}
	}*/

	// Si no se especifica ningún establecimiento se redirige
	if ( ! isset($_GET['id']) || empty($_GET['id']))
	{
		header('Location: listadoBootstrap.php');
	}

	// En caso de que la empresa no este asignada a ningún administrador, se asigna el primero que entró
	asignar_registracion_pendiente($_GET['id']);

	// Se comprueba que exista el establecimiento y que esté asignado al administrador actual
	if ($empresa = obtener_registracion_pendiente($_GET['id']))
	{

		$smarty->assign('EMPRESA', $empresa);
		$smarty->display('drp/operacion/detalleBootstrap.tpl');

	}
	else
	{
		header('Location: listadoBootstrap.php');
	}

	session_write_close();
?>
