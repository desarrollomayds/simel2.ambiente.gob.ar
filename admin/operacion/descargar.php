<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");
require_once("../../global_incs/librerias/mpdf/mpdf.php");

session_start();

$smarty  = new Smarty();

$smarty->template_dir = SMARTY_DIR_TEMPLATES;
$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
$smarty->cache_dir    = SMARTY_DIR_CACHE;

$empresa = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $_GET['id'], 'p')));

if ($empresa) {

    $ceros = "";
    if (strlen($empresa->id) < 10) {
        for ($i = strlen($empresa->id); $i < 10; $i++) {
            $ceros .="0";
        }
    }
    
    $codigo = $ceros.$empresa->id;

    $smarty  = inicializar_smarty();
    $smarty->assign('EMPRESA', $empresa);
    $smarty->assign('ESTABLECIMIENTOS', $empresa->establecimientos);
    $smarty->assign('CODIGO', $codigo);
    $html = $smarty->fetch('drp/operacion/imprimir_solicitud_registro.tpl');
    $mpdf = new mPDF();
    $mpdf->ignore_invalid_utf8 = true;
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}

echo "error";

session_write_close();
?>