<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();

$smarty  = new Smarty();

$smarty->template_dir = SMARTY_DIR_TEMPLATES;
$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
$smarty->cache_dir    = SMARTY_DIR_CACHE;

$empresa = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $_GET['id'], 'p')));
if($empresa){


    $conexion = Empresa::connection();
	
    try
    {
        
        $conexion->transaction();
        
        // Si se aprueba una empresa, se aprueban sus establecimientos.
    	// Selección de los establecimientos de una emppresa
    	$establecimientos = Establecimiento::find('all', array('conditions' => array('empresa_id=?', $empresa->id)));

    	$empresa->flag = 't';
        $empresa->fecha_alta_drp = new Datetime;
    	$empresa->save();
        
        $colaEmail = new mail();

        foreach ($establecimientos as $est)
        {   
            $est->fecha_alta_drp = new Datetime;
            $est->save();
        	$colaEmail->ponerEnColaDeEnvio($est->id, '14');
        }

        $conexion->commit();
    }
    catch(Exception $e)
    {   
        $conexion->rollback();
        exit($e->getMessage());
    }

    header('location: listado_registros_pendientes.php');
    exit;
}

echo "error";

#	$smarty->assign('PENDIENTES', $pendientes);
#	$smarty->display('auditoria/listado_pendientes.tpl');

session_write_close();
?>