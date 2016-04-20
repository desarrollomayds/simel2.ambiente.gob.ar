<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$smarty  = inicializar_smarty();
$errores  = Array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$manifiesto = obtener_informacion_manifiesto($_POST['manifiesto_id']);

	if ($manifiesto) {
		$smarty->assign('GENERADORES',     $manifiesto['GENERADORES']);
		$smarty->assign('TRANSPORTISTAS',  $manifiesto['TRANSPORTISTAS']);
		$smarty->assign('OPERADORES',      $manifiesto['OPERADORES']);
		$smarty->assign('RESIDUOS',        $manifiesto['RESIDUOS']);
		$smarty->assign('MANIFIESTO',      $manifiesto);
		$html = $smarty->fetch('drp/operacion/ajax/ajax_obtener_informacion_manifiesto.tpl');
		echo $html;
		exit(0);
	}
}

die("Wrong call method.");
?>
