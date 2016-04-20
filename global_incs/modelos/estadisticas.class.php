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

	public function getManifiestosAprobados($establecimiento = NULL, $tipo_manifiesto = NULL)
	{
		$result = array('operador' => array(), 'transportista' => array(), 'generador' => array());
		$roles = array('operador' => 3, 'transportista' => 2, 'generador' => 1);

		$select = "SELECT e.nombre AS nombre_establecimiento, 
					IF(m.tipo_manifiesto IN (0,3,4), 'Simple', IF(m.tipo_manifiesto = 1, 'M&uacute;ltiple', 'SLOP')) AS tipo,
					m.id_protocolo_manifiesto AS protocolo,
					rm.residuo_id AS residuo,
					rm.cantidad_estimada AS kg_estimada ";

		$from = " FROM manifiestos m, establecimientos e, residuos_manifiesto rm ";

		$where = " WHERE m.establecimiento_creador = e.id
					  AND m.id = rm.manifiesto_id
					  AND e.tipo = {tipo_establecimiento}
					  AND m.estado = 'a'
					  AND m.fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."' ";

		if ($establecimiento) {
			$where .= " AND (e.nombre like '%$establecimiento%' OR e.usuario like '%$establecimiento%') ";
		}

		if ( ! is_null($tipo_manifiesto)) {
			// manifiesto simple incluye 2 ids mas
			if ($tipo_manifiesto == 0) {
				$where .= " AND m.tipo_manifiesto in (0,3,4) ";
			} else {
				$where .= " AND m.tipo_manifiesto = $tipo_manifiesto ";
			}
		}

		$query = $select.$from.$where;

		// modificamos y ejecutamos el query por cada tipo de establecimiento.
		foreach ($roles as $key => $tipo_establecimiento) {
			$sql = str_replace('{tipo_establecimiento}', $tipo_establecimiento, $query);
			$result[$key] = Manifiesto::find_by_sql($sql);
		}

		return $result;
	
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
				WHERE fecha_creacion BETWEEN '".$this->_start_date."' AND '".$this->_end_date."'
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
}

?>