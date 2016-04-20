<!DOCTYPE html>
<html>
<head>

	{include file='general/meta.tpl'}

	<title>Registraci&oacute;n - Paso 3</title>

	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true' epoch='true' datepicker='true' chosen='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true' mapa='true' filter='true' epoch='true' datepicker='true' chosen='true'}

</head>

	<body>

	{include file='general/popup.tpl' ID_POPUP='mel'}
	{include file='general/popup.tpl' ID_POPUP='mel2'}
	{include file='general/popup.tpl' ID_POPUP='mel3'}

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-logos">
						<div class="row">
							<div class="col-xs-4"><img src="{$BASE_PATH}/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo_mel.gif" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo.gif" class="img-responsive"></div>
						</div>
					</div>

					<div id="registro-bloque">
						<input id="rol_id" type="hidden" value="{$ROL_ID}">
						<div class="row">
							<div class="col-xs-12">
								<div id="registro-cuerpo">

									<p class="text-primary">Perfil {$NOMBRE_PASO}</p>

									<div id="alerta-perfil">

										<div class="alert alert-info" role="alert">
											No hay ning&uacute;n perfil {$NOMBRE_PASO} cargado, para poder continuar debe cargar al menos uno.
										</div>
										<div class="row">
											<div class="col-xs-8 col-xs-offset-2 text-center"><a href="javascript:void(0)" class="btn btn-warning btn-lg btn-block btn_agregar_establecimiento" data-toggle="modal" data-target="#mel_popup">Agregar</a></div>
										</div>

										<br>
									</div>

									<div id="tabla-perfil" class="invisible">

										<div class="table-responsive">

											<table class="table table-striped"  id="lista_establecimientos">
										      <thead>
										        <tr class="registro-tabla-header">
										          	<th class="invisible">&nbsp;</th>
										          	<th class="text-center">NOMBRE</th>
										          	<th class="text-center">ACTIVIDAD</th>
										          	<th class="text-center">CALLE</th>
										          	<th class="text-center">N&Uacute;MERO</th>
										          	<th class="text-center">PISO</th>
										          	<th class="text-center">PROVINCIA</th>
										          	<th class="text-center">LOCALIDAD</th>
										          	<th class="text-center" {if $ROL_ID == '2'}width="210px"{else}width="140px"{/if}>ACCIONES</th>
										        </tr>
										      </thead>
										      <tbody>

												<tr id="establecimientos-td" style="display:none">
													<td colspan="9" style="padding:20px 0px;"><div id="establecimientos-error" style="text-align:left;color:red;display:none;"></div></td>
												</tr>

												{foreach $ESTABLECIMIENTOS as $ESTABLECIMIENTO}
													{if $ESTABLECIMIENTO.TIPO == $ROL_ID}
											        <tr>
											          	<td class="invisible" id="id">{$ESTABLECIMIENTO.ID}</td>
														<td id="nombre">{$ESTABLECIMIENTO.NOMBRE}</td>
														<td class="text-center" id="actividad">{$ESTABLECIMIENTO.ACTIVIDAD}</td>
														<td class="text-center" id="calle">{$ESTABLECIMIENTO.CALLE_R}</td>
														<td class="text-center" id="numero">{$ESTABLECIMIENTO.NUMERO_R}</td>
														<td class="text-center" id="piso">{$ESTABLECIMIENTO.PISO_R}</td>
														<td class="text-center" id="provincia">{$ESTABLECIMIENTO.PROVINCIA_R_}</td>
														<td class="text-center" id="localidad">{$ESTABLECIMIENTO.LOCALIDAD_R_}</td>

														<td class="text-center">
															<a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Permisos'><i class="fa fa-key"></i></a>
															{if $ROL_ID == '2'}
															<a href="javascript:void(0);" class="btn btn-info btn-xs btn_vehiculos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Veh&iacute;culos'><i class="fa fa-truck"></i></a>
															{/if}
															<a href="javascript:void(0);" class="btn btn-primary btn-xs btn_editar_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o"></i></a>
															<a href="javascript:void(0);" class="btn btn-danger btn-xs btn_borrar_establecimiento" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o"></i></a>
														</td>
											        </tr>
											        {/if}
										        {/foreach}

										      </tbody>
										    </table>

										</div>

									    <div align="right" style="background-color:#F5F5ED"><a href="javascript:void(0);" id="permitir_crear" class="btn btn-warning btn_agregar_establecimiento" data-toggle="modal" data-target="#mel_popup">Agregar</a></div>

							    	    <div class="row" style="margin-top:50px;">
										    <div class="col-xs-12 text-right">
										    	<a class="btn btn-default" href="paso_2.php">Volver</a>
										    	<a class="btn btn-success" id="btn_siguiente" href="javascript:void(0);">Continuar</a>
										    </div>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	<script type="text/javascript">

	var rol_id= '{$ROL_ID}';

	{literal}

		$(function() {
			var registro_actual = null;

			if ($("#lista_establecimientos tr").length > 2)
			{
				$('#alerta-perfil').toggleClass('invisible');
				$('#tabla-perfil').toggleClass('invisible');
			}
			permitir_agregar();
		});

		function permitir_agregar()
		{

			if ($("#lista_establecimientos tr").length > 2 && rol_id == 2)
			{
				$('#permitir_crear').addClass('invisible');
			}
			else if($("#lista_establecimientos tr").length < 3 && rol_id == 2)
			{
				$('#permitir_crear').removeClass('invisible');
			}
		}

		//establecimientos
		function modificar_establecimiento(establecimiento){

			registro_actual.find('#nombre').html(establecimiento['NOMBRE']);
			registro_actual.find('#tipo').html(establecimiento['TIPO_']);
			registro_actual.find('#actividad').html(establecimiento['ACTIVIDAD']);
			registro_actual.find('#calle').html(establecimiento['CALLE_R']);
			registro_actual.find('#numero').html(establecimiento['NUMERO_R']);
			registro_actual.find('#piso').html(establecimiento['PISO_R']);
			registro_actual.find('#provincia').html(establecimiento['PROVINCIA_R_']);
			registro_actual.find('#localidad').html(establecimiento['LOCALIDAD_R_']);

			if(establecimiento['TIPO_'] == 'transporte')
			{
				registro_actual.find('#btn_vehiculos_establecimiento').removeClass("invisible");
			}
			else
			{
				registro_actual.find('#btn_vehiculos_establecimiento').addClass("invisible");
			}

			registro_actual = null;
		}

		function agregar_establecimiento(establecimiento){

			if ( ! $('#alerta-perfil').hasClass('invisible') )
			{
				$('#alerta-perfil').toggleClass('invisible');
				$('#tabla-perfil').toggleClass('invisible');
			}


			datos = '\
			<tr>\
			<td class="invisible" id="id">' + establecimiento["ID"] + '</td>\
			<td id="nombre">' + establecimiento["NOMBRE"] + '</td>\
			<td class="text-center" id="actividad">' + establecimiento["ACTIVIDAD"] + '</td>\
			<td class="text-center" id="calle">' + establecimiento["CALLE_R"] + '</td>\
			<td class="text-center" id="numero">' + establecimiento["NUMERO_R"] + '</td>\
			<td class="text-center" id="piso">' + establecimiento["PISO_R"] + '</td>\
			<td class="text-center" id="provincia">' + establecimiento["PROVINCIA_R_"] + '</td>\
			<td class="text-center" id="localidad">' + establecimiento["LOCALIDAD_R_"] + '</td>\
			<td class="text-center">\
			<a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel="tooltip" data-placement="top" title="Permisos"><i class="fa fa-key"></i></a>\
			' + (establecimiento["TIPO"] == "2" ? '<a href="javascript:void(0);" class="btn btn-info btn-xs btn_vehiculos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel="tooltip" data-placement="top" title="Veh&iacute;culos"><i class="fa fa-truck"></i></a>' : '') + '\
			<a href="javascript:void(0);" class="btn btn-primary btn-xs btn_editar_establecimiento" data-toggle="modal" data-target="#mel_popup" rel="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o"></i></a>\
			<a href="javascript:void(0);" class="btn btn-danger btn-xs btn_borrar_establecimiento" rel="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash-o"></i></a>\
			</td>\
			</tr>';

			$('#lista_establecimientos> tbody:last').append(datos);

			permitir_agregar();

			return modal_permisos(establecimiento["ID"]);
		}

		$(document).on('click','.btn_borrar_establecimiento', function() {

			registro_actual = $(this).parent().parent();

			$.ajax({
			    type: "POST",
			    url: mel_path+"/registracion/establecimiento.php",
			    data: {
			    accion : "baja", id : registro_actual.find('#id').html()},
			    dataType: "text json",
			    success: function(retorno){

					if(retorno['estado'] != 0){
						alert(retorno['errores']['baja']);
					}
					else
					{
						registro_actual.remove();
					}
			   	}
			});

			if ($("#lista_establecimientos tr").length <= 3)
			{
				$('#alerta-perfil').toggleClass('invisible');
				$('#tabla-perfil').toggleClass('invisible');
			}

		});

		$(document).on('click','.btn_permisos_establecimiento', function() {

            registro_actual = $(this).parent().parent();
            return modal_permisos(registro_actual.find('#id').html());

		});

		function modal_permisos(id)
		{
            $.ajax({
               type: "GET",
               url: mel_path+"/registracion/permisos_establecimiento.php?rol="+$("#rol_id").val()+"&id=" + id,
               dataType: "html",
               beforeSend: function()
               {
               		$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
               },
               success: function(msg){

   			  	 	$('#mel_popup_title').html("Residuos permisos");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);

               }
            });
		}

		$(document).on('click','.btn_vehiculos_establecimiento', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "GET",
			   url: mel_path+"/registracion/vehiculos_establecimiento.php?id=" + registro_actual.find('#id').html(),
			   dataType: "html",
               beforeSend: function()
               {
               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
               },
			   success: function(msg){
   			  	 	$('#mel_popup_title').html("Vehiculos");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);
			   }
			 });
		});

		$(document).on('click','.btn_editar_establecimiento', function() {
			registro_actual = $(this).parent().parent();
			$.ajax({
			   type: "GET",
			   url: mel_path+"/registracion/establecimiento.php?tipo="+$("#rol_id").val()+"&id=" + registro_actual.find('#id').html(),
			   dataType: "html",
               beforeSend: function()
               {
               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
               },
			   success: function(msg){

   			  	 	$('#mel_popup_title').html("Editar establecimiento");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);

			   }
			 });
		});

		$('.btn_agregar_establecimiento').on('click', function() {
			$.ajax({
			   type: "GET",
			   url: mel_path+"/registracion/establecimiento.php?tipo="+$("#rol_id").val(),
			   dataType: "html",
			   beforeSend: function()
               {
               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
               },
			   success: function(msg){

   			  	 	$('#mel_popup_title').html("Agregar establecimiento");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);

			   }
			 });
		});
		//establecimientos

		$('#btn_siguiente').click(function() {
			var campos  = [	'establecimientos', 'permisos_establecimientos', 'vehiculos', 'permisos_vehiculos' ];

			$.ajax({
				type: "POST",
				url: mel_path+"/registracion/paso_3.php?rol="+$("#rol_id").val(),
				data: {	},
				dataType: "text json",
				success: function(retorno){
					if(retorno['estado'] == 0)
					{
						window.location.replace(retorno['siguiente']);
					}
					else
					{
						for(campo in campos)
						{
							texto_errores = '';
							campo = campos[campo];

	                        if (retorno['errores'][campo] != null && (campo == 'permisos_establecimientos' || campo == 'vehiculos' || campo == 'permisos_vehiculos'))
	                        {
	                            mostrarMensaje('exclamation-triangle',retorno['errores'][campo][0],'warning');
	                        }
	                        else
	                        {
	                            cerrar_mensajes();
	                        }

							if(retorno['errores'][campo] != null)
							{
								texto_errores = retorno['errores'][campo];
								$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
								$('#' + campo).addClass('error_de_carga');
							}
							else
							{
								$('#' + campo).removeClass('error_de_carga');
							}

							if(texto_errores != '')
							{
								$('#' + campo + '-error').html(texto_errores);
								$('#' + campo + '-td').show();
								$('#' + campo + '-error').show();
							}
							else
							{
								$('#' + campo + '-error').hide();
								$('#' + campo + '-td').hide();
							}
						}
					}
				}
			});
		});

	// MODAL 1

	function modificar_vehiculo(vehiculo)
	{
		registro_actual.find('#dominio').html(vehiculo['DOMINIO']);
		registro_actual.find('#descripcion').html(vehiculo['DESCRIPCION']);
		registro_actual.find('#tipo_vehiculo').html(vehiculo['TIPO_VEHICULO']);
		registro_actual.find('#tipo_caja').html(vehiculo['TIPO_CAJA']);

		registro_actual = null;
	}

	function agregar_vehiculo(vehiculo)
	{
		datos = "\
		<tr>\
			<td class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
			<td class='text-center' id='dominio'>" + vehiculo["DOMINIO"] + "</td>\
			<td class='text-center' id='tipo_vehiculo'>" + vehiculo["TIPO_VEHICULO"] + "</td>\
			<td class='text-center' id='tipo_caja'>" + vehiculo["TIPO_CAJA"] + "</td>\
			<td class='text-center' id='descripcion'>" + vehiculo["DESCRIPCION"] + "</td>\
			<td class='text-center'>\
				<a href='javascript:void(0);' class='btn btn-info btn-xs btn_permisos_vehiculo' data-toggle='modal' data-target='#mel2_popup' rel='tooltip' data-placement='top' title='Permisos'><i class='fa fa-key'></i></a>\
				<a href='javascript:void(0);' class='btn btn-primary btn-xs btn_editar_vehiculo' data-toggle='modal' data-target='#mel2_popup' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></a>\
				<a href='javascript:void(0);' class='btn btn-danger btn-xs btn_borrar_vehiculo' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o'></i></a>\
			</td>\
		</tr>";

		$('#lista_vehiculos> tbody:last').append(datos);
	}

	$(document).on('click','.btn_borrar_vehiculo', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/registracion/vehiculo.php",
		   data: {accion : "baja", establecimiento: Establecimiento.ID, id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

	$(document).on('click','.btn_permisos_vehiculo', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/registracion/permisos_vehiculo.php?accion=alta&establecimiento=" + Establecimiento.ID + "&id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
		  	 	$('#mel2_popup_title').html("Permisos Veh&iacute;culo");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
		   }
		 });
	});

	$(document).on('click','.btn_editar_vehiculo', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/registracion/vehiculo.php?establecimiento=" + Establecimiento.ID + "&id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
		  	 	$('#mel2_popup_title').html("Editar Veh&iacute;culo");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
		   }
		 });
	});

	$(document).on('click','#btn_agregar_vehiculo', function() {

		registro_actual = $(this).parent().parent();
		$.ajax({
			type: "GET",
			url: mel_path+"/registracion/vehiculo.php?establecimiento=" + Establecimiento.ID,
			dataType: "html",
			success: function(msg){
		  	 	$('#mel2_popup_title').html("Agregar Veh&iacute;culo");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
			}
		});
	});

	{/literal}
	</script>
</html>