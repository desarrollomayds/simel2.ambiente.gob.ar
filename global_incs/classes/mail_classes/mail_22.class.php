<?php
/**
 * MAIL TIPO - NUEVO MANIFIESTO SIMPLE CONCENTRADOR.
 */ 
class mail_22 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Solicitud Creación Manifiesto Simple Concentrador";
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto_id', $this->parametros->manifiesto_id);
		return $smarty->fetch('mail/mail22.tpl');
	}
}
?>