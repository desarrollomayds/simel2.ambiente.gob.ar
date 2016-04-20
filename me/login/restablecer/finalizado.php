<?php

    require_once("../../../global_incs/librerias/securimage/securimage.php");
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	$smarty  = inicializar_smarty();
	
	// Finalizado
	$smarty->assign('VALIDO', 1);

	$smarty->display('login/restablecer.tpl');

	session_write_close();
?>
