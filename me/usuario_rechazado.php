<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

$smarty = inicializar_smarty();
$smarty->assign('ERROR_TITLE', 'Usuario Rechazado');
$smarty->assign('ERROR_TEXT', 'Su usuario ha sido rechazado por la administraci&oacute;n de la DRP. Revise su casilla de correo para conocer los detalles o p&oacute;ngase en contacto con la DRP.');
$smarty->display('general/error.tpl');
?>