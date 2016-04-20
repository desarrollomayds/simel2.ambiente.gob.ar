<?
class PermisoEstablecimiento extends ActiveRecord\Model
{
	static $table_name = 'permisos_establecimientos';

	static $belongs_to = array(
		array('establecimiento'),
	);

	static $has_many = array(
		array('tratamientos',  'foreign_key' => 'permiso_establecimiento', 'class_name' => 'PermisoEstablecimientoResiduo'),
	);

	public function obtener_permisos_en_comun($est_uno, $est_dos)
	{

		$residuos_uno = $residuos_dos = $residuos_tres = array();
		foreach ($est_uno->permisos_establecimientos as $perm) {
			$residuos_uno[] = $perm->residuo;
		}

		foreach ($est_dos->permisos_establecimientos as $perm) {
			$residuos_dos[] = $perm->residuo;
		}

		return array_intersect($residuos_uno, $residuos_dos);
	}
}

?>
