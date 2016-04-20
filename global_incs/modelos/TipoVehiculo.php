<?
class TipoVehiculo extends ActiveRecord\Model
{
	static $table_name = 'cat_tipo_vehiculos';

	public static function get_all()
	{
		return TipoVehiculo::find('all', array('conditions' => array('flag = ?', 't')));
	}

	public static function get_descripcion_by_codigo($codigo)
	{
		$tipo = TipoVehiculo::find('first', array('conditions' => array('codigo = ?', $codigo)));

		if ($tipo) {
			$descripcion = $tipo->descripcion;
		} else {
			$descripcion = '';
		}

		return $descripcion;
	}
}


?>
