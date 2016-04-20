<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");
require_once("../../global_incs/librerias/securimage/securimage.php");
	
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/drp.inc.php");
session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 19;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$criterio = isset($_GET['criterio']) ? $_GET['criterio'] : NULL;

$residuo = new Residuo;
list($residuos, $paginador) = $residuo->get_listado_residuos($criterio);

$smarty->assign('residuos', $residuos);
$smarty->assign('criterio', $criterio);
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/listado_cat_residuos_peligrosos.tpl');
session_write_close();
