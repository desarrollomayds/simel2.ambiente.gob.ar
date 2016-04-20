<?php

class manifiestos extends mel
{
	private $creador;
	private $tipo_manifiesto;
	private $error = false;
	private $errors = array();
	private $validated = false;
	private $manifiesto;
	private $manifiesto_padre = null;

	protected $generadores = array();
	protected $transportista = array();
	protected $operador = array();

	protected $vehiculos = array();
	protected $residuos = array();

	protected $observaciones = null;
	protected $generar_documento = false;

	public function create($creador, $tipo_manifiesto)
	{
		$this->creador = $creador;
		$this->tipo_manifiesto = $tipo_manifiesto;
	}

	public function getKey($key)
	{
		if ($this->manifiesto) {
			return $this->manifiesto->{$key};
		}

		return null;
	}

	/**
	 * Para el unico caso que vamos a generar el documento en esta etapa es para el Manif SLOP Relacionado,
	 * con el objetivo que todo el proceso qeude dentro de una transaccion.
	 */
	public function generarDocumentoManifiesto($value = false)
	{
		$this->generar_documento = $value;
	}

	public function setManifiestoPadre($manifiesto_padre)
	{
		$this->manifiesto_padre = $manifiesto_padre;
	}

	public function setObservaciones($value)
	{
		$this->observaciones = $value;
	}

	public function addGenerador($gen)
	{
		$generador = obtener_informacion_por_establecimiento($gen['ID']);

		if ( ! empty($generador)) {
			if ($this->tipo_manifiesto == TipoManifiesto::MULTIPLE) {
				$generador['ESTABLECIMIENTO']['CANT_RESIDUO'] = $gen['CANT_RESIDUO'];
			}
			$this->generadores[] = $generador;
		}
	}

	public function addTransportista($transportista)
	{
		$transportista = obtener_informacion_por_establecimiento($transportista['ID']);
		$this->transportista = $transportista;
	}

	public function addOperador($operador)
	{
		$operador = obtener_informacion_por_establecimiento($operador['ID']);
		$this->operador = $operador;
	}

	public function addVehiculo($vehiculo)
	{
		$this->vehiculos[] = $vehiculo;
	}

	public function addResiduo($residuo)
	{
		$this->residuos[] = $residuo;
	}

	public function getErrors()
	{
		return $this->errors;
	}

	public function validate()
	{
		// validaciones en comun para todo tipo de manifiesto
		$this->validarCAATransportista();
		$this->validarCAAOperador();
		$this->validarGeneradores();
		$this->validarTransportista();
		$this->validarOperador();
		$this->validarVehiculos();
		$this->validarResiduos();
		//$this->validarFormularios();

		$this->validated = true;
		return empty($this->errors);
	}

	private function validarCAATransportista()
	{
		if (isset($this->transportista['CAA_VENCIMIENTO_DIAS']) AND $this->transportista['CAA_VENCIMIENTO_DIAS'] <= 0) {
			$this->errors['caa_transportista'] = $this->getMessageText("manifiesto::07300001");
		}
	}

	// Para MANIFIESTO_SIMPLE_CONCENTRADOR no queremos validar el caa del operador porque es
	// un generador, por ende, puede que tenga el caa vencido (caa es opcional para generadores).
	private function validarCAAOperador()
	{
		if ($this->tipo_manifiesto != TipoManifiesto::SIMPLE_CONCENTRADOR) {
			if (isset($this->operador['CAA_VENCIMIENTO_DIAS']) AND $this->operador['CAA_VENCIMIENTO_DIAS'] <= 0) {
				$this->errors['caa_operador'] = $this->getMessageText("manifiesto::07300002");
			}
		}
	}

	// No se validan generadores cuando es un MANIFIESTO_SIMPLE_RES_544_94
	private function validarGeneradores()
	{
		if ($this->tipo_manifiesto != TipoManifiesto::SIMPLE_RES_544_94) {
			if (empty($this->generadores)) {
				$this->errors['generador'] = $this->getMessageText("manifiesto::07300007");
			}
		}

		if ($this->tipo_manifiesto == TipoManifiesto::MULTIPLE) {
			foreach ($this->generadores as $gen) {
				if ($gen['ESTABLECIMIENTO']['CANT_RESIDUO'] == 0) {
					$this->errors['generador'] = $this->getMessageText("manifiesto::07300010");
				}
			}
		}
	}

