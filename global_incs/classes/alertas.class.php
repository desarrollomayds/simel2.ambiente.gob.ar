<?php

/**
 * alertas
 *
 * Clase de Alertas
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class alertas extends mel
{	
	const ALERTA_CAA = 1;
	const ALERTA_CAA_ADVERTENCIA = 5;
	const ALERTA_FORMULARIOS_NO_UTILIZADOS = 2;
	const ALERTA_STOCK_FORMULARIOS = 3;
	const ALERTA_SISTEMA_NO_LIVE = 4;

	protected $triggered_alert = NULL;

	public function __construct()
	{
		$this->config = new config;
	}

	/** 
	 * Método de entrada para la clase, es quien va a correr en orden de prioridad los checkeos de alertas para que sea notificada.
	 *	alertas:
	 *		prioridad: 
	 *			sitio_live: sitioLive
	 *			checkeo_caa: caaEsValido
	 *			checkeo_formularios: tieneFormularios
	 */
	public function runAlertas()
	{
		$priority_order = $this->config->getParameters("framework::alertas::prioridad");

		foreach ($priority_order as $alert_name => $method) {
			$this->{$method}();
			// si se disparo una alarma, no seguimos ejecutando el resto.
			if ($this->triggered_alert) {
				break;
			}
		}
	}

	public function getAlerta()
	{
		if ($this->triggered_alert['seccion'][0] != "") {
			if ( ! in_array($_SERVER['PHP_SELF'], $this->triggered_alert['seccion'])) {
				 $this->triggered_alert = NULL;
			}
		}

		return $this->triggered_alert;
	}

	private function sitioLive()
	{
		$live_site = $this->config->getParameters("framework::environment::live");	
		$this->triggered_alert = ! $live_site ? $this->parse(self::ALERTA_SISTEMA_NO_LIVE) : array();
	}

	private function caaEsValido()
	{
		$alertas_secciones = AlertasSecciones::find('all', array('conditions' => array('id_alerta = ? ', alertas::ALERTA_CAA_ADVERTENCIA)));
				
		foreach ($alertas_secciones as $value) {
			if ($value->seccion == $_SERVER['REQUEST_URI']){
				$existe = TRUE;
			}
		}

		if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'] != Establecimiento::GENERADOR) {
        	if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_VENCIMIENTO_DIAS'] < 0)
			{
				if ($existe){
					$this->triggered_alert = $this->parse(alertas::ALERTA_CAA_ADVERTENCIA);
		        } else {
		        	$this->triggered_alert = $this->parse(alertas::ALERTA_CAA);
		        }
				
			}
		} else {
	        
	        $est = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);

	        // si el generador tiene un caa, validamos con la fecha de vencimiento. Sino con la fecha de alta por drp - 180 dias.
	        if ($est->caa_numero AND $est->caa_vencimiento) {
	        	if ($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_VENCIMIENTO_DIAS'] < 0) {
					$this->triggered_alert = $this->parse(alertas::ALERTA_CAA);
				}
	        } else {
	        	$config = new config;
	        	$limite = $config->getParameters("framework::vencimiento::vencimiento_generador");

	        	// usuario dado de alta, aprobado por la DRP
				if ( ! empty($est->fecha_alta_drp)) {
					$fecha_limite = strtotime($est->fecha_alta_drp->format('Y-m-d H:i:s')." +".$limite." day");
				} else {
					// alta temprana aún no aprobada por la drp. usamos fecha de creacion.
					$fecha_limite = strtotime($est->fecha_creacion->format('Y-m-d H:i:s')." +".$limite." day");
				}

				$fecha_hoy = strtotime(date('Y-m-d H:i:s'));

	        	if ($fecha_limite < $fecha_hoy) {
	        		$this->triggered_alert = $this->parse(alertas::ALERTA_CAA);	
	        	}
	        }
		}
	}

	private function tieneFormularios()
	{
		$form = new formularios;

		if ($form->cantidadDeFormulariosNPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']) <= $form->formulariosMinimo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])) {
			if ($form->cantidadDeFormulariosNPorEmpresa($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])){
				$alerta = alertas::parse(alertas::ALERTA_STOCK_FORMULARIOS);
			} else {
				$alerta = alertas::parse(alertas::ALERTA_FORMULARIOS_NO_UTILIZADOS);
			}
		}

		$this->triggered_alert = isset($alerta) ? $alerta : NULL;
	}	

	public function parse($id)
	{

		$sql = Alerta::all(array('joins' => array('tipo_alertas','alertas_secciones'), 'conditions' => array('alertas.id = ?', $id)));

		foreach ($sql as $key => $value) {	
			$seccion[] = $value->alertas_secciones[$key]->seccion;
		}

		$contenido = $sql[0]->mensaje;
		$tipo = $sql[0]->tipo_alertas->id;

		$tipoDeError = array(1 => "alert-warning", 2 => "alert-danger", 3 => "alert-info", 4 => "alert-warning");

		$mensaje = '<div class="alert '.$tipoDeError[$tipo].' alert-dismissable fade in">'.$contenido.'.</div>';

		$alerta = array(
				"mensaje" => $mensaje,
				"bloqueante" => $sql[0]->tipo_alertas->bloqueante,
				"seccion" => $seccion,
			);

		return $alerta;
	}
}
?>