<?php
define("SAF_SALIDA_HTML", "1");
define("SAF_SALIDA_PDF", "2");

/**
 * safit_boleta
 *
 * @package
 * @author Alejandro Salgueiro
 * @copyright Copyright (c) 2010
 * @version 1.0
 * @access public
 */
class safit_boleta extends safit {
    private $_bopID 								= null;
    private $_tbpID	 								= null;
    private $_nroCuenta 						= null;
    private $_descrCuenta					  = null;
    private $_nroConvenio 					= null;
    private $_direccion 						= null;
    private $_datosBoleta 					= null;
		private $_zonID									= null;
    private $_bopNumero  						= null;
		public $_sexos 									= null;
		private $_cantidadInfracciones	= 0;

    /**
     * Constructor
     */
    function __construct($bopCB = 0, $bopID = 0)
    {
        parent::__construct();
    		$this->_sexos = array("M"=>"Masculino","F"=>"Femenino");
        if ($this->validar_boleta($bopCB, $bopID))
            $this-> set_params();
        $this->set_datosCuenta();
    }
    // ------------------------------- Métodos primarios --------------------------------------------------
    /**
     * safit_boleta::validar_boleta()
     * Determina si existe o no la boleta de pago a partir de su código de barras
     * o de su identificador interno en la base de datos
     *
     * @param int $bopCB Opcional. Código de barras.
     * @param int $bopID Opcional. Identificador de la boleta de pago.
     * @return bool
     */
    public function validar_boleta($bopCB = 0, $bopID = 0)
    {
        if (!$bopCB && !$bopID)
            return $this->respuesta_clase(false, "B001");

        $SQL = "SELECT bopID, tbpID FROM " . self::SAFIT_DB . ".safBoletasPago WHERE 1";
        if ($bopCB) $SQL .= " AND bopCB='$bopCB'";
        if ($bopID) $SQL .= " AND bopID='$bopID'";

        $res = $this->_conn->execute($SQL);
        if ($res->numrows > 0) {
            $this->set_bopID($res->field("bopID"));
            $this->set_tbpID($res->field("tbpID"));
            return $this->respuesta_clase();
        }

        return $this->respuesta_clase(false, "B001");
    }

    /**
     * safit_boleta::validar_boleta_operacion()
     * Valida la boleta para su utilización en un trámite.
     *
     * @param array $datos Vector con los datos de la boleta a comprobar.
     * @return bool
     */
    public function validar_boleta_operacion($datos)
    {
        return $this->validar_estado($datos);
    }

    /**
     * safit_boleta::validar_estado()
     * Valida el estado de la boleta de pago.
     *
     * @param array $datos Vector con los datos de la boleta a comprobar.
     * @return bool
     */
    private function validar_estado($datos)
    {
        $res_val = $this->obtener_datos($datos);

        if (!$res_val)
            return $this->respuesta_clase(false);

        if ($res_val->field("bopEstado") == "I")
            return $this->respuesta_clase(false, "B002");
        if ($res_val->field("bopEstado") == "C")
            return $this->respuesta_clase(false, "B003");
        if ($res_val->field("bopEstado") == "F")
            return $this->respuesta_clase(false, "B004");

        // if ($res_val->field("VENC"))
        // return $this->respuesta_clase(false,"B007");

        if ($res_val->field("bopEstado") == "N" || $res_val->field("bopEstado") == "U")
            return $this->respuesta_clase();
        else
            return $this->respuesta_clase(false, "B005");
    }

    /**
     * safit_boleta::obtener_datos()
     *   obtiene los datos de la boleta
     *
     * @param array $datos_bol Vector con los datos a validar.
     * @return bool
     */
    public function obtener_datos($datos_bol = array())
    {
          $datos_bol["bopID"] = $this->get_bopID();

          $this->_datosBoleta = self::_obtener_datos($datos_bol);
          if (!$this->_datosBoleta)
            return $this->respuesta_clase(false, "B006");

    /*
          $boletaPago = new safit_codigo_boleta($this->_datosBoleta->field("banID"));
          $this->set_nroConvenio($boletaPago->get_nroConvenio());
       */

        return $this->respuesta_clase($this->_datosBoleta);
    }

    /**
     * safit_boleta::_obtener_datos()
     * Valida la boleta de pago, a partir de la municipalidad, el centro de emisión y el importe de la misma.
     *
     * @param array $datos_bol Vector con los datos a validar.
     * @return bool
     */
    public static function _obtener_datos($datos_bol = array()){
      global $conn;

      $SQL = "SELECT BOL.*, IF(NOW() > BOL.bopFecVen, 1, 0) AS VENC, BAN.banDescrip
            FROM " . self::SAFIT_DB . ".safBoletasPago BOL, sugit.sugBancos BAN
           WHERE BAN.banID=BOL.banID";
      if ($datos_bol["bopID"]) $SQL .= " AND BOL.bopID='" . $datos_bol["bopID"] . "'";
      if ($datos_bol["bopCB"]) $SQL .= " AND BOL.bopCB='" . $datos_bol["bopCB"] . "'";
      if ($datos_bol["munID"]) $SQL .= " AND BOL.munID='" . $datos_bol["munID"] . "'";
      if ($datos_bol["cemID"]) $SQL .= " AND BOL.cemID='" . $datos_bol["cemID"] . "'";
      if ($datos_bol["frmID"]) $SQL .= " AND BOL.frmID='" . $datos_bol["frmID"] . "'";
      if ($datos_bol["bopMonto"]) $SQL .= " AND BOL.bopMonto= " . $datos_bol["bopMonto"] . "";
      $res = $conn->execute($SQL);

      if (!$res || $res->numrows == 0)
        return false;

      return $res;
    }

    /**
     * safit_boleta::validar_boleta_datos()
     * Validamos que los datos con los que se generó la boleta emitida por el sistema,
     * coincidan con los del usuario que está emitiendo ahora el trámite.
     *
     * @param array $datos Vector con los datos del usuario.
     * @return bool
     */
    public function validar_boleta_datos($datos)
    {
        if ($this->get_tbpID() != 1)
            return $this->respuesta_clase();

        $SQL = "SELECT OPE.* FROM " . self::SAFIT_DB . ".safOperacionesBoletasPago OPE, " . self::SAFIT_DB . ".safBoletasPago BOL
             WHERE BOL.oprID=OPE.oprID AND BOL.bopID='" . $this->get_bopID() . "'";
        $res_opr = $this->_conn->execute($SQL);

        if ($res_opr->field("tdcID") != $datos["tdcID"] || $res_opr->field("oprDocumento") != $datos["oprDocumento"] || $res_opr->field("oprSexo") != $datos["oprSexo"])
            return $this->respuesta_clase(false, "B015");

        return $this->respuesta_clase();
    }

    /**
     * safit_boleta::registrar_operacion_boleta()
     *
     * @param mixed $datos
     * @param mixed $frmID
     * @return
     */
    public function registrar_operacion_boleta($datos, $frmID = '')
    {
        /* validamos los caracteres recibidos */
        $ret = safit_licenciamiento::validar_datos_entrada($datos);
        if (!$ret[0])
          return $this->respuesta_clase(false, "I044");

    		if($this->get_params("RENAPER_ACT") == "S"){
	        /* antes de registrar la boleta, validamos la persona en el servicio de renaper */
	        if ($this->get_zonID() != 1) {
	        	$persona = new safit_renaper($datos["oprSexo"], $datos["oprDocumento"],$datos);
						$persona->set_munID($this->get_munID());

	         	$res = $persona->validar_persona();
	        	if (!$res)
	        		return $this->respuesta_clase(false, $persona);

	        	if($res[0] == true && $res[1]){
	        		$datos["oprNombre"]		= $res[1]->ciudadano->nombres;
	        		$datos["oprApellido"] = $res[1]->ciudadano->apellido;
	        	}
	        }
    		}

        $frmID = ($frmID)?"'" . $frmID . "'":"NULL";
        if (!$datos["cemID"])return $this->respuesta_clase(false, "O007");
        if (!isset($datos["munID"]))return $this->respuesta_clase(false, "O007");
        $datos["oprNombre"] = ($datos["oprNombre"] == "")?"NULL": "'" . mysql_real_escape_string($datos["oprNombre"]) . "'";
        $datos["oprApellido"] = ($datos["oprApellido"] == "")?"NULL": "'" . mysql_real_escape_string($datos["oprApellido"]) . "'";
        $ingID = ($datos["ingID"])? $datos["ingID"]: "NULL";
        $ingID_WS = ($datos["ingID_WS"])? $datos["ingID_WS"]: "NULL";
        $opeID = ($datos["opeID"])? $datos["opeID"]: "NULL";
        $oprID_WS = ($datos["oprID_WS"])? $datos["oprID_WS"]: "NULL";
        $oprTipo = ($datos["ingID"])?"S":"W";

        $SQL = "INSERT INTO " . self::SAFIT_DB . ".safOperacionesBoletasPago VALUES(
             DEFAULT, 'A', '$oprTipo', $ingID, $ingID_WS, '$datos[munID]', '$datos[cemID]', $opeID, $oprID_WS,
             $frmID, '$datos[tdcID]', '$datos[oprDocumento]','$datos[oprSexo]',  $datos[oprNombre],
             $datos[oprApellido], NOW(), NULL, NULL
          )";

    		$res_opr = $this->_conn->execute($SQL);

