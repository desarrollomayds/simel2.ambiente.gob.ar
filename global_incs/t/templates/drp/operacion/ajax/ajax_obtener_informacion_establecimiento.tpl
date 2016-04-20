<div role="tabpanel" class="bs-example tab-pane tabUnique" id="subt_{$ESTABLECIMIENTO.ID}">
	<p>
		<strong>Nombre: </strong><span>{$ESTABLECIMIENTO.NOMBRE}</span>
		<br>
		<strong>Tipo: </strong>{$ESTABLECIMIENTO.TIPO_}
		<br>
		<strong>Usuario: </strong>{$ESTABLECIMIENTO.USUARIO}
		<h3 class="bg-warning">
			<strong>CAA: </strong><span>{$ESTABLECIMIENTO.CAA_NUMERO}</span>
			<strong>Vencimiento: </strong><span>{$ESTABLECIMIENTO.CAA_VENCIMIENTO}</span>
		 </h3>
	</p>
	<h3 class="bg-warning">
		<strong>Expediente: </strong>
		<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exnu" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}" class="editableFeld">{if $ESTABLECIMIENTO.EXPEDIENTE_NUMERO}{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}{else}-{/if}</span>
		
		<strong>A&ntilde;o: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exanio" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}" class="editableFeld">{if $ESTABLECIMIENTO.EXPEDIENTE_ANIO}{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}{else}-{/if}</span>
	</h3>
	<strong>Actividad: </strong><span>{$ESTABLECIMIENTO.ACTIVIDAD_}</span>
	<br>
	<strong>Descripci&oacute;n: </strong><span>{$ESTABLECIMIENTO.DESCRIPCION}</span>
	<br>
	<strong>Direcci&oacute;n Email: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/email" data-id="{$ESTABLECIMIENTO.EMAIL}" class="editableFeld">{$ESTABLECIMIENTO.EMAIL}</span>

	<hr>
	<div class="row">
		<div class="col-md-4">
			<strong>Domicilio real</strong>
			<br>
			<br>
			<strong>Calle: </strong><span>{$ESTABLECIMIENTO.CALLE_R}</span>
			<br>
			<strong>N&uacute;mero: </strong><span>{$ESTABLECIMIENTO.NUMERO_R}</span>
			<strong>Piso: </strong><span>{$ESTABLECIMIENTO.PISO_R}</span>
			<br>
			<strong>Provincia: </strong><span>{$ESTABLECIMIENTO.PROVINCIA_R_}</span>
			<br>
			<strong>Localidad: </strong><span>{$ESTABLECIMIENTO.LOCALIDAD_R_}</span>
			<br>
			<strong>C. Postal: </strong><span>{$ESTABLECIMIENTO.CODIO_POSTAL}</span>
		</div>
		<div class="col-md-4">
			<strong>Domicilio constituido</strong>
			<br>
			<br>
			<strong>Calle: </strong><span>{$ESTABLECIMIENTO.CALLE_C}</span>
			<br>
			<strong>N&uacute;mero: </strong><span>{$ESTABLECIMIENTO.NUMERO_C}</span>
			<strong>Piso: </strong><span>{$ESTABLECIMIENTO.PISO_C}</span>
			<br>
			<strong>Provincia: </strong><span>{$ESTABLECIMIENTO.PROVINCIA_C_}</span>
			<br>
			<strong>Localidad: </strong><span>{$ESTABLECIMIENTO.LOCALIDAD_C_}</span>
			<br>
			<strong>C. Postal: </strong><span>{$ESTABLECIMIENTO.CODIO_POSTAL_C}</span>
		</div>
		<div class="col-md-4">
			<strong>Nomenclatura Catastral: </strong>
			<span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC}</span> -
			<span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC}</span> -
			<span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}</span> -
			<span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}</span> -
			<span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</span> &nbsp;&nbsp;&nbsp;&nbsp;
			<br>
			<strong>Habilitaciones: </strong><span>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUBPARC}</span>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
	<br>
	<div id="container_establecimiento_permisos_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}">

		{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
			<div class="bs-example" id="container_residuo_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}_{$PERMISO.RESIDUO}">
				<p>
					<strong>CSC: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span>
					<br>
					<strong>Descripci&oacute;n: </strong><span>{$PERMISO.RESIDUO_}</span>
					<br>
					{if $ESTABLECIMIENTO.TIPO == 1}
						<strong>Cantidad: </strong>
						<span>{$PERMISO.CANTIDAD}</span>
						<br> 
					{/if}

					{if $ESTABLECIMIENTO.TIPO == 3}
						<strong>Tratamientos: </strong>
						<ul>
							{foreach $PERMISO.TRATAMIENTOS as $TRAT}
								<li>{$TRAT}</li>
							{/foreach}
						</ul>
					{/if}
				</p>
			</div>
		{/foreach}
	</div> <!-- end div container_establecimiento_permisos -->

	{if $ESTABLECIMIENTO.TIPO == 2}

		<div id="container_vehiculos_transportista">
			{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
				<div class="bs-example vehiculos_establecimiento" id="container_vehiculo_{$VEHICULO.ID}">
					<p>
						<strong>Dominio/Matr&iacute;cula: </strong><span>{$VEHICULO.DOMINIO}</span><br>
						<strong>Tipo veh&iacute;culo: </strong><span>{TipoVehiculo::get_descripcion_by_codigo($VEHICULO.TIPO_VEHICULO)}</span><br>
						<strong>Tipo caja: </strong><span>{TipoCaja::get_descripcion_by_codigo($VEHICULO.TIPO_CAJA)}</span><br>
						<strong>Descripci&oacute;n: </strong><span>{$VEHICULO.DESCRIPCION}</span>
					</p>
				</div> <!-- end of container_vehiculo_{$VEHICULO.ID} -->

				<div class="bs-example" id="container_permisos_vehiculo_{$VEHICULO.ID}" style="    margin-left: 35px;">
					<p class="registro-titulo bg-warning">
						<b>Permisos del Veh&iacute;culo:</b>
					</p>
					{foreach $VEHICULO.PERMISOS as $PERMISO}
						<div class="bs-example permisos_vehiculo_{$VEHICULO.ID}" id="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}">
							<p>

								<strong>CSC: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span><br>
								<strong>Descripci&oacute;n: </strong><span>{$PERMISO.RESIDUO_}</span><br>
								<strong>Cantidad: </strong><span>{$PERMISO.CANTIDAD} kg</span><br>
								<strong>Estado: </strong><span>{$PERMISO.ESTADO_}</span>

							</p>
						</div>
					{/foreach}
				</div> <!-- end of container_permisos_vehiculo_{$VEHICULO.ID} -->
			{/foreach}
		</div> <!-- end of container_vehiculos_transportista -->
	{/if}
</div>

{literal}
<script>
	$(document).ready(function() {

		$(".js-mupe").find("li").first().addClass("active");

		$('.editableFeld').each(function() {
			var opts = Array();
			if($(this).data('array')=="1") {
				opts.source = window[$(this).attr('data-values')];
				opts.type = 'select';
				opts.value = $(this).attr('data-id');
			}

			if($(this).attr('data-type')=="textarea") {
				opts.type = 'textarea';
			}
			opts.pk = $(this).attr('data-pk');
			opts.name = $(this).attr('data-name');
			opts.url = 'editField.php';
			opts.emptytext = '';
			opts.success = function(response, newValue) {
				if($(this).data('name')=="Veh/dom") {
					$('#vh2_'+$(this).data('pk')).html(newValue);
				}
				if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
					$(this).parent().parent().find('#callbPerm').html(newValue);
				}

			};
			$(this).editable(opts);
		});
	}); // end of $(document).ready()

</script>
{/literal}