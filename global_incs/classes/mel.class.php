<?php

/**
 * mel
 *
 * Clase principal del sistema MEL
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2015
 * @version 1.0
 * @access public
 */
abstract class mel{
	protected 		$parameters				= NULL;
	private 		$message				= NULL;
	private 		$messageType			= NULL;
	private 		$messages				= NULL;
	private 		$idMessage 				= NULL;
	private 		$sourceMessage 			= NULL;
	protected 		$extras					= NULL;
	protected 		$processTime			= NULL;
	protected 		$processTimeAcc			= NULL;

	/**
	 * mel::respond()
	 *
	 * @param mixed $result
	 * @param boolean $idMessage
	 * @return
	 */
	protected function respond($result=true,$idMessage=false,$environment=false){
		if($idMessage){
			if(!$this->setNewMessage($idMessage,$environment))
				return $result;
		}
		else{
			$this->clearMessage();
		}
		return $result;
	}

	/**
	 * mel::setParameters()
	 *
	 *	Obtiene los parámetros del sistema
	 *
	 * @return
	 */
	protected function setParameters(){
		global $params;
		$this->parameters = $params;
	}

	/**
	 * mel::getParameters()
	 *
	 * 	Las claves van separadas por ::
	 *
	 * ej:
	 *
	 * 	db:
	 * 		user: 'aa'
	 *
	 * getParameters('db::user')
	 * @param mixed $key
	 * @return
	 */
	public function getParameters($key=false) {
		if(!$this->parameters)
			$this->setParameters();

		if(!$key)
			return $this->parameters;

		$keys = explode("::",$key);
		return $this->_getParameters($keys,$this->parameters);
	}

	/**
	 * mel::_getParameters()
	 *
	 * @param boolean $keys
	 * @param mixed $parametros
	 * @return
	 */
	protected function _getParameters($keys = false,$parametros){

		foreach ($keys as $key => $oneKey) {
			unset($keys[$key]);
			if(!isset($parametros[$oneKey])){
				return $this->respond(false,"general::07100001");
			}
			return $this->_getParameters($keys,$parametros[$oneKey]);
		}
		return $parametros;
	}

	/**
	 * core::setNewMessage()
	 *
	 *	Estable un nuevo mensaje
	 *
	 * @param mixed $idMessage
	 * @return
	 */
	public function setNewMessage($idMessage){

		if(is_object($idMessage)){
			$this->setExtrasMessage($idMessage->getExtrasMessage());
			$idMessage = $idMessage->getSourceMessage();
		}

		$m = explode("::",$idMessage);
		if(count($m) != 2)
			return false;

		$messages = $this->loadMessages($m[0]);

		if(!isset($messages[$m[1]]))
			return false;

		$this->sourceMessage 	= $idMessage;
		$this->idMessage	 		=  $m[1];

		if(isset($messages[$m[1]]["message"]))
			$this->message 		 		=  $messages[$m[1]]["message"];
		if(isset($messages[$m[1]]["type"]))
			$this->messageType 		=  $messages[$m[1]]["type"];

		return true;
	}

	/**
	 * core::clearMessage()
	 *
	 * @return
	 */
	public function clearMessage(){
		$this->sourceMessage	 = NULL;
		$this->idMessage	 		 =  NULL;
		$this->message 		 	 	 =  NULL;
		$this->messageType 	 	 =  NULL;
		return true;
	}

	/**
	 * core::setExtrasMessage()
	 *
	 * @param mixed $message
	 * @return
	 */
	public function setExtrasMessage($message){
		$this->extras = $message;
	}

	/**
	 * core::getExtrasMessage()
	 *
	 * @return
	 */
	public function getExtrasMessage(){
		return $this->extras;
	}

	/**
	 * core::getMessageText()
	 *
	 * @param mixed $idMessage
	 * @return
	 */
	public function getMessageText($idMessage){
		$this->setNewMessage($idMessage);
		$msg= $this->getMessage();

		if($this->esUTF8($msg))
			return utf8_decode($msg);
		else
			return $msg;
	}

	/**
	 * core::loadMessages()
	 *
	 * @return
	 */
	private function loadMessages($location){
		return  Spyc::YAMLLoad(__ROOT__."/mensajes/".$location.'.yml');
	}

