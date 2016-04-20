<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$conexion = Empresa::connection();

  if(!isset($_GET['p'])){
    $p = 0;
  }else{
    $p = (int)$_GET['p'];
    if(is_null($p))
    	$p = 0;
  }
  
  /*FLOR DATOS EMPRESA NOMBRE, TELEFONO E E-MAIL*/
$estableci = array();
	$mensajes = obtener_mensajes_drp(SENTIDO_DRP, 'p', $p);
	$cantidad = obtener_cantidad_mensajes_drp(SENTIDO_DRP, 'p');
	$paginas  = @range(0, ($cantidad / 20) + 1);
	$i=0;
	
	foreach($mensajes as $key => $value){
	$id = $value['ID_ESTABLECIMIENTO'];
	$estableci[$key] = obtener_nombre_establecimiento($id);
	 
	 $id_empresa =  $estableci[$key][0]['EMPRESA_ID'];

	 $estableci[$key]['contacto'] = obtener_empresa_habilitada_contacto($id_empresa);
	 
	 
	$i++;
	}

	$mensajes = obtener_mensajes_drp(SENTIDO_ESTABLECIMIENTO, 'p', $p);
	$cantidad = obtener_cantidad_mensajes_drp(SENTIDO_ESTABLECIMIENTO, 'p');
	$paginas  = @range(0, ($cantidad / 20) + 1);

	$smarty  = inicializar_smarty();
	$smarty->assign('USUARIO',         $_SESSION['INFORMACION_USUARIO']);
	$smarty->assign('MENSAJES',        $mensajes);
	$smarty->assign('PAGINAS',         $paginas);
	$smarty->assign('CONTACTO',        $estableci);

	$smarty->display('drp/operacion/bandeja_de_salida.tpl');

	session_write_close();
?>
