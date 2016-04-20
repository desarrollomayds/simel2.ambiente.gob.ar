<?php

require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

if (!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(3, $_SESSION['PASOS_CORRECTOS'])) {
	header("Location: paso_3.php");
	exit;
}

$debug = false;

if ( ! $debug)
{
	$emailToQue = new mail();
	$conexion = Empresa::connection();
	$conexion->transaction();

	try
	{
		if ($_SESSION['ALTA_FINALIZADA'] == true) {
			throw new Exception("Es imposible grabar los datos ya que el tramite fue finalizado.");
		}

		// Clase de encriptación de contraseña
		$encrypt = new sesion();

		$empresa = new Empresa(array(
			'nombre'             => $_SESSION['DATOS_EMPRESA']['NOMBRE'],
			'cuit'               => $_SESSION['DATOS_EMPRESA']['CUIT'],
			'fecha_inscripcion'  => new Datetime,
			'fecha_inicio_act'   => convertir_fecha_es_en($_SESSION['DATOS_EMPRESA']['FECHA_INICIO_ACT']),
			'calle'              => $_SESSION['DATOS_EMPRESA']['CALLE_R'],
			'numero'             => $_SESSION['DATOS_EMPRESA']['NUMERO_R'],
			'piso'               => $_SESSION['DATOS_EMPRESA']['PISO_R'],
			'oficina'            => $_SESSION['DATOS_EMPRESA']['OFICINA_R'],
			'provincia'          => $_SESSION['DATOS_EMPRESA']['PROVINCIA_R'],
			'localidad'          => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_R'],
			'codigo_postal'      => $_SESSION['DATOS_EMPRESA']['CPOSTAL_R'],
			'latitud'            => $_SESSION['DATOS_EMPRESA']['LATITUD_R'],
			'longitud'           => $_SESSION['DATOS_EMPRESA']['LONGITUD_R'],
			'calle_l'            => $_SESSION['DATOS_EMPRESA']['CALLE_L'],
			'numero_l'           => $_SESSION['DATOS_EMPRESA']['NUMERO_L'],
			'piso_l'             => $_SESSION['DATOS_EMPRESA']['PISO_L'],
			'oficina_l'          => $_SESSION['DATOS_EMPRESA']['OFICINA_L'],
			'provincia_l'        => $_SESSION['DATOS_EMPRESA']['PROVINCIA_L'],
			'localidad_l'        => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_L'],
			'codigo_postal_l'    => $_SESSION['DATOS_EMPRESA']['CPOSTAL_L'],
			'calle_c'            => $_SESSION['DATOS_EMPRESA']['CALLE_C'],
			'numero_c'           => $_SESSION['DATOS_EMPRESA']['NUMERO_C'],
			'piso_c'             => $_SESSION['DATOS_EMPRESA']['PISO_C'],
			'oficina_c'          => $_SESSION['DATOS_EMPRESA']['OFICINA_C'],
			'provincia_c'        => $_SESSION['DATOS_EMPRESA']['PROVINCIA_C'],
			'localidad_c'        => $_SESSION['DATOS_EMPRESA']['LOCALIDAD_C'],
			'codigo_postal_c'    => $_SESSION['DATOS_EMPRESA']['CPOSTAL_C'],
			'numero_telefonico'  => $_SESSION['DATOS_EMPRESA']['NUMERO_TELEFONICO'],
			'rol_generador'      => $_SESSION['DATOS_EMPRESA']['ROLES']['GENERADOR']     or 0,
			'rol_transportista'  => $_SESSION['DATOS_EMPRESA']['ROLES']['TRANSPORTISTA'] or 0,
			'rol_operador'       => $_SESSION['DATOS_EMPRESA']['ROLES']['OPERADOR']      or 0,
			'flag'               => 'p'
  		));

		if ($empresa->is_valid()) {
			$empresa->save();
		} else {
			$err_desc = "<br />Errores en Modelo Empresa: <br />";
			foreach ($empresa->getErrors() as $field => $error) {
				if ( ! is_null($error)) {
					$err_desc .= $error."<br />";
				}
			}
			throw new Exception($err_desc);
		}

		// representante legal
		foreach ($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_LEGALES'] as $representante) {

			$rep_legal_info = array(
				'empresa_id'	   => $empresa->id,
				'nombre'           => $representante['NOMBRE'],
				'apellido'         => $representante['APELLIDO'],
				'fecha_nacimiento' => convertir_fecha_es_en($representante['FECHA_NACIMIENTO']),
				'tipo_documento'   => $representante['TIPO_DOCUMENTO'],
				'numero_documento' => $representante['NUMERO_DOCUMENTO'],
				'cuit'             => $representante['CUIT']
			);
			$representante = new RepresentanteLegal($rep_legal_info);
			$success = $representante->save();

			if ( ! $success) {
				throw new Exception("Ha ocurrido un error al intentar grabar el Representante Legal con info: ".var_export($rep_legal_info));
			}
		}

		// representante tecnico
		foreach ($_SESSION['DATOS_EMPRESA']['REPRESENTANTES_TECNICOS'] as $representante) {

			$rep_tec_info = array(
				'empresa_id'	   => $empresa->id,
				'nombre'           => $representante['NOMBRE'],
				'apellido'         => $representante['APELLIDO'],
				'fecha_nacimiento' => convertir_fecha_es_en($representante['FECHA_NACIMIENTO']),
				'tipo_documento'   => $representante['TIPO_DOCUMENTO'],
				'numero_documento' => $representante['NUMERO_DOCUMENTO'],
				'cargo'            => $representante['CARGO'],
				'cuit'             => $representante['CUIT']
			);
			$representante = new RepresentanteTecnico($rep_tec_info);
			$success = $representante->save();

			if ( ! $success) {
				throw new Exception("Ha ocurrido un error al intentar grabar el Representante T&eacute;cnico.".var_export($rep_tec_info));
			}
		}

		foreach ($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento) {

			// LLamada a la clase de seguridad, devuelve salt y hash
			$r = $encrypt->getHash("", $establecimiento['CONTRASENIA']);

			$establecimiento_ = new Establecimiento(array(
				'empresa_id'					  => $empresa->id,
				'nombre'                          => $establecimiento['NOMBRE'],
				'tipo'                            => $establecimiento['TIPO'],
				'usuario'                         => $establecimiento['USUARIO'],
				'contrasenia'                     => $r[1], // Contraseña encriptada
				'salt'                     		  => $r[0], // Salt generado
				'caa_numero'                      => $establecimiento['CAA_NUMERO'],
				'caa_vencimiento'                 => convertir_fecha_es_en($establecimiento['CAA_VENCIMIENTO']),
				'expediente_numero'               => $establecimiento['EXPEDIENTE_NUMERO'],
				'expediente_anio'                 => $establecimiento['EXPEDIENTE_ANIO'],
				'codigo_actividad'                => $establecimiento['ACTIVIDAD'],
				'descripcion'                     => $establecimiento['DESCRIPCION'],
				'latitud'                         => $establecimiento['LATITUD_R'],
				'longitud'                        => $establecimiento['LONGITUD_R'],
				'calle'                           => $establecimiento['CALLE_R'],
				'numero'                          => $establecimiento['NUMERO_R'],
				'piso'                            => $establecimiento['PISO_R'],
				'provincia'                       => $establecimiento['PROVINCIA_R'],
				'localidad'                       => $establecimiento['LOCALIDAD_R'],
				'calle_c'                         => $establecimiento['CALLE_C'],
				'numero_c'                        => $establecimiento['NUMERO_C'],
				'piso_c'                          => $establecimiento['PISO_C'],
				'provincia_c'                     => $establecimiento['PROVINCIA_C'],
				'localidad_c'                     => $establecimiento['LOCALIDAD_C'],
				'codigo_postal'					  => $establecimiento['CPOSTAL_R'],
				'codigo_postal_c'				  => $establecimiento['CPOSTAL_C'],
				'nomenclatura_catastral_circ'     => $establecimiento['NOMENCLATURA_CATASTRAL_CIRC'],
				'nomenclatura_catastral_sec'      => $establecimiento['NOMENCLATURA_CATASTRAL_SEC'],
				'nomenclatura_catastral_manz'     => $establecimiento['NOMENCLATURA_CATASTRAL_MANZ'],
				'nomenclatura_catastral_parc'     => $establecimiento['NOMENCLATURA_CATASTRAL_PARC'],
				'nomenclatura_catastral_sub_parc' => $establecimiento['NOMENCLATURA_CATASTRAL_SUB_PARC'],
				'habilitaciones'                  => $establecimiento['HABILITACIONES'],
				'email'							  => $establecimiento['DIRECCION_EMAIL']
			));

			if ($establecimiento_->is_valid()) {
				$establecimiento_->save();
			} else {
				$err_desc = "<br />Errores en Modelo Establecimiento: <br />";
				foreach ($establecimiento_->getErrors() as $field => $error) {
					if ( ! is_null($error)) {
						$err_desc .= $error."<br />";
					}
				}
				throw new Exception($err_desc);
			}

			foreach ($establecimiento['PERMISOS'] as $permiso) {

				$perm_info = array(
					'establecimiento_id' => $establecimiento_->id,
					'residuo' => $permiso['RESIDUO'],
					'cantidad' => $permiso['CANTIDAD']
				);
				$permiso_ = new PermisoEstablecimiento($perm_info);
				$success = $permiso_->save();

				if ( ! $success) {
					throw new Exception("Ha ocurrido un error al intentar grabar un permiso al establecimiento con info: ".var_export($perm_info, true));
				}

				// EJECUTAR SOLO SI ES TIPO OPERADOR (3)
				if ($establecimiento['TIPO'] == 3)
				{
					foreach ($permiso['ELIMINACION'] as $tratamiento) {

						$trat_info = array(
							'permiso_establecimiento' => $permiso_->id,
							'operacion_residuo' => $tratamiento
						);
						$tratamiento_ = new PermisoEstablecimientoResiduo($trat_info);
						$success = $tratamiento_->save();

						if ( ! $success) {
							throw new Exception("Ha ocurrido un error al intentar grabar un tratamiento al residuo ".$permiso['RESIDUO']." con info: ".var_export($trat_info, true));
						}
					}
				}
			}

			// EJECUTAR SOLO SI ES TIPO TRANSPORTISTA (2)
			if ($establecimiento['TIPO'] == 2)
			{
				foreach ($establecimiento['VEHICULOS'] as $vehiculo) {

					$vehiculo_info = array(
						'establecimiento_id' => $establecimiento_->id,
						'dominio' => $vehiculo['DOMINIO'],
						'tipo_vehiculo' => $vehiculo['TIPO_VEHICULO'],
						'tipo_caja' => $vehiculo['TIPO_CAJA'] ? $vehiculo['TIPO_CAJA'] : NULL,
						'descripcion' => $vehiculo['DESCRIPCION']
					);
					$vehiculo_ = new Vehiculo($vehiculo_info);
					$success = $vehiculo_->save();

					if ( ! $success) {
						throw new Exception("Ha ocurrido un error al intentar grabar un vehiculo con info: ".var_export($vehiculo_info, true));
					}

					foreach ($vehiculo['PERMISOS'] as $permiso) {

						$perm_vehiculo_info = array(
							'vehiculo_id' 	=> $vehiculo_id->id,
							'residuo'  		=> $permiso['RESIDUO'],
							'cantidad'		=> $permiso['CANTIDAD'],
							'estado'		=> $permiso['ESTADO']
						);
						$permiso_ = $vehiculo_->create_permisos_vehiculos($perm_vehiculo_info);
						$permiso_->save();

						if ( ! $success) {
							throw new Exception("Ha ocurrido un error al intentar grabar un residuo al vehiculo ".$vehiculo['DOMINIO']." con info: ".var_export($perm_vehiculo_info, true));
						}
					}
				}
			}

            $emailToQue->ponerEnColaDeEnvio($establecimiento_->id, '1');
		}

		$_SESSION['DATOS_EMPRESA']['PERMITIR_MODIFICACION'] = false;

		$conexion->commit();

		$_SESSION['DATOS_EMPRESA']['ID'] = $empresa->id;
		$_SESSION['ALTA_FINALIZADA'] = true;
		$error = null;
	} catch (\Exception $e) {
		// hacemos rollback y notificamos error encolando mail a sistemas
		$conexion->rollback();
		$err_desc = $e->getMessage();

		$mail_params = array(
			'seccion' => 'Registro',
			'file' => $e->getFile(),
			'line' => $e->getLine(),
			'descripcion' => utf8_encode($err_desc),
			'extra_json_data' => json_encode($_SESSION),
		);

		$mail = new mail;
		$mail->ponerEnColaDeEnvio(NULL, mail::ERROR_A_SISTEMAS, $mail_params);

		$error = true;
		$_SESSION['ALTA_FINALIZADA'] = false;
	}

}

$smarty = inicializar_smarty();
$smarty->assign('EMPRESA', $_SESSION['DATOS_EMPRESA']);
$smarty->assign('ERROR',   $error);
$smarty->display('registracion/finalizar.tpl');

session_write_close();
?>
