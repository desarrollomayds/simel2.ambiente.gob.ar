<?
class TipoManifiesto extends ActiveRecord\Model
{
	// Mantengo los ids que se usaban por si estan siendo usados. Va de la mano con tabla `tipo_manifiestos`.
	const SIMPLE = 0;
	const MULTIPLE = 1;
	const SLOP = 2;
	const SIMPLE_RES_544_94 = 3;
	const SIMPLE_CONCENTRADOR = 4;

	static $table_name = 'tipo_manifiestos';
	static $tipo_manifiestos = array(0,1,2,3,4);
	static $has_many = array(
		array('residuos_permitidos','class_name' => 'PermisoTipoManifiesto', 'foreign_key' => 'tipo_manifiesto_id'),
	);

	/**
	 * Si devuelve vacio significa que no tiene limitaciones y opera con todos los residuos.
	 */
	public function getResiduosAsArray($tipo_manifiesto)
	{
		$array = array();
		$residuos = $this->find($tipo_manifiesto)->residuos_permitidos;
		foreach ($residuos as $res) {
			$array[$res->residuo] = $res->residuo;
		}
		return $array;
	}
}
?>
