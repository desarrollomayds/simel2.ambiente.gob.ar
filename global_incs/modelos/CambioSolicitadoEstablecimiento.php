<?
class CambioSolicitadoEstablecimiento extends ActiveRecord\Model
{
	static $table_name = 'cambios_solicitados_establecimientos';

	static $has_many = array(
		array('cambios_establecimientos', 'foreign_key' => 'solicitud_id'),
		array('cambios_caa_establecimientos', 'foreign_key' => 'solicitud_id'),
		array('cambios_permisos_establecimientos', 'foreign_key' => 'solicitud_id'),
		array('cambios_vehiculos', 'foreign_key' => 'solicitud_id'),
		array('cambios_permisos_vehiculos', 'foreign_key' => 'solicitud_id'),
	);

	/**
	 *  Devuelve una instancia de solicitud, si existe una pendiente, sino genera una nueva.
	 */
	public function getSolicitud($empresaID, $establecimientoID)
	{
		$solicitud = CambioSolicitadoEstablecimiento::find('first', array('conditions' => array('empresa_id=? AND establecimiento_id = ? AND estado = ?', $empresaID, $establecimientoID,'P')));

		if ( ! $solicitud) {
			$solicitud = new CambioSolicitadoEstablecimiento(array('empresa_id' => $empresaID, 'establecimiento_id' => $establecimientoID));
		}

		return $solicitud;
	}

	public function getEstructuraCambios()
	{
		// defino la estructura para presentar la vista acorde a los tipo de cambios solicitados.
		$data = array(
			'cambios_caa' => array(),
			'cambios_establecimiento' => array(),
			'nuevas_sucursales' => array(),
			'cambios_vehiculos' => array(),
		);

		foreach ($this->cambios_caa_establecimientos as $c_caa) {
			$data['cambios_caa']['info'] = $c_caa;
		}

		foreach ($this->cambios_establecimientos as $ce)
		{
			if ($ce->tipo_cambio == 'E') {
				$data['cambios_establecimiento']['info'] =  $ce;
			} elseif ($ce->tipo_cambio == 'A') {
				$data['nuevas_sucursales'][$ce->id]['info'] =  $ce;
			}
		}

		foreach ($this->cambios_permisos_establecimientos as $cpe)
		{
			if (is_null($cpe->cambio_establecimiento_id)) {
				$data['cambios_establecimiento']['permisos'][] = $cpe;
			} else {
				$data['nuevas_sucursales'][$cpe->cambio_establecimiento_id]['permisos'][] = $cpe;
			}
		}

		foreach ($this->cambios_vehiculos as $cv)
		{
			if ($cv->vehiculo_id) {
				$data['cambios_vehiculos'][$cv->vehiculo_id]['info'] = $cv;
			} else { // es un alta
				$data['cambios_vehiculos']['nuevos'][] = $cv;
			}
		}

		foreach ($this->cambios_permisos_vehiculos as $cpv)
		{
			$data['cambios_vehiculos'][$cpv->vehiculo_id]['permisos'][] = $cpv;
		}

		// echo "<pre>";print_r($data);die;
		return $data;
	}

	public function procesar()
	{
		$data = $this->getEstructuraCambios();

		// procesamos cambio en caa del establecimiento
		foreach ($data['cambios_caa'] as $c_caa) {
			$cambio_caa = $data['cambios_caa']['info'];
			if ($cambio_caa->estado == 'A') {
				$cambio_caa->aceptar();
			} elseif ($cambio_caa->estado == 'R') {
				$cambio_caa->rechazar();
			}
		}

		// procesamos los cambios de informacion para el establecimiento
		if ($data['cambios_establecimiento'])
		{
			if (isset($data['cambios_establecimiento']['info']))
			{
				$cambio_est = $data['cambios_establecimiento']['info'];
				if ($cambio_est->estado == 'A') {
					$cambio_est->aceptar();
				} elseif ($cambio_est->estado == 'R') {
					$cambio_est->rechazar();
				}
			}

			// procesamos los cambios_permisos_establecimientos
			if (isset($data['cambios_establecimiento']['permisos']))
			{
				foreach ($data['cambios_establecimiento']['permisos'] as $cambio_permiso_est) {
					if ($cambio_permiso_est->estado == 'A') {
						$cambio_permiso_est->aceptar();
					} elseif ($cambio_permiso_est->estado == 'R') {
						$cambio_permiso_est->rechazar();
					}
				}
			}
		}

		// damos de alta sucursales?
		if ($data['nuevas_sucursales'])
		{
			foreach ($data['nuevas_sucursales'] as $sucursal) {
				$cambio_suc = $sucursal['info'];
				if ($cambio_suc->estado == 'A') {
					$establecimiento = $cambio_suc->aceptar();
				} elseif ($cambio_suc->estado == 'R') {
					$cambio_suc->rechazar();
				}

				foreach ($sucursal['permisos'] as $perm_sucursal) {
					if ($perm_sucursal->estado == 'A') {
						$perm_sucursal->aceptar($establecimiento);
					} elseif ($perm_sucursal->estado == 'R') {
						$perm_sucursal->rechazar();
					}
				}
			}
		}

		// primero operamos alta de vehiculos
		if (isset($data['cambios_vehiculos']['nuevos']))
		{
			$nuevos = $data['cambios_vehiculos']['nuevos'];
			unset($data['cambios_vehiculos']['nuevos']);

			foreach ($nuevos as $nv) {
				if ($nv->estado == 'A') {
					$nv->aceptar();
				} elseif ($nv->estado == 'R') {
					$nv->rechazar();
				}
			}
		}

		// luego la edicion de existentes
		foreach ($data['cambios_vehiculos'] as $cv) {
			if ($cv['info']->estado == 'A') {
				$cv['info']->aceptar();
			} elseif ($cv->estado == 'R') {
				$cv['info']->rechazar();
			}

			// iteramos sobre los permisos de vehiculos
			if (isset($cv['permisos'])) {
				foreach ($cv['permisos'] as $cpv) {
					if ($cpv->estado == 'A') {
						$cpv->aceptar();
					} elseif ($cpv->estado == 'R') {
						$cpv->rechazar();
					}
				}
			}
		}


		$this->estado = 'F';
		$this->usuario_drp = $_SESSION['INFORMACION_USUARIO']['ID'];
		$this->fecha_procesado = new Datetime;
		$this->save();
	}

