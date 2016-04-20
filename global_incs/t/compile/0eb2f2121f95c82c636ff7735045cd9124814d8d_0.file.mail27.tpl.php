<?php /* Smarty version 3.1.27, created on 2016-04-20 13:50:09
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail27.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12752794045717b34148f709_39476847%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eb2f2121f95c82c636ff7735045cd9124814d8d' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail27.tpl',
      1 => 1461165050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12752794045717b34148f709_39476847',
  'variables' => 
  array (
    'manifiesto' => 0,
    'g' => 0,
    't' => 0,
    'o' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5717b341500072_41168328',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717b341500072_41168328')) {
function content_5717b341500072_41168328 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12752794045717b34148f709_39476847';
?>
<p>Por medio del presente, el Ministerio de Ambiente y Desarrollo Sustentable de la Nación le informa que el manifiesto con número de protocolo <b><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['manifiesto']->value->id_protocolo_manifiesto);?>
</b>, aún no ha declarado la recepción de los RP correspondientes.
Le sugerimos ponerse en contacto a fin de confirmar la efectiva recepción de los mismos y recordarle que debe informar tal recepción.
.<p>

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

<p>Ante cualquier inconveniente o eventualidad, le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>