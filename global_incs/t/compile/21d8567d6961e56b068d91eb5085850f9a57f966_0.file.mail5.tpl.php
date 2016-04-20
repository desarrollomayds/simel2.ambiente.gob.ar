<?php /* Smarty version 3.1.27, created on 2015-11-20 14:36:27
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail5.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:149280119564f5a1bd23bc3_08028082%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21d8567d6961e56b068d91eb5085850f9a57f966' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail5.tpl',
      1 => 1443651971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149280119564f5a1bd23bc3_08028082',
  'variables' => 
  array (
    'manifiesto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f5a1bd5a0b9_41297862',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f5a1bd5a0b9_41297862')) {
function content_564f5a1bd5a0b9_41297862 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '149280119564f5a1bd23bc3_08028082';
?>
<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que los residuos peligrosos gestionados a través del Manifiesto Electrónico NRO <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['manifiesto']->value->id_protocolo_manifiesto);?>
 han sido recibidos por el operador.</p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>