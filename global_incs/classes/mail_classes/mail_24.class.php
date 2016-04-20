<?php
/**
 * MAIL TIPO - ERROR DE SISTEMA
 */
class mail_24 extends mail
{
	protected function set_destinatario()
	{
		$email = $this->config->getParameters("framework::email::email_administrador");
		$this->AddAddress($email);
	}

	protected function get_asunto()
	{
		return 'SIMEL - '.$this->parametros->seccion.' - Error del sistema';
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('params', $this->parametros);
		return $smarty->fetch('mail/mail24.tpl');
	}
}
?>