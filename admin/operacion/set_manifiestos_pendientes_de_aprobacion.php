<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();
$retorno = $error = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['accion']))
{
	$manifiesto_id = (isset($_POST['manifiesto_id']) AND is_numeric($_POST['manifiesto_id'])) ? $_POST['manifiesto_id'] : NULL;

	try
	{
		$dbconn = Manifiesto::connection();
		$dbconn->transaction();
		$manifiesto = Manifiesto::find($manifiesto_id);

		if ($manifiesto) {

			if ($_POST['accion'] == 'rechazar') {
				$error = rechazarManifiesto($manifiesto);
			}
			elseif ($_POST['accion'] == 'aceptar') {
				aceptarManifiesto($manifiesto);
			}
		}
		else {
			$error = 'El manifiesto id solicitado no es v&aacute;lido.';
		}

		if ( ! $error) {
			$dbconn->commit();
		}
	}
	catch (Exception $e)
	{
		$dbconn->rollback();
		$error = $e->getMessage();
	}

	$retorno['estado']  = $error ? 'error' : 'success';
	$retorno['error'] = $error;

    echo json_encode($retorno);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$manifiesto = (isset($_GET['manifiesto_id']) and is_numeric($_GET['manifiesto_id'])) ? obtener_informacion_manifiesto($_GET['manifiesto_id']): NULL;

	if ($manifiesto)
	{
		$smarty->assign('MANIFIESTO', $manifiesto);
		$smarty->display('drp/operacion/set_manifiestos_pendientes_de_aprobacion.tpl');
	}
}

session_write_close();

function rechazarManifiesto($manifiesto)
{
	$error = null;

	if ($_POST['motivo'] != '') {
		$manifiesto->estado = 'r';
		$manifiesto->motivo_rechazo = $_POST['motivo'];
		$manifiesto->fecha_rechazo = new Datetime;
		$manifiesto->usuario_autorizacion_drp = $_SESSION['INFORMACION_USUARIO']['ID'];
		$manifiesto->save();

		// encolamos email de tipo, manifiesto concentrador aprobado:
		$params = json_encode(array('establecimiento_id' => $manifiesto->establecimiento_creador, 'manifiesto_id' => $manifiesto->id));
		$mail = new mail;
		$mail->ponerEnColaDeEnvio($manifiesto->establecimiento_creador, mail::MANIFIESTO_CONCENTADOR_RECHAZADO_POR_DRP, $params);
	} else {
		$error = 'Debe especificar un motivo de rechazo';
	}

	return $error;
}

function aceptarManifiesto($manifiesto)
{
	$manifiesto->estado_autorizacion_drp  = 1;
	$manifiesto->fecha_autorizacion_drp = new Datetime;
	$manifiesto->usuario_autorizacion_drp = $_SESSION['INFORMACION_USUARIO']['ID'];
	$manifiesto->save();

	// solo faltaba aprobacion por la DRP?
	if (obtener_participantes_pendientes($manifiesto->id) == 0) {
		// el manifiesto simple concentrador es finalizado una vez aprobado.
		$manifiesto->estado = Manifiesto::FINALIZADO;
		$manifiesto->fecha_aceptacion = new Datetime;

		#actualizar numero de protocolo de manifiesto
		$ultimo_protocolo = Manifiesto::find_by_sql('SELECT id_protocolo_manifiesto FROM manifiestos WHERE id_protocolo_manifiesto <> 0 ORDER BY id_protocolo_manifiesto DESC LIMIT 1 FOR UPDATE');

		if ( ! isset($ultimo_protocolo[0])) {
			$config = new config;
			$primer_numero_protocolo = $config->getParameters("framework::manifiestos::protocolo_inicial");
		}

		$proximo_id = $ultimo_protocolo[0]->id_protocolo_manifiesto + 1;
		$manifiesto->id_protocolo_manifiesto = $proximo_id;
		$manifiesto->save();

		// generamos documento manifiesto
		$documento_manifiesto = new documentos_manifiestos;
		$documento_manifiesto->generate($manifiesto, DocumentoManifiesto::MANIFIESTO);

		$form = new formularios;
		$form->finalizarFormularioPorManifiestoId($manifiesto->id);
	}

	// encolamos email de tipo, manifiesto concentrador aprobado:
	$params = json_encode(array('establecimiento_id' => $manifiesto->establecimiento_creador, 'manifiesto_id' => $manifiesto->id));
	$mail = new mail;
	$mail->ponerEnColaDeEnvio($manifiesto->establecimiento_creador, mail::MANIFIESTO_CONCENTADOR_APROBADO_POR_DRP, $params);
}

?>
