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
{literal}
	<script type="text/javascript">
			var array = window.location.pathname.split( '/' );
			var last = array[array.length-1];
			var last_tab = last.slice(0, -4);
		  	$('a[id="'+last_tab+'"]').attr('class', 'tabnueva');
	</script>
{/literal}