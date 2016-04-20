<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:13
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/menu_solapas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3986526564f1f7524b6c4_10540963%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa33493e299039ceef62319a2c9d7bed1dbbb59c' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/menu_solapas.tpl',
      1 => 1443651966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3986526564f1f7524b6c4_10540963',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f75285887_17778274',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f75285887_17778274')) {
function content_564f1f75285887_17778274 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3986526564f1f7524b6c4_10540963';
?>
<!-- MENU SOLAPAS -->
<div id="menu-solapas">
	<div><a id="creacion_manifiesto" href="../operador/creacion_manifiesto.php" class="tabnuevaInactiva" style="color:#2E64FE;">Manifiesto Simple</a></div>
	<div><a id="creacion_manifiesto_multiples" href="../operador/creacion_manifiesto_multiples.php" class="tabnuevaInactiva"style="color:#2E64FE;">Manifiesto M&uacute;tiple</a></div>
	<div><a id="manifiestos_slop" href="../operador/manifiestos_slop.php" class="tabnuevaInactiva"style="color:#2E64FE;">Manifiesto SLOP</a></div>
	<div><a id="manifiestos_pendientes" href="../operador/manifiestos_pendientes.php" class="tabnuevaInactiva" style="color:#2E64FE;">Manifiestos Pendientes</a></div>
	<div><a id="manifiestos_en_camino" href="../operador/manifiestos_en_camino.php" class="tabnuevaInactiva" style="color:#2E64FE;">En Camino</a></div>
	<div><a id="manifiestos_recibidos" href="../operador/manifiestos_recibidos.php" class="tabnuevaInactiva" style="color:#2E64FE;">Recibidos</a></div>
	<div><a id="manifiestos_rechazados" href="../operador/manifiestos_rechazados.php" class="tabnuevaInactiva" style="color:#2E64FE;">Rechazados</a></div>
	<div><a id="historial_manifiestos" href="../operador/historial_manifiestos.php" class="tabnuevaInactiva" style="color:#2E64FE;">Historial</a></div>
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