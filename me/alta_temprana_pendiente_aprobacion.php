<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

$smarty = inicializar_smarty();
$smarty->assign('ERROR_TITLE', 'Alta temprana pendiente de Aprobaci&oacute;n');
$smarty->assign('ERROR_TEXT', 'Su usuario fue generado a trav&eacute;s de un alta temprana y ha superado el peri&oacute;do permitido para operar en SIMEL sin un n&uacute;mero de expediente. Para regular el estado de su cuenta debe acercarse a nuestras oficinas para iniciar la apertura del mismo.');
$smarty->display('general/error.tpl');
?>