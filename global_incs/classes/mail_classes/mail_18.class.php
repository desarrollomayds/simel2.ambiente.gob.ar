<?php
class mail_18 extends mail
{
	protected function get_asunto()
	{
		return "Email de contacto";
	}

	protected function set_destinatario()
	{
		$environment = $this->config->getParameters("framework::environment::name");

		if ($environment != 'development') {
			$email = "drp@ambiente.gob.ar";
		} else {
			$email = $this->config->getParameters("framework::email::development_email_to");
		}

		$this->AddAddress($email);
	}

	protected function generar_cuerpo()
	{
		$data = $this->parametros;
		// Cuerpo
		$cuerpo = "<STYLE TYPE='text/css'>#tabla{font-family:helvetica neue,helvetica,arial,sans-serif;line-height:15px;font-size:13px;text-align:left;}</STYLE>
		<table id='tabla' border='0' cellpadding='3' cellspacing='0' align='center'>
		<tr><td>Email de contacto</td></tr></table>
		<table id='tabla' border='0' cellpadding='3' cellspacing='0'>
		<tr><td width='90'>CUIT: </td><td>".$data->cuit."</td></tr>
		<tr><td width='90'>Raz&oacute;n social: </td><td>".$data->razon."</td></tr>
		<tr><td width='90'>Nombre: </td><td>".$data->nombre."</td></tr>
		<tr><td>Apellido: </td><td>".$data->apellido."</td></tr>
		<tr><td>Email: </td><td>".$data->email."</td></tr></table>
		<table id='tabla' border='0' cellpadding='3' cellspacing='0'>
		<tr><td>Comentarios: </td></tr>
		<tr><td>".$data->comentarios."</td></tr>
		</table>";

		return $cuerpo;
	}

}

?>