        if ($res_opr)
            return $this->respuesta_clase($res_opr->ReturnId(), "O001");
        else
            return $this->respuesta_clase(false, "O007");
    }

    /**
     * safit_boleta::obtener_formulario_operacion()
     *
     * @param mixed $tdcID
     * @param mixed $nroDoc
     * @param mixed $cemID
     * @return
     */
    public function obtener_formulario_operacion($tdcID, $nroDoc, $cemID)
    {
        $retFrm = $this->_get_formulario_persona($tdcID, $nroDoc, $cemID);
        if (!$retFrm) return $this->respuesta_clase(false, "B012");
        if ($retFrm->numrows > 0) return $this->respuesta_clase($retFrm->field("frmID"));

        $retFrm = $this->_get_formulario_sin_utilizar($cemID);
        if (!$retFrm) return $this->respuesta_clase(false, "B012");
        if ($retFrm->numrows > 0) return $this->respuesta_clase($retFrm->field("frmID"));

        return $this->respuesta_clase(false, "B012");
    }

    /**
     * safit_boleta::obtener_formulario_disponible()
     *
     * 		Verifica que el centro de emisión disponga de formularios para emitir boletas de pago
     *
     * @param mixed $cemID
     * @return
     */
    public function obtener_formulario_disponible($cemID)
    {
        $SQL = "SELECT FRM.frmID FROM " . self::SAFIT_DB . ".safFormularios FRM WHERE  FRM.munID = '" . $this->get_munID() . "' AND FRM.cemID = '$cemID' AND FRM.frmEstado ='N' LIMIT 1";

			  $ret = $this->_conn->execute($SQL);
        return (!$ret || $ret->numrows == 0)?$this->respuesta_clase(false, "B016"):$ret;
    }

    /**
     * safit_boleta::_get_formulario_persona()
     *
     * @param mixed $tdcID
     * @param mixed $nroDoc
     * @return
     */
    private function _get_formulario_persona($tdcID, $nroDoc, $cemID)
    {
        $SQL = "SELECT OPE.frmID FROM " . self::SAFIT_DB . ".safOperacionesBoletasPago OPE, " . self::SAFIT_DB . ".safFormularios FRM  WHERE OPE.oprEstado = 'A' AND OPE.munID= '" . $this->get_munID() . "' AND FRM.cemID = '$cemID' AND OPE.tdcID = '$tdcID' AND OPE.oprDocumento = '$nroDoc' AND OPE.frmID = FRM.frmID AND FRM.frmEstado = 'N' LIMIT 1";
        $ret = $this->_conn->execute($SQL);
        return (!$ret)?$this->respuesta_clase(false, "B010"):$ret;
    }

    /**
     * safit_boleta::_get_formulario_sin_utilizar()
     *
     * @param mixed $cemID
     * @return
     */
    private function _get_formulario_sin_utilizar($cemID)
    {
        $SQL = "SELECT FRM.frmID FROM " . self::SAFIT_DB . ".safFormularios FRM WHERE FRM.frmID NOT IN((select distinct OPE.frmID from " . self::SAFIT_DB . ".safOperacionesBoletasPago OPE where OPE.oprEstado = 'A' AND munID = '" . $this->get_munID() . "' AND OPE.cemID = '$cemID')) AND FRM.munID = '" . $this->get_munID() . "' AND FRM.cemID = '$cemID' AND FRM.frmEstado ='N' LIMIT 1";
        $ret = $this->_conn->execute($SQL);
        return (!$ret)?$this->respuesta_clase(false, "B010"):$ret;
    }

    /**
     * safit_boleta::obtener_bancos()
     *
     * @param string $banID
     * @return
     */
    public function obtener_bancos($banID = '')
    {
        $SQL = "SELECT banID, banDescrip FROM sugit.sugBancos WHERE banEstado ='A' AND banBoleta='S' AND banID NOT IN(72,29,999)";
        if ($banID) $SQL .= " AND banID='$banID'";
        $res = $this->_conn->execute($SQL);
        return ($res)?$res:$this->respuesta_clase(false, "B008");
    }

		/**
		 * safit_boleta::_formatMontoBoleta()
		 *
		 *	Formatea el monto de la boleta de pago
		 *
		 * @param mixed $bopMonto
		 * @return
		 */
		public function _formatMontoBoleta($bopMonto){
			return number_format($bopMonto, 2, '.', '');
		}

    /**
     * safit_boleta::guadar_datos_boleta()
     *
     * 	Registra los datos de la boleta de pago con sus detalles y también actualiza el bopID de
     * operacionesBolestasPago
     *
     * @param mixed $_POST
     * @return
     */
    public function registrar_boleta($datos){
    	if (isset($datos["datos_presentante"]))
    		$datos_persona = unserialize(base64_decode($datos["datos_presentante"]));
    	else
    		$datos_persona = array("oprSexo"=>$datos["sexo"], "oprDocumento"=>$datos["nroDoc"]);

        $datos["frmID"] = ($datos["frmID"])?"'" . $datos["frmID"] . "'":"NULL";
        $datos["tfrID"] = ($datos["tfrID"])?"'" . $datos["tfrID"] . "'":"NULL";
        $bopObservaciones = ($datos["bopObservaciones"])?"'" . $datos["bopObservaciones"] . "'":"NULL";
        $datos["bopMonto"] = $this->_formatMontoBoleta((($datos["bopMonto"])?$datos["bopMonto"]:$this->_get_montos_tramite($datos)));

        $bopFecVen = date("Y-m-d", strtotime("+" . $this->get_params("FEC_VENC_BOLETA") . " days", strtotime(date("Y-m-d"))));

	    	$tbpID = ($this->get_zonID() != 1)?1:2;
        if (!$this->get_bopNumero()) {
          return $this->respuesta_clase(false, "B040");
        }

    		$datos["estID"] = ($datos["estID"])?$datos["estID"]:'N';
		    $bopEX          = 'N';

				// INICIO - verifica si la persona esta exenta para el pago
    		if($this->get_params("VALIDAR_EXENCION") == "S"){
	    		$exencion = new safit_exenciones($datos_persona["oprDocumento"],$datos_persona["oprSexo"]);
    			$exencion->set_munID($datos["munID"]);
	    		$existeExencion = $exencion->verificarExencionActiva();
    			if($existeExencion == 'E'){
    			 	$datos["bopMonto"] =  $this->_formatMontoBoleta(($datos["bopMonto"] -$this->get_params("VALOR_FORM")));
		    		$bopEX = 'S';
    			}
		    }

    		// FIN - verifica si la persona esta exenta para el pago
    		if($datos["estID"] == "A")
    			$datos["bopResto"] = 0;
    		else
    			$datos["bopResto"] 	= ( $datos["bopResto"])?$datos["bopResto"]:$datos["bopMonto"];

    		$datos["bopFecPag"] = ( $datos["bopFecPag"])?"'".$datos["bopFecPag"]."'":"NULL";
        $oprID = ($datos["oprID"])? "'" . $datos["oprID"] . "'": "NULL";

        $SQL = "INSERT INTO " . self::SAFIT_DB . ".safBoletasPago VALUES(DEFAULT,'N',".$tbpID.", '" . $this->get_bopNumero() . "','" . $this->get_munID() . "','" . $datos['cemID'] . "',NULL," . $datos["tfrID"] . "," . $datos["frmID"] . ", $oprID,'" . $datos["banID"] . "',1,'".$datos["estID"]."',NULL,NULL,NULL,'$bopEX',0,'" . $datos["bopMonto"] . "',".$this->get_params("VALOR_FORM").",'" . $datos["bopResto"] . "','$bopFecVen',$bopObservaciones,NOW(),NOW(),NULL,".$datos["bopFecPag"].",NULL,NULL,NULL,'" . $this->get_params("ADP_OPERADOR_DEF") . "')";

			  if (!($ret = $this->_conn->execute($SQL))) {
            return $this->respuesta_clase(false, "B009");
        }
        $bopID = $ret->ReturnId();

    		//Guarda las infracciones
	    	if(!$this->registrar_detalles_boleta($bopID,$datos)){
	    		return false;
	    	}

        $datosBoleta = array(
            "codBoleta" 	=> $bopID,
            "bopNumero" 	=> $this->get_bopNumero(),
            "codCliente" 	=> "0",
            "codFecVen" 	=> $bopFecVen,
            "codImporte" 	=> $datos["bopMonto"],
            "munID" 			=> $datos["munID"],
            "cemID" 			=> $datos["cemID"]
            );

        $boletaPago = new safit_codigo_boleta($datos["banID"]);
        $bopCB = $boletaPago->generar_codigo_boleta($datosBoleta);

        if (!$bopCB)
            return false;

    	//agrega el código de barras y la cantidad de infracciones de la boleta
      $SQL = "UPDATE " . self::SAFIT_DB . ".safBoletasPago SET bopCB = '$bopCB', bopCI = '".$this->_cantidadInfracciones."' WHERE bopID = $bopID";
	    if (!($ret = $this->_conn->execute($SQL))) {
           return $this->respuesta_clase(false, "B022");
       }
        // comentado porque al no pagar infracciones por safit no hace falta registrarlas

      return $this->respuesta_clase($bopID);
    }

    /**
     * safit_boleta::_get_montos_tramite()
     *
     * @param mixed $datos
     * @return
     */
    private function _get_montos_tramite($datos)
    {

    	//descomentar las lineas cuando se quiera procesar las negativas de pago

        $montos = array();
        if (is_array($datos["munIDs"])) {
            foreach($datos["munIDs"] as $munID) {
                if (is_array($datos["DATA_" . $munID])) {
                    foreach($datos["DATA_" . $munID] as $key => $unaInfraccion) {
                        $unaInfraccion = explode("|", base64_decode($unaInfraccion));
                        //if (isset($datos["CM_" . $munID][$key]))
                            $montos["S"] += $unaInfraccion[7];
                        //else
                          //  $montos["NS"] += $unaInfraccion[7];
                    } //fin foreach CM
                }
            } // fin foreach munIDs
        }

        switch ($datos["tacID"]) {
            case 1:
                $bopMonto = $montos["NS"];
                break;
            case 2:
                $bopMonto = $montos["S"];
                break;
        } // switch

        return number_format(($bopMonto + $this->get_params("VALOR_FORM")), 2, '.', '');
    }

    /**
     * safit_boleta::registrar_detalles_boleta()
     *
     * @param mixed $bopID
     * @param mixed $datos
     * @return
     */
    public function registrar_detalles_boleta($bopID, $datos)
    {
    		$cantInf=0;
    		$this->_cantidadInfracciones = 0;
        if (is_array($datos["munIDs"])) {
            foreach($datos["munIDs"] as $munID) {
                if (is_array($datos["DATA_" . $munID])) {
                    foreach($datos["DATA_" . $munID] as $key => $unaInfraccion) {
                    		$cantInf++;
                        $unaInfraccion = explode("|", base64_decode($unaInfraccion));

                       // $tacID = (in_array($unaInfraccion[8], array("5", "6")))?"4":((isset($datos["CM_" . $munID][$key]))?$datos["tacID"]:"2");
                    		$tacID = "2";

	                    	if (isset($datos["datos_presentante"]))
	                    		$datos_persona = unserialize(base64_decode($datos["datos_presentante"]));

                    		$paramsActas = array(
                    										"bopID"			=>$bopID,
                    										"munID"			=>$munID,
                    										"infActa"		=>$unaInfraccion[0],
                    										"cifID"			=>$unaInfraccion[1],
                    										"nroDoc"		=>$datos_persona["oprDocumento"],
                    										"nombre"		=>$datos_persona["oprNombre"],
                    										"apellido" 	=>$datos_persona["oprApellido"],
                    										"sexo"			=>$datos_persona["oprSexo"],
                    										);
                        if ($munID==00000001) {
                          $retActas = $this->verificar_actas_duplicadas_00000001($paramsActas);
                          if (!$retActas)
                            return $this->respuesta_clase(false, "B025");
                        }

                    		if(!$this->verificar_codigo_infraccion($munID,$unaInfraccion[1],$unaInfraccion[2]))
                    			return $this->respuesta_clase(false, "B039");

	                    	if($unaInfraccion[12]){
	                    		$juzID = "'".$unaInfraccion[12]."'";
	                    		$juzgado = 'NULL';
	                    	}else{
	                    		$juzID = 'NULL';
	                    		$juzgado = ($unaInfraccion[13])?"'".$unaInfraccion[13]."'":'NULL';
	                    	}

		                    $infDominio = ($unaInfraccion[14])?"'".$unaInfraccion[14]."'":'NULL';

                        $SQL = "INSERT INTO " . self::SAFIT_DB . ".safDetallesBoletasPago VALUES($bopID,'$munID','$unaInfraccion[0]','$unaInfraccion[1]',$tacID,'$unaInfraccion[4]','$unaInfraccion[5]','".mysql_real_escape_string($unaInfraccion[6])."','$unaInfraccion[11]','$unaInfraccion[7]','$unaInfraccion[3]',$infDominio,$juzID,$juzgado,'$unaInfraccion[16]')";
                    	if (!$this->_conn->execute($SQL)){
                          return $this->respuesta_clase(false, "B023");
                    	}
                    } //fin foreach CM
                }
            } // fin foreach munIDs
        }

    		$this->_cantidadInfracciones = $cantInf;
        return $this->respuesta_clase();
    }

	/**
	 * safit_boleta::verificar_codigo_infraccion()
	 *
	 * @param mixed $munID
	 * @param mixed $cifID
	 * @param mixed $cifDescrip
	 * @return
	 */
	private function verificar_codigo_infraccion($munID,$cifID, $cifDescrip){
		$SQL = "SELECT 1 as EXISTE FROM ".self::SAFIT_DB.".safCodigosInfracciones WHERE cifID = '$cifID' AND munID = '$munID'";
		$res = $this->_conn->execute($SQL);
		if(!$res)
			return false;

		if($res->field("EXISTE") == 1)
			return true;

		$SQL = "INSERT INTO ".self::SAFIT_DB.".safCodigosInfracciones VALUES($munID,'".mysql_real_escape_string($cifID)."','A','".mysql_real_escape_string($cifDescrip)."',NOW(),NULL,NULL)";
		return $this->_conn->execute($SQL);
	}


	/**
	 * safit_boleta::verificar_actas_duplicadas_00000001()
	 *
	 *	Verifica las actas duplicadas de GCBA
	 *
	 * @param mixed $paramsActas
	 * @return
	 */
	public function verificar_actas_duplicadas_00000001($paramsActas){
		$SQL = "SELECT
							1 as EXISTE
						FROM
							".self::SAFIT_DB.".safDetallesBoletasPago
						WHERE
							bopID = '".$paramsActas["bopID"]."'
							AND munID = '00000001'
							AND infActa = '".$paramsActas["infActa"]."'
							AND cifID = '".$paramsActas["cifID"]."'
						LIMIT 1
						";
		$res = $this->_conn->execute($SQL);
		if(!$res)
			return true;
		if($res->field("EXISTE") == 1){
				$this->enviar_email_verificar_actas_00000001($paramsActas);
				return false;
		}

		return true;
	}

	/**
	 * safit_boleta::enviar_email_verificar_actas_00000001()
	 *
	 *	Envia un email informando del acta duplicada para su resolución.
	 *
	 * @param mixed $paramsActas
	 * @return
	 */
	private function enviar_email_verificar_actas_00000001($paramsActas){
		if(!$this->get_params("EMAIL_ACTASD_GCBA"))
			return true;

		$paramsEmail = array(
											"subject"		=>"[safit] Existes Actas de Infracción Duplicadas - Documento: ".$paramsActas["nroDoc"],
											"adress"		=>$this->get_params("EMAIL_ACTASD_GCBA"),
											"body"			=>"Se encontraron actas de infraccion duplicadas para la siguiente persona:\n\nDocumento: ".$paramsActas["nroDoc"]." \nSexo: ".$paramsActas["sexo"]." \nNombre: ".$paramsActas["nombre"]." \nApellido: ".$paramsActas["apellido"]."\n\nActa: ".$paramsActas["infActa"]."\nCódigo de Infracción: ".$paramsActas["cifID"]."\n\n\n\nNO RESPONDA ESTE EMAIL.\nLa respuesta debe ser enviada a:\n mauricio.aranda@safit.com.ar\n\n"
											);
		return $this->_enviar_email_alt($paramsEmail);
	}

    /**
     * safit_boleta::obtener_depositante()
     *
     * @return
     */
    public function obtener_datos_boletas_pago($datos = array())
    {
        $SQL = "SELECT OPR.*, TDC.tdcDescrip
               FROM " . self::SAFIT_DB . ".safOperacionesBoletasPago OPR, " . self::SAFIT_DB . ".safTipoDocumentos TDC
              WHERE OPR.tdcID=TDC.tdcID AND OPR.oprEstado = 'A' AND OPR.oprID= '" . $datos["oprID"] . "'
              ORDER BY OPR.oprID DESC LIMIT 1";

        return $this->_conn->execute($SQL);
    }

    /**
     * safit_boleta::obtener_depositante_FA()
     *
     * 	Obtiene los datos del depositantes pero formateados para ser usados en Consulta de antecedentes
     *
     * @return
     */
    public function obtener_datos_boletas_pago_FA($datos = array())
    {
        $datos = $this->obtener_datos_boletas_pago($datos);
        if (!$datos) return $this->respuesta_clase(false, "B011");
        if ($datos->numrows == 0) return $this->respuesta_clase(false, "B030");

        $_POST["nombre"] = $datos->field('oprNombre');
        $_POST["apellido"] = $datos->field('oprApellido');
        $_POST["tdcID"] = $datos->field('tdcID');
        $_POST["tdcDescrip"] = $datos->field('tdcDescrip');
        $_POST["nroDoc"] = $datos->field('oprDocumento');
        $_POST["sexo"] = $datos->field('oprSexo');
        $_POST["cemID"] = $datos->field('cemID');

        return array("nombre", "apellido", "tdcID", "nroDoc", "sexo");
    }

    /**
     * safit_boleta::generar_numero_boleta()
     * Registra en la tabla de números de boleta de pago y en la variable interna
     *
     * @return int
     */
    public function generar_numero_boleta(){
      $tbpID = ($this->get_zonID() != 1)?1:2;

      $SQL = "INSERT INTO " . self::SAFIT_DB . ".safBoletasPagoNumero VALUES('$tbpID', DEFAULT)";
      $res = $this->_conn->execute($SQL);

      $this->_bopNumero = $res->ReturnId();

      return $this->_bopNumero;
    }

    /**
     * safit_boleta::borrar_operaciones_persona()
     *
     * 	Da de baja todas las operaciones (safOperacioneasBoletasPago) de la persona consultada
     *
     * @param mixed $tdcID
     * @param mixed $nroDoc
     * @return
     */
    public static function borrar_operaciones_persona($munID, $cemID, $tdcID, $nroDoc)
    {
        global $conn;

        $SQL = "UPDATE " . self::SAFIT_DB . ".safOperacionesBoletasPago OPE SET OPE.oprEstado = 'B', OPE.oprFecBaj=now()  WHERE OPE.tdcID = '$tdcID' AND OPE.oprDocumento = '$nroDoc' AND OPE.munID = '$munID' AND OPE.cemID = '$cemID'";
        return $conn->execute($SQL);
    }

		/**
		 * safit_boleta::obtener_comprobante()
		 *
		 * @param mixed $ret
		 * @return
		 */
		public function obtener_comprobante($bopID = 0, $datos, $salida = SAF_SALIDA_HTML)
		{
		    require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/pdf/class.ezpdf.php");

		    if ($bopID) $this->set_bopID($bopID);
		    $this->set_params();
		    $this->set_datosCuenta();
				$this->set_datosBoletaBanco($datos["banID"]);
		    $res_bop = $this->obtener_datos();
				$infraccionesBoleta = $this->obtener_detalles_boleta();

		    if (!$datos["boletaDeposito"]) {
		        $res_tdc = obtener_tipo_documentos_safit("A", $datos["tdcID"]);
		        $datos["tdcDescrip"] = $res_tdc->field("tdcDescrip");
		    }else {
		        $res_tdc = obtener_municipalidades($datos["munID"]);
		        $datos["apellido"] = $res_tdc->field("munID") . " - " . $datos["cemID"];
		        $datos["nombre"] = $res_tdc->field("munRazonSocial");
		        $res_centro = safit_centro_emision::listar_centros_emision($datos["cemID"], array("munID" => $datos["munID"]));
		        $datos["tdcDescrip"] = $res_centro->field("cemDireccion") . ", CP";
		        $datos["nroDoc"] = $res_centro->field("cemCodPostal");
		    }

		    $pdf = &new Cezpdf("a4");
		    $pdf->selectFont($_SERVER["DOCUMENT_ROOT"] . "/includes/pdf/fonts/Helvetica.afm");
		    $pdf->ezSetCmMargins(0, 0.3, 0.9, 0.3);

		    /* prepara las variables de configuración */
		    $y = 500;
		    $x = 45;
		    $talon_p = 185;
		    $pdf->setColor(0, 0, 0);

		    /* talón principal */
		    $this->_pdf_talon_principal($pdf, $x, $y, $res_bop, $datos);

		    /* talón depositante y banco */
		    $y -= $talon_p;
		    $this->_pdf_talon_depositante($pdf, $x, $y, $talon_p, $res_bop, $datos);
		    $y -= $talon_p + 20;
		    $this->_pdf_talon_banco($pdf, $x, $y, $talon_p, $res_bop, $datos);
		 	$y -= $talon_p + 20;
		 	$this->_pdf_talon_entidades($pdf, $x, $y, $talon_p, $res_bop, $datos);

				//solo muestro la sección de infraciones si existen las mismas
		 	if($infraccionesBoleta && $infraccionesBoleta->numrows >0){
			$pdf->ezNewPage();
		  	$y = 500;
		  	$x = 45;
		 		$this->_pdf_listado_infracciones($pdf, $x, $y,$res_bop, $datos,$infraccionesBoleta);
		}

		    return $pdf->ezOutput();
		}

		/**
		 * safit_boleta::_pdf_talon_principal()
		 * Genera la sección del pdf correspondiente al talón principal
		 *
		 * @param EzPDF $pdf Clase pdf que administra la generación del archivo.
		 * @param int $x Posición X dentro de la hoja del pdf.
		 * @param int $y Posición Y dentro de la hoja del pdf.
		 * @return void
		 */
		private function _pdf_talon_principal($pdf, $x, $y, $res_bop, $datos)
		{
		    $pdf->filledRectangle($x, $y + 320, 510, 10);

		    $size = 8;
		    $x_texto = "            ";

		    $pdf->ezText($x_texto . "<b>" . $this->get_descrCuenta() . " - CC: " . $this->get_nroCuenta() . "</b>", $size);
		    $pdf->ezText($x_texto . $this->get_direccion(), $size);

		    $altura_img = 30;
		    $ancho_img = 135;
		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/logo_safit-cenat.jpg", $x + 5, 790 - $altura_img, $ancho_img, $altura_img);

		    $pdf->rectangle($x + 245, 770, 250, 20);
		    $pdf->ezSetY(786);
		    $pdf->ezText("<b>Boleta de pago Nº " . sprintf("%08s", $res_bop->field("bopID")) . "</b>", $size, array("aleft" => 360));
		    $pdf->ezSetY(770);
		    $pdf->ezText(date("d-m-Y H:i:s"), $size, array("aleft" => 380));

		    if($this->get_params("CHECK_DATOS_BOLETA") == 'S'){
		     $pdf->ezSetY(750);
		     //$pdf->ezText($x_texto . "<b>Depositante: " . strtoupper($datos["apellido"] . ", " . $datos["nombre"] . " (".$this->_sexos[$datos["sexo"]]).") </b>", $size);
		     $pdf->ezText($x_texto . "<b>Depositante: " . $datos["tdcDescrip"] . ":" . $datos["nroDoc"] . "</b>", $size);
		    }

		    $pdf->setColor(0.8, 0.8, 0.8);
		    $pdf->filledRectangle($x + 1, 693 + 20, 510 - 2, 12);
		    $pdf->setColor(0, 0, 0);
		    $altura_img = 12;
		    $ancho_img = 35;
		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/titulo_concepto.jpg", $x + 5, 705 + 20 - $altura_img, $ancho_img, $altura_img);
		    $altura_img = 12;
		    $ancho_img = 31;
		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/titulo_importe.jpg", $x + 470, 705 + 20 - $altura_img, $ancho_img, $altura_img);
		    // logica especial para las boletas de deposito
		    if ($datos["boletaDeposito"]) {
		        $pdf->ezSetY(705);
		        $pdf->ezText($x_texto . "    CERT. ANTEC. INFRAC.TRANSITO - FORM. " . $datos["frmDesde"] . "  HASTA " . $datos["frmHasta"], $size);
		        $pdf->ezSetY(705);
		        $pdf->ezText($x_texto . "$ " . number_format($datos["bopMonto"], 2), $size, array("aleft" => 480));
		    }else {
		        $pdf->ezSetY(705);
		        $pdf->ezText($x_texto . "    Formulario SAFIT - CENAT", $size);
		        $pdf->ezSetY(705);
		        $pdf->ezText($x_texto . "$ " . number_format($this->get_params("VALOR_FORM"), 2), $size, array("aleft" => 480));

		    		$yEx=705;
		     	if ($res_bop->field("bopEX") == "S"){
		     		$yEx= $yEx-10;
		     		$pdf->ezSetY($yEx);
		     		$pdf->ezText($x_texto . "     - Descuento por formulario Exento de cobro", $size);
		     		$pdf->ezSetY($yEx);
		     		$pdf->ezText($x_texto . "($ " . number_format($this->get_params("VALOR_FORM"), 2).")", $size, array("aleft" => 480));
		     	}

		     	if ($res_bop->field("bopCI") > 0){
		     		$montoBoleta = ($res_bop->field("bopEX") == "S")?$res_bop->field("bopMonto"):$res_bop->field("bopMonto")-$this->get_params("VALOR_FORM");
		     		$yEx = $yEx-10;
		     		$pdf->ezSetY($yEx);
		     		$pdf->ezText($x_texto . "    Infracciones de tránsito - Ver detalle (*).", $size);
		     		$pdf->ezSetY($yEx);
		     		$pdf->ezText($x_texto . "$ " . number_format($montoBoleta, 2), $size, array("aleft" => 480));
		     	}
		    }

				$pdf->ezSetY(610);
				$pdf->ezText($x_texto . "El NO pago de la totalidad de los importes referenciados en la boleta de pago impedirá iniciar el trámite correspondiente a la ", $size);
				$pdf->ezText($x_texto . "Licencia Nacional de Conducir conforme lo establece la legislación de las jurisdicciones locales competentes.", $size);

		    $pdf->setColor(0.8, 0.8, 0.8);
		    $pdf->filledRectangle($x + 1, 553, 450, 12);
		    $pdf->setColor(0, 0, 0);
		    $altura_img = 12;
		    $ancho_img = 44;
		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/total_pagar.jpg", $x + 5, 565 - $altura_img, $ancho_img, $altura_img);

		    $pdf->ezSetY(565);
		    $pdf->ezText($x_texto . "$ " . number_format($res_bop->field("bopMonto"), 2), $size, array("aleft" => 480));

		    $pdf->rectangle($x, $y+40, 510, 290);
		}

		/**
		 * safit_boleta::_pdf_talon_depositante()
		 * Genera la sección del pdf correspondiente al talón del depositante
		 *
		 * @param EzPDF $pdf Clase pdf que administra la generación del archivo.
		 * @param int $x Posición X dentro de la hoja del pdf.
		 * @param int $y Posición Y dentro de la hoja del pdf.
		 * @param int $talon_p Altura del talón.
		 * @return void
		 */
		private function _pdf_talon_depositante($pdf, $x, $y, $talon_p, $res_bop, $datos)
		{
		    $size = 8;
		    $x_texto = "                         ";

		    $altura_img = 12;
		    $ancho_img = 510;

				//sube o baja todo el contexto del recuadro
				$yUp = 520;

		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/tijerabor.jpg", $x - 1, ($yUp+18) - $altura_img, $ancho_img, $altura_img);

		    $pdf->filledRectangle($x, $y + $talon_p+12, 510, 10);

		    $altura_img = 188;
		    $ancho_img = 29;
		    $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/hex18.jpg", $x - 1, ($yUp+1) - $altura_img, $ancho_img, $altura_img);

		    $pdf->rectangle($x + 330, $yUp-40, 165, 20);
		    $pdf->ezSetY($yUp-23);
		    $pdf->ezText("Boleta de pago <b>Nº " . sprintf("%08s", $res_bop->field("bopID")) . "</b>", $size, array("aleft" => 405));
		    $pdf->ezSetY($yUp-43);
		    $pdf->ezText(date("d-m-Y H:i:s"), $size, array("aleft" => 420));

		    $pdf->ezSetY($yUp-15);
		    $pdf->ezText($x_texto . $this->get_descrCuenta() . " - CC: " . $this->get_nroCuenta(), $size);
		    $pdf->ezText($x_texto . "Convenio de Recaudación Nº " . $this->get_nroConvenio(), $size);
		    $pdf->ezSetY($yUp-72);

				if($this->get_params("CHECK_DATOS_BOLETA") == 'S'){
					$pdf->ezSetY($yUp-52);
					//$pdf->ezText($x_texto . "<b>Depositante: " . strtoupper($datos["apellido"] . ", " . $datos["nombre"] . " (".$this->_sexos[$datos["sexo"]]).") - " . $datos["tdcDescrip"] . ":" . $datos["nroDoc"] . "</b>", $size);
					$pdf->ezText($x_texto . "<b>Depositante: " . $datos["tdcDescrip"] . ":" . $datos["nroDoc"] . "</b>", $size);
				}

		    $pdf->rectangle($x + 70, $yUp-99, 130, 20);
		    $pdf->rectangle($x + 200, $yUp-99, 130, 20);
		    $pdf->ezSetY($yUp-82);
		    $pdf->ezText("Vencimiento: " . safit_format_date($res_bop->field("bopFecVen"), 1), $size, array("aleft" => 135));
		    $pdf->ezSetY($yUp-82);
		    $pdf->ezText($x_texto . "Efectivo: $ " . number_format($res_bop->field("bopMonto"), 2), $size, array("aleft" => 220));

		    $this->_pdf_letras_numero($pdf, $size, $yUp-120, $res_bop->field("bopMonto"));
		    $this->_pdf_codigo_barras($res_bop->field("bopCB"), $pdf, $x, $yUp-185);

		    $pdf->ezSetY($yUp-120);
		    $pdf->ezText("Sello Caja Banco", $size, array("aleft" => 455));
		    $pdf->rectangle($x + 385, $yUp-173, 110, 90);

		    $pdf->rectangle($x, $y + 22, 510, $talon_p);
		}

		/**
		 * safit_boleta::_pdf_talon_banco()
		 * Genera la sección del pdf correspondiente al talón del banco
		 *
		 * @param EzPDF $pdf Clase pdf que administra la generación del archivo.
		 * @param int $x Posición X dentro de la hoja del pdf.
		 * @param int $y Posición Y dentro de la hoja del pdf.
		 * @param int $talon_p Altura del talón.
		 * @return void
		 */
		private function _pdf_talon_banco($pdf, $x, $y, $talon_p, $res_bop, $datos)
		{
			$size = 8;
			$x_texto = "                         ";

			$altura_img = 12;
			$ancho_img = 510;

			//sube o baja todo el contexto del recuadro
			$yUp = 318;

			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/tijerabor.jpg", $x - 1, ($yUp+18) - $altura_img, $ancho_img, $altura_img);

			$pdf->filledRectangle($x, $y + $talon_p+12, 510, 10);

			$altura_img = 188;
			$ancho_img = 29;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/hex25.jpg", $x - 1, ($yUp+1) - $altura_img, $ancho_img, $altura_img);

			$pdf->rectangle($x + 330, $yUp-40, 165, 20);
			$pdf->ezSetY($yUp-23);
			$pdf->ezText("Boleta de pago <b>Nº " . sprintf("%08s", $res_bop->field("bopID")) . "</b>", $size, array("aleft" => 405));
			$pdf->ezSetY($yUp-43);
			$pdf->ezText(date("d-m-Y H:i:s"), $size, array("aleft" => 420));

			$pdf->ezSetY($yUp-15);
			$pdf->ezText($x_texto . $this->get_descrCuenta() . " - CC: " . $this->get_nroCuenta(), $size);
			$pdf->ezText($x_texto . "Convenio de Recaudación Nº " . $this->get_nroConvenio(), $size);
			$pdf->ezSetY($yUp-72);

			if($this->get_params("CHECK_DATOS_BOLETA") == 'S'){
				$pdf->ezSetY($yUp-52);
			//	$pdf->ezText($x_texto . "<b>Depositante: " . strtoupper($datos["apellido"] . ", " . $datos["nombre"] . " (".$this->_sexos[$datos["sexo"]]).") - " . $datos["tdcDescrip"] . ":" . $datos["nroDoc"] . "</b>", $size);
				$pdf->ezText($x_texto . "<b>Depositante: " . $datos["tdcDescrip"] . ":" . $datos["nroDoc"] . "</b>", $size);
			}

			$pdf->rectangle($x + 70, $yUp-99, 130, 20);
			$pdf->rectangle($x + 200, $yUp-99, 130, 20);
			$pdf->ezSetY($yUp-82);
			$pdf->ezText("Vencimiento: " . safit_format_date($res_bop->field("bopFecVen"), 1), $size, array("aleft" => 135));
			$pdf->ezSetY($yUp-82);
			$pdf->ezText($x_texto . "Efectivo: $ " . number_format($res_bop->field("bopMonto"), 2), $size, array("aleft" => 220));

			$this->_pdf_letras_numero($pdf, $size, $yUp-120, $res_bop->field("bopMonto"));
			$this->_pdf_codigo_barras($res_bop->field("bopCB"), $pdf, $x, $yUp-185);

			$pdf->ezSetY($yUp-120);
			$pdf->ezText("Sello Caja Banco", $size, array("aleft" => 455));
			$pdf->rectangle($x + 385, $yUp-173, 110, 90);

			$pdf->rectangle($x, $y + 22, 510, $talon_p);
		}

		/**
		* safit_boleta::_pdf_talon_entidades()
		* Genera la sección del pdf correspondiente al talón donde se muestran las entidades habilitadas para el pago
		*
		* @param EzPDF $pdf Clase pdf que administra la generación del archivo.
		* @param int $x Posición X dentro de la hoja del pdf.
		* @param int $y Posición Y dentro de la hoja del pdf.
		* @param int $talon_p Altura del talón.
		* @return void
		*/
		private function _pdf_talon_entidades($pdf, $x, $y, $talon_p, $res_bop, $datos)
		{
		$size = 8;
		$yUp= 65;

		$pdf->rectangle($x, $y + $talon_p-$yUp, 510, $yUp+35);

		$pdf->ezSetY($y + $talon_p+35);
		$pdf->ezText("Entidades habilitadas para el pago:", $size, array("aleft" => 50));

		$espacio = 5;

		if($this->get_zonID() == 1){
		$ancho_total = 200;
		$ancho_total += $ancho_img+$espacio;
		$altura_img = 25;
		$ancho_img = 63;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_banco_pcia.jpg", $x + $ancho_total, $y - 10 + $talon_p + 11 - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 23;
		$ancho_img = 45;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_bapro.jpg", $x + $ancho_total, $y - 10 + $talon_p + 11 - $altura_img, $ancho_img, $altura_img);

		}
		else{
		$ancho_total = 2; //posicion de inicio

		  //primera línea de entidades
		$altura_img = 25;
		$ancho_img = 100;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_banco_nacion.jpg", $x + $ancho_total, $y + 20 + $talon_p - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 21;
		$ancho_img = 34;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_pagofacil.jpg", $x + $ancho_total, $y +20 + $talon_p - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 21;
		$ancho_img = 62;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_rapipago.jpg", $x + $ancho_total, $y + 20 + $talon_p  - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 23;
		$ancho_img = 55;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_banco_santiago.jpg", $x + $ancho_total, $y+ 20 + $talon_p -1 - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 23;
		$ancho_img = 47;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_cobro_express.jpg", $x + $ancho_total, $y +20 + $talon_p -1 - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 23;
		$ancho_img = 47;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_ripsa.jpg", $x + $ancho_total, $y +20 + $talon_p -1 - $altura_img, $ancho_img, $altura_img);

		$ancho_total += $ancho_img+$espacio;
		$altura_img = 23;
		$ancho_img = 59;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_multipago.jpg", $x + $ancho_total, $y +20 + $talon_p -1 - $altura_img, $ancho_img, $altura_img);

		  $ancho_total += $ancho_img+$espacio;
		  $altura_img = 25;
		  $ancho_img = 66;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_pagomiscuentas.jpg", $x + $ancho_total, $y +20 + $talon_p -1 - $altura_img, $ancho_img, $altura_img);

		  //segunda línea de entidades
		  $ancho_total = 10;

		  $altura_img = 20;
		  $ancho_img = 68;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_pampa_pagos.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

		  $ancho_total += $ancho_img+$espacio;
		  $altura_img = 25;
		  $ancho_img = 68;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_supervielle.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

		  $ancho_total += $ancho_img+$espacio;
		  $altura_img = 24;
		  $ancho_img = 70;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_sol_pago.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

		  $ancho_total += $ancho_img+$espacio;
		  $altura_img = 25;
		  $ancho_img = 68;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_chubut_pagos.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

		  $ancho_total += $ancho_img+$espacio;
		  $altura_img = 25;
		  $ancho_img = 69;
		  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_formo_pagos.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			if(!$datos["boletaDeposito"]){
			  $ancho_total += $ancho_img+$espacio;
			  $altura_img = 25;
			  $ancho_img = 63;
			  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_banco_pcia.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			  $ancho_total += $ancho_img+$espacio;
			  $altura_img = 23;
			  $ancho_img = 45;
			  $pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_bapro.jpg", $x + $ancho_total, $y + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);
			}
			//Solo se muestra la entidad visa si la boleta de pago supera el monto del parámetro MIN_MONTO_VISA
			//if($res_bop->field("bopMonto") >= $this->get_params("MIN_MONTO_VISA")){
						//Tercera línea de entidades
			$ancho_total = 1;

			$altura_img = 27;
			$ancho_img = 70;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_visa.jpg", $x + $ancho_total, $y -27 + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);
			//	}

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 25;
			$ancho_img = 68;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_bpn.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 25;
			$ancho_img = 80;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_corrientes.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 25;
			$ancho_img = 70;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_pluspago.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 28;
			$ancho_img = 50;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_santafe.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 23;
			$ancho_img = 75;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_sanjuan.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);

			$ancho_total += $ancho_img+$espacio;
			$altura_img = 25;
			$ancho_img = 38;
			$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/entidades/ent_entrerios.jpg", $x + $ancho_total, $y -27  + $talon_p - 10 + 1 - $altura_img, $ancho_img, $altura_img);


		}
		}

		/**
		* safit_boleta::_pdf_listado_infracciones()
		*
		*	Listado de infracciones
		*
		* @param mixed $pdf
		* @param mixed $x
		* @param mixed $y
		* @param mixed $res_bop
		* @param mixed $datos
		* @return
		*/
		private function _pdf_listado_infracciones($pdf, $x, $y, $res_bop, $datos,$infraccionesBoleta)
		{
		$ancho_pagina = 510;
		$size = 8;
		$pdf->filledRectangle($x, $y + 330, $ancho_pagina, 10);

		$altura_img = 13;
		$ancho_img = 60;
		$pdf->addJpegFromFile($_SERVER["DOCUMENT_ROOT"] . "/images/boleta/infracciones/listado.jpg", $x, 810 +20 - $altura_img, $ancho_img, $altura_img);
		$pdf->setColor(0.8, 0.8, 0.8);
		$pdf->filledRectangle($x + $ancho_img, 797 + 20, $ancho_pagina - $ancho_img, 13);
		$pdf->setColor(0, 0, 0);

		$pdf->rectangle($x + 245, 790, 250, 20);
		$pdf->ezSetY(806);
		$pdf->ezText("<b>Boleta de pago Nº " . sprintf("%08s", $res_bop->field("bopID")) . "</b>", $size, array("aleft" => 360));
		$pdf->ezSetY(790);
		$pdf->ezText(date("d-m-Y H:i:s"), $size, array("aleft" => 380));

		$pdf->ezSetY(770);
		$pdf->ezText("Las presentes infracciones de tránsito cuentan con sentencia firme informadas por las respectivas jurisdicciones a la ANSV.", $size, array("aleft" => 52));

		$pdf->ezSetY(750);
		$pdf->ezText("Cualquier reclamo y/o consulta vinculada con las infracciones informadas deberá dirigirse a la entidad local competente de juzgamiento,", $size, array("aleft" => 52));
		$pdf->ezText(" o comunicarse a los siguientes contactos:", $size, array("aleft" => 52));

		$espacio1 = 52;
		$espacio2 = 80;

		$pdf->ezSetY(720);
		$pdf->ezText("<b><u>PROVINCIA DE BUENOS AIRES</u></b> - www.infraccionesBA.net", $size, array("aleft" => $espacio1));
		$pdf->ezText("Calle 6 Nº 928, La Plata, CP 1900", $size, array("aleft" => $espacio2));
		$pdf->ezText("Consulta web de infracciones: www.infraccionesba.net/webInfractor.do?method=consultaInfracciones", $size, array("aleft" => $espacio2));
		$pdf->ezText("Conmutador: 0221-4270034", $size, array("aleft" => $espacio2));
		$pdf->ezText("Infracciones: 0800-222-0024", $size, array("aleft" => $espacio2));

		$pdf->ezSetY(660);
		$pdf->ezText("<b><u>CIUDAD AUTONOMA DE BUENOS AIRES</u></b> - www.buenosaires.gob.ar", $size, array("aleft" => $espacio1));
		$pdf->ezText("Carlos Pellegrini 211, 1º piso, CABA", $size, array("aleft" => $espacio2));
		$pdf->ezText("Consulta web de infracciones: www.buenosaires.gob.ar/infracciones", $size, array("aleft" => $espacio2));
		$pdf->ezText("0800-999-2727", $size, array("aleft" => $espacio2));
		$pdf->ezText("147", $size, array("aleft" => $espacio2));
		$pdf->ezText("(011)4324-8000", $size, array("aleft" => $espacio2));

		$pdf->ezSetY(590);
		$pdf->ezText("<b><u>ENTRE RIOS (Seccion expedientes y asuntos Judiciales)</u></b>", $size, array("aleft" => $espacio1));
		$pdf->ezText("e-mail: expedientes.seg.vial@gmail.com", $size, array("aleft" => $espacio2));
		$pdf->ezText("Calle Gualeguaychu 560, Paraná, Entre Ríos, CP 3100", $size, array("aleft" => $espacio2));
        $pdf->ezText("Horario de atención de 08 a 13 hs.", $size, array("aleft" => $espacio2));
		$pdf->ezText("0343 - 4840719 / 4840678 / 4840676 / 4840675 / 4840884", $size, array("aleft" => $espacio2));
		$pdf->ezText("0343 - 4840778 / 4840671 / 4840616 / 4840617", $size, array("aleft" => $espacio2));
		$pdf->ezText("Teléfono de contacto policial: 0343-4840718", $size, array("aleft" => $espacio2));
		$pdf->ezSetY(510);

		//defino las propiedadesd de los titulos de la tabla
		$titulos = array(
										"infActa"=>array(
																	"title"=>"<b>Nº Acta</b>",
																	"justification"=>"left",
																	"width"=>"60"
																 ),
										"cifID"=>array(
																	"title"=>"<b>Código</b>",
																	"justification"=>"left",
																	"width"=>"30"
																 ),
										"infDominio"=>array(
																	"title"=>"<b>Dominio</b>",
																	"justification"=>"left",
																	"width"=>"37"
																 ),
										"infFecha"=>array(
																	"title"=>"<b>Fecha de inf.</b>",
																	"justification"=>"left",
																	"width"=>"50"
																 ),
										"infHora"=>array(
																	"title"=>"<b>Hora de inf.</b>",
																	"justification"=>"left",
																	"width"=>"40"
																 ),
										"infLugar"=>array(
																	"title"=>"<b>Lugar</b>",
																	"justification"=>"left",
																	"width"=>"120"
																 ),
										"juzRazonSocial"=>array(
																	"title"=>"<b>Juzgado</b>",
																	"justification"=>"left",
																	"width"=>"150"
																 ),
										"infImporte"=>array(
																		"title"=>"<b>Monto</b>",
																		"justification"=>"right",
																		"width"=>"35"
																	 )
									);

		//Completo el listado de titulos para la Tabla
		foreach($titulos as $titulo => $contenido){
		$titulosTabla[$titulo] = $contenido["title"];
		foreach($contenido as $id => $value)
			if($id!= "title")
				$colsTabla[$titulo][$id] = $value;
		}

		//defino  las opciones de la tabla
		$opcionesTabla = array(
			'showlines'					=>2,
			'repeatTableHeader'	=>1,
			'showHeadings'			=>true,
			'shaded'						=>1,
			'shadeCol'=>array(0.9,0.9,0.9),
			'fontSize'					=>$size-2,
			'titleFontSize'			=>$size,
			'xOrientation'			=>center,
			'width'							=>800,
			'rowGap'						=>2,
			'colGap'						=>2,
			'cols'							=>$colsTabla
		);

		//formateo la respuesta de infracciones para mostrarlas en el PDF
		$i=0;
		for(;!$infraccionesBoleta->eof;$infraccionesBoleta->MoveNext()){
			//Se guardan los códigos de infracción
			if(!$cifIDS[$infraccionesBoleta->field("cifID")])
				$cifIDS[$infraccionesBoleta->field("cifID")] = $infraccionesBoleta->field("cifDescrip");

			if(!$datosTabla[$infraccionesBoleta->field("munID")]["munRazonSocial"])
				$datosTabla[$infraccionesBoleta->field("munID")]["munRazonSocial"] =$infraccionesBoleta->field("munRazonSocial") . "(".$infraccionesBoleta->field("zonDescrip").")";

			foreach($infraccionesBoleta->fieldname as $unCampo)
				$datosTabla[$infraccionesBoleta->field("munID")]["data"][$i][$unCampo] =  $infraccionesBoleta->field($unCampo);
		$i++;
		}

		// Por cada Municipalidad Muestro las infracciones
		foreach($datosTabla as $munID => $datosInfracciones){
		$pdf->ezText(" ", $size-4);
		$pdf->ezText("<b>".$datosInfracciones["munRazonSocial"]."</b>", $size, array("aleft" => $espacio1));
		$pdf->ezText(" ", $size-4);
		$pdf->ezTable($datosInfracciones["data"], $titulosTabla, "",$opcionesTabla);
		}

		$pdf->ezText(" ", $size+4);
		$pdf->ezText("<b>Códigos de infracción</b>", $size, array("aleft" => $espacio1));
		$pdf->ezText(" ", $size-4);

		ksort($cifIDS);
			foreach($cifIDS as $cifID=>$cifDescrip){
			$y = $pdf->ezText($cifID ." - ".$this->formatCifDescrip($cifDescrip), $size, array("aleft" => $espacio1));
				if($y<50){
					$pdf->ezNewPage();
				}
			}

		$pdf->ezText(" ", $size+4);
		$pdf->ezText("<b>Jurisdicciones Consultadas</b>", $size, array("aleft" => $espacio1));
		$pdf->ezText(" ", $size-4);
		$pdf->ezText($datos["municipalidades"], $size, array("aleft" => $espacio1));

		}

		private function _pdf_letras_numero($pdf, $size, $y, $bopMonto)
		{
		    $x_texto = "                         ";

		    $nw = new Numbers_Words();
		    $totaltxt = explode(".", $bopMonto, 2);
		    $ttlTxt = ucfirst($nw->toWords($totaltxt[0], "es_AR"));
		    $pdf->ezSetY($y);
		    $pdf->ezText($x_texto . "Son pesos: " . $ttlTxt, $size);
		}

		/**
		 * safit_boleta::_pdf_codigo_barras()
		 * Registra en el pdf, el código de barras especificado
		 *
		 * @param string $bopCB Código de barras de la boleta
		 * @param EzPDF $pdf Clase pdf que administra la generación del archivo.
		 * @param int $x Posición X del código de barras.
		 * @param int $y Posición Y del código de barras.
		 * @return void
		 */
		private function _pdf_codigo_barras($bopCB, $pdf, $x, $y)
		{

		    $_http_host = ($_SERVER["HTTP_HOST"] == "services.safit.com.ar") ? "www.safit.com.ar" : $_SERVER["HTTP_HOST"];
		    $cb_image = (($_SERVER["HTTPS"]=="on")?"https":"http")."://".$_http_host."/includes/barcode/image.php?code=$bopCB&style=192&type=C128C&width=360&height=65&xres=1&font=2&zonID=".$this->get_zonID();
		    $fp = @fopen($cb_image, "rb");
		    if (!$fp) return false;
		    while (!feof($fp))
		    $cont .= fread($fp, 1024);
		    fclose($fp);
		    $image = tempnam ("/tmp", "php-pdf");
		    $fp2 = @fopen($image, "w");
		    fwrite($fp2, $cont);
		    fclose($fp2);

		if($this->get_zonID() == 1)
		  	  $pdf->addPngFromFile($image, $x + 32, $y+10, 227, 40);
				else
					$pdf->addPngFromFile($image, $x + 32, $y, 283, 52);
		    unlink($image);
		}

    /**
     * safit_boleta::validar_tanda_formularios()
     *
     * @param mixed $datosBoleta
     * @return
     */
    public function validar_tanda_formularios($datosBoleta)
    {
        if (!$datosBoleta["frmDesde"] || !$datosBoleta["frmHasta"])
            return $this->respuesta_clase(false, "B017");
        if ((int)$datosBoleta["frmDesde"] > (int)$datosBoleta["frmHasta"])
            return $this->respuesta_clase(false, "B017");

    		$cantidad = $datosBoleta["frmHasta"] - $datosBoleta["frmDesde"] + 1;

    		//Verificamos que exista la tanda de formularios y que la misma este no utilizada y no acreditada
    		$SQL = "SELECT count(*) cantidad, SUM(frmPrecio) AS monto, frmPrecio AS precio FROM " . self::SAFIT_DB . ".safFormularios WHERE frmID BETWEEN '".$datosBoleta["frmDesde"]."' AND '".$datosBoleta["frmHasta"]."' AND estID IN ('N','O') AND munID = '".$datosBoleta["munID"]."' AND cemID = '".$datosBoleta["cemID"]."' ";
	    	$res = $this->_conn->execute($SQL);
	    	if (!$res)
	    		return $this->respuesta_clase(false, "B040");

        $monto = $res->field("monto");
        $precio = $res->field("precio");

	    	// Validamos que la tanda de formularios que se está por acreditar en la boleta existan y estén todos sin acreditar y no utilizados
    		if((int)$res->field("cantidad") != $cantidad)
        	return $this->respuesta_clase(false, "B041");

        $SQL = "SELECT 1 existe FROM " . self::SAFIT_DB . ".safTandaFormularios WHERE tfrEstado = 'A' AND  ((" . $datosBoleta["frmDesde"] . " between 	frmID_D  AND  frmID_H)  OR (" . $datosBoleta["frmHasta"] . " between frmID_D AND	frmID_H)) LIMIT 1";
 				$res = $this->_conn->execute($SQL);

    		// validamos que la tanda que se quiere ingresar no haya sido ingresado anteriormente
        if (!$res || $res->numrows > 0)
            return $this->respuesta_clase(false, "B018");

	    	$opeID_R = ($_COOKIE["cookie"]["opeID"])?"'" . $_COOKIE["cookie"]["opeID"] . "'":"NULL";

    		//Verificamos que exista una NC por el monto total de la boleta de pago a acreditar o varias NC por el monto a acreditar
	    	$SQL = "SELECT * FROM sugit.sugDetallesDocumentosRendiciones DOC WHERE DOC.munID = '".$datosBoleta["munID"]."' AND DOC.cemID = '".$datosBoleta["cemID"]."'  AND DOC.renComp = 'NC' AND DOC.sisID = 'SF' ORDER BY DOC.renMonto DESC";
	    	$res2 = $this->_conn->execute($SQL);
    		if (!$res2 || $res2->numrows == 0)
	    		return $this->respuesta_clase(false, "B042");

    		$total = 0;
    		$renFecReg = $res2->field("renFecReg");
				for(;!$res2->eof;$res2->moveNext()){
					$total += $res2->field("renMonto");
					$rendiciones[] = $res2->field("renID")."|".$res2->field("cliID")."|".$res2->field("docID")."|".$res2->field("renMonto");
					if($total >= $monto)
						break;
				}

    		// si las NC  no llegan a cubrir el monto de los formularios no se permite continuar
    		if($total < $monto)
    			return $this->respuesta_clase(false, "B042");

    		//Inserta la Tanda de formularios
        $SQL = "INSERT INTO " . self::SAFIT_DB . ".safTandaFormularios VALUES	(DEFAULT,'A','$datosBoleta[frmDesde]','$datosBoleta[frmHasta]',$cantidad,$precio,$monto,NOW(),NULL,NULL,$opeID_R) ";
        $res = $this->_conn->execute($SQL);
        if (!$res)
            return $this->respuesta_clase(false, "B019");

        return array($res->ReturnId(), $monto,$renFecReg,$rendiciones);
    }

		/**
		 * safit_boleta::acreditar_tanda_formularios()
		 *
		 * @param mixed $datosBoleta
		 * @return
		 */
		public function acreditar_tanda_formularios($datosBoleta,$rendiciones=array())
		{

			//Acredita los formularios de la tanda
			$SQL = "UPDATE safit.safFormularios SET estID = 'A', frmResto = 0, frmFecPag = '".$datosBoleta["bopFecPag"]."', frmFecAsi = '".$datosBoleta["bopFecPag"]."'  WHERE frmID BETWEEN '".$datosBoleta["frmDesde"]."' AND '".$datosBoleta["frmHasta"]."' AND munID = '".$datosBoleta["munID"]."' AND cemID = '".$datosBoleta["cemID"]."' AND estID IN('N','O') ";
			$res3 = $this->_conn->execute($SQL);
			if (!$res3)
				return $this->respuesta_clase(false, "B043");

			$i=1;
			$montoAcreditado = 0;
			foreach($rendiciones as $unaRendicion){
				unset($SQLExtra);
				list($renID,$cliID,$docID,$renMonto) = explode("|",$unaRendicion);

				if($i == count($rendiciones)){
				  $resto = $datosBoleta["bopMonto"] - $montoAcreditado;
					$diferencia = $renMonto - $resto;

					// Si queda saldo a favor genero una Nueva NC y acredito la NC anterior por el monto reducido
					if($diferencia > 0){

						//Nuevo monto de la NC existente
						$SQLExtra = " ,renMonto =  $resto";

						$SQL = "SELECT max(docID)+1 docIDN, renNroInstrumento, renSucursal, munID,cemID FROM sugit.sugDetallesDocumentosRendiciones  WHERE renID = '".$renID."' AND cliID = '".$cliID."' ";
						$res5 = $this->_conn->execute($SQL);
						if (!$res5)
							return $this->respuesta_clase(false, "B043");

						$SQL = "INSERT INTO sugit.sugDetallesDocumentosRendiciones VALUES ($renID,$cliID,'".$res5->field("docIDN")."','SF',NULL,'".$res5->field("munID")."','".$res5->field("cemID")."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'O','NC',NULL,1,'".$res5->field("renSucursal")."',$diferencia,0,0,'".$res5->field("renNroInstrumento")."',NULL,NULL,NULL,NULL,NULL,NOW())";
						$res6 = $this->_conn->execute($SQL);
						if (!$res6)
							return $this->respuesta_clase(false, "B043");

						$SQL = "UPDATE sugit.sugDetallesRendiciones SET renCant = renCant+1 WHERE renID = '".$renID."' AND cliID = '".$cliID."' ";
						$res6 = $this->_conn->execute($SQL);
						if (!$res6)
							return $this->respuesta_clase(false, "B043");

						$SQL = "UPDATE sugit.sugRendiciones SET renCant = renCant+1, renCantP = renCantP+1  WHERE renID = '".$renID."' ";
						$res6 = $this->_conn->execute($SQL);
						if (!$res6)
							return $this->respuesta_clase(false, "B043");
					}

				}

				// Acredito la NC
				$SQL = "UPDATE sugit.sugDetallesDocumentosRendiciones SET  renComp = 'FC', estID = 'A', bopID = '".$datosBoleta["bopID"]."' $SQLExtra WHERE renID = '".$renID."' AND cliID = '".$cliID."' AND docID = '".$docID."' ";
				$res4 = $this->_conn->execute($SQL);
				if (!$res4)
					return $this->respuesta_clase(false, "B043");

				$montoAcreditado += $renMonto;
				$i++;
			}
			return $this->respuesta_clase();
		}

    /**
     * safit_boleta::liberarBoleta()
     * Libera la boleta para su uso con otro formulario.
     *
     * @param int $bopID Identificador de la boleta de pago.
     * @return bool
     */
    public static function liberarBoleta($bopID){
      global $conn;

      $SQL = "UPDATE ".self::SAFIT_DB.".safBoletasPago BOL
                 SET BOL.bopEstado='N', BOL.frmID=NULL
               WHERE BOL.bopID='$bopID'";
      if (!$conn->execute($SQL))
        return false;

    	$SQL = "UPDATE ".self::SAFIT_DB.".safBoletasPago BOL, ".self::SAFIT_DB.".safOperacionesBoletasPago OPR
                 SET OPR.oprEstado='A'
               WHERE BOL.bopID='$bopID' AND BOL.oprID=OPR.oprID";
    	if (!$conn->execute($SQL))
    		return false;

      $SQL = "UPDATE sugit.sugDetallesDocumentosRendiciones SET frmID=NULL WHERE bopID='$bopID'";
      return $conn->execute($SQL);
    }

    /**
     * safit_boleta::reasociarBoleta()
     * Asocia la boleta al formulario especificado.
     *
     * @param int $bopID Identificador de la boleta de pago.
     * @param int $frmID Identificador del formulario a asociar
     * @return bool
     */
    public static function reasociarBoleta($bopID, $frmID){
      global $conn;

      $SQL = "UPDATE ".self::SAFIT_DB.".safBoletasPago SET frmID='$frmID' WHERE bopID='$bopID'";
      if (!$conn->execute($SQL))
        return false;

      $SQL = "UPDATE sugit.sugDetallesDocumentosRendiciones SET frmID='$frmID' WHERE sisID='SF' AND bopID='$bopID'";
      if (!$conn->execute($SQL))
        return false;

      /* actualizar el estado de acreditación del frmID */
      $SQL = "UPDATE ".self::SAFIT_DB.".safFormularios A, ".self::SAFIT_DB.".safBoletasPago B
                SET A.estID=B.estID, A.frmFecPag=B.bopFecPag,  A.frmFecAsi=B.bopFecPag, A.frmResto=B.bopResto
               WHERE B.bopID='$bopID' AND A.frmID='$frmID'";
      if (!$conn->execute($SQL))
        return false;

      return true;
    }

		/**
		 * safit_boleta::comprobaSiConsultaInfracciones()
		 *
		 * @return
		 */
		public function comprobaSiConsultaInfracciones()
		{
			$parametros = 	obtener_parametros_municipalidad($this->get_munID(),6);
			if(!$parametros)
				return $this->respuesta_clase(false,"B024");
			return $this->respuesta_clase($parametros->field("pamValor"));
		}

		/**
		 * safit_boleta::obtener_detalles_boleta()
		 *
		 * @return
		 */
		public function obtener_detalles_boleta()
		{
			$SQL = "SELECT BOP.*, MUN.munRazonSocial, ZON.zonDescrip, COD.cifDescrip, IF(JUZ.juzRazonSocial != '',JUZ.juzRazonSocial,BOP.infJuzgado) juzRazonSocial
							FROM sugit.sugMunicipalidades MUN, sugit.sugZonas ZON, ".self::SAFIT_DB.".safCodigosInfracciones COD, ".self::SAFIT_DB.".safDetallesBoletasPago BOP LEFT JOIN  ".self::SAFIT_DB.".safJuzgados JUZ ON (JUZ.juzID = BOP.juzID)
							WHERE
								COD.munID = BOP.munID
								AND COD.cifID = BOP.cifID
								AND BOP.munID = MUN.munID
								AND MUN.zonID = ZON.zonID_A
								AND BOP.bopID = '".$this->get_bopID()."'
							ORDER BY BOP.munID";

			$res = $this->_conn->execute($SQL);
			return $res;
		}

		/**
		 * safit_boleta::formatCifDescrip()
		 *
		 *	da formato a la descripción del codigo de infracción para imprimirlo en la boleta de pago
		 *
		 * @param mixed $cifDescrip
		 * @return
		 */
		public function formatCifDescrip($cifDescrip){
			return ucfirst(strtolower($cifDescrip));
		}

		/**
		 * safit_boleta::valida_estado_acreditacion()
		 *
		 *	Valida el estado de acreditación de una boleta de pago de acuerdo al parámetro 9 de la municipalidad en cuestion.
		 * 	Tipos de validación
		 * 		0 – No valida el estado de acreditación
		 *		1 – Valida que el estID de una boleta sea “A”
		 *		2 - Si es una boleta que tiene infracciones asociadas, el estID debe ser “A”.
		 *		3 – Valida que el estID de una boleta sea “A” solo si transcurrieron “N” días desde la emisión.
		 *
		 *	@param int $munID Identificador de Municipalidad
		 *
		 * @return Bool
		 */
		public function valida_estado_acreditacion($munID)
		{
			$res = obtener_parametros_municipalidad($munID,9);
			$datos = $this->obtener_datos();

			if($datos->field("bopEX") == 'S' && $datos->field("bopCI") == 0)
				return $this->respuesta_clase();

			switch ($res->field("pamValor")) {
				case 0:
					break;
				case 1:
					if($datos->field("estID") != 'A')
						return $this->respuesta_clase(false,"B027");
					break;
				case 2:
					if($datos->field("bopCI") > 0 && $datos->field("estID") != 'A')
						return $this->respuesta_clase(false,"B028");
					break;
				case 3:
					if((strtotime($datos->field("bopFecReg")."+ ".$this->get_params("ACREDITACION_PERIODO")." hours") < strtotime(date("Y-m-d H:i:s"))) && $datos->field("estID") != 'A')
						return $this->respuesta_clase(false,"B029");
					break;
				default:
					return $this->respuesta_clase(false,"B026");
			} // switch

			return $this->respuesta_clase();
		}

    /**
     * safit_boleta::validar_vencimiento_acreditada()
     *
     *	Valida que la boleta acreditada no esté vencida.
     *
     *
     * @return Bool
     */
    public function validar_vencimiento_acreditada()
    {
        $datos = $this->obtener_datos();
        if($datos->field("bopEX") == 'S' && $datos->field("bopCI") == 0)
            return $this->respuesta_clase();

        if((strtotime($datos->field("bopFecPag")."+ ".$this->get_params("ACREDITACION_VALIDEZ")." days") < strtotime(date("Y-m-d H:i:s"))) && $datos->field("estID") == 'A')
            return $this->respuesta_clase(false,"B044");

        return $this->respuesta_clase();
    }

    /**
     * safit_boleta::marcar_cobro()
     * Marca la boleta como pagada de forma online por una entidad recaudadora
     * @param char $ereID Identificador de entidad recaudadora.
     * @return bool
     */
    public function marcar_cobro($ereID){
      $res_bol = $this->obtener_datos();
      if (in_array($res_bol->field("estID"), array("A", "S")))
        return $this->respuesta_clase(false, -52);

      $SQL = "UPDATE ".self::SAFIT_DB.".safBoletasPago
                 SET estID_O='A', ereID_O='$ereID', bopFecPag_O=NOW()
               WHERE bopID='".$this->get_bopID()."'
               LIMIT 1";
      if (!$this->get_conn()->execute($SQL))
        return $this->respuesta_clase(false, -51);

      return $this->respuesta_clase();
    }

		/**
		 * safit_boleta::verificarProcedenciaBoleta()
		 *
		 * @param string $munID
		 * @param mixed $cemID
		 * @return
		 */
		public function verificarProcedenciaBoleta($munID, $cemID)
		{
			$SQL= "SELECT 1 existe FROM ".self::SAFIT_DB.".safBoletasPago WHERE bopID = '".$this->get_bopID()."' AND munID = '$munID' LIMIT 1";
			$res = $this->_conn->execute($SQL);

			if(!$res)
				return $this->respuesta_clase(false,"B031");

			if($res->field("existe") != 1)
				return $this->respuesta_clase(false,"B032");

			return $this->respuesta_clase();
		}

		/**
		 * safit_boleta::ejecutar_consultasSQL()
		 *
		 * @return
		 */
		public function ejecutar_consultasSQL(){
			if(is_array($this->_consultasSQL)){
				foreach ($this->_consultasSQL as $ID=>$aSQL ){
					if($ID == 2)
						$aSQL =	str_replace('%PERID%',$perID,$aSQL);
					$res = $this->_conn->execute($aSQL);
					if(!$res)
						return false;
					if($ID == 1)
						$perID = $res->returnID();
				}
			}
			return true;
		}

		/**
		 * safit_boleta::_obtener_datos_operacion()
		 *
		 *	Obtiene los datos de la operacion de la boleta de pago
		 *
		 * @return
		 */
		public function obtener_datos_operacion(){
			$SQL = "SELECT BOL.bopID, BOL.bopCB, BOL.bopEstado, OPR.*, TDC.tdcDescrip
	            FROM " . self::SAFIT_DB . ".safBoletasPago BOL, " . self::SAFIT_DB . ".safOperacionesBoletasPago OPR, sucerp.sucTipoDocumentos TDC
	           WHERE OPR.oprID=BOL.oprID AND OPR.tdcID=TDC.tdcID AND bopID = '".$this->get_bopID()."'";

			$res = $this->_conn->execute($SQL);
			return $this->respuesta_clase($res,"B033");
		}

		/**
		 * safit_boleta::modifiar_datos_operacion()
		 *
		 * @param array $_POST
		 * @return
		 */
		public function modificar_datos_operacion($datosOperacion)
		{
			$datos = $this->obtener_datos_operacion();
			/* validamos los caracteres recibidos */
			$ret = safit_licenciamiento::validar_datos_titular(array("oprNombre"=>$datosOperacion["oprNombre"],"oprApellido"=>$datosOperacion["oprApellido"]));
			if (!$ret[0])
				return $this->respuesta_clase(false, "I044");

			$SQL = "UPDATE ".self::SAFIT_DB.".safBoletasPago BOP, ".self::SAFIT_DB.".safOperacionesBoletasPago OPR SET OPR.oprNombre = '".$datosOperacion["oprNombre"]."', OPR.oprApellido = '".$datosOperacion["oprApellido"]."' WHERE OPR.oprID = BOP.oprID AND BOP.bopID = '".$this->get_bopID()."'";
			if(!$this->_conn->execute($SQL))
				return $this->respuesta_clase(false,"B034");

			if(!$this->agregar_modificacion_operacion($datos,$datosOperacion))
				return $this->respuesta_clase(false,"B034");

			$res_det = $this->obtener_datos_operacion();
			$res_bop = $this->obtener_datos();
			$res_cert = $this->obtener_certificado_boleta_db();

			$datos= array(
					"banID"							=>$res_bop->field("banID"),
					"munID"							=>$res_bop->field("munID"),
					"tdcID"							=>$res_det->field("tdcID"),
					"tdcDescrip"				=>$res_det->field("tdcDescrip"),
					"apellido"					=>$res_det->field("oprApellido"),
					"nombre"						=>$res_det->field("oprNombre"),
					"nroDoc"						=>$res_det->field("oprDocumento"),
					"sexo"							=>$res_det->field("oprSexo"),
					"municipalidades"		=>$res_cert->field("scbJurisdiccionesConsultadas")
					);

			unset($res_cert);
			unset($res_bop);
			unset($res_det);
			/*
			   $comprobante = $this->obtener_comprobante($this->get_bopID(),$datos);
			   $ret = $this->actualizar_certificado_boleta($comprobante);
			   if(!$ret)
			   return false;
			*/
			return $this->respuesta_clase(true,"G001");
		}

		/**
		 * safit_boleta::agregar_modificacion_operacion()
		 *
		 * @param mixed $datoOld
		 * @param mixed $datosNew
		 * @return
		 */
		private function agregar_modificacion_operacion($datoOld,$datosNew){
			$opeID = ($this->get_opeID())?$this->get_opeID():'NULL';
			$SQL = "INSERT INTO ".self::SAFIT_DB.".safOperacionesBoletasPagoModificaciones (bopID,bopNombreOld,bopNombreNew,bopApellidoOld,bopApellidoNew,bpmFecReg,munID,opeID_R) VALUES('".$this->get_bopID()."','".$datoOld->field("oprNombre")."','".$datosNew["oprNombre"]."','".$datoOld->field("oprApellido")."','".$datosNew["oprApellido"]."',NOW(),'".$this->get_munID()."',$opeID)";
			return $this->_conn->execute($SQL);
		}

		/**
		 * safit_boleta::guardar_certificado_boleta()
		 *
		 * @param mixed $comprobante
		 * @return
		 */
		public function guardar_certificado_boleta($comprobante,$jurisdiccionesConsultadas)
		{
			$SQL = "INSERT INTO ".self::SAFIT_DB.".safCertificadoBoleta VALUES(".$this->get_bopID().",'".base64_encode($comprobante)."','".md5(base64_encode($comprobante))."','".$jurisdiccionesConsultadas."',NOW(),NULL)";
			$ret= $this->_conn->execute($SQL);
			if(!$ret)
				return $this->respuesta_clase(false,"B036");
			/*
			   if(!$this->guardar_certificado_boleta_hd($comprobante))
			   return false;
			*/
			return true;
		}

		/**
		 * safit_boleta::guardar_certificado_boleta_hd()
		 *
		 *	Almacena en disco la boleta de pago
		 *
		 * @param mixed $comprobante
		 * @return
		 */
		public function guardar_certificado_boleta_hd($comprobante){
			$path = $this->get_path_boleta();

			if(!is_dir($path))
				mkdir($path);

			$path .= "/".$this->get_bopID().".pdf";

			return  file_put_contents($path,$comprobante);
		}

		/**
		 * safit_boleta::obtener_certificado_boleta()
		 *
		 * @return
		 */
		public function obtener_certificado_boleta(){

			$res_tra = $this->obtener_certificado_boleta_db();
			if(!$res_tra)
				return false;

			if($res_tra->numrows > 0)
				return base64_decode($res_tra->field("bopCertificado"));

			return $this->obtener_certificado_boleta_hd();
		}

		/**
		 * safit_boleta::obtener_certificado_boleta_hd()
		 *
		 *	recupera de disco la boleta de pago
		 *
		 * @return
		 */
		public function obtener_certificado_boleta_hd(){
			$path = $this->get_path_boleta()."/".$this->get_bopID().".pdf";

			if(!file_exists($path))
				return $this->respuesta_clase(false,"B037");

			return file_get_contents($path);
		}

		/**
		 * safit_boleta::obtener_certificado_boleta_db()
		 *
		 * @return
		 */
		public function obtener_certificado_boleta_db()
		{
			$SQL = "SELECT * FROM ".self::SAFIT_DB.".safCertificadoBoleta WHERE bopID = '".$this->get_bopID()."' ";
			$res = $this->_conn->execute($SQL);
			if(!$res)
				return $this->respuesta_clase(false,"B037");
			return $this->respuesta_clase($res);
		}

		/**
		 * safit_boleta::get_path_boleta()
		 *
		 * Obtiene la ruta donde guardar el comprobante PDF de la boleta
		 *
		 * @return
		 */
		function get_path_boleta(){
			$res = $this->obtener_datos();
			return $this->get_params("PATH_BOLETA")."/".date('Ym',strtotime($res->field("bopFecReg")));
		}

		/**
		 * safit_boleta::actualizar_certificado_boleta()
		 *
		 * @param mixed $comprobante
		 * @return
		 */
		public function actualizar_certificado_boleta($comprobante)
		{
			$path = $this->get_path_boleta()."/".$this->get_bopID().".pdf";

			if(!file_exists($path))
				return $this->respuesta_clase(false,"B038");

			unlink($path);
			return file_put_contents($path,$comprobante);

		}
    // ------------------------------- Fin Métodos primarios --------------------------------------------------
    // ------------------------------- Getters --------------------------------------------------
    /**
     * safit_boleta::get_bopID()
     * Obtiene el identificador de la boleta de pago.
     *
     * @return int
     */
    public function get_bopID()
    {
        return $this->_bopID;
    }

    /**
     * safit_boleta::get_tbpID()
     * Obtiene el identificador del tipo de boleta de pago.
     *
     * @return int
     */
    public function get_tbpID()
    {
        return $this->_tbpID;
    }

    /**
     * safit_boleta::get_nroCuenta()
     *
     * @return
     */
    public function get_nroCuenta()
    {
        return $this->_nroCuenta;
    }

    /**
     * safit_boleta::get_descrCuenta()
     *
     * @return
     */
    public function get_descrCuenta()
    {
        return $this->_descrCuenta;
    }

    /**
     * safit_boleta::get_direccion()
     *
     * @return
     */
    public function get_direccion()
    {
        return $this->_direccion;
    }

    /**
     * safit_boleta::get_nroConvenio()
     *
     * @return
     */
    public function get_nroConvenio()
    {
        return $this->_nroConvenio;
    }

    /**
     * safit_boleta::get_banco_descrip()
     * Devuelve la descripción del banco especificado.
     *
     * @param int $banID Identificador del banco.
     * @return string
     */
    public function get_banco_descrip($banID)
    {
        $SQL = "SELECT banDescrip FROM sugit.sugBancos WHERE banID='$banID'";
        $r = $this->_conn->execute($SQL);
        return "Banco " . $r->field("banDescrip");
    }

    /**
     * safit_boleta::get_bopNumero()
     * Devuelve el número de boleta a generar
     *
     * @return string
     */
    public function get_bopNumero(){
      return $this->_bopNumero;
    }

		/**
		 * safit_boleta::get_zonID()
		 *
		 *	Obtiene el zonID
		 *
		 * @return
		 */
		public function get_zonID(){
			if($this->_zonID)
				return $this->_zonID;

			$SQL = "SELECT zonID FROM sugit.sugMunicipalidades WHERE	munID = '".$this->get_munID()."'";
			$res = $this->_conn->execute($SQL);
			$this->_zonID = $res->field("zonID");

			return $this->_zonID;
		}
    // ------------------------------- Fin Getters --------------------------------------------------
    // ------------------------------- Setters  --------------------------------------------------
    /**
     * safit_boleta::set_bopID()
     * Establece el identificador para la boleta de pago.
     *
     * @param int $bopID Identificador de la boleta de pago.
     * @return void
     */
    private function set_bopID($bopID)
    {
        $this->_bopID = $bopID;
    }

    /**
     * safit_boleta::set_tbpID()
     * Establece el identificador del tipo de la boleta de pago.
     *
     * @param int $tbpID Identificador del tipo de la boleta de pago.
     * @return void
     */
    private function set_tbpID($tbpID)
    {
        $this->_tbpID = $tbpID;
    }

    /**
     * safit_boleta::set_datosCuenta()
     *
     * @return
     */
    public function set_datosCuenta()
    {
        $datosCuenta = explode("|", $this->get_params("DATOS_CUENTA"));

        $this->_nroCuenta = $datosCuenta[0];
        $this->_descrCuenta = $datosCuenta[1];
        $this->_nroConvenio = $datosCuenta[2];
        $this->_direccion = $datosCuenta[3];
    }

    /**
     * safit_boleta::set_nroConvenio()
     *
     * @return
     */
    protected function set_nroConvenio($nroConvenio)
    {
        $this->_nroConvenio = $nroConvenio;
    }

		/**
		 * safit_boleta::set_nroCuenta()
		 *
		 * @param mixed $nroCuenta
		 * @return
		 */
		protected function set_nroCuenta($nroCuenta)
		{
			$this->_nroCuenta = $nroCuenta;
		}

		/**
		 * safit_boleta::set_descrCuenta()
		 *
		 * @param mixed $descrCuenta
		 * @return
		 */
		protected function set_descrCuenta($descrCuenta)
		{
			$this->_descrCuenta = $descrCuenta;
		}

		/**
		 * safit_boleta::set_nroConvenioBanco()
		 *
		 * @param mixed $datos
		 * @return
		 */
		public function set_datosBoletaBanco($banID)
		{
			$codigo = new safit_codigo_boleta($banID);
			$this->set_nroConvenio($codigo->get_nroConvenio());
			$this->set_nroCuenta($codigo->get_nroCta());
			$this->set_descrCuenta($codigo->get_descrCta());
			return true;
		}
    // ------------------------------- Fin Setters --------------------------------------------------




} // Fin clase
?>
