

<div class="backGrey">
	
	<input type="hidden" id="rol_id_permiso" value="{$ROL_ID}">
	
	<div class="table-responsive">

		<table class="table table-striped"  id="lista_permisos">
			<thead>
			<tr class="registro-tabla-header">
			  	<th class="invisible">&nbsp;</th>
			  	<th class="text-center">RESIDUO</th>
			  	{if $ROL_ID == '1'}
			  		<th class="text-center">CANTIDAD</th>
			  	{/if}
			  	<th class="text-center">ACCIONES</th>
			</tr>
			</thead>
			<tbody id="contenido_permisos">

				{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
				<tr>
					<td class="invisible" id="id">{$PERMISO.ID}</td>
					<td class="text-center" id="residuo">{$PERMISO.RESIDUO}</td>
					{if $ROL_ID == '1'}
						<td class="text-center" id="cantidad">{$PERMISO.CANTIDAD}</td>
					{/if}
					<td class="text-center">
						<a href="javascript:void(0);" class="btn btn-primary btn-xs" onClick="editar_permiso($(this), {$PERMISO.ID})" data-toggle="modal" data-target="#mel2_popup"><i class="fa fa-pencil-square-o fa-lg"></i></a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso($(this), {$PERMISO.ID})"><i class="fa fa-trash-o fa-lg"></i></a>
					</td>
				</tr>
				{/foreach}

			</tbody>
		</table>

	</div>

    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" onclick="agregar_perm_al_establecimiento($(this))" data-toggle="modal" data-target="#mel2_popup">Agregar</a>
	    </div>
    </div>
</div>
{literal}
<script>

	//permisos
	function modificar_permiso_establecimiento(permiso){
		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

		registro_actual = null;
	}

	function agregar_permiso_establecimiento(permiso){
		
		datos = "\
		<tr>\
			<td class='invisible' id='id'>" + permiso["ID"] + "</td>\
			<td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
			" + ($('#rol_id_permiso').val() == '1' ? "<td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>" : "") + "\
			<td class='text-center'>\
				<a href='javascript:void(0);' class='btn btn-primary btn-xs' onClick='editar_permiso($(this),  " + permiso["ID"] + " )' data-toggle='modal' data-target='#mel2_popup'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
				<a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso($(this), " + permiso["ID"] + ")'><i class='fa fa-trash-o fa-lg'></i></a>\
			</td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	function borrar_permiso(esto,PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php",
		   data: {accion : "baja", establecimiento: "{/literal}{$ESTABLECIMIENTO.ID}{literal}", id : PermisoID},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	}

	function editar_permiso(esto, PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php?rol={/literal}{$ROL_ID}{literal}&id=" + PermisoID,
		   dataType: "html",
		   success: function(msg){
		  	 	$('#mel2_popup_title').html("Editar residuos permisos");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
		   	}
		});
	}

	function agregar_perm_al_establecimiento(esto)
	{	
		registro_actual = esto.parent().parent();
		console.log(registro_actual);
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php?rol={/literal}{$ROL_ID}{literal}",
			dataType: "html",
			success: function(msg){
		  	 	$('#mel2_popup_title').html("Residuos permisos");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
			}
		});
	}


</script>
{/literal}