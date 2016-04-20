<html>
	<head>
		<title>Detalle de registraci&oacute;n</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/epoch_classes.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.print_element.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<script src="http://maps.google.com/maps?language=es&hl=es&file=api&v=2.95&key={$GOOGLE_MAPS_KEY}" type="text/javascript" charset="ISO-8859-1" id="scriptlento"></script>

        <link   rel="stylesheet"       href="/css/epoch_styles.css"    type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
		<link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />

		<script type="text/javascript">

			function centerPopup(divId){
				var oDiv = $('#'+ divId);

				//var divHeight = oDiv.outerHeight(true);
				//var divWidth  = oDiv.outerWidth(true);
				var divHeight = oDiv.outerHeight();
				var divWidth  = oDiv.outerWidth();
				var windowHeight = $(window).height();
				var windowWidth =  $(window).width();

				oDiv.css({
					'left':  (windowWidth  - divWidth) /2  + $(window).scrollLeft() + 'px',
					'top':   (windowHeight - divHeight) /2 + $(window).scrollTop()  + 'px'
				});

				expand2Window();
			}
			function expand2Window(){

				var myBody = $(window);
				$('#bigscreen').show();
				$('#bigscreen').height( myBody.height() );
				$('#bigscreen').width(  myBody.width() );
				$('#bigscreen').css({
					'top': $(window).scrollTop()  + 'px'
				});

			}

			$(window).resize(function() {
			    if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
				}

			});
			$(window).scroll(function() {
			     if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
			     }
			});

            function cerrar(){
	      $('#bigscreen').css("display","none");
                   $('#div_popup').css("display","none");
                   $('#div_popup_2').css("display","none");
	           $('#div_popup_3').css("display","none");


	}
              function cerraruno(){
	      $('#bigscreen').css("display","none");

	}





        </script>


		{literal}
		<style type="text/css">
			<!--
			#apDiv1 {
				position:relative;
				left:415px;
				top:44px;
				width:378px;
				height:53px;
				z-index:1;
				background-image: url(/imagenes/cabecera_formulario.gif);
				background-repeat: no-repeat;
				padding-top: 30px;
				padding-left: 30px;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
				color: #FFFFFF;
				text-align: left;
			}
			.style1 {color: #A8D8EA}
			-->
		</style>
		{/literal}
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
	</head>
	<body>
<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>


	<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>	<div id="apDiv1">Detalle de registraci&oacute;n<br /></div>
			<div id="contenido-form">
			<br><br>

			<br/>
<!--[if IE]>
		<div id="menu-solapas" style="width:900px;">
{if $USUARIO.ROL == 1}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
{elseif $USUARIO.ROL == 2}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>

				<div class="tabnueva" style="width:170px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>

				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>

				<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/reportes.php">Reportes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/reportes.php">Reportes</a></div>
{/if}
			</div>

<div style="border-bottom:1px solid #5D9E00;width:100%;margin-top:-20px;"></div>
<!--[if !IE]> -->
<div id="menu-solapas">
				{if $USUARIO.ROL == 1}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-right:5px;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
				{elseif $USUARIO.ROL == 2}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:80px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>
					<div style="width: 20px;"></div>
<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				{/if}
			</div>

<div style="height:2px; background-color:#5D9E00;width:100%;"></div>
<![endif]-->
			<br>
				<span class="titulos"><br /></span>
				<!--<div align="right">
					<a href='/operacion/listado.php'><img width="91" height="30" border="0" src="/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/rechazar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_rechazar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/aceptar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_aceptar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a class='btn_imprimir' href='#'><img width="91" height="30" border="0" src="/imagenes/boton_imprimir.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>
				</div>-->
				<br>
`
				<div>

					{if $CAMBIO.ALTA}
					<div>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760" height="30" align='center' bgcolor="#A02020"><b><font color='white'>ALTA</font><b></td></tr>
						</table>
					</div>
					{/if}

					<div>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Establecimiento</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$CAMBIO.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong>{$CAMBIO.DESCRIPCION}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>CAA: </strong>{$CAMBIO.CAA_NUMERO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Vencimiento : </strong>{$CAMBIO.CAA_VENCIMIENTO}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio real</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$CAMBIO.CALLE_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$CAMBIO.NUMERO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$CAMBIO.PISO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$CAMBIO.PROVINCIA_R_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$CAMBIO.LOCALIDAD_R_}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$CAMBIO.CALLE_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$CAMBIO.NUMERO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$CAMBIO.PISO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$CAMBIO.PROVINCIA_C_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$CAMBIO.LOCALIDAD_C_}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nomenclatura Catastral : </strong>{$CAMBIO.NOMENCLATURA_CATASTRAL}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Habilitaciones : </strong>{$CAMBIO.HABILITACIONES}</td></tr>
						</table>
						<br>
					</div>

				{foreach $CAMBIO.PERMISOS as $PERMISO}
					<div style='margin-bottom: 10px'>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Permiso de generaci&oacute;n/operaci&oacute;n</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
						</table>
					</div>
					<br>
					<br>
				{/foreach}

				{foreach $CAMBIO.VEHICULOS as $VEHICULO}
					<div>
						<input type='hidden' id='id' value='{$VEHICULO.ID}'>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Veh&iacute;culo Registrado</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Dominio : </strong>{$VEHICULO.DOMINIO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n  : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Credencial  : </strong>{$VEHICULO.CREDENCIAL_NUMERO} - {$VEHICULO.CREDENCIAL_SERIE}</td></tr>
						</table>
					</div>
					<br>
					<br>
				{/foreach}

				{foreach $CAMBIO.VEHICULOS as $VEHICULO}
					{foreach $VEHICULO.PERMISOS as $PERMISO}
						<div>
							<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
								<tr><td width="760" height="30" bgcolor="#A8D8EA">Permiso de traslado</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Veh&iacute;culo : </strong>{$VEHICULO.DOMINIO}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
							</table>
						</div>
						<br>
						<br>
					{/foreach}
				{/foreach}

				<div align="right">
					<a href='/operacion/cambios_pendientes.php'><img width="91" height="30" border="0" src="/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/rechazar_cambio.php?id={$CAMBIO.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_rechazar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/aceptar_cambio.php?id={$CAMBIO.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_aceptar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
				</div>
			</div>
		</div>
	</body>

	{literal}
	<script>
		$(document).ready(function(){
		});
	</script>
	{/literal}
</html>
