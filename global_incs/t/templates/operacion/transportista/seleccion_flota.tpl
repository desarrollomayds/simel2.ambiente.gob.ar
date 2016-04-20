<div >

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading" style="background-color:#A8D8EA;">Flotas</div>

		<table width="100%" border="0" cellpadding="5" cellspacing="0" class="table" id="lista_busqueda_vehiculos">

			{if !empty($flotas_vehiculos)}
				{foreach $flotas_vehiculos as $flota}
					{if !empty($flota['VEHICULOS'])}
						<tr bgcolor="#F7F7F5">
							<td class="invisible" id='id'>{$flota.ID}</td>
							<td class="hand descripcion_flota td" width="90%" value="{$flota.ID}">{$flota.DESCRIPCION}</td>
							<td colspan="2" width="25" align="left" bgcolor="#F7F7F5" class="td"><a class='btn_asignar_flota_resultado'><button type="button" class="btn btn-success" data-dismiss="modal">Asignar</button></a></td>
						</tr>

						<!-- vehiculos headers -->
						<tr class="vehiculos_child_{$flota.ID} alert alert-success" style="display:none;">
							<td class="invisible" id='id'>&nbsp;</td>
							<td>Dominio</td>
							<td>Tipo</td>
							<td>Tipo Caja</td>
							<td colspan="2">Descripcion</td>
						</tr>
						<!-- recorro vehiculos de la flota -->
						{foreach $flota['VEHICULOS'] as $vehiculo}
							<tr class="vehiculos_child_{$flota.ID}" style="display:none;">
								<td class="invisible" id='id'>{$vehiculo.ID}</td>
								<td width="50%">{$vehiculo.DOMINIO}</td>
								<td width="50%">{$vehiculo.TIPO_VEHICULO}</td>
								<td width="50%">{$vehiculo.TIPO_CAJA}</td>
								<td colspan="2">{$vehiculo.DESCRIPCION}</td>
							</tr>
						{/foreach}
					{/if}
				{/foreach}
			{else}
				<tr><td>NO HAY FLOTAS QUE MOSTRAR</td></tr>
			{/if}
		</table>
	</div>

	<div class="clear20"></div>

	<div style="text-align:center;">
			<input class="btn btn-default" type="button" data-dismiss='modal' id="btn_admin_flotas" name="btn_admin_flotas" onclick="btn_admin_flotas_vehiculos()" value="Administrar Flotas" style="margin: 15px;">
<!--			<input class="btn btn-default" type="button" id="btn_agregar_por_dominio" name="btn_agregar_por_dominio" value="Asignar Dominio" style="margin: 15px;">-->
			<button class="btn btn-default" type="button" data-dismiss="modal" value="Cerrar" style="margin: 15px;" class="btn btn-info">Cerrar</button>
	</div>

	<div class="clear20"></div>
</div>
