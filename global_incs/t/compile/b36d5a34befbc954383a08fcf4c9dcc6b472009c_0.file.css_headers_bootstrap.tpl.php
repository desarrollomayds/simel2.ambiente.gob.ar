<?php /* Smarty version 3.1.27, created on 2015-11-20 10:31:15
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/css_headers_bootstrap.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2083763673564f20a383a1a9_92493670%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b36d5a34befbc954383a08fcf4c9dcc6b472009c' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/css_headers_bootstrap.tpl',
      1 => 1447875559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2083763673564f20a383a1a9_92493670',
  'variables' => 
  array (
    'bootstrap' => 0,
    'BASE_PATH' => 0,
    'ADMIN_PATH' => 0,
    'datepicker' => 0,
    'chosen' => 0,
    'graphs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f20a38a1142_53761800',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f20a38a1142_53761800')) {
function content_564f20a38a1142_53761800 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2083763673564f20a383a1a9_92493670';
if (isset($_smarty_tpl->tpl_vars['bootstrap']->value) && $_smarty_tpl->tpl_vars['bootstrap']->value == 'true') {?>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
/assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
/assets/css/multitabs-responsive.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value) && $_smarty_tpl->tpl_vars['datepicker']->value == 'true') {?>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-datepicker.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['chosen']->value) && $_smarty_tpl->tpl_vars['chosen']->value == 'true') {?>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/chosen.min.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['graphs']->value) && $_smarty_tpl->tpl_vars['graphs']->value == 'true') {?>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/nvd3/build/nv.d3.min.css" type="text/css" />
<?php }?>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/style.css"/>
<!-- estilos usados por Noty -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/buttons.css" type="text/css" /><?php }
}
?>