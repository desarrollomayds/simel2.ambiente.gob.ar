<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            CREAR NUEVA RUTA
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="500" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="100" height="25" align="right" bordercolor="#EAEAE5">Descripcion :</td>
			<td width="340" bordercolor="#EAEAE5"><label><input type='text' name='ruta_descripcion' id='ruta_descripcion' size='35'></label></td>
		</tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
      <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight" onclick="cerrar();">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>
    <div class="clear20"></div>
    </div>
{literal}
<script>
	$('#btn_cerrar').click(function() {
		$('#div_popup').hide();
	})

	$('#btn_cancelar').click(function() {
		$('#div_popup').hide();
	})

	$('#btn_aceptar').click(function() {
		var campos  = [	'descripcion' ];
		var prefijo = 'ruta';

		$.ajax({
			type: "POST",
			url: "/operacion/transportista/ruta.php",
			data:	{	accion      : 'alta',
						descripcion : $("#ruta_descripcion").val()
					},
			dataType: "text json",
			success: function(retorno){
										if(retorno['estado'] == 0){
											agregar_ruta(retorno['datos']);
											$('#div_popup').hide();
                                                                                            cerrar();
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
                                                                                                            cerrar();
												}
											}
										}
									}

		 });
	})
</script>
{/literal}