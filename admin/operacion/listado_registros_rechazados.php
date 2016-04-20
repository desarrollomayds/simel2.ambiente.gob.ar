<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "5";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

if($_POST['accion'] == 'volver'){

try {
	$empresa = Empresa::find($_POST['id']);
	$empresa->flag = 'p';
	$resultado = $empresa->save();
 		} catch (Exception $e) {
  			$resultado['error'] = $e->getMessage();
  		}
echo json_encode($resultado);

} else {

list($rechazados, $paginate) = Empresa::get_listado_registros_rechazados('%'.$_GET['criterio'].'%');

$smarty = inicializar_smarty();
$smarty->assign('REGISTROS', $detalle);
$smarty->assign('PAGINADOR', $paginate);
$smarty->assign('RECHAZADOS', $rechazados);
$smarty->display('drp/operacion/listado_registros_rechazados.tpl');

}

session_write_close();
?>
