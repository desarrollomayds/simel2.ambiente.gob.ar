<?
require_once('../global_incs/librerias/local.inc.php');
session_start();
$_SESSION["now"]= "Generadores";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DRP :: Direcci&oacute;n de Residuos Peligrosos</title>
<link href="css/estilos-general.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="css/slider.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('images/ver-mas-on.gif','images/btn-ingresar-sistema-on.gif')">
<div id="top">
  <div id="contenido-top"><a href="<? echo mel::getBaseMelPath(); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','images/btn-ingresar-sistema-on.gif',1)"><img src="images/btn-ingresar-sistema.gif" alt="DRP" name="Image18" width="190" height="42" border="0" id="Image18" /></a></div>
</div>
<div id="contenedor-slide">
<div id="slide-interiores">
<div id="contenedor-menu">
<div id="logo"><a href="<? echo mel::getBaseWebPath(); ?>"><img style="float:left" src="images/LogoDRP.png" height="73" alt="DRP"  border="0" /></a><img style="float: right;" src="images/logoDRP.gif" /></div>
<div id="menu">
<ul id="nav">
	<li><a href="index.php">Inicio</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li class="seleccionado"><a href="generadores.php">Generadores</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="transportistas.php">Transportistas</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="operadores.php">Operadores</a></li>
      <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="contacto.php">Contacto</a></li>
      <li><img src="images/separador-boton.gif" vspace="5" /></li>
  <li><a href="soporte.php">Soporte</a></li>
</ul>
</div>
</div>
</div>
</div>
<div id="contenedor-info">
<div id="tit-seccion">
<div style="width:16px; height:41px; float:left"> <img src="images/borde-izq-tit-interiores.gif" width="16" height="41" /> </div>
<div style="width:868px; height:41px; float:left; background-color:#1F99CD">Generadores</div>
<div style="width:16px; height:41px; float:left"> <img src="images/borde-der-tit-interiores.gif" width="16" height="41" /> </div>
</div>

<div id="contenido-seccion-izq">

 <?php include("incs/registracion.php"); ?>

 <?php include("incs/noticias-generales.php"); ?>
</div>
<div id="contenido-seccion-der">
<div class="estructura">
<div class="estructura-tit"><br />
  <br />
  <br />
  QUIEN
  <span style="font-size:18px">debe</span><br />
  registrarse
</div>
<div class="estructura-cont"><span class="resaltar">Generador: </span>&ldquo;...toda persona f&iacute;sica o jur&iacute;dica que, como resultado de sus actos o de cualquier proceso, operaci&oacute;n o actividad, produzca residuos calificados como peligrosos...&rdquo; (Art&iacute;culo 14, Ley N&ordm; 24.051). <br />
  <br />
&ldquo;<span class="resaltar">Persona f&iacute;sica o jur&iacute;dica</span> cuya acci&oacute;n o proceso lo hace pasible de estar sometido a la Ley N&ordm; 24.051, ya sea porque los residuos que genera est&aacute;n comprendidos en la identificaci&oacute;n de residuos peligrosos o bien por la cantidad generada&rdquo; (Glosario Anexo I a) Decreto reglamentario N&ordm; 831/93).<br />
<br />
<span class="resaltar">Generador Eventual:</span> es &ldquo;...toda persona f&iacute;sica o jur&iacute;dica que, como resultado de sus actos o de cualquier proceso, operaci&oacute;n o actividad, produjera residuos calificados como peligrosos...en forma eventual, no programada o accidental...&rdquo; (art&iacute;culo 14 Decreto reglamentario 831/93)<br />
<br style="clear:both" />
</div>
</div>
<div class="separador"> </div>
<div class="estructura">
<div class="estructura-tit"><br />
  <br />
  QUE <span style="font-size:20px">NECESITO
</span><br />
<span style="font-size:20px">para </span>registrarme</div>
<div class="estructura-cont"><span class="resaltar"> Ingresar la totalidad de los datos que se requieren en  el formulario</span> de solicitud de acceso al sistema de SIMEL que figura  como &ldquo;Solicitud de Alta de Usuario SIMEL&rdquo;<br />
  <br />
    <br />
    <br />
    <br />
</div>
</div>
<div class="separador"> </div>
<br />
</div>
</div>
<?php include("incs/pie.html"); ?>
</body>
</html>
