<?php	
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$_SESSION['GENERADORES'] = '';
$smarty  = inicializar_smarty();

$smarty->assign('entidad_logueada', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));
$smarty->display('operacion/compartido/nueva_ruta.tpl');

session_write_close();
?>