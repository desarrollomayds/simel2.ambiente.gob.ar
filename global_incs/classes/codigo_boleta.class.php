<?

/**
 * codigo_boleta
 *
 * @package
 * @author Lic. Mauricio Aranda
 * @copyright Copyright (c) 2010
 * @version 1.0
 * @access public
 */
class codigo_boleta extends mel{
	protected $_banID 			= null;
	protected $_nroConvenio 	= null;
	protected $_nroCta 			= null;
	protected $_descrCta		= null;
	protected $_appID 			= null;
	protected $_banco 			= null;

	/**
	 * Constructor
	 */
	function __construct($banID=''){
		//parent::__construct();
		if($banID){
			$this->set_banID($banID);
			$this->setBanco();
			$this->set_nroConvenio($this->getBanco()->get_nroConvenio());
			$this->set_nroCta($this->getBanco()->get_nroCta());
			$this->set_descrCta($this->getBanco()->get_descrCta());
		}
	}

	//------------------------------- Métodos primarios --------------------------------------------------


	/**
	 * codigo_boleta::generar_codigo_boleta()
	 *
	 *	Genera el codigo de barras de la boleta de pago
	 *
	 * @param array $datosBoleta
	 * @return
	 */
	public function generar_codigo_boleta($datosBoleta=array()){
		return $this->_banco->generar_codigo_boleta($datosBoleta);
	}

	/**
	 * codigo_boleta::digito_verificador_mod31()
	 *
	 *	Genera el digito verificador ponderador 31 modulo 10
	 *
	 * @param mixed $code
	 * @return
	 */
	public function digito_verificador_mod31($code){
		for($i=strlen($code), $rslt=0 ; $i>=0; $i-=2)
		$rslt += ($code{$i-1}*3) + ($code{$i-2});
		//Si el resto del la division entre $rslt es igual a 0 el DV es 0
		return (($rslt%10)==0)?0:10-($rslt%10);
	}

	/**
	 * codigo_boleta::createCode()
	 *
	 * @param mixed $codebars
	 * @return
	 */
	public function createCode($codebars){
		global $_PROTO_S;

		include_once("barcode/barcode.php");
		include_once("barcode/c128cobject.php");

		$style = BCS_IMAGE_PNG | BCS_DRAW_TEXT;
		$obj = new C128CObject(250, 120, $style, $codebars);
		if ($obj){
			if ($obj->DrawObject(XRES))
				return "<img class='IMG_barcode_boleta' src='../../../global_incs/classes/barcode/image.php?code=".$codebars."&style=".$style."&type=".TYPE."&width=".WIDTH."&height=".HEIGHT."&xres=".XRES."&font=".FONT."'>";

				//return "<img class='IMG_barcode_boleta' src='".$_PROTO_S."://".$_SERVER['HTTP_HOST']."/barcode/image.php?code=".$codebars."&style=".$style."&type=".TYPE."&width=".WIDTH."&height=".HEIGHT."&xres=".XRES."&font=".FONT."'>";

			return "<spam class='textonegro1'>".($obj->GetError())."</spam>";
		}
	}

	//------------------------------- Fin Métodos primarios --------------------------------------------------

	//------------------------------- Getters --------------------------------------------------

	/**
	 * boleta::get_bopID()
	 * Obtiene el identificador de la boleta de pago.
	 *
	 * @return int
	 */
	public function get_banID(){
		return $this->_banID;
	}

	/**
	 * codigo_boleta::getNroConvenio()
	 *
	 * @return
	 */
	public function get_nroConvenio(){
		return $this->_nroConvenio;
	}

	/**
	 * codigo_boleta::get_nroCta()
	 *
	 * @return
	 */
	public function get_nroCta(){
		return $this->_nroCta;
	}

	/**
	 * codigo_boleta::get_descrCta()
	 *
	 * @return
	 */
	public function get_descrCta(){
		return $this->_descrCta;
	}

	/**
	 * codigo_boleta::get_appID()
	 *
	 * @return
	 */
	public function get_appID(){
		return $this->_appID;
	}

	/**
	 * codigo_boleta::getBanco()
	 *
	 * @return
	 */
	public function getBanco(){
		return $this->_banco;
	}

	//------------------------------- Fin Getters --------------------------------------------------

	//------------------------------- Setters  --------------------------------------------------

  /**
   * boleta::set_bopID()
   * Establece el identificador para la boleta de pago.
   *
   * @param int $bopID Identificador de la boleta de pago.
   * @return void
   */
	private function set_banID($banID){
		$this->_banID = $banID;
	}

	/**
	 * codigo_boleta::set_roConvenio()
	 *
	 * @param mixed $nroConvenio
	 * @return
	 */
	protected function set_nroConvenio($nroConvenio){
		$this->_nroConvenio = $nroConvenio;
	}

	/**
	 * codigo_boleta::set_nroCta()
	 *
	 * @param mixed $nroCta
	 * @return
	 */
	protected function set_nroCta($nroCta){
		$this->_nroCta= $nroCta;
	}

	/**
	 * codigo_boleta::set_descrCta()
	 *
	 * @param mixed $descrCta
	 * @return
	 */
	protected function set_descrCta($descrCta){
		$this->_descrCta = $descrCta;
	}

	/**
	 * codigo_boleta::set_appID()
	 *
	 * @param mixed $appID
	 * @return
	 */
	protected function set_appID($appID){
		$this->_appID = $appID;
	}

	/**
	 * codigo_boleta::setBanco()
	 *
	 * @return
	 */
	private function setBanco(){
		$metodo = "codigo_".$this->get_banID();
		$this->_banco = new $metodo();
	}
	//------------------------------- Fin Setters --------------------------------------------------


} // Fin clase
?>