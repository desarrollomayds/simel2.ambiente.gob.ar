<?php
/**
 * MAIL TIPO - ALTA TEMPRANA.
 */ 
class mail_11 extends mail
{
	// @override
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
		return 'SIMEL – Aviso Generación Alta Temprana!';
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('establecimiento', Establecimiento::find($this->parametros->establecimiento_id));
		$smarty->assign('hash', $this->obtener_hash());
		return $smarty->fetch('mail/mail11.tpl');
	}

	protected function obtener_hash()
	{
		// Conexión
		$establecimientos_hash = EstablecimientoHash::Connection();
		// Se busca el hash del establecimiento
		$res = EstablecimientoHash::find('first', array('conditions' => array('establecimiento_id=? AND estado_hash=?',$this->parametros->establecimiento_id, 'A')));
		return $res ? $res->hash : false;
	}
}
?>