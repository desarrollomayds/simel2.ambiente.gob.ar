<?
class CambioVehiculo extends ActiveRecord\Model
{
	static $table_name = 'cambios_vehiculos';

	static $belongs_to = array(
		array('solicitud', 'foreign_key' => 'solicitud_id', 'class_name' => 'CambioSolicitadoEstablecimiento')
	);

	public function aceptar()
	{
		switch ($this->tipo_cambio)
		{
			case 'A':
				$vehiculo = $this->agregarVehiculo();
				break;
			case 'E':
				$vehiculo = $this->editarVehiculo();
				break;
			case 'B':
				$vehiculo = $this->borrarVehiculo();
				break;
		}

		$this->estado = 'A';
		$this->fecha_procesado = new Datetime;
		$this->save();

		return $vehiculo;
	}

	private function agregarVehiculo()
	{
		$data = array(
			"establecimiento_id" => $this->solicitud->establecimiento_id,
			"dominio" => $this->dominio,
			"tipo_vehiculo" => $this->tipo_vehiculo,
			"tipo_caja" => $this->tipo_caja,
			"descripcion" => $this->descripcion,
			"flag" => 't',
			"fecha_ultima_modificacion" => new Datetime,
			"usuario_ultima_modificacion" => $_SESSION['INFORMACION_USUARIO']['ID'],
		);

		return Vehiculo::create($data);
	}

	private function editarVehiculo()
	{
		$vehiculo = Vehiculo::find($this->vehiculo_id);
		$vehiculo->dominio = $this->dominio;
		$vehiculo->tipo_vehiculo = $this->tipo_vehiculo;
		$vehiculo->tipo_caja = $this->tipo_caja;
		$vehiculo->descripcion = $this->descripcion;
		$vehiculo->flag = 't';
		$vehiculo->fecha_ultima_modificacion = new Datetime;
		$vehiculo->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
		$vehiculo->save();

		return $vehiculo;
	}

	private function borrarVehiculo()
	{
		$vehiculo = Vehiculo::find($this->vehiculo_id);

		// borramos logico los permisos relacionados
		foreach ($vehiculo->permisos_vehiculos as $pv) {
			$pv->flag = 'f';
			$pv->save();
		}

		$vehiculo->flag = 'f';
		$vehiculo->fecha_ultima_modificacion = new Datetime;
		$vehiculo->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
		$vehiculo->save();

		return $vehiculo;
	}

	public function rechazar()
	{
		$this->estado = 'R';
		$this->fecha_procesado = new Datetime;
		return $this->save();
	}
}

?>
