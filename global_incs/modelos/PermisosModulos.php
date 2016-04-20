<?

/**
 * PermisosModulos
 *
 *  Clase particular de la tabla permisos_modulos_administracion
 *
 * @package
 * @author maranda
 * @copyright Copyright (c) 2015
 * @version $Id$
 * @access public
 */
class PermisosModulos extends ActiveRecord\Model {
	static $table_name = 'permisos_modulos_administracion';

	/**
	 * PermisosModulos::obtenePermisosUsuario()
	 *
	 * Obtiene los permisos de un usuario en particular
	 *
	 * @return
	 */
	public function obtenePermisosUsuario($usuario_id,$modulo_id=false)
	{
		$params = array();
		$query = "
			SELECT
				MDL.modID as modulo_id,
				PER.perEstado as estado
			FROM
				permisos_modulos_administracion PER,
			    modulos_administracion MDL,
			    cat_usuario USU,
			    permisos_roles_modulos_administracion PRM
			WHERE
				MDL.modID = PER.modID
				AND MDL.modEstado = 'A'
				AND USU.id = ?
				AND USU.codigo_rol = PRM.codigo_rol
				AND PER.perEstado = 'S'
				AND PRM.modID = MDL.modID
				AND PER.usuario_id = USU.id
			  	 ";

		$params[] = $usuario_id;

		if ($modulo_id) {
			$query.= " AND MDL.modID = ?";
			$params[] = $modulo_id;
		}

		return  self::find_by_sql($query, $params);
	}
}
?>
