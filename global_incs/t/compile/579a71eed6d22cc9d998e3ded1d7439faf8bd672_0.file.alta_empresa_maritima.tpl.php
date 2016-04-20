<?php /* Smarty version 3.1.27, created on 2016-03-28 18:14:39
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_empresa_maritima.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:202405834456f99ebf0702e9_08351438%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '579a71eed6d22cc9d998e3ded1d7439faf8bd672' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_empresa_maritima.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202405834456f99ebf0702e9_08351438',
  'variables' => 
  array (
    'cuit' => 0,
    'razon' => 0,
    'alta_temprana' => 0,
    'nueva_sucursal' => 0,
    'generador' => 0,
    'provincias' => 0,
    'provincia' => 0,
    'localidades' => 0,
    'localidad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f99ebf0fa0f7_15751344',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f99ebf0fa0f7_15751344')) {
function content_56f99ebf0fa0f7_15751344 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '202405834456f99ebf0702e9_08351438';
?>
<div class="container" style="width:100%;">
	<form class="form-horizontal" id="form_generador_alta_temprana" method="post">

		<input id="geocomplete" type="hidden">
		<input id="pais_r" type="hidden" data-nombre="ARGENTINA">

		<input type="hidden" name="cuit" id="cuit" value="<?php echo $_smarty_tpl->tpl_vars['cuit']->value;?>
">
		<input type="hidden" name="nombre" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['razon']->value;?>
">
		<input type="hidden" name ="alta_temprana" id="alta_temprana" value="<?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value;?>
">
		<input type="hidden" name ="nueva_sucursal" id="nueva_sucursal" value="<?php echo $_smarty_tpl->tpl_vars['nueva_sucursal']->value;?>
">

		<p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Informaci&oacute;n Empresa/Establecimiento</p>

		<div class="form-group">
			<label class="col-sm-3 control-label">Cuit</label>
			<div class="col-sm-9">
				<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['cuit']->value;?>
" id="cuit" name="cuit" value="<?php echo $_smarty_tpl->tpl_vars['cuit']->value;?>
" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Empresa Naviera</label>
			<div class="col-sm-9">
				<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['razon']->value;?>
" id="razon_social" name="razon_social" value="<?php echo $_smarty_tpl->tpl_vars['razon']->value;?>
" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Buque <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input class="form-control" type="text" id="nombre_establecimiento" name="nombre_establecimiento" value="<?php echo $_smarty_tpl->tpl_vars['generador']->value['nombre'];?>
" required>
				<div id="nombre_establecimiento-td"><div class="form_error_msg" id="nombre_establecimiento-error" style="display:none;"></div></div>
			</div>
		</div>
		
		<p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Domicilio Real</p>

		<div class="form-group">
			<label class="col-sm-3 control-label">Provincia <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name='provincia' id='provincia_r'>
					<option value="0" selected>Seleccione una provincia</option>
					<?php
$_from = $_smarty_tpl->tpl_vars['provincias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['provincia'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['provincia']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['provincia']->value) {
$_smarty_tpl->tpl_vars['provincia']->_loop = true;
$foreach_provincia_Sav = $_smarty_tpl->tpl_vars['provincia'];
?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['provincia']->value['CODIGO'];?>
'><?php echo $_smarty_tpl->tpl_vars['provincia']->value['DESCRIPCION'];?>
</option>
					<?php
$_smarty_tpl->tpl_vars['provincia'] = $foreach_provincia_Sav;
}
?>
				</select>
				<div id="provincia-td"><div class="form_error_msg" id="provincia-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Localidad <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name='localidad' id='localidad_r'>
					<option value="0" selected>Seleccione una localidad</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['localidades']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['localidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['localidad']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['localidad']->key => $_smarty_tpl->tpl_vars['localidad']->value) {
$_smarty_tpl->tpl_vars['localidad']->_loop = true;
$foreach_localidad_Sav = $_smarty_tpl->tpl_vars['localidad'];
?>
                   	 	<option value='<?php echo $_smarty_tpl->tpl_vars['localidad']->key;?>
' data-nombre='<?php echo $_smarty_tpl->tpl_vars['localidad']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['localidad']->value;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['localidad'] = $foreach_localidad_Sav;
}
?>
                </select>
				<div id="localidad-td"><div class="form_error_msg" id="localidad-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Calle <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='calle' id='calle' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['calle'];?>
' size='30' required>
				<div id="calle-td"><div class="form_error_msg" id="calle-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">N&uacute;mero <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='numero' id='numero' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['numero'];?>
' size='30' required>
				<div id="numero-td"><div class="form_error_msg" id="numero-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">C&oacute;digo Postal <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='codigo_postal' id='codigo_postal' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['codigo_postal'];?>
' size='30' required>
				<div id="codigo_postal-td"><div class="form_error_msg" id="codigo_postal-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Piso</label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='piso' id='piso' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['piso'];?>
' size='30'>
				<div id="piso-td"><div class="form_error_msg" id="piso-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Oficina</label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='oficina' id='oficina' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['oficina'];?>
' size='30'>
				<div id="oficina-td"><div class="form_error_msg" id="oficina-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Coordenadas geogr&aacute;ficas del establecimiento</label>
            <div class="col-sm-9">
            	<div>
                	<span id="latitud_r" data-geo="lat" style="display:none"></span>
                	<span id="longitud_r" data-geo="lng" style="display:none"></span>
                	<input type='hidden' name='latitud' id='latitud_r'>
					<input type='hidden' name='longitud' id='longitud_r'>
            	</div>
            	<div class="mapa-empresa" style="width:100%;height:300px;"></div>
            </div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Tel&eacute;fono de emergencia <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='numero_telefonico' id='numero_telefonico' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['numero_telefonico'];?>
' size='30'>
				<div id="numero_telefonico-td"><div class="form_error_msg" id="numero_telefonico-error" style="display:none;"></div></div>
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label">Correo electr&oacute;nico <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type="email" class="form-control" name='email' id='email' value='<?php echo $_smarty_tpl->tpl_vars['generador']->value['email'];?>
' size='30' required>
				<div id="email-td"><div class="form_error_msg" id="email-error" style="display:none;"></div></div>
			</div>
		</div>

		<div style="clear:both;"></div>

		<input type="hidden" id="tipo_alta" name="tipo_alta" value="" />

	</form>
    <div class="clear20"></div>
</div>

<?php echo '<script'; ?>
>
	actualizar_mapa('mapa-empresa', '');

	$('#provincia_r').change(function() {
	    limpiar_calle_num('r','');
	    actualizar_localidades();
	    actualizar_mapa('mapa-empresa','');
	});

	$('#localidad_r').change(function() {
		actualizar_mapa('mapa-empresa','');
	});

	$("#calle_r").on('change', function() {

		if ($("#numero_r").val())
		actualizar_mapa('mapa-empresa','');
	});

	$("#numero_r").on('change', function() {

		if ($("#calle_r").val())
		actualizar_mapa('mapa-empresa','');
	});

	function actualizar_localidades() {
	    $.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
	        $('#localidad_r').find('option').remove();

	        $.each(json, function(codigo, descripcion) {
	            $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
	        });

	        $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');
	        $('#localidad_r').val($('#localidad_r option:first').val());
	    });
	}
<?php echo '</script'; ?>
>
<?php }
}
?>