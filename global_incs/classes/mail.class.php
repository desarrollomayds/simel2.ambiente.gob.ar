<?php
require_once(__DIR__."/../librerias/phpmailer/PHPMailerAutoload.php");

/**
 * Clase mail
 *
 * Clase de control de envios de email
 *
 * @package
 * @author wilson, fedestev
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class mail extends PHPMailer
{
	const NUEVO_MANIFIESTO = 2;
	const MANIFIESTO_APROBADO = 3;
	const MANIFIESTO_RECHAZADO = 4;
	const RECEPCION_MANIFIESTO = 5;
	const TRATAMIENTO_MANIFIESTO = 6;
	const ALTA_TEMPRANA = 11;
	const MANIFIESTO_VENCIDO_NO_APROBADO = 16;
	const MANIFIESTO_VENCIDO_NO_RECIBIDO = 17;
	const CONTACTO = 18;
	const MANIFIESTO_CONCENTADOR_APROBADO_POR_DRP = 20;
	const MANIFIESTO_CONCENTADOR_RECHAZADO_POR_DRP = 21;
	const NUEVO_MANIFIESTO_SIMPLE_CONCENTRADOR = 22;
	const MODIFICACION_Y_CAMBIO_DE_DATOS = 23;
	const ERROR_A_SISTEMAS = 24;
	const PRIMER_RECORDATORIO_RECEPCION_PENDIENTES = 25;
	const RECORDATORIO_VENCIMIENTO_CAA = 26;
	const SEGUNDO_RECORDATORIO_RECEPCION_PENDIENTES = 27;

	private $debug = true;
	private $img_path = NULL;

	protected $config;
	protected $parametros = array();
	protected $contenido = NULL;
	protected $asunto = NULL;
	protected $attachments = array();

	public function __construct($email_pendiente = null)
	{
		$this->config = new config;
		$environment = $this->config->getParameters("framework::environment::name");

		if ($environment != 'development') {
			$this->debug = false;
			$this->isSMTP();
		}

		// host conf
		$this->Host = $this->config->getParameters("framework::email::smtp_server");
		$this->SMTPAuth = true;
		$this->Username = $this->config->getParameters("framework::email::smtp_usuario");
		$this->Password = $this->config->getParameters("framework::email::smtp_contrasena");
		$this->Port = $this->config->getParameters("framework::email::smtp_puerto");
		$this->img_path = mel::getBaseAssetPath().'/images/mail/';

		// email conf
		$this->isHtml(true);
		$this->CharSet = 'UTF-8';
		$this->Encoding = 'quoted-printable';
		$this->FromName = "Manifiestos";

		if ( ! is_null($email_pendiente))
		{
			if ($email_pendiente->espera_respuesta == 'y') {
				$this->From = $this->config->getParameters("framework::email::with_reply_email");
			} else {
				$this->From = $this->config->getParameters("framework::email::no_reply_email");
			}

			// manifiestos mail conf
			$this->establecimiento_id = $email_pendiente->establecimiento_id;
			$this->parametros = json_decode($email_pendiente->parametros);
		}
	}

	public function enviar()
	{
		$this->set_destinatario();
		$this->Subject = utf8_encode('=?UTF-8?B?'.base64_encode($this->get_asunto()).'?=');
   		$this->Body = $this->get_cuerpo();

   		foreach ($this->get_attachments() as $att) {
			$this->addAttachment($att['path'].$att['filename']);
		}

		return $this->send();
	}

	protected function get_asunto()
	{
		throw new Exception("get_asunto() no declarado en clase subemail");
	}

	protected function get_cuerpo()
	{
		$contenido = $this->generar_cuerpo();
		return str_replace(array('{img_path}','{contenido}'), array($this->img_path, $contenido), file_get_contents('../global_incs/t/templates/mail/default.html'));
	}

	protected function set_destinatario()
	{
		$environment = $this->config->getParameters("framework::environment::name");

		if ($environment != 'development') {
			$establecimiento = Establecimiento::find($this->establecimiento_id);
			$email = trim($establecimiento->email);
		} else {
			$email = trim($this->config->getParameters("framework::email::development_email_to"));
		}

		$this->AddAddress($email);
	}

	protected function get_attachments()
	{
		return array();
	}

	public function ponerEnColaDeEnvio($establecimiento_id, $tipo_email, $parametros = NULL)
	{
        $fecha = time();

        $mysql_datetime = strftime('%Y-%m-%d %H:%M:%S', $fecha);

        // permite guardar en la tabla un array encodeado para disponer de la info al trabajar el email.
        if (is_array($parametros)) {
        	$parametros = json_encode($parametros);
        }


        // Por cada establecimiento, se guarda el envio del email
        $email = new Emails(Array(
            'estado' 				=> 'PE',
            'establecimiento_id' 	=> $establecimiento_id,
            'tipo_email'			=> $tipo_email,
            'fecha_registracion'	=> $mysql_datetime,
            'parametros'			=> $parametros,
        ));

        $email->save();
	}
}

?>