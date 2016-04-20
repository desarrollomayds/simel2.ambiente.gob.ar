<?php
/**
 * PRIMER RECORDATORIO_RECEPCION_PENDIENTES
 */
class mail_25 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Manifiesto - Primer recordatorio de recepción pendiente";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->parametros->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail25.tpl');
	}

}

?>