<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

	//require_once("../../global_incs/librerias/securimage/securimage.php");
	//require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	//require_once("../../global_incs/configuracion/configuracion.php");
	//require_once("../../global_incs/librerias/local.inc.php");
	//require_once("../../global_incs/librerias/drp.inc.php");

	
	// acl
	$modulo_id = "20";
	$permisos = new permisos();
	$permisos->validarAccesoSeccion($modulo_id);

	$establecimiento_ID = $_POST['establecimiento_id'];

    // Busco el establecimiento a rechazar
    //$establecimiento = Establecimiento::find('fisrt', array('conditions' => array('id=? AND flag="t"', $establecimiento_ID)));
 	$establecimiento = Establecimiento::find($establecimiento_ID);

    if ($establecimiento)
    {
        // Lo rechazo
        $establecimiento->flag = 'r';
        $establecimiento->save();
        exit(json_encode(array("respuesta" => true)));
    }
    else
	    {
	        // Mando mensaje de Error
	        exit(json_encode(array("respuesta" => false, "id" => $establecimiento_ID)));   
	    }


?>