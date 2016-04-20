<div align="center" style="float:left; width:435px; height:15px; background-color:#E9F3F3; padding:10px">
	<span class="titulos">Agregar Permiso de Traslado</span>
	<br />
</div>

<div align="right" style="width:24px; float:left; height:35px;background-color:#E9F3F3">
	<a id='btn_cerrar_3' href='#'><img src="/imagenes/boton_cerrar.png" width="24" height="22" /></a>
</div>

<div style=" background-color:#EAEAE5; padding:5px">
	<input type='hidden' name='permiso_accion'   id='permiso_accion'   value='{$ACCION}'     size='35'>
	<input type='hidden' name='permiso_vehiculo' id='permiso_vehiculo' value='{$VEHICULO}'   size='35'>
	<input type='hidden' name='permiso_id'       id='permiso_id'       value='{$PERMISO.ID}' size='35'>

	<table width="495" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Residuo:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_residuo' id='permiso_residuo' style='width: 300px'>
															{foreach $RESIDUOS as $RESIDUO}
																<option value='{$RESIDUO.CODIGO}' {if $RESIDUO.CODIGO == $PERMISO.RESIDUO}selected{/if}>{$RESIDUO.CODIGO} - {$RESIDUO.DESCRIPCION}</option>
															{/foreach}
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Cantidad :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='{$PERMISO.CANTIDAD}' size='35'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Estado :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_estado' id='permiso_estado'>
																<option value='1' {if $PERMISO.ESTADO == 1}selected{/if}>l&iacute;quido</option>
																<option value='2' {if $PERMISO.ESTADO == 2}selected{/if}>s&oacute;lido</option>
																<option value='3' {if $PERMISO.ESTADO == 3}selected{/if}>semi-s&oacute;lido</option>
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_inicio'     id='permiso_fecha_inicio'     value='{$PERMISO.FECHA_INICIO}' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_inicio'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de finalizaci&oacute;n:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_fin'     id='permiso_fecha_fin'     value='{$PERMISO.FECHA_FIN}' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_fin'></label></td>
		</tr>

		<tr id='sumario_errores_vehiculo' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
</div>

<div align="right"><br />
	<a id='btn_aceptar_3'  href='#'><img src="/imagenes/boton_aceptar.gif" width="91" height="30" /></a>
	<a id='btn_cancelar_3' href='#'><img src="/imagenes/boton_cancelar.gif" width="91" height="30" /></a>
</div>

{literal}
<script>
	var permiso_fecha_inicio_instancia = null;
	var permiso_fecha_fininstancia     = null;

	$(function(){
		$('#permiso_cantidad').filter_input({regex:'[0-9]'});

		permiso_fecha_inicio_instancia = new Epoch('permiso_fecha_inicio_container', 'popup', document.getElementById('permiso_fecha_inicio'), 0);
		permiso_fecha_fin_instancia    = new Epoch('permiso_fecha_fin_container',    'popup', document.getElementById('permiso_fecha_fin'),    0);
	});

	$('#btn_cal_permiso_fecha_inicio').click(function() {
		permiso_fecha_inicio_instancia.toggle();
	})

	$('#btn_cal_permiso_fecha_fin').click(function() {
		permiso_fecha_fin_instancia.toggle();
	})


	$('#btn_cerrar_3').click(function() {
		$('#div_popup_3').hide();
	})

	$('#btn_cancelar_3').click(function() {
		$('#div_popup_3').hide();
	})

	$('#btn_aceptar_3').click(function() {
		var campos  = [	'accion', 'establecimiento', 'vehiculo', 'id', 'residuo', 'cantidad', 'estado', 'fecha_inicio', 'fecha_fin' ];
		var prefijo = 'permiso';

		$.ajax({
			type: "POST",
			url: "/operacion/generador/alta_sucursales/permiso_vehiculo.php",
			data:	{		accion          : $("#permiso_accion").val(),
						vehiculo        : $("#permiso_vehiculo").val(),
						id              : $("#permiso_id").val(),
						residuo         : $("#permiso_residuo").val(),
						cantidad        : $("#permiso_cantidad").val(),
						estado          : $("#permiso_estado").val(),
						fecha_inicio    : $("#permiso_fecha_inicio").val(),
						fecha_fin       : $("#permiso_fecha_fin").val()
					},
			dataType: "text json",
			success: function(retorno){
										if(retorno['estado'] == 0){
											if($("#permiso_accion").val() == 'alta'){
												agregar_permiso_vehiculo(retorno['datos']);
											}else{
												modificar_permiso_vehiculo(retorno['datos']);
											}
											$('#div_popup_3').hide();
										}else{
											texto_errores = '';
											for(campo in campos){
												campo = campos[campo];

												if(retorno['errores'][campo] != null){
													texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
													$('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
													$('#' + prefijo + '_' + campo).addClass('error_de_carga');
												}else{
													$('#' + prefijo + '_' + campo).removeClass('error_de_carga');
												}

												if(texto_errores != ''){
													$('#sumario_errores_vehiculo td:first').html(texto_errores);
													$('#sumario_errores_vehiculo').show();
													;
												}else{
													$('#sumario_errores_vehiculo').hide();
												}
											}
										}
									}

		 });
	})
</script>
{/literal}
