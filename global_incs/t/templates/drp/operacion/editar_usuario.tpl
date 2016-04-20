<div class="modal-header" style="text-align:center">
<p><h3>Editar usuario</h3></p>
</div>
<div class="modal-body" style="text-align:center">
				<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
                    <tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre de usuario :</td>
						<td width="450" bordercolor="#EAEAE5">
						<input type='hidden' name='username' id='username' value='{$USUARIO.LOGIN}' size='35'/>
						&nbsp;{$USUARIO.LOGIN}
						</td>
					</tr>
					<!--
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Contraseña :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='password' name='password' id='password' value='' size='35'/>&nbsp;<input type='checkbox' name='cambiar_password' id='cambiar_password' value='1'> Cambiar contraseña</td>
					</tr>
					-->
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Rol :</td>
						<td width="450" bordercolor="#EAEAE5">	<select id='rol' name='rol'>
							{foreach $ROLES as $ROL}
								<option style="font-size: 11px;" value='{$ROL.CODIGO}' {if $USUARIO.ROL == $ROL.CODIGO}selected{/if}>{$ROL.DESCRIPCION}</option>
							{/foreach}
						</select></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='{$USUARIO.NOMBRE}' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Apellido :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='apellido' id='apellido' value='{$USUARIO.APELLIDO}' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Tipo de documento :</td>
						<td width="450" bordercolor="#EAEAE5"><select id='tipo_documento' name='tipo_documento'>
							{foreach $TIPOS_DOCUMENTO as $TIPO_DOCUMENTO}
								<option style="font-size: 11px;" value='{$TIPO_DOCUMENTO.ID}' {if $TIPO_DOCUMENTO.ID == $USUARIO.TIPO_DOCUMENTO}selected{/if}>{$TIPO_DOCUMENTO.DESCRIPCION}</option>
							{/foreach}
						</select></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero de documento :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_documento' id='numero_documento' value='{$USUARIO.NRO_DOCUMENTO}' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de nacimiento :</td>
						<td width="450" bordercolor="#EAEAE5"><label><input type='text' name='fecha_nacimiento' id='fecha_nacimiento' value='{$USUARIO.FECHA_NACIMIENTO}' size='35' readonly="true"/><input type='button' value='...' id='btn_cal_fecha_nacimiento'></label></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Sexo :</td>
						<td width="450" bordercolor="#EAEAE5">	<select id='sexo' name='sexo'>
							<option value='f' {if 'f' == $USUARIO.SEXO}selected{/if}>Femenino</option>
							<option value='m' {if 'm' == $USUARIO.SEXO}selected{/if}>Masculino</option>
						</select></td>
					</tr>

					<tr>
						<td colspan="2" align="left" id="sumario_errores" class="invisible"></td>
					</tr>
                    <tr>
                        <td colspan="2" align="left">&nbsp;</td>
					</tr>
				</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<button type="button" class="btn btn-danger" id="resetear">Grabar</button>
</div>

	{literal}
	<script>
		var fecha_nacimiento_instancia = null;

		$(function(){
			$('#numero_documento').filter_input({regex:'[0-9]'});

			fecha_nacimiento_instancia = new Epoch('fecha_nacimiento_container', 'popup', document.getElementById('fecha_nacimiento'), 0);
		});

		$('#btn_cal_fecha_nacimiento').click(function() {
			fecha_nacimiento_instancia.toggle();
		})

		$('#btn_grabar').click(function() {
			var campos  = [	'username', 'password', 'rol', 'nombre', 'apellido', 'tipo_documento', 'numero_documento', 'fecha_nacimiento', 'sexo' ];

			var prefijo = '';

			$.ajax({
				type: "POST",
				url: "../operacion/editar_usuario.php",
				data:	{
						id               : {/literal}{$USUARIO.ID}{literal},
						username         : $("#username").val(),
						password         : $("#password").val(),
						cambiar_password : ($("#cambiar_password").is(':checked')) ? 1 : 0,
						rol              : $("#rol").val(),
						nombre           : $("#nombre").val(),
						apellido         : $("#apellido").val(),
						tipo_documento   : $("#tipo_documento").val(),
						numero_documento : $("#numero_documento").val(),
						fecha_nacimiento : $("#fecha_nacimiento").val(),
						sexo             : $("#sexo").val()
					},
				dataType: "text json",
				success: function(retorno){
								if(retorno['estado'] == 0){
									window.location.replace("../operacion/listado_usuarios.php");
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
									}

									if(texto_errores != ''){
										$('#sumario_errores').html(texto_errores);
										$('#sumario_errores').show();
									}else{
//										$('#sumario_errores').hide();
									}
								}
							}
			 });
		});
		$('#btn_cancelar').click(function() {
			window.location.replace("../operacion/listado_usuarios.php");
		})
	</script>
	{/literal}