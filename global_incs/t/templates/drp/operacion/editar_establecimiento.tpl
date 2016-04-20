<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            EDITAR ESTABLECIMIENTO
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="{$BASE_PATH}/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <input type='hidden' name='establecimiento_id'         id='establecimiento_id'         value='{$ESTABLECIMIENTO.ID}'   size='50'>
    <input type='hidden' name='establecimiento_tipo'       id='establecimiento_tipo'       value='{$ESTABLECIMIENTO.TIPO}' size='50'>
    <div style="width: 500px;overflow: auto;overflow-x: hidden;height: 350px;">
        <table width="480" style="font-size: 11px" border="0" cellspacing="0" cellpadding="5">

            <tr>
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">Nombre :</td>
                <td width="328" bordercolor="#EAEAE5"><label><input type='text' name='establecimiento_nombre'   id='establecimiento_nombre'   value='{$ESTABLECIMIENTO.NOMBRE}' size='30'></label></td>
            </tr>

            <tr>
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">Tipo :</td>
                <td width="328" bordercolor="#EAEAE5">{$ESTABLECIMIENTO.TIPO_}</label></td>
            </tr>

            <tr>
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">CAA :</td>
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
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">Expediente :</td>
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
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n :</td>
                <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='establecimiento_descripcion'   id='establecimiento_descripcion'   value='{$ESTABLECIMIENTO.DESCRIPCION}' size='30'></label></td>
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
                    <input type="text" name="establecimiento_latitud_r"  id="establecimiento_latitud_r"  value="{$ESTABLECIMIENTO.LATITUD}"  readonly="true">
                    <input type="text" name="establecimiento_longitud_r" id="establecimiento_longitud_r" value="{$ESTABLECIMIENTO.LONGITUD}" readonly="true">
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

            <tr>
                <td width="147" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
                <td width="328" bordercolor="#EAEAE5"><label>	<select style="font-size: 11px; width: 280px;" name='establecimiento_provincia_c' id='establecimiento_provincia_c'>
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

            <tr id='sumario_errores' class='invisible'>
                <td colspan="2" align="left" color="red"></td>
            </tr>

        </table>
    </div>
    <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>
</div>
            {literal}
<script>
	var establecimiento_caa_vencimiento_instance = null;

	$(function() {
		//$('#establecimiento_caa_vencimiento').datepicker();
		$('#establecimiento_numero_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_numero_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_numero').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_anio').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_manz').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_parc').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex:'[0-9]'});

		establecimiento_caa_vencimiento_instance = new Epoch('establecimiento_caa_vencimiento_container', 'popup', document.getElementById('establecimiento_caa_vencimiento'), 0);

		$('#btn_cal_establecimiento_caa_vencimiento').click(function() {
			establecimiento_caa_vencimiento_instance.toggle();
		})

		$('#btn_cerrar').click(function() {
			$('#div_popup').hide();
		})

		$('#btn_cancelar').click(function() {
			$('#div_popup').hide();
		})

		$('#btn_aceptar').click(function() {
			var campos = [	'nombre', 'tipo',
							'caa_numero', 'caa_vencimiento', 'expediente_numero', 'expediente_anio',
							'actividad', 'descripcion',
							'calle_r', 'numero_r', 'piso_r', 'provincia_r', 'localidad_r', 'latitud_r', 'longitud_r',
							'calle_c', 'numero_c', 'piso_c', 'provincia_c', 'localidad_c',
							'nomenclatura_catastral_circ', 'nomenclatura_catastral_sec', 'nomenclatura_catastral_manz',
							'nomenclatura_catastral_parc', 'nomenclatura_catastral_sub_parc',
							'habilitaciones', 'general'
						 ];

			//$.ajaxSetup({ scriptCharset: "utf-8" , contentType: "application/json; charset=utf-8"});
			$.ajax({
				type: "POST",
				url: "/operacion/editar_establecimiento.php",
				data:	{
							id                              : $("#establecimiento_id").val(),
							tipo                            : $("#establecimiento_tipo").val(),
							nombre                          : $("#establecimiento_nombre").val(),
							caa_numero                      : $("#establecimiento_caa_numero").val(),
							caa_vencimiento                 : $("#establecimiento_caa_vencimiento").val(),
							expediente_numero               : $("#establecimiento_expediente_numero").val(),
							expediente_anio                 : $("#establecimiento_expediente_anio").val(),
							actividad                       : $("#establecimiento_actividad").val(),
							descripcion                     : $("#establecimiento_descripcion").val(),
							calle_r                         : $("#establecimiento_calle_r").val(),
							numero_r                        : $("#establecimiento_numero_r").val(),
							piso_r                          : $("#establecimiento_piso_r").val(),
							provincia_r                     : $("#establecimiento_provincia_r").val(),
							localidad_r                     : $("#establecimiento_localidad_r").val(),
							latitud_r                       : $("#establecimiento_latitud_r").val(),
							longitud_r                      : $("#establecimiento_longitud_r").val(),
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
												location.reload();
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
														$('#sumario_errores td:first').html(texto_errores);
														$('#sumario_errores').show();
														;
													}else{
														$('#sumario_errores').hide();
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
												showAddress(punto_inicio);
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

		//mapa
		var map      = null;
		var geocoder = null;

		function load() {
			if (GBrowserIsCompatible()) {
				map = new GMap2(document.getElementById("map"));

				map.setCenter(new GLatLng(-34.60828,-58.3708375), 15);
				map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());

				geocoder = new GClientGeocoder();

				//---------------------------------//
				//   MARCADOR AL HACER CLICK
				//---------------------------------//
				GEvent.addListener(map, "click",	function(marker, point) {
														if (marker) {
//															null;
														} else {
															map.clearOverlays();
															var marcador = new GMarker(point);
															map.addOverlay(marcador);

															$("#establecimiento_latitud_r").val(point.y);
															$("#establecimiento_longitud_r").val(point.x);
														}
													}
								);
				//---------------------------------//
				//   FIN MARCADOR AL HACER CLICK
				//---------------------------------//
			}
		}

		//---------------------------------//
		//           GEOCODER
		//---------------------------------//
		function showAddress(address, zoom) {
			if (geocoder) {
				geocoder.getLatLng(address,	function(point) {
												if (!point) {
//													alert(address + " not found");
												} else {
													map.setCenter(point, zoom);
													var marker = new GMarker(point);
													map.addOverlay(marker);

													$("#establecimiento_latitud_r").val(point.y);
													$("#establecimiento_longitud_r").val(point.x);
												}
											}
								);
			}
		}
		//---------------------------------//
		//     FIN DE GEOCODER
		//---------------------------------//

		load();
		showAddress("{/literal}{$PUNTO_INICIO}{literal}");
		//mapa
	});

</script>
{/literal}