	private function validarTransportista()
	{
		if (empty($this->transportista)) {
			$this->errors['transportista'] = $this->getMessageText("manifiesto::07300003");
		}
	}

	private function validarOperador()
	{
		if (empty($this->operador)) {
			$this->errors['operador'] = $this->getMessageText("manifiesto::07300004");
		}
	}

	// Los vehiculos solo son validados cuando el creador del manifiesto es un transportista
	private function validarVehiculos()
	{
		if ($this->creador['TIPO'] == Establecimiento::TRANSPORTISTA) {
			if (empty($this->vehiculos)) {
				$this->errors['vehiculo'] = $this->getMessageText("manifiesto::07300005");
			}
		}
	}

	/**
	 * Validamos presencia de residuos para todo tipo de manifiesto.
	 */
	private function validarResiduos()
	{
		if (empty($this->residuos)) {
			$this->errors['residuo'] = $this->getMessageText("manifiesto::07300006");
			return;
		}

		if ($this->tipo_manifiesto == TipoManifiesto::MULTIPLE) {
			$estimacion_total = 0;
			foreach ($this->generadores as $gen) {
				$estimacion_total_por_generador += $gen['ESTABLECIMIENTO']['CANT_RESIDUO'];
			}
			// el manifiesto multiple solo opera con un solo residuo
			if ($estimacion_total_por_generador != $this->residuos[0]['CANTIDAD_ESTIMADA']) {
				$this->errors['residuo'] = $this->getMessageText("manifiesto::07300011");
			}
		}
	}

