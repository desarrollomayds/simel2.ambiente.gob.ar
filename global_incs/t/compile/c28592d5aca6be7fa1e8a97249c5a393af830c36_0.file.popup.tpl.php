<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:12
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/popup.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:38531317564f1f7483e6d0_11148760%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c28592d5aca6be7fa1e8a97249c5a393af830c36' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/general/popup.tpl',
      1 => 1443651960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38531317564f1f7483e6d0_11148760',
  'variables' => 
  array (
    'ID_POPUP' => 0,
    'HIDDEN_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f74862428_87347251',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f74862428_87347251')) {
function content_564f1f74862428_87347251 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '38531317564f1f7483e6d0_11148760';
?>
<div id="<?php echo $_smarty_tpl->tpl_vars['ID_POPUP']->value;?>
_popup" class="modal fade" style="overflow:auto;">
	<div class="modal-dialog" id="<?php echo $_smarty_tpl->tpl_vars['ID_POPUP']->value;?>
_popup_content">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h4 id="<?php echo $_smarty_tpl->tpl_vars['ID_POPUP']->value;?>
_popup_title" class="modal-title" style="color:#31708f;"></h4>
			</div>
			<div id="<?php echo $_smarty_tpl->tpl_vars['ID_POPUP']->value;?>
_popup_body" class="modal-body">

			</div>
		</div>
	</div>

	<?php if (isset($_smarty_tpl->tpl_vars['HIDDEN_INFO']->value) && $_smarty_tpl->tpl_vars['HIDDEN_INFO']->value == 'true') {?>
		<input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['ID_POPUP']->value;?>
_hidden_info" value="" />
	<?php }?>

</div><?php }
}
?>