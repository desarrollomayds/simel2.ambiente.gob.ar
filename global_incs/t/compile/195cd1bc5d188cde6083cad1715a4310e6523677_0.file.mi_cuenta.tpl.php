<?php /* Smarty version 3.1.27, created on 2015-11-23 15:06:27
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/mi_cuenta.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:234971232565355a3390902_78670248%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '195cd1bc5d188cde6083cad1715a4310e6523677' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/mi_cuenta.tpl',
      1 => 1443651962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234971232565355a3390902_78670248',
  'variables' => 
  array (
    'ERRORES' => 0,
    'POST_AND_SAVED' => 0,
    'USER' => 0,
    'DESCRIPCION_ROL' => 0,
    'TIPOS_DOCUMENTO' => 0,
    'tipo' => 0,
    'JSON_ERRORS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565355a34f5598_01897699',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565355a34f5598_01897699')) {
function content_565355a34f5598_01897699 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '234971232565355a3390902_78670248';
?>
<!DOCTYPE html>
<html>
<head>

    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
?>

    <!-- carga de js y files especificos para la seccion -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
?>


    <style type="text/css">
    	.obligatorio {color:red;}
    	.passw_label {color:#5F9EA0;text-align:right;}
    	.error {border-color:red;color:red;}
    </style>
</head>

<body style="margin-top:30px">
    <?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


        <div class="main">
	        <ol class="breadcrumb">
                <li><a href="#">Mi Cuenta</a></li>
                <li class="active">Edici&oacute;n</li>
            </ol>

            <?php if ($_smarty_tpl->tpl_vars['ERRORES']->value > 0) {?>
            	<div class="alert alert-danger" role="alert">
					Se han encontrado errores.
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['POST_AND_SAVED']->value) {?>
				<div class="alert alert-success" role="alert">
					Cambios guardados.
				</div>
            <?php }?>

            <div class="table-responsive bs-example">
	        	<form class="form-horizontal" action="mi_cuenta.php" method="post">
					<div class="form-group">
						<label for="login" class="col-sm-3 control-label">Nombre de Usuario</label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="login" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['LOGIN'];?>
" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="login" class="col-sm-3 control-label">Cambiar Contrase&ntilde;a</label>
						<div class="col-sm-7">
							<input style="margin-top:11px;" type="checkbox" name="restablecer_password" id="restablecer_password" <?php if ($_smarty_tpl->tpl_vars['USER']->value['RESTABLECER_PASSWORD']) {?> checked <?php }?>>
						</div>
					</div>

					<div id="new_pass_container" <?php if ($_smarty_tpl->tpl_vars['USER']->value['RESTABLECER_PASSWORD']) {?> style="display:block;" <?php } else { ?> style="display:none;" <?php }?>>
						<div class="form-group">
							<label for="login" class="col-sm-3 control-label passw_label">Nueva<span class="obligatorio">&nbsp;*</span></label>
							<div class="col-sm-7">
								<input type="password" class="form-control input_element" id="new_password_1" name="new_password_1" placeholder="Nueva Contrase&ntilde;a">
								<div style="display:none" id="new_password_1-error"></div>
							</div>
						</div>

						<div class="form-group">
							<label for="login" class="col-sm-3 control-label passw_label">Confirme<span class="obligatorio">&nbsp;*</span></label>
							<div class="col-sm-7">
								<input type="password" class="form-control input_element" id="new_password_2" name="new_password_2" placeholder="Confirme Contrase&ntilde;a">
								<div style="display:none" id="new_password_2-error"></div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="codigo_rol" class="col-sm-3 control-label">Rol</label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="codigo_rol" name="codigo_rol" value="<?php echo $_smarty_tpl->tpl_vars['DESCRIPCION_ROL']->value;?>
" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-sm-3 control-label">Nombre<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="nombre" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['NOMBRE'];?>
">
						</div>
						<div style="display:none" id="nombre-error"></div>
					</div>
					<div class="form-group">
						<label for="apellido" class="col-sm-3 control-label">Apellido<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="apellido" name="apellido" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['APELLIDO'];?>
">
						</div>
						<div style="display:none" id="apellido-error"></div>
					</div>
					<div class="form-group">
						<label for="sexo" class="col-sm-3 control-label">Sexo<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<div class="radio">
								<label>
									<input type="radio" name="sexo" id="sexo" value="f" <?php if ($_smarty_tpl->tpl_vars['USER']->value['SEXO'] == 'f') {?> checked <?php }?>>&nbsp;Femenino
								</label>
								<label>
									<input type="radio" name="sexo" id="sexo" value="m" <?php if ($_smarty_tpl->tpl_vars['USER']->value['SEXO'] == 'm') {?> checked <?php }?>>&nbsp;Masculino
								</label>
							</div>
							<div style="display:none" id="sexo-error"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="tipo_documento" class="col-sm-3 control-label">Tipo Documento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<select class="form-control input_element" id="tipo_documento" name="tipo_documento">
								<?php
$_from = $_smarty_tpl->tpl_vars['TIPOS_DOCUMENTO']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tipo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
$foreach_tipo_Sav = $_smarty_tpl->tpl_vars['tipo'];
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['USER']->value['TIPO_DOCUMENTO'] == $_smarty_tpl->tpl_vars['tipo']->value['ID']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value['DESCRIPCION'];?>
</option>
								<?php
$_smarty_tpl->tpl_vars['tipo'] = $foreach_tipo_Sav;
}
?>
							</select>
							<!-- <input type="text" class="form-control input_element" id="tipo_documento" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['TIPO_DOCUMENTO'];?>
"> -->
						</div>
						<div style="display:none" id="tipo_documento-error"></div>
					</div>
					<div class="form-group">
						<label for="nro_documento" class="col-sm-3 control-label">Nro Documento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="nro_documento" name="nro_documento" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['NRO_DOCUMENTO'];?>
">
							<div style="display:none" id="nro_documento-error"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="fecha_nacimiento" class="col-sm-3 control-label">Fecha Nacimiento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value['FECHA_NACIMIENTO'];?>
">
							<div style="display:none" id="fecha_nacimiento-error"></div>
						</div>
					</div>

					<div align="center" style="margin-top:30px;">
						<button type="submit" class="btn btn-default">Guardar Cambios</button>
						<button class="btn btn-default" id="volver_button" name="volver_button">Volver</button>
					</div>
					
				</form>
			</div>
        </div>
    </div>
</body>


<?php echo '<script'; ?>
>

$(document).ready(function() {

	var json_errors = $.parseJSON('<?php echo $_smarty_tpl->tpl_vars['JSON_ERRORS']->value;?>
');

	if (json_errors) {
		parseErrors(json_errors);
	}

	$("input#restablecer_password").change(function() {
		if ($(this).is(":checked")) {
			console.info("restablecer esta checked");
			$("div#new_pass_container").show();
		} else {
			console.info("restablecer NO esta checked");
			$("div#new_pass_container").hide();
		}
	});

	 $('#fecha_nacimiento').datepicker({
		format: 'dd/mm/yyyy',
		endDate: new Date()
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });

    removeFieldErrors();
});

<?php echo '</script'; ?>
>


</html><?php }
}
?>