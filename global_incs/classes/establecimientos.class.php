<?php

/**
 * establecimiento
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2015
 * @version $Id$
 * @access public
 */
class establecimientos extends mel{

	public $establecimiento;

	public function find($establecimiento_id)
	{
		$model = $this->getModel('Establecimiento');
		$this->establecimiento = $model->find($establecimiento_id);
	}

	public function tienePermisosTipoManifiesto($tipo_manifiesto)
	{
		$model = new TipoManifiesto;
		$residuos_limitados_a = $model->getResiduosAsArray($tipo_manifiesto);

		if ($residuos_limitados_a) {
			foreach ($this->establecimiento->permisos_establecimientos as $perm) {
				if (in_array($perm->residuo, $residuos_limitados_a)) {
					return true;
				}
			}
			return false;
		}

		return true;
	}

	/**
	 * establecimiento::buscarEstablecimientosParaManifiesto()
	 *
	 * @return
	 */
	public function buscarEstablecimientosParaManifiesto($cuit, $tipo_establecimiento, $tipo_manifiesto)
	{
		$final_array = array('estado' => '', 'descripcion' => '', 'establecimientos' => array());

		$model = new Empresa;
		$empresa = $model->obtener_por_cuit($cuit);

		$user = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);

		if ($empresa) {

			if ($tipo_establecimiento == Establecimiento::EMPRESA_NAVIERA) {
				if ($empresa->empresa_maritima != 1) {
					$final_array['estado'] = 'error';
					$final_array['descripcion'] = $this->getMessageText("empresa::06900004");
					return $final_array;
				}
				// una empresa naviera equivale a un GENERADOR. Pisamos el tipo de establecimiento
				$tipo_establecimiento = Establecimiento::GENERADOR;
			}

			if ($empresa->inactiva()) {
				$final_array['estado'] = 'error';
				$final_array['descripcion'] = $this->getMessageText("empresa::06900001");
				return $final_array;
			}

			$est_model = new Establecimiento();
			$establecimientos = $est_model->buscarEstablecimientosParaManifiesto($cuit, $tipo_establecimiento, $tipo_manifiesto);

			foreach ($establecimientos as $establecimiento) {

				// checkeo de caa vigente.
				if ($establecimiento->caa_expirado()) {
					$final_array['estado'] = 'error';
					$final_array['descripcion'] = $this->getMessageText("empresa::06900003");
					continue;
				}

				// si es alta temprana debe estar dentro de los 60 dias permitidos para operar
				if ($establecimiento->es_alta_temprana()) {
					if ( ! $establecimiento->alta_temprana_habilitada()) {
						$final_array['estado'] = 'error';
						$final_array['descripcion'] = $this->getMessageText("empresa::06900002");;
						continue;
					}
				}

				if ( ! $establecimiento->es_alta_temprana()) {
				// que coincidan los permisos al menos sobre un residuo con los que opera el usuario logeado.
					$permisos_en_comun = PermisoEstablecimiento::obtener_permisos_en_comun($establecimiento, $user);

						// a menos que sea un alta temprana. aun no tiene seteado permisos.
						if (count($permisos_en_comun) == 0) {
							$final_array['estado'] = 'error';
							$final_array['descripcion'] = 'El establecimiento no opera con los mismos residuos que usted.';
							continue;
					}
				}

				$final_array['estado'] = 'ok';
				$final_array['establecimientos'][] = formatear_establecimiento($empresa, $establecimiento);
			}

			if (count($final_array['establecimientos']) > 0 ) {
				$final_array['estado'] = 'ok';
			}

			// si llego a esta instancia sin establecimientos
			if (empty($final_array['descripcion']) && empty($final_array['establecimientos'])) {
				$final_array['estado'] = 'error';
				$final_array['descripcion'] = 'La empresa no posee establecimientos acorde a su b&uacute;squeda.';
			}

		} else {
			// no esta en nuestra base. ofrecemos hacer un alta temprana si el usuario no es generador y buscaba uno.
			if ($user->tipo != Establecimiento::GENERADOR AND ($tipo_establecimiento == Establecimiento::GENERADOR OR $tipo_establecimiento == Establecimiento::EMPRESA_NAVIERA)) {
				$final_array['estado'] = 'error';
				$final_array['descripcion'] = 'ofrecer_alta_temprana';
			} else {
				$final_array['estado'] = 'error';
				$final_array['descripcion'] = 'No se ha encontrado una empresa con el criterio de b&uacute;squeda.';
			}
		}

