<?
class TratamientoResiduo extends ActiveRecord\Model
{
	static $table_name = 'cat_operaciones_residuos';

	public function getByOperadorId($operador_id, $residuo = null)
	{
		$query = "SELECT pe.establecimiento_id,
					pe.residuo,
					cor.codigo,
					cor.descripcion

			FROM permisos_establecimientos pe,
			     cat_operaciones_residuos cor,
			     permisos_establecimientos_residuos per

			WHERE pe.id = per.permiso_establecimiento
			  AND cor.codigo = per.operacion_residuo
			  AND pe.establecimiento_id = ?";

		if ($residuo) {
			$query .= " AND pe.residuo = '$residuo'";
		}

		return Establecimiento::find_by_sql($query, array($operador_id));
	}
}
?>
