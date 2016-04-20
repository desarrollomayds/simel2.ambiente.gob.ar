<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
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
        $padre   = @intval($_POST['padre']);
        $titulo  = $_POST['titulo'];
        $destino = @intval($_POST['destino']);

        if($padre != 0){
        	$padre_ = obtener_mensaje_por_id_drp($padre);

          if($padre_['TITULO'] != ''){
            $titulo  = $padre_['TITULO'];
            $destino = $padre_['ID_ESTABLECIMIENTO'];
          }
        }


				$mensaje = Mensaje::create(Array(
													'id_padre'           => $padre,  
													'id_usuario_drp'     => $_SESSION['INFORMACION_USUARIO']['ID'],  
													'id_establecimiento' => $destino,  
													'sentido'            => 1,  
													'fecha_envio'        => strftime('%Y-%m-%d'),
                                                                                                         'fecha_lectura'        => strftime('%Y-%m-%d'), 
													'importancia'        => @strval($_POST['severidad']),  
													'titulo'             => $titulo,  
													'cuerpo'             => $_POST['cuerpo'],  
													'estado'             => 'p'
											));
				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
        
				$errores['general'] = var_export($e, 1);//'Ocurrio un error al enviar el mensaje, por favor intente mas tarde.';
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
  	$empresa = obtener_empresa_habilitada($_GET['id']);
        
  
  	$smarty->assign('GOOGLE_MAPS_KEY',     GOOGLE_MAPS_KEY);
  	$smarty->assign('USUARIO',             $_SESSION['INFORMACION_USUARIO']);
  	$smarty->assign('EMPRESA',             $empresa);
  
  	$smarty->display('drp/operacion/redactar_mensaje.tpl');
	}

	session_write_close();
?>
