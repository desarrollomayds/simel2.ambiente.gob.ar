<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>registraci&oacute;n - paso 3</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/epoch_classes.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<!--<script type="text/javascript" src="http://maps.google.com/maps?language=es&hl=es&file=api&v=2.95&key={$GOOGLE_MAPS_KEY}" type="text/javascript" charset="ISO-8859-1" id="scriptlento"></script>-->
		 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={$GOOGLE_MAPS_KEY}&sensor=false"></script>

		<link   rel="stylesheet"       href="/css/epoch_styles.css"    type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
        <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />

      <!--[if IE]>
		<link   rel="stylesheet"       href="/css/formularios2.css"     type="text/css" />
      <style>
      #apDiv1{
      top:44px;
      left:415px;

      }
      table{
      text-align:left;
       }

      #div_popup{
      text-align:left;
       }

      </style>
<!--[else]>
<![endif]-->


		{literal}
             <script type="text/javascript">
			var flower = 0;
			function expand2Window(){
				var myBody = $(window);
				$('#bigscreen').show();
				$('#bigscreen').height( myBody.height() );
				$('#bigscreen').width(  myBody.width() );
				$('#bigscreen').css({
					'top': $(window).scrollTop()  + 'px'
				});
			}

			function cerraruno(){
				$('#bigscreen').css("display","none");
			}

            function cerrar(){
					$('#bigscreen').css("display","none");
					$('#div_popup').css("display","none");
					$('#div_popup_2').css("display","none");
					$('#div_popup_3').css("display","none");
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
			})

			function centerPopup(divId){
				var oDiv = $('#'+ divId);
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

        </script>
             		<style>
 #div_popup{
      text-align:left;
       }

#div_popup_2{
      text-align:left;
       }

       #div_popup_3{
      text-align:left;
       }



