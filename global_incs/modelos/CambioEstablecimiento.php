<?
class CambioEstablecimiento extends ActiveRecord\Model
{
	static $table_name = 'cambios_establecimientos';

	static $belongs_to = array(
		array('solicitud', 'foreign_key' => 'solicitud_id', 'class_name' => 'CambioSolicitadoEstablecimiento')
	);

	public function aceptar()
	{
		switch ($this->tipo_cambio)
		{
			case 'A':
				$establecimiento = $this->agregarEstablecimiento();
				break;
			case 'E':
				$establecimiento = $this->editarEstablecimiento();
				break;
		}

		$this->estado = 'A';
		$this->fecha_procesado = new Datetime;
		$this->save();

		return $establecimiento;
	}

	public function rechazar()
	{
		$this->estado = 'R';
		$this->fecha_procesado = new Datetime;
		return $this->save();
	}

	private function agregarEstablecimiento()
	{
		$data = array(
			"empresa_id" => $this->empresa_id,
			"nombre" => $this->nombre,
			"usuario" => $this->usuario,
			"contrasenia" => $this->contrasenia,
			"salt" => $this->salt,
			"caa_numero" => $this->caa_numero,
			"caa_vencimiento" => $this->caa_vencimiento,
			"expediente_numero" => $this->expediente_numero,
			"expediente_anio" => $this->expediente_anio,
			"codigo_actividad" => $this->codigo_actividad,
			"descripcion" => $this->descripcion,
			"latitud" => $this->latitud,
			"longitud" => $this->longitud,
			"calle" => $this->calle,
			"calle_c" => $this->calle_c,
			"numero" => $this->numero,
			"numero_c" => $this->numero_c,
			"codigo_postal" => $this->codigo_postal,
			"codigo_postal_c" => $this->codigo_postal_c,
			"piso" => $this->piso,
			"piso_c" => $this->piso_c,
			"provincia" => $this->provincia,
			"provincia_c" => $this->provincia_c,
			"localidad" => $this->localidad,
			"localidad_c" => $this->localidad_c,
			"nomenclatura_catastral_circ" => $this->nomenclatura_catastral_circ,
			"nomenclatura_catastral_sec" => $this->nomenclatura_catastral_sec,
			"nomenclatura_catastral_manz" => $this->nomenclatura_catastral_manz,
			"nomenclatura_catastral_parc" => $this->nomenclatura_catastral_parc,
			"nomenclatura_catastral_sub_parc" => $this->nomenclatura_catastral_sub_parc,
			"habilitaciones" => $this->habilitaciones,
			"email" => $this->email,
			"tipo" => $this->tipo,
			"flag" => 't',
			"fecha_alta_drp" => new Datetime,
			"usuario_ultima_modificacion" => $_SESSION['INFORMACION_USUARIO']['ID'],
		);

		return Establecimiento::create($data);
	}

	private function editarEstablecimiento()
	{
		$establecimiento = Establecimiento::find($this->solicitud->establecimiento_id);
		$establecimiento->nombre = $this->nombre;
		$establecimiento->codigo_actividad = $this->codigo_actividad;
		$establecimiento->descripcion = $this->descripcion;
		$establecimiento->latitud = $this->latitud;
		$establecimiento->longitud = $this->longitud;
		$establecimiento->calle = $this->calle;
		$establecimiento->calle_c = $this->calle_c;
		$establecimiento->numero = $this->numero;
		$establecimiento->numero_c = $this->numero_c;
		$establecimiento->codigo_postal = $this->codigo_postal;
		$establecimiento->codigo_postal_c = $this->codigo_postal_c;
		$establecimiento->piso = $this->piso;
		$establecimiento->piso_c = $this->piso_c;
		$establecimiento->provincia = $this->provincia;
		$establecimiento->provincia_c = $this->provincia_c;
		$establecimiento->localidad = $this->localidad;
		$establecimiento->localidad_c = $this->localidad_c;
		$establecimiento->nomenclatura_catastral_circ = $this->nomenclatura_catastral_circ;
		$establecimiento->nomenclatura_catastral_sec = $this->nomenclatura_catastral_sec;
		$establecimiento->nomenclatura_catastral_manz = $this->nomenclatura_catastral_manz;
		$establecimiento->nomenclatura_catastral_parc = $this->nomenclatura_catastral_parc;
		$establecimiento->nomenclatura_catastral_sub_parc = $this->nomenclatura_catastral_sub_parc;
		$establecimiento->habilitaciones = $this->habilitaciones;
		$establecimiento->email = $this->email;

		$establecimiento->fecha_ultima_modificacion = new Datetime;
		$establecimiento->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		$establecimiento->save();

		return $establecimiento;
	}
}

?>
