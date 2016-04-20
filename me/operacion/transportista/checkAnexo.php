<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){


}else{

	  $id_manifiesto = $_SESSION['DATOS_MANIFIESTO']['ID'];
            $traslados = obtener_vehiculos_traslados_mani($id_manifiesto);
            //$traslados = obtener_vehiculos_traslados($id_manifiesto, $id);
	if(empty($traslados)) {
                $anexo = 0;
            }else{
                $anexo = 1;
            }
            
            echo json_encode($anexo);
}

session_write_close();
?>
