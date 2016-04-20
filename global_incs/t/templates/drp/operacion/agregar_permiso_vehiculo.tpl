<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
           AGREGAR PERMISO VEHICULO
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="495" border="0" cellspacing="0" cellpadding="5" style="font-size: 11px;">

            <tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Veh&iacute;culo:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_vehiculo' id='permiso_vehiculo' style='width: 300px'>
			 {foreach $VEHICULOS as $VEHICULO}
				 <option value='{$VEHICULO.ID}'>{$VEHICULO.DOMINIO} - {$VEHICULO.DESCRIPCION}</option>
			 {/foreach}
																</select></label></td>
		</tr>

            <tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Residuo:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_residuo' id='permiso_residuo' style='width: 300px'>
			 {foreach $RESIDUOS as $RESIDUO}
				 <option value='{$RESIDUO.CODIGO}'>{$RESIDUO.CODIGO} - {$RESIDUO.DESCRIPCION}</option>
			 {/foreach}
																</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Cantidad :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='' size='35'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Estado :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_estado' id='permiso_estado'>
																<option value='1'>l&iacute;quido</option>
																<option value='2'>s&oacute;lido</option>
																<option value='3'>semi-s&oacute;lido</option>
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_inicio'     id='permiso_fecha_inicio'     value='' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_inicio'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de finalizaci&oacute;n:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_fin'     id='permiso_fecha_fin'     value='' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_fin'></label></td>
		</tr>

		<tr id='sumario_errores_permiso_vehiculo' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
                                                                                                                                 <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar_2' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>

</div>
                                                                                                                                {literal}
<script>
	var permiso_fecha_inicio_instancia = null;
	var permiso_fecha_fin_instancia    = null;

	$(function(){
		$('#permiso_cantidad').filter_input({regex:'[0-9]'});

		permiso_fecha_inicio_instancia = new Epoch('permiso_fecha_inicio_container', 'popup', document.getElementById('permiso_fecha_inicio'), 0);
		permiso_fecha_fin_instancia    = new Epoch('permiso_fecha_fin_container',    'popup', document.getElementById('permiso_fecha_fin'),    0);
	});
$('#btn_cancelar_2').click(function() {
		$('#div_popup_2').hide();
cerrar();
	})

	$('#btn_cal_permiso_fecha_fin').click(function() {
		permiso_fecha_fin_instancia.toggle();
	})

	$('#btn_cal_permiso_fecha_inicio').click(function() {
		permiso_fecha_inicio_instancia.toggle();
	})

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();

	})

	$('#btn_cancelar').click(function() {
		$('#div_popup_2').hide();
	})


	$('#btn_aceptar_2').click(function() {
		var campos  = [	'accion', 'vehiculo', 'id', 'residuo', 'cantidad', 'estado', 'fecha_inicio', 'fecha_fin' ];
		var prefijo = 'permiso';

		$.ajax({
			type: "POST",
			url: "/operacion/agregar_permiso_vehiculo.php",
			data:	{
						vehiculo        : $("#permiso_vehiculo").val(),
						residuo         : $("#permiso_residuo").val(),
						cantidad        : $("#permiso_cantidad").val(),
						estado          : $("#permiso_estado").val(),
						fecha_inicio    : $("#permiso_fecha_inicio").val(),
						fecha_fin       : $("#permiso_fecha_fin").val()
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
													$('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
													$('#' + prefijo + '_' + campo).addClass('error_de_carga');
												}else{
													$('#' + prefijo + '_' + campo).removeClass('error_de_carga');
												}

												if(texto_errores != ''){
													$('#sumario_errores_permiso_vehiculo td:first').html(texto_errores);
													$('#sumario_errores_permiso_vehiculo').show();
													;
												}else{
													$('#sumario_errores_permiso_vehiculo').hide();


												}
											}
										}
									}
		 });
	})
</script>
{/literal}