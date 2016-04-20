<?php /* Smarty version 3.1.27, created on 2015-11-20 14:37:24
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail6.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12414063564f5a54d50ca5_40241024%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5d72bb898f2ca8d5601605f85b65c486e52d9bd' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail6.tpl',
      1 => 1443651971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12414063564f5a54d50ca5_40241024',
  'variables' => 
  array (
    'manifiesto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f5a54d7ecb7_43759271',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f5a54d7ecb7_43759271')) {
function content_564f5a54d7ecb7_43759271 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12414063564f5a54d50ca5_40241024';
?>
<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que ya se encuentra disponible el Certificado de Tratamiento/Disposición de los residuos peligrosos gestionados a través del Manifiesto Electrónico NRO <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['manifiesto']->value->id_protocolo_manifiesto);?>
.</p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>