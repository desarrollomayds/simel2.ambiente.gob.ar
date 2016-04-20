<?php /* Smarty version 3.1.27, created on 2016-01-14 15:13:06
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/popup.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11438148975697e532b75516_93073165%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a89aa84ec6033abc1410f1e94983ef45db5b3c4' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/popup.tpl',
      1 => 1443651960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11438148975697e532b75516_93073165',
  'variables' => 
  array (
    'ID_POPUP' => 0,
    'HIDDEN_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5697e532b9c170_67370927',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5697e532b9c170_67370927')) {
function content_5697e532b9c170_67370927 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11438148975697e532b75516_93073165';
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