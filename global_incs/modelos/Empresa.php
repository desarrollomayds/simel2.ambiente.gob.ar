<?
class Empresa extends ActiveRecord\Model
{
	static $has_many = array(
		array('establecimientos'),
		array('representantes_legales', 'class_name' => 'RepresentanteLegal'),
		array('representantes_tecnicos', 'class_name' => 'RepresentanteTecnico'),
	);

	// doc: http://www.phpactiverecord.org/projects/main/wiki/Validations#validates_presence_of
	static $validates_presence_of = array(
		array('nombre', 'message' => 'Debe indicar el nombre de la empresa.'),
		array('calle', 'message' => 'Debe indicar la calle.'),
		array('piso', 'message' => 'Debe indicar el piso'),
		array('codigo_postal', 'message' => 'Debe indicar el c&oacute;digo postal'),
		array('numero_telefonico', 'message' => 'Indicar un tel&eacute;fono en caso de emergencias.'),
	);

	// doc: http://www.phpactiverecord.org/projects/main/wiki/Validations#validates_numericality_of
	static $validates_numericality_of = array(
		array('cuit', 'greater_than' => 0, 'message' => 'Debe indicar el nombre de la empresa.'),
		array('numero', 'greater_than_or_equal_to' => 0, 'message' => 'Debe indicar el número de la calle.'),
		array('provincia', 'greater_than' => 0, 'message' => 'Debe indicar una provincia.'),
		array('localidad', 'greater_than_or_equal_to' => 0, 'message' => 'Debe indicar una localidad.'),
	);

	public function obtener_por_cuit($cuit, $empresa_naviera = false)
	{
		$resultado = array();

		if (is_numeric($cuit))
		 	$resultado = Empresa::find(array('cuit' => $cuit)); {
		}

		return $resultado;
	}

	public function activa()
	{
		return ($this->flag == 't');
	}

	public function inactiva()
	{
		return ($this->flag != 't');
	}

	// los armo manualmente en la estructura que quiero porque el metodo $this->errors->full_messages() no me resuelve lo que necesito
	public function getErrors()
	{
		$errors = array();
		$errors['nombre'] = $this->errors->on('nombre');
		$errors['calle'] = $this->errors->on('calle');
		$errors['codigo_postal'] = $this->errors->on('codigo_postal');
		$errors['piso'] = $this->errors->on('piso');
		$errors['cuit'] = $this->errors->on('cuit');
		$errors['numero'] = $this->errors->on('numero');
		$errors['provincia'] = $this->errors->on('provincia');
		$errors['localidad'] = $this->errors->on('localidad');
		$errors['numero_telefonico'] = $this->errors->on('numero_telefonico');

		return $errors;
	}

	public function get_listado_registros_pendientes($criterio = NULL)
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");

		$total_results = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?) and flag = ? and (asignado_a IS NULL or asignado_a = ?)', $criterio, $criterio, 'p', $_SESSION['INFORMACION_USUARIO']['ID'])));

		$page = new Paginator();
		$paginate = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

		$valores = explode(",", $page->limit);

		$pendientes = Empresa::find('all', array(
			'conditions' => array('(cuit like ? or nombre like ?) and flag = ? and (asignado_a IS NULL or asignado_a = ?)', $criterio, $criterio, 'p', $_SESSION['INFORMACION_USUARIO']['ID']),
			'limit' => $valores['1'],
			'offset' => $valores['0'],
			'order' => 'id desc'
		));

		return array($pendientes, $paginate);
	}

	public function get_listado_registros_rechazados($criterio = NULL)
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");

		$total_results = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?) and flag = ?', $criterio, $criterio, 'r')));

		$page = new Paginator();
		$paginate = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

		$valores = explode(",", $page->limit);

		// obtenemos los rows paginados aplicando criterio de busqueda
		$rechazados = Empresa::find('all', array(
			'conditions' => array('(cuit like ? or nombre like ?) and flag = ? and (asignado_a IS NULL or asignado_a = ?)', $criterio, $criterio, 'r', $_SESSION['INFORMACION_USUARIO']['ID']),
			'limit' => $valores['1'],
			'offset' => $valores['0'],
			'order' => 'id desc'
		));

		return array($rechazados, $paginate);
	}

	public function get_listado_registros($criterio = NULL, $id = NULL)
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		if ($id){
			$total_results = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?) and id = ?', $criterio, $criterio, $id)));
		} else {
			$total_results = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?)', $criterio, $criterio)));
		}

		$page = new Paginator();
		$paginate = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

		$valores = explode(",", $page->limit);

		// obtenemos los rows paginados aplicando criterio de busqueda
		if ($id){
			$empresas = Empresa::find('all', array(
				'conditions' => array('(cuit like ? or nombre like ?) and id = ?', $criterio, $criterio, $id),
				'limit' => $valores['1'],
				'offset' => $valores['0'],
				'order' => 'id desc'
			));
		} else {
			$empresas = Empresa::find('all', array(
				'conditions' => array('(cuit like ? or nombre like ?)', $criterio, $criterio),
				'limit' => $valores['1'],
				'offset' => $valores['0'],
				'order' => 'id desc'
			));
		}

		return array($empresas, $paginate);
	}

	public function get_listado_registros_totales($criterio = NULL)
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");

		$total_results = Empresa::count(array('conditions' => array('(cuit like ? or nombre like ?) and (asignado_a IS NULL or asignado_a = ?)', $criterio, $criterio, $_SESSION['INFORMACION_USUARIO']['ID'])));

		$page = new Paginator();
		$paginate = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

		$valores = explode(",", $page->limit);

		$pendientes = Empresa::find('all', array(
			'conditions' => array('(cuit like ? or nombre like ?)', $criterio, $criterio),
			'limit' => $valores['1'],
			'offset' => $valores['0'],
			'order' => 'id desc'
		));

		return array($pendientes, $paginate);
	}

}

?>
