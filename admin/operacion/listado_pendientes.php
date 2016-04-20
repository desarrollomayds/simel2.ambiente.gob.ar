<?php

require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

$smarty  = inicializar_smarty();

$rol_usuario = $_SESSION['INFORMACION_USUARIO']['ROL'];

if ($rol_usuario != 1)
{
	session_destroy();
	header('Location: ../login/login_usuario.php');
}

$cantidad_registros = obtener_cantidad_registraciones_pendientes('%' . $_GET['criterio'] . '%');
// $cantidad_modificaciones
$smarty->assign('REGISTROS',    $cantidad_registros);
$smarty->display('drp/operacion/listado_pendientes.tpl');

session_write_close();
?>