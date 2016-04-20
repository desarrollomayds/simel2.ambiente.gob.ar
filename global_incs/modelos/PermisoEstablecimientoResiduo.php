<?

class PermisoEstablecimientoResiduo extends ActiveRecord\Model
{
	static $table_name = 'permisos_establecimientos_residuos';

	static $belongs_to = array(
		array('permisos_establecimientos', 'class_name' => 'PermisoEstablecimiento'),
	);
}

?>
