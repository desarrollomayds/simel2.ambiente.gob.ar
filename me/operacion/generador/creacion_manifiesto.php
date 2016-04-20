<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$tipo_manifiesto = isset($_REQUEST['tipo_manifiesto']) ? $_REQUEST['tipo_manifiesto'] : NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno  = $errores = array();

	$creador = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	$generador = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'][0];
	$transportista = $_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][0];
	$operador = $_SESSION['DATOS_MANIFIESTO']['OPERADORES'][0];

	$manifiesto = new manifiestos;
	$manifiesto->create($creador, $tipo_manifiesto);
	$manifiesto->setObservaciones($_POST['observaciones']);
	$manifiesto->addGenerador($generador);
	$manifiesto->addTransportista($transportista);
	$manifiesto->addOperador($operador);

	foreach ($_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] as $residuo) {
		$manifiesto->addResiduo($residuo);
	}

	if ($manifiesto->validate()) {
		$manifiesto->save();
		$errores = $manifiesto->getErrors();
	} else {
		$errores = $manifiesto->getErrors();
	}

	//actualizar_estadisticas_del_usuario();

	$retorno['estado']  = ! count($errores) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} else {

	$smarty = inicializar_smarty();

	if ( ! is_null($tipo_manifiesto)) {
		// verificamos que el user tenga los permisos adecuados para trabajar con el tipo de manifiesto
		$user_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
		$establecimiento = new establecimientos;
		$establecimiento->find($user_id);
		
		if ($establecimiento->tienePermisosTipoManifiesto($tipo_manifiesto)) {
			mostrarTemplateManifiestoSimple($smarty, $tipo_manifiesto);
		} else {
			header('Content-Type: application/json');
			echo json_encode(array("errorMsg" => $establecimiento->getMessageText("manifiesto::07300009")));
			exit(0);
		}
	}
	else {
		mostrarSeleccionManifiestoSimple($smarty);
	}
}

session_write_close();

function mostrarSeleccionManifiestoSimple($smarty)
{
	$tipo_user = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
	$nombre_perfil = obtener_tipo($tipo_user);
	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');

	$smarty->assign('NUEVOS', $cantidad1);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('TRANSPORTISTA', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('PERFIL', $nombre_perfil);
	$smarty->display('operacion/compartido/seleccion_tipo_manifiesto_simple.tpl');
}

function mostrarTemplateManifiestoSimple($smarty, $tipo_manifiesto)
{
	$_SESSION['DATOS_MANIFIESTO'] = Array(
		'INFORMACION' => Array(),
		'GENERADORES' => Array(),
		'TRANSPORTISTAS' => Array(),
		'OPERADORES' => Array(),
		'RESIDUOS' => Array(),
	);

	$establecimiento = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];

	$generador = array(
		'ID' => $establecimiento['ID'],
		'NOMBRE' => $establecimiento['NOMBRE_EMPRESA'],
		'DOMICILIO' => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
		'EXPEDIENTE' => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
		'CUIT' => $establecimiento['CUIT'],
		'CAA' => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
	);

	$_SESSION['DATOS_MANIFIESTO']['GENERADORES'][] = $generador;

	$cantidad = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty->assign('NUEVOS', $cantidad);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('GENERADOR', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('tipo_manifiesto', $tipo_manifiesto);
	$smarty->display('operacion/generador/creacion_manifiesto.tpl');
}
?>
