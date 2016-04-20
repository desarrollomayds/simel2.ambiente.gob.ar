<?php
/**
 * MAIL TIPO - TRATAMIENTO MANIFIESTO.
 */ 
class mail_6 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Certificado de Tratamiento/Disposición";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->parametros->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail6.tpl');
	}

	protected function get_attachments()
	{
		$doc_path = $this->config->getParameters("framework::documentos::path_manifiestos");
		$complete_path = $doc_path.$this->parametros->protocolo_id.'/';
		$filename = $this->parametros->manifiesto_id.'_'.DocumentoManifiesto::CERTIFICADO_TRATAMIENTO.'_'.$this->parametros->fecha_tratamiento.'.pdf';

		return array(array('path' => $complete_path, 'filename' => $filename));
	}
}
?>