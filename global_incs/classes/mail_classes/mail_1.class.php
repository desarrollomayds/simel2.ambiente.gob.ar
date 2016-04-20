<?php
class mail_1 extends mail
{
	protected function get_asunto()
	{
		return "Registro de Usuario Nuevo";
	}

	protected function generar_cuerpo()
	{
		$establecimiento = Establecimiento::find($this->establecimiento_id);

		$cuerpo = "<p>Bienvenido a SIMEL, el nuevo Sistema de Manifiestos en Línea de la Secretaría de Ambiente y Desarrollo Sustentable de la Nación.</p>
				 <p>Se ha realizado el registro de un nuevo establecimiento utilizando esta dirección de correo electrónico. La solicitud se encuentra en proceso de análisis y aprobación por parte de la Dirección de Residuos Peligrosos.</p>
				 <p>Será notificado por este mismo medio respecto el resultado del análisis y aprobación. </p>
				 <p>Su usuario de sistema es:</p>
				 <p><b>".$establecimiento->usuario."</b></p>
				 <p>Recuerde que no podrá ingresar al sistema hasta recibir notificación por parte de la Dirección de Residuos Peligrosos.</p>
				 <p>Información a considerar:</p>
				 <p>Intercambio de Manifiestos: Si cuenta con manifiestos adquiridos previos al lanzamiento de SIMEL, y los mismos se encuentran en buenas condiciones y sin completar, podrá intercambiarlos por manifiestos virtuales. Solicitamos se ponga en contacto con nosotros para poder coordinar el proceso de intercambio.</p>
				 <p>Mejorar el sistema: Necesitamos su opinión para poder seguir mejorando el sistema. Por favor cualquier duda, comentario o sugerencia, no dude en hacérnoslo llegar a <a href='#'>drp@ambiente.gob.ar</a>. Todos los aportes para la mejora y desarrollo del sistema son bienvenidos.</p>
				 <p><small>(Si ha recibido este correo por error  rogamos tenga a bien reenviar el presente a <a href='#'>drp@ambiente.gob.ar/</a> comentando dicho error. De antemano le pedimos disculpas por cualquier molestia e inconveniente ocasionado)</small></p>";

		return $cuerpo;
	}

}

?>