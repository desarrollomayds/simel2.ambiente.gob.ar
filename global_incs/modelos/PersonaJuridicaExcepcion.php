<?php
class PersonaJuridicaExcepcion extends ActiveRecord\Model
{
	static $table_name = 'personas_juridicas_excepciones';

	static $validates_numericality_of = array(
		array('cuit', 'greater_than' => 0, 'message' => 'Indique el CUIT.'),
	);

	static $validates_presence_of = array(
		array('razon_social', 'message' => 'Indique la raz&oacute;n social.'),
	);

	public static function find_by_cuit($cuit)
	{	
		$res = PersonaJuridica::find_by_sql("SELECT * FROM ".self::$table_name." WHERE cuit = '".$cuit."' LIMIT 1");
		return $res[0];
	}

	public function get_listado_excepciones($criterio)
	{
		$page = new Paginator();
		$where = " WHERE activo = 'y' ";

		if ($criterio) {
			$where .= " AND (cuit LIKE '%$criterio%' OR razon_social LIKE '%$criterio%') ";
		}

		$count_obj = Manifiesto::find_by_sql("SELECT count(id) as cantidad FROM personas_juridicas_excepciones $where");
		$paginate = $page->paginate($count_obj[0]->cantidad);

		$query = "SELECT * FROM personas_juridicas_excepciones $where ORDER BY id DESC LIMIT ".$page->limit;
		$manifiestos = Manifiesto::find_by_sql($query);

		return array($manifiestos, $paginate);
	}

	public function getErrors()
	{
		$errors = array();

		if ($this->errors->on('cuit')) {
			$errors['cuit'] = $this->errors->on('cuit');
		}

		if ($this->errors->on('razon_social')) {
			$errors['razon_social'] = $this->errors->on('razon_social');
		}

		return $errors;
	}

}
