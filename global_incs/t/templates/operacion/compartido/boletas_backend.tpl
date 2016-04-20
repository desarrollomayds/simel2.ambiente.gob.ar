<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Boletas backend</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' progressButton='true' chosen='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true' progressButton='true' chosen='true'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
	</head>

	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

		<div id="contenedor-interior">
			  {include file='general/logos.tpl'}
			<div id="apDiv1">Boletas backend</div>
			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->
				<br/>

				{include file='operacion/transportista/menu_solapas.tpl'}
				<div style="height:2px; background-color:#5D9E00"></div>

				<div class="clear20"></div>
				<table border='0'>
				<tr><td colspan="2">Proceso de Boletas<button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button></td></tr></table>
				<br>
				<table border='1' cellpadding='20' cellspacing='0'>
				<tr><td align="center" height="35">Nro. de boleta</td><td align="center">Fecha de registraci&oacute;n</td><td align="center">Fecha de pago</td><td align="center">Cantidad de manifiestos</td><td align="center">Importe</td><td align="center">Estado</td><td align="center">Opciones</td></tr>
				{if $BOLETAS.error}
					<tr><td colspan="6" height="35" align="center">No se han encontrado boletas anteriores</td></tr>
				{else}
					{foreach $BOLETAS as $BOLETA}
					<tr>
						<td align="center" height="35">{$BOLETA.id}</td>
						<td align="center">{$BOLETA.fecha_registracion}</td>
						<td align="center">{$BOLETA.fecha_pago}</td>
						<td align="center">{$BOLETA.cantidad_manifiestos}</td>
						<td align="right">$ {$BOLETA.importe}&nbsp;&nbsp;</td>
						{if $BOLETA.fecha_pago}
							<td align="center"><font color="green">Pagado</font></td>
						{else}
							<td align="center"><font color="red">Pendiente de pago</font></td>
						{/if}
						<td align="center">
							<div class="btn-group" role="group">
							<a type="button" href="ver_boleta.php?establecimiento_id={$ESTABLECIMIENTO.ID}&boleta_id={$BOLETA.id}" class="btn btn-default btn-xs">Descargar boleta</a>
							</div>
						</td>
					</tr>
					{/foreach}
				{/if}
				</table>
				{$PAGINADOR}
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
{literal}
	$("#cargar_archivo_excel").click(function(){
		var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="boletas_backend.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

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