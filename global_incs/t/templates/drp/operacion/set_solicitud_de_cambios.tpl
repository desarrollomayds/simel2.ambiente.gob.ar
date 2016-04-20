<style type="text/css">{literal}
	.aprobado {color:green;font-weight:bold;}
	.rechazado {color:red;font-weight:bold;}
{/literal}</style>

<div class="backGrey" id="residuos_popup">

	{* cuento los cambios en estado 'P' *}
	{assign var="counter_pendientes" value="0"}

	<div class="bs-example">

		{if $data.cambios_establecimiento}
			<div class="alert alert-info" role="alert" style="font-weight:bold;">Cambios para el establecimiento: {$establecimiento->nombre}</div>

			{if $data.cambios_establecimiento.info}
				<div class="bs-example" id="">
					<table class="table table-hover table-striped" id="">
						<thead>
							<tr>
								<th>Tipo Solicitud: Cambios en la informaci&oacute;n del establecimiento</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{$establecimiento->nombre}</td>
								<td>
									<div class="container_buttons" id="container_buttons_ce_{$solicitud->id}_{$data.cambios_establecimiento.info->id}" style="float:right;">
										{if $data.cambios_establecimiento.info->estado == 'A'}
											<span class="aprobado">APROBADO</span>
										{elseif $data.cambios_establecimiento.info->estado == 'R'}
											<span class="rechazado">RECHAZADO</span>
										{elseif $data.cambios_establecimiento.info->estado == 'P'}
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioEstablecimiento({$solicitud->id}, {$data.cambios_establecimiento.info->id}, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioEstablecimiento({$solicitud->id}, {$data.cambios_establecimiento.info->id}, 'aceptar');"><span class="fa fa-check"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleCambioEstablecimiento({$solicitud->id}, {$data.cambios_establecimiento.info->id});" data-toggle="modal" data-target="#detalle_establecimiento_popup"><span class="fa fa-eye"></span></button>
										{/if}
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			{/if}

			{if $data.cambios_establecimiento.permisos}
				<div class="bs-example">
					<p class="registro-titulo bg-info">Cambios en Permisos del Establecimiento</p>
					{foreach $data.cambios_establecimiento.permisos as $cpe}

						{if $cpe->tipo_cambio == 'A'}
							{assign var="titulo" value="Agregar Permiso"}
						{elseif $cpe->tipo_cambio == 'E'}
							{assign var="titulo" value="Editar Permiso"}
						{else}
							{assign var="titulo" value="Borrar Permiso"}
						{/if}

						<div class="bs-example" id="item_cpe_{$solicitud->id}_{$cpe->id}">
							
							<div class="acciones">
								<div class="container_subtitle" style="float:left;">
									<b>{$titulo}</b>
								</div>
								<div class="container_buttons" id="container_buttons_cpe_{$solicitud->id}_{$cpe->id}" style="float:right;">
									{if $cpe->estado == 'A'}
										<span class="aprobado">APROBADO</span>
									{elseif $cpe->estado == 'R'}
										<span class="rechazado">RECHAZADO</span>
									{elseif $cpe->estado == 'P'}
										<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoEstablecimiento({$solicitud->id}, {$cpe->id}, 'rechazar');"><span class="fa fa-times"></span></button>
										<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoEstablecimiento({$solicitud->id}, {$cpe->id}, 'aceptar');"><span class="fa fa-check"></span></button>
									{/if}
								</div>
							</div>

							<div style="clear:both;"></div>
							<div class="contenidos" style="margin-top:10px;">
								{* AGREGANDO un residuo*}
								{if $cpe->tipo_cambio == 'A'}
									<div>CSC: {$cpe->residuo}</div>
									<div>Cantidad: {if $cpe->cantidad} {$cpe->cantidad} {else} - {/if}</div>

									{if $establecimiento->tipo == Establecimiento::OPERADOR}
										{if $cpe->tratamientos}
											<div>Tratamientos: {implode(' - ', json_decode($cpe->tratamientos))}</div>
										{else}
											<div>Tratamientos: {if $cpe->tratamientos} {$cpe->tratamientos} {else} - {/if}</div>
										{/if}
									{/if}
								{* EDITANDO un residuo*}
								{elseif $cpe->tipo_cambio == 'E'}
									<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
										<div><b>De</b></div>
										<div>CSC: {PermisoEstablecimiento::find($cpe->permiso_id)->residuo}</div>
										<div>Cantidad: {if PermisoEstablecimiento::find($cpe->permiso_id)->cantidad} {PermisoEstablecimiento::find($cpe->permiso_id)->cantidad} {else} - {/if}</div>

										{if $establecimiento->tipo == Establecimiento::OPERADOR}
											{if PermisoEstablecimiento::find($cpe->permiso_id)->tratamientos}
												Tratamientos: 
												{foreach PermisoEstablecimiento::find($cpe->permiso_id)->tratamientos as $trat}
													{$trat->operacion_residuo} - 
												{/foreach}
											{else}
												<div>Tratamientos: - </div>
											{/if}
										{/if}
									</div>
									<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
										<div><b>A</b></div>
										<div>{$cpe->residuo}</div>
										<div>Cantidad: {if $cpe->cantidad} {$cpe->cantidad} {else} - {/if}</div>

										{if $establecimiento->tipo == Establecimiento::OPERADOR}
											{if $cpe->tratamientos}
												<div>Tratamientos: {implode(' - ', json_decode($cpe->tratamientos))}</div>
											{else}
												<div>Tratamientos: {if $cpe->tratamientos} {$cpe->tratamientos} {else} - {/if}</div>
											{/if}
										{/if}
									</div>
									<div style="clear:both;"></div>
								{* BORRANDO un residuo*}
								{else}
									<div>CSC: {PermisoEstablecimiento::find($cpe->permiso_id)->residuo}</div>
								{/if}
							</div>
						</div>
					{/foreach}
				</div>
			{/if}
		{/if}

		{if $data.cambios_caa}
			<div class="bs-example">
				<p class="registro-titulo bg-info">Cambio en CAA del establecimiento</p>
				{foreach $data.cambios_caa as $ccaa}
					<div class="bs-example" id="item_ccaa_{$solicitud->id}_{$ccaa->id}">
						
						<div class="acciones">
							<div class="container_subtitle" style="float:left;">
								<b>Modificaci&oacute;n en la info del CAA</b>
							</div>
							<div class="container_buttons" id="container_buttons_ccaa_{$solicitud->id}_{$ccaa->id}" style="float:right;">
								{if $ccaa->estado == 'A'}
									<span class="aprobado">APROBADO</span>
								{elseif $ccaa->estado == 'R'}
									<span class="rechazado">RECHAZADO</span>
								{elseif $ccaa->estado == 'P'}
									<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioCaa({$solicitud->id}, {$ccaa->id}, 'rechazar');"><span class="fa fa-times"></span></button>
									<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioCaa({$solicitud->id}, {$ccaa->id}, 'aceptar');"><span class="fa fa-check"></span></button>
								{/if}
							</div>
						</div>

						<div style="clear:both;"></div>
						<div class="contenidos" style="margin-top:10px;">
							{* EDIT de CAA *}
							{if $ccaa->tipo_cambio == 'E'}
								<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
									<div><b>CAA Actual</b></div>
									<div>Nro: {$ccaa->caa_numero_old}</div>
									<div>Vencimiento: {if $ccaa->caa_vencimiento_old} {$ccaa->caa_vencimiento_old->format('Y-m-d')} {else} &nbsp;-&nbsp; {/if}</div>
								</div>
								<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
									<div><b>CAA Modificado</b></div>
									<div>Nro: {$ccaa->caa_numero_new}</div>
									<div>Vencimiento: {if $ccaa->caa_vencimiento_new} {$ccaa->caa_vencimiento_new->format('Y-m-d')} {else} &nbsp;-&nbsp; {/if}</div>
								</div>
								<div style="clear:both;"></div>
							{/if}
						</div>
					</div>
				{/foreach}
			</div>
		{/if}

		{if $data.nuevas_sucursales}
			{foreach $data.nuevas_sucursales as $key => $suc}
				<div class="alert alert-info" role="alert" style="font-weight:bold;">Nueva Sucursal: {$suc.info->nombre}</div>
				<div class="bs-example" id="">
					<table class="table table-hover table-striped" id="">
						<thead>
							<tr>
								<th>Tipo Solicitud: Nueva Sucursal</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{$suc.info->nombre}</td>
								<td>
									<div class="container_buttons" id="container_buttons_ce_{$solicitud->id}_{$suc.info->id}" style="float:right;">
										{if $suc.info->estado == 'A'}
											<span class="aprobado">APROBADO</span>
										{elseif $suc.info->estado == 'R'}
											<span class="rechazado">RECHAZADO</span>
										{elseif $suc.info->estado == 'P'}
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioEstablecimiento({$solicitud->id}, {$suc.info->id}, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioEstablecimiento({$solicitud->id}, {$suc.info->id}, 'aceptar');"><span class="fa fa-check"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleCambioEstablecimiento({$solicitud->id}, {$suc.info->id});" data-toggle="modal" data-target="#detalle_establecimiento_popup"><span class="fa fa-eye"></span></button>
										{/if}
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				{if $suc.permisos}
					<div class="bs-example">
						<p class="registro-titulo bg-info">Permisos para la nueva sucursal: </p>
						{foreach $suc.permisos as $suc_perm}
							<div class="bs-example" id="item_cpe_{$solicitud->id}_{$suc_perm->id}">
								
								<div class="acciones">
									<div class="container_subtitle" style="float:left;">
										<b>Agregar Permiso</b>
									</div>
									<div class="container_buttons" id="container_buttons_cpe_{$solicitud->id}_{$suc_perm->id}" style="float:right;">
										{if $suc_perm->estado == 'A'}
											<span class="aprobado">APROBADO</span>
										{elseif $suc_perm->estado == 'R'}
											<span class="rechazado">RECHAZADO</span>
										{elseif $suc_perm->estado == 'P'}
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoEstablecimiento({$solicitud->id}, {$suc_perm->id}, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoEstablecimiento({$solicitud->id}, {$suc_perm->id}, 'aceptar');"><span class="fa fa-check"></span></button>
										{/if}
									</div>
								</div>

								<div style="clear:both;"></div>
								<div class="contenidos" style="margin-top:10px;">
									{* AGREGANDO un residuo*}
									<div>CSC: {$suc_perm->residuo}</div>
									<div>Cantidad: {if $suc_perm->cantidad} {$suc_perm->cantidad} {else} - {/if}</div>

									{if $establecimiento->tipo == Establecimiento::OPERADOR}
										{if $suc_perm->tratamientos}
											<div>Tratamientos: {implode(' - ', json_decode($suc_perm->tratamientos))}</div>
										{else}
											<div>Tratamientos: {if $suc_perm->tratamientos} {$suc_perm->tratamientos} {else} - {/if}</div>
										{/if}
									{/if}
								</div>
							</div>
						{/foreach}
					</div>
				{/if}
			{/foreach}
		{/if}

		{if $data.cambios_vehiculos}
			{foreach $data.cambios_vehiculos as $key => $cv}
				{if $key == 'nuevos'}
					{foreach $cv as $new_vehiculo}
						<div class="alert alert-info" role="alert" style="font-weight:bold;">Nuevo Veh&iacute;culo: {$new_vehiculo->dominio}</div>
						<div class="bs-example" id="">
							<table class="table table-hover table-striped" id="">
								<thead>
									<tr>
										<th>Tipo Solicitud: Nuevo Veh&iacute;culo</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{$new_vehiculo->dominio}</td>
										<td>
											<div class="container_buttons" id="container_buttons_cv_{$solicitud->id}_{$new_vehiculo->id}" style="float:right;">
												{if $new_vehiculo->estado == 'A'}
													<span class="aprobado">APROBADO</span>
												{elseif $new_vehiculo->estado == 'R'}
													<span class="rechazado">RECHAZADO</span>
												{elseif $new_vehiculo->estado == 'P'}
													<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioVehiculo({$solicitud->id}, {$new_vehiculo->id}, 'rechazar');"><span class="fa fa-times"></span></button>
													<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioVehiculo({$solicitud->id}, {$new_vehiculo->id}, 'aceptar');"><span class="fa fa-check"></span></button>
													<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleVehiculo({$solicitud->id}, {$new_vehiculo->id});" data-toggle="modal" data-target="#detalle_vehiculo_popup"><span class="fa fa-eye"></span></button>
												{/if}
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					{/foreach}
				{else}
					{if $cv.info}
						<div class="alert alert-info" role="alert" style="font-weight:bold;">
							{if $cv.info->dominio}
								Veh&iacute;culo: {$cv.info->dominio}
							{else}
							 	Veh&iacute;culo: {Vehiculo::find($cv.info->vehiculo_id)->dominio}
							 {/if}
						</div>
						<div class="bs-example" id="item_cv_{$solicitud->id}_{$cv.info->id}">
							<div class="acciones">
								<div class="container_subtitle" style="float:left;">
									{if $cv.info->tipo_cambio == 'E'}
										<b>Editar Informaci&oacute;n</b>
									{elseif $cv.info->tipo_cambio == 'B'}
										<b>Borrar Veh&iacute;culo</b>
									{/if}
								</div>
								<div class="container_buttons" id="container_buttons_cv_{$solicitud->id}_{$cv.info->id}" style="float:right;">
									{if $cv.info->estado == 'A'}
										<span class="aprobado">APROBADO</span>
									{elseif $cv.info->estado == 'R'}
										<span class="rechazado">RECHAZADO</span>
									{elseif $cv.info->estado == 'P'}
										<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioVehiculo({$solicitud->id}, {$cv.info->id}, 'rechazar');"><span class="fa fa-times"></span></button>
										<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioVehiculo({$solicitud->id}, {$cv.info->id}, 'aceptar');"><span class="fa fa-check"></span></button>
									{/if}
								</div>
							</div>

							<div style="clear:both;"></div>
							<div class="contenidos" style="margin-top:10px;">
								{* EDITANDO un vehiculo*}
								{if $cv.info->tipo_cambio == 'E'}
									<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
										<div><b>De</b></div>
										<div>Dominio/Matr&iacute;cula: {Vehiculo::find($cv.info->vehiculo_id)->dominio}</div>
										<div>Tipo Veh&iacute;culo: {TipoVehiculo::get_descripcion_by_codigo(Vehiculo::find($cv.info->vehiculo_id)->tipo_vehiculo)}</div>
										<div>Tipo Caja: {if Vehiculo::find($cv.info->vehiculo_id)->tipo_caja} {TipoCaja::get_descripcion_by_codigo(Vehiculo::find($cv.info->vehiculo_id)->tipo_caja)} {else} - {/if}</div>
										<div>Descripci&oacute;n: {Vehiculo::find($cv.info->vehiculo_id)->descripcion}</div>
									</div>
									<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
										<div><b>A</b></div>
										<div>Dominio/Matr&iacute;cula: {$cv.info->dominio}</div>
										<div>Tipo Veh&iacute;culo: {TipoVehiculo::get_descripcion_by_codigo($cv.info->tipo_vehiculo)}</div>
										<div>Tipo Caja: {if $cv.info->tipo_caja} {TipoCaja::get_descripcion_by_codigo($cv.info->tipo_caja)} {else} - {/if}</div>
										<div>Descripci&oacute;n: {$cv.info->descripcion}</div>
									</div>
									<div style="clear:both;"></div>
								{* BORRANDO un vehiculo*}
								{elseif $cv.info->tipo_cambio == 'B'}
									<div>Dominio/Matr&iacute;cula: {Vehiculo::find($cv.info->vehiculo_id)->dominio}</div>
									<div>Tipo Veh&iacute;culo: {TipoVehiculo::get_descripcion_by_codigo(Vehiculo::find($cv.info->vehiculo_id)->tipo_vehiculo)}</div>
									<div>Tipo Caja: {if Vehiculo::find($cv.info->vehiculo_id)->tipo_caja} {TipoCaja::get_descripcion_by_codigo(Vehiculo::find($cv.info->vehiculo_id)->tipo_caja)} {else} - {/if}</div>
									<div>Descripci&oacute;n: {Vehiculo::find($cv.info->vehiculo_id)->descripcion}</div>
								{/if}
							</div>
						</div>
					{/if}
					{* permisos del vehiculo *}
					{if $cv.permisos}
						<div class="alert alert-info" role="alert" style="font-weight:bold;">Permisos del Veh&iacute;culo: {Vehiculo::find($key)->dominio}</div>
						{foreach $cv.permisos as $cpv}
							<div class="bs-example" id="item_cpv_{$solicitud->id}_{$cpv->id}">
								{if $cpv->tipo_cambio == 'A'}
									{assign var="titulo" value="Agregar Permiso"}
								{elseif $cpv->tipo_cambio == 'E'}
									{assign var="titulo" value="Editar Permiso"}
								{else}
									{assign var="titulo" value="Borrar Permiso"}
								{/if}

								<div class="acciones">
									<div class="container_subtitle" style="float:left;">
										<b>{$titulo}</b>
									</div>
									<div class="container_buttons" id="container_buttons_cpv_{$solicitud->id}_{$cpv->id}" style="float:right;">
										{if $cpv->estado == 'A'}
											<span class="aprobado">APROBADO</span>
										{elseif $cpv->estado == 'R'}
											<span class="rechazado">RECHAZADO</span>
										{elseif $cpv->estado == 'P'}
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoVehiculo({$solicitud->id}, {$cpv->id}, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoVehiculo({$solicitud->id}, {$cpv->id}, 'aceptar');"><span class="fa fa-check"></span></button>
										{/if}
									</div>
								</div>

								<div style="clear:both;"></div>
								<div class="contenidos" style="margin-top:10px;">
									{* AGREGANDO un vehiculo*}
									{if $cpv->tipo_cambio == 'A'}
										{* residuo, descripcion, estado, cantidad *}
										<div>CSC: {$cpv->residuo}</div>
										<!-- <div>Descripci&oacute;n: {obtener_categoria_residuo($cpv->residuo)}</div>-->
										<div>Estado: {obtener_estado($cpv->estado)}</div>
										<div>Cantidad: {$cpv->cantidad}</div>
									{* EDITANDO un vehiculo*}
									{elseif $cpv->tipo_cambio == 'E'}
										<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
											<div><b>De</b></div>
											<div>CSC: {PermisoVehiculo::find($cpv->vehiculo_permiso_id)->residuo}</div>
										<!--	<div>Descripci&oacute;n: {obtener_categoria_residuo(PermisoVehiculo::find($cpv->vehiculo_permiso_id)->residuo)}</div>-->
											<div>Estado: {obtener_estado(PermisoVehiculo::find($cpv->vehiculo_permiso_id)->estado)}</div>
											<div>Cantidad: {PermisoVehiculo::find($cpv->vehiculo_permiso_id)->cantidad}</div>
										</div>
										<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
											<div><b>A</b></div>
											<div>CSC: {$cpv->residuo}</div>
										<!--	<div>Descripci&oacute;n: {obtener_categoria_residuo($cpv->residuo)}</div>-->
											<div>Estado: {obtener_estado($cpv->estado)}</div>
											<div>Cantidad: {$cpv->cantidad}</div>
										</div>
										<div style="clear:both;"></div>
									{* BORRANDO un vehiculo*}
									{elseif $cpv->tipo_cambio == 'B'}
										<div>CSC: {PermisoVehiculo::find($cpv->vehiculo_permiso_id)->residuo}</div>
										<!--	<div>Descripci&oacute;n: {obtener_categoria_residuo(PermisoVehiculo::find($cpv->vehiculo_permiso_id)->residuo)}</div>-->
										<div>Estado: {obtener_estado(PermisoVehiculo::find($cpv->vehiculo_permiso_id)->estado)}</div>
										<div>Cantidad: {PermisoVehiculo::find($cpv->vehiculo_permiso_id)->cantidad}</div>
									{/if}
								</div>
							</div>
						{/foreach}
					{/if}
				{/if}
			{/foreach}
		{/if}

	</div>

	{* Hidden data *}
	<input type="hidden" id="establecimiento_id" name="establecimiento_id" value="{$establecimiento->id}" />

	<div align="right">
		<button class="btn btn-info btn-sm" type="button" style="margin-left:10px;" onclick="finalizarSolicitud({$solicitud->id})">Finalizar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

	<div class="clear20"></div>
</div>

{literal}
<script>
	$(document).ready(function() {});

	function operarCambioPermisoEstablecimiento(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cpe_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_permisos_establecimientos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function verDetalleCambioEstablecimiento(solicitud_id, cambio_id)
	{
		console.info("CambioEstablecimiento - solicitud: "+solicitud_id+" - "+"cambio_id: "+cambio_id);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_cambios_establecimientos.php",
			data: {
				solicitud_id: solicitud_id,
				cambio_id: cambio_id,
			},
			dataType: "html",
			success: function(html_response) {
				if (html_response != 'error') {
					$('#detalle_establecimiento_popup_title').html('Detalles');
					$('#detalle_establecimiento_popup_body').html(html_response);
					$('#detalle_establecimiento_popup_content').width(800);
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: 'No fue posible identificar el cambio solicitado. Por favor contacte al administrador del sitio.',
						type: BootstrapDialog.TYPE_DANGER,
					});
					$('#detalle_establecimiento_popup').modal('hide');
				}
			}
		});
	}

	function operarCambioEstablecimiento(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_ce_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_establecimientos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
						if (retorno['permisos_sucursal']) {
							$.each(retorno['permisos_sucursal'], function(key, cp_suc_id) {
								var container_buttons_permiso_sucursal = $('div#container_buttons_cpe_'+solicitud_id+'_'+cp_suc_id);
								container_buttons_permiso_sucursal.html('<span class="rechazado">RECHAZADO</span>');
							});
						}
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function operarCambioCaa(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_ccaa_'+solicitud_id+'_'+cambio_id);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_caa.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					if (accion == 'aceptar') {
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function verDetalleVehiculo(solicitud_id, cambio_id)
	{
		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_cambios_vehiculos.php",
			data: {
				solicitud_id: solicitud_id,
				cambio_id: cambio_id,
			},
			dataType: "html",
			success: function(html_response) {
				if (html_response != 'error') {
					$('#detalle_vehiculo_popup_title').html('Detalles');
					$('#detalle_vehiculo_popup_body').html(html_response);
					$('#detalle_vehiculo_popup_content').width(600);
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: 'No fue posible identificar el cambio solicitado. Por favor contacte al administrador del sitio.',
						type: BootstrapDialog.TYPE_DANGER,
					});
					$('#detalle_vehiculo_popup').modal('hide');
				}
			}
		});
	}

	function operarCambioVehiculo(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cv_'+solicitud_id+'_'+cambio_id);
		// console.info("container_buttons vehiculo: "+container_buttons);
		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_vehiculos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function operarCambioPermisoVehiculo(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cpv_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_permisos_vehiculos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function finalizarSolicitud(solicitud_id)
	{
		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_solicitud_de_cambios.php",
			data: { solicitud_id: solicitud_id },
			dataType: "text json",
			success: function(response) {
				console.debug(response);
				if (response['resultado'] != 'error') {
					mostrarMensajeYRedireccionar('Solicitud de Cambios finalizada');
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: response['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}
</script>
{/literal}