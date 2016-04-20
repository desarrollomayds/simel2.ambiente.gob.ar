<?	
	require_once("../../global_incs/librerias/mpdf/mpdf.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE


	// if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(3, $_SESSION['PASOS_CORRECTOS'])){
	// 	exit;
	// }

	$errores  = Array();
	/*FLOR ARREGLO CODIGO CEROS*/
        $ceros = "";
        if (strlen($_SESSION['DATOS_EMPRESA']['ID']) < 10) {
            for ($i = strlen($_SESSION['DATOS_EMPRESA']['ID']); $i < 10; $i++) {
                $ceros .="0";
            }
        }
        
        $final = $ceros.$_SESSION['DATOS_EMPRESA']['ID'];
    
    $smarty  = inicializar_smarty();

	$smarty->assign('EMPRESA', $_SESSION['DATOS_EMPRESA']);
    $smarty->assign('CODIGO', $final);
	//$smarty->display('registracion/imprimir.tpl');
	$html = $smarty->fetch('registracion/imprimir.tpl');
	//echo $html;die;
	$mpdf = new mPDF();
	$mpdf->ignore_invalid_utf8 = true;
	$mpdf->showImageErrors = true;
	$mpdf->debug = true;
	$mpdf->WriteHTML($html);
	$mpdf->Output();

	session_write_close();
?>
