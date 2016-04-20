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
<div id="contenido-top"><a href="<? echo mel::getBaseMelPath() ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','images/btn-ingresar-sistema-on.gif',1)"><img src="images/btn-ingresar-sistema.gif" name="Image18" width="190" height="42" border="0" id="Image18" /></a></div>



</div>
<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image18','','images/btn-ingresar-sistema-on.gif',1)"></a>
<div id="contenedor-slide">
<div id="slide">
<div id="contenedor-menu">
    <div id="logo" style="width: 100%;float: right;height: 75px;"><img style="float: left;" src="images/LogoDRP.png" height="73" /><img style="float: right;" src="images/logoDRP.gif" /></div>
    <div id="menu" style="margin-left: 285px;background-color: transparent;margin-top: 0;">
        <ul id="nav" style="margin-left:64px;">
	<li class="seleccionado"><a href="index.php">Inicio</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="generadores.php">Generadores</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="transportistas.php">Transportistas</a></li>
    <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="operadores.php">Operadores</a></li>
      <li><img src="images/separador-boton.gif" vspace="5" /></li>
	<li><a href="contacto.php">Contacto</a></li>
	  <li><img src="images/separador-boton.gif" vspace="5" /></li>
  	<li><a href="soporte.php">Soporte</a></li>
</ul>
</div>
</div>
<div  style="float:right;margin-top: 121px;" id="borde"><img src="images/borde-slide.gif" width="20" height="103" /> </div>
<div class="main_view" >
    <div class="window" >
        <div class="image_reel">
            <a href="#"><img src="images/reel_1.jpg" alt="" /></a>
        <a href="#"><img src="images/reel_2.jpg" alt="" /></a><a href="#"><img src="images/reel_3.jpg" alt="" /></a><a href="#"><img src="images/reel_4.jpg" alt="" /></a>      </div>
    </div>
    <div class="paging">
        <a href="#" rel="1">1</a>
        <a href="#" rel="2">2</a>
        <a href="#" rel="3">3</a>            </div>

        <div>

            <div class="texto" style="bottom: 97px;"><a href="<? echo mel::getBaseMelPath() ?>">SOLICITUD DE ACCESO AL SISTEMA MANIFIESTOS DRP</a></div>

        </div>
</div>

<script type="text/javascript" src="../javascript/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {



	//Set Default State of each portfolio piece

	$(".paging").show();

	$(".paging a:first").addClass("active");



	//Get size of images, how many there are, then determin the size of the image reel.

	var imageWidth = $(".window").width();

	var imageSum = $(".image_reel img").size();

	var imageReelWidth = imageWidth * imageSum;



	//Adjust the image reel to its new size

	$(".image_reel").css({'width' : imageReelWidth});



	//Paging + Slider Function

	rotate = function(){

		var triggerID = $active.attr("rel") - 1; //Get number of times to slide

		var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide



		$(".paging a").removeClass('active'); //Remove all active class

		$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)



		//Slider Animation

		$(".image_reel").animate({

			left: -image_reelPosition

		}, 500 );



	};



	//Rotation + Timing Event

	rotateSwitch = function(){

		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds

			$active = $('.paging a.active').next();

			if ( $active.length === 0) { //If paging reaches the end...

				$active = $('.paging a:first'); //go back to first

			}

			rotate(); //Trigger the paging and slider function

		}, 3000); //Timer speed in milliseconds (3 seconds)

	};



	rotateSwitch(); //Run function on launch



	//On Hover

	$(".image_reel a").hover(function() {

		clearInterval(play); //Stop the rotation

	}, function() {

		rotateSwitch(); //Resume rotation

	});



	//On Click

	$(".paging a").click(function() {

		$active = $(this); //Activate the clicked paging

		//Reset Timer

		clearInterval(play); //Stop the rotation

		rotate(); //Trigger rotation immediately

		rotateSwitch(); // Resume rotation

		return false; //Prevent browser jump to link anchor

	});



});

