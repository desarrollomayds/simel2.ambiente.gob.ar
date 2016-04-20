<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            EDITAR EMPRESA
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="{$BASE_PATH}/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div style="width: 500px;height: 380px;overflow: auto;overflow-x: hidden">
    <div class="titulos" style="text-align: left;">  LA EMPRESA TIENE EXPEDIENTE DE: </div><br /><br />

    <div class="{if $ERRORES.ROLES}div_con_borde error_de_carga{/if}" style="text-align: left;">
        <input type='checkbox' name='rol_generador'     id='rol_generador'     value='1' {if $EMPRESA.ROLES.GENERADOR     == 1}checked{/if}> Generador
               <input type='checkbox' name='rol_transportista' id='rol_transportista' value='1' {if $EMPRESA.ROLES.TRANSPORTISTA == 1}checked{/if}> Transportista
               <input type='checkbox' name='rol_operador'      id='rol_operador'      value='1' {if $EMPRESA.ROLES.OPERADOR      == 1}checked{/if}> Operador
    </div>
    <br /><br />

        <table width="495" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre de la Empresa:</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='{$EMPRESA.NOMBRE}' size='35' class='{if $ERRORES.NOMBRE}error_de_carga{/if}'/></td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio de actividades :</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='fecha_inicio_act' id='fecha_inicio_act' value='{$EMPRESA.FECHA_INICIO_ACT}' size='35' class='datepicker {if $ERRORES.FECHA_INICIO_ACT}error_de_carga{/if}' readonly="true"><input type='button' value='...' id='btn_cal_fecha_inicio_act'></td>
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
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero :</td>
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
                        {foreach $LOCALIDADES_R as $LOCALIDAD}
                        <option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>

            <tr>
                <td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO LEGAL</td>
                <td></td>
            </tr>

            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_l' id='calle_l' value='{$EMPRESA.CALLE_L}' size='35' class='{if $ERRORES.CALLE_L}error_de_carga{/if}'></td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero :</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_l' id='numero_l' value='{$EMPRESA.NUMERO_L}' size='35' class='{if $ERRORES.NUMERO_L}error_de_carga{/if}'></td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_l' id='piso_l' value='{$EMPRESA.PISO_L}' size='35' class='{if $ERRORES.PISO_L}error_de_carga{/if}'></td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_l' id='oficina_l' value='{$EMPRESA.OFICINA_L}' size='35' class='{if $ERRORES.OFICINA_L}error_de_carga{/if}'></td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
                <td width="450" bordercolor="#EAEAE5">
                    <select style="font-size: 11px;" name='provincia_l' id='provincia_l'  class='{if $ERRORES.PROVINCIA_L}error_de_carga{/if}'>
                        {foreach $PROVINCIAS as $PROVINCIA}
                        <option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_L == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
                <td width="450" bordercolor="#EAEAE5">
                    <select style="font-size: 11px;" name='localidad_l' id='localidad_l' style="font-size: 11px;" class='{if $ERRORES.LOCALIDAD_L}error_de_carga{/if}'>
                        {foreach $LOCALIDADES_L as $LOCALIDAD}
                        <option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_L == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
                        {/foreach}
                    </select>
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
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero :</td>
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
            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
                <td width="450" bordercolor="#EAEAE5">
                    <select style="font-size: 11px;" name='provincia_c' id='provincia_c'  class='{if $ERRORES.PROVINCIA_C}error_de_carga{/if}'>
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

            <tr class="invisible">
                <td colspan="2" align="left" id="sumario_errores">
                </td>
            </tr>
        </table>
    </div>
    <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_grabar' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_agregar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_finalizar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>

</div>
            {literal}
	<script type="text/javascript">
		var fecha_inicio_act_instance = null;

		//datos empresa
		$(function(){
			$('#numero_r').filter_input({regex:'[0-9]'});
			$('#piso_r').filter_input({regex:'[0-9]'});
			$('#numero_l').filter_input({regex:'[0-9]'});
			$('#piso_l').filter_input({regex:'[0-9]'});
			$('#numero_c').filter_input({regex:'[0-9]'});
			$('#piso_c').filter_input({regex:'[0-9]'});
			$('#numero_telefonico').filter_input({regex:'[0-9]'});

			fecha_inicio_act_instance = new Epoch('fecha_inicio_act_container', 'popup', document.getElementById('fecha_inicio_act'), 0);
		});

		$('#btn_cal_fecha_inicio_act').click(function() {
			fecha_inicio_act_instance.toggle();
		})

		$('#provincia_r').change(function() {
			actualizar_localidades_r();
		})

		function actualizar_localidades_r(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
				$('#localidad_r').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_r').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_r').val($('#localidad_r option:first').val());
			});
		}


		$('#provincia_l').change(function() {
			actualizar_localidades_l();
		})

		function actualizar_localidades_l(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_l").val()}, function(json){
				$('#localidad_l').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_l').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_l').val($('#localidad_l option:first').val());
			});
		}

		$('#provincia_c').change(function() {
			actualizar_localidades_c();
		})

		function actualizar_localidades_c(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_c").val()}, function(json){
				$('#localidad_c').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				$('#localidad_c').val($('#localidad_c option:first').val());
			});
		}
		//datos empresa

		$('#btn_grabar').click(function() {
			var campos  = [	'nombre', 'fecha_inicio_act',
							'calle_r', 'numero_r', 'piso_r', 'oficina_r', 'provincia_r', 'localidad_r',
							'calle_l', 'numero_l', 'piso_l', 'oficina_l', 'provincia_l', 'localidad_l',
							'calle_c', 'numero_c', 'piso_c', 'oficina_c', 'provincia_c', 'localidad_c',
							'numero_telefonico', 'direccion_email' ];

			var prefijo = '';

			$.ajax({
				type: "POST",
				url: "/operacion/editar_empresa.php",
				data:	{
							id                : {/literal}{$EMPRESA.ID}{literal},
							nombre            : $("#nombre").val(),
							fecha_inicio_act  : $("#fecha_inicio_act").val(),

							calle_r           : $("#calle_r").val(),
							numero_r          : $("#numero_r").val(),
							piso_r            : $("#piso_r").val(),
							oficina_r         : $("#oficina_r").val(),
							provincia_r       : $("#provincia_r").val(),
							localidad_r       : $("#localidad_r").val(),

							calle_l           : $("#calle_l").val(),
							numero_l          : $("#numero_l").val(),
							piso_l            : $("#piso_l").val(),
							oficina_l         : $("#oficina_l").val(),
							provincia_l       : $("#provincia_l").val(),
							localidad_l       : $("#localidad_l").val(),

							calle_c           : $("#calle_c").val(),
							numero_c          : $("#numero_c").val(),
							piso_c            : $("#piso_c").val(),
							oficina_c         : $("#oficina_c").val(),
							provincia_c       : $("#provincia_c").val(),
							localidad_c       : $("#localidad_c").val(),

							numero_telefonico : $("#numero_telefonico").val(),
							direccion_email   : $("#direccion_email").val(),

							rol_generador     : ($("#rol_generador").is(':checked')) ? 1 : 0,
							rol_transportista : ($("#rol_transportista").is(':checked')) ? 1 : 0,
							rol_operador      : ($("#rol_operador").is(':checked')) ? 1 : 0
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
													}

													if(texto_errores != ''){
														$('#sumario_errores').html(texto_errores);
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


	</script>
	{/literal}
