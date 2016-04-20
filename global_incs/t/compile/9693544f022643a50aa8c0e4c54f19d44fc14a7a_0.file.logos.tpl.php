<?php /* Smarty version 3.1.27, created on 2016-01-14 15:11:17
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/logos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10765157905697e4c520b9b6_08790640%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9693544f022643a50aa8c0e4c54f19d44fc14a7a' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/logos.tpl',
      1 => 1443651960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10765157905697e4c520b9b6_08790640',
  'variables' => 
  array (
    'ALERTA' => 0,
    'HOME_URL' => 0,
    'BASE_PATH' => 0,
    'MODULO_BOLETAS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5697e4c523a8d4_01265547',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5697e4c523a8d4_01265547')) {
function content_5697e4c523a8d4_01265547 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10765157905697e4c520b9b6_08790640';
?>
<div id='alertas'><?php echo $_smarty_tpl->tpl_vars['ALERTA']->value['mensaje'];?>
</div>
<div id="logo" style="width: 100%;">
	<a href="<?php echo $_smarty_tpl->tpl_vars['HOME_URL']->value;?>
"><img style="float: left;" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" width="289" height="73" /></a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['HOME_URL']->value;?>
"><img style="float: left;margin-left: 120px" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" /></a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['HOME_URL']->value;?>
"><img style="float: right;margin-right: 45px" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" width="137" height="60" vspace="5" /></a>
</div>
<div style="height: 0px;width: 100%;clear:both;"></div>
<?php if ($_smarty_tpl->tpl_vars['MODULO_BOLETAS']->value == 'si') {?>
<?php echo '<script'; ?>
 type="text/javascript">
	$( document ).ready(function() {
    	$( ".imgBox" ).show();
	});
<?php echo '</script'; ?>
>
<?php }

}
}
?>