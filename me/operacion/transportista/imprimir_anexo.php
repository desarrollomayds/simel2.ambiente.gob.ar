<?

require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

redirigir_a_seccion($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'], SECCION_TRANSPORTISTA);

$manifiesto = obtener_informacion_manifiesto($_GET['id']);
foreach ($array as $key => $value) {
    
}
//$traslado_residuos = obtener_vehiculos_traslados($_GET['id']);
//var_dump($traslado_residuos);
$traslado_residuos = obtener_vehiculos_traslados_mani($_GET['id']);
//var_dump($traslado_residuos);echo "hello";
$smarty = inicializar_smarty();


$vehiculos = Array();
foreach ($manifiesto['TRANSPORTISTAS'] as $transportista) {
    if ($transportista['ID'] == $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']) {
        $vehiculos = $transportista['VEHICULOS'];
        break;
    }
}

$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
$smarty->assign('NUEVOS', $cantidad1);

$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
$smarty->assign('TRANSPORTISTAS', $manifiesto['TRANSPORTISTAS']);
$smarty->assign('OPERADORES', $manifiesto['OPERADORES']);
$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
$smarty->assign('MANIFIESTO', $manifiesto);
$smarty->assign('TRASLADO', $traslado_residuos);
$smarty->assign('VEHICULOS', $vehiculos);
$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);

$smarty->display('operacion/transportista/imprimir_anexo.tpl');

session_write_close();
?>
