<?php /* Smarty version 3.1.27, created on 2015-11-20 10:35:06
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/residuo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2097788943564f218a9fcf81_92738756%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d8a04c853fc45fa53a806066d9e7ad7f0bedfe7' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/residuo.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097788943564f218a9fcf81_92738756',
  'variables' => 
  array (
    'ACCION' => 0,
    'RESIDUO' => 0,
    'RESIDUOS' => 0,
    'RESIDUO_' => 0,
    'PELIGROSIDAD' => 0,
    'PELIGRO' => 0,
    'CONTENEDORES' => 0,
    'CONTENEDOR' => 0,
    'TIPO_MANIFIESTO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f218ab3acf3_99639930',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f218ab3acf3_99639930')) {
function content_564f218ab3acf3_99639930 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2097788943564f218a9fcf81_92738756';
?>
<div class="backGrey" id="residuos_popup">

    <input type='hidden' name='residuo_accion' id='residuo_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'>
	<input type='hidden' name='residuo_id' id='residuo_id' value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
' size='50'>
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Residuo</label>
			<div class="col-sm-10">
				<select class="form-control residuos" name='residuo_residuo' id='residuo_residuo' >
					<?php
$_from = $_smarty_tpl->tpl_vars['RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RESIDUO_'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RESIDUO_']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['RESIDUO_']->value) {
$_smarty_tpl->tpl_vars['RESIDUO_']->_loop = true;
$foreach_RESIDUO__Sav = $_smarty_tpl->tpl_vars['RESIDUO_'];
?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO_']->value['CODIGO'];?>
' <?php if ($_smarty_tpl->tpl_vars['RESIDUO_']->value['CODIGO'] == $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['RESIDUO_']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['RESIDUO_']->value['DESCRIPCION'];?>

						</option>
					<?php
$_smarty_tpl->tpl_vars['RESIDUO_'] = $foreach_RESIDUO__Sav;
}
?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Peligrosidad</label>
			<div class="col-sm-10">
				<select class="form-control residuos" name='peligrosidad_peligrosidad' id='peligrosidad_peligrosidad' >
					<?php
$_from = $_smarty_tpl->tpl_vars['PELIGROSIDAD']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PELIGRO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PELIGRO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PELIGRO']->value) {
$_smarty_tpl->tpl_vars['PELIGRO']->_loop = true;
$foreach_PELIGRO_Sav = $_smarty_tpl->tpl_vars['PELIGRO'];
?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['PELIGRO']->value['codigo'];?>
'>
						<?php echo $_smarty_tpl->tpl_vars['PELIGRO']->value['codigo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['PELIGRO']->value['descripcion'];?>
 
						</option>
					<?php
$_smarty_tpl->tpl_vars['PELIGRO'] = $foreach_PELIGRO_Sav;
}
?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Contenedor</label>
			<div class="col-sm-10">
				<select class="form-control" name='residuo_contenedor' id='residuo_contenedor'>
					<?php
$_from = $_smarty_tpl->tpl_vars['CONTENEDORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['CONTENEDOR'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['CONTENEDOR']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['CONTENEDOR']->value) {
$_smarty_tpl->tpl_vars['CONTENEDOR']->_loop = true;
$foreach_CONTENEDOR_Sav = $_smarty_tpl->tpl_vars['CONTENEDOR'];
?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['CONTENEDOR']->value['CODIGO'];?>
' <?php if ($_smarty_tpl->tpl_vars['CONTENEDOR']->value['CODIGO'] == $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['CONTENEDOR']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['CONTENEDOR']->value['DESCRIPCION'];?>
</option>
					<?php
$_smarty_tpl->tpl_vars['CONTENEDOR'] = $foreach_CONTENEDOR_Sav;
}
?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad de contenedores</label>
			<div class="col-sm-10">
				<input type='text' class="form-control" name='residuo_cantidad_contenedores' id='residuo_cantidad_contenedores' value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
' size='30'>
			</div>
			<div class="form_error_msg" id="cantidad_contenedores-error" style="display:none;"></div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Cantidad estimada (kg)</label>
			<div class="col-sm-10">
				<input type='text' class="form-control" name='residuo_cantidad_estimada' id='residuo_cantidad_estimada' value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
' size='30'>
			</div>
			<div class="form_error_msg" id="cantidad_estimada-error" style="display:none;"></div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-10">
				<select class="form-control" name='residuo_estado' id='residuo_estado'>
					<option value='1' <?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO'] == 1) {?>selected<?php }?>>l&iacute;quido</option>
					<option value='2' <?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO'] == 2) {?>selected<?php }?>>s&oacute;lido</option>
					<option value='3' <?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO'] == 3) {?>selected<?php }?>>semi-s&oacute;lido</option>
				</select>
			</div>
		</div>
	</form>

    <div align="right">
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar'>Aceptar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

	<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="<?php echo $_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value;?>
"/>

    <div class="clear20"></div>
</div>


<?php echo '<script'; ?>
>

	$('#residuo_cantidad_contenedores').filter_input({regex:'[0-9]'});
	$('#residuo_cantidad_estimada').filter_input({regex:'[0-9]'});

	$(".residuos").chosen({width:"100%;"})

	$('#btn_aceptar').click(function() {
		var tipo_manifiesto = $("input#tipo_manifiesto").val();
		var campos  = [	'accion', 'contenedor', 'cantidad_contenedores', 'id', 'peligrosidad','residuo', 'cantidad_estimada', 'estado', 'general'];
		var prefijo = 'residuo';

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/residuo.php",
			data:	{	accion                : $("#residuo_accion").val(),
						generador             : $("#residuo_generador").val(),
						contenedor            : $("#residuo_contenedor").val(),
						cantidad_contenedores : $("#residuo_cantidad_contenedores").val(),
						id                    : $("#residuo_id").val(),
						peligrosidad          : $("#peligrosidad_peligrosidad").val(),
						residuo               : $("#residuo_residuo").val(),
						cantidad_estimada     : $("#residuo_cantidad_estimada").val(),
						estado                : $("#residuo_estado").val(),
						tipo_manifiesto 	  : tipo_manifiesto
					},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 0) {
					if($("#residuo_accion").val() == 'alta') {
						// para manifiesto multiple solo queremos permitir SOLO UN residuo.
						if (tipo_manifiesto == "1") {
							agregar_residuo(retorno['datos'], true);
						} else {
							agregar_residuo(retorno['datos']);
						}
					}
					// en caso de exito cerramos manualmente el modal.
					$('#mel_popup').modal('hide');
					activar_botones_buscar_vehiculos();
					limpiar_tabla_vehiculos();
				} else {
					for(campo in campos){
						texto_errores = '';
						campo = campos[campo];

						if(retorno['errores'][campo] != null) {
							texto_errores = retorno['errores'][campo];
							$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
							$('#' + campo).addClass('error_de_carga');
						}else{
							$('#' + campo).removeClass('error_de_carga');
						}

						if(texto_errores != ''){
							$('#' + campo + '-error').html(texto_errores);
							$('#' + campo + '-error').show();
						}else{
							$('#' + campo + '-error').hide();
						}
					}

					if (retorno['errores']['duplicado']) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['duplicado'],"error");
					}

					// previene en el caso de errpr el close del modal del boton aceptar.
					return false;
				}
			}
		 });
	})
/*
	$('#residuo_generador').change(function() {
		actualizar_permisos();
	})
*/
	function actualizar_permisos(){
		$.ajax({
			type: "POST",
			url: "/operacion/transportista/residuo.php",
			data: {accion : 'permisos', generador : $("#residuo_generador").val()},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 0) {
					$('#residuo_residuo').find('option').remove();

					$.each(retorno['datos'], function(indice, permiso) {
						$('#residuo_residuo').append('<option value="' + permiso['RESIDUO'] + '">' + permiso['RESIDUO'] + ' - ' + permiso['RESIDUO_'] + '</option>').val(permiso['RESIDUO']);
					});

					$('#residuo_residuo').val($('#residuo_residuo option:first').val());

				} else {
					alert('Error actualizando permisos de generaci&oacute;n');
				}
		    }
		});
	}

<?php echo '</script'; ?>
>
<?php }
}
?>