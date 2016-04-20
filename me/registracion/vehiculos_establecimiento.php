<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

$smarty  = inicializar_smarty();
$errores = Array();

if(!empty($_GET['id'])){
	$smarty->assign('ACCION', 'modificacion');

	foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
		if($establecimiento['ID'] == $_GET['id']){
			$smarty->assign('ESTABLECIMIENTO', $establecimiento);
			break;
		}
	}
}

$cuit = $_SESSION['DATOS_EMPRESA']['CUIT'];

$smarty->display('registracion/vehiculos_establecimiento.tpl');

session_write_close();
?>
