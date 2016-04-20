<?
require_once('../global_incs/librerias/local.inc.php');
session_start();
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
    <li><a href="index.php">Inicio</a></li>
    <?php
    if ($_SESSION["now"]=="Generadores"){
      echo "<li class='seleccionado'><a href='generadores.php'>Generadores</a></li>";
    } else {
      echo "<li><a href='generadores.php'>Generadores</a></li>";
    }
    echo "<li><img src='images/separador-boton.gif' vspace='5' /></li>";
    if ($_SESSION["now"]=="Transportistas"){
      echo "<li class='seleccionado'><a href='transportistas.php'>Transportistas</a></li>";
    } else {
      echo "<li ><a href='transportistas.php'>Transportistas</a></li>";
    }
    echo "<li><img src='images/separador-boton.gif' vspace='5' /></li>";
    if ($_SESSION["now"]=="Operadores"){
      echo "<li class='seleccionado'><a href='operadores.php'>Operadores</a></li>";
    } else {
      echo "<li ><a href='operadores.php'>Operadores</a></li>";
    }
    ?>
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
<div style="width:868px; height:41px; float:left; background-color:#1F99CD"><?echo $_SESSION["now"];?> - <span class="subtit-seccion">&iquest;Qui&eacute;n debe registrarse?</span></div>
<div style="width:16px; height:41px; float:left"> <img src="images/borde-der-tit-interiores.gif" width="16" height="41" /> </div>
</div>

<div id="contenido-seccion-izq">

 <?php include("incs/registracion.php"); ?>

 <?php include("incs/noticias-generales.php"); ?>
