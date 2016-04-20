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
  <div id="contenido-top"><a href="<? echo mel::getBaseMelPath(); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','images/btn-ingresar-sistema-on.gif',1)"><img src="images/btn-ingresar-sistema.gif" name="Image18" width="190" height="42" border="0" id="Image18" /></a></div>
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
<div style="width:868px; height:41px; float:left; background-color:#1F99CD">Registraci&oacute;n - Gu&iacute;a Paso a Paso<span class="subtit-seccion"></span></div>
<div style="width:16px; height:41px; float:left"> <img src="images/borde-der-tit-interiores.gif" width="16" height="41" /> </div>
</div>

<div id="contenido-seccion-izq">
  <?php include("incs/registracion.php"); ?>
  <?php include("incs/noticias-generales.php"); ?>
  <br />
  <br />
  <br />
<br />
<br />
<br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
</div>
<div id="contenido-seccion-der">
<div id="contenido-submenu">
<center>
<span class="resaltar"><a href="documentos/SIMEL - Manual de Usuario V9.0.pdf" target="_blank"><img src="imagenes/manual.jpg"><br>Descargar manual</a></span>
</center>
  <p><span class="resaltar">El sistema de registraci&oacute;n MANIFIESTOS DRP</span> le permite cargar los datos de la empresa y de cada uno de sus establecimientos, independientemente de que sea Generador, Transportista u Operador.
    <br />
       <br />
       <span class="resaltar">IMPORTANTE: </span>los datos registrados en el presente sistema de manifiestos deben ser coincidentes con los manifiestos presentados anteriormente en la DRP, a&uacute;n cuando se hayan producidos cambios posteriormente. <br />
       <p><span class="resaltar"><br />
        PROCEDIMIENTO - EMPADRONAMIENTO DE USUARIOS: </span><br />
        <br />
         <br />
    1.	Acceda a<span class="resaltar"> www.simel.com.ar</span><br />
    <br />
    2.	Dir&iacute;jase al enlace/bot&oacute;n<span class="resaltar"> 'INGRESAR AL SISTEMA'. </span><br />
    <br />
    3.	<span class="resaltar">Complete los campos</span> CUIT de la EMPRESA (CUIT v&aacute;lido) y C&Oacute;DIGO. <br />
    <br />
    4.	<span class="resaltar">Defina el tipo de actividad </span>que realiza su empresa (GENERADOR, TRANSPORTISTA u OPERADOR). <br />
&nbsp;&nbsp;&nbsp;&nbsp; Puede seleccionar m&aacute;s de una actividad.<br />
  <br />
    5.<span class="resaltar"> Ingrese los datos de la empresa </span>solicitados en el formulario que aparece en pantalla. <br />
    <br />
    6.<span class="resaltar"> Ingrese los datos de todos los Responsables</span> <span class="resaltar">Legales</span> y/o Socios de la empresa. <br />
    <br />
    7.	<span class="resaltar">Ingrese los datos de todos los Responsables T&eacute;cnicos </span>de la empresa. <br />
    <br />
    8.	Al presionar el bot&oacute;n <span class="resaltar">'SIGUIENTE'</span> acceder&aacute; al formulario de carga de datos de los establecimientos. <br />
      <div style="padding-left:20px; padding-right:20px">
        a)	<span class="resaltar">Ingrese los datos de todos los establecimientos</span> que formen parte de la empresa y defina la actividad que realice en cada uno de ellos.<br />
        Por ejemplo, si la empresa se encarga de Transportar y Operar los residuos peligrosos, tenga en cuenta que si el punto de operaci&oacute;n se encuentra f&iacute;sicamente ubicado en la misma direcci&oacute;n, deber&aacute; ingresar el mismo establecimiento dos veces, diferenci&aacute;ndolo por cada una de las tareas que lleva a cabo. <br />
        <br />
    b)	<span class="resaltar">En caso de ser Transportista,</span> una vez ingresados los datos del establecimiento, aparecer&aacute; la opci&oacute;n 'EDITAR' donde ingresar&aacute; todos los veh&iacute;culos que posee y sus correspondientes autorizaciones. <br />
    <br />
    c)<span class="resaltar"> Una vez completos todos los campos solicitados, </span>se desplegar&aacute;n una pantalla conteniendo todos los datos ingresados. En caso de estar correctos, presione el bot&oacute;n 'FINALIZAR'. Caso contrario, presione el bot&oacute;n 'ANTERIOR' para corregir los errores que considere se produjeron en el ingreso de informaci&oacute;n al sistema. <br />
    <br />
    d)<span class="resaltar"> Aparecer&aacute; el c&oacute;digo mencionado en el punto 1.-</span> y una opci&oacute;n que permitir&aacute; guardar una copia impresa de los datos ingresados anteriormente. </p>
    <br />
    <br />
    </div>
  </div>
  </div>






</div>
<?php include("incs/pie.html"); ?>
</body>
</html>
