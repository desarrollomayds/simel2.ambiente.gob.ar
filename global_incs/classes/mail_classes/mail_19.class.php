<?php
/**
 * MAIL TIPO - ALTA DEFINITIVA.
 */ 
class mail_19 extends mail
{
	protected function get_asunto()
	{
		return 'SIMEL - Aviso Generación de usuario!';
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		$smarty->assign('establecimiento', Establecimiento::find($this->parametros->establecimiento_id));
		$smarty->assign('hash', $this->obtener_hash());
		$smarty->assign('data', $this->parametros);
		return $smarty->fetch('mail/mail19.tpl');
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