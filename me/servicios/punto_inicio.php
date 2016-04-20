<?
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	header("content-type: text/plain");

        if(obtener_provincia($_POST['provincia'])=="CIUDAD AUTONOMA DE BS AS"){
         $provincia = "BUENOS AIRES";   
        }else{
          $provincia = obtener_provincia($_POST['provincia']);  
        } 
	$punto_inicio = @sprintf("%s %s, %s, %s, %s, %s",	$_POST['calle'], 
	$_POST['numero'], 
	$_POST['localidad'], 
	obtener_municipio_por_localidad($_POST['localidad']), 
	$provincia, 
	"argentina");


	echo $punto_inicio;
?>
