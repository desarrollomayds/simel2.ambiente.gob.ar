<?php
class mail_9 extends mail
{
	protected function get_asunto()
	{
		return "Reestablecimiento de su contraseña";
	}

	protected function generar_cuerpo()
	{	
		$hash = $this->obtener_hash();

		$cuerpo = "<p>Sistema de Manifiestos en Línea (MEL).</p>
					<p>Se ha solicitado un reestablecimiento de contraseña para el establecimiento registrado bajo esta dirección de correo electrónico</p>
					<p>Para proceder con el formulario ingrese al siguiente enlace para <a href='".mel::getBaseMelPath()."/login/restablecer/index.php?v=".$hash."'>continuar con el reestablecimiento de su contraseña</a>
					<p>Si usted no realizó la solicitud de cambio de contraseña, ignore este mail.</p>";

		return $cuerpo;
	}

	protected function obtener_hash()
	{	
		// Conexión
		$establecimientos_hash = EstablecimientoHash::Connection();

		// Se busca el hash del establecimiento
		$res = EstablecimientoHash::find('first', array('conditions' => array('establecimiento_id=? AND estado_hash=?',$this->establecimiento_id, 'A')));
		return $res ? $res->hash : false;
	}

}

?>