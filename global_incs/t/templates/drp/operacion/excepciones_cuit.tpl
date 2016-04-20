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

	<form class="form-inline" id="upload" enctype="multipart/form-data" action="excepciones_cuit.php" method="POST">

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_excepciones_cuit.php">Excepciones de cuit</a></li>
				<li class="active">Listado</li>
			</ol>

			{if $csv_parsed}
				{if $line_errors}
					<div class="alert alert-danger" role="alert" style="font-weight:bold;">
						* Hubo errores al crear/editar las excepciones que se listan debajo.
					</div>
				{else}
					<div class="alert alert-info" role="alert" style="font-weight:bold;">
						* Excepciones creadas/editadas correctamente.
					</div>
				{/if}
			{/if}

			<div class="table-responsive bs-example" style="font-size: 12px;">
				<form class="form-inline" style="margin-top:20px;">
					<h5><b>Criterio de B&uacute;squeda</b></h5>
					<div class="form-group">
						<label for="exampleInputName2">Criterio&nbsp;</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="{$criterio}">
					</div>
					<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
				</form>
			</div>
			
			<div class="table-responsive bs-example" style="font-size: 12px;">
				<div class="form-group" style="">
					<div class="form-group">	
						<label for="protocolo_id">Operar individual</label><br />
						<div class="input-group">
							<div class="input-group-addon">CUIT</div><input type="text" class="form-control" id="cuit" placeholder="CUIT">
							<div class="input-group-addon">Raz&oacute;n Social</div><input typ<e="text" class="form-control" id="razon_social" placeholder="Raz&oacute;n Social">
						</div>
					</div>
					<input type="button" class="btn btn-primary" style="margin-top:22px;" value="Agregar/Editar" onclick="agregarExcepcion();" />
					<div style="clear:both;"></div>
				</div>

				<div class="form-group" style="margin-left:50px;">
					<label for="protocolo_id">Cargar desde CSV</label>
					<input id="file" name="file" type="file" accept=".csv" />
					<button type="submit" class="btn btn-primary" id="submit_csv" name="submit_csv" value="submit_csv">Agregar</button>
				</div>
			</div>
			<br>

			{* errores de carga *}
			{if $csv_parsed and $line_errors}
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoPendientes">
						<thead>
							<tr>
								<th>Linea</th>
								<th>Descripci&oacute;n del error</th>
							</tr>
						</thead>
						<tbody>
							{foreach $line_errors as $line => $err}
							<tr>
								<td>{$line}</td>
								<td>{if $err.cuit} Cuit: {$err.cuit} {elseif $err.razon_social} Raz&oacute;n Social: {$err.razon_social} {/if}</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			{else}
			{* listado de excepciones*}
				{if $excepciones|@count > 0}
					<div class="table-responsive bs-example">
						<table class="table table-hover table-striped" id="listadoPendientes">
							<thead>
								<tr>
									<th>CUIT</th>
									<th>Raz&oacute;n Social</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								{foreach $excepciones as $excep}
								<tr>
									<td>{$excep->cuit}</td>
									<td>{$excep->razon_social}</td>
									<td>{$excep->fecha_creacion->format('Y-m-d H:i:s')}</td>
									<td>{if $excep->fecha_modificacion} {$excep->fecha_modificacion} {else} &nbsp;-&nbsp; {/if}</td>
									<td>
										<button type="button" class="btn btn-info" excepcion-id="{$excep->id}" title="Eliminar" onclick="eliminarExcepcion($(this));">
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
						<p>No existen excepciones de CUIT.</p>
					</div>
				{/if}
			{/if}
		</div>

	</form>
</body>

<script>
	$(document).ready(function() {});

	function agregarExcepcion()
	{
		var cuit = $("input#cuit").val();
		var razon_social = $("input#razon_social").val();
		var err_msg = '';

		if ( ! cuit.length) {
			err_msg += 'Indique el cuit.<br/>';
		}

		if ( ! razon_social.length) {
			err_msg += 'Indique la raz&oacute;n social.';
		}

		if (err_msg != '') {
			BootstrapDialog.alert({
				title: 'Errores.',
				message: err_msg,
				type: BootstrapDialog.TYPE_DANGER,
			});

			return false;
		}

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/excepciones_cuit.php",
			data: {
				cuit: cuit,
				razon_social: razon_social,
				accion: 'agregar_individual',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Excepci&oacute;n agregada/editada');
				} else {
					var err_msg = '';
					$.each(rsp_obj.errors, function(field, description) {
						err_msg += field +' : ' + description + '<br />';
					});
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function eliminarExcepcion(buttonObj)
	{
		var excepcion_id = buttonObj.attr('excepcion-id');

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/excepciones_cuit.php",
			data: {
				excepcion_id: excepcion_id,
				accion: 'eliminar_excepcion',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Excepci&oacute;n borrada');
				} else {
					var err_msg = '';
					$.each(rsp_obj.errors, function(field, description) {
						err_msg += field +' : ' + description + '<br />';
					});
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}
</script>

</html>
