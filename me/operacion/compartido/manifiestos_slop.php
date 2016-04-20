<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$tipo_slop = isset($_REQUEST['tipo_slop']) ? $_REQUEST['tipo_slop'] : NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno  = $errores = array();

	if ($tipo_slop == 'slop') {
		$manifiesto = generarManifiestoSlopPadre();
	} elseif ($tipo_slop == 'relacionado') {
		$manifiesto = generarManifiestoSlopHijo();
	}

	if ($manifiesto->validate()) {
		$manifiesto->save();
	}

	$errores = $manifiesto->getErrors();

	//actualizar_estadisticas_del_usuario();
	
	$retorno['estado']  = ! count($errores) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	// verificamos que el user tenga los permisos adecuados para trabajar con manifiestos SLOP
	$user_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
	$establecimiento = new establecimientos;
	$establecimiento->find($user_id);

	if ( ! $establecimiento->tienePermisosTipoManifiesto(TipoManifiesto::SLOP)) {
		header('Content-Type: application/json');
		echo json_encode(array("errorMsg" => $establecimiento->getMessageText("manifiesto::07300009")));
		exit(0);
	}

	$smarty = prepareSmarty();

	if ($tipo_slop)
	{
		if ($tipo_slop == 'slop')
		{
			$smarty->display('operacion/compartido/form_manifiesto_slop_padre.tpl');
		}
		elseif ($tipo_slop == 'relacionado')
		{
			if ($_GET['action'] == 'create')
			{
				$manifiesto_padre = array();
				if (is_numeric($_GET['protocolo_id'])) {
					$model = new Manifiesto;
					$manifiesto_padre = $model->obtenerManifiestoBarcazaPorProtocolo($_GET['protocolo_id']);
				}

				if ($manifiesto_padre) {
					$tipo_user = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
					$nombre_perfil = obtener_tipo($tipo_user);
					$smarty->assign('PERFIL', $nombre_perfil);
					$smarty->assign('MANIFIESTO', $manifiesto_padre);
					//var_dump($manifiesto_padre['RESIDUOS']);die;
					$smarty->assign('TRANSPORTISTA', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
					$smarty->display('operacion/compartido/form_manifiesto_slop_hijo.tpl');
				} else {
					header('Content-Type: application/json');
					echo json_encode(array("errorMsg" => "No se ha encontrado un manifiesto SLOP Cabecera en estado aprobado con el protocolo indicado."));
					exit(0);
				}
			}
			else
			{
				$manifiesto = new Manifiesto;
				$manifiestos_en_los_que_participo = $manifiesto->obtenerSlopsBarcazaDondeParticipo($user_id);
				$smarty->assign('manifiestos_en_los_que_participo', $manifiestos_en_los_que_participo);
				$smarty->display('operacion/compartido/elegir_manifiesto_slop_hijo.tpl');
			}
		}
	}
	else
	{
		$smarty->display('operacion/compartido/seleccion_tipo_manifiesto_slop.tpl');
	}
}

session_write_close();

function generarManifiestoSlopPadre()
{
	$creador = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	$buque = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'][0];
	$transportista = $_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][0];
	$operador = $_SESSION['DATOS_MANIFIESTO']['OPERADORES'][0];
	$residuo = $_SESSION['DATOS_MANIFIESTO']['RESIDUOS'][0];
	$vehiculo = $_SESSION['DATOS_MANIFIESTO']['VEHICULOS'][0];

	$manifiesto = new manifiestos;
	$manifiesto->create($creador, TipoManifiesto::SLOP);
	$manifiesto->setObservaciones($_POST['observaciones']);
	$manifiesto->addGenerador($buque);
	$manifiesto->addTransportista($transportista);
	$manifiesto->addOperador($operador);
	$manifiesto->addResiduo($residuo);

	if ($creador['TIPO'] == Establecimiento::TRANSPORTISTA) {
		$manifiesto->addVehiculo($vehiculo);
	}

	return $manifiesto;
}

function generarManifiestoSlopHijo()
{
	$creador = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	$manifiesto_padre = obtener_informacion_manifiesto($_POST['manifiesto_padre']);
	// hereda el buque y operador del manifiesto padre.
	$buque = $manifiesto_padre['GENERADORES'][0];
	$operador = $manifiesto_padre['OPERADORES'][0];
	// el transportista y vehiculo pueden variar al padre. corresponden al usuario transportista que esta creando el manifiesto hijo.
	$transportista = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	$vehiculo = $_SESSION['DATOS_MANIFIESTO']['VEHICULOS'][0];
	// el residuo no varia al del padre, pero se indica la cantidad estimada que va a transportar el vehiculo.
	$residuo = array('ID' => 1,
		'CONTENEDOR' => '1A1',
		'CANTIDAD_CONTENEDORES' => $_POST['cant_contenedores'],
		'RESIDUO' => 'Y9',
		'CANTIDAD_ESTIMADA' => $_POST['cant_estimada'],
		'ESTADO' => 2,
		'ESTADO_' => '2'
	);

	$manifiesto = new manifiestos;
	$manifiesto->create($creador, TipoManifiesto::SLOP);
	$manifiesto->setObservaciones($_POST['observaciones']);
	$manifiesto->setManifiestoPadre($manifiesto_padre);
	$manifiesto->addGenerador($buque);
	$manifiesto->addTransportista($transportista);
	$manifiesto->addOperador($operador);
	$manifiesto->addVehiculo($vehiculo);
	$manifiesto->addResiduo($residuo);
	// marcamos el flag para generar el documento en esta etapa. solo usado en este caso: manif slop relacionados
	$manifiesto->generarDocumentoManifiesto(true);

	return $manifiesto;
}

function prepareSmarty()
{
	$smarty = inicializar_smarty();
	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$tipo_user = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
	$nombre_perfil = obtener_tipo($tipo_user);
		
	$_SESSION['DATOS_MANIFIESTO'] = array(
		'INFORMACION' => array(),
		'GENERADORES' => array(),
		'TRANSPORTISTAS' => array(),
		'VEHICULOS' => array(),
		'OPERADORES' => array(),
		'RESIDUOS' => array(),
	);

	$establecimiento = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];
	// marcamos el establecimiento como el seleccionado
	if ($nombre_perfil == 'transportista') {
		$_SESSION['DATOS_MANIFIESTO']['TRANSPORTISTAS'][] = $establecimiento;
	} elseif ($nombre_perfil == 'operador') {
		$_SESSION['DATOS_MANIFIESTO']['OPERADORES'][] = $establecimiento;
	}

	$smarty->assign('NUEVOS', $cantidad1);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('PERFIL', $nombre_perfil);

	return $smarty;
}

?>
