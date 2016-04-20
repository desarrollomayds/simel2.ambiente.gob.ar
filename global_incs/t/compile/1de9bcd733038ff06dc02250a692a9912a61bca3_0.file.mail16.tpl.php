<?php /* Smarty version 3.1.27, created on 2015-11-20 14:35:51
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail16.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1306626819564f59f7367b37_44772587%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1de9bcd733038ff06dc02250a692a9912a61bca3' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail16.tpl',
      1 => 1445546628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1306626819564f59f7367b37_44772587',
  'variables' => 
  array (
    'manifiesto' => 0,
    'g' => 0,
    't' => 0,
    'o' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f59f74231a2_68879529',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f59f74231a2_68879529')) {
function content_564f59f74231a2_68879529 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1306626819564f59f7367b37_44772587';
?>
<p>Por medio del presente, la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que el manifiesto con ID DE OPERACIÓN <b><?php echo $_smarty_tpl->tpl_vars['manifiesto']->value->id;?>
</b>, ha sido vencido automáticamente al haber alcanzado 5 días sin ser aprobado por todas sus partes.<p>

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
		<li>Estado: <?php if ($_smarty_tpl->tpl_vars['g']->value->estado == 'a') {?> <span style="color:green;font-weight:bold;">Aprobado</span> <?php } else { ?><span style="color:red;font-weight:bold;">Pendiente</span> <?php }?></li>
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
		<li>Estado: <?php if ($_smarty_tpl->tpl_vars['t']->value->estado == 'a') {?> <span style="color:green;font-weight:bold;">Aprobado</span> <?php } else { ?><span style="color:red;font-weight:bold;">Pendiente</span> <?php }?></li>
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
		<li>Estado: <?php if ($_smarty_tpl->tpl_vars['p']->value->estado == 'a') {?> <span style="color:green;font-weight:bold;">Aprobado</span> <?php } else { ?><span style="color:red;font-weight:bold;">Pendiente</span> <?php }?></li>
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