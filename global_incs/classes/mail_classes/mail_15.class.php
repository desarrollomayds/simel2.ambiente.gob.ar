<?php

class mail_15 extends mail
{
	protected function get_asunto()
	{
		return "Alta de Usuario Observada";

		return $asunto;
	}

	protected function generar_cuerpo()
	{	
		$cuerpo = "<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que el registro de usuario realizado no ha podido ser aprobado.</p>
				   <p>Le rogamos se ponga en contacto con nosotros para poder informarlo acerca de los motivos por los cuales su usuario no ha sido aprobado.</p>
				   <p>Le pedimos una disculpa por las molestias e inconveniente ocasionados, esperando alcanzar resolución favorable a la brevedad.</p>
				   <p><small>(Si ha recibido este correo por error  rogamos tenga a bien reenviar el presente a <a href='#'>drp@ambiente.gob.ar/</a> comentando dicho error. De antemano le pedimos disculpas por cualquier molestia e inconveniente ocasionado)</small></p>";

		return $cuerpo;
	}

}

?>