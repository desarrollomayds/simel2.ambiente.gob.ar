<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();
header("Content-type:application/pdf");

$manifiesto_id = $_GET['id'];
$documento = $_GET['documento'];
$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $manifiesto_id)));

switch ($documento) {
    case manifiesto:
		$tipo_documento = DocumentoManifiesto::MANIFIESTO;        
        break;
    case constancia:
        $tipo_documento = DocumentoManifiesto::CONSTANCIA_RECEPCION;
        break;
    case certificado:
        $tipo_documento = DocumentoManifiesto::CERTIFICADO_TRATAMIENTO;
        break;
}

$documento = new documentos_manifiestos;
$documento->find($manifiesto, $tipo_documento);

if ($documento->found()) {
	$filename = $documento->getFilename();
	$path_and_filename = $documento->getCompleteFilename();
	header("Content-Disposition:attachment;filename='".$filename."'");
	readfile($path_and_filename);
} else {
	// @todo elaborar este error
	header("Content-type:text/plain");
	die("No se ha encontrado el documento. Por favor contacte al administrador.");
}

session_write_close();
?>