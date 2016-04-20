<?php
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");
echo "test";
$formularios = new formularios;
$formularios->cantidadDeFormularios();

echo "<pre>";
print_r($formularios);
echo "</pre>";


?>