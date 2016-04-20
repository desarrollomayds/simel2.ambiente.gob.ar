<?
class Manifiesto extends ActiveRecord\Model
{
	// Mantengo los ids que se usaban por si estan siendo usados. Va de la mano con tabla `tipo_manifiestos`.
	const MANIFIESTO_SIMPLE = 0;
	const MANIFIESTO_MULTIPLE = 1;
	const MANIFIESTO_SLOP = 2;
	const MANIFIESTO_SIMPLE_RES_544_94 = 3;
	const MANIFIESTO_SIMPLE_CONCENTRADOR = 4;

	const PENDIENTE = 'p';	// aun no es aprobado por todos sus participantes.
	const APROBADO = 'a';	// todos los participantes aprobaron el manifiesto. Siguiente estado: recibido.
	const RECHAZADO = 'r';	// alguno de los participantes rechazó el manifiesto.
	const RECIBIDO = 'e'; 	// operador confirma cantidad real de residuos. Siguiente estado: finalizado.
	const FINALIZADO = 'f';	// operador carga fecha de tratamiento y cual aplicar a los residuos. Estado final.
	const VENCIDO = 'v';	// manifiesto vencido: ocurre al superar 5 dias desde su creacion sin ser aprobado por todas las partes.

	static $has_many = array(
		array('generadores_manifiesto',    'class_name' => 'GeneradorManifiesto'),
		array('transportistas_manifiesto', 'class_name' => 'TransportistaManifiesto'),
		array('operadores_manifiesto',     'class_name' => 'OperadorManifiesto'),
		array('vehiculos_manifiesto',      'class_name' => 'VehiculoManifiesto'),
		array('residuos_manifiesto',       'class_name' => 'ResiduoManifiesto'),
	);

	public function buscar_manifiestos_por_establecimiento(Establecimiento $establecimiento,$limite=1,$manifiesto_id=false)
	{
		$extra = false;
		switch ($establecimiento->tipo) {
			case Establecimiento::GENERADOR:
				$table = "generadores_manifiesto";
			break;
			case Establecimiento::TRANSPORTISTA:
				$table = "transportistas_manifiesto";
			break;
			case Establecimiento::OPERADOR:
				$table = "operadores_manifiesto";
			break;
		}

		if($manifiesto_id){
			$extra = " AND manifiesto_id = '$manifiesto_id' ";
		}

		$query = "SELECT * FROM $table WHERE establecimiento_id = ? $extra LIMIT 1";
		return self::find_by_sql($query, array($establecimiento->id));
		// echo self::connection()->last_query;die;
	}

	/**
	 * Manifiesto::obtener_cantidad_manifiestos_creados_establecimiento()
	 * @todo Parametrizar en config el periodo default.
	 * @param mixed $id_establecimiento
	 * @param string $periodo
	 * @return
	 */
	public function obtener_manifiestos_creados_establecimiento($id_establecimiento,$periodo="1 YEAR")
	{
		$id_establecimiento = (int)$id_establecimiento;

		$sql = "SELECT count(id) AS cantidad, estado FROM manifiestos
				WHERE establecimiento_creador = ?
				  AND fecha_creacion >= DATE_SUB(NOW(),INTERVAL $periodo)
				GROUP BY estado";

		return self::find_by_sql($sql, array($id_establecimiento));
	}

