<?php /* Smarty version 3.1.27, created on 2016-02-05 14:51:11
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/generador/menu_solapas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:194466988156b4e10f9b2650_20229843%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '468a1bbee48c50e34e06b91c7a3a5d49b3d1ea09' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/generador/menu_solapas.tpl',
      1 => 1443651969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194466988156b4e10f9b2650_20229843',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e10f9b7ac5_70559398',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e10f9b7ac5_70559398')) {
function content_56b4e10f9b7ac5_70559398 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '194466988156b4e10f9b2650_20229843';
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