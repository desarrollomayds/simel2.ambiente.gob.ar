<?php /* Smarty version 3.1.27, created on 2015-11-24 14:05:59
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/vehiculos_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:449658812565498f7e98da9_00998279%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa0d87eaf5b0b2d2cf218686059f89893d14ef40' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/vehiculos_establecimiento.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '449658812565498f7e98da9_00998279',
  'variables' => 
  array (
    'ESTABLECIMIENTO' => 0,
    'VEHICULO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565498f8157d87_12390281',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565498f8157d87_12390281')) {
function content_565498f8157d87_12390281 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '449658812565498f7e98da9_00998279';
?>
<div class="backGrey">

	<div class="table-responsive">

		<table class="table table-striped"  id="lista_vehiculos">
			<thead>
				<tr class="registro-tabla-header">
				  	<th class="invisible">&nbsp;</th>
				  	<th class="text-center">DOMINIO</th>
				  	<th class="text-center">TIPO VEH&Iacute;CULO</th>
				  	<th class="text-center">TIPO CAJA</th>
				  	<th class="text-center">DESCRIPCI&Oacute;N</th>
				  	<th class="text-center">ACCIONES</th>
				</tr>
			</thead>
			<tbody>

				<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['VEHICULOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
				<tr>
					<td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
</td>
					<td class="text-center" id='dominio'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
					<td class="text-center" id='tipo_vehiculo'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO'];?>
</td>
					<td class="text-center" id='tipo_caja'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA'];?>
</td>
					<td class="text-center" id='descripcion'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td>
					<td class="text-center">
						<a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_vehiculo" data-toggle="modal" data-target="#mel2_popup" rel='tooltip' data-placement='top' title='Permisos'><i class='fa fa-pencil-square-o fa-lg'></i></a>
						<a href="javascript:void(0);" class="btn btn-primary btn-xs btn_editar_vehiculo" data-toggle="modal" data-target="#mel2_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs btn_borrar_vehiculo" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
					</td>

					</tr>
				<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>

			</tbody>
		</table>

    </div>

    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" id="btn_agregar_vehiculo" data-toggle="modal" data-target="#mel2_popup">Agregar</a>
	    </div>
    </div>

</div>


<?php echo '<script'; ?>
>

var Establecimiento = {
	ID: "<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
"
}

<?php echo '</script'; ?>
>

<?php }
}
?>