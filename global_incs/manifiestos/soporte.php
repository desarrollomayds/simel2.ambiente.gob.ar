<?
require_once('../global_incs/librerias/local.inc.php');
session_start();
$_SESSION["now"]= "Soporte";
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
<div id="logo"><a href="<? echo mel::getBaseWebPath(); ?>"><img style="float:left" src="images/LogoDRP.png" height="73" alt="DRP"  border="0" /></a><img style="float: right;" src="images/logoDRP.gif"  /></div><div id="menu">
<ul id="nav">
	<li><a href="index.php">Inicio</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="generadores.php">Generadores</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="transportistas.php">Transportistas</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="operadores.php">Operadores</a></li>

      <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="contacto.php">Contacto</a></li>
      <li><img src="images/separador-boton.gif" vspace="5" /></li>
  <li class="seleccionado"><a href="soporte.php">Soporte</a></li>
</ul>
</div>
</div>
</div>
</div>
<div id="contenedor-info">
<div id="tit-seccion">
<div style="width:16px; height:41px; float:left"> <img src="images/borde-izq-tit-interiores.gif" width="16" height="41" /> </div>
<div style="width:868px; height:41px; float:left; background-color:#1F99CD">Soporte</div>
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
  DESCARGA <span style="font-size:20px">DEL
</span><br />
<span style="font-size:20px;">Manual de usuario RP</span>
</div>
<div class="estructura-cont">
  <center>
  <span class="resaltar"><a href="documentos/SIMEL - Manual de Usuario V9.0.pdf" target="_blank"><img src="imagenes/manual.jpg"><br>Descargar</a></span>
</div>
</div>
<div class="separador"> </div>

<div class="estructura">
<div class="estructura-tit"><br />
  <br />
  LEYES <span style="font-size:20px">QUE
</span><br />
<span style="font-size:20px;">reglamentan RP</span>
</div>
<div class="estructura-cont">
<br />
  <strong>- Ley N&ordm; 24.051/1992:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=450" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=450</a><br />
  <br />
  <strong>- Decreto Reglamentario 831/2003:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=12830" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=12830</a><br />
  <br />
  <strong>- Resoluci&oacute;n 123/1995: </strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=17901" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=17901</a><br />
  <br />
  <strong>- Resoluci&oacute;n 206/1996:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=37600" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=37600</a><br />
  <br />
  <strong>- Resoluci&oacute;n 238/1997:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=42539" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=42539</a><br />
  <br />
  <strong>- Resoluci&oacute;n 1221/2000:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=64340" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=64340</a><br />
  <br />
  <strong>- Resoluci&oacute;n 79/2002:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=72053" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=72053</a><br />
  <br />
  <strong>- Resoluci&oacute;n 897/2002:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=77374" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=77374</a><br />
  <br />
  <strong>- Resoluci&oacute;n 304/2005:</strong><br />
  <a href="http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=104848" class="boton-general">http://www.infoleg.gov.ar/infolegInternet/verNorma.do?id=104848</a>
  </div>
</div>

<table border="0"><tr><td>&nbsp;</td></tr></table>
<div class="separador"> </div>

<div class="estructura">
<div class="estructura-tit"><br />
  <br />
   <span style="font-size:25px">PREGUNTAS
