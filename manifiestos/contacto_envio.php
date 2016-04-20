<?php
require_once("../global_incs/librerias/smarty/Smarty.class.php");
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");

	$data[nombre] = $_POST['nombre'];
	$data[apellido] = $_POST['apellido'];
	$data[email] = $_POST['email'];
	$data[comentarios] = $_POST['comentarios'];
	$data[cuit] = $_POST['cuit'];
	$data[razon] = $_POST['razon'];

	$total = count(array_filter($data));

if (($_POST['enviar']) && ($total >= 4)){

	$mail = new mail;
	$mail->ponerEnColaDeEnvio(NULL, mail::CONTACTO, $data);
	header("location:contacto.php?send=ok");
} else {
	header("location:contacto.php");
}
?>