<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

  if(@strval($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) == ''){
    header('location: /');
    exit;
  }

	$smarty  = inicializar_smarty();
	$errores = Array();

	/*FLOR MARCA COMO LEIDO EL MENSAJE*/
	$id = $_GET['id'];
	

	$conexion = Mensaje::connection();
	$conexion->transaction();
	try{
					$mensajeVisto = Mensaje::find('first', array('conditions' => array('id = ? ', $_GET['id'])));
					if($mensajeVisto){
					$mensajeVisto->estado           = 'l';
					$mensajeVisto->save();
					
					}
			
			
			
			} catch (\Exception $e) {
		$conexion->rollback();
		$error = $e->getMessage();

	}
	$conexion->commit();
	
	$mensaje = obtener_mensaje_por_id($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $_GET['id']);
$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
		$smarty->assign('NUEVOS',         $cantidad1);
	
	$smarty->assign('MENSAJE', $mensaje);
$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('MENSAJES',        $mensajes);
	$smarty->assign('PAGINAS',         $paginas);
	$smarty->assign('ALERTAS',         $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS',    $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('GENERADOR',       $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->display('operacion/generador/mensajeria/visualizar_mensaje.tpl');

	session_write_close();
?>

