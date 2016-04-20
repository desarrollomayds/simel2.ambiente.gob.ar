<?php	
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$smarty  = inicializar_smarty();
$smarty->assign('entidad_logueada', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));

$tipo_manifiesto = isset($_REQUEST['tipo_manifiesto']) ? $_REQUEST['tipo_manifiesto'] : NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errores = $retorno = array();

	if (empty($_POST['accion'])) {
		exit;
	}

	switch ($_POST['accion'])
	{
		case 'busqueda':
			$cuit = $_POST['criterio'];
			$resultado = buscar_establecimientos_por_criterio($cuit, Establecimiento::GENERADOR, $tipo_manifiesto);

			if ($resultado['estado'] == 'error') {
				$errores['busqueda'] = $resultado['descripcion'];
			}

			$retorno['datos'] = $resultado['establecimientos'];
		break;
		case 'alta':
			$id = $_POST['id'];
			
			if ($_SESSION['GENERADORES']['RUTAS']){
				if (in_array($id, $_SESSION['GENERADORES']['RUTAS'])) {
					$retorno['datos'] = "error"; 
				} else {
					$_SESSION['GENERADORES']['RUTAS'][] = $id;
				}
			} else {
				$_SESSION['GENERADORES']['RUTAS'][] = $id;
			}
			echo json_encode($retorno['datos']);
		break;
		case 'ruta':
			$nombre = $_POST['nombre'];
			$_SESSION['GENERADORES']['NOMBRE'] = $nombre;
		break;
		case 'guardar':
			$ruta = guardar_nueva_ruta();
			echo json_encode($ruta);
		break;
		case 'eliminar':
			$id = $_POST['id'];
			$resultado = eliminar_ruta_por_id($id);
			echo json_encode($id);
		break;
		case 'eliminar_generador':
			$ruta = $_POST['ruta'];
			$generador = $_POST['generador'];

			$resultado = eliminar_generador($ruta, $generador);
			echo json_encode($resultado);
		break;
		case 'agregar_generador':
			$ruta_id = $_POST['ruta_id'];
			$generador_id = $_POST['id'];
			$resultado = agregar_generador($ruta_id, $generador_id);
			echo json_encode($resultado);
		break;
		case 'editar':
			$id = $_POST['id'];
			$info = obtener_informacion_ruta($id);
			foreach ($info['ESTABLECIMIENTOS'] as $value) {
					$respuesta[] = $value;
			}
			echo json_encode($respuesta);
		break;
		case 'usar':
			$id = $_POST['id'];
			$info = obtener_informacion_ruta($id);
			foreach ($info['ESTABLECIMIENTOS'] as $value) {

			$informacion = obtener_informacion_por_establecimiento($value['ID']);

				if ( ! $informacion) {
					$errores['alta'] = 'no se encontraron generadores que coincidieran con el especificado';
				} else {
					$establecimiento = $informacion['ESTABLECIMIENTO'];

					$array_cuit = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'];
					$item_cuit = $establecimiento['CUIT'];
					$item_sucursal = $establecimiento['SUCURSAL'];

						// en un manifiesto concentrador se permite cargar un generador en el lugar de un operador.
						// lo que debo validar es que no sea el mismo generador que esta creando el manifiesto.
						$tipo_manifiesto = isset($_POST['tipo_manifiesto']) ? $_POST['tipo_manifiesto'] : NULL;

						if ($tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {
							if ($establecimiento['ID'] == $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']) {
								$errores['alta'] = 'El Operador debe ser distinto al Generador/Creador del Manifiesto Concentrador.';
							}
						}

						if ( ! $errores)
						{
							$generador = setearGeneradorEnSession($establecimiento, $tipo_manifiesto);
							// limpiamos residuos y vehiculos porque al cambiar el establecimiento los permisos pueden variar
							// por lo que queremos forzar su seleccion nuevamente
							$_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] = array();
							$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = array();

							$retorno['datos'] = $generador;
							$retorno['errores'] = $errores;

							$generadores[] = $retorno['datos'];
						}
				}
			}
			echo json_encode($generadores);
		break;
	}
} else {
	$rutas = obtener_rutas($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
	foreach ($rutas as $value) {
		$info[] = obtener_informacion_ruta($value['ID']);
	}
	$smarty->assign('RUTAS', $rutas);
	$smarty->assign('INFO', $info);
	$smarty->display('operacion/compartido/rutas.tpl');
}

function setearGeneradorEnSession($establecimiento, $tipo_manifiesto){
	$link = $_SERVER['HTTP_REFERER'];
	$link_array = explode('/',$link);
	$page_from = end($link_array);


	// si viene de manifiesto simple solo se carga un generador
	if ($page_from == "creacion_manifiesto.php" AND $tipo_manifiesto != TipoManifiesto::SIMPLE_CONCENTRADOR){
		unset($_SESSION['DATOS_MANIFIESTO']['GENERADORES']);
	}

	$generador = array(
		'ID'                => $establecimiento['ID'],
		'NOMBRE'            => $establecimiento['NOMBRE'],
		'SUCURSAL'          => $establecimiento['SUCURSAL'],
		'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
		'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
		'CUIT'              => $establecimiento['CUIT'],
		'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
		'ALTA_TEMPRANA'     => $establecimiento['ALTA_TEMPRANA'],
	);

	if ($tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {
		$_SESSION['DATOS_MANIFIESTO']['OPERADORES'][] = $generador;
	} else {
		$_SESSION['DATOS_MANIFIESTO']['GENERADORES'][] = $generador;
	}

	return $generador;
}

session_write_close();
?>