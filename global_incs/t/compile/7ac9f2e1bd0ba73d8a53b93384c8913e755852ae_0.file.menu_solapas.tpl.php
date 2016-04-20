<?php /* Smarty version 3.1.27, created on 2016-02-18 11:03:31
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/menu_solapas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:107818887656c5cf33b47815_29159829%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ac9f2e1bd0ba73d8a53b93384c8913e755852ae' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/menu_solapas.tpl',
      1 => 1443651966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107818887656c5cf33b47815_29159829',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c5cf33bddbf3_96935140',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c5cf33bddbf3_96935140')) {
function content_56c5cf33bddbf3_96935140 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '107818887656c5cf33b47815_29159829';
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