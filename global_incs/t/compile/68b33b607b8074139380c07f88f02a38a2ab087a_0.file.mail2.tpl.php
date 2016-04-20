<?php /* Smarty version 3.1.27, created on 2015-11-25 16:17:33
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail2.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10814284855656094def85b0_72084802%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68b33b607b8074139380c07f88f02a38a2ab087a' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail2.tpl',
      1 => 1448479053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10814284855656094def85b0_72084802',
  'variables' => 
  array (
    'manifiesto_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5656094e10ff50_57194027',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5656094e10ff50_57194027')) {
function content_5656094e10ff50_57194027 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10814284855656094def85b0_72084802';
?>
Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que se le ha dado participación en un Manifiesto Electrónico.

El número de Id de Operación generado es <b><?php echo $_smarty_tpl->tpl_vars['manifiesto_id']->value;?>
</b>.

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>