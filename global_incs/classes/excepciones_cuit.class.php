<?php

class excepciones_cuit extends mel
{
	public function add($cuit, $razon_social)
	{
		if ($model = PersonaJuridicaExcepcion::find(array('cuit' => $cuit))) {
			$model->fecha_modificacion = new datetime;
		} else {
			$model = new PersonaJuridicaExcepcion;
			$model->cuit = $cuit;
		}
		
		$model->razon_social = $razon_social;

		if ($model->is_valid()) {
			$model->save();
		} else {
			$errors = $model->getErrors();
		}

		if (isset($errors)) {
			return array(false, $errors);
		} else {
			return array(true, array());
		}
	}

	public function remove($excepcion_id)
	{
		$excepcion = PersonaJuridicaExcepcion::find($excepcion_id);
		return $excepcion->delete();
	}
}

?>