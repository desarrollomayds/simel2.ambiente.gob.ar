<?php /* Smarty version 3.1.27, created on 2015-12-23 09:34:02
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail11.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:790046450567a94ba17ed80_85308773%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07857ba3b97a4fc445a7f64ac7f8500139c57bf2' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail11.tpl',
      1 => 1450873765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '790046450567a94ba17ed80_85308773',
  'variables' => 
  array (
    'establecimiento' => 0,
    'hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_567a94ba2ab222_97098611',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_567a94ba2ab222_97098611')) {
function content_567a94ba2ab222_97098611 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '790046450567a94ba17ed80_85308773';
?>
<p>Por medio del presente la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que ha recibido una solicitud de Alta Temprana para su establecimiento.</p>

<p>La misma le permitirá, <span style="text-decoration:underline;font-weight:bold;">por primera y única vez</span>, participar del Manifiesto Electrónico de Residuos Peligrosos para el cuál se ha gestionado su Alta Temprana.</p>

<p>Es importante destacar que a fin de poder operar con SIMEL y poder realizar futuros Manifiestos Electrónicos, deberá acercarse a la Dirección de Residuos para iniciar la apertura de un Expediente, <span style="text-decoration:underline;font-weight:bold;">dentro de los próximos 10 días corridos</span> a partir del día de  la fecha, y contará con <span style="text-decoration:underline;font-weight:bold;">180 días corridos</span> para gestionar exitosamente la obtención de un Certificado Ambiental Anual.</p>

<p>Usted puede consultar ingresar al sistema con el <b><?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->usuario;?>
</b>. La contraseña la puede reestablecer a través del siguiente <a href="<?php echo mel::getBaseMelPath();?>
/login/restablecer/index.php?v=<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
">enlace</a>.</p>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>