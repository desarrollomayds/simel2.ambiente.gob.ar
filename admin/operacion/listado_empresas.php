<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "5";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$empresa = new Empresa;
list($pendientes, $paginador) = $empresa->get_listado_registros_totales('%'.$_GET['criterio'].'%');

$smarty = inicializar_smarty();
$smarty->assign('pendientes', $pendientes);
$smarty->assign('paginador', $paginador);
$smarty->assign('criterio', isset($_GET['criterio']) ? $_GET['criterio'] : '');
$smarty->display('drp/operacion/listado_empresas.tpl');
session_write_close();
?>
