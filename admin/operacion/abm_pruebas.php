<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "22";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

// smarty
$smarty = inicializar_smarty();

if (isset($_POST['accion']) AND $_POST['accion'] == 'agregar_individual') {
	agregar_excepcion_individual();
} elseif (isset($_POST['accion']) AND $_POST['accion'] == 'eliminar_excepcion') {
	eliminar_excepcion();
}

$model = new Residuo;
list($residuos, $paginador) = $model->get_listado_residuos($_POST['criterio']);

$smarty->assign('residuos', $residuos);
$smarty->assign('criterio', isset($_POST['criterio']) ? $_POST['criterio'] : '');
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/abm_pruebas.tpl');

session_write_close();
/*
function agregar_excepcion_individual()
{
	$response = array('success' => true, 'errors' => array());
	$excepcion = new excepciones_cuit;
	list($success, $errors) = $excepcion->add($_POST['cuit'], $_POST['razon_social']);

	if ( ! $success) {
		$response['success'] = false;
		$response['errors'] = $errors;
	}

	echo json_encode($response);
	exit(0);
}

function eliminar_excepcion()
{
	$response = array('success' => true, 'errors' => array());
	$excepcion = new excepciones_cuit;
	
	try {
		$excepcion->remove($_POST['excepcion_id']);
	} catch (Exception $e) {
		$response['success'] = false;
		$response['errors'] = $e->getMessage();
	}

	echo json_encode($response);
	exit(0);
}
*/