</script>
</div>
</div>
<div id="contenedor-info">
<div id="contenido-izq">
<div class="estructura">
<div class="estructura-tit"><img src="images/acerca.gif" width="191" height="159" /></div>
<div class="estructura-cont">
La Direcci&oacute;n de Residuos Peligrosos a cargo del Registro Nacional de Generadores y Operadores de Residuos Peligrosos (Ley N&ordm;24.051), tiene entre sus acciones ejecutar programas y proyectos incorporando tecnolog&iacute;as y herramientas desde el punto de vista ambiental que permitan realizar eficazmente y de manera m&aacute;s &aacute;gil y simple, todo el proceso de fiscalizaci&oacute;n en la generaci&oacute;n, manipulaci&oacute;n, transporte, tratamiento y disposici&oacute;n final de residuos peligrosos.<br />
<p>En  tal sentido, la Direcci&oacute;n de residuos Peligrosos (DRP), pone a disposici&oacute;n el  uso del sistema inform&aacute;tico &ldquo;manifiestosdrp&rdquo; tendiendo a reducir tiempos de  respuestas, uso de papel y soporte manuscrito, aumentando el soporte  electr&oacute;nico y servicios de comunicaci&oacute;n entre esta Direcci&oacute;n y los actores de  los residuos regulados en l&iacute;nea.</p>
<div style="float:right;">
      <span class="resaltar">Ver M&aacute;s:</span> <a href="http://www.ambiente.gov.ar/?idseccion=22" class="boton-general">http://www.ambiente.gov.ar/?idseccion=22</a>
</div>
</div>
</div>
<br style="clear:both" />
<div class="separador"> </div>


<div class="estructura">
<div class="estructura-tit"><img src="images/sistema.gif" /></div>
<!--
<div class="estructura-cont" style="overflow:auto">
-->
<div class="estructura-cont">
El  sistema ManifiestosDRP, tiene por objeto asentar la generaci&oacute;n, operaci&oacute;n y  transporte de los residuos peligrosos dentro del territorio nacional.<br />
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
</div>
<br style="clear:both" />
<div class="separador"> </div>


</div>
<div id="contenido-der">
 <?php include("incs/registracion.php"); ?>

 <?php include("incs/noticias-generales.php"); ?>
</div>





</div>
<?php include("incs/pie.html"); ?>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

<script>
var html = "";
html += '<p>La Direcci&oacute;n de Residuos Peligrosos, dependiente de la Subsecretar&iacute;a de Control y Fiscalizaci&oacute;n Ambiental y Prevenci&oacute;n de la Contaminaci&oacute;n, de la Secretar&iacute;a de Ambiente y Desarrollo Sustentable de la Naci&oacute;n te acerca una nueva herramienta  para mejorar la gesti&oacute;n, trazabilidad y eficiencia de los procesos relacionados al transporte y tratamiento de Residuos Peligrosos.<p>';
html += '<p>A partir del 1ro de Octubre de 2015, los Generadores, Transportistas y Operadores de residuos peligrosos van a poder utilizar el sistema de MANIFIESTO EN LINEA que les permitir&aacute; agilizar:</p>';
html += '-	Gesti&oacute;n de adquisici&oacute;n, uso, seguimiento y transmisi&oacute;n de manifiestos,<br>';
html += '-	Emisi&oacute;n y transmisi&oacute;n de constancias de recepci&oacute;n y certificados de disposici&oacute;n,<br>';
html += '-	Comunicaci&oacute;n entre las partes mediante sistema de alertas y avisos,<br>';
html += '-	Generaci&oacute;n, c&aacute;lculo autom&aacute;tico y pago electr&oacute;nico de TAA (tasa ambiental anual)*<br>';
html += '<small>*disponible a partir del primer a&ntilde;o de ejercicio realizado a trav&eacute;s del sistema</small>';
html += '<br><br>';
html += '<p>Menos papel, menos tiempo, menos problemas.</p>';
html += '<p>M&aacute;s gesti&oacute;n.</p>';
html += '<p>A partir del 9 de septiembre se habilitar&aacute; el proceso de registro para uso del sistema.</p>';
html += '<p>&iquest;Qu&eacute; necesito para registrarme? Contar con un n&uacute;mero de expediente, un n&uacute;mero de CUIT v&aacute;lido registrado en AFIP y para el caso de operadores y transportistas un CAA vigente. En caso de no cumplir con alguno de los requisitos ac&eacute;rcate a nuestra oficina para iniciar el tr&aacute;mite que corresponda.</p>';
html += '<p>La Direcci&oacute;n de Residuos Peligrosos continuar&aacute; trabajando para agregar m&aacute;s funcionalidades y opciones.</p>';
html += '<p>Cualquier duda o consulta comunicarse por correo electr&oacute;nico a drp@ambiente.gob.ar</p>';

BootstrapDialog.show({
            title: 'Bienvenidos a manifiestos en l&iacute;nea',
            message: html,
            closable: false
});
</script>

</body>
</html>

