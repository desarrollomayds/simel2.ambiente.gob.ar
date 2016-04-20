<?
/**
 * codigo_011
 *
 * Codigo de barras del banco Naci�n
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2011
 * @version 1.1
 * @access public
 */
class codigo_011 extends codigo_boleta{
	/**
	 * Constructor
	 */
	function __construct(){
		//parent::__construct();
		$this->set_nroConvenio("8614");
		$this->set_nroCta("");
		$this->set_descrCta("");
		$this->set_appID("10");
	}

	//------------------------------- M�todos primarios --------------------------------------------------

	/**
	 * codigo_011::generar_codigo_boleta()
	 *
	 *	Genera el c�digo de barras para el banco
	 *
	 * @param array $datosBoleta
	 * @return
	 */
	public function generar_codigo_boleta($datosBoleta=array()){
		//Nro de convenio (4)
		$code = sprintf("%04s",$this->get_nroConvenio());
		//Nro de aplicaci�n (2)
		$code .=sprintf("%02s",$this->get_appID());
		//Nro de boleta - bopID (8)
		$code .= sprintf("%08s",$datosBoleta["codBoleta"]);
		//C�digo de cliente (5)
		$code .=sprintf("%05s",$datosBoleta["codCliente"]);
		//Fecha de vencimiento de la boleta (8)
		$code .=str_replace("-","", substr($datosBoleta["codFecVen"],0,10));
		//Importe de la boleta (12)
		$code .= sprintf("%012s", str_replace(".", "",$datosBoleta["codImporte"]));
		return  $code.$this->digito_verificador_mod31($code);
	}

} // Fin clase
?>