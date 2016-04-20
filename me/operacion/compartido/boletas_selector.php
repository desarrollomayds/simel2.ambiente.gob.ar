<?php
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$config = new config;
$multiplo = $config->getParameters("framework::boletas::multiplo");
$valores_select = $config->getParameters("framework::boletas::valores_select");
$valores_select = explode(",", $valores_select);

echo "<div style='width:400px;text-align:center;margin-left:80px;'>";
echo "Seleccione una opci&oacute;n o ingrese la cantidad deseada<br><br>";
echo "<select id='select' name='select' class='form-control' style='width:150px;display: inline-block'>";
foreach ($valores_select as $value) {
echo "<option value=".$value * $multiplo.">".$value * $multiplo." Manifiestos</option>";
}
echo "</select>";
echo "<input type='hidden' id='multiplo' value='".$multiplo."'>";
echo "<input type='text' class='form-control' id='valor' style='width:150px;display: inline-block'>";
echo "<br><br>El valor m&iacute;nimo es ".$multiplo;
echo "</div>";
?>
