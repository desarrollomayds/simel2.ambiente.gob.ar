<html>
	<head>
		<title>registraci&oacute;n - paso 2</title>
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
        <link   rel="stylesheet"       href="/css/interior.css"        type="text/css" />

<!--[if IE]>
		<link   rel="stylesheet"       href="/css/formularios2.css"     type="text/css" />
<!--[else]>
<![endif]-->

		{literal}
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
		{/literal}
	</head>
	<body style="text-align: center;" >
        <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

	<div id="contenedor-form" style="margin-top: 20px;">
                  <div style="clear: both;">
                   <div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>
<div id="apDiv1">Formulario - Paso 2<br /></div>
                    </div>

                <div id="contenido-form">

			<form id='form_datos_empresa' action='paso_2.php' method='POST'>
				<div class="titulos" style="text-align: left;">  LA EMPRESA TIENE EXPEDIENTE DE: </div><br /><br />

				<div id='roles' style="text-align: left;">
                                   <b>Elija la opci&oacute;n que corresponde a su empresa:</b>
					<input type='checkbox' name='rol_generador'     id='rol_generador'     value='1' checked disabled='1'> Generador
					<input type='checkbox' name='rol_transportista' id='rol_transportista' value='1' disabled='1'> Transportista
					<input type='checkbox' name='rol_operador'      id='rol_operador'      value='1' disabled='1'> Operador
				</div>
				<br /><br />

				<div class="titulos" style="color:black; text-align: left;width:750px;background-color:#4D90FE;padding:10px ">DATOS DE LA EMPRESA</div>

				<div style=" background-color:#EAEAE5; padding:5px">
					<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n Social:</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='{$EMPRESA.NOMBRE}' size='35'/></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio de actividades :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='fecha_inicio_act' id='fecha_inicio_act' value='{$EMPRESA.FECHA_INICIO_ACT}' size='35' class='{if $ERRORES.FECHA_INICIO_ACT}error_de_carga{/if}' readonly="true"><input type='button' value='...' id='btn_cal_fecha_inicio_act'></td>
						</tr>

						<tr>
							<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO REAL</td>
							<td></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_r' id='calle_r' value='{$EMPRESA.CALLE_R}' size='35' class='{if $ERRORES.CALLE_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_r' id='numero_r' value='{$EMPRESA.NUMERO_R}' size='35' class='{if $ERRORES.NUMERO_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_r' id='piso_r' value='{$EMPRESA.PISO_R}' size='35' class='{if $ERRORES.PISO_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_r' id='oficina_r' value='{$EMPRESA.OFICINA_R}' size='35' class='{if $ERRORES.OFICINA_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='provincia_r' id='provincia_r'  class='{if $ERRORES.PROVINCIA_R}error_de_carga{/if}'>
									{foreach $PROVINCIAS as $PROVINCIA}
										<option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='localidad_r' id='localidad_r'  class='{if $ERRORES.LOCALIDAD_R}error_de_carga{/if}'>
									{foreach $LOCALIDADES as $LOCALIDAD}
										<option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;"  class="titulos"></td>
							<td>
								<!--<input type="button"  class="ui-el-minibutton" id="btn_activar_mapa_r" value="UBICAR EN MAPA">-->
								<input type="text" name="latitud_r"  id="latitud_r"  value="{$EMPRESA.LATITUD_R}"  readonly='true'>
								<input type="text" name="longitud_r" id="longitud_r" value="{$EMPRESA.LONGITUD_R}" readonly='true'>
								<div id="map" style="width: 300px; height: 300px"></div>
							</td>
						</tr>

						<tr>
							<td align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
                                                       <td></td>
						</tr>

						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_c' id='calle_c' value='{$EMPRESA.CALLE_C}' size='35' class='{if $ERRORES.CALLE_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_c' id='numero_c' value='{$EMPRESA.NUMERO_C}' size='35' class='{if $ERRORES.NUMERO_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_c' id='piso_c' value='{$EMPRESA.PISO_C}' size='35' class='{if $ERRORES.PISO_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_c' id='oficina_c' value='{$EMPRESA.OFICINA_C}' size='35' class='{if $ERRORES.OFICINA_C}error_de_carga{/if}'></td>
						</tr>
						<tr class='invisible'>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='__provincia_c' id='provincia_c'  class='{if $ERRORES.PROVINCIA_C}error_de_carga{/if}'>
									{foreach $PROVINCIAS as $PROVINCIA}
										<option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='localidad_c' id='localidad_c'  class='{if $ERRORES.LOCALIDAD_C}error_de_carga{/if}'>
									{foreach $LOCALIDADES_C as $LOCALIDAD}
										<option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_C == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
									{/foreach}
								</select>
							</td>
						</tr>

						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero Telef&oacute;nico :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_telefonico' id='numero_telefonico' value='{$EMPRESA.NUMERO_TELEFONICO}' size='35' class='txt {if $ERRORES.NUMERO_TELEFONICO}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Direcci&oacute;n de Email :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email' value='{$EMPRESA.DIRECCION_EMAIL}' size='35' class='txt {if $ERRORES.DIRECCION_EMAIL}error_de_carga{/if}'></td>
						</tr>

						<tr id='sumario_errores_paso_2' class='invisible'>
							<td colspan="2" align="left" color="red"></td>
						</tr>

						{if $ERRORES.ROLES             or $ERRORES.NOMBRE           or $ERRORES.FECHA_INICIO_ACT or
							$ERRORES.CALLE             or $ERRORES.NUMERO           or $ERRORES.PISO             or $ERRORES.OFICINA          or
							$ERRORES.PROVINCIA         or $ERRORES.LOCALIDAD        or
							$ERRORES.NUMERO_TELEFONICO or $ERRORES.DIRECCION_EMAIL  }
						<tr>
							<td colspan="2" align="left">
								{if $ERRORES.ROLES}{$ERRORES.ROLES}<br>{/if}
								{if $ERRORES.NOMBRE}{$ERRORES.NOMBRE}<br>{/if}
								{if $ERRORES.FECHA_INICIO_ACT}{$ERRORES.FECHA_INICIO_ACT}<br>{/if}
								{if $ERRORES.CALLE}{$ERRORES.CALLE}<br>{/if}
								{if $ERRORES.NUMERO}{$ERRORES.NUMERO}<br>{/if}
								{if $ERRORES.PISO}{$ERRORES.PISO}<br>{/if}
								{if $ERRORES.OFICINA}{$ERRORES.OFICINA}<br>{/if}
								{if $ERRORES.PROVINCIA}{$ERRORES.PROVINCIA}<br>{/if}
								{if $ERRORES.LOCALIDAD}{$ERRORES.LOCALIDAD}<br>{/if}
								{if $ERRORES.NUMERO_TELEFONICO}{$ERRORES.NUMERO_TELEFONICO}<br>{/if}
								{if $ERRORES.DIRECCION_EMAIL}{$ERRORES.DIRECCION_EMAIL}<br>{/if}
							</td>
						</tr>
						{/if}

					</table>
				</div>
			</form>


			<div align="right"><br /><br />
				<a id='btn_anterior' href="paso_1.php"><img src="/imagenes/boton_anterior.gif"  width="91" height="30" border="0" /></a>
				<a id='btn_siguiente' ><img src="/imagenes/boton_siguiente.gif" width="91" height="30" border="0" /></a>
			</div>
		</div>


		<div id='div_popup' class='invisible'>
		</div>

		<div id='div_popup_2' class='invisible'>
		</div>

	</body>
	{literal}
	<script type="text/javascript">
		var fecha_inicio_act_instance = null;
		var registro_actual           = null;
		var colores                   = new Array();

		colores['#A8D8EA'] = '#F7F7F5';
		colores['#EAEAE5'] = '#F7F7F5';
		colores['#F7F7F5'] = '#EAEAE5';

		//localidades
		function actualizar_localidades_r(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
				$('#localidad_r').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_r').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_r').val($('#localidad_r option:first').val());
			});
		}

		function actualizar_localidades_l(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_l").val()}, function(json){
				$('#localidad_l').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_l').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_l').val($('#localidad_l option:first').val());
			});
		}

		function actualizar_localidades_c(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_c").val()}, function(json){
				$('#localidad_c').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_c').val($('#localidad_c option:first').val());
			});
		}
		//localidades

		$(function(){
			//$('#bigscreen').center();
			//$('#div_popup').center();
			//$('#div_popup_2').center();
			//$('#div_popup_3').center();

			//datos geograficos
			$('#btn_activar_mapa_r').click(function() {
				$.ajax({
				   type: "POST",
				   url: "/operacion/operador/alta_temprana/mapa.php",
				   data: {
							campo_latitud    : 'latitud_r',
							campo_longitud   : 'longitud_r',
							calle_inicio     : $("#calle_r").val(),
							numero_inicio    : $("#numero_r").val(),
							provincia_inicio : $("#provincia_r").val(),
							localidad_inicio : $("#localidad_r").val()
						},
				   dataType: "html",
				   success: function(msg){
				    $("#div_popup_2").addClass('div_mapa');
					$('#div_popup_2').html(msg);
					$('#div_popup_2').show();
					$('#bigscreen').show();
					//centerPopup('div_popup_2');
				   }
				 });
			})
			//datos geograficos


			//datos empresa
			$(function(){
				$('#numero_r').filter_input({regex:'[0-9]'});
				$('#piso_r').filter_input({regex:'[0-9]'});
				$('#numero_c').filter_input({regex:'[0-9]'});
				$('#piso_c').filter_input({regex:'[0-9]'});
				$('#numero_telefonico').filter_input({regex:'[0-9]'});

				fecha_inicio_act_instance = new Epoch('fecha_inicio_act_container', 'popup', document.getElementById('fecha_inicio_act'), 0);
			});

			$('#btn_cal_fecha_inicio_act').click(function() {
				fecha_inicio_act_instance.toggle();
			})

	/*
			$('#btn_siguiente').click(function() {
				$('#form_datos_empresa').submit();
			})
	*/
			$('#provincia_r').change(function() {
				actualizar_localidades_r();
			})


			$('#localidad_r').change(function() {
				$.ajax({
				   type: "POST",
				   url: "/servicios/punto_inicio.php",
				   data: {
							calle     : $("#calle_r").val(),
							numero    : $("#numero_r").val(),
							provincia : $("#provincia_r").val(),
							localidad : $("#localidad_r").val()
						},
				   dataType: "text",
				   success: function(punto_inicio){
												    codeAddress(punto_inicio);
				   }
				 });
			})

			$('#provincia_c').change(function() {
				actualizar_localidades_c();
			})
			//datos empresa


			$('#btn_siguiente').click(function() {
				var campos  = [	'roles', 'nombre', 'fecha_inicio_act',
								'calle_r', 'numero_r', 'piso_r', 'oficina_r', 'provincia_r', 'localidad_r', 'latitud_r', 'longitud_r',
								'calle_c', 'numero_c', 'piso_c', 'oficina_c', 'provincia_c', 'localidad_c',
								'numero_telefonico', 'direccion_email'];

				$.ajax({
					type: "POST",
					url: "/operacion/operador/alta_temprana/paso_2.php",
					data:	{	nombre            : $("#nombre").val(),
							fecha_inicio_act  : $("#fecha_inicio_act").val(),

							calle_r           : $("#calle_r").val(),
							numero_r          : $("#numero_r").val(),
							piso_r            : $("#piso_r").val(),
							oficina_r         : $("#oficina_r").val(),
							provincia_r       : $("#provincia_r").val(),
							localidad_r       : $("#localidad_r").val(),

							latitud_r         : $("#latitud_r").val(),
							longitud_r        : $("#longitud_r").val(),

							calle_c           : $("#calle_c").val(),
							numero_c          : $("#numero_c").val(),
							piso_c            : $("#piso_c").val(),
							oficina_c         : $("#oficina_c").val(),
							provincia_c       : $("#provincia_c").val(),
							localidad_c       : $("#localidad_c").val(),

							numero_telefonico : $("#numero_telefonico").val(),
							direccion_email   : $("#direccion_email").val()
						},
					dataType: "text json",
					success: function(retorno){
												if(retorno['estado'] == 0){
													window.location.replace(retorno['siguiente']);
												}else{
													texto_errores = '';
													for(campo in campos){
														campo = campos[campo];

														if(retorno['errores'][campo] != null){
															texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
															$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
															$('#' + campo).addClass('error_de_carga');
														}else{
															$('#' + campo).removeClass('error_de_carga');
														}

														if(texto_errores != ''){
															$('#sumario_errores_paso_2 td:first').html(texto_errores);
															$('#sumario_errores_paso_2').show();
															;
														}else{
															$('#sumario_errores_paso_2').hide();
														}
													}
												}
											  }
				 });
			})


		});
                  function initialize() {
                     geocoder = new google.maps.Geocoder();

                      var mapOptions = {
                        center: new google.maps.LatLng(-34.60828,-58.3708375),
                        zoom: 14,
                        mapTypeControl: true,
                        panControl: true

                      };
                       $("#latitud_r").val(-34.60828);
                         $("#longitud_r").val(-58.3708375);

                      map = new google.maps.Map(document.getElementById("map"), mapOptions);


                      marker = new google.maps.Marker({
                        position: map.getCenter(),
                        map: map,
                        draggable:true


                      });


                     google.maps.event.addListener(map, 'click', function(e) {
                         map.setCenter(e.latLng);
                         map.panTo(e.latLng);
                         marker.setPosition(e.latLng);
                         $("#latitud_r").val(e.latLng.lat());
                         $("#longitud_r").val(e.latLng.lng());
                      });
                    }

                   google.maps.event.addDomListener(window, 'load', initialize);

                      function codeAddress(address) {

                    geocoder.geocode( { 'address': address}, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                        var pos = marker.getPosition();
                        $("#latitud_r").val(pos.lat());
                         $("#longitud_r").val(pos.lng());
                      } else {
                        alert("Geocode no pudo ubicar la direccion por el siguiente error: " + status);
                      }
                    });
                  }
	</script>
	{/literal}
</html>