	public function get_listado_manifiestos_pendientes($criterios, $paginate = true)
	{
		$manifiestos_pendientes = array();
		
		$select = "SELECT m.id, m.tipo_manifiesto, m.establecimiento_creador, m.fecha_creacion, m.estado ";
		$from = " FROM manifiestos m, establecimientos est, empresas emp ";

		$where = " WHERE m.establecimiento_creador = est.id
					AND est.empresa_id = emp.id 
					AND m.id in (
					  select manifiesto_id from generadores_manifiesto where establecimiento_id = ".$criterios['establecimiento_id']." union all
					  select manifiesto_id from transportistas_manifiesto where establecimiento_id = ".$criterios['establecimiento_id']." union all
					  select manifiesto_id from operadores_manifiesto where establecimiento_id = ".$criterios['establecimiento_id']."
					) 
					AND m.estado = 'p'";

		$where .= $this->add_wheres_from_criteria($criterios);

		$order_by = " ORDER BY id desc ";

		// hay que paginar el resultado?
		if ($paginate) {
			list($manifiestos, $pagination) = $this->paginar_query($select, $from, $where, $group_by, $order_by);
		} else {
			$query = $select.$from.$where.$group_by.$order_by;
			$manifiestos = Manifiesto::find_by_sql($query);
		}

		$estados = array('p' => 'pendiente', 'r' => 'rechazado', 'a' => 'aceptado', 'e' => 'recibido', 'f' => 'finalizado');

		foreach ($manifiestos as $manif)
		{
			$creador = obtener_informacion_por_establecimiento($manif->establecimiento_creador);

			if ($creador)
			{
				$creador = $creador['ESTABLECIMIENTO'];
				$estados_manifiesto = obtener_aprobados_manifiesto($manif->id);

				$array_manif = array(
					'ID' => $manif->id,
					'FECHA_CREACION' => formatear_fecha_activerecord($manif->fecha_creacion),
					'CREADOR' => $creador['NOMBRE_EMPRESA'],
					'ESTADO' => $estados[$manif->estado],
					'TIPO' => $manif->tipo_manifiesto,
					'ESTABLECIMIENTO' => $creador['NOMBRE'],
					'ESTADO_TRANSPORTISTA' => $estados_manifiesto['transportista'],
					'ESTADO_GENERADOR' => $estados_manifiesto['generador'],
					'ESTADO_OPERADOR' => $estados_manifiesto['operador'],
				);

				$rol_usuario = strtoupper(obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));
				if ($criterios['pendiente_por'] == 'mi') {
					if ($array_manif['ESTADO_'.$rol_usuario] == 'p') {
						$manifiestos_pendientes[] = $array_manif;
					}
				} elseif ($array_manif['ESTADO_'.$rol_usuario] != 'p') {
					$manifiestos_pendientes[] = $array_manif;
				}
			}
		}

