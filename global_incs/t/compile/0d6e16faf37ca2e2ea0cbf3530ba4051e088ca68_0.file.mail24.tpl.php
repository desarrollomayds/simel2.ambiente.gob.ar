<?php /* Smarty version 3.1.27, created on 2015-11-20 14:38:57
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail24.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:223734906564f5ab1c7a295_75500365%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d6e16faf37ca2e2ea0cbf3530ba4051e088ca68' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail24.tpl',
      1 => 1444244896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223734906564f5ab1c7a295_75500365',
  'variables' => 
  array (
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f5ab1cc1542_06617837',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f5ab1cc1542_06617837')) {
function content_564f5ab1cc1542_06617837 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '223734906564f5ab1c7a295_75500365';
?>
<p>Ha ocurrido un error en SIMEL en la seccion <b><?php echo $_smarty_tpl->tpl_vars['params']->value->seccion;?>
.</b></p>

<h4>La descripción recibida del error fue</h4>
<pre><?php echo $_smarty_tpl->tpl_vars['params']->value->descripcion;?>
<pre>

<h4>Datos Útiles acorde al contexto en cuestión (json sin decode):</h4>
<pre><?php echo $_smarty_tpl->tpl_vars['params']->value->extra_json_data;?>
</pre>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>