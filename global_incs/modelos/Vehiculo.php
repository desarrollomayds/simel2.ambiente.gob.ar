<?
class Vehiculo extends ActiveRecord\Model
{
	static $table_name = 'vehiculos';

	static $has_many = array(
		array('permisos_vehiculos', 'class_name' => 'PermisoVehiculo'),
	);

	public static function getVehiculosConPermisos($establecimiento_id, $permisos, $excluir_barcazas = false)
	{
		$vehiculos = array();

		$query = "SELECT v.id AS vehiculo_id, v.dominio, v.descripcion, v.tipo_vehiculo, v.tipo_caja, v.flag, pv.residuo
				  FROM vehiculos v
				  INNER JOIN permisos_vehiculos pv
				    ON (v.id = pv.vehiculo_id)

 				  WHERE v.establecimiento_id = ".$establecimiento_id."
 				    AND v.flag = 't'
 				    AND pv.flag = 't'
				    AND pv.residuo IN ('".implode("', '", $permisos)."') ";

		if ($excluir_barcazas) {
			$query .= " AND v.tipo_vehiculo = 'BA' ";
		}

		$query .= " GROUP BY v.id, pv.residuo";

		$resultado = Vehiculo::find_by_sql($query);

		if ($resultado) {
			foreach ($resultado as $row) {
				$veh = array();
				$veh['ID'] = $row->vehiculo_id;
				$veh['DOMINIO'] = $row->dominio;
				$veh['DESCRIPCION'] = $row->descripcion;
				$veh['TIPO_VEHICULO'] = $row->tipo_vehiculo;
				$veh['TIPO_CAJA'] = $row->tipo_caja;

				$vehiculos[] = $veh;
			}
		}

		return $vehiculos;
	}

}

?>
