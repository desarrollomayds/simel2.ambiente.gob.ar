<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 10;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$criterio = isset($_GET['criterio']) ? $_GET['criterio'] : NULL;

$establecimiento = new Establecimiento;
list($altas_tempranas, $paginador) = $establecimiento->get_listado_altas_tempranas($criterio);

$smarty->assign('altas_tempranas', $altas_tempranas);
$smarty->assign('criterio', $criterio);
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/listado_altas_tempranas.tpl');
session_write_close();
