<?

class Vehiculo extends ActiveRecord\Model { 
	static $table_name = 'vehiculos';

	static $has_many = array(
								array('permisos_vehiculos', 'class_name' => 'PermisoVehiculo'),
							);

}

?>
