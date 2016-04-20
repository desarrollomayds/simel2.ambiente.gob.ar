<?php /* Smarty version 3.1.27, created on 2016-04-20 13:50:06
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail26.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5513993965717b33e583219_79026814%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f69cba265082ba80b6536036fd7d2c48aa2fbcc' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail26.tpl',
      1 => 1461165016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5513993965717b33e583219_79026814',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5717b33e5b0f27_62479795',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717b33e5b0f27_62479795')) {
function content_5717b33e5b0f27_62479795 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5513993965717b33e583219_79026814';
?>
<p>Por medio del presente, el Ministerio de Ambiente y Desarrollo Sustentable de la Nación le informa que según nuestros registros, su Certificado Ambiental Anual se encuentra próximo a su fecha de vencimiento.
Le rogamos arbitre las medidas necesarias a fin de gestionar la renovación del mismo para evitar inconvenientes e interrupción en el circuito de manifiestos.
Le recordamos que no es posible ingresar a SIMEL en caso de contar con un Certificado Ambiental Anual vencido.
<p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>