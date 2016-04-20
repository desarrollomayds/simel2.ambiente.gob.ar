<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

$smarty = inicializar_smarty();

$query = "SELECT * FROM cambios_establecimientos_bkp GROUP BY empresa_id, establecimiento_id ORDER BY id DESC";
$establecimientos = CambioEstablecimiento::find_by_sql($query);

// Array que va a contener toda la información
$solicitudes = array();
$i = 1;

foreach ($establecimientos as $est) {

    //$solicitud = CambioSolicitadoEstablecimiento::create(array('empresa_id' => $est->empresa_id, 'establecimiento_id' => $est->establecimiento_id));

    $data_est = array(
        'solicitud_id' => $solicitud->id,
        'tipo_cambio' => tipo_cambio($est->)
    );

    echo "INSERT INTO cambios_solicitados_establecimientos ('empresa_id', 'establecimiento_id') VALUES ($i, $est->empresa_id, $est->establecimiento_id)";
    echo "<br>";
}

var_dump($solicitudes);