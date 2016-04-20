<?php
/**
 * MANIFIESTO_VENCIDO_NO_APROBADO
 */
class mail_16 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Manifiesto Vencido - No aprobado";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find($this->parametros->manifiesto_id);
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto', $manifiesto);
		return $smarty->fetch('mail/mail16.tpl');
	}

}

?>