	/**
	 * Validamos que queden formularios en N
	 */
	private function validarFormularios()
	{
		//falidacion de formularios
		$form = new formularios;
		if (!$form->cantidadDeFormulariosNPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])){
			$this->errors['formularios'] = $this->getMessageText("manifiesto::07300012");
		}
	}

	/**
	 * Genera el manifiesto y sus relaciones: generador, transportista, operador, residuos y vehiculos.
	 * Cuando el/los generador/es eran un alta temprana tambien se les genera los permisos acorde a los residuos
	 * elegidos para trabajar en el manifiesto.
	 */
	public function save()
	{
		if ($this->validated)
		{
			try {
				$conexion = Manifiesto::connection();
				$conexion->transaction();
				// creacion manifiesto
				$this->manifiesto = $this->createManifiesto();

				$form = new formularios;
				$form->relacionarFormularioConManifiesto($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $this->manifiesto->id);

				if ($this->usaGeneradores()) {
					$this->createRelacionGeneradores();
				}

				$this->createRelacionTransportista();
				$this->createRelacionOperador();

				if ($this->creador['TIPO'] == Establecimiento::TRANSPORTISTA) {
					$this->createRelacionVehiculos();
				}

				$this->createRelacionResiduos();

				if ($this->generar_documento) {
					$documento_manifiesto = new documentos_manifiestos;
					$documento_manifiesto->generate($this->manifiesto, DocumentoManifiesto::MANIFIESTO);
				}

				// graba row en la tabla de emails para que se envie un email a los participantes del manifiesto.
				$this->save_email_row_alert();
				$conexion->commit();

			} catch (\Exception $e) {
				$conexion->rollback();
				$this->errors = array('error' => $e->getMessage());
			}
		}
		else
		{
			throw new Exception("Antes de invocar el save() debes validar los datos cargados con validate()");
		}
	}

	// manifiesto simple MANIFIESTO_SIMPLE_RES_544_94 no usa generador/es
	private function usaGeneradores()
	{
		return ($this->tipo_manifiesto != TipoManifiesto::SIMPLE_RES_544_94);
	}

	private function createManifiesto()
	{
		$data = array(
			'fecha_creacion'  => new Datetime,
			'tipo_manifiesto' => $this->tipo_manifiesto,
			'establecimiento_creador' => $this->creador['ID'],
			'id_protocolo_manifiesto' => 0,
			'observaciones' => $this->observaciones,
		);

		// estoy creando un manifiesto SLOP Relacionado. Seteo el padre y lo autoapruebo.
		if ($this->isRelatedSLOP()) {
			$data['manifiesto_padre'] = $this->manifiesto_padre['ID'];
			$data['fecha_aceptacion'] = new Datetime;
			$data['estado'] = Manifiesto::APROBADO;

			$manifiesto = Manifiesto::find('last', array('conditions' => array('id_protocolo_manifiesto <> 0'), 'order' => 'id_protocolo_manifiesto asc'));
			$proximo_id = $manifiesto->id_protocolo_manifiesto + 1;
			$data['id_protocolo_manifiesto'] = $proximo_id;
		}

		if ( ! $this->autoAprobadoPorDRP()) {
			$data['estado_autorizacion_drp'] = 0;
		}

		return Manifiesto::create($data);
	}

	// Solo el tipo de manifiesto MANIFIESTO_SIMPLE_CONCENTRADOR queda pendiente de aprobar por la DRP
	private function autoAprobadoPorDRP()
	{
		return $this->tipo_manifiesto != TipoManifiesto::SIMPLE_CONCENTRADOR;
	}

	private function formatDataParticipante($establecimiento)
	{
		$data = array_change_key_case($establecimiento['ESTABLECIMIENTO'], CASE_LOWER);
		$data['manifiesto_id'] = $manifiesto->id;
		$data['empresa_id'] = $establecimiento['EMPRESA']['ID'];
		$data['estado'] = 'p';

		// renombramos campos como son esperados en la base
		$data['establecimiento_id'] = $data['id'];
		$data['codigo_actividad'] = $data['actividad'];
		$data['latitud'] = $data['latitud_r'];
		$data['longitud'] = $data['longitud_r'];

		// sacamos los datos innecesarios del array
		unset($data['id'], $data['cuit'],$data['nombre_empresa'], $data['usuario'],
			$data['contrasenia'], $data['caa_vencimiento_dias'], $data['actividad'], 
			$data['latitud_r'], $data['longitud_r'], $data['calle_r'], $data['numero_r'], 
			$data['piso_r'], $data['provincia_r'], $data['localidad_r'], $data['tipo_'],
			$data['actividad_'], $data['provincia_'], $data['localidad_'], $data['provincia_r_'],
			$data['localidad_r_'], $data['provincia_c_'], $data['localidad_c_'], $data['email'],
			$data['cpostal_c'], $data['cpostal_r'], $data['flag']
		);

		return $data;
	}

	private function createRelacionGeneradores()
	{
		foreach ($this->generadores as $generador) {

			$data = $this->formatDataParticipante($generador);

			// El generador es autoaprobado si:
			// - el manif es creado por un generador
			// - el generador es un alta temprana
			// - estamos trabajando con un manif MULTIPLE
			// - estamos trabajando con un manif SLOP
			if ($this->creador['TIPO'] == Establecimiento::GENERADOR OR 
				$data['alta_temprana'] == 1 OR
				$this->tipo_manifiesto == TipoManifiesto::MULTIPLE OR
				$this->tipo_manifiesto == TipoManifiesto::SLOP
				)
			{
				$data['estado'] = 'a';
				$data['fecha_aceptacion'] = new Datetime;
			}

			$this->manifiesto->create_generadores_manifiesto($data);

			if ($data['alta_temprana'] == 1) {
				$this->createPermisosGeneradorAltaTemprana($data['establecimiento_id']);
			}
		}
	}

	private function createRelacionTransportista()
	{
		$data = $this->formatDataParticipante($this->transportista);
		// si el creador es un transportista o fue un alta temprano, autoaprobamos el manifiesto (esto tmb contempla SLOPs)
		if ($this->creador['TIPO'] == Establecimiento::TRANSPORTISTA) {
			$data['estado'] = 'a';
			$data['fecha_aceptacion'] = new Datetime;
		}
	
		$this->manifiesto->create_transportistas_manifiesto($data);
	}

	private function createRelacionOperador()
	{
		$data = $this->formatDataParticipante($this->operador);

		// Autoaprobamos el manifiesto si: 
		// - el creador es un generador
		// - fue un alta temprana
		// - se trata de un manifiesto SLOP Relacionado
		if ($this->creador['TIPO'] == Establecimiento::OPERADOR OR 
			$this->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR OR
			$this->isRelatedSLOP()) {
			$data['estado'] = 'a';
			$data['fecha_aceptacion'] = new Datetime;
		}

		$this->manifiesto->create_operadores_manifiesto($data);
	}

	private function isRelatedSLOP()
	{
		return ! is_null($this->manifiesto_padre);
	}

	private function createRelacionVehiculos()
	{
		foreach ($this->vehiculos as $vehiculo) {
			$data = array_change_key_case($vehiculo, CASE_LOWER);
			$data['manifiesto_id'] = $this->manifiesto->id;
			$data['establecimiento_id'] = $this->creador['ID'];
			// renombro a nombre col esperado
			$data['vehiculo_id'] = $data['id'];
			unset($data['id'],$data['tipo_vehiculo'],$data['tipo_caja']);

			$this->manifiesto->create_vehiculos_manifiesto($data);
		}
	}

	private function createRelacionResiduos()
	{
		foreach ($this->residuos as $residuo) {
			$data = array_change_key_case($residuo, CASE_LOWER);
			$data['manifiesto_id'] = $this->manifiesto->id;
			$data['establecimiento_id'] = $this->creador['ID'];
			// renombro a nombre de cols esperadas
			$data['residuo_id'] = $data['residuo'];
			$data['contenedor_tipo_id'] = $data['contenedor'];
			$data['contenedor_cantidad'] = $data['cantidad_contenedores'];
			// sacamos las keys innecesarias
			unset($data['id'], $data['generador'], $data['contenedor'], $data['cantidad_contenedores'],
				$data['residuo'], $data['contenedor_'], $data['residuo_'], $data['estado_']
			);

			$this->manifiesto->create_residuos_manifiesto($data);
		}
	}

	private function createPermisosGeneradorAltaTemprana($establecimiento_id)
	{
		foreach ($this->residuos as $residuo) {
			$data_permisos['establecimiento_id'] = $establecimiento_id;
			$data_permisos['residuo'] = $residuo['RESIDUO'];
			$data_permisos['cantidad'] = $residuo['CANT_RESIDUO'];
			$data_permisos['estado'] = $residuo['ESTADO'];
			$data_permisos['fecha_ultima_modificacion'] = new Datetime;
			
			PermisoEstablecimiento::create($data_permisos);
		}
	}

	private function save_email_row_alert()
	{
		// Por participante a notificar generamos un row para individualizar el envio de emails.
		$mail = new mail;

		// avisamos a la DRP en la creacion de un manif simple concentrador
		if ($this->manifiesto->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR)
		{
			$params = array('manifiesto_id' => $this->manifiesto->id, 'rol' => 'generador');
			$mail->ponerEnColaDeEnvio(NULL, mail::NUEVO_MANIFIESTO_SIMPLE_CONCENTRADOR, $params);
		}
		else
		{
			// generadores
			if ($this->usaGeneradores()) {
				foreach ($this->generadores as $gen) {
					$params = array('manifiesto_id' => $this->manifiesto->id, 'rol' => 'generador');
					$mail->ponerEnColaDeEnvio($gen['ESTABLECIMIENTO']['ID'], mail::NUEVO_MANIFIESTO, $params);
				}
			}
			// transportista
			$trans_params = array('manifiesto_id' => $this->manifiesto->id, 'rol' => 'transportista');
			$mail->ponerEnColaDeEnvio($this->transportista['ESTABLECIMIENTO']['ID'], mail::NUEVO_MANIFIESTO, $trans_params);
			// generador
			$oper_params = array('manifiesto_id' => $this->manifiesto->id, 'rol' => 'operador');
			$mail->ponerEnColaDeEnvio($this->operador['ESTABLECIMIENTO']['ID'], mail::NUEVO_MANIFIESTO, $oper_params);
		}
	}
}

?>
