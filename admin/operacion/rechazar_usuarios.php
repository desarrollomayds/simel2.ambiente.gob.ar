<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
//require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 20;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

if (isset($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'buscar':
			# code...
			$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : NULL;
			$establecimiento = new Establecimiento;
			$establecimientos = $establecimiento->get_establecimientos_por_cuit($criterio);
			break;

		case 'rechazar':
			# code...
			$establecimiento_ID = $_POST['establecimiento_id'];
			$establecimiento = Establecimiento::find($establecimiento_ID);
			if ($establecimiento){
        		// Lo rechazo
        		$establecimiento->flag = 'r';
       	 		$establecimiento->save();
		        //exit(json_encode(array("respuesta" => true)));
		    }
		    $criterio = $establecimiento->usuario;
       	 	//$establecimientos = Establecimiento::find($establecimiento_ID);
       	 	$establecimientos = $establecimiento->get_establecimientos_por_cuit($criterio);
			break;
		
		default:
			# code...
			break;
	}

}	





$smarty->assign('establecimientos', $establecimientos);
$smarty->assign('criterio', $criterio);
//$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/rechazar_usuarios.tpl');
session_write_close();
