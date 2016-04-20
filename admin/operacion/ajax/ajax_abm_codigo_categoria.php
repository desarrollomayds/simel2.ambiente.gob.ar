<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

// acl
$modulo_id = "19";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

$final_array = array();

if (isset($_POST['accion'])) {

	$residuo = new Residuo;
	$success = false;
	$msg_error = '';

	switch ($_POST['accion']) {
		case 'agregar':
			$residuo->codigo = $_POST['codigo'];
			$residuo->categoria = $_POST['categoria'];
			$residuo->descripcion = $_POST['descripcion'];
			$residuo->flag = 't';
			try {
				$residuo->save();
				$success = true;
			} catch (Exception $e) {
				$msg_error = $e->getMessage();
			}
			case 'modificar':
			$residuo->codigo = $_POST['codigo'];
			$residuo->categoria = $_POST['categoria'];
			$residuo->descripcion = $_POST['descripcion'];
			//$residuo->flag = 't';
			try {
				$residuo->save();
				$success = true;
			} catch (Exception $e) {
				$msg_error = $e->getMessage();
			}
		
			
			
		break;
	}

	echo json_encode(array('success' => $success, 'err_msg' => $err_msg));
	exit(0);
}

exit('Indique una acci&oacute;n');
