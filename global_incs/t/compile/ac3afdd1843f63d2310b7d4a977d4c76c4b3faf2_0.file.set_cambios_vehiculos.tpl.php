<?php /* Smarty version 3.1.27, created on 2016-04-04 16:38:24
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_cambios_vehiculos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13532744855702c2b0b7ab01_88305941%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3afdd1843f63d2310b7d4a977d4c76c4b3faf2' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_cambios_vehiculos.tpl',
      1 => 1444069639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13532744855702c2b0b7ab01_88305941',
  'variables' => 
  array (
    'cambio' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5702c2b0c2f880_97138708',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5702c2b0c2f880_97138708')) {
function content_5702c2b0c2f880_97138708 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13532744855702c2b0b7ab01_88305941';
?>
<style type="text/css"></style>

<div class="backGrey">

	<div class="alert alert-info" role="alert" style="font-weight:bold;">Info del nuevo veh&iacute;culo</div>

	<div class="bs-example">

		<form class="form-horizontal">

			<div class="form-group">
				<label class="col-sm-2 control-label">Dominio</label>
				<div class="col-sm-10">
					<input class="form-control" name='dominio' id='dominio' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->dominio;?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo Veh&iacute;culo</label>
				<div class="col-sm-10">
					<input class="form-control" name='tipo_vehiculo' id='tipo_vehiculo' value="<?php echo TipoVehiculo::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['cambio']->value->tipo_vehiculo);?>
" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo Caja</label>
				<div class="col-sm-10">
					<input class="form-control" name='tipo_caja' id='tipo_caja' value="<?php if ($_smarty_tpl->tpl_vars['cambio']->value->tipo_caja) {?> <?php echo TipoCaja::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['cambio']->value->tipo_caja);?>
 <?php }?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Descripci&oacute;n</label>
				<div class="col-sm-10">
					<input class="form-control" name='descripcion' id='descripcion' value="<?php echo $_smarty_tpl->tpl_vars['cambio']->value->descripcion;?>
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
			$("#detalle_vehiculo_popup").modal('hide');
		});
	});
<?php echo '</script'; ?>
>
<?php }
}
?>