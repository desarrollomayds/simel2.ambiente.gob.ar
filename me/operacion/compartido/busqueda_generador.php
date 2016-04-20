<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();

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

		// este nombre es pésimo, pero lo mantengo por compatibilidad.
		// El objetivo de este case es obtener la data formateada como se espera para completar la tabla de la entidad
		// en la creacion de un manifiesto simple.
		case 'alta':

			$informacion = obtener_informacion_por_establecimiento($_POST['id']);

			if ( ! $informacion) {
				$errores['alta'] = 'no se encontraron generadores que coincidieran con el especificado';
			} else {
				$establecimiento = $informacion['ESTABLECIMIENTO'];

				$array_cuit = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'];
				$item_cuit = $establecimiento['CUIT'];
				$item_sucursal = $establecimiento['SUCURSAL'];

				if ($array_cuit){
					foreach ($array_cuit as $valor) {
						if (($item_cuit == $valor['CUIT']) && ($item_sucursal == $valor['SUCURSAL'])){
					   		$existe = "si";
					    }
					}
				}

				// verifica que el generador no este repetido
				if ($existe == "si"){
					$errores['alta'] = 'El generador ya se encuentra en la lista de generadores';
				} else {
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
					}
				}
			}
		break;

		case 'agregar_favorito':

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
		break;

		case 'eliminar_favorito':

			$id = $_POST['id_relacion_favorito'];
		    $relacion = EstablecimientoFavorito::find($id);

			try {
		        if ( ! empty($relacion)) {
		        	$relacion->delete();
		        }

		        $establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
				$favoritos = $establecimiento->obtener_favoritos(Establecimiento::GENERADOR, $tipo_manifiesto);

				$smarty->assign('favoritos', $favoritos);
				$smarty->assign('entidad_logueada', $_POST['entidad_logueada']);
				$smarty->assign('entidad_buscada', $_POST['entidad_buscada']);
				$smarty->display('operacion\compartido\busqueda_establecimiento_manifiesto.tpl');
				die(); // devuelvo el html que genera smarty
			} catch (\Exception $e) {
				$errores['eliminar_favorito'] = $e->getMessage();
			}
		break;
	}

	$retorno['estado']  = ! count($errores) ? 0 : 1;
	$retorno['errores'] = $errores;

	echo json_encode($retorno);

} else if($_SERVER['REQUEST_METHOD'] == 'GET') {

	$establecimiento = Establecimiento::find($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
	$favoritos = $establecimiento->obtener_favoritos(Establecimiento::GENERADOR, $tipo_manifiesto);

	$smarty->assign('favoritos', $favoritos);
	$smarty->assign('entidad_buscada', obtener_tipo(Establecimiento::GENERADOR));
	$smarty->assign('entidad_logueada', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));
	$smarty->assign('tipo_manifiesto', $tipo_manifiesto);
	$smarty->display('operacion\compartido\busqueda_establecimiento_manifiesto.tpl');
}

session_write_close();

function setearGeneradorEnSession($establecimiento, $tipo_manifiesto)
{
	$link = $_SERVER['HTTP_REFERER'];
	$link_array = explode('/',$link);
	$page_from = end($link_array);

	// si viene de manifiesto simple solo se carga un generador
	if ($page_from == "creacion_manifiesto.php" AND $tipo_manifiesto != TipoManifiesto::SIMPLE_CONCENTRADOR){
		unset($_SESSION['DATOS_MANIFIESTO']['GENERADORES']);
	}

	$generador = array(
		'ID'                => $establecimiento['ID'],
		'NOMBRE'            => utf8_encode($establecimiento['NOMBRE']),
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

?>