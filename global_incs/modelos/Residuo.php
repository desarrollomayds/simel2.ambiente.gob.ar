<?

class Residuo extends ActiveRecord\Model
{ 
	static $table_name = 'cat_residuos_peligrosos';

	public static function get_all()
	{
		return Residuo::find('all', array('conditions' => array('flag = ?', 't')));
	}

	public static function get_residuos_by_establecimiento(Establecimiento $establecimiento)
	{
		$result = array();
		foreach ($establecimiento->permisos_establecimientos as $perm) {
			$result[] = Residuo::find('first', array('conditions' => array('codigo = ? AND flag = ?',  $perm->residuo, 't')));
		}

		return $result;
	}
}
?>