	/**
	 * @override save
	 */
	public function save()
	{
		// si la solicitud es nueva, generamos row para enviar mail notificando cambios.
		if ( ! $this->id) {
			$mail = new mail;
			$mail->ponerEnColaDeEnvio($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], mail::MODIFICACION_Y_CAMBIO_DE_DATOS);
		}

		parent::save();
	}

	public function hasCambiosPendientes()
	{
		$sql = "SELECT  solicitud_id, tipo , COUNT(*) cantidad_pendientes FROM (
					SELECT s.id AS solicitud_id, ce.id AS cambio_id, 'ce' AS tipo, ce.estado
					FROM cambios_solicitados_establecimientos s, cambios_establecimientos ce
					WHERE ce.solicitud_id = s.id 
					  AND ce.estado='P'
					  AND s.id = ".$this->id."
					  
					UNION ALL
						SELECT s.id AS solicitud_id, cpe.id AS cambio_id, 'cpe' AS tipo, cpe.estado
						FROM cambios_solicitados_establecimientos s, cambios_permisos_establecimientos cpe
						WHERE cpe.solicitud_id = s.id 
						  AND cpe.estado='P'
						  AND s.id = ".$this->id."
						  
					UNION ALL
						SELECT s.id AS solicitud_id, cv.id AS cambio_id, 'cv' AS tipo, cv.estado 
						FROM cambios_solicitados_establecimientos s, cambios_vehiculos cv 
						WHERE cv.solicitud_id = s.id 
						  AND cv.estado='P'
						  AND s.id = ".$this->id."

					UNION ALL
						SELECT s.id AS solicitud_id, cpv.id AS cambio_id, 'cpv' AS tipo, cpv.estado 
						FROM cambios_solicitados_establecimientos s, cambios_permisos_vehiculos cpv 
						WHERE cpv.solicitud_id = s.id 
						  AND cpv.estado='P'
						  AND s.id = ".$this->id."
					) cambios

				GROUP BY tipo";
		
		$result = CambioSolicitadoEstablecimiento::find_by_sql($sql);
		return count($result);
	}

	public function get_listado_solicitudes_pendientes($criterio, $estado = 'p')
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$criterio = "%$criterio%";

		// obtenemos total de rows sin paginar
		$count_query = "SELECT count(cse.id) as cantidad FROM cambios_solicitados_establecimientos cse, empresas emp, establecimientos est WHERE cse.empresa_id = emp.id AND cse.establecimiento_id = est.id AND cse.estado = 'P' AND (cse.usuario_drp IS NULL OR cse.usuario_drp = ?) AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)";
		$count_obj = Establecimiento::find_by_sql($count_query, array($_SESSION['INFORMACION_USUARIO']['ID'], $criterio, $criterio));

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");

		$sql = "SELECT
					cse.id,
					emp.cuit,
					emp.nombre AS empresa,
					est.nombre AS establecimiento,
					IF(cse.estado = 'P', 'Pendiente', IF(cse.estado = 'A', 'Aprobada', 'Rechazada')) AS estado,
					cse.fecha_solicitud,
					cse.usuario_drp,
					cse.fecha_procesado
					
				FROM cambios_solicitados_establecimientos cse, empresas emp, establecimientos est

				WHERE cse.empresa_id = emp.id
				  AND cse.establecimiento_id = est.id
				  AND cse.estado = 'P'
				  AND (cse.usuario_drp IS NULL OR cse.usuario_drp = ?)
				  AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)
					
				GROUP BY cse.empresa_id, cse.establecimiento_id
				ORDER BY cse.fecha_solicitud DESC
				LIMIT ".$page->limit;

		$solicitudes_pendientes = CambioSolicitadoEstablecimiento::find_by_sql($sql, array($_SESSION['INFORMACION_USUARIO']['ID'], $criterio, $criterio));
		return array($solicitudes_pendientes, $paginate);
	}

	// vincula la solicitud de cambio con un usuario de la drp para evitar ediciones simultaneas.
	public function asignar_a_usuario($drp_user_id)
	{
		$this->usuario_drp = $drp_user_id;
		$this->save();
	}
}

?>
