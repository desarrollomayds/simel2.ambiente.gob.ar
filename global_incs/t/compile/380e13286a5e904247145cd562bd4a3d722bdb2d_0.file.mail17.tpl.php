<?php /* Smarty version 3.1.27, created on 2015-11-24 09:16:39
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail17.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:103884014565455271a95e0_49410105%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380e13286a5e904247145cd562bd4a3d722bdb2d' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail17.tpl',
      1 => 1445546618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103884014565455271a95e0_49410105',
  'variables' => 
  array (
    'manifiesto' => 0,
    'g' => 0,
    't' => 0,
    'o' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565455272d8c50_76444756',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565455272d8c50_76444756')) {
function content_565455272d8c50_76444756 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '103884014565455271a95e0_49410105';
?>
<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que el manifiesto con número de protocolo <b><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['manifiesto']->value->id_protocolo_manifiesto);?>
</b>, ha sido vencido automáticamente al haber alcanzado 30 días sin ser recibido por el operador.<p>

<p>Participantes del manifiesto</p>

<div>
	<b>Generadores:</b><br />
	<ul>
	<?php
$_from = $_smarty_tpl->tpl_vars['manifiesto']->value->generadores_manifiesto;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['g']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->_loop = true;
$foreach_g_Sav = $_smarty_tpl->tpl_vars['g'];
?>
		<li>Nombre: <?php echo $_smarty_tpl->tpl_vars['g']->value->nombre;?>
</li>
		<li>Sucursal: <?php echo $_smarty_tpl->tpl_vars['g']->value->sucursal;?>
</li>
		<br />
	<?php
$_smarty_tpl->tpl_vars['g'] = $foreach_g_Sav;
}
?>
	</ul>
</div>

<div>
	<b>Transportista:</b><br />
	<ul>
	<?php
$_from = $_smarty_tpl->tpl_vars['manifiesto']->value->transportistas_manifiesto;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['t']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
$foreach_t_Sav = $_smarty_tpl->tpl_vars['t'];
?>
		<li>Nombre: <?php echo $_smarty_tpl->tpl_vars['t']->value->nombre;?>
</li>
		<li>Sucursal: <?php echo $_smarty_tpl->tpl_vars['t']->value->sucursal;?>
</li>
	<?php
$_smarty_tpl->tpl_vars['t'] = $foreach_t_Sav;
}
?>
	</ul>
</div>

<div>
	<b>Operador:</b><br />
	<ul>
	<?php
$_from = $_smarty_tpl->tpl_vars['manifiesto']->value->operadores_manifiesto;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['o']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
$foreach_o_Sav = $_smarty_tpl->tpl_vars['o'];
?>
		<li>Nombre: <?php echo $_smarty_tpl->tpl_vars['o']->value->nombre;?>
</li>
		<li>Sucursal: <?php echo $_smarty_tpl->tpl_vars['o']->value->sucursal;?>
</li>
	<?php
$_smarty_tpl->tpl_vars['o'] = $foreach_o_Sav;
}
?>
	</ul>
</div>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>