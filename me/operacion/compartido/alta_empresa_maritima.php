<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

if ($_POST['accion'] == 'nueva') {

	$entidad = PersonaJuridica::find_by_cuit($_POST['cuit']);
	
	$razon = $entidad->pejrazonsocial;
	$provincias = obtener_provincias();

	$smarty  = inicializar_smarty();
	$smarty->assign('razon', $razon);
	$smarty->assign('cuit', $_POST['cuit']);
	$smarty->assign('provincias', $provincias);
	$smarty->assign('localidades', obtener_localidades($provincias[0]['CODIGO'], 0));
	$smarty->display('operacion/compartido/alta_empresa_maritima.tpl');

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	// 20002664039

	if ($_GET['tipo_alta'] == 'empresa_buque')
	{
		list($estado, $errores) = generarEmpresaBuque();
	}
	elseif ($_GET['tipo_alta'] == 'solo_buque')
	{
		list($estado, $errores) = generarBuque();
	}

	echo json_encode(array('estado' => $estado, 'errors' => $errores));

}

function generarEmpresaBuque()
{
	$errores = array('empresa' => array(), 'establecimiento' => array());
	$estado = 0;

	try {
		$dbConn = Empresa::connection();
		$dbConn->transaction();

		$datos_empresa = getDatosEmpresa($_GET);
		$empresa = new Empresa($datos_empresa);

		if ($empresa->is_valid()) {
			$empresa->save();

			// creamos relacion con establecimiento generador
			$data = getDatosNuevoEstablecimiento($empresa, $_GET);

			if ( ! empty($data['nombre'])) {
				$establecimiento = $empresa->create_establecimientos($data);
				$establecimiento->create_permisos_establecimientos(Array(
					'residuo'      => 'Y9',
					'estado'      => '2',			
				));

				$dbConn->commit();
				$estado = 1;
			} else {
				$errores['establecimiento']['nombre_establecimiento'] = 'Debe indicar el nombre del establecimiento';
				$dbConn->rollback();
			}
		} else {
			$errores['empresa'] = $empresa->getErrors();
		}

	} catch (\Exception $e) {
		$dbConn->rollback();
		$estado = -1;
		$errores['fatal_error'] = $e->getMessage();
	}

	return array($estado, $errores);
}

function generarBuque()
{
	$errores = array('empresa' => array(), 'establecimiento' => array());
	$estado = 0;

	try {
		$empresa = Empresa::find('first', array('conditions' => array('cuit=? AND empresa_maritima=1', $_GET['cuit'])));


		if ($empresa)
		{
			$dbConn = Establecimiento::connection();
			$dbConn->transaction();
			// creamos relacion con establecimiento generador
			$data = getDatosNuevoEstablecimiento($empresa, $_GET);

			if ( ! empty($data['nombre'])) {
				//var_dump($empresa, $data);die;
				$establecimiento = $empresa->create_establecimientos($data);
				$establecimiento->create_permisos_establecimientos(Array(
					'residuo'      => 'Y9',
					'estado'      => '2',			
				));

				if ($establecimiento->is_valid()) {
					$dbConn->commit();
					$estado = 1;
				} else {
					$dbConn->rollback();
					$estado = 0;
					$errores['establecimiento'] = $establecimiento->getErrors();
				}
			} else {
				$errores['establecimiento']['nombre_establecimiento'] = 'Debe indicar el nombre del establecimiento';
				$dbConn->rollback();
			}
		}
		else
		{
			$estado = -1;
			$errores['fatal_error'] = "No se ha encontrado una empresa naviera registrada con ese cuit.";
		}

	} catch (\Exception $e) {
		$dbConn->rollback();
		$estado = -1;
		$errores['fatal_error'] = $e->getMessage();
	}

	return array($estado, $errores);
}

// saca los datos que no corresponden al modelo empresa
function getDatosEmpresa($get)
{
  	unset($get['alta_temprana'], $get['nueva_sucursal'], $get['sucursal'], $get['establecimiento_id'],
  		$get['nombre_establecimiento'], $get['email'], $get['tipo_alta']);

	// seteos manuales
	$get['fecha_alta_drp'] = new Datetime;
	$get['rol_generador'] = 1;
  	$get['rol_transportista'] = 0;
  	$get['rol_operador'] = 0;
  	$get['empresa_maritima'] = 1;

  	return $get;
} 

function getDatosNuevoEstablecimiento($empresa, $get)
{
	$get['nombre'] = $get['nombre_establecimiento'];
	$get['empresa_id'] = $empresa->id;
	$get['tipo'] = Establecimiento::GENERADOR;
	$get['alta_temprana'] = 0;
	
	unset($get['nueva_sucursal'], $get['establecimiento_id'], $get['cuit'], $get['nombre_establecimiento'],
		$get['numero_telefonico'], $get['oficina'], $get['tipo_alta']);

	return $get;
}

session_write_close();
?>