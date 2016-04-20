<?php
$resultados = $_GET['resultados'];
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=log.csv");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: 0");

	$output = fopen("php://output", "w");
    foreach ($resultados as $row) {
        fputcsv($output, $row,',');
    }
    fclose($output);
    ?>