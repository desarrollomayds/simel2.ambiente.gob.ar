<?

require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../../global_incs/configuracion/configuracion.php");
require_once("../../../../global_incs/librerias/local.inc.php");

session_start();

if (@strval($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']) == '') {
	header('location: /');
	exit;
}

$smarty  = inicializar_smarty();
$errores = Array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$retorno  = array();
	$errores  = array();

	$post_valido = true;

	#validaciones
	$campos = False;

	$campos = array(
		'titulo'    => array('nombre' => 'Titulo de mensaje',    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		'cuerpo'    => array('nombre' => 'Cuerpo de mensaje',    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
	);

	if($post_valido && $campos !== False){
		$validaciones = filter_input_array(INPUT_POST, $campos);

		foreach($validaciones as $campo => $resultado){
			if(strlen($resultado) == 0){
				$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
				$post_valido = false;
			}
		}
	}
	#validaciones

	if(!count($errores)){
		$conexion = Mensaje::connection();

		$conexion->transaction();

		try{
			$padre = @intval($_POST['padre']);
			$titulo = $_POST['titulo'];

			if($padre != 0){
				$padre_ = obtener_mensaje_por_id($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], $padre);

				if($padre_['TITULO'] != ''){
					$titulo = $padre_['TITULO'];
				}
			}


			$mensaje = Mensaje::create(Array(
				'id_padre'           => $padre,  
				'id_usuario_drp'     => 0,  
				'id_establecimiento' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'],  
				'sentido'            => 0,  
				'fecha_envio'        => strftime('%Y-%m-%d'),  
				'fecha_lectura'      => strftime('%Y-%m-%d'), 									
				'importancia'        => @strval($_POST['severidad']),  
				'titulo'             => $titulo,  
				'cuerpo'             => $_POST['cuerpo'],  
				'estado'             => 'p'
			));
			$conexion->commit();
		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = 'Ocurrio un error al enviar el mensaje, por favor intente mas tarde.';
		}
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

	echo json_encode($retorno);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);

	if (@$mensajes) {
		$smarty->assign('MENSAJES', $mensajes);   
	}
	if (@$paginas) {
		$smarty->assign('PAGINAS', $paginas);   
	}

	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty->assign('NUEVOS', $cantidad1);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('GENERADOR', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->display('operacion/compartido/mensajeria/redactar_mensaje.tpl');
}

session_write_close();
?>
