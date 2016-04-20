<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:13
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/buscador_manifiestos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1804815493564f1f7528aba9_24705637%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2d1d4a2291314946ca88209b32f08be7ca36856' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/buscador_manifiestos.tpl',
      1 => 1445546570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1804815493564f1f7528aba9_24705637',
  'variables' => 
  array (
    'form_action' => 0,
    'filtros_buscador' => 0,
    'criterios' => 0,
    'tipo_manifiesto' => 0,
    'pendiente_por' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f753249d4_72508934',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f753249d4_72508934')) {
function content_564f1f753249d4_72508934 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1804815493564f1f7528aba9_24705637';
?>
<div class="table-responsive bs-example" style="font-size: 12px;">
	<h5><b>Criterio de B&uacute;squeda</b></h5>
	<form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" method="GET" style="margin-bottom:5px;">

		<?php if (in_array('protocolo_id',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group" style="margin ">
				<label for="protocolo_id">Protocolo</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="number" class="form-control" id="protocolo_id" name="protocolo_id" placeholder="Nro Protocolo" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['protocolo_id'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('manifiesto_id',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group" style="margin ">
				<label for="manifiesto_id">ID Operaci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="number" class="form-control" id="manifiesto_id" name="manifiesto_id" placeholder="ID Operaci&oacute;n" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['manifiesto_id'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('creador_empresa',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group">
				<label for="empresa">Creador</label>
				<input style="width:170px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="empresa" name="empresa" placeholder="CUIT o Raz&oacute;n Social" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['empresa'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('fecha_creacion',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group">
				<label for="fecha_creacion">Fecha Creaci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Fecha Creaci&oacute;n" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['fecha_creacion'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('fecha_recepcion',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group">
				<label for="fecha_recepcion">Fecha Recepci&oacute;n</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_recepcion" name="fecha_recepcion" placeholder="Fecha Recepci&oacute;n" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['fecha_recepcion'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('fecha_tratamiento',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group">
				<label for="fecha_tratamiento">Fecha Tratamiento</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_tratamiento" name="fecha_tratamiento" placeholder="Fecha Tratamiento" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['fecha_tratamiento'];?>
">
			</div>
		<?php }?>

		<?php if (in_array('fecha_rechazo',$_smarty_tpl->tpl_vars['filtros_buscador']->value)) {?>
			<div class="form-group">
				<label for="fecha_rechazo">Fecha Rechazo</label>
				<input style="width:150px;margin: 0px 10px 0px 5px;" type="text" class="form-control" id="fecha_rechazo" name="fecha_rechazo" placeholder="Fecha Rechazo" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['fecha_rechazo'];?>
">
			</div>
		<?php }?>

		<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="<?php echo $_smarty_tpl->tpl_vars['tipo_manifiesto']->value;?>
" />
		<input type="hidden" id="pendiente_por" name="pendiente_por" value="<?php echo $_smarty_tpl->tpl_vars['pendiente_por']->value;?>
" />
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>

<?php echo '<script'; ?>
>

	$(document).ready(function() {
		$('#fecha_creacion').datepicker({
			format: 'yyyy-mm-dd',
			endDate: new Date()
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
		});

		$('#fecha_recepcion').datepicker({
			format: 'yyyy-mm-dd',
			endDate: new Date()
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });
	});


<?php echo '</script'; ?>
><?php }
}
?>