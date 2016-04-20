<!-- MENU SOLAPAS -->
<div id="menu-solapas">
	<div><a id="creacion_manifiesto" href="../generador/creacion_manifiesto.php" class="tabnuevaInactiva" style="color:#2E64FE;">Manifiesto Simple</a></div>
	<div><a id="manifiestos_pendientes" href="../generador/manifiestos_pendientes.php" class="tabnuevaInactiva" style="color:#2E64FE;">Pendientes</a></div>
	<div><a id="manifiestos_proceso" href="../generador/manifiestos_proceso.php" class="tabnuevaInactiva" style="color:#2E64FE;">En Proceso</a></div>
	<div><a id="manifiestos_rechazados" href="../generador/manifiestos_rechazados.php" class="tabnuevaInactiva" style="color:#2E64FE;">Rechazados</a></div>
	<div><a id="historial_manifiestos" href="../generador/historial_manifiestos.php" class="tabnuevaInactiva" style="color:#2E64FE;">Historial</a></div>
</div>
{literal}
	<script type="text/javascript">
		var array = window.location.pathname.split( '/' );
		var last = array[array.length-1];
		var last_tab = last.slice(0, -4);
	  	$('a[id="'+last_tab+'"]').attr('class', 'tabnueva');
	</script>
{/literal}