<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "6";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);
$error = array();
$smarty  = inicializar_smarty();

$criterio = isset($_GET['criterio']) ? $_GET['criterio'] : '';

if ($_FILES['file'])
{	
	$file = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];

    $path_info = pathinfo($name);

	if ($path_info['extension'] == "csv") {

		if (($handle = fopen($file, 'r')) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ';', '"')) !== FALSE) {
		    	if (count($data) == 2) {
		        	$final[] = $data;
		    	} else {
		    		$error['descripcion'] = 'Formato inv&aacute;lido de CSV. El delimitador esperado es ;';
		    		break;
		    	}
		    }
		    fclose($handle);
		}

		if ( ! $error)
		{
			try {
				foreach ($final as $value) {
					$formularios = new formularios;
					$check[] = $formularios->crearFormulariosPorNombre($value[0], $value[1]);
				}
			} catch (Exception $e) {
				$error['descripcion'] = $e->getMessage();
			}
		}

		$model = new Formulario;
		list($_SESSION['FORMULARIOS'], $paginador) = $model->get_listado_formularios_por_establecimiento($criterio);

		$smarty->assign('ERROR', $error);
		$smarty->assign('MOSTRAR_ALERTAS', true);

	} else {
		die("El archivo no es CSV");
	}
}
else
{
	$model = new Formulario;
	list($_SESSION['FORMULARIOS'], $paginador) = $model->get_listado_formularios_por_establecimiento($criterio);
}

$smarty->assign('FORMULARIOS', $_SESSION['FORMULARIOS']);
$smarty->assign('PAGINADOR', $paginador);
$smarty->assign('CRITERIO', $criterio);
$smarty->display('drp/operacion/administracion_formularios.tpl');
session_write_close();
?>