<div class="backGrey">

	<div class="table-responsive">

		<table class="table table-striped"  id="lista_vehiculos">
			<thead>
				<tr class="registro-tabla-header">
				  	<th class="invisible">&nbsp;</th>
				  	<th class="text-center">DOMINIO</th>
				  	<th class="text-center">TIPO VEH&Iacute;CULO</th>
				  	<th class="text-center">TIPO CAJA</th>
				  	<th class="text-center">DESCRIPCI&Oacute;N</th>
				  	<th class="text-center">ACCIONES</th>
				</tr>
			</thead>
			<tbody>

				{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
				<tr>
					<td class="invisible" id="id">{$VEHICULO.ID}</td>
					<td class="text-center" id='dominio'>{$VEHICULO.DOMINIO}</td>
					<td class="text-center" id='tipo_vehiculo'>{$VEHICULO.TIPO_VEHICULO}</td>
					<td class="text-center" id='tipo_caja'>{$VEHICULO.TIPO_CAJA}</td>
					<td class="text-center" id='descripcion'>{$VEHICULO.DESCRIPCION}</td>
					<td class="text-center">
						<a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_vehiculo" data-toggle="modal" data-target="#mel2_popup" rel='tooltip' data-placement='top' title='Permisos'><i class='fa fa-pencil-square-o fa-lg'></i></a>
						<a href="javascript:void(0);" class="btn btn-primary btn-xs btn_editar_vehiculo" data-toggle="modal" data-target="#mel2_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs btn_borrar_vehiculo" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
					</td>

					</tr>
				{/foreach}

			</tbody>
		</table>

    </div>

    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" id="btn_agregar_vehiculo" data-toggle="modal" data-target="#mel2_popup">Agregar</a>
	    </div>
    </div>

</div>

{literal}
<script>

var Establecimiento = {
	ID: "{/literal}{$ESTABLECIMIENTO.ID}{literal}"
}

</script>
{/literal}
