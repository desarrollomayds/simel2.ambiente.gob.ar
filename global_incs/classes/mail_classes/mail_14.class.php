<?php
class mail_14 extends mail
{
	protected function get_asunto()
	{
		// Asunto
		return "Aprobación Alta de Usuario";
	}

	protected function generar_cuerpo()
	{
		$establecimiento = Establecimiento::find($this->establecimiento_id);
		// Cuerpo
		$cuerpo = "<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que el registro de usuario realizado ha sido aprobado exitosamente.</p>
   				   <p>Le recordamos que su usuario de sistema es:</p>
				   <p>".$establecimiento->usuario."</p>
				   <p>A partir de este momento ya puede ingresar a SIMEL – Sistema de Manifiesto en Línea a través de la siguiente dirección: <a href='http://simel.ambiente.gob.ar'>http://simel.ambiente.gob.ar</a></p>
				   <p>Información a considerar:</p>
				   <p>Intercambio de Manifiestos: Si cuenta con manifiestos adquiridos previos al lanzamiento de SIMEL, y los mismos se encuentran en buenas condiciones y sin completar, podrá intercambiarlos por manifiestos virtuales. Si aún no se ha contactado con la Dirección de Residuos Peligrosos, le solicitamos lo haga para poder coordinar el proceso de intercambio.</p>
				   <p><small>(Si ha recibido este correo por error  rogamos tenga a bien reenviar el presente a <a href='#'>drp@ambiente.gob.ar/</a> comentando dicho error. De antemano le pedimos disculpas por cualquier molestia e inconveniente ocasionado)</small></p>";

		return $cuerpo;
	}
}

?>