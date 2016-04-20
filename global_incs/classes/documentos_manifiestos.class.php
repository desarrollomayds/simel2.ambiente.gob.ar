<?php
require_once(__DIR__."/../librerias/mpdf/mpdf.php");

class documentos_manifiestos extends mel
{
	private $manifiesto;
	private $tipo_documento;
	private $documento = null;

	/**
	 * Crea el tipo de documento pdf y grabar la relacion en la tabla documentos_manifiestos.
	 */
	public function generate(Manifiesto $manifiesto, $tipo_documento)
	{
		$this->manifiesto = $manifiesto;
		$this->tipo_documento = $tipo_documento;

		//$this->checkWritePerms();

		switch ($this->tipo_documento) {
			case DocumentoManifiesto::CONSTANCIA_RECEPCION:
				$this->generateConstanciaRecepcion();
				break;

			case DocumentoManifiesto::CERTIFICADO_TRATAMIENTO:
				$this->generateCertificadoTratamiento();
				break;

			case DocumentoManifiesto::MANIFIESTO:
				$this->generateManifiesto();
				break;

			default:
				throw new Exception('El tipo de documento que quiere crear no es v&aacute;lido');
				break;
		}

		$this->saveRelacion();
	}

	private function getDocBasePath()
	{
		return $this->getParameters("framework::documentos::path_manifiestos");
	}

	private function checkWritePerms()
	{
		$path = $this->getDocBasePath();

		if ( ! is_writable($path)) {
			throw new Exception("No se dispone de los permisos para escribir en el directorio de documentos. Contacte al administrador");
		}
	}

	/**
	 * Busca el tipo de documento para el id de manifiesto.
	 */
	public function find(Manifiesto $manifiesto, $tipo_documento_id)
	{
		$this->manifiesto = $manifiesto;
		$this->tipo_documento = $tipo_documento_id;
		$this->documento = DocumentoManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and tipo_documento_id = ?', $manifiesto->id, $tipo_documento_id)));
		// var_dump($this->documento, $manifiesto->id, $tipo_documento_id);die;
	}

	public function found()
	{
		return ! empty($this->documento);
	}

	/**
	 * Formato:
	 * 	id + _ + tipo_documento + _ + fecha_generacion + .pdf (cohesion con la tabla documentos_manifiestos)
	 */
	public function getFileName()
	{
		// $this->documento indica si estoy trabajando sobre un file ya creado o creando uno.
		if (is_null($this->documento)) {
			$today = new Datetime();
			$filename = $this->manifiesto->id.'_'.$this->tipo_documento.'_'.$today->format('Ymd').'.pdf';
		} else {
			$filename = $this->manifiesto->id.'_'.$this->tipo_documento.'_'.$this->documento->fecha_creacion->format('Ymd').'.pdf';
		}

		return $filename;
	}

	/**
	 * Devuelve path y nombre del archivo.
	 */
	public function getCompleteFilename()
	{
		$path = $this->getDocumentPath();
		$filename = $this->getFileName();
		return $path.$filename;
	}

