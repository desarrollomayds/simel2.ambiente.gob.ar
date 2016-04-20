<div class="backGrey">

    <input type='hidden' name='residuo_accion'   id='residuo_accion'   value='{$ACCION}'     size='50'>
	<input type='hidden' name='residuo_id'       id='residuo_id'       value='{$RESIDUO.ID}' size='50'>

	<table width="495" border="0" cellspacing="0" cellpadding="5">

	<!--
		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Generador :</td>
			<td width="318" style="text-align: left;"  bordercolor="#EAEAE5"><label>	<select name='residuo_generador' id='residuo_generador' style='width: 275px;'>
			{foreach $GENERADORES as $GENERADOR}
				<option value='{$GENERADOR.ID}'>{$GENERADOR.ID} - {$GENERADOR.NOMBRE}</option>
			{/foreach}
			</select></label></td>
		</tr>
	-->

		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Residuo :</td>
			<td width="318" style="text-align: left;" bordercolor="#EAEAE5"><label>	<select name='residuo_residuo' id='residuo_residuo' style='width: 275px;'>
				{foreach $RESIDUOS as $RESIDUO_}
					<option value='{$RESIDUO_.CODIGO}' {if $RESIDUO_.CODIGO == $RESIDUO.RESIDUO}selected{/if}>{$RESIDUO_.CODIGO} - {$RESIDUO_.DESCRIPCION}</option>
				{/foreach}
				</select></label></td>
		</tr>

		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Contenedor :</td>
			<td width="318" style="text-align: left;"  bordercolor="#EAEAE5"><label>	<select name='residuo_contenedor' id='residuo_contenedor' style='width: 275px'>
				{foreach $CONTENEDORES as $CONTENEDOR}
					<option value='{$CONTENEDOR.CODIGO}' {if $CONTENEDOR.CODIGO == $RESIDUO.CONTENEDOR}selected{/if}>{$CONTENEDOR.CODIGO} - {$CONTENEDOR.DESCRIPCION}</option>
				{/foreach}
				</select></label></td>
		</tr>

		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Cantidad de contenedores :</td>
			<td width="318" style="text-align: left;"  bordercolor="#EAEAE5"><label><input type='text'   name='residuo_cantidad_contenedores' id='residuo_cantidad_contenedores' value='{$RESIDUO.CANTIDAD_CONTENEDORES}' size='30'></label></td>
		</tr>

		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Cantidad estimada :</td>
			<td width="318" style="text-align: left;"  bordercolor="#EAEAE5"><label><input type='text'   name='residuo_cantidad_estimada' id='residuo_cantidad_estimada' value='{$RESIDUO.CANTIDAD_ESTIMADA}' size='30'></label></td>
		</tr>

		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Unidad :</td>
			<td width="318" style="text-align: left;"  bordercolor="#EAEAE5">
				<label>
					<select name='residuo_unidad' id='residuo_unidad'>
						<option value='1' {if $RESIDUO.UNIDAD == 1}selected{/if}>kg</option>
						<option value='2' {if $RESIDUO.UNIDAD == 2}selected{/if}>m3</option>
					</select>
				</label>
			</td>
		</tr>


		<tr>
			<td width="167" height="25" align="right" bordercolor="#EAEAE5">Estado :</td>
			<td width="318" style="text-align: left;" bordercolor="#EAEAE5"><label>	<select name='residuo_estado' id='residuo_estado'>
					<option value='1' {if $RESIDUO.ESTADO == 1}selected{/if}>l&iacute;quido</option>
					<option value='2' {if $RESIDUO.ESTADO == 2}selected{/if}>s&oacute;lido</option>
					<option value='3' {if $RESIDUO.ESTADO == 3}selected{/if}>semi-s&oacute;lido</option>
				</select></label></td>
		</tr>

		<tr id='sumario_errores_2' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
	<div class=<div class="contBoton">
           <div class="bottonLeft" id='btn_aceptar' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_cancelar.gif" width="91" height="30" data-dismiss="modal"/>
        </div>
    </div>
    <div class="clear20"></div>
    </div>
{literal}
<script>
	$(function(){
		$('#residuo_cantidad_contenedores').filter_input({regex:'[0-9]'});
		$('#residuo_cantidad_estimada').filter_input({regex:'[0-9]'});

		//actualizar_permisos();
	});

	$('#btn_cerrar').click(function() {
		$('#div_popup').hide();
	})

	$('#btn_cancelar').click(function() {
		$('#div_popup').hide();
	})

	$('#btn_aceptar').click(function() {
		var campos  = [	'accion', 'contenedor', 'cantidad_contenedores', 'id', 'residuo', 'cantidad_estimada', 'unidad', 'estado', 'general'];
		var prefijo = 'residuo';

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/residuo.php",
			data:	{	accion                : $("#residuo_accion").val(),
						generador             : $("#residuo_generador").val(),
						contenedor            : $("#residuo_contenedor").val(),
						cantidad_contenedores : $("#residuo_cantidad_contenedores").val(),
						id                    : $("#residuo_id").val(),
						residuo               : $("#residuo_residuo").val(),
						cantidad_estimada     : $("#residuo_cantidad_estimada").val(),
						unidad                : $("#residuo_unidad").val(),
						estado                : $("#residuo_estado").val()
					},
			dataType: "text json",
			success: function(retorno) {
				if(retorno['estado'] == 0){
					if($("#residuo_accion").val() == 'alta'){
						agregar_residuo(retorno['datos']);
					}else{
						modificar_residuo(retorno['datos']);
					}
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
					}

					if(texto_errores != ''){
						$('#sumario_errores_2 td:first').html(texto_errores);
						$('#sumario_errores_2').show();
					}else{
						$('#sumario_errores_2').hide();
					}
				}
			}
		 });
	})
/*
	$('#residuo_generador').change(function() {
		actualizar_permisos();
	})
*/
	function actualizar_permisos(){
		$.ajax({
			type: "POST",
			url: "/operacion/transportista/residuo.php",
			data: {accion : 'permisos', generador : $("#residuo_generador").val()},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 0) {
					$('#residuo_residuo').find('option').remove();

					$.each(retorno['datos'], function(indice, permiso) {
						$('#residuo_residuo').append('<option value="' + permiso['RESIDUO'] + '">' + permiso['RESIDUO'] + ' - ' + permiso['RESIDUO_'] + '</option>').val(permiso['RESIDUO']);
					});

					$('#residuo_residuo').val($('#residuo_residuo option:first').val());

				} else {
					alert('Error actualizando permisos de generaci&oacute;n');
				}
		    }
		});
	}

</script>
{/literal}