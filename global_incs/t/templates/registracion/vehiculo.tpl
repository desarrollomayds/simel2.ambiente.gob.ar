<div class="backGrey">

    <input type='hidden' name='vehiculo_accion' id='vehiculo_accion' value='{$ACCION}' size='50'>
	<input type='hidden' name='vehiculo_establecimiento' id='vehiculo_establecimiento' value='{$ESTABLECIMIENTO}' size='50'>
	<input type='hidden' name='vehiculo_id'     id='vehiculo_id'     value='{$VEHICULO.ID}' size='50'>

	<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Dominio<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='vehiculo_dominio' id='vehiculo_dominio' value='{$VEHICULO.DOMINIO}'></td>
		</tr>

        <tr id="dominio-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="dominio-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Tipo Veh&iacute;culo<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5">
				<select id="tipo-vehiculo" name="tipo-vehiculo">
					<option value="">[SELECCIONE UN TIPO DE VEH&iacute;CULO]</option>
					{foreach $TIPOS_VEHICULO as $tipo}
						{if $VEHICULO.TIPO_VEHICULO == $tipo->codigo}
							<option value="{$tipo->codigo}" selected>{$tipo->descripcion}</option>
						{else}
							<option value="{$tipo->codigo}">{$tipo->descripcion}</option>
						{/if}
					{/foreach}
				</select>
			</td>
		</tr>

        <tr id="tipo-vehiculo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="tipo-vehiculo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Tipo de caja:</td>
			<td bordercolor="#EAEAE5">
				<select id="tipo-caja" name="tipo-caja">
					<option value="">[NO APLICA]</option>
					{foreach $TIPOS_CAJA as $caja}
						{if $VEHICULO.TIPO_CAJA == $caja->codigo}
							<option value="{$caja->codigo}" selected>{$caja->descripcion}</option>
						{else}
							<option value="{$caja->codigo}">{$caja->descripcion}</option>
						{/if}
					{/foreach}
				</select>
			</td>
		</tr>

        <tr id="tipo-caja-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="tipo-caja-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5">
				<textarea type='text' name='vehiculo_descripcion' id='vehiculo_descripcion' style="min-width:396px;height:80px;resize:vertical;">{$VEHICULO.DESCRIPCION}</textarea>
			</td>
		</tr>

        <tr id="descripcion-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="descripcion-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

	</table>
    
    <div class="row" style="margin-top:30px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" id="btn_aceptar_2">Aceptar</a>
	    </div>
    </div>

</div>
{literal}
<script>



	$('#btn_aceptar_2').click(function() {
		var campos  = [	'accion', 'establecimiento', 'id', 'dominio', 'tipo-vehiculo', 'tipo-caja', 'descripcion'];
		var prefijo = 'vehiculo';

		// checkeo formato del dominio si no se trata de una BARCAZA
		if ($("#vehiculo_dominio").val() && $("#tipo-vehiculo").val() != 'BA' && !isDominio($("#vehiculo_dominio").val()))
		{
		    mostrarMensaje('exclamation-triangle','Ingrese un dominio de veh&iacute;culo v&aacute;lido.','warning');
		    return false;
		}

		$.ajax({
			type: "POST",
			url: mel_path+"/registracion/vehiculo.php",
			data:
			{
				accion            : $("#vehiculo_accion").val(),
				establecimiento   : $("#vehiculo_establecimiento").val(),
				id                : $("#vehiculo_id").val(),
				dominio           : $("#vehiculo_dominio").val(),
				tipo_vehiculo     : $("#tipo-vehiculo").val(),
				tipo_caja         : $("#tipo-caja").val(),
				descripcion       : $("#vehiculo_descripcion").val(),
			},
			dataType: "text json",
			success: function(retorno){
				if(retorno['estado'] == 0){
					if($("#vehiculo_accion").val() == 'alta'){
						agregar_vehiculo(retorno['datos']);
					}else{
						modificar_vehiculo(retorno['datos']);
					}
					$('#mel2_popup').modal('hide');
				}else{
	                for(campo in campos){
	                    texto_errores = '';
	                    campo = campos[campo];
	                    
	                    if(retorno['errores'][campo] != null){

	                        texto_errores = retorno['errores'][campo];
	                        $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
	                        $('#' + campo).addClass('error_de_carga');
	                    }
	                    else
	                    {
	                        $('#' + campo).removeClass('error_de_carga');
	                    }

	                    if(texto_errores != ''){
	                        $('#' + campo + '-error').html(texto_errores);
	                        $('#' + campo + '-td').show();
	                        $('#' + campo + '-error').show();
	                        ;
	                    }
	                    else
	                    {
	                        $('#' + campo + '-error').hide();
	                        $('#' + campo + '-td').hide();
	                    }
	                }

	               	mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                    return false;
				}
			  }
		 });
	})

	// siempre que se seleccione un tipo-vehiculo, limpiamos tipo-caja.
	$("select#tipo-vehiculo").change(function() {
		$("select#tipo-caja").val('');
	});
</script>
{/literal}