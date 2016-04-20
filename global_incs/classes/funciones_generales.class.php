<?php

/**
 * funcionces_generales
 *
 * Funciones generales
 * Creada con el fin de dejar obsoleto local_functions.inc.php
 *
 * @package
 * @author fedestev
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class funciones_generales extends mel{

	public function obtener_localidades_de_provincia($codigo)
	{
		$localidad = Localidad::connection();
		$localidad = Localidad::find('first', array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));

		if($localidad){
			$localidad = utf8_encode($localidad->descripcion);
		}

		return $localidad;
	
	}

}
?>