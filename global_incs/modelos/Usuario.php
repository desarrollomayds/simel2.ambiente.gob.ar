<?
class Usuario extends ActiveRecord\Model
{
	static $table_name = 'cat_usuario';

	public function get_modulos_disponibles()
	{
		$modulos = array();
		$pm = new PermisosModulos;
		$rows = $pm->obtenePermisosUsuario($this->id);

		foreach ($rows as $row) {
			$m = ModuloAdministracion::find($row->modulo_id);
			$modulos[$m->modid] = $m;
		}

		return $modulos;
	}
}
?>
