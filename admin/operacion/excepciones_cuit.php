<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "15";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

// smarty
$smarty = inicializar_smarty();

// file upload
if ($_FILES['file'] AND isset($_POST['submit_csv'])) {
	$file = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];
	$path_info = pathinfo($name);

	if ($path_info['extension'] == "csv")
	{
		$csv_rows = get_csv_rows($file);
		$line_errors = array();
		$csv_line = 1;

		try {
			$excepcion = new excepciones_cuit;

			foreach ($csv_rows as $row) {
				list($success, $errors) = $excepcion->add($row['cuit'], $row['razon_social']);

				if ( ! $success) {
					$line_errors[$csv_line] = $errors;
				}

				$csv_line++;
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}

		$smarty->assign('line_errors', $line_errors);
		$smarty->assign('csv_parsed', true);
	}
	else
	{
		die("El archivo no es CSV");
	}
} elseif (isset($_POST['accion']) AND $_POST['accion'] == 'agregar_individual') {
	agregar_excepcion_individual();
} elseif (isset($_POST['accion']) AND $_POST['accion'] == 'eliminar_excepcion') {
	eliminar_excepcion();
}

$model = new PersonaJuridicaExcepcion;
list($excepciones, $paginador) = $model->get_listado_excepciones($_POST['criterio']);

$smarty->assign('excepciones', $excepciones);
$smarty->assign('criterio', isset($_POST['criterio']) ? $_POST['criterio'] : '');
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/excepciones_cuit.tpl');

session_write_close();

function get_csv_rows($file)
{
	$csv_rows = array();
	$csv_columns_expected = array('cuit', 'razon_social');

	if (($handle = fopen($file, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ';', '"')) !== FALSE) {
			if (count($data) != count($csv_columns_expected)) {
				throw new Exception('Las columnas no coinciden con la cantidad esperada.');
			}
			// creamos array assoc
			$i = 0;
			foreach ($csv_columns_expected as $col) {
				$arr_assoc[$col] = $data[$i];
				$i++;
			}
			$csv_rows[] = $arr_assoc;
		}
		fclose($handle);
	}

	return $csv_rows;
}

function agregar_excepcion_individual()
{
	$response = array('success' => true, 'errors' => array());
	$excepcion = new excepciones_cuit;
	list($success, $errors) = $excepcion->add($_POST['cuit'], $_POST['razon_social']);

	if ( ! $success) {
		$response['success'] = false;
		$response['errors'] = $errors;
	}

	echo json_encode($response);
	exit(0);
}

function eliminar_excepcion()
{
	$response = array('success' => true, 'errors' => array());
	$excepcion = new excepciones_cuit;
	
	try {
		$excepcion->remove($_POST['excepcion_id']);
	} catch (Exception $e) {
		$response['success'] = false;
		$response['errors'] = $e->getMessage();
	}

	echo json_encode($response);
	exit(0);
}
