<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno = $errores  = array();

	$manifiesto_id = $_POST['id'];
	$residuos = $_POST['residuos'];
	$residuos_cantidades_reales = $_POST['residuos_cantidades_reales'];

	if (!count($errores)) {

		$conexion = Manifiesto::connection();
		$conexion->transaction();

		try
		{
			foreach ($residuos as $key => $id_relacion_residuo) {
				//var_dump($key,$id_relacion_residuo, $residuos_cantidades_reales[$key]);
				$residuo = ResiduoManifiesto::find('first', array('conditions' => array('id = ? and manifiesto_id = ?', $id_relacion_residuo, $manifiesto_id)));

				if ($residuo) {
					$residuo->cantidad_real = $residuos_cantidades_reales[$key];
					$residuo->save();
				} else {
					throw new Exception('No se pudo encontrar el manifiesto del residuo');
				}
			}

			$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto_id)));

			// los manifiestos SLOP que tienen otros slop vinculados son directamente marcados como FINALIZADOS.
			if ($manifiesto->tipo_manifiesto == TipoManifiesto::SLOP AND Manifiesto::obtener_manifiestos_relacionados($manifiesto_id)) {
				$manifiesto->estado = Manifiesto::FINALIZADO;
			} else {
				$manifiesto->estado = Manifiesto::RECIBIDO;
			}

			$manifiesto->fecha_recepcion = new Datetime;
			$manifiesto->save();

			// reescribimos el documento manifiesto para agregar la Cantidad REAL.
			$documento_manifiesto = new documentos_manifiestos;
			$documento_manifiesto->generate($manifiesto, DocumentoManifiesto::MANIFIESTO);

			// la constancia de recepcion y su envio por email se realiza siempre y cuando se haya recibido (en el caso de un slop cabecera, seria finalizado)
			if ($manifiesto->estado == Manifiesto::RECIBIDO) {
				$documento_manifiesto->generate($manifiesto, DocumentoManifiesto::CONSTANCIA_RECEPCION);
				// grabo row para envio de email
				generar_email_recepcion_manifiesto($manifiesto);
			}

			$conexion->commit();
			//actualizar_estadisticas_del_usuario();

		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$manifiesto = obtener_informacion_manifiesto($_GET['id']);

	// Si SLOP Cabecera verifico si ya fueron recibidos y tratados sus hijos.
	if (esManifiestoSlopCabecera($manifiesto))
	{
		$manif_relacionados = Manifiesto::obtener_manifiestos_relacionados($manifiesto['ID']);

		foreach($manif_relacionados as $hijo) {
			// De no ser asi, devuelvo sus hijos para que los opere.
			if ($hijo->estado != 'Finalizado') {
				$response = getResponseHijosParaProcesar($manif_relacionados);
				echo $response;
				exit(0);
			}
		}

		if (empty($manif_relacionados)) {
			$response['estado'] = 'slop_barcaza_sin_relacionados';
			$response['html'] = 'No puede finalizar el manifiesto cabecera ya que a&uacute;n no le han sido asignado hijos.';
			echo json_encode($response);
			exit(0);
		}
	}

	$smarty  = inicializar_smarty();

	$cantidad = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty->assign('NUEVOS', $cantidad);
	$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
	$smarty->assign('TRANSPORTISTA', $manifiesto['TRANSPORTISTAS'][0]);
	$smarty->assign('OPERADOR', $manifiesto['OPERADORES'][0]);
	$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
	$smarty->assign('MANIFIESTO', $manifiesto);
	$smarty->assign('MANIFIESTOS_RELACIONADOS', $manif_relacionados);
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('ACCION', null);
	$html = $smarty->fetch('operacion/operador/recibir_manifiesto.tpl');
	
	$response['estado'] = 'listo_para_recibir';
	$response['html'] = utf8_encode($html);
	echo json_encode($response);
}

session_write_close();

function esManifiestoSlopCabecera($manifiesto)
{
	$slop = $manifiesto['TIPO_MANIFIESTO'] == TipoManifiesto::SLOP;
	$no_relacionado = is_null($manifiesto['MANIFIESTO_PADRE']);
	$usa_barcaza = $manifiesto['TRANSPORTISTAS'][0]['VEHICULOS'][0]['TIPO_VEHICULO'] == 'BA';

	return ($slop AND $no_relacionado AND $usa_barcaza);
}

function getResponseHijosParaProcesar($manif_relacionados)
{
	$response = array();
	$html = '';

	foreach ($manif_relacionados as $hijo) {
		$html .= '
			<tr class="tr_manifiesto_relacionado_al_'.$hijo->manifiesto_padre.'" style="background-color:gainsboro;font-size:12px;">
				<td id="id">'.formatear_id_protocolo_manifiesto($hijo->id_protocolo_manifiesto).'</td>
				<td class="td">'.$hijo->nombre_empresa.'</td>
				<td class="td">'.$hijo->nombre_establecimiento.'</td>
				<td class="td" style="font-weight:bold;">'.$hijo->estado.'</td>
				<td width="25" align="center" class="td">';
				
		if ($hijo->estado == 'Aprobado'){
			$html .= '<a class="hand" style="color:black;" manifiesto-id="'.$hijo->id.'" onclick="recibirManifiesto($(this));">Recibir</a>';
		} elseif ($hijo->estado == 'Recibido') {
			$html .= '<a class="hand" style="color:black;" manifiesto-id="'.$hijo->id.'" onclick="procesarManifiesto('.$hijo->id.');" data-toggle="modal" data-target="#mel_popup">Tratar</a>';
		} else {
			$html .= '&nbsp;';
		}

		$html .= '
				</td>
				<td class="td">
					<a class="hand" href="imprimir_manifiesto.php?id='.$hijo->id.'">
						<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
					</a>
				</td>
			</tr>';
	}

	$response['estado'] = 'hijos_no_finalizados';
	$response['html'] = $html;

	return json_encode($response);
}

function generar_email_recepcion_manifiesto($manifiesto)
{
	foreach ($manifiesto->generadores_manifiesto as $gen)
	{
		$params = array(
			'manifiesto_id' => $manifiesto->id,
			'protocolo_id' => $manifiesto->id_protocolo_manifiesto,
			'fecha_recepcion' => $manifiesto->fecha_recepcion->format('Ymd'),
		);
		$mail = new mail;
		$mail->ponerEnColaDeEnvio($gen->establecimiento_id, mail::RECEPCION_MANIFIESTO, $params);
	}
}

?>
