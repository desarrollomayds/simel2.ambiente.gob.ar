<?
require_once('../global_incs/librerias/local.inc.php');
?>
<script type="text/javascript" src="../assets/javascript/validaciones_cuit.js"></script>
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
function checkform(){
  var cuit = document.getElementById('cuit').value 
  if (cuitConFormatoValido(cuit) || cuit == ""){
    //console.log(cuit);
  } else {
    alert("cuit invalido");
    return false;
  }
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
<div id="logo"><a href="<? echo mel::getBaseWebPath(); ?>"><img style="float:left" src="images/LogoDRP.png" height="73" alt="DRP"  border="0" /></a><img style="float: right;" src="images/logoDRP.gif" /></div>
<div id="menu">
<ul id="nav">
	<li><a href="index.php">Inicio</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="generadores.php">Generadores</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="transportistas.php">Transportistas</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li ><a href="operadores.php">Operadores</a></li>
      <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li class="seleccionado"><a href="contacto.php">Contacto</a></li>
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
<div style="width:868px; height:41px; float:left; background-color:#1F99CD">Contacto<span class="subtit-seccion"></span></div>
<div style="width:16px; height:41px; float:left"> <img src="images/borde-der-tit-interiores.gif" width="16" height="41" /> </div>
</div>

<div id="contenido-seccion-izq">
 <?php include("incs/registracion.php"); ?>
 </div>
<div id="contenido-seccion-der">
<div id="contenido-submenu">
<?php
if ($_GET[send]=="ok"){
  echo "<br /><div style='text-align:center;'><h3>Muchas gracias por contactarnos</h3></div>";
} else {
?>
  <form id="form2" name="form2" method="post" action="contacto_envio.php">
    <br />
    <br />
    <table width="398" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
      <td width="91" height="30" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> CUIT:</td>
        <td width="287"><label>
          <input type="text" name="cuit" id="cuit"/>
          </label>
        </td>
      </tr>
      <tr>
      <td width="91" height="30" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> Raz&oacute;n social:</td>
        <td width="287"><label>
          <input type="text" name="razon" id="razon"/>
          </label>
        </td>
      </tr>
      <tr>
      <tr>
      <td width="91" height="30" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> Nombre:</td>
        <td width="287"><label>
          <input type="text" name="nombre" id="nombre" required/>
          </label>
        </td>
      </tr>
      <tr>
        <td height="30" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> Apellido:</td>
        <td><input type="text" name="apellido" id="apellido" required/></td>
      </tr>
      <tr>
        <td height="30" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> E-mail:</td>
        <td><input type="email" name="email" id="email" required/></td>
      </tr>
      <tr>
        <td height="30" valign="top" class="textos_contacto"><img src="images/bullet.gif" width="8" height="8" /> Comentarios:</td>
        <td><textarea name="comentarios" cols="25" rows="5" id="comentarios" style="border:#145074 1px dotted" required></textarea></td>
      </tr>
      <tr>
        <td class="textos_contacto">&nbsp;</td>
        <td><label>
            <br />
            <div align="center">
              <input type="submit" name="enviar" id="enviar" onclick="return checkform();" value="Enviar"  style="width:100px"/>
            </div>
          </label></td>
      </tr>
    </table>
  </form>
<?php
}
?>
</div>
</div>
</div>
 <?php include("incs/pie.html"); ?>
</body>
</html>