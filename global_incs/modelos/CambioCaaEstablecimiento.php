<?
class CambioCaaEstablecimiento extends ActiveRecord\Model
{
	static $table_name = 'cambios_caa_establecimientos';

	static $belongs_to = array(
		array('solicitud', 'foreign_key' => 'solicitud_id', 'class_name' => 'CambioSolicitadoEstablecimiento')
	);

	public function aceptar()
	{
		switch ($this->tipo_cambio)
		{
			case 'E':
				$establecimiento = $this->editarCaa();
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

	private function editarCaa()
	{
		$establecimiento = Establecimiento::find($this->solicitud->establecimiento_id);
		$establecimiento->caa_numero = $this->caa_numero_new;
		$establecimiento->caa_vencimiento = $this->caa_vencimiento_new;

		$establecimiento->fecha_ultima_modificacion = new Datetime;
		$establecimiento->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

		$establecimiento->save();

		return $establecimiento;
	}
}

?>
