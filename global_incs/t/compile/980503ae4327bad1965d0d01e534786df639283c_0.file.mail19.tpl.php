<?php /* Smarty version 3.1.27, created on 2015-11-20 14:37:04
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail19.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1777252418564f5a403804a3_31342000%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '980503ae4327bad1965d0d01e534786df639283c' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail19.tpl',
      1 => 1443651971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1777252418564f5a403804a3_31342000',
  'variables' => 
  array (
    'establecimiento' => 0,
    'hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f5a403d7ed9_16402097',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f5a403d7ed9_16402097')) {
function content_564f5a403d7ed9_16402097 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1777252418564f5a403804a3_31342000';
?>
<p>Por medio del presente la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que un usuario ha sido generado a su establecimiento para operar en el sistema SIMEL: <b><?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->usuario;?>
</b></p>

<p>Lo primero que usted debe hacer es generar una contraseña para su usuario que lo puede realizar a través del siguiente <a href="<?php echo mel::getBaseMelPath();?>
/login/restablecer/index.php?v=<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
">enlace</a>.</p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>