	/**
	 * Genera el doc del manifiesto (una vez que fue aprobado por todas sus partes)
	 */
	private function generateManifiesto()
	{
		$manifiesto = obtener_informacion_manifiesto($this->manifiesto->id);
		$ceros = "";
		if (strlen($manifiesto['NUMERO_PROTOCOLO']) < 10) {
		    for ($i = strlen($manifiesto['NUMERO_PROTOCOLO']); $i < 10; $i++) {
		        $ceros .="0";
		    }
		}

		$protocolo_formateado = $ceros.$manifiesto['NUMERO_PROTOCOLO'];
		$smarty = inicializar_smarty();
		$smarty->assign('CODIGO', $protocolo_formateado);
		$smarty->assign('MANIFIESTO', $manifiesto);
		$smarty->assign('FECHA_EMISION', $this->manifiesto->fecha_aceptacion->format('Y-m-d'));
		$smarty->assign('FECHA_VENCIMIENTO', $this->manifiesto->fecha_aceptacion->add(new DateInterval('P45D'))->format('Y-m-d'));

		$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTA', $manifiesto['TRANSPORTISTAS'][0]);
		$smarty->assign('OPERADOR', $manifiesto['OPERADORES'][0]);
		$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
		$smarty->assign('TIPO_MANIFIESTO', $manifiesto['TIPO_MANIFIESTO']);

		if (!is_null($manifiesto['MANIFIESTO_PADRE'])) {
			$smarty->assign('ES_SLOP_RELACIONADO', true);
			$manifiesto_padre = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto['MANIFIESTO_PADRE'])));
			$smarty->assign('PROTOCOLO_SLOP_PADRE', formatear_id_protocolo_manifiesto($manifiesto_padre->id_protocolo_manifiesto));
		}

		if ($manifiesto['TRANSPORTISTAS'][0]['VEHICULOS'][0]['TIPO_VEHICULO'] == 'BA') {
			$smarty->assign('ES_SLOP_BARCAZA_CABECERA', true);
		}

		$html = $smarty->fetch('operacion/compartido/imprimir_manifiesto.tpl');
		$mpdf = new mPDF();
		$mpdf->ignore_invalid_utf8 = true;
		$mpdf->WriteHTML($html);

		$filename = $this->getCompleteFilename();
		//var_dump($filename);die;
		//$mpdf->Output();
		$mpdf->Output($filename, 'F');
	}

	/**
	 * Genera constancia de Recepción.
	 */
	private function generateConstanciaRecepcion()
	{
		$manifiesto = obtener_informacion_manifiesto($this->manifiesto->id);
		$smarty = inicializar_smarty();
		$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTAS', $manifiesto['TRANSPORTISTAS']);
		$smarty->assign('OPERADORES', $manifiesto['OPERADORES']);
		$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
		$smarty->assign('MANIFIESTO', $manifiesto);
		$smarty->assign('FECHA_RECEPCION', $this->manifiesto->fecha_recepcion->format('Y-m-d H:i:s'));
		$html = $smarty->fetch('operacion/compartido/imprimir_constancia_recepcion.tpl');
		$mpdf = new mPDF();
		$mpdf->ignore_invalid_utf8 = true;
		$mpdf->WriteHTML($html);

		$filename = $this->getCompleteFilename();
		//$mpdf->Output();
		$mpdf->Output($filename, 'F');
	}

	/**
	 * Genera certificado de Tratamiento.
	 */
	private function generateCertificadoTratamiento()
	{
		$manifiesto = obtener_informacion_manifiesto($this->manifiesto->id);
		//$residuos_procesados = obtener_residuos_procesados($_GET['id']);
		$smarty = inicializar_smarty();
		$smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTAS', $manifiesto['TRANSPORTISTAS']);
		$smarty->assign('OPERADORES', $manifiesto['OPERADORES']);
		$smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
		$smarty->assign('MANIFIESTO', $manifiesto);
		$html = $smarty->fetch('operacion/compartido/imprimir_certificado_tratamiento.tpl');
		$mpdf = new mPDF();
		$mpdf->ignore_invalid_utf8 = true;
		$mpdf->WriteHTML($html);

		$filename = $this->getCompleteFilename();
		//$mpdf->Output();
		$mpdf->Output($filename, 'F');
	}

	/**
	 * documentos_manifiestos::getDocumentPath()
	 *
	 * Obtiene el path donde se guardan los documentos de los manifiestos
	 *
	 * @return
	 */
	private function getDocumentPath()
	{
		if ($this->manifiesto->id_protocolo_manifiesto != 0) {
			$basepath = $this->getDocBasePath();
			$path = $basepath.$this->manifiesto->id_protocolo_manifiesto.'/';

			// con this->documento puedo saber si estoy trabajando sobre un file ya creado o creando uno.
			if (is_null($this->documento)) {
				// si el directorio para el id de protocolo no existe, lo creamos.
				if ( ! file_exists($path) AND ! is_dir($path)) {
	    			mkdir($path); // 0777 por default.
				}
			}
			return $path;
		} else {
			throw new Exception("El manifiesto no tiene un id de protocolo. Contacte al administrador.");
		}
	}

	/**
	 * Genera el row que relaciona un tipo de documento pdf con el id de manifiesto.
	 * No debe ser usado fuera del método generate()
	 */
	private function saveRelacion()
	{
		$documento = DocumentoManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and tipo_documento_id = ?', $this->manifiesto->id, $this->tipo_documento)));

		if ($documento) {
			$documento->fecha_creacion = new Datetime;
			$documento->save();
		} else {
			$documento = DocumentoManifiesto::create(array('manifiesto_id' => $this->manifiesto->id, 'tipo_documento_id' => $this->tipo_documento));
		}

		$this->documento = $documento;
	}
}

?>
