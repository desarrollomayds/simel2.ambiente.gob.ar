<?php
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$c = new config();
$url = $c->getParameters("framework::documentos::path_boletas") .$_GET['establecimiento_id']."/".$_GET['boleta_id'].".pdf";

header('Content-type: application/pdf');
header("Content-Disposition: attachment; filename=".$_GET["boleta_id"].".pdf");
Header('Expires: 0');
Header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
Header('Pragma: public');
readfile($url);
?>