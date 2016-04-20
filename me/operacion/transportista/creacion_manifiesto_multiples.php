<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$smarty  = inicializar_smarty();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno  = $errores = array();

	$creador = $tipo_user = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	$generadores = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'] ? $_SESSION['DATOS_MANIFIESTO']['GENERADORES'] : array();
	$generadores = addCantidadResiduoEstimada($generadores);
	$transportista = $_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][0];
	$operador = $_SESSION['DATOS_MANIFIESTO']['OPERADORES'][0];

	$manifiesto = new manifiestos;
	$manifiesto->create($creador, TipoManifiesto::MULTIPLE);
	$manifiesto->setObservaciones($_POST['observaciones']);

	foreach ($generadores as $generador) {
		$manifiesto->addGenerador($generador);
	}

	$manifiesto->addTransportista($transportista);
	$manifiesto->addOperador($operador);

	foreach ($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $vehiculo) {
		$manifiesto->addVehiculo($vehiculo);
	}

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

	$_SESSION['DATOS_MANIFIESTO'] = Array(
		'INFORMACION'    => Array(),
		'GENERADORES'    => Array(),
		'VEHICULOS'      => Array(),
		'OPERADORES'     => Array(),
		'RESIDUOS'       => Array(),
	);

	$establecimiento = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];

	$transportista = array(
		'ID' => $establecimiento['ID'],
		'NOMBRE' => $establecimiento['NOMBRE_EMPRESA'],
		'DOMICILIO' => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
		'EXPEDIENTE' => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
		'CUIT' => $establecimiento['CUIT'],
		'CAA' => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
	);

	$_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][] = $transportista;
	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty->assign('NUEVOS',         $cantidad1);
	$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS',         $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS',    $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('TRANSPORTISTA',   $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('tipo_manifiesto', TipoManifiesto::MULTIPLE);
	$smarty->display('operacion/transportista/creacion_manifiesto_multiples.tpl');
}

session_write_close();

function addCantidadResiduoEstimada($generadores)
{
	if (isset($_POST['cant_estimada_por_generador'])) {
		foreach($generadores as $key => &$g) {
			$g['CANT_RESIDUO'] = $_POST['cant_estimada_por_generador'][$key];
		}
	}

	return $generadores;
}

?>
