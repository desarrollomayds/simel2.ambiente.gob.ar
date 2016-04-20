<?php

/**
 * permisosM
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class permisos extends mel{

	/**
	 * permisos::validarPermisosUsuario()
	 *
	 * Valida si el usuario posee permisos para operar el módulo pasado por parámetro
	 *
	 * @param mixed $modulo_id
	 * @return
	 */
	public function validarPermisosUsuario($modulo_id){
		$modelo = $this->getModel("PermisosModulos");
		$permisos = $modelo->obtenePermisosUsuario($this->getUsuarioID(),$modulo_id);

		if(is_array($permisos)){
			if($permisos[0]->estado == 'S')
				return $this->respond();
		}

		return $this->respond(false,"general::07100006");
	}

	/**
	 * permisos::validarAccesoSeccion()
	 *
	 * @param mixed $modulo_id
	 * @return
	 */
	public function validarAccesoSeccion($modulo_id){
		if(!$this->validarPermisosUsuario($modulo_id)){
			$this->redirectPageError("419","Acceso Denegado");
		}

		return $this->respond();
	}

}
?>