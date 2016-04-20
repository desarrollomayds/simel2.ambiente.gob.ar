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
				<li><a href="listado_empresas.php">Empresas</a></li>
				<li class="active">Detalle</li>
			</ol>
			<input id="rol_id" type="hidden" value="{$ROL_ID}">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
							<div class="col-md-8">
								<h2>INFORMACI&Oacute;N</h2>
							</div>
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la empresa</a></li>
							<li role="presentation"><a href="#Establecimiento" aria-controls="Establecimiento" role="tab" data-toggle="tab" id="linkEst">Establecimientos</a></li>
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
										<strong>Fec. Ini. Act: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/fecinact" data-id="{$EMPRESA.FECHA_INICIO_ACT }">{$EMPRESA.FECHA_INICIO_ACT}</span>
										<br>
										<strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/telef" data-id="{$EMPRESA.NUMERO_TELEFONICO }">{$EMPRESA.NUMERO_TELEFONICO}</span>
									</p>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecalle" data-id="{$EMPRESA.CALLE_R}">{$EMPRESA.CALLE_R}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrenum" data-id="{$EMPRESA.NUMERO_R}">{$EMPRESA.NUMERO_R}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrepiso" data-id="{$EMPRESA.PISO_R}">{$EMPRESA.PISO_R}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrreofi" data-id="{$EMPRESA.OFICINA_R}">{$EMPRESA.OFICINA_R}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr1" data-name="Emp/pro1" data-id="{$EMPRESA.PROVINCIA_R_ID}">{$EMPRESA.PROVINCIA_R_}</span>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr2" data-name="Emp/loca1" data-id="{$EMPRESA.LOCALIDAD_R_ID}">{$EMPRESA.LOCALIDAD_R_}</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecp" data-id="{$EMPRESA.CODIGO_POSTAL}">{$EMPRESA.CODIGO_POSTAL}</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecalle" data-id="{$EMPRESA.CALLE_L}">{$EMPRESA.CALLE_L}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlenum" data-id="{$EMPRESA.NUMERO_L}">{$EMPRESA.NUMERO_L}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlepiso" data-id="{$EMPRESA.PISO_L}">{$EMPRESA.PISO_L}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrleofi" data-id="{$EMPRESA.OFICINA_L}">{$EMPRESA.OFICINA_L}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr3" data-name="Emp/pro2" data-id="{$EMPRESA.PROVINCIA_L_ID}">{$EMPRESA.PROVINCIA_L_}</span>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr4" data-name="Emp/loca2" data-id="{$EMPRESA.LOCALIDAD_L_ID}">{$EMPRESA.LOCALIDAD_L_}</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecp" data-id="{$EMPRESA.CODIGO_POSTAL_L}">{$EMPRESA.CODIGO_POSTAL_L}</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocalle" data-id="{$EMPRESA.CALLE_C}">{$EMPRESA.CALLE_C}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrconum" data-id="{$EMPRESA.NUMERO_C}">{$EMPRESA.NUMERO_C}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcopiso" data-id="{$EMPRESA.PISO_C}">{$EMPRESA.PISO_C}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcoofi" data-id="{$EMPRESA.OFICINA_C}">{$EMPRESA.OFICINA_C}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr5" data-name="Emp/pro3" data-id="{$EMPRESA.PROVINCIA_C_ID}">{$EMPRESA.PROVINCIA_C_}</span>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr6" data-name="Emp/loca3" data-id="{$EMPRESA.LOCALIDAD_C_ID}">{$EMPRESA.LOCALIDAD_C_}</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocp" data-id="{$EMPRESA.CODIGO_POSTAL_C}">{$EMPRESA.CODIGO_POSTAL_C}</span>
										</div>
									</div>
								</div>
								<br>
								<p class="registro-titulo bg-info">Representante Legal</p>
								{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/nom" data-id="{$REPRESENTANTE.NOMBRE}">{$REPRESENTANTE.NOMBRE}</span>
										<br>
										<strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/ape" data-id="{$REPRESENTANTE.APELLIDO}">{$REPRESENTANTE.APELLIDO}</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni1" data-name="RL/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
										<br>
										<strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/cuit" data-id="{$REPRESENTANTE.CUIT}">{$REPRESENTANTE.CUIT}</span>
									</p>
								</div>
								<br> {/foreach}
								<p class="registro-titulo bg-info">Representante T&eacute;cnico</p>
								{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/nom" data-id="{$REPRESENTANTE.NOMBRE}">{$REPRESENTANTE.NOMBRE}</span>
										<br>
										<strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/ape" data-id="{$REPRESENTANTE.APELLIDO}">{$REPRESENTANTE.APELLIDO}</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni2" data-name="RT/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
										<br>
										<strong>Cargo: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cargo" data-id="{$REPRESENTANTE.CARGO}">{$REPRESENTANTE.CARGO}</span>
										<br>
										<strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cuit" data-id="{$REPRESENTANTE.CUIT}">{$REPRESENTANTE.CUIT}
									</p>
								</div>
								<br> {/foreach}
							</div>
							<div role="tabpanel" class="bs-example tab-pane tabUnique" id="Establecimiento">
								<ul class="nav nav-tabs js-mupe">
								{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
									<li class="est_tab" establecimiento-id="{$ESTABLECIMIENTO.ID}"><a href="subt_{$ESTABLECIMIENTO.ID}" role="tab" data-toggle="tab">{$ESTABLECIMIENTO.NOMBRE}</a></li>
								{/foreach}
								</ul>
								<div style="margin:20px;display:block;" id="establecimiento_loading">
									<i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom"></i>
								</div>
								<div style="display:none;" id="establecimiento_info"></div>
								<!-- aca estaba el content del establecimiento -->
							</div>
						</div>
					</div>
				</div>
			</div>
			{include file='general/popup.tpl' ID_POPUP='permisos' HIDDEN_INFO='true'}
			{include file='general/popup.tpl' ID_POPUP='vehiculos' HIDDEN_INFO='true'}
			{include file='general/popup.tpl' ID_POPUP='permisos_vehiculos' HIDDEN_INFO='true'}
		</div>
</body>

{literal}
<script>
	var multMenu=false;
	var empresa_id = '{/literal}{$EMPRESA.ID}{literal}';

	$(document).ready(function() {

		$(".js-mupe").find("li").first().addClass("active");

		// ajax call para obtener info de establecimientos.
		$(".est_tab").on("click", function() {
			var establecimiento_id = $(this).attr('establecimiento-id');
			console.info("establecimiento_id : " + establecimiento_id);
			$('div#establecimiento_info').hide();
			$("div#establecimiento_loading").show();

			$.ajax({
				type: "GET",
				url: admin_path+"/operacion/ajax/ajax_obtener_informacion_establecimiento.php",
				data: {establecimiento_id: establecimiento_id},
				dataType: "html",
				success: function(html_response){
					$('#establecimiento_info').html(html_response);
					$('div#establecimiento_loading').hide();
					$("div#establecimiento_info").show();
				}
			});
		});


	}); // end of $(document).ready()

</script>
{/literal}
</html>
