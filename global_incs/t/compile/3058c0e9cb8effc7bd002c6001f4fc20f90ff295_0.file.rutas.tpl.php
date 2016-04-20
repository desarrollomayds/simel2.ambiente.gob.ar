<?php /* Smarty version 3.1.27, created on 2016-02-29 15:42:10
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/rutas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:43203363956d491025f3ee5_73483387%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3058c0e9cb8effc7bd002c6001f4fc20f90ff295' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/rutas.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43203363956d491025f3ee5_73483387',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'rutas' => 0,
    'INFO' => 0,
    'key' => 0,
    'RUTAS' => 0,
    'ruta' => 0,
    'generador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d4910276fba2_53513541',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d4910276fba2_53513541')) {
function content_56d4910276fba2_53513541 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '43203363956d491025f3ee5_73483387';
?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/transportista.js"><?php echo '</script'; ?>
>
<!--<?php echo print_r($_smarty_tpl->tpl_vars['rutas']->value);?>
 -->
<div class="container" style="width: 550px;">
  <div class="panel-group" id="accordion">

<?php if ($_smarty_tpl->tpl_vars['INFO']->value) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['INFO']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ruta'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ruta']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['ruta']->value) {
$_smarty_tpl->tpl_vars['ruta']->_loop = true;
$foreach_ruta_Sav = $_smarty_tpl->tpl_vars['ruta'];
?>
    <div id="<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['ID'];?>
">
    <div class="panel panel-default">
      <div class="panel-heading">
        
          <i class="fa fa-truck"/> <?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['DESCRIPCION'];?>

        
        <div class="btn-group btn-group-sm" role="group" style="float:right;">
			<button type="button" class="btn btn-default" data-toggle="collapse" data-parent="#accordion" onclick="$('#collapse<?php echo $_smarty_tpl->tpl_vars['ruta']->value['ID'];?>
').collapse('toggle')"><i class="fa fa-search"/> Ver ruta</button>
			<button type="button" class="btn btn-default" onclick="usar_ruta(<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['ID'];?>
)"><i class="fa fa-plus-circle"/> Usar</button>
      <button type="button" class="btn btn-default" onclick="editar_ruta(<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['ID'];?>
,'<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['DESCRIPCION'];?>
')"><i class="fa fa-pencil-square-o"/> Editar</button>
			<button type="button" class="btn btn-default" onclick="eliminar_ruta(<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['ID'];?>
,'<?php echo $_smarty_tpl->tpl_vars['RUTAS']->value[$_smarty_tpl->tpl_vars['key']->value]['DESCRIPCION'];?>
')"><i class="fa fa-trash-o"/> Eliminar</button>
		</div>
		<div class="clearfix"></div>
      </div>
      <div id="collapse<?php echo $_smarty_tpl->tpl_vars['ruta']->value['ID'];?>
" class="panel-collapse collapse">
        <div class="panel-body">
        <?php
$_from = $_smarty_tpl->tpl_vars['ruta']->value['ESTABLECIMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['generador'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['generador']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['generador']->value) {
$_smarty_tpl->tpl_vars['generador']->_loop = true;
$foreach_generador_Sav = $_smarty_tpl->tpl_vars['generador'];
?>
        	<i class="fa fa-map-marker"/> <?php echo $_smarty_tpl->tpl_vars['generador']->value['NOMBRE'];?>
 - <?php echo $_smarty_tpl->tpl_vars['generador']->value['LOCALIDAD_R_'];?>
, <?php echo $_smarty_tpl->tpl_vars['generador']->value['PROVINCIA_R_'];?>
<br>
        <?php
$_smarty_tpl->tpl_vars['generador'] = $foreach_generador_Sav;
}
?>
        </div>
      </div>
    </div>
    </div>
    <?php
$_smarty_tpl->tpl_vars['ruta'] = $foreach_ruta_Sav;
}
?>
<?php }?>

  </div> 
</div><?php }
}
?>