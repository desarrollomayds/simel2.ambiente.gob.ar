<?php
/**
 * MAIL TIPO - NUEVO MANIFIESTO.
 */ 
class mail_2 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Aviso Nuevo Manifiesto";
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('manifiesto_id', $this->parametros->manifiesto_id);
		$smarty->assign('rol', $this->parametros->rol);

		return $smarty->fetch('mail/mail2.tpl');
	}
}
?>