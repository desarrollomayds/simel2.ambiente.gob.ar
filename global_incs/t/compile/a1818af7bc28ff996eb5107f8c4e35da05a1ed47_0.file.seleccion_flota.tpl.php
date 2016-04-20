<?php /* Smarty version 3.1.27, created on 2016-02-23 16:37:37
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/seleccion_flota.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:151652740556ccb50107d570_25226988%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1818af7bc28ff996eb5107f8c4e35da05a1ed47' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/seleccion_flota.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151652740556ccb50107d570_25226988',
  'variables' => 
  array (
    'flotas_vehiculos' => 0,
    'flota' => 0,
    'vehiculo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56ccb5011b3101_93779342',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56ccb5011b3101_93779342')) {
function content_56ccb5011b3101_93779342 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '151652740556ccb50107d570_25226988';
?>
<div >

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading" style="background-color:#A8D8EA;">Flotas</div>

		<table width="100%" border="0" cellpadding="5" cellspacing="0" class="table" id="lista_busqueda_vehiculos">

			<?php if (!empty($_smarty_tpl->tpl_vars['flotas_vehiculos']->value)) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['flotas_vehiculos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['flota'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['flota']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['flota']->value) {
$_smarty_tpl->tpl_vars['flota']->_loop = true;
$foreach_flota_Sav = $_smarty_tpl->tpl_vars['flota'];
?>
					<?php if (!empty($_smarty_tpl->tpl_vars['flota']->value['VEHICULOS'])) {?>
						<tr bgcolor="#F7F7F5">
							<td class="invisible" id='id'><?php echo $_smarty_tpl->tpl_vars['flota']->value['ID'];?>
</td>
							<td class="hand descripcion_flota td" width="90%" value="<?php echo $_smarty_tpl->tpl_vars['flota']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['flota']->value['DESCRIPCION'];?>
</td>
							<td colspan="2" width="25" align="left" bgcolor="#F7F7F5" class="td"><a class='btn_asignar_flota_resultado'><button type="button" class="btn btn-success" data-dismiss="modal">Asignar</button></a></td>
						</tr>

						<!-- vehiculos headers -->
						<tr class="vehiculos_child_<?php echo $_smarty_tpl->tpl_vars['flota']->value['ID'];?>
 alert alert-success" style="display:none;">
							<td class="invisible" id='id'>&nbsp;</td>
							<td>Dominio</td>
							<td>Tipo</td>
							<td>Tipo Caja</td>
							<td colspan="2">Descripcion</td>
						</tr>
						<!-- recorro vehiculos de la flota -->
						<?php
$_from = $_smarty_tpl->tpl_vars['flota']->value['VEHICULOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['vehiculo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['vehiculo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vehiculo']->value) {
$_smarty_tpl->tpl_vars['vehiculo']->_loop = true;
$foreach_vehiculo_Sav = $_smarty_tpl->tpl_vars['vehiculo'];
?>
							<tr class="vehiculos_child_<?php echo $_smarty_tpl->tpl_vars['flota']->value['ID'];?>
" style="display:none;">
								<td class="invisible" id='id'><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value['ID'];?>
</td>
								<td width="50%"><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value['DOMINIO'];?>
</td>
								<td width="50%"><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value['TIPO_VEHICULO'];?>
</td>
								<td width="50%"><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value['TIPO_CAJA'];?>
</td>
								<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value['DESCRIPCION'];?>
</td>
							</tr>
						<?php
$_smarty_tpl->tpl_vars['vehiculo'] = $foreach_vehiculo_Sav;
}
?>
					<?php }?>
				<?php
$_smarty_tpl->tpl_vars['flota'] = $foreach_flota_Sav;
}
?>
			<?php } else { ?>
				<tr><td>NO HAY FLOTAS QUE MOSTRAR</td></tr>
			<?php }?>
		</table>
	</div>

	<div class="clear20"></div>

	<div style="text-align:center;">
			<input class="btn btn-default" type="button" data-dismiss='modal' id="btn_admin_flotas" name="btn_admin_flotas" onclick="btn_admin_flotas_vehiculos()" value="Administrar Flotas" style="margin: 15px;">
<!--			<input class="btn btn-default" type="button" id="btn_agregar_por_dominio" name="btn_agregar_por_dominio" value="Asignar Dominio" style="margin: 15px;">-->
			<button class="btn btn-default" type="button" data-dismiss="modal" value="Cerrar" style="margin: 15px;" class="btn btn-info">Cerrar</button>
	</div>

	<div class="clear20"></div>
</div>
<?php }
}
?>