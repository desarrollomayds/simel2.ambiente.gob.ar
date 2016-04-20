<?php
/**
 * MANIFIESTO_VENCIDO_NO_RECIBIDO
 */
class mail_17 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Manifiesto Vencido - No recibido";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->parametros->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail17.tpl');
	}

}

?>