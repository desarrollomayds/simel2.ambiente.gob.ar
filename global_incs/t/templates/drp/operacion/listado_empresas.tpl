<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_empresas.php">Empresas</a></li>
				<li class="active">Listado</li>
			</ol>
			<form class="form-inline">
				<div class="form-group">
					<label for="exampleInputName2">Criterio</label>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="{$criterio}">
				</div>
				<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
			</form>
			<br>
			{if $pendientes|@count > 0}
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoPendientes">
						<thead>
							<tr>
								<th>Raz&oacute;n social</th>
								<th>Cuit</th>
								<th>Roles</th>
								<th>Domicilio Real</th>
								<th>Nro. de solicitud</th>
								<th>Fecha de inscripci&oacute;n</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>

							{foreach $pendientes as $pend}
							<tr>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$pend->nombre}</td>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$pend->cuit}</td>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="roles">
									{if $pend->rol_generador}&nbsp;G&nbsp;{/if}
									{if $pend->rol_transportista}&nbsp;T&nbsp;{/if}
									{if $pend->rol_operador}&nbsp;O&nbsp;{/if}
								</td>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="dom_">{$pend->calle}&nbsp;{$pend->numero}</td>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="id_">{$pend->id}</td>
								<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{if $pend->fecha_inscripcion} {$pend->fecha_inscripcion->format('Y-m-d')} {/if}</td>
								<td align="center" bgcolor="{$COLOR_LINEA}" class="td">
									<button type="button" class="btn btn-info edit" data-id="{$pend->id}">
										<span class="fa fa-eye"></span>
									</button>
								</td>
							</tr>
							{/foreach}

						</tbody>
					</table>
					{$paginador}
				</div>
			{else}

				<div class="alert alert-info">
					<p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
				</div>

			{/if}
		</div>
	</div>
</body>

<script>
	$(function() {
		$("#listadoPendientes .edit").each(function() {
			$(this).click(function() {
				window.location = admin_path+"/operacion/edit_listado_empresas.php?id=" + $(this).attr("data-id");
			});
		})
	});
</script>

</html>
