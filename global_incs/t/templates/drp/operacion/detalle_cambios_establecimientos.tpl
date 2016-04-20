<style type="text/css">{literal}{/literal}</style>

<div class="backGrey">

	<div class="alert alert-info" role="alert" style="font-weight:bold;">
		{if $cambio->tipo_cambio == 'E'}
			Cambios en la informaci&oacute;n del Establecimientos
		{elseif $cambio->tipo_cambio == 'A'}
			Info de la Nueva sucursal
		{/if}
	</div>

	<div class="bs-example">

		<form class="form-horizontal">

			<div class="form-group">
				<label class="col-sm-2 control-label">Establecimiento</label>
				<div class="col-sm-10">
					<input class="form-control" name='nombre' id='nombre' value="{$cambio->nombre}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">CAA</label>
				<div class="col-sm-10">
					<input class="form-control" name='caa_numero' id='caa_numero' value="{$cambio->caa_numero}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">CAA Vencimiento</label>
				<div class="col-sm-10">
					<input class="form-control" name='caa_vencimiento' id='caa_vencimiento' value="{if $cambio->caa_vencimiento} {$cambio->caa_vencimiento->format('Y-m-d')} {/if}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Expediente / A&ntilde;o</label>
				<div class="col-sm-10">
					<input class="form-control" name='expediente' id='expediente' value="{$cambio->expediente_numero} / {$cambio->expediente_anio}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Actividad</label>
				<div class="col-sm-10">
					<textarea class="form-control" name='codigo_actividad' id='codigo_actividad' disabled>{obtener_actividad($cambio->codigo_actividad)}</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Descripci&oacute;n</label>
				<div class="col-sm-10">
					<textarea class="form-control" name='descripcion' id='descripcion' disabled>{$cambio->descripcion}</textarea>
				</div>
			</div>

			<p class="registro-titulo bg-info">Domicilio Real</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">N&uacute;mero</label>
				<div class="col-sm-10">
					<input class="form-control" name='numero' id='numero' value="{$cambio->numero}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">C&oacute;digo Postal</label>
				<div class="col-sm-10">
					<input class="form-control" name='codigo_postal' id='codigo_postal' value="{$cambio->codigo_postal}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Piso</label>
				<div class="col-sm-10">
					<input class="form-control" name='piso' id='piso' value="{$cambio->piso}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Provincia</label>
				<div class="col-sm-10">
					<input class="form-control" name='provincia' id='provincia' value="{obtener_provincia($cambio->provincia)}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Localidad</label>
				<div class="col-sm-10">
					<input class="form-control" name='localidad' id='localidad' value="{obtener_localidad($cambio->localidad)}" disabled>
				</div>
			</div>

			<p class="registro-titulo bg-info">Domicilio Constituido</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">N&uacute;mero</label>
				<div class="col-sm-10">
					<input class="form-control" name='numero_c' id='numero_c' value="{$cambio->numero_c}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">C&oacute;digo Postal</label>
				<div class="col-sm-10">
					<input class="form-control" name='codigo_postal_c' id='codigo_postal_c' value="{$cambio->codigo_postal_c}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Piso</label>
				<div class="col-sm-10">
					<input class="form-control" name='piso_c' id='piso_c' value="{$cambio->piso_c}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Provincia</label>
				<div class="col-sm-10">
					<input class="form-control" name='provincia_c' id='provincia_c' value="{obtener_provincia($cambio->provincia_c)}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Localidad</label>
				<div class="col-sm-10">
					<input class="form-control" name='localidad_c' id='localidad_c' value="{obtener_localidad($cambio->localidad_c)}" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Nomenclatura Catastral</label>
				<div class="col-sm-10">
					<div style="float:left;margin-right:10px;">Cir: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_circ' id='nomenclatura_catastral_circ' value="{$cambio->nomenclatura_catastral_circ}" disabled></div>
					<div style="float:left;margin-right:10px;">Sec: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_sec' id='nomenclatura_catastral_sec' value="{$cambio->nomenclatura_catastral_sec}" disabled></div>
					<div style="float:left;margin-right:10px;">Manz: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_manz' id='nomenclatura_catastral_manz' value="{$cambio->nomenclatura_catastral_manz}" disabled></div>
					<div style="float:left;margin-right:10px;">Parc: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_parc' id='nomenclatura_catastral_parc' value="{$cambio->nomenclatura_catastral_parc}" disabled></div>
					<div style="float:left;margin-right:10px;">Sub Parc: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_sub_parc' id='nomenclatura_catastral_sub_parc' value="{$cambio->nomenclatura_catastral_sub_parc}" disabled></div>
				</div>
			</div>

			{* Es un pedido de alta de sucursal, vamos a mostrar los permisos que solicitó agregar *}
			{if $cambio->tipo_cambio == 'A'}
				<p class="registro-titulo bg-info">Permisos Solicitados para la sucursal</p>

				
			{/if}

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
			$("#detalle_establecimiento_popup").modal('hide');
		});
	});
</script>
{/literal}