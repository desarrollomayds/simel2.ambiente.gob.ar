<?php

/**
 * Clase de Boletas
 */
class Boletas extends mel{

	public $respuesta;

	public function detalleDeBoletasPorEmpresa($id){
		$model = $this->getModel('Boleta');
		$this->respuesta = $model->mostrar($id);
		return $this->respuesta;
	}

	public function modulo_boleta_activo(){
		$config = new config;
		$modulo = $config->getParameters("framework::boletas::modulo_activo");
		return $modulo;
	}

	public function crearBoletaPorEmpresa($establecimiento_id, $cantidad){
		$model = $this->getModel('Boleta');
		$config = new config;
		$importe_manifiesto = $config->getParameters("framework::boletas::importe_manifiesto");
		$importe = $importe_manifiesto * $cantidad;
		$this->respuesta = $model->crear($establecimiento_id, $cantidad, $importe_manifiesto, $importe);
		return $this->respuesta;
	}

	public function get_listado_boletas($nro_boleta = '')
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$nro_boleta = "$nro_boleta%";
		$cuit = "$cuit%";

		// obtenemos total de rows sin paginar
		$count_query = "SELECT count(est.id) as cantidad FROM boletas_pago b, establecimientos est, empresas emp WHERE b.establecimiento_id = est.id AND est.empresa_id = emp.id AND b.cb LIKE ? AND emp.cuit LIKE ?";
		$count_obj = Boleta::find_by_sql($count_query, array($nro_boleta, $cuit));

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");
		
		$query = "SELECT id as boleta_id, cb, importe, cantidad_manifiestos, fecha_registracion, fecha_pago, establecimiento_id
				FROM boletas_pago
				WHERE cb LIKE ?
				ORDER BY fecha_registracion
			    LIMIT ".$page->limit;

		$boletas = Boleta::find_by_sql($query, array($nro_boleta));

		return array($boletas, $paginate);
	}

	public function verificarBoletasPorCSV($array_csv){
		$model = $this->getModel('Boleta');
		$this->respuesta = $model->verificar($array_csv);

		foreach ($array_csv as $key => $value) {

			if ($value[1] > $this->respuesta[$key]->importe){

				$resto = $value[1] - $this->respuesta[$key]->importe;

				if ($model->estado($this->respuesta[$key]->id) == "pendiente"){
					
					$fch = '';
					$fch = explode("/",$value[2]);
					$value[2] = $fch[2]."-".$fch[1]."-".$fch[0];

					$model->pagar($this->respuesta[$key]->id, $resto, $value[2]);

					$formularios = new formularios();
					$formularios->crearFormulariosPorEmpresa($this->respuesta[0]->establecimiento_id, $this->respuesta[$key]->cantidad_manifiestos);
					$respuesta[] = 'Pago acreditado, se detecto un sobrante de $'.$resto;
				} else {
					$respuesta[] = 'Este pago ya esta acreditado';
				}
			
			} elseif ($value[1] < $this->respuesta[$key]->importe) {
				$resto = $this->respuesta[$key]->importe - $value[1];

				$respuesta[] = 'Pago no acreditado, se detecto un faltante de $'.$resto;
			
			} else {
				
				if ($model->estado($this->respuesta[$key]->id) == "pendiente"){

					$fch = '';
					$fch = explode("/",$value[2]);
					$value[2] = $fch[2]."-".$fch[1]."-".$fch[0];

					$model->pagar($this->respuesta[$key]->id,"" , $value[2]);
					$formularios = new formularios();
					$formularios->crearFormulariosPorEmpresa($this->respuesta[0]->establecimiento_id, $this->respuesta[$key]->cantidad_manifiestos);
					$respuesta[] = 'Pago acreditado';
				} else {
					$respuesta[] = 'Este pago ya esta acreditado';
				}	
			}
		}
		return $respuesta;	
	}
}