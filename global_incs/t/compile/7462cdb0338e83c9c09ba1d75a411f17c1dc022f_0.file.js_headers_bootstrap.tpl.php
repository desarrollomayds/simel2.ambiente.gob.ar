<?php /* Smarty version 3.1.27, created on 2016-04-19 16:24:01
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/js_headers_bootstrap.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:982306284571685d16c3b41_74214908%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7462cdb0338e83c9c09ba1d75a411f17c1dc022f' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/js_headers_bootstrap.tpl',
      1 => 1461093623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '982306284571685d16c3b41_74214908',
  'variables' => 
  array (
    'ADMIN_PATH' => 0,
    'MEL_PATH' => 0,
    'WEB_PATH' => 0,
    'BASE_PATH' => 0,
    'bootstrap' => 0,
    'mapa' => 0,
    'datepicker' => 0,
    'chosen' => 0,
    'graphs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_571685d17b2aa0_00993425',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_571685d17b2aa0_00993425')) {
function content_571685d17b2aa0_00993425 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '982306284571685d16c3b41_74214908';
?>
<?php echo '<script'; ?>
 type="text/javascript">
	var admin_path 	= '<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
';
	var mel_path 	= '<?php echo $_smarty_tpl->tpl_vars['MEL_PATH']->value;?>
';
	var base_path 	= '<?php echo $_smarty_tpl->tpl_vars['WEB_PATH']->value;?>
';
	var asset_path  = '<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
'; // contexto javascript
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery.noty.packaged.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery.number.min.js"><?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['bootstrap']->value == 'true') {?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
/assets/js/xeditable/bootstrap3-editable/js/bootstrap-editable.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
/assets/js/bootstrap-responsive-tabs.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/bootstrap-dialog.min.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['mapa']->value) && $_smarty_tpl->tpl_vars['mapa']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery.geocomplete.min.js"><?php echo '</script'; ?>
>
<?php }?>


<?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value) && $_smarty_tpl->tpl_vars['datepicker']->value == 'true') {?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['chosen']->value) && $_smarty_tpl->tpl_vars['chosen']->value == 'true') {?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/chosen.jquery.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['graphs']->value) && $_smarty_tpl->tpl_vars['graphs']->value == 'true') {?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/nvd3/build/d3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/nvd3/build/nv.d3.min.js"><?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/global.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/admin/base.js"><?php echo '</script'; ?>
><?php }
}
?>