<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();
$tipo_manifiesto = isset($_REQUEST['tipo_manifiesto']) ? $_REQUEST['tipo_manifiesto'] : NULL;
$errores = Array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$retorno  = array();
	$errores  = array();
	$vehiculo = array();

	if(empty($_POST['accion'])){
		exit;
	}

	$post_valido = true;

	#validaciones
	$campos = False;

	if($_POST['accion'] == 'alta'){
		$campos = array(
			'id' => array('nombre' => 'Id de operador', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		);
	}

	if($post_valido && $campos !== False){
		$validaciones = filter_input_array(INPUT_POST, $campos);

		foreach($validaciones as $campo => $resultado){
			if(strlen($resultado) == 0 or $resultado == 'null'){
				$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
				$post_valido = false;
			}
		}
	}
	#validaciones

	if(!count($errores)){
		if($_POST['accion'] == 'alta'){
			$_SESSION['DATOS_MANIFIESTO']['OPERADORES'] = array();

			$informacion = obtener_informacion_por_establecimiento($_POST['id']);

			if(!$informacion){
				$errores['alta'] = 'no se encontraron operadores que coincidieran con el especificado';
			}else{
				$establecimiento = $informacion['ESTABLECIMIENTO'];

				$operador = array(
									'ID'                => $establecimiento['ID'],
									'NOMBRE'            => $establecimiento['NOMBRE_EMPRESA'],
									'DOMICILIO'         => $establecimiento['CALLE'] . $establecimiento['NUMERO'],
									'EXPEDIENTE'        => $establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO'],
									'CUIT'              => $establecimiento['CUIT'],
									'CAA'               => $establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO'],
									);

				$_SESSION['DATOS_MANIFIESTO']['OPERADORES'][] = $operador;

				// limpiamos residuos y vehiculos porque al cambiar el establecimiento los permisos pueden variar
				// por lo que queremos forzar su seleccion nuevamente
				$_SESSION['DATOS_MANIFIESTO']['RESIDUOS'] = array();
				$_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] = array();

				$retorno['datos'] = $operador;
			}
		}else if($_POST['accion'] == 'busqueda') {

			$cuit = $_POST['criterio'];
			$resultado = buscar_establecimientos_por_criterio($cuit, Establecimiento::OPERADOR, $tipo_manifiesto);

			if ($resultado['estado'] == 'error') {
				$errores['busqueda'] = $resultado['descripcion'];
			}

			$retorno['datos'] = $resultado['establecimientos'];
		}
	}

	if ($_POST['accion'] == 'agregar_favorito') {

		$establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
		$establecimiento_favorito = Establecimiento::find($_POST['est_fav_id']);

		try {
			$relacion = new EstablecimientoFavorito;
			$relacion->establecimiento_id = $establecimiento->id;
			$relacion->tipo = $establecimiento_favorito->tipo;
			$relacion->establecimiento_favorito_id = $establecimiento_favorito->id;
			$relacion->created = new Datetime();
			$relacion->save();
		} catch (\Exception $e) {
			$errores['agregar_favorito'] = $e->getMessage();
		}
	}

	if ($_POST['accion'] == 'eliminar_favorito') {

		$id = $_POST['id_relacion_favorito'];
	    $relacion = EstablecimientoFavorito::find($id);

		try {
	        if ( ! empty($relacion)) {
	        	$relacion->delete();
	        }

	        $establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
			$favoritos = $establecimiento->obtener_favoritos(Establecimiento::OPERADOR, $tipo_manifiesto);

			$smarty->assign('favoritos', $favoritos);
			$smarty->assign('entidad_logueada', $_POST['entidad_logueada']);
			$smarty->assign('entidad_buscada', $_POST['entidad_buscada']);
			$smarty->display('operacion\compartido\busqueda_establecimiento_manifiesto.tpl');
			die(); // devuelvo el html que genera smarty
		} catch (\Exception $e) {
			$errores['eliminar_favorito'] = $e->getMessage();
		}
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} else if($_SERVER['REQUEST_METHOD'] == 'GET') {

	$establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
	$favoritos = $establecimiento->obtener_favoritos(Establecimiento::OPERADOR, $tipo_manifiesto);
	$smarty->assign('favoritos', $favoritos);
	$smarty->assign('entidad_buscada', obtener_tipo(Establecimiento::OPERADOR));
	$smarty->assign('entidad_logueada', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));
	$smarty->assign('tipo_manifiesto', $tipo_manifiesto);
	$smarty->display('operacion\compartido\busqueda_establecimiento_manifiesto.tpl');
//		$smarty->display('operacion\transportista\operador.tpl');
}

session_write_close();
?>