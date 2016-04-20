<div class="backGrey" id="residuos_popup">

    <input type='hidden' name='residuo_accion' id='residuo_accion' value='{$ACCION}' size='50'>
	<input type='hidden' name='residuo_id' id='residuo_id' value='{$RESIDUO.ID}' size='50'>
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Residuo</label>
			<div class="col-sm-10">
				<select class="form-control residuos" name='residuo_residuo' id='residuo_residuo' >
					{foreach $RESIDUOS as $RESIDUO_}
						<option value='{$RESIDUO_.CODIGO}' {if $RESIDUO_.CODIGO == $RESIDUO.RESIDUO}selected{/if}>{$RESIDUO_.CODIGO} - {$RESIDUO_.DESCRIPCION}
						</option>
					{/foreach}
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Peligrosidad</label>
			<div class="col-sm-10">
				<select class="form-control residuos" name='peligrosidad_peligrosidad' id='peligrosidad_peligrosidad' >
					{foreach $PELIGROSIDAD as $PELIGRO}
						<option value='{$PELIGRO.codigo}'>
						{$PELIGRO.codigo} - {$PELIGRO.descripcion} 
						</option>
					{/foreach}
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Contenedor</label>
			<div class="col-sm-10">
				<select class="form-control" name='residuo_contenedor' id='residuo_contenedor'>
					{foreach $CONTENEDORES as $CONTENEDOR}
						<option value='{$CONTENEDOR.CODIGO}' {if $CONTENEDOR.CODIGO == $RESIDUO.CONTENEDOR}selected{/if}>{$CONTENEDOR.CODIGO} - {$CONTENEDOR.DESCRIPCION}</option>
					{/foreach}
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad de contenedores</label>
			<div class="col-sm-10">
				<input type='text' class="form-control" name='residuo_cantidad_contenedores' id='residuo_cantidad_contenedores' value='{$RESIDUO.CANTIDAD_CONTENEDORES}' size='30'>
			</div>
			<div class="form_error_msg" id="cantidad_contenedores-error" style="display:none;"></div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad estimada (kg)</label>
			<div class="col-sm-10">
				<input type='text' class="form-control" name='residuo_cantidad_estimada' id='residuo_cantidad_estimada' value='{$RESIDUO.CANTIDAD_ESTIMADA}' size='30'>
			</div>
			<div class="form_error_msg" id="cantidad_estimada-error" style="display:none;"></div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-10">
				<select class="form-control" name='residuo_estado' id='residuo_estado'>
					<option value='1' {if $RESIDUO.ESTADO == 1}selected{/if}>l&iacute;quido</option>
					<option value='2' {if $RESIDUO.ESTADO == 2}selected{/if}>s&oacute;lido</option>
					<option value='3' {if $RESIDUO.ESTADO == 3}selected{/if}>semi-s&oacute;lido</option>
				</select>
			</div>
		</div>
	</form>

    <div align="right">
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar'>Aceptar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

	<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="{$TIPO_MANIFIESTO}"/>

    <div class="clear20"></div>
</div>

{literal}
<script>
	$('#residuo_cantidad_contenedores').filter_input({regex:'[0-9]'});
	$('#residuo_cantidad_estimada').filter_input({regex:'[0-9]'});

	$(".residuos").chosen({width: "100%;"});

	$('#btn_aceptar').click(function() {
		var tipo_manifiesto = $("input#tipo_manifiesto").val();
		var campos  = [	'accion', 'contenedor', 'cantidad_contenedores', 'id', 'peligrosidad', 'residuo', 'cantidad_estimada', 'estado'];
		var prefijo = 'residuo';

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/generador/residuo.php",
			data:	{	accion                : $("#residuo_accion").val(),
						contenedor            : $("#residuo_contenedor").val(),
						cantidad_contenedores : $("#residuo_cantidad_contenedores").val(),
						id                    : $("#residuo_id").val(),
						peligrosidad          : $("#peligrosidad_peligrosidad").val(),
						residuo               : $("#residuo_residuo").val(),
						cantidad_estimada     : $("#residuo_cantidad_estimada").val(),
						estado                : $("#residuo_estado").val(),
						tipo_manifiesto 	  : tipo_manifiesto
					},
			dataType: "text json",
			success: function(retorno){
				if (retorno['estado'] == 0) {
					// para manifiesto multiple solo queremos permitir SOLO UN residuo.
					if (tipo_manifiesto == 1) {
						agregar_residuo(retorno['datos'], true);
					} else {
						agregar_residuo(retorno['datos']);
					}
					// en caso de exito cerramos manualmente el modal.
					$('#mel_popup').modal('hide');
				} else {
					for(campo in campos){
						texto_errores = '';
						campo = campos[campo];

						if(retorno['errores'][campo] != null) {
							texto_errores = retorno['errores'][campo];
							$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
							$('#' + campo).addClass('error_de_carga');
						}else{
							$('#' + campo).removeClass('error_de_carga');
						}

						if(texto_errores != ''){
							$('#' + campo + '-error').html(texto_errores);
							$('#' + campo + '-error').show();
						}else{
							$('#' + campo + '-error').hide();
						}
					}

					if (retorno['errores']['duplicado']) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['duplicado'],"error");
					}

					// previene en el caso de errpr el close del modal del boton aceptar.
					return false;
				}
			}
		});
	});

</script>
{/literal}