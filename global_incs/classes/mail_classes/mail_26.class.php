<?php
/**
 * RECORDATORIO_RECEPCION_PENDIENTES
 */
class mail_26 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Aviso CAA Próximo a Vencimiento!";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->parametros->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail26.tpl');
	}

}

?>