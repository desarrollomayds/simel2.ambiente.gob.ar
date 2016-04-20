<?php /* Smarty version 3.1.27, created on 2016-02-17 16:22:41
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/menu_solapas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:178933206956c4c881220713_42124154%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b4683f9115c9d73bab71d38f006c0f294ff6ff' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/menu_solapas.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178933206956c4c881220713_42124154',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c4c88144e4e0_63042966',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c4c88144e4e0_63042966')) {
function content_56c4c88144e4e0_63042966 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '178933206956c4c881220713_42124154';
?>
<!-- MENU SOLAPAS -->
<div id="menu-solapas">
	<div><a id="creacion_manifiesto" href="../transportista/creacion_manifiesto.php" class="tabnuevaInactiva" style="color:#2E64FE;">Manifiesto Simple</a></div>
	<div><a id="creacion_manifiesto_multiples" href="../transportista/creacion_manifiesto_multiples.php" class="tabnuevaInactiva"style="color:#2E64FE;">Manifiesto M&uacute;tiple</a></div>
	<div><a id="manifiestos_slop" href="../transportista/manifiestos_slop.php" class="tabnuevaInactiva"style="color:#2E64FE;">Manifiesto SLOP</a></div>
	<div><a id="manifiestos_pendientes" href="../transportista/manifiestos_pendientes.php" class="tabnuevaInactiva" style="color:#2E64FE;">Pendientes</a></div>
	<div><a id="manifiestos_proceso" href="../transportista/manifiestos_proceso.php" class="tabnuevaInactiva" style="color:#2E64FE;">En Proceso</a></div>
	<!--
		<div><a id="rutas" href="rutas.php" class="tabnuevaInactiva" style="color:#2E64FE;">Rutas</a></div>
	-->
	<div><a id="manifiestos_rechazados" href="../transportista/manifiestos_rechazados.php" class="tabnuevaInactiva" style="color:#2E64FE;">Rechazados</a></div>
	<div><a id="historial_manifiestos" href="../transportista/historial_manifiestos.php" class="tabnuevaInactiva" style="color:#2E64FE;">Historial</a></div>
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