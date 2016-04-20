<!--<div align="center" style="float:left; width:455px; height:15px; background-color:#E9F3F3; padding:10px">
	<span class="titulos">Agregar veh&iacute;culo</span>
	<br />
</div>

<div align="right" style="width:24px; float:left; height:35px;background-color:#E9F3F3">
	<a id='btn_cerrar_2' href='#'><img src="/imagenes/boton_cerrar.png" width="24" height="22" /></a>
</div>-->
<table style="font-size: 11px;" width="495" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_permisos">
	 <tr>
                <td colspan="8" height="25" align="center" class="titulos" bordercolor="#E9F3F3" style="background-color:#E9F3F3;"><div style="float: left;">Veh&iacute;culos registrados</div><a i='btn_cerrar' style="float: right;" onclick="cerrar()" href='#'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/boton_cerrar.png" width="24" height="22" /></a></td>
            </tr>
            </table>

<div style=" background-color:#EAEAE5; padding:5px">
	<input type='hidden' name='vehiculo_accion'          id='vehiculo_accion' value='{$ACCION}' size='50'>
	<input type='hidden' name='vehiculo_establecimiento' id='vehiculo_establecimiento' value='{$ESTABLECIMIENTO}' size='50'>
	<input type='hidden' name='vehiculo_id'	             id='vehiculo_id'     value='{$VEHICULO.ID}' size='50'>

	<table width="495" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Dominio :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='vehiculo_dominio'     id='vehiculo_dominio'     value='{$VEHICULO.DOMINIO}' size='35'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='vehiculo_descripcion'     id='vehiculo_descripcion'     value='{$VEHICULO.DESCRIPCION}' size='35'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Credencial :</td>
			<td width="328" bordercolor="#EAEAE5">
				<label><input type='text'   name='vehiculo_credencial_serie'  id='vehiculo_credencial_serie'     value='{$VEHICULO.CREDENCIAL_SERIE}'  size='1'></label>
				<label><input type='text'   name='vehiculo_credencial_numero' id='vehiculo_credencial_numero'    value='{$VEHICULO.CREDENCIAL_NUMERO}' size='10'></label>
			</td>
		</tr>

		<tr id='sumario_errores_vehiculo' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
</div>

<div align="right"><br />
	<a id='btn_aceptar_2'  href='#'><img src="/imagenes/boton_aceptar.gif" width="91" height="30" /></a>
	<a id='btn_cancelar_2' href='#'><img src="/imagenes/boton_cancelar.gif" width="91" height="30" /></a>
</div>

{literal}
<script>
	$(function(){
		//filtros
		$('#vehiculo_credencial_numero').filter_input({regex:'[0-9]'});
	});

	$('#btn_cerrar_2').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_cancelar_2').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_aceptar_2').click(function() {
		var campos  = [	'accion', 'establecimiento', 'id', 'dominio', 'descripcion', 'credencial_serie', 'credencial_numero'];
		var prefijo = 'vehiculo';

		$.ajax({
			type: "POST",
			url: "/operacion/generador/alta_sucursales/vehiculo.php",
			data:	{		accion            : $("#vehiculo_accion").val(),
						establecimiento   : $("#vehiculo_establecimiento").val(),
						id                : $("#vehiculo_id").val(),
						dominio           : $("#vehiculo_dominio").val(),
						descripcion       : $("#vehiculo_descripcion").val(),
						credencial_serie  : $("#vehiculo_credencial_serie").val(),
						credencial_numero : $("#vehiculo_credencial_numero").val()
					},
			dataType: "text json",
			success: function(retorno){
										if(retorno['estado'] == 0){
											if($("#vehiculo_accion").val() == 'alta'){
												agregar_vehiculo(retorno['datos']);
											}else{
												modificar_vehiculo(retorno['datos']);
											}
											$('#div_popup_2').hide();
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
