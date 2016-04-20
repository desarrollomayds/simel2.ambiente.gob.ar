<?php

require 'mail.class.php';

/**
 * Politicas Ejecutables
 *
 * Clase de control de las políticas ejecutables
 *
 * @package
 * @author fedestev
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class politicas_exe extends mel
{
	public function envio_de_emails_en_cola()
	{
		$conexion = Empresa::connection();

		$proceso_actual = new ProcesoEnvio(array('tipo_envio' => 1));
		$proceso_actual->save();

		$query = "UPDATE emails SET estado='PR', proceso_id='".$proceso_actual->id_proceso."', fecha_modificacion = NOW() WHERE estado = 'PE'";
		$procesando = Emails::connection()->query($query);

		// Se obtienen las listas de emails en estado pendientes de envio (PE)
		$query = "SELECT A.id, A.establecimiento_id, A.tipo_email, A.parametros, A.cantidad_envios, C.espera_respuesta
			FROM tipo_emails C, emails A
			LEFT JOIN establecimientos B ON (A.establecimiento_id=B.id)
			WHERE A.estado='PR'
			  AND A.tipo_email = C.id
			  AND A.proceso_id='".$proceso_actual->id_proceso."'";

		$listado = Emails::connection();
		$pendientes = Emails::find_by_sql($query);

		if($pendientes)
		{
			if ($this->debug) {
				echo "Se encontraron mails en estado pendiente:<br>";
				echo "Enviando... (ID del proceso: ".$proceso_actual->id_proceso.")<br>";
			}

			foreach ($pendientes as $row)
			{
				// instanciamos clase de email por tipo recibido
				$class_name = "mail_".$row->tipo_email;

				if (class_exists($class_name)) {
					$mail_class = new $class_name($row);
				} else {
					throw new Exception("La clase de email $class_name no existe");
				}

				if ($mail_class->enviar($row)) {
					$estado = 'EV';
				} else {
					$estado = 'CE';
				}

				$query = "UPDATE emails SET fecha_envio = NOW(), fecha_modificacion = NOW(), estado = IF('$estado'!='EV' AND cantidad_envios >= '".$this->getParameters('framework::email::cantidad_max_envios')."','CE','$estado'), cantidad_envios='".($row->cantidad_envios+1)."' WHERE id ='".$row->id."'";
				$actualizar_estado = Emails::connection()->query($query);
			}
		}
		else
		{
			if ($this->debug) echo "No se encontraron mails en estado pendiente.";
		}

		return true;
	}


	/**
	 * Busca en la db los manifiestos que no han sido aprobados tras 5 dias de su creacion para marcarlos como vencidos.
	 * Encola el email de tipo MANIFIESTO_VENCIDO_NO_APROBADO para notificar a los participantes del cambio de estado.
	 */
	public function cierre_manifiestos_no_aprobados()
	{
		$config = new config;
		$dias_sin_aprobar = $config->getParameters("framework::vencimiento::manifiesto_sin_aprobar");
		$limit = $config->getParameters("framework::paginador::limit");

		$manif_vencidos = Manifiesto::find('all', array(
			'conditions' => array("estado = 'p' AND DATEDIFF(NOW(),fecha_creacion) > ?", $dias_sin_aprobar),
			'limit' => $limit,
			'order' => 'id desc'
		));

		$mail = new mail;

		try
		{
			$conexion = Manifiesto::connection();
			$conexion->transaction();

			// iteramos por manifiestos y grabamos un row por establecimiento que debe ser notificado.
			foreach ($manif_vencidos as $m)
			{
				$params = array('manifiesto_id' => $m->id);

				// generadores
				$n = 1;
				foreach ($m->generadores_manifiesto as $gen) {
					$mail->ponerEnColaDeEnvio($gen->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_APROBADO, $params);
					$n = $n + 1;
				}
				// transportista
				$mail->ponerEnColaDeEnvio($m->transportistas_manifiesto[0]->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_APROBADO, $params);
				// operador
				$mail->ponerEnColaDeEnvio($m->operadores_manifiesto[0]->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_APROBADO, $params);

				// estado = v
				$m->vencerManifiesto();
			}

			$conexion->commit();
		}
		catch (Exception $e)
		{
			$conexion->rollback();
			$mail_params = array(
				'seccion' => 'CRON - cierre_manifiestos_no_aprobados',
				'file' => $e->getFile(),
				'line' => $e->getLine(),
				'descripcion' => utf8_encode($e->getMessage()),
				'extra_json_data' => json_encode(array()),
			);

			$mail = new mail;
			$mail->ponerEnColaDeEnvio(NULL, mail::ERROR_A_SISTEMAS, $mail_params);
		}
	}

	public function cierre_manifiestos_no_recibidos()
	{
		$config = new config;
		$dias_sin_recibir = $config->getParameters("framework::vencimiento::manifiesto_sin_recibir");
		$limit = $config->getParameters("framework::paginador::limit");

		$manif_vencidos = Manifiesto::find('all', array(
			'conditions' => array("estado = 'a' AND tipo_manifiesto != ? AND DATEDIFF(NOW(),fecha_aceptacion) > ?", TipoManifiesto::SIMPLE_CONCENTRADOR, $dias_sin_recibir),
			'limit' => $limit,
			'order' => 'id desc'
		));

		$mail = new mail;

		try
		{
			$conexion = Manifiesto::connection();
			$conexion->transaction();

			// iteramos por manifiestos y grabamos un row por establecimiento que debe ser notificado.
			foreach ($manif_vencidos as $m)
			{
				$params = array('manifiesto_id' => $m->id);

				// generadores
				$n = 1;
				foreach ($m->generadores_manifiesto as $gen) {
					$mail->ponerEnColaDeEnvio($gen->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_RECIBIDO, $params);
					$n = $n + 1;
				}
				// transportista
				$mail->ponerEnColaDeEnvio($m->transportistas_manifiesto[0]->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_RECIBIDO, $params);
				// operador
				$mail->ponerEnColaDeEnvio($m->operadores_manifiesto[0]->establecimiento_id, mail::MANIFIESTO_VENCIDO_NO_RECIBIDO, $params);

				// estado = v
				$m->vencerManifiesto();
			}

			$conexion->commit();
		}
		catch (Exception $e)
		{
			$conexion->rollback();
			$mail_params = array(
				'seccion' => 'CRON - cierre_manifiestos_no_recibidos',
				'file' => $e->getFile(),
				'line' => $e->getLine(),
				'descripcion' => utf8_encode($e->getMessage()),
				'extra_json_data' => json_encode(array()),
			);

			$mail = new mail;
			$mail->ponerEnColaDeEnvio(NULL, mail::ERROR_A_SISTEMAS, $mail_params);
		}
	}

	public function primer_recordatorio_recepcion_pendientes()
	{
		$config = new config;
		$primer_recordatorio = $config->getParameters("framework::vencimiento::primer_recordatorio_recepcion_pendientes");
		$this->recordatorio_recepcion_pendientes($primer_recordatorio, mail::PRIMER_RECORDATORIO_RECEPCION_PENDIENTES);
	}

	public function segundo_recordatorio_recepcion_pendientes()
	{
		$config = new config;
		$segundo_recordatorio = $config->getParameters("framework::vencimiento::segundo_recordatorio_recepcion_pendientes");
		$this->recordatorio_recepcion_pendientes($segundo_recordatorio, mail::SEGUNDO_RECORDATORIO_RECEPCION_PENDIENTES);
	}

	public function recordatorio_recepcion_pendientes($dias, $tipo_recordatorio)
	{
		$config = new config;
		$limit = $config->getParameters("framework::paginador::limit");

		$manif_vencidos = Manifiesto::find('all', array(
			'conditions' => array("estado = 'a' AND tipo_manifiesto != ? AND (DATEDIFF(NOW(),fecha_aceptacion) = ?)", TipoManifiesto::SIMPLE_CONCENTRADOR, $dias),
			'limit' => $limit,
			'order' => 'id desc'
		));

		$mail = new mail;

		try
		{
			$conexion = Manifiesto::connection();
			$conexion->transaction();

			// iteramos por manifiestos y grabamos un row por establecimiento que debe ser notificado.
			foreach ($manif_vencidos as $m)
			{
				$params = array('manifiesto_id' => $m->id);
				// operador
				$email_enviados = Establecimiento::find_by_sql("SELECT * FROM emails WHERE establecimiento_id = ".$m->operadores_manifiesto[0]->establecimiento_id." && tipo_email = ".$tipo_recordatorio);

				$ya_enviado = false;
				foreach ($email_enviados as $email) {
					$parametros = json_decode($email->parametros);
					if ($parametros->manifiesto_id == $m->id) {
						$ya_enviado = true;
						break;
					}
				}
				if (!$ya_enviado){
					$mail->ponerEnColaDeEnvio($m->operadores_manifiesto[0]->establecimiento_id, $tipo_recordatorio, $params);
				}
			}
			$conexion->commit();
		}
		catch (Exception $e)
		{
			$conexion->rollback();
			$mail_params = array(
				'seccion' => 'CRON - RECORDATORIO_RECEPCION_PENDIENTES',
				'file' => $e->getFile(),
				'line' => $e->getLine(),
				'descripcion' => utf8_encode($e->getMessage()),
				'extra_json_data' => json_encode(array()),
			);

			$mail = new mail;
			$mail->ponerEnColaDeEnvio(NULL, mail::ERROR_A_SISTEMAS, $mail_params);
		}
	}

	public function recordatorio_vencimiento_caa()
	{
		$config = new config;
		$vencimiento_caa = $config->getParameters("framework::vencimiento::recordatorio_vencimiento_caa");
		$limit = $config->getParameters("framework::paginador::limit");

		$caa = Establecimiento::find('all', array(
			'conditions' => array("DATEDIFF(NOW(),caa_vencimiento) = ?", $vencimiento_caa),
			'limit' => $limit,
			'order' => 'id desc'
		));

		$fecha_hoy = date('Y-m');

		$mail = new mail;

		try
		{
		foreach ($caa as $m)
			{
				$email_enviados = Establecimiento::find_by_sql("SELECT * FROM emails WHERE establecimiento_id = ".$m->id." && tipo_email =".mail::RECORDATORIO_VENCIMIENTO_CAA);

				$ya_enviado = false;
				foreach ($email_enviados as $email) {
					$fecha_mail = substr($email->fecha_registracion,0,7);
					if ($fecha_mail == $fecha_hoy) {
						$ya_enviado = true;
						break;
					}
				}
				if (!$ya_enviado){
					$mail->ponerEnColaDeEnvio($m->id, mail::RECORDATORIO_VENCIMIENTO_CAA, NULL);
				}
			}
		}
		catch (Exception $e)
		{
			$mail_params = array(
				'seccion' => 'CRON - recordatorio_vencimiento_caa',
				'file' => $e->getFile(),
				'line' => $e->getLine(),
				'descripcion' => utf8_encode($e->getMessage()),
				'extra_json_data' => json_encode(array()),
			);
			$mail->ponerEnColaDeEnvio(NULL, mail::ERROR_A_SISTEMAS, $mail_params);
		}
	}
}

?>