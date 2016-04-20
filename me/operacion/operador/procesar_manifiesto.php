<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno = $errores  = array();

	$manifiesto_id = $_POST['id'];
	$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto_id)));

	if ($manifiesto) {
		try
		{
			$conexion = Manifiesto::connection();
			$conexion->transaction();
			$manifiesto->estado = Manifiesto::FINALIZADO;
			$manifiesto->fecha_tratamiento = new Datetime;
			$manifiesto->save();
			// genero el certificado de tratamiento
			$documento_manifiesto = new documentos_manifiestos;
			$documento_manifiesto->generate($manifiesto, DocumentoManifiesto::CERTIFICADO_TRATAMIENTO);
			// grabo row para envio de email
			generar_emails_tratamiento_manifiesto($manifiesto);

			$conexion->commit();
		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$smarty  = inicializar_smarty();
	$manifiesto = obtener_informacion_manifiesto($_GET['id']);

	if (isset($_GET['action']) AND $_GET['action'] == 'obtener_tratamientos') {
		$operador_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
		$codigo_residuo = $_GET['residuo_codigo'];

		$model = new TratamientoResiduo;
		$tratamientos = $model->getByOperadorId($operador_id, $codigo_residuo);

		$smarty->assign('TRATAMIENTOS', $tratamientos);
		$smarty->assign('RESIDUO_RELACION_ID', $_GET['residuo_relacion_id']);
		$smarty->assign('ACCION', 'obtener_tratamientos');
	} else {
		$cantidad = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
		$smarty->assign('NUEVOS', $cantidad);
		$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTA', $manifiesto['TRANSPORTISTAS'][0]);
		$smarty->assign('OPERADOR', $manifiesto['OPERADORES'][0]);
		$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
		$smarty->assign('MANIFIESTO', $manifiesto);
		$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
		$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
		$smarty->assign('TRATAMIENTOS', $tratamientos);
		$smarty->assign('ACCION', null);
	}

	$smarty->display('operacion/operador/procesar_manifiesto.tpl');
}

session_write_close();

/**
 * Este email notifica que el manif fue tratado y finalizado. Es solo para GENERADORES, ya que se adjunta una copia del certificado.
 */
function generar_emails_tratamiento_manifiesto($manifiesto)
{
	foreach ($manifiesto->generadores_manifiesto as $gen)
	{
		$params = array(
			'manifiesto_id' => $manifiesto->id,
			'protocolo_id' => $manifiesto->id_protocolo_manifiesto,
			'fecha_tratamiento' => $manifiesto->fecha_tratamiento->format('Ymd'),
		);
		$mail = new mail;
		$mail->ponerEnColaDeEnvio($gen->establecimiento_id, mail::TRATAMIENTO_MANIFIESTO, $params);
	}
}

?>