	/**
	 * core::getIdMessage()
	 *
	 * @return
	 */
	public function getIdMessage(){
		return $this->idMessage;
	}

	/**
	 * core::getMessage()
	 *
	 * @param boolean $full
	 * @return
	 */
	public function getMessage($full=false){
		if($full)
			return $this->idMessage." - ".$this->message .(($this->extras)?" (".$this->extras.")":"");
		else
			return $this->message;
	}

	/**
	 * core::getMessageType()
	 *
	 * @return
	 */
	public function getMessageType(){
			return $this->messageType;
	}

	/**
	 * core::getSourceMessage()
	 *
	 * @return
	 */
	public function getSourceMessage(){
		return $this->sourceMessage;
	}



	/**
	 * core::getProcessTime()
	 *
	 * @return
	 */
	public function getProcessTime() {
		list($useg, $seg) = explode(" ", microtime());
		return  intval((((float)$useg + (float)$seg) - $this->processTime)*1000);
	}

	/**
	 * core::saveProcessTime()
	 *
	 * @param mixed $name
	 * @return
	 */
	public function saveProcessTime($name){
		$_SESSION["process_time"][] = array("name"=>$name,"time"=>$this->getProcessTime());
	}


	/**
	 * core::redirectURL()
	 *
	 * @param mixed $environment
	 * @param mixed $url
	 * @return
	 */
	protected function redirectURL($url){
		exit('<html><head><script language"javascript">window.location = "'.$url.'";</script></head></html>');
	}

	/**
	 * core::encrypt()
	 *
	 * @param mixed $string
	 * @return
	 */
	public function encrypt($string){
		return $this->encryptDecrypt('encrypt', $string);
	}

	/**
	 * core::decrypt()
	 *
	 * @param mixed $string
	 * @return
	 */
	public function decrypt($string){
		return $this->encryptDecrypt('decrypt', $string);
	}

	/**
	 * core::encryptDecrypt()
	 *
	 * @param mixed $action
	 * @param mixed $string
	 * @return
	 */
	public function encryptDecrypt($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'f_i%d-e.l,i+t#a&s';
		$secret_iv = '_fi2015rocks_';

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}

