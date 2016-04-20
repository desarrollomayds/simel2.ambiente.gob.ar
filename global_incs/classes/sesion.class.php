<?php

/**
 * sesion
 *
 * Clase de Sesi�n
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
class sesion extends mel{
	private $ldapUsername;
	private $ldapPassword;
	private $ldapData;

	/**
	 * sesion::getHash()
	 *
	 * @param string $salt
	 * @param string $string
	 * @return
	 */
	public function getHash($salt="", $string=""){
		$salt = ($salt)? $salt : $this->getSalt();
		return array($salt, hash("sha512", $salt.$string, false));
	}

	/**
	 * sesion::getSalt()
	 *
	 * @return
	 */
	public function getSalt(){
		return base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
	}

	/**
	 * sesion::validarPassword()
	 *
	 *  Valida la contrase�a del establecimiento indicado
	 *
	 * @param mixed $password
	 * @return
	 */
	public function validarPassword($establecimiento_id,$password){

		$establecimiento = Establecimiento::connection();
		$usuario = Establecimiento::find('first', array('conditions' => array('usuario = ?', $establecimiento_id)));
		if(!$usuario)
			return $this->respond(false,"general::07100003");

		$r = $this->getHash($usuario->salt, $password);
		if ($usuario->contrasenia != $r[1])
			return $this->respond(false,"general::07100003");

		return $this->respond(true);
	}

	/**
	 * sesion::validarPrivacidad()
	 *
	 * Valida si la secci�n que se est� requieriendo es de acceso p�blico o requiere que el usuario este logueado
	 *
	 * @return
	 */
	public function validarPrivacidad(){

		$paginas = $this->getParameters("framework::public::".__SYSTEM__);
		if(!is_array($paginas))
			return true;
		foreach ($paginas as $nombre=>$unaPagina) {

			if($_SERVER["SCRIPT_NAME"] == "/".$unaPagina)
				return false;

			if($_SERVER["SCRIPT_NAME"] == "/me/".$unaPagina)
				return false;

			if($_SERVER["SCRIPT_NAME"] == "/admin/".$unaPagina)
				return false;
		}

		if(!$this->getUsuarioID() 	|| !$this->getSessionID()){
			$this->redirectPageError("403","Acceso denegado/prohibido","general::07100005");
		}

		if(__SYSTEM__ == "mel"){
			if(!$this->esSeccionPermitida() ){
				$this->redirectPageError("403","Acceso denegado/prohibido","general::07100005");
			}
		}

		return true;
	}

	/**
	 * sesion::validaSesionActiva()
	 *
	 *	Valida si la sesi�n esta activa
	 *
	 * @return
	 */
	public function validaSesionActiva(){
		if(!$this->checkSessionTime()){
			$this->redirectPageError("419","Acceso denegado","general::07100004");
		}
	}

	/**
	 * sesion::checkSessionTime()
	 *
	 * @return
	 */
	protected function checkSessionTime(){

		if(isset($_SESSION["sessionTime"]) && $_SESSION["sessionTime"]){
			if (time() > $_SESSION["sessionTime"]){
				self::resetSessionTime();
				return false;
			}
		}
		$this->setSessionTime();

		return true;
	}

	/**
	 * sesion::setSessionTime()
	 *
	 * @return
	 */
	public function setSessionTime(){
		$_SESSION["sessionTime"] = time() + $this->getParameters('session::ttl');
	}

	/**
	 * sesion::resetSessionTime()
	 *
	 * @return
	 */
	public static function resetSessionTime(){
		unset($_SESSION["sessionTime"]);
	}

	/**
	 * sesion::ldapLogin()
	 *
	 * @return
	 */
	public function ldapLogin($username,$password){
		$this->ldapUsername = $username;
		$this->ldapPassword = $password;

		$ds=ldap_connect("LDAP://".$this->getParameters("session::ldap::server"))
		or die("No ha sido posible conectarse al servidor");

		//echo $this->getParameters("session::ldap::server");

		$return = false;

		if($ds){
			$search = $this->getParameters("session::ldap::user_search");
			$path = str_replace("[[USER]]",$username,$search);
			$r=@ldap_bind($ds,$path,$password);

			if($r){
				$return= true;

				$sr=ldap_search($ds,$path, "cn=*");
				$info = ldap_get_entries($ds, $sr);
				$this->ldapData = $info[0];
			}
		}

		return $return;
	}


	public function ldapGetUserData(){
		return $this->ldapData;
	}

	/**
	 * sesion::esSeccionPermitida()
	 *
	 *	Verifica que una secci�n solo sea accedida por el peffil de usuario que corresponda
	 *
	 * @return
	 */
	public function esSeccionPermitida(){

		$base = mel::getBaseMelPath().$_SERVER["SCRIPT_NAME"];
		$pos = strpos($base,"/operacion/compartido/");

		if ($pos !== false)
			return true;

		$pos = strpos($base,self::getHomeURL($this->getEstablecimientoTipo()));

		if ($pos === false)
			return false;
		return true;
	}

	/**
	 * sesion::validarMantenimientoSistema()
	 *
	 *  Si el sistema se encuetnra en mantenimiento redirecciona a una página que informa al usuario de la situación
	 *
	 * @return
	 */
	public function validarMantenimientoSistema(){
		$offline = $this->getParameters("framework::environment::system_offline");

		if($offline == true){
				$this->redirectPageError("503","Sistema en Mantenimiento","general::07100008");
		}

		return true;
	}
}
?>
