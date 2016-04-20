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

$nro_boleta = isset($_GET['nro_boleta']) ? $_GET['nro_boleta'] : '';

if ($_FILES['file'])
{	
	$_SESSION['BOLETAS'] ='';
	$file = $_FILES['file']['tmp_name'];
	$name = $_FILES['file']['name'];

    $path_info = pathinfo($name);
	if ($path_info['extension'] == "csv")
	{
		if(($handle = fopen($file, 'r')) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ';', '"')) !== FALSE) {
		        	$final[] = $data;
		    }
		    fclose($handle);
		}

		$id_usuario = $_SESSION['INFORMACION_USUARIO']['ID'];
		$fecha = date('d-m-Y_H-i-s');
		$uploaddir = '../../documentos/boletas_pago_csv/'.$fecha."_id_usuario_".$id_usuario.".csv";
		move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir);

		$boletas = new boletas;
		$check = $boletas->verificarBoletasPorCSV($final);

		foreach ($final as $key => $value) {
			$value[3] = $check[$key];
			$resultados[] = $value;
		}

		$_SESSION['LOG'] = $resultados;

		if (!$_SESSION['BOLETAS']) {
			$boletas = new boletas;
			list($_SESSION['BOLETAS'], $paginador) = $boletas->get_listado_boletas($nro_boleta);
		}
	}
	else
	{
		die("El archivo no es CSV");
	}
}
else
{
	$boletas = new boletas;
	list($_SESSION['BOLETAS'], $paginador) = $boletas->get_listado_boletas($nro_boleta);
}

$smarty  = inicializar_smarty();
$smarty->assign('BOLETAS', $_SESSION['BOLETAS']);
$smarty->assign('PAGINADOR', $paginador);
$smarty->assign('nro_boleta', $nro_boleta);
$smarty->display('drp/operacion/administracion_boletas_de_pago.tpl');

session_write_close();
?>
