<?
class Formulario extends ActiveRecord\Model{

	public function mostrar($id, $estado)
	{
		$resultado = array();

		if ($id) {
		$query = Formulario::find('all',array('establecimiento_id' => $id, 'estado' => $estado));

			if(empty($query)){
				$resultado['error'] = "No se han encontrado formularios para esa empresa";
			} else {
				$keys = array();
				foreach ($query as $value) {

					if (!empty($value->fecha_baja)){
						$fecha_baja = $value->fecha_baja->format('Y-m-d H:i:s');
					}
					if (!empty($value->fecha_registracion)){
						$fecha_registracion = $value->fecha_registracion->format('Y-m-d H:i:s');
					}
					if (!empty($value->fecha_utilizacion)){
						$fecha_utilizacion = $value->fecha_utilizacion->format('Y-m-d H:i:s');
					}
					if (!empty($value->fecha_finalizacion)){
						$fecha_finalizacion = $value->fecha_finalizacion->format('Y-m-d H:i:s');
					}
					if (!empty($value->fecha_modificacion)){
						$fecha_modificacion = $value->fecha_modificacion->format('Y-m-d H:i:s');
					}

					$resultado[] = array(
					    "id" => $value->id,
					    "estado" => $value->estado,
						"establecimiento_id" => $value->establecimiento_id,
						"boleta_pago_id" => $value->boleta_pago_id,
						"manifiesto_id" => $value->manifiesto_id,
						"fecha_registracion" => $fecha_registracion,
						"fecha_utilizacion" => $fecha_utilizacion,
	            		"fecha_finalizacion" => $fecha_finalizacion,
	            		"fecha_modificacion" => $fecha_modificacion,
	            		"fecha_baja" => $fecha_baja
					);
				}
			}
		}
		return $resultado;
	}

	public function contarN($id){
		$resultado = array();
		$resultado = Formulario::find('all',array('establecimiento_id' => $id, 'estado' => 'N'));
		return count($resultado);
	}

	public function listar(){
		$resultado = array();

		$query = Formulario::find_by_sql('
			SELECT *, count(ID) as count
			  from formularios
			  group by establecimiento_id;
			');

			if(empty($query)){
				$resultado['error'] = "No se han encontrado formularios para esa empresa";
			} else {
				$keys = array();
				foreach ($query as $value) {

					if (!empty($value->fecha_registracion)){
						$fecha_registracion = $value->fecha_registracion->format('d-m-y');
					}

					$usuario = Establecimiento::find('first', array('conditions' => array('id = ?', $value->establecimiento_id)));

					$resultado[] = array(
						"establecimiento_id" => $value->establecimiento_id,
						"cantidad" => $value->count,
						"fecha_registracion" => $fecha_registracion,
						"usuario" => $usuario->usuario,
					);
				}
			}
		return $resultado;
	}

	public function crear($id, $cantidad){

		$resultado = array();
		if (isset($id, $cantidad)){

			$atributos = array('establecimiento_id' => $id, 'fecha_registracion' => date('Y-m-d H:i:s'));
			try {
				for ($i = 1; $i <= $cantidad; $i++) {
	   				$resultado[] = Formulario::create($atributos);
				}
			} catch (Exception $e) {
				$resultado['error'] = $e->getMessage();
			}
			return $resultado;
		}
	}

	public function borrar($id){
		$resultado = array();
		try {
			$formulario = Formulario::find($id);	
			$resultado = $formulario->delete();
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}

	public function actualizarEstado($manifiesto_id, $estado){
		$resultado = array();
		try {
			$formulario = Formulario::find('first',array('manifiesto_id' => $manifiesto_id));
			
			switch ($estado) {
			    case "N":
			        $resultado = $formulario->update_attributes(array('estado' => $estado, 'manifiesto_id' => ''));
			        break;
			    case "F":
			        $resultado = $formulario->update_attributes(array('estado' => $estado, 'fecha_finalizacion' => date('Y-m-d H:i:s')));
			        break;
			    default:
			       	$resultado = $formulario->update_attributes(array('estado' => $estado));
			}
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}

	public function relacionarFormulario($id_establecimiento, $id_manifiesto){
		$resultado = array();
		try {
			$formulario = Formulario::find('first',array('establecimiento_id' => $id_establecimiento, 'estado' => 'N'));
			$resultado = $formulario->update_attributes(array('estado' => 'U', 'manifiesto_id' => $id_manifiesto, 'fecha_utilizacion' => date('Y-m-d H:i:s')));
		} catch (Exception $e) {
			$resultado['error'] = $e->getMessage();
		}
		return $resultado;
	}

	public function get_listado_formularios_por_establecimiento($criterio = '')
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");
		$criterio = "%$criterio%";

		// obtenemos total de rows sin paginar
		$count_query = "SELECT COUNT(razon_social) AS cantidad FROM ( SELECT emp.nombre AS razon_social, est.usuario, f.fecha_registracion, COUNT(f.id) AS cantidad FROM formularios f, establecimientos est, empresas emp WHERE f.establecimiento_id = est.id AND est.empresa_id = emp.id AND (emp.cuit LIKE '%%' OR emp.nombre LIKE '%%') GROUP BY f.establecimiento_id ORDER BY f.fecha_registracion ) tbl";
		$count_obj = Formulario::find_by_sql($count_query, array($criterio, $criterio));

		$page = new Paginator();
		$paginate = $page->paginate($count_obj[0]->cantidad, $maximum_per_page, $maximum_links, "Light");
		
		$query = "SELECT emp.nombre as razon_social, est.usuario, f.fecha_registracion, count(f.id) as cantidad
			  	  FROM formularios f, establecimientos est, empresas emp
			  	  WHERE f.establecimiento_id = est.id
			  	    AND est.empresa_id = emp.id
			  	    AND (emp.cuit LIKE ? OR emp.nombre LIKE ?)
			  	  GROUP BY f.establecimiento_id
			  	  ORDER BY f.fecha_registracion
			      LIMIT ".$page->limit;

		$formularios = Formulario::find_by_sql($query, array($criterio, $criterio));

		return array($formularios, $paginate);
	}
}