</span><br /> 
<span style="font-size:20px">frecuentes</span></div>
<div class="estructura-cont">
  <p><strong><em><a href="#1" class="boton-general">1 - &iquest;Qu&eacute; es y para que sirve SIMEL?</a><br />
        <a href="#2" class="boton-general">2 - &iquest;C&oacute;mo obtengo el acceso al sistema?</a></em></strong><br />
    <strong><em>
    <a href="#3" class="boton-general">3 - &iquest;C&oacute;mo est&aacute; conformado el usuario de acceso?</a></em></strong><br />
    <strong><em><a href="#5" class="boton-general">4 - &iquest;Puedo tener m&aacute;s de un usuario por establecimiento</a></em></strong><a href="#4" class="boton-general"><strong><em>?</em></strong></a><strong><em><br />
    <a href="#5" class="boton-general">5 - &iquest;Es obligatorio el empadronamiento?</a></em></strong><br />
    <strong><em>
    <a href="#6" class="boton-general">6 - &iquest;Cu&aacute;l es el costo del empadronamiento?</a></em></strong><br />
    <strong><em><a href="#7" class="boton-general">7 - &iquest;A partir de qu&eacute; fecha es obligatorio pasar del  sistema manual de manifiestos al sistema electr&oacute;nico?</a><br />
    <a href="#8" class="boton-general">8 - &iquest;Se mantiene el viejo sistema manual?</a></em></strong><br />
    <strong><em><a href="#9" class="boton-general">9 - &iquest;Cu&aacute;les son los navegadores soportados para este  sistema?</a></em></strong> </p>
  <p><strong><em><br />
        <a name="1" id="1"></a>1 - &iquest;Qu&eacute; es y para que sirve SIMEL?</em></strong><br />
        El sistema de manifiesto es un sistema inform&aacute;tico que  permite reemplazar todas las tareas que se realizan sobre los manifiestos  preimpresos en papel y que se adquieren en la DRP por manifiestos electr&oacute;nicos  mediante el uso de una herramienta inform&aacute;tica, de acceso gratuito. <br />
  </p>
  <p><strong><em><a name="2" id="2"></a>2 - &iquest;C&oacute;mo obtengo el acceso al sistema?</em></strong><br />
    Ingresando dese este sitio web al bot&oacute;n &ldquo;solicitud de  acceso al sistema&rdquo; y completando la totalidad de los datos presentandos en pantalla.<br />
    <br />
    <strong><em><a name="3" id="3"></a>3 - &iquest;C&oacute;mo est&aacute; conformado el usuario de acceso?</em></strong><br />
    El usuario &uacute;nico estar&aacute; conformado por el n&uacute;mero de  CUIT de la empresa, de once (11) d&iacute;gitos, continuando con su n&uacute;mero consecutivo  incremental de 1 a n establecimientos registre bajo su responsabilidad.<br />
&nbsp;Ejemplo:<br />
    Empresa Prueba SRL CUIT: 27-12345678-9 registra sus  establecimientos: Genera1 y Genera2 ) como usuarios: 27123456789/1 y  27123456789/2 respectivamente.<br />
    <br />
    <strong><em><a name="4" id="4"></a>4 - &iquest;Puedo tener m&aacute;s de un usuario por establecimiento?<br />
    </em></strong>No.  El usuario act&uacute;a como &uacute;nico identificador del establecimiento ya que no solo se  encuentra georeferenciado por sistema seg&uacute;n lo declarado por los actores responsables, sino que es &uacute;nico para la identificaci&oacute;n  del sistema manifiesto y la Direcci&oacute;n de residuos Peligrosos.<br />
    <br />
    <a name="5" id="5"></a><strong><em>5 - &iquest;Es obligatorio el empadronamiento?</em></strong><br />
    Si. Seg&uacute;n lo expresado en la Resoluci&oacute;n de la  Direcci&oacute;n de Residuos Peligrosos.</p>
  
  <p><strong><em><a name="6" id="6"></a>6 - &iquest;Cu&aacute;l es el costo del empadronamiento?</em></strong><br />
    El empadronamiento es un servicio p&uacute;blico gratuito.</p>
  <p><strong><em><a name="7" id="7"></a>7 - &iquest;A partir de qu&eacute; fecha es obligatorio pasar del  sistema manual de manifiestos al sistema electr&oacute;nico?<br />
  </em></strong>A partir del 1 de _____2015, se debe pasar a utilizar  el sistema online de manifiestos. </p>
  <p><a name="8" id="8"></a><strong><em>8 - &iquest;Se mantiene el viejo sistema manual?</em></strong><br />
  No. Salvo excepciones que deber&aacute;n ser comunicadas ante  la Direcci&oacute;n de residuos Peligrosos por falta de acceso a internet o por falta  de energ&iacute;a el&eacute;ctrica </p>
  <p><a name="9" id="9"></a><strong><em>9 - &iquest;Cu&aacute;les son los navegadores soportados para este  sistema?<br />
  </em></strong>El sistema inform&aacute;tico Manifiestos - DRP recomienda la  utilizaci&oacute;n de los navegadores: <br />
      <strong>Google Chrome.</strong><br />
      <a href="https://www.google.com.mx/intl/es-419/chrome/browser/desktop/">https://www.google.com.mx/intl/es-419/chrome/browser/desktop/</a> </p>
  <p><strong>Mozilla Firefox.</strong><br />
      <a href="http://www.mozilla.org/es-AR/firefox/fx/?gclid=CJqF0srN9aICFUsJ2godpAaFhA">http://www.mozilla.org/es-AR/firefox/fx/?gclid=CJqF0srN9aICFUsJ2godpAaFhA</a> <br />
    Independientemente del explorador que elijamos <strong>se debe tener activo Javascript en nuestro  explorador.</strong><br />
    <br />
</p>
</div>

</div>
<table border="0"><tr><td>&nbsp;</td></tr></table>
<div class="separador"> </div>


<br />
<br />
<br />
<br />


</div>






</div>
<?php include("incs/pie.html"); ?>
</body>
</html>
