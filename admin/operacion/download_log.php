<?php
$array=explode("/",$_SERVER['HTTP_REFERER']);
$final=end($array);
if ($final == "administracion_boletas_de_pago.php"){
	$fecha_actual=date("d/m/Y");
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=log-".$fecha_actual.".csv");
	header("Cache-Control: no-cache, no-store, must-revalidate");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	$output = fopen("php://output", "w");
    foreach ($_SESSION['LOG'] as $row) {
        fputcsv($output, $row,',');
    }
    fclose($output);
    $_SESSION['LOG'] ='';
} else {die("No permitido");}
?>