<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
</head>

<body style="padding-top:60px;">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="abm_alta_codigo_categoria">Listados C&oacute;digo Categor&iacute;a</a></li>
				<li class="active">Listado</li>
			</ol>
			<input id="rol_id" type="hidden" value="{$ROL_ID}">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la categoria</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
								<div class="bs-example">
									<p>
										<strong>Cuit: </strong>{$EMPRESA.CUIT}
										<br>
										<strong>Roles: </strong>
										{if $EMPRESA.ROLES.GENERADOR} Generador {/if} {if $EMPRESA.ROLES.TRANSPORTISTA} Transportista {/if} {if $EMPRESA.ROLES.OPERADOR} Operador {/if}
										<br>
										<strong>Nombre: </strong>{$EMPRESA.NOMBRE}
										<br>
										<strong>Fec. Ini. Act: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/fecinact" data-id="{$EMPRESA.FECHA_INICIO_ACT }" class="editableFeld">{$EMPRESA.FECHA_INICIO_ACT}</span>
										<br>
										<strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/telef" data-id="{$EMPRESA.NUMERO_TELEFONICO }" class="editableFeld">{$EMPRESA.NUMERO_TELEFONICO}</span>
									</p>
						
								</div>
							</div>
						/div>
			   		</div>
			   	</div>
			</div>
</body>

{literal}
<script>
	var multMenu=false;
	var empresa_id = '{/literal}{$EMPRESA.ID}{literal}';

	$(document).ready(function() {
		$(".validar").click(function() {
			window.location="aceptar.php?id="+empresa_id;
		});

		  $(".descargar").click(function() {
			window.open("descargar.php?id="+empresa_id);
		});

		$(".rechazar").click(function() {
			window.location="rechazar.php?id="+empresa_id;
		});

		$(".js-mupe").find("li").first().addClass("active");
		$("#Establecimiento .tab-content").find(".tab-pane").first().addClass("active");
		$('#linkEst').click(function (e) {
			if(!multMenu) {
				$(".js-mupe").find("li").first().find("a").click();
				multMenu = true;
				$('.js-mupe').bootstrapResponsiveTabs();
				$(".js-mupe").find("li").first().find("a").click();
			}
		});

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

	function setPermisoEstablecimiento(obj, establecimiento_id, permiso_id)
	{
		var permiso_id = (typeof permiso_id !== 'undefined') ? permiso_id : null;
		var popup_title = permiso_id ? 'Editar permiso del establecimiento' : 'Agregar permiso al establecimiento';
		var nombre_container = obj.attr('container');

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permisos_establecimiento.php",
		    data: {establecimiento_id: establecimiento_id, permiso_id: permiso_id},
		    dataType: "html",
			success: function(html_response){
				$('#permisos_popup_title').html(popup_title);
				$('#permisos_popup_body').html(html_response);
				$('#permisos_popup_content').width(800);
				$('input#permisos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoEstablecimiento(obj, establecimiento_id)
	{
		var permiso_id = obj.attr('permiso-id');
		var nombre_container = obj.attr('container');
		console.info('nombre_container: '+nombre_container);

		if ( ! esElUnicoResiduo(obj.attr('rol'), establecimiento_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el residuo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permisos_establecimiento.php",
						   data: {accion: "delete", permiso_id: permiso_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								} else {
									BootstrapDialog.alert({
										title: 'No es posible borrar el residuo',
										message: retorno['errores']['delete_error'],
										type: BootstrapDialog.TYPE_DANGER,
									});
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el residuo',
				message: 'No puede eliminar el residuo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible modificar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoResiduo(rol, establecimiento_id)
	{
		var residuos_por_rol = $('div[id^="container_residuo_'+rol+'_'+establecimiento_id+'_"]');
		return residuos_por_rol.length == 1;
	}

	function setVehiculo(obj, establecimiento_id, vehiculo_id)
	{
		var vehiculo_id = (typeof vehiculo_id !== 'undefined') ? vehiculo_id : null;
		var popup_title = vehiculo_id ? 'Editar veh&iacute;culo' : 'Agregar veh&iacute;culo';
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_vehiculo.php",
		    data: {establecimiento_id: establecimiento_id, vehiculo_id: vehiculo_id},
		    dataType: "html",
			success: function(html_response){
				$('#vehiculos_popup_title').html(popup_title);
				$('#vehiculos_popup_body').html(html_response);
				$('#vehiculos_popup_content').width(700);
				$('input#vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarVehiculo(obj, establecimiento_id)
	{
		var vehiculo_id = obj.attr('vehiculo-id');
		var nombre_container_vehiculo = obj.attr('container');
		var nombre_container_permisos_vehiculo = 'container_permisos_vehiculo_'+vehiculo_id;
		console.info("nombre_container_vehiculo: "+nombre_container_vehiculo);
		console.info("nombre_container_permisos_vehiculo: "+nombre_container_permisos_vehiculo);

		if ( ! esElUnicoVehiculo()) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el veh&iacute;culo y sus permisos&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_vehiculo.php",
						   data: {accion: "delete", vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container_vehiculo).remove();
									$("div#"+nombre_container_permisos_vehiculo).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el veh&iacute;culo',
				message: 'No puede eliminar el veh&iacute;culo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoVehiculo()
	{
		return $("div.vehiculos_establecimiento").length == 1;
	}

	function setPermisoVehiculo(obj, vehiculo_id, permiso_vehiculo_id)
	{
		var permiso_vehiculo_id = (typeof permiso_vehiculo_id !== 'undefined') ? permiso_vehiculo_id : null;
		var popup_title = permiso_vehiculo_id ? 'Editar permiso del veh&iacute;culo' : 'Agregar permiso al veh&iacute;culo';
		var establecimiento_id = obj.attr('establecimiento-id');

		// container="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}"
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permiso_vehiculo.php",
		    data: {
		    	establecimiento_id: establecimiento_id,
		    	vehiculo_id: vehiculo_id,
		    	permiso_vehiculo_id: permiso_vehiculo_id
		    },
		    dataType: "html",
			success: function(html_response){
				$('#permisos_vehiculos_popup_title').html(popup_title);
				$('#permisos_vehiculos_popup_body').html(html_response);
				$('#permisos_vehiculos_popup_content').width(700);
				$('input#permisos_vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoVehiculo(obj, permiso_vehiculo_id, vehiculo_id)
	{
		var establecimiento_id = obj.attr('establecimiento-id');
		var nombre_container = obj.attr('container');
		console.info("container permiso vehiculo: "+nombre_container);

		if ( ! esElUnicoPermisoDelVehiculo(vehiculo_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el permiso del veh&iacute;culo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permiso_vehiculo.php",
						   data: {accion: "delete", permiso_vehiculo_id: permiso_vehiculo_id, vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el permiso del veh&iacute;culo',
				message: 'No puede eliminar el permiso del veh&iacute;culo ya que es &uacute;nico que posee. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoPermisoDelVehiculo(vehiculo_id)
	{
		return $("div.permisos_vehiculo_"+vehiculo_id).length == 1;
	}

</script>
{/literal}
</html>
