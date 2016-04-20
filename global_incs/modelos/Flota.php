<?

class Flota extends ActiveRecord\Model { 

	static $has_many = array(
		array('vehiculos_flota', 'class_name' => 'VehiculoFlota'),
	);

	public static function getFlotasConPermisos($establecimiento_id, $permisos)
	{
		$flotas = array();

		$query = "  SELECT f.id AS flota_id, 
					f.descripcion AS flota_descripcion, 
					e.id AS establecimiento_id, 
					v.id AS vehiculo_id, 
					v.dominio, 
					v.descripcion, 
					v.tipo_vehiculo, 
					v.tipo_caja, 
					pv.residuo

					FROM establecimientos e

					INNER JOIN flotas f
					  ON (f.establecimiento_id = e.id AND e.id=".$establecimiento_id.")
					INNER JOIN vehiculos_flota vf
					  ON (vf.flota_id = f.id)  
					INNER JOIN vehiculos v
					  ON (v.id = vf.vehiculo_id)
					INNER JOIN permisos_vehiculos pv
					  ON (pv.vehiculo_id = v.id)
					  
					WHERE v.flag = 't'
					  AND pv.flag = 't'
					  AND pv.residuo IN ('".implode("', '", $permisos)."')

					GROUP BY f.id, v.id, pv.residuo";
	
		$resultado = Flota::find_by_sql($query);

		if ($resultado) {
			foreach ($resultado as $row) {

				$flotas[$row->flota_id] = array(
					'ID' => $row->flota_id,
					'ESTABLECIMIENTO_ID' => $row->establecimiento_id,
					'DESCRIPCION' => $row->flota_descripcion,
				);

				$flotas[$row->flota_id]['VEHICULOS'][] = array(
					'ID' => $row->vehiculo_id,
					'DOMINIO' => $row->dominio,
					'DESCRIPCION' => $row->descripcion,
					'TIPO_VEHICULO' => $row->tipo_vehiculo,
					'TIPO_CAJA' => $row->tipo_caja,
				);
			}
		}

		return $flotas;
	}

	public static function getVehiculosFlotaConPermisos($flota_id, $permisos)
	{
		$vehiculos = array();

		$query = "  SELECT
					v.id AS vehiculo_id, 
					v.dominio, 
					v.descripcion, 
					v.tipo_vehiculo, 
					v.tipo_caja

					FROM flotas f

					INNER JOIN vehiculos_flota vf
					  ON (vf.flota_id = f.id AND f.id = ".$flota_id.")
					INNER JOIN vehiculos v
					  ON (v.id = vf.vehiculo_id)
					INNER JOIN permisos_vehiculos pv
					  ON (pv.vehiculo_id = v.id)
					  
					WHERE v.flag = 't'
					  AND pv.flag = 't'
					  AND pv.residuo IN ('".implode("', '", $permisos)."')

					GROUP BY f.id, v.id, pv.residuo";
	
		$resultado = Flota::find_by_sql($query);

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
