<?php
/**
 * MAIL TIPO - APROBACION MANIFIESTO IND
 */ 
class mail_3 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Aviso Manifiesto Aprobado por todas sus partes";
	}

	protected function generar_cuerpo()
	{
		$manifiesto = Manifiesto::find('first', array('conditions' => array('id_protocolo_manifiesto = ? ', $this->parametros->id_protocolo_manifiesto)));
		$manifiesto = obtener_informacion_manifiesto($manifiesto->id);

		$smarty = inicializar_smarty();
		$smarty->assign('GENERADORES',     $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTAS',  $manifiesto['TRANSPORTISTAS']);
		$smarty->assign('OPERADORES',      $manifiesto['OPERADORES']);
		$smarty->assign('RESIDUOS',        $manifiesto['RESIDUOS']);
		$smarty->assign('MANIFIESTO',      $manifiesto);

		return $smarty->fetch('mail/mail3.tpl');
	}
}
?>