		if (isset($pagination)) {
			return array($manifiestos_pendientes, $pagination);
		} else {
			return $manifiestos_pendientes;
		}
	}

	/**
	 * Manifiestos que se encuentran aprobados o recibidos que esperan ser finalizados por el operador
	 * al indicar el tipo de tratamiento aplicado a los residuos.
	 */
	public function get_listado_manifiestos_en_proceso($criterios, $paginate = true)
	{
		$select = "SELECT m.*,
					emp.nombre AS nombre_empresa,
					est.nombre AS nombre_establecimiento,
					IF(est.sucursal<>0,est.sucursal,'') AS sucursal,
					IF(m.estado='a', 'Aprobado', 'Recibido') AS estado,
					IF(v.tipo_vehiculo = 'BA', 'si', 'no') AS es_slop_cabecera ";

		$from = " FROM manifiestos m, establecimientos est, empresas emp, vehiculos_manifiesto vm, vehiculos v ";

		$where = " WHERE m.id IN (
					  SELECT manifiesto_id FROM generadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM transportistas_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM operadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." )
					AND m.id = vm.manifiesto_id
       				AND vm.vehiculo_id = v.id
       				AND m.manifiesto_padre IS NULL
					AND (m.estado = 'a' OR m.estado = 'e')
					AND m.establecimiento_creador = est.id
					AND est.empresa_id = emp.id ";

		$where .= $this->add_wheres_from_criteria($criterios);

		$group_by = " GROUP BY m.id ";
		$order_by = " ORDER BY m.id DESC ";

		// hay que paginar el resultado?
		if ($paginate) {
			return $this->paginar_query($select, $from, $where, $group_by, $order_by);
		} else {
			$query = $select.$from.$where.$group_by.$order_by;
			return Manifiesto::find_by_sql($query);
		}
	}

	public function get_listado_manifiestos_en_camino($criterios, $paginate = true)
	{
		$select = "SELECT m.id, m.id_protocolo_manifiesto,emp.nombre AS nombre_empresa, est.nombre AS nombre_establecimiento,
					est.id as establecimiento_id, est.sucursal, m.fecha_creacion ";

		$from = " FROM operadores_manifiesto oper,
					manifiestos m
					LEFT JOIN establecimientos est ON (est.id = m.establecimiento_creador)
					LEFT JOIN empresas emp ON (emp.id = est.empresa_id) ";

		$where = " WHERE oper.manifiesto_id = m.id
					AND m.estado = 'a'
					AND m.manifiesto_padre IS NULL
					AND oper.establecimiento_id = ".$criterios['establecimiento_id'];

		$where .= $this->add_wheres_from_criteria($criterios);

		$group_by = " GROUP BY m.id ";
		$order_by = " ORDER BY m.id_protocolo_manifiesto DESC ";

		// hay que paginar el resultado?
		if ($paginate) {
			return $this->paginar_query($select, $from, $where, $group_by, $order_by);
		} else {
			$query = $select.$from.$where.$group_by.$order_by;
			return Manifiesto::find_by_sql($query);
		}
	}

	public static function obtener_manifiestos_relacionados($manifiesto_id)
	{
		$query = "
			SELECT m.*,
			       emp.nombre AS nombre_empresa,
			       IF(m.estado='a', 'Aprobado', IF(m.estado='e', 'Recibido', 'Finalizado')) AS estado,
			       gen.nombre AS nombre_establecimiento,
			       gen.establecimiento_id
			FROM operadores_manifiesto oper,
			     manifiestos m
			LEFT JOIN generadores_manifiesto gen ON (gen.manifiesto_id = m.id)
			LEFT JOIN empresas emp ON (emp.id = gen.empresa_id)
			WHERE manifiesto_padre = ?
			GROUP BY m.id
			ORDER BY m.id DESC";

		return self::find_by_sql($query, array($manifiesto_id));
	}

	/**
	 * Manifiesto::get_listado_manifiestos_a_procesar()
	 * Obtiene los manifiestos para el establecimiento (operador) que se encuentren en estado 'e'.
	 */
	public function get_listado_manifiestos_a_procesar($criterios, $paginate = true)
	{
		$select = "SELECT m.*, emp.nombre AS nombre_empresa, est.nombre AS nombre_establecimiento, IF(est.sucursal<>0,est.sucursal,'') AS sucursal ";

		$from = " FROM manifiestos m, establecimientos est, empresas emp ";

		$where = " WHERE m.id IN (
					  SELECT manifiesto_id FROM generadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM transportistas_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM operadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." )
					AND m.estado = 'e'
					AND m.establecimiento_creador = est.id
					AND est.empresa_id = emp.id ";

		$where .= $this->add_wheres_from_criteria($criterios);

		$order_by = " ORDER BY m.id DESC";

		// hay que paginar el resultado?
		if ($paginate) {
			return $this->paginar_query($select, $from, $where, '', $order_by);
		} else {
			$query = $select.$from.$where.$order_by;
			return Manifiesto::find_by_sql($query);
		}
	}

	/**
	 * Manifiesto::obtener_manifiestos_finalizados()
	 * Obtiene los manifiestos finalizados. Son lo que se mostrarán en el historial.
	 */
	public function get_listado_manifiestos_finalizados($criterios, $paginate = true)
	{
		$select = "SELECT m.*, emp.nombre AS nombre_empresa, est.nombre AS nombre_establecimiento,
					IF(est.sucursal<>0,est.sucursal,'') AS sucursal,IF(v.tipo_vehiculo = 'BA', 'si', 'no') AS es_slop_cabecera ";

		$from = " FROM manifiestos m, establecimientos est, empresas emp, vehiculos_manifiesto vm, vehiculos v ";

		$where = " WHERE m.id IN (
					  SELECT manifiesto_id FROM generadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM transportistas_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM operadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." )
					AND m.id = vm.manifiesto_id
       				AND vm.vehiculo_id = v.id
					AND m.estado = 'f'
					AND m.establecimiento_creador = est.id
					AND est.empresa_id = emp.id";

		$where .= $this->add_wheres_from_criteria($criterios);

		$group_by = " GROUP BY m.id";
		$order_by = " ORDER BY m.id DESC";

		// hay que paginar el resultado?
		if ($paginate) {
			return $this->paginar_query($select, $from, $where, $group_by, $order_by);
		} else {
			$query = $select.$from.$where.$group_by.$order_by;
			return Manifiesto::find_by_sql($query);
		}
	}

	/**
	 * Manifiesto::get_listado_manifiestos_rechazados()
	 */
	public function get_listado_manifiestos_rechazados($criterios, $paginate = true)
	{
		$select = "SELECT m.*,
					emp.nombre AS nombre_empresa,
					est.nombre AS nombre_establecimiento,
					IF(est.sucursal<>0,est.sucursal,'') AS sucursal,
					emp_rech.nombre AS empresa_rechazo,
       				est_rech.nombre AS establecimiento_rechazo,
       				IF(est_rech.sucursal<>0,est_rech.sucursal,'') AS sucursal_rechazo,
       				IF(m.tipo_manifiesto IN (0,3,4), 'Simple', IF(m.tipo_manifiesto = 1, 'Multiple', 'Slop'))  AS tipo_manifiesto_nombre ";

		$from = " FROM manifiestos m, establecimientos est, empresas emp, empresas emp_rech, establecimientos est_rech ";

		$where = " WHERE m.id IN (
					  SELECT manifiesto_id FROM generadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM transportistas_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." UNION ALL
					  SELECT manifiesto_id FROM operadores_manifiesto WHERE establecimiento_id = ".$criterios['establecimiento_id']." )
					AND m.estado = 'r'
					AND m.establecimiento_creador = est.id
					AND est.empresa_id = emp.id
					AND m.rechazado_por = est_rech.id
  					AND est_rech.empresa_id = emp_rech.id ";

  		$where .= $this->add_wheres_from_criteria($criterios);

		$order_by .= " ORDER BY m.id DESC";

		// hay que paginar el resultado?
		if ($paginate) {
			return $this->paginar_query($select, $from, $where, '', $order_by);
		} else {
			$query = $select.$from.$where.''.$order_by;
			return Manifiesto::find_by_sql($query);
		}
	}

	/**
	 * Manifiesto::obtenerSlopsDondeParticipo()
	 * Devuelve todos los manifiestos tipo SLOP c/barcaza en los que participe el establecimiento_id.
	 */
	public function obtenerSlopsBarcazaDondeParticipo($establecimiento_id)
	{
		$query = 'SELECT
			IF(m2.id,m2.id,m.id) AS id,
			IF(m2.id_protocolo_manifiesto,m2.id_protocolo_manifiesto,m.id_protocolo_manifiesto) AS id_protocolo_manifiesto,
			emp.nombre AS empresa_naviera,
			est.nombre AS buque

			FROM generadores_manifiesto gen,
			     empresas emp,
			     establecimientos est,
			     transportistas_manifiesto trans,
			     manifiestos m
			LEFT JOIN manifiestos m2 ON (m.manifiesto_padre = m2.id) ,
			vehiculos_manifiesto vm,
			vehiculos v
			LEFT JOIN vehiculos v2 ON (v.id = v2.id)

			WHERE m.id = trans.manifiesto_id
			  AND m.id = gen.manifiesto_id
			  AND est.id = gen.establecimiento_id
			  AND emp.id = est.empresa_id
			  AND m.estado = "a"
			  AND m.tipo_manifiesto = 2
			  AND trans.establecimiento_id = ?
			  AND trans.estado = "a"
			  AND m.id = vm.manifiesto_id
			  AND vm.vehiculo_id = v.id
			  AND IFNULL(m.manifiesto_padre, v.tipo_vehiculo = "BA")

			GROUP BY m2.id_protocolo_manifiesto
			ORDER BY m.id DESC';

		// echo $query."<br>";var_dump($establecimiento_id);die;
		return self::find_by_sql($query, array($establecimiento_id));
	}

	/**
	 * Busca un manifiesto slop con barcaza que este aprobado por protocolo
	 */
	public function obtenerManifiestoBarcazaPorProtocolo($protocolo_id)
	{
		$query = "SELECT m.id
			FROM
			  manifiestos m,
			  vehiculos_manifiesto vm,
			  vehiculos v
			WHERE m.id = vm.manifiesto_id
			AND vm.vehiculo_id = v.id
			AND v.tipo_vehiculo = 'BA'
			AND m.id_protocolo_manifiesto = $protocolo_id
			AND m.tipo_manifiesto = 2
			AND m.estado = 'a'";

		$resultado = self::find_by_sql($query);

		if ($resultado) {
			$resultado =  obtener_informacion_manifiesto($resultado[0]->id);
		}

		return $resultado;
	}

	public function vencerManifiesto()
	{
		$this->estado = Manifiesto::VENCIDO;
		$this->fecha_vencimiento = new Datetime;
		$this->save();
	}

	public function get_listado_manifiestos_pendientes_drp($criterio = '')
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$criterio = "%$criterio%";

		// obtenemos total de rows sin paginar
		$count_query = "SELECT count(est.id) as cantidad FROM manifiestos m, establecimientos est, empresas emp WHERE est.id = m.establecimiento_creador AND est.empresa_id = emp.id AND m.estado_autorizacion_drp = 0 AND m.tipo_manifiesto = 4 AND m.estado = 'p' AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)";
		$count_obj = Manifiesto::find_by_sql($count_query, array($criterio, $criterio));

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");

		// obtenemos los rows paginados aplicando criterio de busqueda
		$query = "SELECT m.id, emp.cuit, est.nombre AS nombre_establecimiento, est.sucursal, m.fecha_creacion 
					FROM manifiestos m, establecimientos est, empresas emp
				  WHERE est.id = m.establecimiento_creador
					AND est.empresa_id = emp.id
					AND m.estado_autorizacion_drp = 0
					AND m.tipo_manifiesto = 4
					AND m.estado = 'p'
			        AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)
			      LIMIT ".$page->limit;

		$altas_tempranas = Establecimiento::find_by_sql($query, array($criterio, $criterio));

		return array($altas_tempranas, $paginate);
	}

	public function get_listado_manifiestos_por_estado($filtros)
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$bind_values = array();

		$estado = '%'.$filtros['estado'].'%';

		// generamos los where del query
		$where = ' WHERE est.id = m.establecimiento_creador AND est.empresa_id = emp.id ';

		if ($filtros['manifiesto_id']) {
			$where .= ' AND m.id = ? ';
			$bind_values[] = $filtros['manifiesto_id'];
		}

		if ($filtros['protocolo_id']) {
			$where .= ' AND m.id_protocolo_manifiesto = ? ';
			$bind_values[] = $filtros['protocolo_id'];
		}

		if ($filtros['establecimiento']) {
			$where .= ' AND (est.usuario LIKE ? OR est.nombre LIKE ?) ';
			$bind_values[] = '%'.$filtros['establecimiento'].'%';
			$bind_values[] = '%'.$filtros['establecimiento'].'%';
		}

		if (isset($filtros['tipo_manifiesto']) AND $filtros['tipo_manifiesto'] != 'all') {
			$where .= ' AND m.tipo_manifiesto = ? ';
			$bind_values[] = $filtros['tipo_manifiesto'];
		}

		if (isset($filtros['estado']) AND $filtros['estado'] != 'all') {
			$where .= ' AND m.estado = ? ';
			$bind_values[] = $filtros['estado'];
		}

		// obtenemos total de rows sin paginar
		$count_query = "SELECT count(est.id) as cantidad FROM manifiestos m, establecimientos est, empresas emp ".$where;
		$count_obj = Manifiesto::find_by_sql($count_query, $bind_values);

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");

		// obtenemos los rows paginados aplicando criterio de busqueda
		$query = "SELECT m.id, m.id_protocolo_manifiesto, m.tipo_manifiesto, m.estado, emp.cuit, est.nombre AS nombre_establecimiento, m.fecha_creacion 
					FROM manifiestos m, establecimientos est, empresas emp".
				  $where
				."ORDER BY m.id DESC
			      LIMIT ".$page->limit;

		// echo "<br><pre>$query<br>";
		// var_dump($bind_values);
		// echo "</pre>";

		$manifiestos = Establecimiento::find_by_sql($query, $bind_values);

		return array($manifiestos, $paginate);
	}

	private function add_wheres_from_criteria($criterios)
	{
		$where = '';

		if ($criterios['tipo_manifiesto'] == TipoManifiesto::SIMPLE) {
			$where .= " AND m.tipo_manifiesto IN (0,3,4) ";
		} elseif ($criterios['tipo_manifiesto'] == TipoManifiesto::MULTIPLE) {
			$where .= " AND m.tipo_manifiesto = 1 ";
		} elseif ($criterios['tipo_manifiesto'] == TipoManifiesto::SLOP) {
			$where .= " AND m.tipo_manifiesto = 2 ";
		}

		if (isset($criterios['manifiesto_id'])) {
			$where .= " AND m.id = ".$criterios['manifiesto_id'];
		}

		if (isset($criterios['protocolo_id'])) {
			$where .= " AND m.id_protocolo_manifiesto = ".$criterios['protocolo_id'];
		}

		if (isset($criterios['empresa'])) {
			$where .= " AND (emp.cuit LIKE '%".$criterios['empresa']."%' OR emp.nombre LIKE '%".$criterios['empresa']."%') ";
		}

		if (isset($criterios['fecha_creacion'])) {
			$where .= " AND m.fecha_creacion LIKE '".$criterios['fecha_creacion']."%' ";
		}

		if (isset($criterios['fecha_recepcion'])) {
			$where .= " AND m.fecha_recepcion LIKE '".$criterios['fecha_recepcion']."%' ";
		}

		if (isset($criterios['fecha_tratamiento'])) {
			$where .= " AND m.fecha_tratamiento LIKE '".$criterios['fecha_tratamiento']."%' ";
		}

		if (isset($criterios['rechazados_por'])) {

			if ($criterios['rechazados_por'] == 'mi') {
				$where .= " AND m.rechazado_por = ".$criterios['establecimiento_id'];
			} else {
				$where .= " AND m.rechazado_por != ".$criterios['establecimiento_id'];
			}
		}

		return $where;
	}

	private function paginar_query($select, $from, $where, $group_by = '', $order_by = '')
	{
		$page = new Paginator();
		$count_obj = Manifiesto::find_by_sql("SELECT count(m.id) as cantidad ".$from.$where);
		$paginate = $page->paginate($count_obj[0]->cantidad);

		// query paginada
		$query = $select.$from.$where.$group_by.$order_by." LIMIT ".$page->limit;
		$manifiestos = Manifiesto::find_by_sql($query);

		return array($manifiestos, $paginate);
	}
}

?>
