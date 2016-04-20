<?php /* Smarty version 3.1.27, created on 2015-11-20 11:15:50
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_cambios_establecimientos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1814611854564f2b16803770_49348700%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58757f625257f1bb6502df17e0ac3036c4e23aa2' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_cambios_establecimientos.tpl',
      1 => 1444308480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1814611854564f2b16803770_49348700',
  'variables' => 
  array (
    'cambio' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f2b1697b304_54551574',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f2b1697b304_54551574')) {
function content_564f2b1697b304_54551574 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1814611854564f2b16803770_49348700';
?>
<style type="text/css"></style>

<div class="backGrey">

	<div class="alert alert-info" role="alert" style="font-weight:bold;">
		<?php if ($_smarty_tpl->tpl_vars['cambio']->value->tipo_cambio == 'E') {?>
			Cambios en la informaci&oacute;n del Establecimientos
		<?php } elseif ($_smarty_tpl->tpl_vars['cambio']->value->tipo_cambio == 'A') {?>
			Info de la Nueva sucursal
		<?php }?>
	</div>

	<div class="bs-example">

		<form class="form-horizontal">

			<div class="form-group">
				<label class="col-sm-2 control-label">Establecimiento</label>
				<div class="col-sm-10">
					<input class="form-control" name='nombre' id='nombre' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nombre;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">CAA</label>
				<div class="col-sm-10">
					<input class="form-control" name='caa_numero' id='caa_numero' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->caa_numero;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">CAA Vencimiento</label>
				<div class="col-sm-10">
					<input class="form-control" name='caa_vencimiento' id='caa_vencimiento' value="<?php if ($_smarty_tpl->tpl_vars['cambio']->value->caa_vencimiento) {?> <?php echo $_smarty_tpl->tpl_vars['cambio']->value->caa_vencimiento->format('Y-m-d');?>
 <?php }?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Expediente / A&ntilde;o</label>
				<div class="col-sm-10">
					<input class="form-control" name='expediente' id='expediente' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->expediente_numero;?>
 / <?php echo $_smarty_tpl->tpl_vars['cambio']->value->expediente_anio;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Actividad</label>
				<div class="col-sm-10">
					<textarea class="form-control" name='codigo_actividad' id='codigo_actividad' disabled><?php echo obtener_actividad($_smarty_tpl->tpl_vars['cambio']->value->codigo_actividad);?>
</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Descripci&oacute;n</label>
				<div class="col-sm-10">
					<textarea class="form-control" name='descripcion' id='descripcion' disabled><?php echo $_smarty_tpl->tpl_vars['cambio']->value->descripcion;?>
</textarea>
				</div>
			</div>

			<p class="registro-titulo bg-info">Domicilio Real</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">Calle</label>
				<div class="col-sm-10">
					<input class="form-control" name='calle' id='calle' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->calle;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">N&uacute;mero</label>
				<div class="col-sm-10">
					<input class="form-control" name='numero' id='numero' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->numero;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">C&oacute;digo Postal</label>
				<div class="col-sm-10">
					<input class="form-control" name='codigo_postal' id='codigo_postal' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->codigo_postal;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Piso</label>
				<div class="col-sm-10">
					<input class="form-control" name='piso' id='piso' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->piso;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Provincia</label>
				<div class="col-sm-10">
					<input class="form-control" name='provincia' id='provincia' value="<?php echo obtener_provincia($_smarty_tpl->tpl_vars['cambio']->value->provincia);?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Localidad</label>
				<div class="col-sm-10">
					<input class="form-control" name='localidad' id='localidad' value="<?php echo obtener_localidad($_smarty_tpl->tpl_vars['cambio']->value->localidad);?>
" disabled>
				</div>
			</div>

			<p class="registro-titulo bg-info">Domicilio Constituido</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">Calle</label>
				<div class="col-sm-10">
					<input class="form-control" name='calle_c' id='calle_c' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->calle_c;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">N&uacute;mero</label>
				<div class="col-sm-10">
					<input class="form-control" name='numero_c' id='numero_c' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->numero_c;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">C&oacute;digo Postal</label>
				<div class="col-sm-10">
					<input class="form-control" name='codigo_postal_c' id='codigo_postal_c' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->codigo_postal_c;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Piso</label>
				<div class="col-sm-10">
					<input class="form-control" name='piso_c' id='piso_c' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->piso_c;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Provincia</label>
				<div class="col-sm-10">
					<input class="form-control" name='provincia_c' id='provincia_c' value="<?php echo obtener_provincia($_smarty_tpl->tpl_vars['cambio']->value->provincia_c);?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Localidad</label>
				<div class="col-sm-10">
					<input class="form-control" name='localidad_c' id='localidad_c' value="<?php echo obtener_localidad($_smarty_tpl->tpl_vars['cambio']->value->localidad_c);?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Nomenclatura Catastral</label>
				<div class="col-sm-10">
					<div style="float:left;margin-right:10px;">Cir: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_circ' id='nomenclatura_catastral_circ' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nomenclatura_catastral_circ;?>
" disabled></div>
					<div style="float:left;margin-right:10px;">Sec: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_sec' id='nomenclatura_catastral_sec' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nomenclatura_catastral_sec;?>
" disabled></div>
					<div style="float:left;margin-right:10px;">Manz: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_manz' id='nomenclatura_catastral_manz' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nomenclatura_catastral_manz;?>
" disabled></div>
					<div style="float:left;margin-right:10px;">Parc: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_parc' id='nomenclatura_catastral_parc' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nomenclatura_catastral_parc;?>
" disabled></div>
					<div style="float:left;margin-right:10px;">Sub Parc: <input class="form-control" style="width:50px;" name='nomenclatura_catastral_sub_parc' id='nomenclatura_catastral_sub_parc' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->nomenclatura_catastral_sub_parc;?>
" disabled></div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Habilitaciones</label>
				<div class="col-sm-10">
					<input class="form-control" name='habilitaciones' id='habilitaciones' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->habilitaciones;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input class="form-control" name='email' id='email' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->email;?>
" disabled>
				</div>
			</div>
		</form>

	</div>

	<div align="right">
		<button class="btn btn-info btn-sm" type="button" id="boton_cerrar" style="margin-left:10px;">Cerrar</button>
	</div>

	<div class="clear20"></div>
</div>


<?php echo '<script'; ?>
>
	$(document).ready(function() {
		$(document).on('click', '#boton_cerrar', function() {
			$("#detalle_establecimiento_popup").modal('hide');
		});
	});
<?php echo '</script'; ?>
>
<?php }
}
?>