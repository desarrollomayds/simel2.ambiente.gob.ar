<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	$modulo_id = "1";

	session_start();

	$permisos = new permisos();
	$permisos->validarAccesoSeccion($modulo_id);

	$smarty  = inicializar_smarty();

	$p = (int)$_GET['p'];
	if(is_null($p))
		$p = 0;

	$usuarios   = obtener_usuarios('%' . $_POST['criterio'] . '%', $p);

	// VER ESTO.... Paginado no anda tampoco
	$cantidad = count($usuarios);
	//$cantidad   = obtener_cantidad_usuarios('%' . $_POST['criterio'] . '%', $p);

	if($cantidad>= 20)
	$paginas    = range(0, $cantidad / 20);
	else
	$paginas = 0;

	$smarty->assign('USUARIO',    $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('PAGINAS',    $paginas);
	$smarty->assign('USUARIOS',   $usuarios);
	$smarty->display('drp/operacion/listado_usuarios.tpl');

	session_write_close();
?>
