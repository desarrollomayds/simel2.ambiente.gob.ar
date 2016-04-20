<?
class CambioPermisoEstablecimiento extends ActiveRecord\Model
{
	static $table_name = 'cambios_permisos_establecimientos';

	static $belongs_to = array(
		array('solicitud', 'foreign_key' => 'solicitud_id', 'class_name' => 'CambioSolicitadoEstablecimiento')
	);

	public function aceptar($establecimiento = NULL)
	{
		switch ($this->tipo_cambio)
		{
			case 'A':
				$this->agregarPermisoEstablecimiento($establecimiento);
				break;
			case 'E':
				$this->editarPermisoEstablecimiento($establecimiento);
				break;
			case 'B':
				$this->borrarPermisoEstablecimiento($establecimiento);
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

	private function agregarPermisoEstablecimiento($establecimiento)
	{
		if (is_null($establecimiento)) {
			$establecimiento = Establecimiento::find($this->solicitud->establecimiento_id);
		}
		// var_dump($this->solicitud->empresa_id, $this->solicitud->establecimiento_id);
		$data = array(
			'establecimiento_id' => $establecimiento->id,
			'residuo' => $this->residuo,
			'cantidad' => $this->cantidad,
			'fecha_ultima_modificacion' => new Datetime,
			"usuario_ultima_modificacion" => $_SESSION['INFORMACION_USUARIO']['ID'],
		);

		$nuevo_permiso = PermisoEstablecimiento::create($data);

		// un operador tambien define los tratamientos
		if ($establecimiento->tipo == Establecimiento::OPERADOR) {
			$tratamientos = $this->tratamientos ? json_decode($this->tratamientos) : array();

			foreach ($tratamientos as $trat) {
				$nuevo_permiso->create_tratamientos(array('operacion_residuo' => $trat));
			}
		}
	}

	private function editarPermisoEstablecimiento($establecimiento)
	{
		$permiso = PermisoEstablecimiento::find($this->permiso_id);
		$permiso->residuo = $this->residuo;
		$permiso->cantidad = $this->cantidad;
		$permiso->fecha_ultima_modificacion = new Datetime;
		$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		if (is_null($establecimiento)) {
			$establecimiento = Establecimiento::find($this->solicitud->establecimiento_id);
		}
		// un operador tambien edita los tratamientos.
		if ($establecimiento->tipo == Establecimiento::OPERADOR) {
			// borro los previos para grabar los nuevos
			foreach ($permiso->tratamientos as $old_trat) {
				$old_trat->delete();
			}
			// genero los nuevos
			$tratamientos = $this->tratamientos ? json_decode($this->tratamientos) : array();
			foreach ($tratamientos as $new_trat) {
				$permiso->create_tratamientos(array('operacion_residuo' => $new_trat));
			}
		}

		$permiso->save();
	}

	// borrado logico
	private function borrarPermisoEstablecimiento($establecimiento)
	{
		$permiso = PermisoEstablecimiento::find($this->permiso_id);

		if (is_null($establecimiento)) {
			$establecimiento = Establecimiento::find($this->solicitud->establecimiento_id);
		}
		// si es operador primero borro los tratamientos asociados
		if ($establecimiento->tipo == Establecimiento::OPERADOR) {
			foreach ($permiso->tratamientos as $trat) {
				$trat->delete();
			}
		}

		$permiso->flag = 'f';
		$permiso->fecha_ultima_modificacion = new Datetime;
		$permiso->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		$permiso->save();
	}

}

?>
