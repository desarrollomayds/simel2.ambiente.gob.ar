<?

require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty = inicializar_smarty();
$errores = Array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    error_reporting(E_ALL);
    $retorno = array();
    $errores = array();
    $vehiculo = array();

    if (empty($_POST['accion'])) {
        exit;
    }


    if ($_POST['accion'] == 'baja') {

        $residuos_manifiesto_id = $_POST['id'];

        $residuosProcesados = ResiduosTransportados::find('first', array('conditions' => array('id = ?', $residuos_manifiesto_id)));
        $residuosProcesados->delete();



        echo json_encode('OK');

        exit;
    }


    $post_valido = true;

    try {
        $id_vehiculo = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $fecha = $_POST['fecha'];
        $id_residuo = $_POST['id_residuo'];
        $id_manifiesto = $_SESSION['DATOS_MANIFIESTO']['ID'];
        $fecha = time();
        $mysql_datetime = strftime('%Y-%m-%d %H:%M:%S', $fecha);

        $conexion = ResiduosTransportados::connection();
        $conexion->transaction();

        $residuosProcesados = ResiduosTransportados::create(Array(
                    'id_vehiculo' => $id_vehiculo,
                    'id_manifiesto' => $id_manifiesto,
                    'id_residuo_manifiesto' => $id_residuo,
                    'cantidad' => $cantidad,
                    'fecha_traslado' => $mysql_datetime,
        ));

        $id = NULL;

        if ($residuosProcesados->save()) {

            $id = $residuosProcesados->id;
        }


        $conexion->commit();

        $error = null;
    } catch (\Exception $e) {
        $conexion->rollback();
        $error = $e->getMessage();
    }

    if (is_null($error)) {
        echo json_encode($id);
    } else {
        echo json_encode($id);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $vehiculo = obtener_vehiculo($id);
    $id_manifiesto = $_SESSION['DATOS_MANIFIESTO']['ID'];




    //$traslados = obtener_vehiculos_traslados($id_manifiesto);
    $traslados = obtener_vehiculos_traslados($id_manifiesto, $id);

    $manifiesto = $_SESSION['DATOS_MANIFIESTO'];

    $cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
    $smarty->assign('NUEVOS', $cantidad1);

    $smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
    $smarty->assign('TRANSPORTISTAS', $manifiesto['TRANSPORTISTAS']);
    $smarty->assign('OPERADORES', $manifiesto['OPERADORES']);
    $smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);

    $smarty->assign('MANIFIESTO', $manifiesto);
    $smarty->assign('TRASLADOS', $traslados);

    $smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
    $smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);

    $smarty->assign('VEHICULO', $vehiculo);

    $smarty->display('operacion/transportista/residuos_transportados.tpl');
}

session_write_close();
?>
