<?

	require("../../global_incs/librerias/barcode/barcode.php");  
	require("../../global_incs/librerias/barcode/i25object.php");
	
	require("../../global_incs/librerias/barcode/c39object.php");
	require("../../global_incs/librerias/barcode/c128aobject.php");
	require("../../global_incs/librerias/barcode/c128bobject.php");
	require("../../global_incs/librerias/barcode/c128cobject.php");





	$style   = BCD_DEFAULT_STYLE | BCS_ALIGN_CENTER | BCS_DRAW_TEXT | BCS_STRETCH_TEXT;
	$width   = 500;
	$height  = 100;
	$xres    = BCD_DEFAULT_XRES;
	$font    = BCD_DEFAULT_FONT;
	$obj = new C39Object($width, $height, $style, $_GET['code']);

	if ($obj) {
		$obj->SetFont($font);   
		$obj->DrawObject($xres);
		$obj->FlushObject();
		$obj->DestroyObject();
		unset($obj);
	}
?>
