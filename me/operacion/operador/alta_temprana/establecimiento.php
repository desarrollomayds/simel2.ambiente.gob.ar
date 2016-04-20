<?
	require_once("../../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../../global_incs/configuracion/configuracion.php");
	require_once("../../../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$actividades                 = obtener_actividades();
	$categorias                  = obtener_categorias_residuos();
	$provincias                  = obtener_provincias();
	$localidades                 = Array();
	$nomenclatura_catastral_circ = Range(0, 22);
	$nomenclatura_catastral_sec  = array_merge(Range(0, 99), Range('A', 'Z'));

	$smarty  = inicializar_smarty();
	$errores = Array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();
		$establecimiento   = array();

		if(empty($_POST['accion'])){
			exit;
		}

		$post_valido = true;
	
		#validaciones
		if($_POST['accion'] != 'baja'){
	
			$campos = array(
				'nombre'                          => array('nombre' => 'Nombre',                          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'tipo'                            => array('nombre' => 'Tipo de establecimiento',         'filter' => FILTER_VALIDATE_INT),
//				'caa_numero'                      => array('nombre' => 'Numero de CAA',                   'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
//				'caa_vencimiento'                 => array('nombre' => 'Fecha de vencimiento de CAA',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'expediente_numero'               => array('nombre' => 'Numero de expediente',            'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'expediente_anio'                 => array('nombre' => 'A&ntilde;o de expediente',        'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'actividad'                       => array('nombre' => 'Actividad desarrollada',          'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'descripcion'                     => array('nombre' => 'Descripcion',                     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'calle_r'                         => array('nombre' => 'Calle (real)',                    'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'numero_r'                        => array('nombre' => 'Numeracion (real)',               'filter' => FILTER_VALIDATE_INT),
				'piso_r'                          => array('nombre' => 'Piso (real)',                     'filter' => FILTER_VALIDATE_INT),
				'provincia_r'                     => array('nombre' => 'Provincia (real)',                'filter' => FILTER_VALIDATE_INT),
				'localidad_r'                     => array('nombre' => 'Localidad (real)',                'filter' => FILTER_VALIDATE_INT),

				'latitud_r'                       => array('nombre' => 'Latitud (real)',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'longitud_r'                      => array('nombre' => 'Longitud (real)',                 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

				'calle_c'                         => array('nombre' => 'Calle (constituido)',             'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'numero_c'                        => array('nombre' => 'Numeracion (constituido)',        'filter' => FILTER_VALIDATE_INT),
				'piso_c'                          => array('nombre' => 'Piso (constituido)',              'filter' => FILTER_VALIDATE_INT),
#				'provincia_c'                     => array('nombre' => 'Provincia (constituido)',         'filter' => FILTER_VALIDATE_INT),
				'localidad_c'                     => array('nombre' => 'Localidad (constituido)',         'filter' => FILTER_VALIDATE_INT),

				'nomenclatura_catastral_circ'     => array('nombre' => 'Nomenclatura catastral circ',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_sec'      => array('nombre' => 'Nomenclatura catastral sec',      'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_manz'     => array('nombre' => 'Nomenclatura catastral manz',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_parc'     => array('nombre' => 'Nomenclatura catastral parc',     'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'nomenclatura_catastral_sub_parc' => array('nombre' => 'Nomenclatura catastral sub parc', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
				'habilitaciones'                  => array('nombre' => 'Habilitaciones',                  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
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

		if(!count($errores)){
			if($_POST['accion'] == 'alta'){
				if(empty($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'])){
					$_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] = array();
				}

				$ultimo_id = 0;

				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento){
					if($establecimiento['ID'] > $ultimo_id)
						$ultimo_id = $establecimiento['ID'];
				}

				$ultimo_id++;

				$establecimiento = array(
								'ID'                               => $ultimo_id,
								'NOMBRE'                           => $_POST['nombre'],
								'TIPO'                             => 1,
								'USUARIO_ID'                       => $_POST['usuario_id'],
								'USUARIO'                          => $_POST['usuario'],
								'CONTRASENIA'                      => 'ACCESO_DESHABILITADO',
								'CAA_NUMERO'                       => $_POST['caa_numero'],
								'CAA_VENCIMIENTO'                  => $_POST['caa_vencimiento'],
								'EXPEDIENTE_NUMERO'                => $_POST['expediente_numero'],
								'EXPEDIENTE_ANIO'                  => $_POST['expediente_anio'],
								'ACTIVIDAD'                        => $_POST['actividad'],
								'DESCRIPCION'                      => $_POST['descripcion'],

								'CALLE_R'                          => $_POST['calle_r'],
								'NUMERO_R'                         => $_POST['numero_r'],
								'PISO_R'                           => $_POST['piso_r'],
								'PROVINCIA_R'                      => $_POST['provincia_r'],
								'LOCALIDAD_R'                      => $_POST['localidad_r'],

								'LATITUD_R'                        => $_POST['latitud_r'],
								'LONGITUD_R'                       => $_POST['longitud_r'],

								'CALLE_C'                          => $_POST['calle_c'],
								'NUMERO_C'                         => $_POST['numero_c'],
								'PISO_C'                           => $_POST['piso_c'],
#								'PROVINCIA_C'                      => $_POST['provincia_c'],
								'PROVINCIA_C'                      => 2, //valor arbitrario de capital federal
								'LOCALIDAD_C'                      => $_POST['localidad_c'],

								'NOMENCLATURA_CATASTRAL_CIRC'      => $_POST['nomenclatura_catastral_circ'],
								'NOMENCLATURA_CATASTRAL_SEC'       => $_POST['nomenclatura_catastral_sec'],
								'NOMENCLATURA_CATASTRAL_MANZ'      => $_POST['nomenclatura_catastral_manz'],
								'NOMENCLATURA_CATASTRAL_PARC'      => $_POST['nomenclatura_catastral_parc'],
								'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $_POST['nomenclatura_catastral_sub_parc'],
								'HABILITACIONES'                   => $_POST['habilitaciones'],
								'PERMISOS'                         => Array()
							);

				$establecimiento['TIPO_']        = obtener_tipo(1);
				$establecimiento['ACTIVIDAD_']   = utf8_encode(obtener_actividad($establecimiento['ACTIVIDAD']));

				$establecimiento['PROVINCIA_R_'] = obtener_provincia($establecimiento['PROVINCIA_R']);
				$establecimiento['LOCALIDAD_R_'] = obtener_localidad($establecimiento['LOCALIDAD_R']);
	
#				$establecimiento['PROVINCIA_C_'] = obtener_provincia($establecimiento['PROVINCIA_C']);
				$establecimiento['PROVINCIA_C_'] = 2;//valor arbitrario de capital federal
				$establecimiento['LOCALIDAD_C_'] = obtener_localidad($establecimiento['LOCALIDAD_C']);


				$_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'][] = $establecimiento;
			}else if($_POST['accion'] == 'baja'){
				$estado = 1;
				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $indice => $establecimiento){
					if($establecimiento['ID'] == $_POST['id']){
						unset($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'][$indice]);
						$estado = 0;
						break;
					}
				}

				if($estado){
					$errores['borrado'] = 'la establecimiento no pudo ser localizada';
				}
			}else{
				foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
					if($establecimiento['ID'] == $_POST['id']){
						$establecimiento['NOMBRE']                           = $_POST['nombre'];
						$establecimiento['CAA_NUMERO']                       = $_POST['caa_numero'];
						$establecimiento['CAA_VENCIMIENTO']                  = $_POST['caa_vencimiento'];
						$establecimiento['EXPEDIENTE_NUMERO']                = $_POST['expediente_numero'];
						$establecimiento['EXPEDIENTE_ANIO']                  = $_POST['expediente_anio'];
						$establecimiento['ACTIVIDAD']                        = $_POST['actividad'];
						$establecimiento['DESCRIPCION']                      = $_POST['descripcion'];

						$establecimiento['CALLE_R']                          = $_POST['calle_r'];
						$establecimiento['NUMERO_R']                         = $_POST['numero_r'];
						$establecimiento['PISO_R']                           = $_POST['piso_r'];
						$establecimiento['PROVINCIA_R']                      = $_POST['provincia_r'];
						$establecimiento['LOCALIDAD_R']                      = $_POST['localidad_r'];

						$establecimiento['LATITUD_R']                        = $_POST['latitud_r'];
						$establecimiento['LONGITUD_R']                       = $_POST['longitud_r'];

						$establecimiento['CALLE_C']                          = $_POST['calle_c'];
						$establecimiento['NUMERO_C']                         = $_POST['numero_c'];
						$establecimiento['PISO_C']                           = $_POST['piso_c'];
						$establecimiento['PROVINCIA_C']                      = $_POST['provincia_c'];
						$establecimiento['LOCALIDAD_C']                      = $_POST['localidad_c'];

						$establecimiento['NOMENCLATURA_CATASTRAL_CIRC']      = $_POST['nomenclatura_catastral_circ'];
						$establecimiento['NOMENCLATURA_CATASTRAL_SEC']       = $_POST['nomenclatura_catastral_sec'];
						$establecimiento['NOMENCLATURA_CATASTRAL_MANZ']      = $_POST['nomenclatura_catastral_manz'];
						$establecimiento['NOMENCLATURA_CATASTRAL_PARC']      = $_POST['nomenclatura_catastral_parc'];
						$establecimiento['NOMENCLATURA_CATASTRAL_SUB_PARC']  = $_POST['nomenclatura_catastral_sub_parc'];
						$establecimiento['HABILITACIONES']                   = $_POST['habilitaciones'];
						$establecimiento['TIPO_']                            = obtener_tipo($establecimiento['TIPO']);
						$establecimiento['ACTIVIDAD_']                       = utf8_encode(obtener_actividad($establecimiento['ACTIVIDAD']));

						$establecimiento['PROVINCIA_R_']                     = obtener_provincia($establecimiento['PROVINCIA_R']);
						$establecimiento['LOCALIDAD_R_']                     = obtener_localidad($establecimiento['LOCALIDAD_R']);

						$establecimiento['PROVINCIA_C_']                     = obtener_provincia($establecimiento['PROVINCIA_C']);
						$establecimiento['LOCALIDAD_C_']                     = obtener_localidad($establecimiento['LOCALIDAD_C']);

						break;
					}
				}
			}
		}

		$retorno['datos']   = $establecimiento;
		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

        echo json_encode($retorno);

	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(!empty($_GET['id'])){
			$smarty->assign('ACCION', 'modificacion');

			foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
				if($establecimiento['ID'] == $_GET['id']){
					$smarty->assign('ESTABLECIMIENTO', $establecimiento);

					$punto_inicio = $establecimiento['CALLE_R'] . " " .$establecimiento['NUMERO_R'] . ", " . obtener_localidad($establecimiento['LOCALIDAD_R']) . ", " . obtener_municipio_por_localidad($establecimiento['LOCALIDAD_R']) . ", " . obtener_provincia($establecimiento['PROVINCIA_R']) . ", " . " argentina";

					$localidades_r = obtener_localidades($establecimiento['PROVINCIA_R'], 0);
					$localidades_c = obtener_localidades($establecimiento['PROVINCIA_C'], 0);

					break;
				}
			}
		}else{
			$ultimo_id = 0;

			foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento){
				if($establecimiento['USUARIO_ID'] > ($ultimo_id + 1))
					break;

				$ultimo_id = $establecimiento['USUARIO_ID'];
			}

			$ultimo_id++;

			$localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);
			$localidades_c = obtener_localidades(2, 0);
#			$localidades_  = array_keys($localidades);

			$punto_inicio = "av. de mayo 1, ciudad autonoma de buenos aires, argentina";

			$smarty->assign('USUARIO_ID', $ultimo_id);

			$smarty->assign('ACCION', 'alta');
		}

		$smarty->assign('EMPRESA',                     $_SESSION['DATOS_EMPRESA']);
		$smarty->assign('ACTIVIDADES',                 $actividades);
		$smarty->assign('CATEGORIAS',                  $categorias);
		$smarty->assign('RESIDUOS',                    $categorias);
		$smarty->assign('PROVINCIAS',                  $provincias);
		$smarty->assign('PUNTO_INICIO',                $punto_inicio);
		$smarty->assign('LOCALIDADES_R',               $localidades_r);
		$smarty->assign('LOCALIDADES_C',               $localidades_c);
		$smarty->assign('NOMENCLATURA_CATASTRAL_CIRC', $nomenclatura_catastral_circ);
		$smarty->assign('NOMENCLATURA_CATASTRAL_SEC',  $nomenclatura_catastral_sec);

		$smarty->display('operacion/operador/alta_temprana/establecimiento.tpl');
	}

	session_write_close();
?>
