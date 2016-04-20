<?
class PermisoTipoManifiesto extends ActiveRecord\Model
{
	// Mantengo los ids que se usaban por si estan siendo usados. Va de la mano con tabla `tipo_manifiestos`.
	const SIMPLE = 0;
	const MULTIPLE = 1;
	const SLOP = 2;
	const SIMPLE_RES_544_94 = 3;
	const SIMPLE_CONCENTRADOR = 4;

	static $table_name = 'permisos_tipo_manifiestos';

	static $belongs_to = array(
		array('tipo_manifiesto', 'class_name' => 'TipoManifiesto')
	);
}
?>
