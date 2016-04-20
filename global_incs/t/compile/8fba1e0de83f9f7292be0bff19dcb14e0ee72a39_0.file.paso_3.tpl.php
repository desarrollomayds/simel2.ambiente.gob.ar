<?php /* Smarty version 3.1.27, created on 2015-11-20 10:43:38
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/paso_3.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21338106564f238aea4594_30360822%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fba1e0de83f9f7292be0bff19dcb14e0ee72a39' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/paso_3.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21338106564f238aea4594_30360822',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ROL_ID' => 0,
    'NOMBRE_PASO' => 0,
    'ESTABLECIMIENTOS' => 0,
    'ESTABLECIMIENTO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f238b0a5370_65637167',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f238b0a5370_65637167')) {
function content_564f238b0a5370_65637167 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21338106564f238aea4594_30360822';
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<title>Registraci&oacute;n - Paso 3</title>

	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','epoch'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','filter'=>'true','epoch'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>


</head>

	<body>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel2'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel3'), 0);
?>


		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-logos">
						<div class="row">
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" class="img-responsive"></div>
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" class="img-responsive"></div>
						</div>
					</div>

					<div id="registro-bloque">
						<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
						<div class="row">
							<div class="col-xs-12">
								<div id="registro-cuerpo">

									<p class="text-primary">Perfil <?php echo $_smarty_tpl->tpl_vars['NOMBRE_PASO']->value;?>
</p>

									<div id="alerta-perfil">

										<div class="alert alert-info" role="alert">
											No hay ning&uacute;n perfil <?php echo $_smarty_tpl->tpl_vars['NOMBRE_PASO']->value;?>
 cargado, para poder continuar debe cargar al menos uno.
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
										          	<th class="text-center" <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '2') {?>width="210px"<?php } else { ?>width="140px"<?php }?>>ACCIONES</th>
										        </tr>
										      </thead>
										      <tbody>

												<tr id="establecimientos-td" style="display:none">
													<td colspan="9" style="padding:20px 0px;"><div id="establecimientos-error" style="text-align:left;color:red;display:none;"></div></td>
												</tr>

												<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value) {
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = true;
$foreach_ESTABLECIMIENTO_Sav = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO'];
?>
													<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == $_smarty_tpl->tpl_vars['ROL_ID']->value) {?>
											        <tr>
											          	<td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
</td>
														<td id="nombre"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td>
														<td class="text-center" id="actividad"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD'];?>
</td>
														<td class="text-center" id="calle"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
</td>
														<td class="text-center" id="numero"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
</td>
														<td class="text-center" id="piso"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
</td>
														<td class="text-center" id="provincia"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_'];?>
</td>
														<td class="text-center" id="localidad"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_'];?>
</td>

														<td class="text-center">
															<a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Permisos'><i class="fa fa-key"></i></a>
															<?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '2') {?>
															<a href="javascript:void(0);" class="btn btn-info btn-xs btn_vehiculos_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Veh&iacute;culos'><i class="fa fa-truck"></i></a>
															<?php }?>
															<a href="javascript:void(0);" class="btn btn-primary btn-xs btn_editar_establecimiento" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o"></i></a>
															<a href="javascript:void(0);" class="btn btn-danger btn-xs btn_borrar_establecimiento" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o"></i></a>
														</td>
											        </tr>
											        <?php }?>
										        <?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>

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

	<?php echo '<script'; ?>
 type="text/javascript">

	var rol_id= '<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
';

	

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

	
	<?php echo '</script'; ?>
>
</html><?php }
}
?>