</div>
<div id="contenido-seccion-der">
<div id="contenido-submenu">
  <p><span class="resaltar">SUJETOS REGULADOS GENERALES Y PARTICULARES</span><br />
    <br />
    <span class="resaltar">Operador:</span> <br />
    &ldquo;Es la persona responsable por la operaci&oacute;n completa de una instalaci&oacute;n o planta para el tratamiento y/o disposici&oacute;n final de residuos peligrosos&rdquo; (Glosario Anexo I  a) Decreto reglamentario 831/93). <br />
    &ldquo;En particular todas aquellas instalaciones en las que se realicen las operaciones indicadas en el Anexo III, Operaciones de Eliminaci&oacute;n&rdquo; (art&iacute;culo 33, Ley N&ordm; 24.051).<br />
    <br />
    <span class="resaltar">En el art&iacute;culo 33 del Cap&iacute;tulo VI &ldquo;De las Plantas de tratamiento y disposici&oacute;n final&rdquo; de la Ley N&ordm; 24.051 clasifica a los Operadores en dos categor&iacute;as:</span></p>
  <p><span class="resaltar">- Plantas de tratamiento:</span><br /> 
    &ldquo;...son aquellas en las que se modifican las caracter&iacute;sticas f&iacute;sicas, la composici&oacute;n qu&iacute;mica o la actividad biol&oacute;gica de cualquier residuo peligroso, de modo tal que se eliminen sus propiedades nocivas, o se recupere energ&iacute;a y/o recursos materiales, o se obtenga un residuo menos peligroso, o se lo haga susceptible de recuperaci&oacute;n, o m&aacute;s seguro para su transporte o disposici&oacute;n final &ldquo;(art&iacute;culo 33, Ley N&ordm; 24.051).<br />
  </p>
  <p><span class="resaltar">- Plantas de disposici&oacute;n final:</span><br /> 
    &ldquo;...son los lugares especialmente acondicionados para el dep&oacute;sito permanente de residuos peligrosos en condiciones exigibles de seguridad ambiental&rdquo; (art&iacute;culo 33, Ley N&ordm; 24.051). &ldquo;Son aquellas en las que se realizan las siguientes operaciones indicadas en el Anexo III &ndash; A, Operaciones de Eliminaci&oacute;n&rdquo; (Ley N&ordm; 24.051, Glosario Anexo I a) Decreto reglamentario N&ordm; 831/93)<br />
    <br />
    * Dep&oacute;sito dentro o sobre la tierra, &iacute;tem D1<br />
    * Rellenos especialmente dise&ntilde;ados, &iacute;tem D5<br />
    * Dep&oacute;sito permanente, &iacute;tem D12</p>
  <p><span class="resaltar">Operador / Generador:</span><br />
    &ldquo;Las plantas de tratamiento y disposici&oacute;n final son consideradas generadores&rdquo; a los efectos del c&aacute;lculo de la Tasa art&iacute;culo 16 Decreto reglamentario N&ordm; 831/93). Es toda persona f&iacute;sica o jur&iacute;dica que al llevar a cabo actividades de operaci&oacute;n de residuos peligrosos genera residuos peligrosos.<br />
      <br />
        <span class="resaltar">Operador que realiza actividades de almacenamiento:</span><br /> 
        toda persona f&iacute;sica o jur&iacute;dica que lleva a cabo operaciones de&hellip; a) almacenamiento previo a cualquier operaci&oacute;n indicada en la Secci&oacute;n A &ldquo;Operaciones de Eliminaci&oacute;n&rdquo;, &iacute;tem D15 y/o b) acumulaci&oacute;n de materiales destinados a cualquiera de las operaciones de recuperaci&oacute;n de recurso, reciclado, regeneraci&oacute;n, reutilizaci&oacute;n directa y otros usos indicados en la Secci&oacute;n B, &iacute;tem R13 &hellip;ambos &iacute;tems correspondientes al Anexo III de la ley N&deg; 24.051.<br />
        <br />
    Mediante la Resoluci&oacute;n ex SECRETAR&Iacute;A DE RECURSOS NATURALES Y AMBIENTE HUMANO (SRNyAH) N&ordm; 123/95 se agrega al &iacute;tem 24<span class="resaltar"> &ldquo;Operador&rdquo; </span>del Anexo I a) Glosario del Decreto reglamentario N&ordm; 831/93, la siguiente definici&oacute;n: &ldquo;es tambi&eacute;n operador el que cumple con las operaciones de almacenamiento previo a cualquier operaci&oacute;n indicada en la Secci&oacute;n A de eliminaciones (D - 15) y/o recuperaci&oacute;n en la Secci&oacute;n B (R - 13) ambas del Anexo III de la ley N&deg; 24.051&rdquo;<br />
  </p>
  <p><span class="resaltar">Operador con Equipo Transportable:<br />
  </span> &ldquo;...se consideran Operadores con equipos transportables a aquellos cuya tecnolog&iacute;a y equipamiento les permitan instalarse en el predio del Generador, por un tiempo determinado, a los fines del tratamiento `in situ` de los residuos peligrosos&rdquo; (Resoluci&oacute;n ex SECRETAR&Iacute;A DE RECURSOS NATURALES Y DESARROLLO SUSTENTABLE (SRNyDS) N&ordm; 185/99).<br />
    <br />
      <span class="resaltar">Operador - Exportador de Residuos Peligrosos:</span><br /> 
      &ldquo;...toda persona f&iacute;sica o jur&iacute;dica que, sin perjuicio de la realizaci&oacute;n de las actividades enumeradas en el art&iacute;culo 1 de la Ley N&deg; 4.051, gestione, coordine u organice operaciones de exportaci&oacute;n de desechos peligrosos&rdquo; (Resoluci&oacute;n ex SRNyAH N&ordm; 184/95 dictada en el marco de la Ley N&ordm; 23.922 por la que se aprueba el texto del Convenio de Basilea sobre El Control de los Movimientos Transfronterizos de Desechos Peligrosos y su Eliminaci&oacute;n, entre otros desechos. Deber&aacute; ser inscripto en calidad de Operador en el REGISTRO NACIONAL DE GENERADORES Y OPERADORES DE RESIDUOS PELIGROSOS en los t&eacute;rminos de la Ley N&deg; 24.051, con las responsabilidades y alcances que establece la misma y sus normas complementarias.<br />
  </p>
</div>
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
