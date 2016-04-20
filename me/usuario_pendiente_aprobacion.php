<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

$smarty = inicializar_smarty();
$smarty->assign('ERROR_TITLE', 'Usuario pendiente de Aprobaci&oacute;n');
$smarty->assign('ERROR_TEXT', 'Su usuario a&uacute;n se encuentra en proceso de aprobaci&oacute;n por parte de la DRP. Recibir&aacute; una notificaci&oacute;n en su casilla de correo al finalizar este proceso.');
$smarty->display('general/error.tpl');
?>