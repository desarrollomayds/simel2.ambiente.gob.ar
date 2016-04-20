<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
				<li><a href="#">Boletas de Pago</a></li>
				<li class="active">Listado</li>
			</ol>

			<form class="form-inline">
				<div class="form-group">
					<label for="exampleInputName2">Criterio</label>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo Boleta" name='nro_boleta' value="{$nro_boleta}">
				</div>
				<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
			</form>

			<table border='0'>
				<tr>
					<td colspan="2"><button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button>
					</td>
				</tr>
			</table>
			<br>
			<div class="table-responsive bs-example">
				<table border='0' class="table table-hover table-striped">
				<tr><td class="bg-info" align="center" height="35">ID</td><td class="bg-info" align="center" height="35">C&oacute;digo boleta</td><td class="bg-info" align="center">Fecha de registraci&oacute;n</td><td class="bg-info" align="center">Fecha de pago</td><td class="bg-info" align="center">Cantidad de manifiestos</td><td class="bg-info" align="center">Importe</td><td class="bg-info" align="center">Estado</td><td class="bg-info" align="center">Opciones</td></tr> 
				{if $BOLETAS.error}
					<tr><td colspan="6" height="35" align="center">No se han encontrado boletas anteriores</td></tr>
				{else}
					{foreach $BOLETAS as $BOLETA}
					<tr>
						<td align="center" height="35">{$BOLETA->boleta_id}</td>
						<td align="center" height="35">{$BOLETA->cb}</td>
						<td align="center">{if $BOLETA->fecha_registracion} {$BOLETA->fecha_registracion->format('Y-m-d')} {/if}</td>
						<td align="center">{if $BOLETA->fecha_pago} {$BOLETA->fecha_pago->format('Y-m-d')} {/if}</td>
						<td align="center">{$BOLETA->cantidad_manifiestos}</td>
						<td align="right">$ {$BOLETA->importe}&nbsp;&nbsp;</td>
						{if $BOLETA->fecha_pago}
							<td align="center"><font color="green">Pagado</font></td>
						{else}
							<td align="center"><font color="red">Pendiente de pago</font></td>
						{/if}
						<td align="center">
							<div class="btn-group" role="group">
							<a type="button" href="ver_boleta.php?establecimiento_id={$BOLETA->establecimiento_id}&boleta_id={$BOLETA->boleta_id}"><i class="fa fa-download fa-lg"></i></a>
							</div>
						</td>
					</tr>
					{/foreach}
				{/if}
				</table>
			</div>
			{$PAGINADOR}
			{if $LOG}
				<script type="text/javascript">
				{literal}
					BootstrapDialog.show({
						title: 'Proceso de archivo',
						message: '<center>Archivo procesado con exito</center>',
						buttons: [{
							label: 'Cerrar',
							action: function(dialogRef){
								dialogRef.close();
							}
						}, {
							label: '<i class="fa fa-download"></i> Descargar Log',
							action: function(dialogRef){
								window.location.replace("download_log.php");
								dialogRef.close();
							}
						}]
					});
				{/literal}
				</script>
			{/if}
		</div>

	</body>
</html>
<script type="text/javascript">
{literal}
	$("#cargar_archivo_excel").click(function(){
		var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="administracion_boletas_de_pago.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

		BootstrapDialog.show({
			title: 'Cargar archivo CSV',
			message: $mensaje,
			buttons: [{
				label: 'Cancelar',
				action: function(dialogRef){
					dialogRef.close();
				}
			}, {
				label: 'Cargar',
				action: function(dialogRef){
					if ($('[type=file]').val()){
						var ext = $('[type=file]').val().split('.').pop();
						if (ext == 'csv'){
							$("#upload").submit();
							dialogRef.close();
						} else {
							BootstrapDialog.alert({
								title: 'Informaci&oacute;n',
								message: 'El archivo seleccionado no es CSV',
							});
							return false;
						}
					} else {
						BootstrapDialog.alert({
							title: 'Informaci&oacute;n',
							message: 'Debe seleccionar un archivo a cargar',
						});
						return false;
					}
				}
			}]
		});
	});
{/literal}
</script>