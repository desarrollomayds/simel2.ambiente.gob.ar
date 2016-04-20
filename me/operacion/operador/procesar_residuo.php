<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$retorno = $errores  = array();
	$manifiesto_id = $_POST['manifiesto_id'];
	$residuo_relacion_id = $_POST['residuo_relacion_id'];
	$tratamiento = $_POST['tratamiento'];
	$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto_id)));
	
	$errores = runChecks($manifiesto);

	if (!count($errores)) {

		try
		{
			$residuo = ResiduoManifiesto::find('first', array('conditions' => array('id = ? and manifiesto_id = ?', $residuo_relacion_id, $manifiesto_id)));

			if ($residuo) {
				$residuo->tratamiento = $tratamiento;
				$residuo->fecha_tratamiento = DateTime::createFromFormat('d/m/Y', $_POST['fecha_tratamiento']);
				$residuo->save();
			} else {
				throw new Exception('No se pudo encontrar el manifiesto del residuo');
			}

		} catch (\Exception $e) {
			$errores['general'] = $e->getMessage();
		}
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$smarty  = inicializar_smarty();
	$manifiesto = obtener_informacion_manifiesto($_GET['id']);

	$operador_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
	$codigo_residuo = $_GET['residuo_codigo'];

	$model = new TratamientoResiduo;
	$tratamientos = $model->getByOperadorId($operador_id, $codigo_residuo);

	$smarty->assign('TRATAMIENTOS', $tratamientos);
	$smarty->assign('RESIDUO_RELACION_ID', $_GET['residuo_relacion_id']);
	$smarty->assign('MANIFIESTO_ID', $_GET['id']);
	$smarty->display('operacion/operador/procesar_residuo.tpl');
}

session_write_close();


function runChecks($manifiesto)
{
	$errores = array();

	$fecha_tratamiento = DateTime::createFromFormat('d/m/Y', $_POST['fecha_tratamiento']);
	$datediff = (int) $fecha_tratamiento->diff($manifiesto->fecha_recepcion)->format("%a");
	$tratamiento = $_POST['tratamiento'];

	$config = new config;
	$dias_para_recibir_un_manifiesto = $config->getParameters("framework::vencimiento::manifiesto_sin_recibir");

	if ( ! $fecha_tratamiento) {
		$errores['general'] = 'La fecha de tratamiento es inv&aacute;lida.<br />';
	} elseif ($fecha_tratamiento < $manifiesto->fecha_recepcion) {
		$errores['general'] = 'La fecha de tratamiento no puede ser menor a la fecha de recepci&oacute;n.<br />';
	}

	#validaciones
	if (empty($tratamiento)) {
		$errores['general'] .= 'Seleccione un tratamiento para el residuo del manifiesto.';
	}

	return $errores;
}

?>
