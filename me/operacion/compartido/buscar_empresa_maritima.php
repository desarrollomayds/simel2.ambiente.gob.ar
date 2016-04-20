<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$smarty  = inicializar_smarty();
// buscar
if ($_POST['accion'] == 'busqueda')
{
	$data = buscar_establecimientos_por_criterio($_POST['cuit'], Establecimiento::EMPRESA_NAVIERA, TipoManifiesto::SLOP);


	// var_dump($data);die;
	$smarty->assign('action', 'busqueda');
	$smarty->assign('data', $data);
	$html = utf8_encode($smarty->fetch('operacion/compartido/buscar_empresa_maritima.tpl'));

	// desde la funcion buscar_establecimientos_por_criterio recibimos el alta temprana como un error, en este contexto no aplica como tal.
	$estado = ($data['descripcion'] == 'ofrecer_alta_temprana') ? 'ok' : $data['estado'];
	$retorno['estado'] = $estado;
	$retorno['html'] = ($estado != 'error') ? $html : $data['descripcion'];

	echo json_encode($retorno);
	exit(0);
}
elseif ($_POST['accion'] == 'agregar')
{
	$informacion = obtener_informacion_por_establecimiento($_POST['id']);

	if ( ! $informacion) {
		$errores['alta'] = 'no se encontraron generadores que coincidieran con el especificado';
	} else {
		$establecimiento = $informacion['ESTABLECIMIENTO'];

		$array_cuit = $_SESSION['DATOS_MANIFIESTO']['GENERADORES'];
		$item_cuit = $establecimiento['CUIT'];
		$item_sucursal = $establecimiento['SUCURSAL'];

		$generador = array(
			'ID'                => utf8_encode($establecimiento['ID']),
			'NOMBRE'            => utf8_encode($establecimiento['NOMBRE_EMPRESA']),
			'BUQUE'             => utf8_encode($establecimiento['NOMBRE']),
			'SUCURSAL'          => utf8_encode($establecimiento['SUCURSAL']),
			'DOMICILIO'         => utf8_encode($establecimiento['CALLE'] . $establecimiento['NUMERO']),
			'EXPEDIENTE'        => utf8_encode($establecimiento['EXPEDIENTE_NUMERO'] . '/' . $establecimiento['EXPEDIENTE_ANIO']),
			'CUIT'              => utf8_encode($establecimiento['CUIT']),
			'CAA'               => utf8_encode($establecimiento['CAA_NUMERO'] . ' - ' . $establecimiento['CAA_VENCIMIENTO']),
			'ALTA_TEMPRANA'     => utf8_encode($establecimiento['ALTA_TEMPRANA']),
		);
		$_SESSION['DATOS_MANIFIESTO']['GENERADORES'][] = $generador;
	}
	echo json_encode($generador);
	
}
else
{
	$smarty->display('operacion/compartido/buscar_empresa_maritima.tpl');
	session_write_close();

}

?>