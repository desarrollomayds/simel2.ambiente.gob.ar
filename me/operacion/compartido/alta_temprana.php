<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['alta_temprana'] == 'yes') {
		list($estado, $errores) = generarAltaTemprana();
	}
	elseif ($_POST['nueva_sucursal'] == 'yes') {
		list($estado, $errores) = generarNuevaSucursal();
	}

	echo json_encode(array('status' => $estado, 'errors' => $errores));

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

	$cuit = $_GET['cuit'];

	if (strlen($cuit) == 11 AND is_numeric($cuit)) {
		$entidad = PersonaJuridica::find_by_cuit($cuit);
		$provincias = obtener_provincias();

		if ($entidad) {
			$smarty->assign('entidad', $entidad);
			$smarty->assign('provincias', $provincias);
			$smarty->assign('localidades', obtener_localidades($provincias[0]['CODIGO'], 0));
			$smarty->assign('alta_temprana', $_GET['alta_temprana']);
			$smarty->assign('nueva_sucursal', $_GET['nueva_sucursal']);
			$smarty->assign('tipo_manifiesto', $_GET['tipo_manifiesto']);
			$smarty->display('operacion/generador/alta_temprana.tpl');
		} else {
			header('Content-Type: application/json');
			echo json_encode(array("errorMsg" => "El cuit ingresado no fue encontrado como una entidad v&aacute;lida"));
			exit(0);
		}
	}
}

session_write_close();

function generarAltaTemprana()
{
	$errores = array('empresa' => array(), 'establecimiento' => array());
	$estado = 0;

	try {
		$dbConn = Empresa::connection();
		$dbConn->transaction();

		$datos_empresa = getDatosEmpresa($_POST);
		$empresa = new Empresa($datos_empresa);

		if ($empresa->is_valid()) {
			// seteos manuales del alta temprana
			$empresa->fecha_inscripcion = new datetime;
		  	$empresa->rol_generador = 1;
		  	$empresa->rol_transportista = 0;
		  	$empresa->rol_operador = 0;
			$empresa->save();

			// creamos relacion con establecimiento generador
			$data = getDatosNuevoEstablecimiento($empresa, $_POST);

			if ( ! empty($data['nombre'])) {
				$establecimiento = $empresa->create_establecimientos($data);

				// dependiendo el tipo de alta temprana encolamos email para ser enviado establecimiento creado
				$mail = new mail;
				$usuario_creador_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
				$params = json_encode(array('establecimiento_creador_id' => $usuario_creador_id, 'establecimiento_id' => $establecimiento->id));

				generar_hash_para_reestablecer_password($establecimiento);
				$mail->ponerEnColaDeEnvio($usuario_creador_id, mail::ALTA_TEMPRANA, $params);

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


function generarNuevaSucursal()
{
	$errores = array();
	$estado = 0;
	$dbConn = Establecimiento::connection();
	$dbConn->transaction();

	try {
		$datos_sucursal = getDatosNuevaSucursal();
		$sucursal = new Establecimiento($datos_sucursal);
		list($info_valida, $errores_sucursal) = validarSucursal($sucursal);

		if ($info_valida) {
			$sucursal->save();

			// dependiendo el tipo de alta temprana encolamos email para ser enviado establecimiento creado
			$mail = new mail;
			$usuario_creador_id = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
			$params = json_encode(array('establecimiento_creador_id' => $usuario_creador_id, 'establecimiento_id' => $sucursal->id));

			generar_hash_para_reestablecer_password($sucursal);
			$mail->ponerEnColaDeEnvio($usuario_creador_id, mail::ALTA_TEMPRANA, $params);

			$dbConn->commit();

			$estado = 1;
		} else {
			$errores['establecimiento'] = $errores_sucursal;
		}
	} catch (\Exception $e) {
		$dbConn->rollback();
		$estado = -1;
		$errores['fatal_error'] = $e->getMessage();
	}

	return array($estado, $errores);
}

// genero esta funcion para sumar validaciones por fuera del modelo, especificas del contexto de alta temprana.
function validarSucursal($sucursal)
{
	$errores = array();
	$resultado = $sucursal->is_valid();

	$errores = $sucursal->getErrors();

	if ( ! is_null($errores['nombre'])) {
		$resultado = false;
		$errores['nombre_establecimiento'] = $errores['nombre'];
	}

	if ( ! is_numeric($sucursal->numero)) {
		$resultado = false;
		$errores['numero'] = 'Indique el n&uacute;mero. Debe ser num&eacute;rico';
	}

	if (empty($sucursal->sucursal)) {
		$resultado = false;
		$errores['sucursal'] = 'Debe indicar la sucursal';
	}

	return array($resultado, $errores);
}

// saca los datos que no corresponden al modelo empresa
function getDatosEmpresa($post)
{
  	unset($post['alta_temprana'], $post['nueva_sucursal'], $post['sucursal'], $post['establecimiento_id'],
  		$post['nombre_establecimiento'], $post['email'], $post['tipo_manifiesto']);

  	return $post;
}

// saca los datos que no corresponden al modelo de establecimiento
function getDatosNuevoEstablecimiento($empresa, $post)
{
	$post['nombre'] = $post['nombre_establecimiento'];
	$post['empresa_id'] = $empresa->id;
	$post['tipo'] = Establecimiento::GENERADOR;
	$post['alta_temprana'] = 1;

	// debemos crear un usuario sin pisar posibles existentes para la empresa.
	$count = count($empresa->establecimientos);
	$username = $empresa->cuit.'/'.($count+1);
	$post['usuario'] = $username;
	$post['reset_contrasenia'] = 'S';

	// generamos hash para luego reestablecer contraseña
	$encrypt = new sesion();
	$r = $encrypt->getHash('', $post['usuario']);
	$post['salt'] = $r[0];
	$post['contrasenia'] = $r[1]; // lo guardamos para ser utilizado luego como hash para pedir reestablecer la password.

	unset($post['nueva_sucursal'], $post['establecimiento_id'], $post['cuit'], $post['nombre_establecimiento'],
		$post['numero_telefonico'], $post['oficina'], $post['tipo_manifiesto']);

	return $post;
}

function generar_hash_para_reestablecer_password($establecimiento)
{
	$rest_est_hash = new EstablecimientoHash(Array(
		'establecimiento_id' => $establecimiento->id,
		'hash' => $establecimiento->contrasenia,
		'fecha_registracion' => new Datetime,
		'fecha_vencimiento' => date("Y-m-d", strtotime('+7 day',strtotime(date("Y-m-d")))).date("H:i:s"),
		'fecha_modificacion' => NULL,
		'estado_hash' => 'A'
	));

	$rest_est_hash->save();
}

function getDatosNuevaSucursal()
{
	$empresa = Empresa::find_by_cuit($_POST['cuit']);
	return getDatosNuevoEstablecimiento($empresa, $_POST);
}

?>