		return $final_array;
	}

	public function listadoDeEstablecimientos($tipo){
		$resultado = Establecimiento::find('all', array('conditions' => array('tipo = ?', $tipo)));

			foreach ($resultado as $value) {
				$final[] = array(
				    "id" => $value->id,
				    "empresa_id" => $value->empresa_id,
				    "usuario" => $value->usuario,
				    "nombre" => $value->nombre,
				    "email" => $value->email,
				    "sucursal" => $value->sucursal,
				);
			}
		return $final;
	}

	/**
	 * Método para crear altas tempranas. checkea valores minimos de carga y en caso que no exista una empresa, la genera y crea la relación.
	 * Orientado a ser usado desde el alta_masiva (/admin/operacion/listado_altas_masivas.php).
	 */
	public function crear_from_csv($csv_row)
	{
		$errores = array();
		$empresa = Empresa::find('first', array('conditions' => array('cuit = ?', $csv_row['cuit'])));

		if ( ! $empresa) {
			// cuit registrado en afip?
			if ( ! validar_cuit_tabla($csv_row['cuit'])) {
				$errores['empresa']['cuit'] = 'El CUIT ingresado no es v&aacute;lido: '.$csv_row['cuit'];
			}

			if ( ! isset($errores['empresa'])) {
				$new_emp = array(
					'nombre' => $csv_row['nombre'],
					'cuit' => $csv_row['cuit'],
					'calle' => $csv_row['calle'],
					'piso' => $csv_row['piso'],
					'codigo_postal' => $csv_row['codigo_postal'],
					'numero_telefonico' => 0,
					'numero' => $csv_row['numero'],
					'flag' => 't',
					'provincia' => $csv_row['provincia'],
					'localidad' => $csv_row['localidad'],
					'rol_generador' => 1,
					'rol_transportista' => 0,
					'rol_operador' => 0,
					'fecha_inscripcion' => new Datetime,
				);

				$empresa = new Empresa($new_emp);

				if ($empresa->is_valid()) {
					$empresa->save();
				} else {
					$errores['empresa'] = $empresa->getErrors();
				}
			}
		}

		if ($empresa)
		{
			$establecimiento = Establecimiento::find('first', array('conditions' => array('empresa_id = ? and sucursal = ?', $empresa->id, $csv_row['sucursal'])));

			if ( ! $establecimiento) {
				// calculo de usuario
				$count = count($empresa->establecimientos);
				$username = $empresa->cuit.'/'.($count+1);
				$csv_row['usuario'] = $username;
				$post['reset_contrasenia'] = 'S';
				// generamos hash para luego reestablecer contraseña
				$encrypt = new sesion();
				$r = $encrypt->getHash('', $csv_row['usuario']);
				$csv_row['salt'] = $r[0];
				$csv_row['contrasenia'] = $r[1]; // lo guardamos para ser utilizado luego como hash para pedir reestablecer la password.
				$csv_row['tipo'] = Establecimiento::GENERADOR;

				$csv_row['alta_temprana'] = 1;
				$csv_row['empresa_id'] = $empresa->id;
				$csv_row['fecha_creacion'] = new Datetime;

				try {
					// terminamos de trabajar el row csv para crear el est
					unset($csv_row['cuit']);
		   			$establecimiento = new Establecimiento($csv_row);

		   			if ($establecimiento->is_valid()) {
						$establecimiento->save();
						generar_hash_para_reestablecer_password($establecimiento);
			   			$resultado_final[] = $establecimiento;
			   			// envio de email al generador
			   			$mail = new mail;
			   			$params = json_encode(array('establecimiento_creador_id' => NULL, 'establecimiento_id' => $establecimiento->id));
						$mail->ponerEnColaDeEnvio(NULL, mail::ALTA_TEMPRANA, $params);
					} else {
						$errores['establecimiento'] = $establecimiento->getErrors();
					}
				} catch (Exception $e) {
					$errores['exception'] = $e->getMessage();
				}
			}
		}

		return $errores;
	}
}

function generar_hash_para_reestablecer_password($establecimiento)
{
	$rest_est_hash = new EstablecimientoHash(Array(
		'establecimiento_id' => $establecimiento->id,
		'hash' => $establecimiento->contrasenia,
		'fecha_registracion' => new Datetime,
		'fecha_vencimiento' => date("Y-m-d", strtotime('+7 day',strtotime(date("Y-m-d")))).date("H:i:s"),
		'fecha_modificacion' => NULL,
		'estado_hash' => 'A'
	));

	$rest_est_hash->save();
}
?>