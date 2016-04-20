<?
class CambioPermisoVehiculo extends ActiveRecord\Model
{
	static $table_name = 'cambios_permisos_vehiculos';

	static $belongs_to = array(
		array('solicitud', 'foreign_key' => 'solicitud_id', 'class_name' => 'CambioSolicitadoEstablecimiento')
	);

	public function aceptar()
	{
		switch ($this->tipo_cambio)
		{
			case 'A':
				$this->agregarPermisoVehiculo();
				break;
			case 'E':
				$this->editarPermisoVehiculo();
				break;
			case 'B':
				$this->borrarPermisoVehiculo();
				break;
		}

		$this->estado = 'A';
		$this->fecha_procesado = new Datetime;

		return $this->save();
	}

	public function rechazar()
	{
		$this->estado = 'R';
		$this->fecha_procesado = new Datetime;
		return $this->save();
	}

	private function agregarPermisoVehiculo()
	{
		$data = array(
			'vehiculo_id' => $this->vehiculo_id,
			'residuo' => $this->residuo,
			'cantidad' => $this->cantidad,
			'estado' => $this->estado,
			'flag' => 't',
			'fecha_ultima_modificacion' => new Datetime,
			"usuario_ultima_modificacion" => $_SESSION['INFORMACION_USUARIO']['ID'],
		);

		PermisoVehiculo::create($data);
	}

	private function editarPermisoVehiculo()
	{
		$permiso = PermisoVehiculo::find($this->vehiculo_permiso_id);
		$permiso->residuo = $this->residuo;
		$permiso->cantidad = $this->cantidad;
		$permiso->estado = $this->estado;
		$permiso->fecha_ultima_modificacion = new Datetime;
		$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		$permiso->save();
	}

	// borrado logico
	private function borrarPermisoVehiculo()
	{
		$permiso = PermisoVehiculo::find($this->vehiculo_permiso_id);
		$permiso->flag = 'f';
		$permiso->fecha_ultima_modificacion = new Datetime;
		$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		$permiso->save();
	}
}

?>
