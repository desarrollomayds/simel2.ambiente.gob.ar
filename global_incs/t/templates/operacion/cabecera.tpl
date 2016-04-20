{* cada vez que se requiera la cabecera, pedimos un update de las estadisticas del user *}
{actualizar_estadisticas_del_usuario()}

<!-- DATOS DE LA EMPRESA -->
<div id="recuadro-datos-empresa" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;">
	<div class="sub_containers_cabecera borde-redondeado" align="left">
		<strong>Empresa:</strong>
		<br />
		<strong>CUIT :</strong> {$EMPRESA.CUIT}<br />
		<strong>Raz&oacute;n social : </strong>{$EMPRESA.NOMBRE}<br />
		<strong>Establecimiento: </strong>{$ESTABLECIMIENTO.NOMBRE}<br />
	</div>

	<div class="sub_containers_cabecera borde-redondeado" align="left" style="margin-top:10px;">
		<strong>Certificado:</strong><br />
		{if $ESTABLECIMIENTO.CAA_NUMERO}
			<b>Nro:&nbsp;</b>{$ESTABLECIMIENTO.CAA_NUMERO}<br />
			<b>Vencimiento:&nbsp;</b> {$ESTABLECIMIENTO.CAA_VENCIMIENTO} <b>({$ESTABLECIMIENTO.CAA_VENCIMIENTO_DIAS} d&iacute;as) </b>.
		{else}
			No disponible.
		{/if}
	</div>
</div>

<!-- ESTADISTICAS -->
<div id="recuadro-datos-totales" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;width:560px;">

	<div class="borde-redondeado sub_containers_cabecera">
		<div align="left" style=" padding-left:10px">
			<b>Estad&iacute;sticas Manifiestos:</b>
		</div>

		<div class="recuado_estadisticas" style="background-color:#9FD4DB;">
			Creados:
			<span>{$ESTADISTICAS.MANIFIESTOS_CREADOS}</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#E9DB60;">
			Pendientes:
			<span>{$ESTADISTICAS.MANIFIESTOS_PENDIENTES}</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#43a775;">
			Aprobados:
			<span>{$ESTADISTICAS.MANIFIESTOS_ACEPTADOS}</span>
		</div>

		<br />

		<div class="recuado_estadisticas" style="background-color:#8C97C3;">
			Recibidos:
			<span>{$ESTADISTICAS.MANIFIESTOS_RECIBIDOS}</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#FFA23E;">
			Finalizados:
			<span>{$ESTADISTICAS.MANIFIESTOS_FINALIZADOS}</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#E95E51;">
			Rechazados:
			<span>{$ESTADISTICAS.MANIFIESTOS_RECHAZADOS}</span>
		</div>
	</div>

	<div class="borde-redondeado sub_containers_cabecera" style="margin-top:10px;text-align:left;">
		<b>Manifiestos disponibles:</b> {$ESTADISTICAS.FORMULARIOS_DISPONIBLES}
	</div>

</div>


<!-- MENSAJERIA -->
{*
<div id="recuadro-datos-mensajes" class="borde-redondeado" align="center">
	<div><strong>Alertas:</strong></div>
	<div  class="recuado_estadisticas" id="recuadro_mensajes">
		<b>Mensajes Nuevos</b><br/>
        <span class="totales"><br />{$NUEVOS}</span><br />
		<div id="icono_mensajes"><a href="mensajeria/"><img src="{$BASE_PATH}/imagenes/mensaje-nuevo.png"/></a></div>
	</div>
</div>
*}
</div>

<div style="height: 7px;width: 10px;clear: both;"></div>
	