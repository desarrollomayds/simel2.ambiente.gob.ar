<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	$smarty  = inicializar_smarty();
	$errores = Array();
        //var_dump($_GET['id']);
        
         /*   foreach ($_SESSION["DATOS_EMPRESA"]["ESTABLECIMIENTOS"] as $key => $value) {
            //    var_dump($_SESSION["DATOS_EMPRESA"]["ESTABLECIMIENTOS"][$key]["PERMISOS"]);
                $permisos = $_SESSION["DATOS_EMPRESA"]["ESTABLECIMIENTOS"][$key]["PERMISOS"];
                foreach ($permisos as $kay => $valua) {
                 
                    if($permisos[$kay]["ID"] == $_GET['id']){ 
                        $hay = true;
                   
                    };
                    
                }
               
            }*/
          

	if(!empty($_GET['establecimiento']) && !empty($_GET['id'])){
		$smarty->assign('ACCION', 'modificacion');

		foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as &$establecimiento){
			if($establecimiento['ID'] == $_GET['establecimiento']){

				foreach($establecimiento['VEHICULOS'] as &$vehiculo){
					if($vehiculo['ID'] == $_GET['id']){
						$smarty->assign('VEHICULO', $vehiculo);
						break;
					}
				}

				$smarty->assign('ESTABLECIMIENTO', $establecimiento);
				break;
			}
		}
	}

	$smarty->display('registracion/permisos_vehiculo.tpl');

	session_write_close();
?>
