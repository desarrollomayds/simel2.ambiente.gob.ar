<style type="text/css">{literal}{/literal}</style>

<div class="backGrey">

	<div class="alert alert-info" role="alert" style="font-weight:bold;">Info del nuevo veh&iacute;culo</div>

	<div class="bs-example">

		<form class="form-horizontal">

			<div class="form-group">
				<label class="col-sm-2 control-label">Dominio</label>
				<div class="col-sm-10">
					<input class="form-control" name='dominio' id='dominio' value="{$cambio->dominio}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo Veh&iacute;culo</label>
				<div class="col-sm-10">
					<input class="form-control" name='tipo_vehiculo' id='tipo_vehiculo' value="{TipoVehiculo::get_descripcion_by_codigo($cambio->tipo_vehiculo)}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo Caja</label>
				<div class="col-sm-10">
					<input class="form-control" name='tipo_caja' id='tipo_caja' value="{if $cambio->tipo_caja} {TipoCaja::get_descripcion_by_codigo($cambio->tipo_caja)} {/if}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Descripci&oacute;n</label>
				<div class="col-sm-10">
					<input class="form-control" name='descripcion' id='descripcion' value="{$cambio->descripcion}" disabled>
				</div>
			</div>
		</form>

	</div>

	<div align="right">
		<button class="btn btn-info btn-sm" type="button" id="boton_cerrar" style="margin-left:10px;">Cerrar</button>
	</div>

	<div class="clear20"></div>
</div>

{literal}
<script>
	$(document).ready(function() {
		$(document).on('click', '#boton_cerrar', function() {
			$("#detalle_vehiculo_popup").modal('hide');
		});
	});
</script>
{/literal}