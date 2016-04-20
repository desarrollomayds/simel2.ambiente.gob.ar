<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = inicializar_smarty();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores = Array();


		#validaciones
		if($_POST['accion'] != 'baja'){
			$campos = array(
				'id'                => array('nombre' => 'Id',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'nombre'            => array('nombre' => 'Nombre',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'apellido'          => array('nombre' => 'Apellido',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'fecha_nacimiento'  => array('nombre' => 'Fecha de nacimiento', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/')),
				'tipo_doc'          => array('nombre' => 'Tipo de documento',   'filter' => FILTER_VALIDATE_INT),
				'nro_doc'           => array('nombre' => 'Numero de documento', 'filter' => FILTER_VALIDATE_INT),
				'cuit'              => array('nombre' => 'Cuit',                'filter' => FILTER_CALLBACK, 'options' => 'validar_cuit'),
			);

			if($post_valido){
				$validaciones = filter_input_array(INPUT_POST, $campos);
		
				foreach($validaciones as $campo => $resultado){
					if(strlen($resultado) == 0){
						$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
						$post_valido = false;
					}
				}
			}
		}
		#validaciones


		if(count($errores) == 0){
			$conexion = RepresentanteTecnico::connection();

			$conexion->transaction();

			try{
				RepresentanteLegal::create(Array( 
													'empresa_id'                  => $_POST['empresa'], 
													'nombre'                      => $_POST['nombre'], 
													'apellido'                    => $_POST['apellido'], 
													'fecha_nacimiento'            => convertir_fecha_es_en($_POST['fecha_nacimiento']), 
													'tipo_documento'              => $_POST['tipo_doc'], 
													'numero_documento'            => $_POST['nro_doc'], 
													'cuit'                        => $_POST['cuit'], 
													'fecha_ultima_modificacion'   => strftime('%Y-%m-%d'), 
													'usuario_ultima_modificacion' => $_SESSION['INFORMACION_USUARIO']['ID'], 
												));

				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
				$errores['general'] = $e->getMessage();
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);
	}else{
		$smarty->template_dir = SMARTY_DIR_TEMPLATES;
		$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
		$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
		$smarty->cache_dir    = SMARTY_DIR_CACHE;

		$tipos_doc = obtener_tipos_documento();

		$smarty->assign('EMPRESA',         $_GET['id']);
		$smarty->assign('TIPOS_DOCUMENTO', $tipos_doc);
		$smarty->display('drp/operacion/agregar_representante_legal.tpl');
	}

	session_write_close();
?>
