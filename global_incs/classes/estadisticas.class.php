<?php

class estadisticas extends mel
{
	private $_start_date;
	private $_end_date;

	public function __construct($start_date, $end_date)
	{
		$this->_start_date = $start_date;
		$this->_end_date = $end_date;
	}

	public function getCantidadPorResiduo($residuo = 'all', $excluir_tipo_manifiestos = array(TipoManifiesto::SLOP), $tratamiento = 'all')
	{
		$query = "SELECT SUM(rm.cantidad_estimada) AS cantidad, rm.residuo_id as csc, r.descripcion
				  FROM manifiestos m, residuos_manifiesto rm, cat_residuos_peligrosos r
				  WHERE m.id = rm.manifiesto_id
					AND rm.residuo_id = r.codigo
					AND m.estado IN ('a','e','f') ";

		if ($excluir_tipo_manifiestos) {
			$query .= "AND m.tipo_manifiesto NOT IN (".implode(',', $excluir_tipo_manifiestos).") ";
		}

		$query .= " AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}

		if ($tratamiento != 'all' AND ! empty($tratamiento)) {
			$query .= " AND rm.tratamiento = '$tratamiento'";
		}

		$query .= " GROUP BY rm.residuo_id;";

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getCantidadPorTratamiento($residuo = 'all', $tratamiento = 'all')
	{
		$query = "SELECT rm.tratamiento, SUM(rm.cantidad_estimada) AS cantidad
				  FROM manifiestos m, residuos_manifiesto rm
				  WHERE m.id = rm.manifiesto_id
				    AND m.estado IN ('e','f')
				    AND rm.tratamiento IS NOT NULL
				    AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}

		if ($tratamiento != 'all' AND ! empty($tratamiento)) {
			$query .= " AND rm.tratamiento = '$tratamiento'";
		}
		
		$query .= " GROUP BY tratamiento";

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getCantidadPorResiduoTratamiento($residuo = 'all', $tratamiento = 'all')
	{
		$query = "SELECT rm.residuo_id as csc, SUM(rm.cantidad_estimada) AS cantidad, r.descripcion, rm.tratamiento
				  FROM manifiestos m, residuos_manifiesto rm, cat_residuos_peligrosos r
				  WHERE m.id = rm.manifiesto_id
				    AND rm.residuo_id = r.codigo
				    AND m.estado IN ('e','f')
				    AND rm.tratamiento IS NOT NULL
				    AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}

		if ($tratamiento != 'all' AND ! empty($tratamiento)) {
			$query .= " AND rm.tratamiento = '$tratamiento'";
		}
		
		$query .= " GROUP BY tratamiento, residuo_id;";

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getCantidadEntradaSalidaResiduos($residuo = 'all', $provincia_desde = 'all', $provincia_hacia = 'all')
	{
		$query = "SELECT rm.residuo_id AS csc,
						 r.descripcion,
						 pg.descripcion AS enviado,
						 po.descripcion AS recibido,
						 SUM(rm.cantidad_estimada) AS cantidad,
						 SUM(rm.cantidad_real) AS cantidad_real
						
					FROM  manifiestos m, 
						 generadores_manifiesto gm,
						 operadores_manifiesto om,
						 residuos_manifiesto rm,
						 cat_residuos_peligrosos r,
						 cat_provincias pg,
						 cat_provincias po

					WHERE m.id = rm.manifiesto_id
						 AND rm.residuo_id = r.codigo
						 AND m.id = gm.manifiesto_id
						 AND m.id = om.manifiesto_id
						 AND gm.provincia = pg.codigo
						 AND om.provincia = po.codigo
						 AND m.estado IN ('a','e','f')
						 AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' "; //  ('a','e','f')

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}

		if ($provincia_desde != 'all' AND ! empty($provincia_desde)) {
			$query .= " AND pg.codigo = ".$provincia_desde;
		}

		if ($provincia_hacia != 'all' AND ! empty($provincia_hacia)) {
			$query .= " AND po.codigo = ".$provincia_hacia;
		}
		
		$query .= " GROUP BY rm.residuo_id, pg.codigo, po.codigo;";

		// echo $query;die;

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getCantidadSalidaPorProvincia($provincia = 'all', $residuo = 'all')
	{
		$query = "SELECT rm.residuo_id AS csc,
				       SUM(rm.cantidad_estimada) AS cantidad
				  FROM manifiestos m,
				     generadores_manifiesto gm,
				     residuos_manifiesto rm,
			 	     cat_provincias pg
				  WHERE m.id = rm.manifiesto_id
				    AND m.id = gm.manifiesto_id
				    AND gm.provincia = pg.codigo
				    AND m.estado IN ('a','e','f')
					AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($provincia != 'all' AND ! empty($provincia)) {
			$query .= " AND pg.codigo = ".$provincia;
		}

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}
		
		$query .= " GROUP BY rm.residuo_id";

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getCantidadEntradaPorProvincia($provincia = 'all', $residuo = 'all')
	{
		
		$query = "SELECT rm.residuo_id AS csc,
				       SUM(rm.cantidad_real) AS cantidad
				  FROM manifiestos m,
				     operadores_manifiesto om,
				     residuos_manifiesto rm,
			 	     cat_provincias po
				  WHERE m.id = rm.manifiesto_id
				    AND m.id = om.manifiesto_id
				    AND om.provincia = po.codigo
				    AND m.estado IN ('a','e','f')
					AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($provincia != 'all' AND ! empty($provincia)) {
			$query .= " AND po.codigo = ".$provincia;
		}

		if ($residuo != 'all' AND ! empty($residuo)) {
			$query .= " AND rm.residuo_id = '$residuo'";
		}
		
		$query .= " GROUP BY rm.residuo_id";

		// echo "<br><br>".$query;die;

		return ResiduoManifiesto::find_by_sql($query);
	}

	public function getManifiestosPorEstablecimiento($usuario, $tipo_establecimiento, $estados = array(), $tipo_manifiesto = null, $paginate = true)
	{
		$select = "SELECT 
					  est.nombre AS nombre_establecimiento_creador,
					  IF(m.tipo_manifiesto IN (0,3,4), 'Simple', IF(m.tipo_manifiesto = 1, 'M&uacute;ltiple', 'SLOP')) AS tipo_manifiesto,
					  m.id AS manifiesto_id,
					  m.id_protocolo_manifiesto AS protocolo_id,
					  IF (m.estado = 'a', 'Aprobado', IF(m.estado = 'e', 'Recibido', 'Finalizado')) AS estado_manifiesto,
					  rm.residuo_id AS residuo,
					  rm.cantidad_estimada,
					  rm.cantidad_real AS cantidad_recibida,
					  IF (m.estado = 'f', rm.cantidad_real, 0) AS cantidad_tratada ";
		$from = " FROM manifiestos m, operadores_manifiesto om, establecimientos est, residuos_manifiesto rm, establecimientos est2 ";

		$where = "  WHERE m.id = om.manifiesto_id
					  AND m.establecimiento_creador = est.id
					  AND m.id = rm.manifiesto_id
					  AND est2.usuario = ?
					  AND om.establecimiento_id = est2.id 
					  AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($tipo_establecimiento) {
			$where .= " AND est2.tipo = ".$tipo_establecimiento." ";
		}

		if ($estados) {
			$where .= "  AND m.estado IN (\"".implode('", "', $estados)."\") ";
		}

		if ($tipo_manifiesto AND $tipo_manifiesto != 'all') {
			$where .= " AND m.tipo_manifiesto = ".$tipo_manifiesto." ";
		}

		$group_by = " GROUP BY m.id, rm.residuo_id ";
		$order_by = " ORDER BY establecimiento_creador ASC, protocolo_id ASC, residuo ASC ";
		
		// echo "<pre>".$select.$from.$where.$group_by.$order_by."</pre>";die;
		if ($paginate) {
			return $this->paginar_query(array($usuario), $select, $from, $where, $group_by, $order_by);
		} else {
			return Manifiesto::find_by_sql($select.$from.$where.$group_by.$order_by, array($usuario));
		}
	}

	public function getCantidadManifiestos()
	{
		$result = array(
			'p' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
			'a' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
			'e' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
			'f' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
			'r' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
			'v' => array('Simple' => 0, 'M&uacute;ltiple' => 0, 'SLOP' => 0),
		);

		$sql = "SELECT SUM(DISTINCT CASE WHEN `tipo_manifiesto` in (0,3,4) THEN 0 ELSE tipo_manifiesto END) AS tipo,
					estado, 
					COUNT(id) as cantidad
				FROM manifiestos
				WHERE fecha_creacion BETWEEN '".$this->_start_date." 00:00:00' AND '".$this->_end_date." 23:59:59'
				GROUP BY CASE WHEN `tipo_manifiesto` in (0,3,4) THEN 0 ELSE tipo_manifiesto END, estado
				ORDER BY estado ASC, tipo_manifiesto ASC";

		$rows = Manifiesto::find_by_sql($sql);

		// itero para agrupar el resultado por estado.
		foreach ($rows as $r) {
			if ($r->tipo == 0) {
				$tipo = 'Simple';
			} elseif ($r->tipo == 1) {
				$tipo = 'M&uacute;ltiple';
			} else {
				$tipo = 'SLOP';
			}
			
			$result[$r->estado][$tipo] = $r->cantidad;
		}

		return $result;
	}

	private function paginar_query($binded_values, $select, $from, $where, $group_by = '', $order_by = '')
	{
		$page = new Paginator();
		$count_obj = Manifiesto::find_by_sql("SELECT count(m.id) as cantidad ".$from.$where, $binded_values);
		$paginate = $page->paginate($count_obj[0]->cantidad, 50, 30);

		// query paginada
		$query = $select.$from.$where.$group_by.$order_by." LIMIT ".$page->limit;
		$resultado = Manifiesto::find_by_sql($query, $binded_values);

		return array($resultado, $paginate);
	}
}

?>