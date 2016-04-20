<?php
/**
 * MAIL TIPO - MODIFICACIÓN Y CAMBIOS DE DATOS.
 */ 
class mail_23 extends mail
{
	protected function get_asunto()
	{
		return "SIMEL - Solicitud Modificación de Datos";
	}

	protected function generar_cuerpo()
	{
		$smarty = inicializar_smarty();
		return $smarty->fetch('mail/mail23.tpl');
	}
}
?>