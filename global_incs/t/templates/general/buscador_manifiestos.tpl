<div class="table-responsive bs-example" style="font-size: 12px;">
	<h5><b>Criterio de B&uacute;squeda</b></h5>
	<form class="form-inline" action="{$form_action}" method="GET" style="margin-bottom:5px;">

		{if in_array('protocolo_id', $filtros_buscador)}
			<div class="form-group" style="margin ">
				<label for="protocolo_id">Protocolo</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="number" class="form-control" id="protocolo_id" name="protocolo_id" placeholder="Nro Protocolo" value="{$criterios.protocolo_id}">
			</div>
		{/if}

		{if in_array('manifiesto_id', $filtros_buscador)}
			<div class="form-group" style="margin ">
				<label for="manifiesto_id">ID Operaci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="number" class="form-control" id="manifiesto_id" name="manifiesto_id" placeholder="ID Operaci&oacute;n" value="{$criterios.manifiesto_id}">
			</div>
		{/if}

		{if in_array('creador_empresa', $filtros_buscador)}
			<div class="form-group">
				<label for="empresa">Creador</label>
				<input style="width:170px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="empresa" name="empresa" placeholder="CUIT o Raz&oacute;n Social" value="{$criterios.empresa}">
			</div>
		{/if}

		{if in_array('fecha_creacion', $filtros_buscador)}
			<div class="form-group">
				<label for="fecha_creacion">Fecha Creaci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Fecha Creaci&oacute;n" value="{$criterios.fecha_creacion}">
			</div>
		{/if}

		{if in_array('fecha_recepcion', $filtros_buscador)}
			<div class="form-group">
				<label for="fecha_recepcion">Fecha Recepci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" placeholder="Fecha Recepci&oacute;n" value="{$criterios.fecha_recepcion}">
			</div>
		{/if}

		{if in_array('fecha_tratamiento', $filtros_buscador)}
			<div class="form-group">
				<label for="fecha_tratamiento">Fecha Tratamiento</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_tratamiento" name="fecha_tratamiento" placeholder="Fecha Tratamiento" value="{$criterios.fecha_tratamiento}">
			</div>
		{/if}

		{if in_array('fecha_rechazo', $filtros_buscador)}
			<div class="form-group">
				<label for="fecha_rechazo">Fecha Rechazo</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_rechazo" name="fecha_rechazo" placeholder="Fecha Rechazo" value="{$criterios.fecha_rechazo}">
			</div>
		{/if}

		<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="{$tipo_manifiesto}" />
		<input type="hidden" id="pendiente_por" name="pendiente_por" value="{$pendiente_por}" />
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>

<script>
{literal}
	$(document).ready(function() {
		$('#fecha_creacion').datepicker({
			format: 'yyyy-mm-dd',
			endDate: new Date()
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
		});

		$('#fecha_recepcion').datepicker({
			format: 'yyyy-mm-dd',
			endDate: new Date()
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });
	});

{/literal}
</script>