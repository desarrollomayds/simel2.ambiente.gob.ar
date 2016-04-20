<?php /* Smarty version 3.1.27, created on 2015-11-20 14:36:13
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail26.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:429793308564f5a0d5de8f7_67855406%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b56f4ca1eef09641d72f5fbf32566150d7254a42' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail26.tpl',
      1 => 1446041275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '429793308564f5a0d5de8f7_67855406',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f5a0d605778_19860181',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f5a0d605778_19860181')) {
function content_564f5a0d605778_19860181 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '429793308564f5a0d5de8f7_67855406';
?>
<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que según nuestros registros, su Certificado Ambiental Anual se encuentra próximo a su fecha de vencimiento.
Le rogamos arbitre las medidas necesarias a fin de gestionar la renovación del mismo para evitar inconvenientes e interrupción en el circuito de manifiestos.
Le recordamos que no es posible ingresar a SIMEL en caso de contar con un Certificado Ambiental Anual vencido.
<p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>