</style>

		{/literal}
	</head>
	<body style="text-align: center;">
               <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

               <div id="contenedor-form" style="margin-top: 20px;">

           <div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
            <div style="clear: both;">
                <div id="apDiv1" style="top:15px;">Formulario - Paso 3<br /></div>
                    </div>
       <div id="contenido-form" style="margin-top: -19px;">
			<div style="text-align: left" class="titulos">DATOS DE ESTABLECIMIENTOS</div><br /><br />

			<table style="font-size: 11px;"  width="780" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_establecimientos">
				<tr>
					<td bgcolor="#4D90FE" width="" class="invisible">ID</th>
					<td bgcolor="#4D90FE" width="">NOMBRE</th>
					<td bgcolor="#4D90FE" width="">TIPO</th>
					<td bgcolor="#4D90FE" width="">ACTIVIDAD PRINCIPAL</th>
					<td bgcolor="#4D90FE" width="">CALLE</th>
					<td bgcolor="#4D90FE" width="">NUMERO</th>
					<td bgcolor="#4D90FE" width="">PISO</th>
					<td bgcolor="#4D90FE" width="">PROVINCIA</th>
					<td bgcolor="#4D90FE" width="">LOCALIDAD</th>
					<td bgcolor="#4D90FE" width="" align="center" class="td">DOMINIOS</td>
					<td bgcolor="#4D90FE" width="" align="center" class="td">PERMISOS</td>
					<td bgcolor="#4D90FE" width="" align="center" class="td">EDITAR</td>
					<td bgcolor="#4D90FE" width="" align="center">BORRAR</td>
				</tr>

				{foreach $ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{if $ESTABLECIMIENTO@iteration is even by 1}
						{assign var="COLOR_LINEA" value="#EAEAE5"}
					{else}
						{assign var="COLOR_LINEA" value="#F7F7F5"}
					{/if}
				<tr>
						<td bgcolor="{$COLOR_LINEA}" width="" id='id' class='invisible'>{$ESTABLECIMIENTO.ID}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='nombre'>{$ESTABLECIMIENTO.NOMBRE}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='tipo'>{$ESTABLECIMIENTO.TIPO_}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='actividad'>{$ESTABLECIMIENTO.ACTIVIDAD}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='calle'>{$ESTABLECIMIENTO.CALLE_R}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='numero'>{$ESTABLECIMIENTO.NUMERO_R}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='piso'>{$ESTABLECIMIENTO.PISO_R}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='provincia'>{$ESTABLECIMIENTO.PROVINCIA_R_}</td>
						<td bgcolor="{$COLOR_LINEA}" width="" id='localidad'>{$ESTABLECIMIENTO.LOCALIDAD_R_}</td>
						<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' id='btn_vehiculos_establecimiento' class='btn_vehiculos_establecimiento {if $ESTABLECIMIENTO.TIPO_ != 'transporte'}invisible{/if}'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src="/imagenes/editar.png" width="24" height="22" /></a></td>
						<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' id='btn_permisos_establecimiento'  class='btn_permisos_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src="/imagenes/editar.png" width="24" height="22" /></a></td>
						<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' class='btn_editar_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src="/imagenes/editar.png" width="24" height="22" /></a></td>
						<td align="center" bgcolor="{$COLOR_LINEA}"><a href='#' class='btn_borrar_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src="/imagenes/borrar.png" width="24" height="22" /></a></td>
					</tr>
				{/foreach}
			</table>

			<table width="780" border="0" cellpadding="5" cellspacing="0" class="tabla">
				<tr>
                                    <td colspan="7" bgcolor="#EAEAE5"><div align="right"><img class="hand" src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_establecimiento' /></div></td>
				</tr>
			</table>

			<table width="780" border="0" cellpadding="5" cellspacing="0">
				<tr id='sumario_errores_paso_3' class='invisible'>
					<td colspan="2" align="left" color="red"></td>
				</tr>
			</table>

            <div align="right"><br /><br />
                <a id='btn_anterior' href="paso_2.php"><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" class="hand" src="/imagenes/boton_anterior.gif"  width="91" height="30" border="0" /></a>
                <a id='btn_siguiente'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" class="hand" src="/imagenes/boton_siguiente.gif" width="91" height="30" border="0" /></a>
		</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

		<div id='div_popup_2' class='invisible'>
		</div>

		<div id='div_popup_3' class='invisible'>
		</div>
	</body>

	{literal}
	<script type="text/javascript">
		var registro_actual = null;
		var colores         = new Array();

		colores['#A8D8EA'] = '#F7F7F5';
		colores['#EAEAE5'] = '#F7F7F5';
		colores['#F7F7F5'] = '#EAEAE5';

		//establecimientos
		function modificar_establecimiento(establecimiento){
			registro_actual.find('#nombre').html(establecimiento['NOMBRE']);
			registro_actual.find('#tipo').html(establecimiento['TIPO_']);
			registro_actual.find('#actividad').html(establecimiento['ACTIVIDAD']);
			registro_actual.find('#calle').html(establecimiento['CALLE_R']);
			registro_actual.find('#numero').html(establecimiento['NUMERO_R']);
			registro_actual.find('#piso').html(establecimiento['PISO_R']);
			registro_actual.find('#provincia').html(establecimiento['PROVINCIA_R_']);
			registro_actual.find('#localidad').html(establecimiento['LOCALIDAD_R_']);

			if(establecimiento['TIPO_'] == 'transporte'){
				registro_actual.find('#btn_vehiculos_establecimiento').removeClass("invisible");
			}else{
				registro_actual.find('#btn_vehiculos_establecimiento').addClass("invisible");
			}

			registro_actual = null;
		}

		function agregar_establecimiento(establecimiento){
			color = colores[$('#lista_establecimientos> tbody:last').find("td:last").attr("bgcolor")];
			if(color == undefined)
				color = '#F7F7F5';

			if(establecimiento['TIPO_'] == 'transporte'){
				visibilidad_vehiculos = '';
			}else{
				visibilidad_vehiculos = 'invisible';
			}

			datos = "\
			<tr>\
				<td bgcolor='" + color + "' class='invisible' id='id'>" + establecimiento["ID"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='nombre'>" + establecimiento["NOMBRE"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='tipo'>" + establecimiento["TIPO_"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='actividad'>" + establecimiento["ACTIVIDAD"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='calle'>" + establecimiento["CALLE_R"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='numero'>" + establecimiento["NUMERO_R"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='piso'>" + establecimiento["PISO_R"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='provincia'>" + establecimiento["PROVINCIA_R_"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='localidad'>" + establecimiento["LOCALIDAD_R_"] + "</td>\
				<td align='center' bgcolor='" + color + "' class='td'><a href='#' id='btn_vehiculos_establecimiento' class='btn_vehiculos_establecimiento " + visibilidad_vehiculos + "'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/editar.png' width='24' height='22' /></a></td>\
				<td align='center' bgcolor='" + color + "' class='td'><a href='#' id='btn_permisos_establecimiento' class='btn_permisos_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/editar.png' width='24' height='22' /></a></td>\
				<td align='center' bgcolor='" + color + "' class='td'><a href='#' class='btn_editar_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/editar.png' width='24' height='22' /></a></td>\
				<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_establecimiento'><img style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;'src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
			</tr>";

			$('#lista_establecimientos> tbody:last').append(datos);
		}

		$('.btn_borrar_establecimiento').live('click', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "POST",
			   url: "/registracion/establecimiento.php",
			   data: {accion : "baja", id : registro_actual.find('#id').html()},
			   dataType: "text json",
			   success: function(retorno){
					if(retorno['estado'] != 0){
						alert(retorno['errores']['baja']);
					}else{
						registro_actual.remove();
					}
			   }
			 });
		});

		$('.btn_permisos_establecimiento').live('click', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "GET",
			   url: "/registracion/permisos_establecimiento.php?id=" + registro_actual.find('#id').html(),
			   dataType: "html",
			   success: function(msg){

				$('#div_popup').html(msg);
				$('#div_popup').show();
				$('#bigscreen').css("display","block");
                                $('#div_popup').css("width","700");
				centerPopup('div_popup');

			   }
			 });
		});

		$('.btn_vehiculos_establecimiento').live('click', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "GET",
			   url: "/registracion/vehiculos_establecimiento.php?id=" + registro_actual.find('#id').html(),
			   dataType: "html",
			   success: function(msg){
				$('#div_popup').html(msg);
				$('#div_popup').show();
				$('#bigscreen').css("display","block");
                                $('#div_popup').css("width","600");
				centerPopup('div_popup');

			   }
			 });
		});

		$('.btn_editar_establecimiento').live('click', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "GET",
			   url: "/registracion/establecimiento.php?id=" + registro_actual.find('#id').html(),
			   dataType: "html",
			   success: function(msg){
				$('#div_popup').html(msg);
				$('#div_popup').show();
                                $('#div_popup').css("width","500");
				$('#bigscreen').css("display","block");
				centerPopup('div_popup');
			   }
			 });
		});

		$('#btn_agregar_establecimiento').click(function() {
			$.ajax({
			   type: "GET",
			   url: "/registracion/establecimiento.php",
			   dataType: "html",
			   success: function(msg){
				$('#div_popup').html(msg);
				$('#div_popup').show();
				$('#bigscreen').css("display","block");
				centerPopup('div_popup');

			   }
			 });
		})
		//establecimientos

		$('#btn_siguiente').click(function() {
			var campos  = [	'establecimientos', 'permisos_establecimientos', 'vehiculos', 'permisos_vehiculos' ];

			$.ajax({
				type: "POST",
				url: "/registracion/paso_3.php",
				data: {	},
				dataType: "text json",
				success: function(retorno){
											if(retorno['estado'] == 0){
												window.location.replace(retorno['siguiente']);
											}else{
												texto_errores = '';
												for(campo in campos){
													campo = campos[campo];

													if(retorno['errores'][campo] != null){
														if(retorno['errores'][campo] instanceof Array){
															for(iderror in retorno['errores'][campo]){
																texto_errores = texto_errores + retorno['errores'][campo][iderror] + '<br>';
															}
														}else{
															texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
														}
														//$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
														//$('#' + campo).addClass('error_de_carga');
													}else{
														//$('#' + campo).removeClass('error_de_carga');
													}

													if(texto_errores != ''){
														$('#sumario_errores_paso_3 td:first').html(texto_errores);
														$('#sumario_errores_paso_3').show();
														;
													}else{
														$('#sumario_errores_paso_3').hide();
													}
												}
											}
										  }
			 });
		})
	</script>
	{/literal}
</html>