	/**
	 * core::getBasePath()
	 *
	 * URL Base
	 *
	 * @return
	 */
	public static function getBasePath(){
		return  sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $_SERVER['SERVER_NAME'],
		    ""
		  );
	}

	/**
	 * mel::getBaseAssetPath()
	 *
	 *  Path para los assets
	 *
	 * @return
	 */
	public static function getBaseAssetPath(){
		global $params;

		return  sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $params["framework"]["path"]["asset"],
		    ""
		  );
	}

	/**
	 * mel::getBaseMelPath()
	 *
	 *  Path para el sitio MEL
	 *
	 * @return
	 */
	public static function getBaseMelPath(){
		global $params;

		$ruta = $params["framework"]["path"]["mel"];

		if($_SERVER["SERVER_NAME"] != $ruta && $_SERVER["SERVER_NAME"]."/me" != $ruta){
			$ruta =$params["framework"]["subdomain"]["mel"];
		}


		return  sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $ruta,
		    ""
		  );
	}

	/**
	 * mel::getBaseAdminPath()
	 *
	 * Path Para el sitio de Administracion
	 *
	 * @return
	 */
	public static function getBaseAdminPath(){
		global $params;

		$ruta = $params["framework"]["path"]["admin"];

		if($_SERVER["SERVER_NAME"] != $ruta && $_SERVER["SERVER_NAME"]."/admin" != $ruta)
			$ruta =$params["framework"]["subdomain"]["admin"];

		return  sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $ruta,
		    ""
		  );
	}

	/**
	 * mel::getBaseWebPath()
	 *
	 * @return
	 */
	public static function getBaseWebPath(){
		global $params;

		$ruta = $params["framework"]["path"]["web"];

		if($_SERVER["SERVER_NAME"] != $ruta && $_SERVER["SERVER_NAME"]."/manifiestos" != $ruta)
			$ruta =$params["framework"]["subdomain"]["web"];

		return  sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $ruta,
		    ""
		  );
	}

	/**
	 * mel::getSystem()
	 *
	 * Indica el sistema del cual se está invocando la pagina
	 *
	 * @return
	 */
	public static function getSystem(){
		global $params;

		if($_SERVER["SERVER_NAME"] == $params["framework"]["subdomain"]["admin"])
			return "admin";

		if($_SERVER["SERVER_NAME"] == $params["framework"]["subdomain"]["mel"])
			return "mel";

		if($_SERVER["SERVER_NAME"] == $params["framework"]["subdomain"]["web"])
			return "web";

		$url = $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];

		if (strpos($url,$params["framework"]["path"]["admin"]) !== false) {
			return "admin";
		}

		if (strpos($url,$params["framework"]["path"]["mel"]) !== false) {
			return "mel";
		}

		if (strpos($url,$params["framework"]["path"]["web"]) !== false) {
			return "web";
		}

		return false;

	}

	/**
	 * core::setSessionTime()
	 *
	 *	Define el tiempo límite de iniactividad antes de realizar un logout
	 *
	 * @return
	 */
	public function setSessionTime(){
		$_SESSION["sessionTime"] = time() + $this->getParameters('session::ttl');
	}

	/**
	 * core::arrayToObject()
	 *
	 * @return
	 */
	public function arrayToObject($array= false,$object=false){
		if(!$object)
			$object = new stdClass();

		foreach ($array as $key => $value)
		{
			if(is_array($value))
				return $this->arrayToObject($value,$object);

			$object->$key = $value;
		}
		return $object;
	}

	/**
	 * mel::esUTF8()
	 *
	 * @param mixed $string
	 * @return
	 */
	public function esUTF8($string){
		if(!mb_detect_encoding($string, 'UTF-8',true))
			return false;
		return true;
	}

	/**
	 * mel::getUsuarioID()
	 *
	 * @return
	 */
	public function getUsuarioID(){
		switch (__SYSTEM__) {
			case "admin":
				return $_SESSION['INFORMACION_USUARIO']['ID'];
				break;
			case "mel":
				return $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
				break;
			default:
				return false;
		} // switch

	}

	/**
	 * mel::getEstablecimientoTipo()
	 *
	 * Devuelve el Tipo del establecimiento Logueado. Si no esta logeuado devuelve false
	 *
	 * @return
	 */
	public function getEstablecimientoTipo(){
		return $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
	}

	/**
	 * mel::getSessionID()
	 *
	 * @return
	 */
	public function getSessionID(){
		return $_COOKIE["PHPSESSID"];
	}

	/**
	 * mel::redirectError()
	 *
	 * @param mixed $errorCode
	 * @param boolean $errorTitle
	 * @param boolean $errorText
	 * @return
	 */
	public static function redirectError($errorCode,$errorTitle=false,$errorText=false){

		$s= new sesion();
		$smarty = inicializar_smarty();
		$smarty->assign('ERROR_CODE',$errorCode);
		$smarty->assign('ERROR_TITLE',$errorTitle);
		$smarty->assign('ERROR_TEXT',$s->getMessageText($errorText));

		$smarty->display('general/error.tpl');
		exit;
	}

	/**
	 * mel::redirectPageError()
	 *
	 * @param mixed $errorCode
	 * @param boolean $errorTitle
	 * @param boolean $errorText
	 * @return
	 */
	public function redirectPageError($errorCode,$errorTitle=false,$errorText=false){
		if(!$errorText)
			$errorText  = $this->getSourceMessage();

		return self::redirectError($errorCode,$errorTitle,$errorText);
	}

	/**
	 * mel::getHomeURL()
	 *
	 * @param boolean $tipo
	 * @param boolean $sinBase
	 * @return
	 */
	public static function getHomeURL($tipo=false,$sinBase=true){
		$secciones = Array(
		SECCION_GENERADOR => (($sinBase)?"":mel::getBaseMelPath()).'/operacion/generador/',
		SECCION_TRANSPORTISTA => (($sinBase)?"":mel::getBaseMelPath()).'/operacion/transportista/',
		SECCION_OPERADOR => (($sinBase)?"":mel::getBaseMelPath()).'/operacion/operador/'
		);

		if($tipo)
			return $secciones[$tipo];
		return $secciones;
	}

	/**
	 * mel::getModel()
	 *
	 * @param mixed $modelClass
	 * @return
	 */
	public function getModel($modelClass){
		if(!class_exists($modelClass))
			return false;
		$clase = new $modelClass();
		return $clase;
	}
}
?>