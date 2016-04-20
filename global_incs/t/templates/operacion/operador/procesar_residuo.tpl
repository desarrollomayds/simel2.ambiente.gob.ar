<div class="form-group">
	<label class="col-sm-3 control-label">Fecha Tratamiento *</label>
	<div class="col-sm-9">
		<input class="form-control" style="width:450px;float:right;" type="text" id="fecha_tratamiento" name="fecha_tratamiento">
		<div id="fecha_tratamiento-td"><div class="form_error_msg" id="fecha_tratamiento-error" style="display:none;"></div></div>
	</div>
</div>
<div class="clear20"></div>

<div class="form-group">
	<label class="col-sm-4 control-label">Tratamiento del Residuo</label>
	<div class="col-sm-8">
		<select class="form-control tratamientos" name='tratamiento' id='tratamiento'>
			<option value="0" selected>[SELECCIONE UN TRATAMIENTO]</option>
			{foreach $TRATAMIENTOS as $tratamiento}
				<option value='{$tratamiento->codigo}' descripcion="{$tratamiento->descripcion}">{$tratamiento->codigo} - {$tratamiento->descripcion}</option>
			{/foreach}
		</select>
	</div>
</div>
<div class="clear20"></div>
<div align="right">
	<button type="button" class="btn btn-success btn-sm" onclick="procesarResiduo($(this));"
		residuo-relacion-id="{$RESIDUO_RELACION_ID}" manifiesto-id="{$MANIFIESTO_ID}"  data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>

<script>
{literal}

	$(document).ready(function() {

	    $('#fecha_tratamiento').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });

	    $(".tratamientos").chosen({width:"450px"});

	});

	function setearTratamiento(obj)
	{
		var residuo_relacion_id = obj.attr('residuo-relacion-id');
		var tratamiento = $("select#tratamiento :selected").val();
		var tratamiento_descripcion = $("select#tratamiento :selected").attr('descripcion');

		if (tratamiento != 0) {
			//console.info("seteando tratamiento_residuo_"+residuo_relacion_id+" con tratamiento: "+tratamiento);
			//console.info("seteando tratamiento_descripcion_"+residuo_relacion_id+" con desc: "+tratamiento_descripcion);
			$("span#tratamiento_residuo_"+residuo_relacion_id).html(tratamiento);
			$("span#tratamiento_descripcion_"+residuo_relacion_id).html(tratamiento_descripcion);
			hideTratamientosPopup();
			showTratamientoSeleccionado(residuo_relacion_id);
		} else {
			mostrarMensaje("exclamation-triangle", "Debe elegir el tratamiento para el residuo del manifiesto", "error");
		}
	}

	function clearTratamientoSeleccionado()
	{
		$("span#tratamiento_codigo").val('');
		$("span#tratamiento_descripcion").val('');
		$("div#tratamientos_definidos").hide();	
	}

	function procesarResiduo(objButton)
	{
		var residuo_relacion_id = objButton.attr('residuo-relacion-id');
		var manifiesto_id = objButton.attr('manifiesto-id');
		var tratamiento = $("select#tratamiento :selected").val();
		var tratamiento_descripcion = $("select#tratamiento :selected").attr('descripcion');
		var fecha_tratamiento = $("input#fecha_tratamiento").val();
		var errors = '';

		objButton.button('loading');

		if (fecha_tratamiento == 0) {
			errors += " Debe indicar la fecha del tratamiento.";
		}

		if (tratamiento == 0) {
			errors += " Debe elegir el tratamiento para el residuo del manifiesto";
		}

		if (errors == '') {
			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/operador/procesar_residuo.php",
				data: {
					manifiesto_id: manifiesto_id,
					residuo_relacion_id: residuo_relacion_id,
					fecha_tratamiento: fecha_tratamiento,
					tratamiento: tratamiento
				},
				dataType: "text json",
				success: function(retorno) {
					objButton.button('reset');
					if (retorno['estado'] != 0) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
					} else {
						mostrarMensaje("exclamation-triangle","Tratamiento aceptado","success");
						// cerramos modal y recargamos modal procesar manifiesto.
						$('#tratamientos_popup').modal('hide');
						procesarManifiesto(manifiesto_id);
					}
				}
			});
		} else {
			objButton.button('reset');
			mostrarMensaje("exclamation-triangle", errors, "error");
		}
	}

{/literal}
</script>
