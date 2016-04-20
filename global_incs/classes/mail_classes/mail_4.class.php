<?php
/**
 * MAIL TIPO - RECHAZO MANIFIESTO IND
 */ 
class mail_4 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Aviso Manifiesto Rechazado";
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();

		$actor = Manifiesto::find($this->parametros->manifiesto_id)->rechazado_por;

		$establecimiento_actor = Establecimiento::find($actor)->nombre;

		$smarty->assign("ACTOR", $establecimiento_actor);
		$smarty->assign("MANIFIESTO_ID", $this->parametros->manifiesto_id);
		
		return $smarty->fetch('mail/mail3.tpl');
	}
}
?>