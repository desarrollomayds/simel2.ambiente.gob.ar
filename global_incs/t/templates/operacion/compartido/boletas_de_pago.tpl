<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Boletas de pago</title>
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
			<div id="apDiv1">Boletas de pago</div>
			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->
				<br/>

				{include file='operacion/transportista/menu_solapas.tpl'}
				<div style="height:2px; background-color:#5D9E00"></div>

				<div class="clear20"></div>

				{if $ALERTA.bloqueante == 'N' || $ALERTA.bloqueante == ''}

					<table border='0'>
					<tr><td><button type="button" id="generar_nueva_boleta" class="btn btn-warning btn-block"><i class="fa fa-shopping-cart fa-lg"></i> Comprar Manifiesto</button></td></tr></table>
					<br>
					<div>Historial de Boletas</div>
					<br>
					<div class="table-responsive bs-example">
					<table border='0' class="table table-hover table-striped">
					<tr><td class="bg-info" align="center" height="35">Nro. de boleta</td><td class="bg-info" align="center">Fecha de registraci&oacute;n</td><td class="bg-info" align="center">Fecha de pago</td><td class="bg-info" align="center">Cantidad de manifiestos</td><td class="bg-info" align="center">Importe</td><td class="bg-info" align="center">Estado</td><td class="bg-info" align="center">Opciones</td></tr>
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
								<td align="center"><font color="red">Pendiente</font></td>
							{/if}
							<td align="center">
								<div class="btn-group" role="group">
								<a type="button" href="ver_boleta.php?establecimiento_id={$ESTABLECIMIENTO.ID}&boleta_id={$BOLETA.id}"><i class="fa fa-download fa-lg"></i></a>
								</div>
							</td>
						</tr>
						{/foreach}
					{/if}
					</table>
					</div>
					{$PAGINADOR}

				{/if}
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
{literal}
	$("#generar_nueva_boleta").click(function(){
		BootstrapDialog.show({
            title: 'Generar nueva boleta',
            message: $('<div></div>').load(mel_path+"/operacion/compartido/boletas_selector.php"),
            buttons: [{
                label: 'Cancelar',
                cssClass: 'btn-primary',
                action: function(dialog){
                    dialog.close();
                }
            },{
            	label: 'Comprar',
                cssClass: 'btn-primary',
                id: 'comprar',
                action: function(dialog){
					var $button = this;
                    $button.disable();
                    $button.spin();
                    dialog.setClosable(false);
                	    var modal = dialog.getModalBody().find('input#valor').val();
		                var multiplo = parseInt(dialog.getModalBody().find('input#multiplo').val());
		                if (modal !== ''){
			                if (isNaN(modal)){
			                	$button.enable();
                    			$button.stopSpin();
                    			dialog.setClosable(true);
			                	BootstrapDialog.alert({
			                    	title: 'Informaci&oacute;n',
			            			message: 'Solo se permiten n&uacute;meros',
			                    	});
			                    return false;
			                }
			                if(modal < multiplo) {
		                		$button.enable();
                    			$button.stopSpin();
                    			dialog.setClosable(true);
			                    BootstrapDialog.alert({
			                    	title: 'Informaci&oacute;n',
			            			message: 'El valor m&iacute;nimo es ' + multiplo,
			                    	});
			                    return false;
			                }
			                var cantidad = modal;
		                } else {
		                	var select = $("#select option:selected").val();
		                	var cantidad = select;
		                }
		  
                    	$.ajax({
							type: "POST",
							url: mel_path+"/operacion/compartido/boletas_de_pago.php",
							data: {accion : "crear", cantidad : cantidad},
							dataType: "text json",
							success: function(retorno){
								console.log(retorno);
								BootstrapDialog.show({
						            title: 'Boleta de pago creada',
						            message: '<div style="text-align:center;"><a href="ver_boleta.php?establecimiento_id='+ retorno["establecimiento_id"] +'&boleta_id='+ retorno["id"] +'" type="button" class="btn btn-primary"><i class="fa fa-file-text-o fa-lg"></i> Descargar boleta</button></a>',
						            buttons: [{
						                label: 'Cerrar',
						                action: function(dialogRef){
						                    dialogRef.close();
						                    $(location).attr('href','boletas_de_pago.php');
						                }
						            }]
						        });
							}
						});
                }
            }]
        });
	});

	function ver_boleta(establecimiento_id, boleta_id){
		BootstrapDialog.show({
			title: 'Boleta de pago',
			size: BootstrapDialog.SIZE_WIDE,
            message: $('http://manifiestos/documentos/boletas_pago/'+ establecimiento_id +'/'+ boleta_id +'.pdf')
        });
	};
{/literal}
</script>