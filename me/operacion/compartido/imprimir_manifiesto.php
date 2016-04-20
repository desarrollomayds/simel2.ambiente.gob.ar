<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

$error_text = "<script language='javascript'>alert('El documento no se ha encontrado o usted no posee permisos para descargarlo');window.history.back();</script>";
session_start();

try {
	$documento = new documentos_manifiestos;

	$manifiesto_id = $_GET['id'];
	// valida que el establecimiento tenga permisos para descargar el archivo
	$establecimiento = Establecimiento::find('first', array('conditions' => array('id = ?', $documento->getUsuarioID())));
	$manifiesto = Manifiesto::buscar_manifiestos_por_establecimiento($establecimiento,1,$manifiesto_id);
	// fin validar
	$manifiesto_id = $manifiesto[0]->manifiesto_id;
	$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto_id)));
	$tipo_documento = DocumentoManifiesto::MANIFIESTO;

	$documento->find($manifiesto, $tipo_documento);

	if ($documento->found()) {
		$filename = $documento->getFilename();

		$path_and_filename = $documento->getCompleteFilename();
		header("Content-type:application/pdf");
		header("Content-Disposition:attachment;filename='".$filename."'");
		readfile($path_and_filename);
	} else {
		// @todo elaborar este error
		die($error_text);

	}
} catch (Exception $e) {
	die($error_text);
}

session_write_close();
?>
