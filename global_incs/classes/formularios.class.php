<?php

/**
 * Clase de Formularios
 */
class Formularios extends mel{

	public $respuesta;

	public function detalleDeFormulariosPorEmpresa($id, $estado){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->mostrar($id, $estado);
		return $this->respuesta;
	}

	public function cantidadDeFormulariosNPorEmpresa($id){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->contarN($id);
		return $this->respuesta;
	}

	public function crearFormulariosPorEmpresa($id, $cantidad){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->crear($id, $cantidad);
		return $this->respuesta;
	}

	public function crearFormulariosPorNombre($usuario, $cantidad){

		$establecimiento = Establecimiento::find('first', array('conditions' => array('usuario = ?', $usuario)));

		if ($establecimiento) {
			$model = $this->getModel('Formulario');
			$this->respuesta = $model->crear($establecimiento->id, $cantidad);
			return $this->respuesta;
		} else {
			throw new Exception('El usuario especificado no existe');
		}
	}

	public function borrarFormularioPorId($id){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->borrar($id);
		return $this->respuesta;
	}

	public function cambiarEstadoFormularioPorManifiestoId($manifiesto_id, $estado){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->actualizarEstado($manifiesto_id, $estado);
		return $this->respuesta;
	}

	public function liberarFormularioPorManifiestoId($manifiesto_id){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->actualizarEstado($manifiesto_id, "N");
		return $this->respuesta;
	}

	public function finalizarFormularioPorManifiestoId($manifiesto_id){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->actualizarEstado($manifiesto_id, "F");
		return $this->respuesta;
	}

	public function relacionarFormularioConManifiesto($id_establecimiento, $id_manifiesto){
		$model = $this->getModel('Formulario');
		$this->respuesta = $model->relacionarFormulario($id_establecimiento, $id_manifiesto);
		return $this->respuesta;
	}

	public function formulariosMinimo($id){
		$resultado = array();
		$resultado = Formulario::find_by_sql('SELECT minimo FROM formularios_minimos WHERE establecimiento_id = ?', array($id));
		return $resultado[0]->minimo;
	}
}
?>