<?
require_once('../global_incs/librerias/local.inc.php');
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

<body onload="MM_preloadImages('images/btn-ingresar-sistema-on.gif')">
<div id="top">
  <div id="contenido-top"><a href="<? echo mel::getBaseMelPath(); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','images/btn-ingresar-sistema-on.gif',1)"><img src="images/btn-ingresar-sistema.gif" alt="DRP" name="Image18" width="190" height="42" border="0" id="Image18" /></a></div>
</div>
<div id="contenedor-slide">
<div id="slide-interiores">
<div id="contenedor-menu">
<div id="logo"><a href="<? echo mel::getBaseWebPath(); ?>"><img style="float:left" src="images/LogoDRP.png" height="73" alt="DRP"  border="0" /></a><img style="float: right;" src="images/logoDRP.gif"  /></div><div id="menu">
<ul id="nav">
	<li class="seleccionado"><a href="index.php">Inicio</a></li>
    <li ><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="generadores.php">Generadores</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="transportistas.php">Transportistas</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="operadores.php">Operadores</a></li>

      <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="contacto.php">Contacto</a></li>
</ul>
</div>
</div>
</div>
</div>
<div id="contenedor-info">
<div id="tit-seccion">
<div style="width:16px; height:41px; float:left"> <img src="images/borde-izq-tit-interiores.gif" width="16" height="41" /> </div>
<div style="width:868px; height:41px; float:left; background-color:#1F99CD">Acerca del Sistema<span class="subtit-seccion"></span></div>
<div style="width:16px; height:41px; float:left"> <img src="images/borde-der-tit-interiores.gif" width="16" height="41" /> </div>
</div>

<div id="contenido-seccion-izq">
  <?php include("incs/registracion.php"); ?>
  <?php include("incs/noticias-generales.php"); ?>
</div>
<div id="contenido-seccion-der">
<div id="contenido-submenu">
  <p><span class="resaltar"><strong>Acerca del sistema: </strong></span><strong><br />
    <br />
  </strong>El sistema ManifiestosDRP, tiene  por objeto asentar la generaci&oacute;n, operaci&oacute;n y transporte de los residuos  peligrosos dentro del territorio nacional.<br />
    <br />
El  sistema provee la creaci&oacute;n de un Manifiesto electr&oacute;nico, con un solo reporte de  porte obligatorio, donde se informa sobre la naturaleza y cantidad de los  residuos generados, su origen, transferencia del generador al transportista, y  de este a la planta de tratamiento o disposici&oacute;n final, as&iacute; como los procesos  de tratamiento y eliminaci&oacute;n a los que fueran sometidos, y cualquier otra  operaci&oacute;n que respecto de los mismos se realizare. Asimsimo permite la  registraci&oacute;n en l&iacute;nea por parte de los actores involucrados a fin de solicitar  el acceso al mismo. Cabe destacar que toda informaci&oacute;n solicitada actuar&aacute; en  car&aacute;cter de declaraci&oacute;n jurada y ser&aacute; utilizada &uacute;nicamente para mantener  actualizado el registro de usuarios alcanzados a la utilizaci&oacute;n del sistema.<br />
<br />
<strong class="resaltar">FUNCIONALIDADES:</strong><br />
<br />
Entre  sus funcionalidades el sistema manifiestos DRP permite:</p>
  <ul>
    <li>Mantener un padr&oacute;n de usuarios habilitados para el uso del sistema a  trav&eacute;s de la solicitud de acceso al sistema.</li>
    <li>Mensajer&iacute;a interna entre la DRP, Generadores, Transportistas y Operadores de residuos regulados.</li>
    <li>Gestionar altas y rechazos de manifiestos electr&oacute;nicos.</li>
    <li>Reportes en l&iacute;nea e impresi&oacute;n del manifiesto, plantillas, remitos y  certificaci&oacute;n de tratamiento.</li>
    <li>Monitoreo de gesti&oacute;n y estad&iacute;stica online sobre el estado de los  manifiestos.</li>
    <li>Creaci&oacute;n de rutas predeterminadas para aquellos actores que utilizan manifiestos  denominados como m&uacute;ltiples.</li>
    <li>Pedir autorizaci&oacute;n y conformidad de cada manifiesto nuevo entre los  actores subsiguientes que intervienen en la operatoria.</li>
    <li>Llevar el control de los Manifiestos Activos/Pendientes.</li>
    <li>Acceder a informaci&oacute;n sobre manifiestos hist&oacute;ricos.</li>
    <li>Medidas de seguridad aplicada al manifiesto electr&oacute;nico a fin de  mantener la trazabilidad de los mismos.</li>
    <li>Llevar el registro con los vencimientos de las habilitaciones seg&uacute;n  expediente en curso en la DRP. Entre otros.<br />
  </li>
  </ul>
  </div>
  <div class="separador"> </div>


<br />


</div>






</div>
<?php include("incs/pie.html"); ?>
</body>
</html>
