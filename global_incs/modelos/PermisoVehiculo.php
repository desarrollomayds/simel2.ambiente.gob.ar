<?

class PermisoVehiculo extends ActiveRecord\Model { 
	static $table_name = 'permisos_vehiculos';

	static $belongs_to = array(
		array('vehiculo'),
	);

	public function getPermisosVehiculosByEstablecimiento($establecimiento)
	{
		$query = "SELECT v.id as vehiculo_id, pv.residuo as residuo FROM establecimientos e, vehiculos v, permisos_vehiculos pv
				WHERE 
					v.establecimiento_id = e.id
					AND pv.vehiculo_id = v.id
					AND e.id = ?
				GROUP BY v.id, pv.id";

		return PermisoVehiculo::find_by_sql($query, array($establecimiento->id));
	}
}

?>
