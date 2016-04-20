<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();

$smarty  = inicializar_smarty();
$errores  = Array();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	// Si no se especifica ningún código  se redirige
	if ( ! isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: abm_alta_codigo_categoria.php');
	}

	// En caso de que la empresa no este asignada a ningún administrador, se asigna el primero que entró
	//asignar_registracion_pendiente($_GET['id']);

	// Se comprueba que exista el codigo y que esté asignado al administrador actual
	//if ($empresa = obtener_registracion_pendiente($_GET['id']))
	//{
		$smarty->assign('cat_residuos_peligrosos', $categoria);
		$smarty->display('drp/operacion/edit_categoria.tpl');
	//}
	//else
	//{
	//	header('Location: listado_registros_pendientes.php');
	//}
}

session_write_close();
?>
