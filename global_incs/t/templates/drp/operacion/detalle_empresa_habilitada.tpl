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
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
		{/literal}
<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->

	</head>
	<body>
<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>


	<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">Detalle de registraci&oacute;n<br /></div>
			<div id="contenido-form">
			<br><br><br>
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

				<br>
`
				<div>
					<input type='hidden' id='id' value='{$EMPRESA.ID}'>
					<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
						<tr>
							<td width="760" height="30" bgcolor="#A8D8EA" style="font-size:12px;">DATOS DE LA EMPRESA</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$EMPRESA.CUIT}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Roles : </strong>
								{if $EMPRESA.ROLES.GENERADOR}
								Generador
								{/if}
								{if $EMPRESA.ROLES.TRANSPORTISTA}
								Transportista
								{/if}
								{if $EMPRESA.ROLES.OPERADOR}
								Operador
								{/if}
							</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$EMPRESA.NOMBRE}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Fec. Ini. Act : </strong>{$EMPRESA.FECHA_INICIO_ACT}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio real</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_R_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_R_}</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio legal</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_L_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_L_}</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_C_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_C_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero Telef&oacute;nico : </strong>{$EMPRESA.NUMERO_TELEFONICO}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Direcci&oacute;n de Email: </strong>{$EMPRESA.DIRECCION_EMAIL}</td>
						</tr>
					</table>
				</div>
				<br>
				<br>

				{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
					<div>
						<input type='hidden' id='id' value='{$REPRESENTANTE.ID}'>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Representante Legal</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
						</table>
					</div>
				<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
					<div>
						<input type='hidden' id='id' value='{$REPRESENTANTE.ID}'>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Representante T&eacute;cnico</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cargo : </strong>{$REPRESENTANTE.CARGO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
						</table>
					</div>
<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					<div>
						<input type='hidden' id='id' value='{$ESTABLECIMIENTO.ID}'>
						<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">Establecimiento</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Actividad : </strong>{$ESTABLECIMIENTO.ACTIVIDAD_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong>{$ESTABLECIMIENTO.DESCRIPCION}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio real</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}</td></tr>

							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nomenclatura Catastral : </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Habilitaciones : </strong>{$ESTABLECIMIENTO.HABILITACIONES}</td></tr>
						</table>
						<table width="770" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
							<tr>
								<td align="right" style='width:100%'>&nbsp;</td>
								<td align="right"><input type="button" id="" class="btn_blanquear_contrasenia_establecimiento ui-el-minibutton hand" value="Blanquear contrase&ntilde;a de establecimiento"></td>
							</tr>
						</table>
					</div>
<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
						<div style='margin-bottom: 10px'>
							<input type='hidden' id='id_establecimiento' value='{$ESTABLECIMIENTO.ID}'>
							<input type='hidden' id='id_permiso' value='{$PERMISO.ID}'>
							<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
								<tr><td width="760" height="30" bgcolor="#A8D8EA">Permiso de generaci&oacute;n/operaci&oacute;n</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
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


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						<div>
							<input type='hidden' id='id' value='{$VEHICULO.ID}'>
							<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
								<tr><td width="760" height="30" bgcolor="#A8D8EA">Veh&iacute;culo Registrado</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento  : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Dominio : </strong>{$VEHICULO.DOMINIO}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n  : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Credencial  : </strong>{$VEHICULO.CREDENCIAL_NUMERO} - {$VEHICULO.CREDENCIAL_SERIE}</td></tr>
							</table>
						</div>
<br>
				<br>
					{/foreach}
				{/foreach}



				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						{foreach $VEHICULO.PERMISOS as $PERMISO}
							<div>
								<input type='hidden' id='id_vehiculo' value='{$VEHICULO.ID}'>
								<input type='hidden' id='id_permiso' value='{$PERMISO.ID}'>
								<table width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
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
				{/foreach}

				<div align="right">
					<a href='/operacion/empresas_habilitadas.php'><img width="91" height="30" border="0" src="/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
				</div>
			</div>
		</div>
	</body>

	{literal}
	<script>
		$(document).ready(function(){
			var registro_actual;

			//establecimiento
			$('.btn_blanquear_contrasenia_establecimiento').live('click', function() {
				registro_actual = $(this).parent().parent().parent().parent().parent();

				$.ajax({
				   type: "POST",
				   url: "/operacion/blanquear_contrasenia_establecimiento.php",
				   data: {id : registro_actual.find('#id').val()},
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													alert("Contrasenia blanqueada con exito.");
												}else{
													alert(retorno['errores']['general']);
												}
				   }
				 });
			});
			//establecimiento
		});
	</script>
	{/literal}
</html>
