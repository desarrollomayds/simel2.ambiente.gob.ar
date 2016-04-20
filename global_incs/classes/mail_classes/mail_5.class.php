<?php
/**
 * MAIL TIPO - CONSTANCIA RECEPCION.
 */ 
class mail_5 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Constancia de Recepción RP";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->params->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail5.tpl');
	}

	protected function get_attachments()
	{
		$doc_path = $this->config->getParameters("framework::documentos::path_manifiestos");
		$complete_path = $doc_path.$this->parametros->protocolo_id.'/';
		$filename = $this->parametros->manifiesto_id.'_'.DocumentoManifiesto::CONSTANCIA_RECEPCION.'_'.$this->parametros->fecha_recepcion.'.pdf';

		return array(array('path' => $complete_path, 'filename' => $filename));
	}
}
?>