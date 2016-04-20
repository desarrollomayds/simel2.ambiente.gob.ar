
<div style=" background-color:#EAEAE5; padding:1px;height: 500px;overflow: auto;">
	<input type='hidden' name='establecimiento_usuario_id' id='establecimiento_usuario_id' value='{$USUARIO_ID}' size='50'>
	<input type='hidden' name='establecimiento_accion'     id='establecimiento_accion'     value='{$ACCION}'     size='50'>
	<input type='hidden' name='establecimiento_id'         id='establecimiento_id'         value='{$ESTABLECIMIENTO.ID}'  size='50'>
	<input type='hidden' name='establecimiento_usuario'    id='establecimiento_usuario'    value='{if $ESTABLECIMIENTO.USUARIO}{$ESTABLECIMIENTO.USUARIO}{else}{$EMPRESA.CUIT}/{$USUARIO_ID}{/if}' size='30' readonly='t'>

	<table width="480" style="font-size: 11px" border="0" cellspacing="0" cellpadding="5">
	 <tr>
                <td colspan="2" height="25" align="center" class="titulos" bordercolor="#E9F3F3" style="color:white;background-color:#4D90FE;"><div style="float: left;">AGREGAR ESTABLECIMIENTO</div><a id='btn_cerrar' style="float: right;" href='#'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/boton_cerrar.png" width="24" height="22" /></a></td>
            </tr>
            <tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Nombre :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text' name='establecimiento_nombre'   id='establecimiento_nombre'   value='{$ESTABLECIMIENTO.NOMBRE}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Tipo :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='establecimiento_tipo' id='establecimiento_tipo' disabled='1'>
																<option value='1' selected>generador</option>
																<option value='2'>transporte</option>
																<option value='3'>operador</option>
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero CAA - Fecha:</td>
			<td width="328" bordercolor="#EAEAE5">
				<label>
					<input type='text'   name='establecimiento_caa_numero'      id='establecimiento_caa_numero'      value='{$ESTABLECIMIENTO.CAA_NUMERO}'      size='10'>
				</label>
					-
				<label>
					<input type='text'   name='establecimiento_caa_vencimiento' id='establecimiento_caa_vencimiento' value='{$ESTABLECIMIENTO.CAA_VENCIMIENTO}' size='10' readonly="true"><input type='button' value='...' id='btn_cal_establecimiento_caa_vencimiento'>
				</label>
			</td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero Expediente - A&ntilde;o :</td>
			<td width="328" bordercolor="#EAEAE5">
				<label>
					<input type='text'   name='establecimiento_expediente_numero'   id='establecimiento_expediente_numero'   value='{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}' size='10'>
				</label>
					-
				<label>
					<input type='text'   name='establecimiento_expediente_anio'     id='establecimiento_expediente_anio'     value='{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}'   size='4'>
				</label>
			</td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Actividad principal :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='establecimiento_actividad' id='establecimiento_actividad' >
																{foreach $ACTIVIDADES as $ACTIVIDAD}
																	<option value='{$ACTIVIDAD.CODIGO}' {if $ESTABLECIMIENTO.ACTIVIDAD == $ACTIVIDAD.CODIGO}selected{/if}>{$ACTIVIDAD.CODIGO} - {$ACTIVIDAD.DESCRIPCION}</option>
																{/foreach}
															</select></label></td>

		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Breve descripci&oacute;n del proceso productivo :</td>
			<td width="328" bordercolor="#EAEAE5"><label><textarea type='text'   name='establecimiento_descripcion'   id='establecimiento_descripcion' size='50'>{$ESTABLECIMIENTO.DESCRIPCION}</textarea></label></td>
		</tr>

		<tr>
                    <td align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;"  class="titulos">DOMICILIO REAL</td>
                                                       <td></td>

		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_calle_r'   id='establecimiento_calle_r'   value='{$ESTABLECIMIENTO.CALLE_R}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_numero_r'   id='establecimiento_numero_r'   value='{$ESTABLECIMIENTO.NUMERO_R}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_piso_r'   id='establecimiento_piso_r'   value='{$ESTABLECIMIENTO.PISO_R}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='establecimiento_provincia_r' id='establecimiento_provincia_r'>
																{foreach $PROVINCIAS as $PROVINCIA}
																	<option value='{$PROVINCIA.CODIGO}' {if $ESTABLECIMIENTO.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
																{/foreach}
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='establecimiento_localidad_r' id='establecimiento_localidad_r'>
																{foreach $LOCALIDADES_R as $LOCALIDAD}
																	<option value='{$LOCALIDAD@key}' {if $ESTABLECIMIENTO.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
																{/foreach}
															</select></label></td>
		</tr>
		<tr>
			<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 11px;"  >Coordenadas geogr&aacute;ficas del establecimiento</td>
			<td>
				<!--<input type="button"   id="btn_activar_mapa_r" class="ui-el-minibutton" value="UBICAR EN MAPA">-->
				<input type="text" name="establecimiento_latitud_r"  id="establecimiento_latitud_r"  value="{$ESTABLECIMIENTO.LATITUD_R}"  readonly="true">
				<input type="text" name="establecimiento_longitud_r" id="establecimiento_longitud_r" value="{$ESTABLECIMIENTO.LONGITUD_R}" readonly="true">
				<div id="map" style="width: 300px; height: 300px"></div>
			</td>
		</tr>



		<tr>
                 <td colspan="2" align="left" height="25" bordercolor="#EAEAE5" style="font-size: 14px;"  class="titulos">DOMICILIO CONSTITUIDO</td>


		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_calle_c'   id='establecimiento_calle_c'   value='{$ESTABLECIMIENTO.CALLE_C}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_numero_c'   id='establecimiento_numero_c'   value='{$ESTABLECIMIENTO.NUMERO_C}' size='30'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_piso_c'   id='establecimiento_piso_c'   value='{$ESTABLECIMIENTO.PISO_C}' size='30'></label></td>
		</tr>

		<tr class='invisible'>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='__establecimiento_provincia_c' id='establecimiento_provincia_c'>
																{foreach $PROVINCIAS as $PROVINCIA}
																	<option value='{$PROVINCIA.CODIGO}' {if $ESTABLECIMIENTO.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
																{/foreach}
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='establecimiento_localidad_c' id='establecimiento_localidad_c'>
																{foreach $LOCALIDADES_C as $LOCALIDAD}
																	<option value='{$LOCALIDAD@key}' {if $ESTABLECIMIENTO.LOCALIDAD_C == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
																{/foreach}
															</select></label></td>
		</tr>



		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Nomenclatura Catastral :</td>
			<td width="328" bordercolor="#EAEAE5">
				<label>
					Circ <select name='establecimiento_nomenclatura_catastral_circ' id='establecimiento_nomenclatura_catastral_circ'>
					{foreach $NOMENCLATURA_CATASTRAL_CIRC as $CIRC}
						<option value='{$CIRC}' {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC == $CIRC}selected{/if}>{$CIRC}</option>
					{/foreach}
					</select>
				</label>

				<label>
					Sec <select name='establecimiento_nomenclatura_catastral_sec' id='establecimiento_nomenclatura_catastral_sec'>
					{foreach $NOMENCLATURA_CATASTRAL_SEC as $SEC}
						<option value='{$SEC}' {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC == $SEC}selected{/if}>{$SEC}</option>
					{/foreach}
					</select>
				</label>

				<label>
					Manz     <input type='text' name='establecimiento_nomenclatura_catastral_manz'     id='establecimiento_nomenclatura_catastral_manz'     value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}'     size='4'>
				</label>

				<label>
					Parc     <input type='text' name='establecimiento_nomenclatura_catastral_parc'     id='establecimiento_nomenclatura_catastral_parc'     value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}'     size='4'>
				</label>

				<label>
					Sub Parc <input type='text' name='establecimiento_nomenclatura_catastral_sub_parc' id='establecimiento_nomenclatura_catastral_sub_parc' value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}' size='4'>
				</label>
			</td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Habilitaciones :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_habilitaciones'   id='establecimiento_habilitaciones'   value='{$ESTABLECIMIENTO.HABILITACIONES}' size='30'></label></td>
		</tr>

		<tr id='sumario_errores_establecimiento' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>

	</table>
</div>

<div align="right"><br />
	<a id='btn_aceptar' href='#'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/boton_aceptar.gif" width="91" height="30" /></a>
        <a id='btn_cancelar' href='#'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/boton_cancelar.gif" width="91" height="30" /></a>
</div>

{literal}
<script>
	var establecimiento_caa_vencimiento_instance = null;

	$(function() {
		establecimiento_caa_vencimiento_instance = new Epoch('establecimiento_caa_vencimiento_container', 'popup', document.getElementById('establecimiento_caa_vencimiento'), 0);

		$('#establecimiento_numero_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_numero_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_numero').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_anio').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_manz').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_parc').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex:'[0-9]'});

		$('#btn_cal_establecimiento_caa_vencimiento').click(function() {
			establecimiento_caa_vencimiento_instance.toggle();
		})

		$('#btn_cerrar').click(function() {
			$('#div_popup').hide();
			$('#bigscreen').hide();
		})

		$('#btn_cancelar').click(function() {
			$('#div_popup').hide();
			$('#bigscreen').hide();
		})

		$('#btn_aceptar').click(function() {
			var campos = [	'nombre', 'tipo', 'usuario', 'contrasenia',
							'caa_numero', 'caa_vencimiento', 'expediente_numero', 'expediente_anio',
							'actividad', 'descripcion',
							'calle_r', 'numero_r', 'piso_r', 'provincia_r', 'localidad_r', 'latitud_r', 'longitud_r',
							'calle_c', 'numero_c', 'piso_c', 'provincia_c', 'localidad_c',
							'nomenclatura_catastral_circ', 'nomenclatura_catastral_sec', 'nomenclatura_catastral_manz',
							'nomenclatura_catastral_parc', 'nomenclatura_catastral_sub_parc',
							'habilitaciones'
						 ];

			//$.ajaxSetup({ scriptCharset: "utf-8" , contentType: "application/json; charset=utf-8"});
			$.ajax({
				type: "POST",
				url: "/operacion/operador/alta_temprana/establecimiento.php",
				data:	{		accion                          : $("#establecimiento_accion").val(),
							id                              : $("#establecimiento_id").val(),
							nombre                          : $("#establecimiento_nombre").val(),
							tipo                            : $("#establecimiento_tipo").val(),
							usuario_id                      : $("#establecimiento_usuario_id").val(),
							usuario                         : $("#establecimiento_usuario").val(),
							caa_numero                      : $("#establecimiento_caa_numero").val(),
							caa_vencimiento                 : $("#establecimiento_caa_vencimiento").val(),
							expediente_numero               : $("#establecimiento_expediente_numero").val(),
							expediente_anio                 : $("#establecimiento_expediente_anio").val(),
							actividad                       : $("#establecimiento_actividad").val(),
							descripcion                     : $("#establecimiento_descripcion").val(),
							latitud_r                       : $("#establecimiento_latitud_r").val(),
							longitud_r                      : $("#establecimiento_longitud_r").val(),
							calle_r                         : $("#establecimiento_calle_r").val(),
							numero_r                        : $("#establecimiento_numero_r").val(),
							piso_r                          : $("#establecimiento_piso_r").val(),
							provincia_r                     : $("#establecimiento_provincia_r").val(),
							localidad_r                     : $("#establecimiento_localidad_r").val(),
							calle_c                         : $("#establecimiento_calle_c").val(),
							numero_c                        : $("#establecimiento_numero_c").val(),
							piso_c                          : $("#establecimiento_piso_c").val(),
							provincia_c                     : $("#establecimiento_provincia_c").val(),
							localidad_c                     : $("#establecimiento_localidad_c").val(),
							nomenclatura_catastral_circ     : $("#establecimiento_nomenclatura_catastral_circ").val(),
							nomenclatura_catastral_sec      : $("#establecimiento_nomenclatura_catastral_sec").val(),
							nomenclatura_catastral_manz     : $("#establecimiento_nomenclatura_catastral_manz").val(),
							nomenclatura_catastral_parc     : $("#establecimiento_nomenclatura_catastral_parc").val(),
							nomenclatura_catastral_sub_parc : $("#establecimiento_nomenclatura_catastral_sub_parc").val(),
							habilitaciones                  : $("#establecimiento_habilitaciones").val(),
						},
				dataType: "text json",
				success: function(retorno){
											if(retorno['estado'] == 0){
												if($("#establecimiento_accion").val() == 'alta'){
													agregar_establecimiento(retorno['datos']);
												}else{
													modificar_establecimiento(retorno['datos']);
												}
												$('#div_popup').hide();
												$('#bigscreen').hide();
											}else{
												texto_errores = '';
												for(campo in campos){
													campo = campos[campo];

													if(retorno['errores'][campo] != null){
														texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
														$('#establecimiento_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
														$('#establecimiento_' + campo).addClass('error_de_carga');
													}else{
														$('#establecimiento_' + campo).removeClass('error_de_carga');
													}

													if(texto_errores != ''){
														$('#sumario_errores_establecimiento td:first').html(texto_errores);
														$('#sumario_errores_establecimiento').show();
														;
													}else{
														$('#sumario_errores_establecimiento').hide();
													}
												}
											}
										}
			 });
		})

		var cambio_localidad_pendiente = null;

		$('#establecimiento_provincia_r').change(function() {
			actualizar_localidades_r();
		});

		$('#establecimiento_provincia_c').change(function() {
			actualizar_localidades_c();
		});

		$('#establecimiento_localidad_r').change(function() {
			$.ajax({
			   type: "POST",
			   url: "/servicios/punto_inicio.php",
			   data: {
						calle     : $("#establecimiento_calle_r").val(),
						numero    : $("#establecimiento_numero_r").val(),
						provincia : $("#establecimiento_provincia_r").val(),
						localidad : $("#establecimiento_localidad_r").val()
					},
			   dataType: "text",
			   success: function(punto_inicio){
												codeAddress(punto_inicio);
			   }
			 });
		})


		function actualizar_localidades_r(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#establecimiento_provincia_r").val()}, function(json){
				$('#establecimiento_localidad_r').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#establecimiento_localidad_r').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#establecimiento_localidad_r').val($('#establecimiento_localidad_r option:first').val());
			});
		}

		function actualizar_localidades_c(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#establecimiento_provincia_c").val()}, function(json){
				$('#establecimiento_localidad_c').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#establecimiento_localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#establecimiento_localidad_c').val($('#establecimiento_localidad_c option:first').val());
			});
		}

	});
        $("#map").html("");
                 var geocoder;
                 var map;
                 var marker;
             initialize();

                    function initialize() {
                     geocoder = new google.maps.Geocoder();

                      var mapOptions = {
                        center: new google.maps.LatLng(-34.60828,-58.3708375),
                        zoom: 14,
                        mapTypeControl: true,
                        panControl: true

                      };
                       $("#establecimiento_latitud_r").val(-34.60828);
                         $("#establecimiento_longitud_r").val(-58.3708375);

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
                         $("#establecimiento_latitud_r").val(e.latLng.lat());
                         $("#establecimiento_longitud_r").val(e.latLng.lng());
                      });
                    }

                  // google.maps.event.addDomListener(window, 'load', initialize);

                      function codeAddress(address) {

                    geocoder.geocode( { 'address': address}, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                        var pos = marker.getPosition();
                        $("#establecimiento_latitud_r").val(pos.lat());
                         $("#establecimiento_longitud_r").val(pos.lng());
                      } else {
                        alert("Geocode no pudo ubicar la direccion por el siguiente error: " + status);
                      } });
                  }

</script>
{/literal}

