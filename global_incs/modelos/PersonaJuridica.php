<?php
class PersonaJuridica extends ActiveRecord\Model
{
	static $table_name = 'personas_juridicas';
	// static $primary_key = 'pejID';

	// agregar checkeo empresas
	public static function find_by_cuit($cuit)
	{	
		$res = PersonaJuridica::find_by_sql("SELECT * FROM ".self::$table_name." WHERE pejID = '".$cuit."' LIMIT 1");
		return $res[0];
	}

	public static function get_RazonSocial($cuit)
	{
		$res = PersonaJuridica::find('first', array('conditions' => array('pejID = ?', $cuit)));

		if($res)
		{
			$res = $res->pejrazonsocial;
		}

		return $res;
	}

}

?>