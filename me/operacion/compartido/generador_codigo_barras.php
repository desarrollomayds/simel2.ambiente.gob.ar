<?php
require_once("../../../global_incs/classes/barcodegen/BCGFontFile.php");
require_once("../../../global_incs/classes/barcodegen/BCGColor.php");
require_once("../../../global_incs/classes/barcodegen/BCGDrawing.php");
require_once("../../../global_incs/classes/barcodegen/BCGcode128.barcode.php");

// The arguments are R, G, and B for color.
$colorFront = new BCGColor(0, 0, 0);
$colorBack = new BCGColor(255, 255, 255);

$font = new BCGFontFile('../../../assets/fonts/Arial.ttf', 12);

$code = new BCGcode128(); // Or another class name from the manual
$code->setScale(2); // Resolution
$code->setThickness(30); // Thickness
$code->setForegroundColor($colorFont); // Color of bars
$code->setBackgroundColor($colorBack); // Color of spaces
$code->setFont($font); // Font (or 0)
$code->parse($_GET['cb']); // Text

$drawing = new BCGDrawing('', $colorBack);
$drawing->setBarcode($code);
$drawing->draw();
header('Content-Type: image/png');
$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
?>