<?php /* Smarty version 3.1.27, created on 2016-04-20 13:50:01
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail24.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18710701005717b339e41a93_50326012%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1ac073faa03054221d27989b5f341634c57a76d' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/mail/mail24.tpl',
      1 => 1444244896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18710701005717b339e41a93_50326012',
  'variables' => 
  array (
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5717b339f1d7c4_82578281',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717b339f1d7c4_82578281')) {
function content_5717b339f1d7c4_82578281 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18710701005717b339e41a93_50326012';
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