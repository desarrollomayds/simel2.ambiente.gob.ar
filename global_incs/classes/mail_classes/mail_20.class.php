<?php
/**
 * MAIL TIPO - MANIFIESTO_CONCENTADOR_APROBADO_POR_DRP.
 */ 
class mail_20 extends mail
{
	protected function set_destinatario()
	{
		$environment = $this->config->getParameters("framework::environment::name");

		if ($environment != 'development') {
			$establecimiento = Establecimiento::find($this->parametros->establecimiento_id);
			$email = trim($establecimiento->email);
		} else {
			$email = $this->config->getParameters("framework::email::development_email_to");
		}

		$this->AddAddress($email);
	}

	protected function get_asunto()
	{
		return 'SIMEL - Aprobación Manifiesto Simple Concentrador';
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('data', $this->parametros);
		return $smarty->fetch('mail/mail20.tpl');
	}
}
?>