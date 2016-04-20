<?php /* Smarty version 3.1.27, created on 2016-04-19 16:23:43
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/js_headers.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1857694509571685bf03d255_39003870%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '899f892b2aab458170c46ff5c21a6afa6bebe1e2' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/js_headers.tpl',
      1 => 1461093607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1857694509571685bf03d255_39003870',
  'variables' => 
  array (
    'ADMIN_PATH' => 0,
    'MEL_PATH' => 0,
    'WEB_PATH' => 0,
    'BASE_PATH' => 0,
    'bootstrap' => 0,
    'mapa' => 0,
    'chosen' => 0,
    'filter' => 0,
    'epoch' => 0,
    'datepicker' => 0,
    'cuit' => 0,
    'progressButton' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_571685bf3d4058_79828169',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_571685bf3d4058_79828169')) {
function content_571685bf3d4058_79828169 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1857694509571685bf03d255_39003870';
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

<?php if (isset($_smarty_tpl->tpl_vars['bootstrap']->value) && $_smarty_tpl->tpl_vars['bootstrap']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
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

<?php if (isset($_smarty_tpl->tpl_vars['chosen']->value) && $_smarty_tpl->tpl_vars['chosen']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/chosen.jquery.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['filter']->value) && $_smarty_tpl->tpl_vars['filter']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery.filter_input.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['epoch']->value) && $_smarty_tpl->tpl_vars['epoch']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/epoch_classes.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value) && $_smarty_tpl->tpl_vars['datepicker']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['cuit']->value) && $_smarty_tpl->tpl_vars['cuit']->value == 'true') {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/validaciones_cuit.js"><?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['progressButton']->value) && $_smarty_tpl->tpl_vars['progressButton']->value == 'true') {?>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/cpb/js/modernizr.custom.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/cpb/js/classie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/cpb/js/uiProgressButton.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/plugins/progressButton.js"><?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/global.js"><?php echo '</script'; ?>
>
<?php }
}
?>