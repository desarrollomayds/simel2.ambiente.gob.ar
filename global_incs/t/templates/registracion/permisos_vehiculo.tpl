<div class="backGrey">

	<div class="table-responsive">

		<div class="table-responsive">
			<table class="table table-striped"  id="lista_permisos">
				<thead>
					<tr class="registro-tabla-header">
					  	<th class="invisible">&nbsp;</th>
					  	<th class="text-center">RESIDUO</th>
					  	<th class="text-center">ESTADO</th>
					  	<th class="text-center">CANTIDAD</th>
					  	<th class="text-center">ACCIONES</th>
					</tr>
				</thead>
				<tbody>

					{foreach $VEHICULO.PERMISOS as $PERMISO}
					<tr>
						<td class="invisible" id='id'>{$PERMISO.ID}</td>
						<td class="text-center" id='residuo'>{$PERMISO.RESIDUO}</td>
						<td class="text-center" id='estado'>{$PERMISO.ESTADO_}</td>
						<td class="text-center" id='cantidad'>{$PERMISO.CANTIDAD}</td>
						<td class="text-center">
							<a href="javascript:void(0);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mel3_popup" onClick="editar_permiso_vehiculo($(this), {$PERMISO.ID})" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
							<a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), {$PERMISO.ID})" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
						</td>
					</tr>
					{/foreach}

				</tbody>
			</table>
		</div>
    </div>
    
    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" onclick="agregar_permiso_vehiculo($(this))" data-toggle="modal" data-target="#mel3_popup">Agregar</a>
	    </div>
    </div>

</div>

{literal}
<script>

	function modificar_permiso_vehiculo(permiso){

		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

		registro_actual = null;
	}

	function agregar_listado_vehiculo(permiso){

		datos = "\
		<tr>\
			<td class='invisible' id='id'>" + permiso["ID"] + "</td>\
			<td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
			<td class='text-center' id='estado'>" + permiso["ESTADO_"] + "</td>\
			<td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>\
			<td class='text-center'>\
				<a href='javascript:void(0);' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#mel3_popup' onClick='editar_permiso_vehiculo($(this),  " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
				<a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso_vehiculo($(this), " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
			</td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	function borrar_permiso_vehiculo(esto,PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		    type: "POST",
		    url: mel_path+"/registracion/permiso_vehiculo.php",
		    data: {
		   	accion : "baja", establecimiento : "{/literal}{$ESTABLECIMIENTO.ID}{literal}", vehiculo : "{/literal}{$VEHICULO.ID}{literal}", id : PermisoID},
		    dataType: "text json",
		    success: function(retorno)
		    {
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}
				else
				{
					registro_actual.remove();
				}
		   }
		 });
	}

	function editar_permiso_vehiculo(esto,PermisoID)
	{
		registro_actual = esto.parent().parent();
		$.ajax({
		    type: "GET",
		    url: mel_path+"/registracion/permiso_vehiculo.php?establecimiento={/literal}{$ESTABLECIMIENTO.ID}{literal}&vehiculo={/literal}{$VEHICULO.ID}{literal}&id=" + PermisoID,
		    dataType: "html",
		    success: function(msg){
		  	    $('#mel3_popup_title').html("Editar permiso Veh&iacute;culo");
				$('#mel3_popup_body').html(msg);
				$('#mel3_popup_content').width(600);
		    }
		});
	}

	function agregar_permiso_vehiculo(esto)
	{
		$.ajax({
			type: "GET",
			url: mel_path+"/registracion/permiso_vehiculo.php?establecimiento={/literal}{$ESTABLECIMIENTO.ID}{literal}&vehiculo={/literal}{$VEHICULO.ID}{literal}",
			dataType: "html",
			success: function(msg){
		  	 	$('#mel3_popup_title').html("Agregar permiso Veh&iacute;culo");
				$('#mel3_popup_body').html(msg);
				$('#mel3_popup_content').width(600);
			}
		});
	}


</script>
{/literal}
