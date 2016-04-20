<%
//si es provincia de buenos aires utiliza otra libreria para genera el código de barras
if($_GET["zonID"] == 1){
		include_once("../barcode_bp/php-barcode.php");
		barcode_print($_GET["code"],128,1);
}else{
	  include_once("barcode.php");
    include_once("c128cobject.php");
	  include_once("c39object.php");

	  if (!isset($style))  $style   = BCD_DEFAULT_STYLE;
	  if (!isset($width))  $width   = BCD_DEFAULT_WIDTH;
	  if (!isset($height)) $height  = BCD_DEFAULT_HEIGHT;
	  if (!isset($xres))   $xres    = BCD_DEFAULT_XRES;
	  if (!isset($font))   $font    = BCD_DEFAULT_FONT;

	  switch ($type) {
	    case "I25": $obj = new I25Object($width, $height, $style, $code); break;
	    case "C39": $obj = new C39Object($width, $height, $style, $code); break;
	    case "C128A": $obj = new C128AObject($width, $height, $style, $code); break;
	    case "C128B": $obj = new C128BObject($width, $height, $style, $code); break;
	    case "C128C": $obj = new C128CObject($width, $height, $style, $code); break;
		default: echo "Need bar code type ex. C39"; $obj = false;
	  }

	  if ($obj) {
	      $obj->SetFont($font);
	      $obj->DrawObject($xres);
	  	  $obj->FlushObject();
	  	  $obj->DestroyObject();
	  	  unset($obj);  /* clean */
	  }
}
%>