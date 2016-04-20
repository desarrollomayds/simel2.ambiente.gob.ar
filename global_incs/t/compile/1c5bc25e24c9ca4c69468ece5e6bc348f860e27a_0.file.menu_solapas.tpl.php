<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:19
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/generador/menu_solapas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:370674224564f1f7b480c02_67035187%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c5bc25e24c9ca4c69468ece5e6bc348f860e27a' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/generador/menu_solapas.tpl',
      1 => 1443651969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '370674224564f1f7b480c02_67035187',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f7b4f0330_01130049',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f7b4f0330_01130049')) {
function content_564f1f7b4f0330_01130049 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '370674224564f1f7b480c02_67035187';
?>
<!-- MENU SOLAPAS -->
<div id="menu-solapas">
	<div><a id="creacion_manifiesto" href="../generador/creacion_manifiesto.php" class="tabnuevaInactiva" style="color:#2E64FE;">Manifiesto Simple</a></div>
	<div><a id="manifiestos_pendientes" href="../generador/manifiestos_pendientes.php" class="tabnuevaInactiva" style="color:#2E64FE;">Pendientes</a></div>
	<div><a id="manifiestos_proceso" href="../generador/manifiestos_proceso.php" class="tabnuevaInactiva" style="color:#2E64FE;">En Proceso</a></div>
	<div><a id="manifiestos_rechazados" href="../generador/manifiestos_rechazados.php" class="tabnuevaInactiva" style="color:#2E64FE;">Rechazados</a></div>
	<div><a id="historial_manifiestos" href="../generador/historial_manifiestos.php" class="tabnuevaInactiva" style="color:#2E64FE;">Historial</a></div>
</div>

	<?php echo '<script'; ?>
 type="text/javascript">
		var array = window.location.pathname.split( '/' );
		var last = array[array.length-1];
		var last_tab = last.slice(0, -4);
	  	$('a[id="'+last_tab+'"]').attr('class', 'tabnueva');
	<?php echo '</script'; ?>
>
<?php }
}
?>