<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "7";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

if ($_FILES['file'])
{
	$_SESSION['ESTABLECIMIENTOS'] = '';
	$file = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];
	$path_info = pathinfo($name);

	if ($path_info['extension'] == "csv")
	{
		$csv_rows = get_csv_rows($file);
		$csv_line = 1;
		$failed = false;

		try
		{
			// queremos grabar lineas que no tengan error
			//$conexion = Establecimiento::connection();
			//$conexion->transaction();

			foreach ($csv_rows as $row) {
				$errors[$csv_line] = establecimientos::crear_from_csv($row);
				if ($errors[$csv_line]) {
					$failed = true;
				}
				$csv_line++;
			}

			/*if ( ! $failed) {
				// persistimos cambios
				$conexion->commit();
			}*/

		}
		catch (Exception $e)
		{
			//$conexion->rollback();
			die($e->getMessage());
		}

		$smarty = inicializar_smarty();
		$smarty->assign('ERRORES', $errors);
		$smarty->assign('success', !$failed);
		$smarty->assign('failed', $failed);
		$smarty->display('drp/operacion/listado_altas_masivas.tpl');
	}
	else
	{
		die("El archivo no es CSV");
	}
}
else
{
	$smarty = inicializar_smarty();
	$smarty->display('drp/operacion/listado_altas_masivas.tpl');
}
session_write_close();

function get_csv_rows($file)
{
	$csv_rows = array();
	$csv_columns_expected = array(
		'cuit',
		'nombre',
		'caa_numero',
		'caa_vencimiento',
		'expediente_numero',
		'expediente_anio',
		'codigo_actividad',
		'descripcion',
		'calle',
		'calle_c',
		'numero',
		'numero_c',
		'codigo_postal',
		'codigo_postal_c',
		'piso',
		'piso_c',
		'provincia',
		'provincia_c',
		'localidad',
		'localidad_c',
		'habilitaciones',
		'email',
		'sucursal'
	);

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

?>