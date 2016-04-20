<?
class TipoCaja extends ActiveRecord\Model
{
	static $table_name = 'cat_tipo_cajas';

	public static function get_all()
	{
		return TipoCaja::find('all', array('conditions' => array('flag = ?', 't')));
	}

	public static function get_descripcion_by_codigo($codigo)
	{
		$tipo = TipoCaja::find('first', array('conditions' => array('codigo = ?', $codigo)));

		if ($tipo) {
			$descripcion = $tipo->descripcion;
		} else {
			$descripcion = '';
		}

		return $descripcion;
	}
}
?>
