<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

$smarty = inicializar_smarty();
$config = new config;
$no_live_msg = $config->getMessageText("general::07100007");
$smarty->assign('ERROR_TITLE', '');
$smarty->assign('ERROR_TEXT', $no_live_msg);
$smarty->display('general/error.tpl');
?>