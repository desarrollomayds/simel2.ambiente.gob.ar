<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
           AGREGAR VEHICULO
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="495" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Establecimiento:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='vehiculo_establecimiento' id='vehiculo_establecimiento' style='width: 300px'>
			 {foreach $ESTABLECIMIENTOS as $ESTABLECIMIENTO}
				 <option value='{$ESTABLECIMIENTO.ID}'>{$ESTABLECIMIENTO.NOMBRE}</option>
			 {/foreach}
																</select></label></td>
		</tr>
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Dominio :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='vehiculo_dominio'     id='vehiculo_dominio'     value='' size='50'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='vehiculo_descripcion'     id='vehiculo_descripcion'     value='' size='50'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Credencial :</td>
			<td width="328" bordercolor="#EAEAE5">
				<label><input type='text'   name='vehiculo_credencial_serie'  id='vehiculo_credencial_serie'     value=''  size='1'></label>
				<label><input type='text'   name='vehiculo_credencial_numero' id='vehiculo_credencial_numero'    value='' size='10'></label>
			</td>
		</tr>

		<tr id='sumario_errores' class='invisible'>
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
	$(function(){
		//filtros
		$('#vehiculo_credencial_numero').filter_input({regex:'[0-9]'});
	});

	$('#btn_cerrar_2').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_cancelar_2').click(function() {
		$('#div_popup_2').hide();
cerrar();
	})

	$('#btn_aceptar_2').click(function() {
		var campos  = [ 'dominio', 'descripcion', 'credencial_serie', 'credencial_numero'];
		var prefijo = 'vehiculo';

		$.ajax({
			type: "POST",
			url: "/operacion/agregar_vehiculo.php",
			data:	{	empresa           : {/literal}{$EMPRESA}{literal},
						establecimiento   : $("#vehiculo_establecimiento").val(),
						dominio           : $("#vehiculo_dominio").val(),
						descripcion       : $("#vehiculo_descripcion").val(),
						credencial_serie  : $("#vehiculo_credencial_serie").val(),
						credencial_numero : $("#vehiculo_credencial_numero").val()
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
</script>
{/literal}