<?

require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
error_reporting(E_ALL);
    
    $retorno = array();
    $errores = array();

     if ($_POST['accion']=='borrar' ) {
       
    

    $post_valido = true;
   
   

    $residuos_manifiesto_id = $_POST['id_residuo'];
  
     $residuosProcesados = ResiduosProcesados::find('first',array('conditions' => array('id = ?', $residuos_manifiesto_id )));
     $residuosProcesados->delete();
     
    
    
        echo json_encode('OK');    
       
    
}
    
    
    
    if ($_POST['accion']=='aceptar' ) {
       
    

    $post_valido = true;
   
    try{
    $id_manifiesto = $_POST['id'];
    $establecimiento_id = $_POST['establecimiento_id'];
    $residuos_manifiesto_id = $_POST['id_residuo'];
    $cantidad_procesada = $_POST['cantidad'];
    $forma_proceso = $_POST['metodo'];
    $metodoTexto = $_POST['metodoTexto'];
   $dateActual = $_POST['fecha'];
    
    
   $conexion = ResiduosProcesados::connection();
   $conexion->transaction();

    



   $residuosProcesados = ResiduosProcesados::create(Array(
                'id_manifiesto' => $id_manifiesto,
                'establecimiento_id' => $establecimiento_id,
                'residuos_manifiesto_id' => $residuos_manifiesto_id,
                'cantidad_procesada' =>$cantidad_procesada,
                'forma_proceso' =>$metodoTexto,
                'id_forma_proceso'=>$forma_proceso,
                'fecha_proceso' =>  convertir_fecha_es_en($dateActual),
    ));
   
   if ($residuosProcesados->save()) {
  $id = $residuosProcesados->id;
}
  
     
     	$conexion->commit();
		
		$error = null;
	} catch (\Exception $e) {
		$conexion->rollback();
		$error = $e->getMessage();
	}
      
    
       if(is_null($error)){
        echo json_encode($id);   
       }else{
        echo json_encode($id);    
       }
    
}
    
} else {

    $manifiesto = obtener_informacion_manifiesto($_GET['id']);
    $residuos_procesados = obtener_residuos_procesados($_GET['id']);
   
    $smarty = inicializar_smarty();
    $cantidad = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
    $smarty->assign('NUEVOS',         $cantidad);
                
    $tipoOperacion = obtener_cat_operaciones_residuos();  
    $select ="";
    foreach ($tipoOperacion as $key => $value) {
       $select .= '<option value="'.$tipoOperacion[$key]['ID'].'">'.$tipoOperacion[$key]['CODIGO'].'  - '.$tipoOperacion[$key]['DESCRIPCION'].'</option>'; 
    }
  
    
    $smarty->assign('TIPOOPERACION', $select);            
    $smarty->assign('GENERADORES', $manifiesto['GENERADORES']);
    $smarty->assign('TRANSPORTISTAS', $manifiesto['TRANSPORTISTAS']);
    $smarty->assign('OPERADORES', $manifiesto['OPERADORES']);
    $smarty->assign('RESIDUOS', $manifiesto['RESIDUOS']);
    $smarty->assign('MANIFIESTO', $manifiesto);
    $smarty->assign('PROCESADOS',$residuos_procesados);

    $smarty->assign('CREADOR', $manifiesto['CREADOR']["ID"]);
    $smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
    $smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);

    $smarty->display('operacion/operador/operador_proceso.tpl');
}

session_write_close();
?>
