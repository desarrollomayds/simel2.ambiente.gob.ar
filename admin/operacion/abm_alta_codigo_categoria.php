<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

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

public function get_listado_residuos($criterio )
	{
		$config = new config;
		$maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
		$maximum_links = $config->getParameters("framework::paginador::cantidad_links");

		$total_results = Residuo::count(array('conditions' => array('(codigo = ? )', $criterio)));

		$page = new Paginator();
		$paginate = $page->paginate($total_results, $maximum_per_page, $maximum_links, "Light");

		$valores = explode(",", $page->limit);

		$residuos = Residuo::find('all', array(
			'conditions' => array('(codigo = ? ', $criterio),
			'limit' => $valores['1'],
			'offset' => $valores['0'],
			'order' => 'codigo desc'
		));

		return array($residuos, $paginate);
	}