<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
//require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 19;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

if (isset($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'buscar':
			# code...
			$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : NULL;
			$residuo = new Residuo;
			$residuos = $residuo->get_listado_residuos($criterio);
			break;

		case 'editar':
			# code...
			$codigo = $_POST['codigo'];
			$residuo = Residuo::find($codigo);
			if ($residuo){
        		// Lo rechazo
        		$residuo->descripcion = 'r';
       	 		$residuo->save();
		        //exit(json_encode(array("respuesta" => true)));
		    }
		    //$criterio = $residuo->usuario;
       	 	//$establecimientos = Establecimiento::find($establecimiento_ID);
       	 	$residuos = $residuo->get_listado_residuos($criterio);
			break;
		
		default:
			# code...
			break;
	}

}	



$smarty->assign('residuos', $residuos);
$smarty->assign('criterio', $criterio);
//$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/abm_alta_codigo_categoria.tpl');
session_write_close();
