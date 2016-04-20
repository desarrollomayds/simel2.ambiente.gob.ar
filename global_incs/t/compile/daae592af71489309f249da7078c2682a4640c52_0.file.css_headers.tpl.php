<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:12
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/css_headers.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2129250647564f1f74724659_43385672%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daae592af71489309f249da7078c2682a4640c52' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/css_headers.tpl',
      1 => 1443651960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2129250647564f1f74724659_43385672',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'bootstrap' => 0,
    'ACTUAL_PATH' => 0,
    'chosen' => 0,
    'epoch' => 0,
    'formularios' => 0,
    'datepicker' => 0,
    'progressButton' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f747bb6a6_01702808',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f747bb6a6_01702808')) {
function content_564f1f747bb6a6_01702808 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2129250647564f1f74724659_43385672';
?>
<!-- en estas 3 hojas hay estilos generales y para popups. hay que unificar en algun momento -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/interior.css" type="text/css" /><!-- este tiene que desaparecer -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/daterangepicker.css" type="text/css" />

<?php if (isset($_smarty_tpl->tpl_vars['bootstrap']->value) && $_smarty_tpl->tpl_vars['bootstrap']->value == 'true') {?>
<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap.css" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
<?php }?>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ACTUAL_PATH']->value;?>
/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/style.css"/>

<?php if (isset($_smarty_tpl->tpl_vars['chosen']->value) && $_smarty_tpl->tpl_vars['chosen']->value == 'true') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/chosen.min.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['epoch']->value) && $_smarty_tpl->tpl_vars['epoch']->value == 'true') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/epoch_styles.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['formularios']->value) && $_smarty_tpl->tpl_vars['formularios']->value == 'true') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/formularios.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value) && $_smarty_tpl->tpl_vars['datepicker']->value == 'true') {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/bootstrap-datepicker.css" type="text/css" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['progressButton']->value) && $_smarty_tpl->tpl_vars['progressButton']->value == 'true') {?>
<!-- estilos Circulas progress button -->
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/cpb/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/cpb/css/component.css" />
<?php }?>

<!-- estilos usados por Noty -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/css/buttons.css" type="text/css" />
<?php }
}
?>