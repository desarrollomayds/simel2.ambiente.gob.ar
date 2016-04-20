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
		$campos = array(
			'id'                              => array('nombre' => 'Id',                              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'nombre'                          => array('nombre' => 'Nombre',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'fecha_inicio_act'                => array('nombre' => 'Fecha de inicio de actividades',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

			'calle_r'                         => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_r'                        => array('nombre' => 'Numeracion (real)',               'filter' => FILTER_VALIDATE_INT),
			'piso_r'                          => array('nombre' => 'Piso (real)',                     'filter' => FILTER_VALIDATE_INT),
			'provincia_r'                     => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
			'localidad_r'                     => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),

			'calle_l'                         => array('nombre' => 'Calle (legal)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_l'                        => array('nombre' => 'Numeracion (legal)',               'filter' => FILTER_VALIDATE_INT),
			'piso_l'                          => array('nombre' => 'Piso (legal)',                     'filter' => FILTER_VALIDATE_INT),
			'provincia_l'                     => array('nombre' => 'Provincia (legal)',                'filter' => FILTER_VALIDATE_INT),
			'localidad_l'                     => array('nombre' => 'Localidad (legal)',                'filter' => FILTER_VALIDATE_INT),

			'calle_c'                         => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'numero_c'                        => array('nombre' => 'Numeracion (constituido)',        'filter' => FILTER_VALIDATE_INT),
			'piso_c'                          => array('nombre' => 'Piso (constituido)',              'filter' => FILTER_VALIDATE_INT),
			'provincia_c'                     => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
			'localidad_c'                     => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),

			'numero_telefonico'               => array('nombre' => 'Numero telefonico',               'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
			'direccion_email'                 => array('nombre' => 'Direccion de email',              'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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
		#validaciones

		if(count($errores) == 0){
			$conexion = Manifiesto::connection();

			$conexion->transaction();

			try{
				$empresa = Empresa::find('first', Array('conditions' => Array('id = ?', $_POST['id'])));


				$empresa->rol_generador     = $_POST['rol_generador'];
				$empresa->rol_transportista = $_POST['rol_transportista'];
				$empresa->rol_operador      = $_POST['rol_operador'];

				$empresa->nombre           = $_POST['nombre'];
				$empresa->fecha_inicio_act = convertir_fecha_es_en($_POST['fecha_inicio_act']);

				$empresa->calle       = $_POST['calle_r'];
				$empresa->numero      = $_POST['numero_r'];
				$empresa->piso        = $_POST['piso_r'];
				$empresa->oficina     = $_POST['oficina_r'];
				$empresa->provincia   = $_POST['provincia_r'];
				$empresa->localidad   = $_POST['localidad_r'];

				$empresa->calle_l     = $_POST['calle_l'];
				$empresa->numero_l    = $_POST['numero_l'];
				$empresa->piso_l      = $_POST['piso_l'];
				$empresa->oficina_l   = $_POST['oficina_l'];
				$empresa->provincia_l = $_POST['provincia_l'];
				$empresa->localidad_l = $_POST['localidad_l'];

				$empresa->calle_c     = $_POST['calle_c'];
				$empresa->numero_c    = $_POST['numero_c'];
				$empresa->piso_c      = $_POST['piso_c'];
				$empresa->oficina_c   = $_POST['oficina_c'];
				$empresa->provincia_c = $_POST['provincia_c'];
				$empresa->localidad_c = $_POST['localidad_c'];

				$empresa->numero_telefonico = $_POST['numero_telefonico'];
				$empresa->direccion_email   = $_POST['direccion_email'];

				$empresa->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
				$empresa->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];

				$empresa->save();

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

		$informacion = obtener_informacion_empresa_drp($_GET['id']);

		$localidades_r = Array();
		$localidades_l = Array();
		$localidades_c = Array();

		$provincias  = obtener_provincias();
		if($informacion){
			$localidades_r = obtener_localidades($informacion['PROVINCIA_R'], 0);
			$localidades_l = obtener_localidades($informacion['PROVINCIA_L'], 0);
			$localidades_c = obtener_localidades($informacion['PROVINCIA_C'], 0);
		}

		if(empty($localidades_r))
			$localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);

		if(empty($localidades_l))
			$localidades_l = obtener_localidades($provincias[0]['CODIGO'], 0);

		if(empty($localidades_c))
			$localidades_c = obtener_localidades($provincias[0]['CODIGO'], 0);

		$smarty->assign('EMPRESA',       $informacion);
		$smarty->assign('PROVINCIAS',    $provincias);
		$smarty->assign('LOCALIDADES_R', $localidades_r);
		$smarty->assign('LOCALIDADES_L', $localidades_l);
		$smarty->assign('LOCALIDADES_C', $localidades_c);

		$smarty->display('drp/operacion/editar_empresa.tpl');
	}

	session_write_close();
?>
