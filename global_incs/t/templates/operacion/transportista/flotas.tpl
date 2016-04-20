
		<div class="panel panel-default">
			<div style="padding:5px;">
				
				<table style="color:black;font-size: 12px;background-color:#A8D8EA;" width="100%" border="0" cellpadding="15" cellspacing="15" id="lista_flotas">
					<tr>
						<td height="" bgcolor="#4D90FE" class="invisible">ID</td>
						<td height="30" width='800' bgcolor="#A8D8EA">DESCRIPCION</td>
						<td height="" width='50' bgcolor="#A8D8EA">EDITAR</td>
						<td height="" width='50' bgcolor="#A8D8EA">ELIMINAR</td>
					</tr>

					{foreach $FLOTAS as $FLOTA}
						{if $FLOTA@iteration is even by 1}
							{assign var="COLOR_LINEA" value="#EAEAE5"}
						{else}
							{assign var="COLOR_LINEA" value="#F7F7F5"}
						{/if}
					<tr id="{$FLOTA.ID}">
						<td width="77" height="30" align="center" valign="middle" bgcolor="{$COLOR_LINEA}" class="invisible" id='id'>{$FLOTA.ID}</td>
						<td width="77" height="30" align="left" valign="middle" bgcolor="{$COLOR_LINEA}" class="td">{$FLOTA.DESCRIPCION}</td>
                                                <td width="25" align="center" bgcolor="{$COLOR_LINEA}" class="td"><a class='btn_editar_flota hand' <a onclick='btn_editar_flota("{$FLOTA.ID}")'><span title="Editar Flota" class="fa fa-pencil-square-o"></span></a></td>
                                                <td width="25" align="center" bgcolor="{$COLOR_LINEA}" class="td"><a class='btn_borrar_flota hand' onclick='eliminarFlota("{$FLOTA.ID}","{$FLOTA.DESCRIPCION}")'><span title="Eliminar Flota" class="fa fa-times"></span></a></td>
					</tr>
					{/foreach}
				</table>
					<div style="width:100%;padding:10px;text-align:center;">
						<button type="button" class="btn btn-success btn-sm" id='btn_agregar_flota' data-toggle="modal" style="margin: 15px;">Agregar</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm" data-toggle="modal" style="margin: 15px;">Cerrar</button>
					</div>
				<span class="titulos"></span>
			</div>
		</div>


	{literal}
	<script>
			var registro_actual;
			var colores         = new Array();

			colores['#A8D8EA'] = '#F7F7F5';
			colores['#EAEAE5'] = '#F7F7F5';
			colores['#F7F7F5'] = '#EAEAE5';

			function agregar_flota(flota){
				color = colores[$('#lista_flotas> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr id=" + flota["ID"] + ">\
					<td width='77' height='30' bgcolor='" + color + "' class='invisible' id='id'>"   + flota["ID"] + "</td>\
					<td width='77' height='30' bgcolor='" + color + "' class='td'>  "                + flota["DESCRIPCION"] + "</td>\
					<td width='25' align='center' bgcolor='" + color + "' class='td'><a onclick='btn_editar_flota(" + flota["ID"] + ")' class='btn_editar_flota hand'><span title='Editar Flota' class='fa fa-pencil-square-o'></span></a></td>\
					<td width='25' align='center' bgcolor='" + color + "' class='td'><a onclick='eliminarFlota(" + flota["ID"] + ")'><span title='Eliminar Flota' class='fa fa-times'></span></a></td>\
				</tr>";

				$('#lista_flotas> tbody:last').append(datos);
			}

			$('#btn_agregar_flota').click(function() {
				registro_actual = $(this).parent().parent();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/operacion/transportista/flota.php",
				   data: {id : registro_actual.find('#id').html()},
				   dataType: "html",
				   success: function(msg){
				   	BootstrapDialog.show({
			            title: 'Agregar Flota',
			            message: $(msg),
			        });
				   	/*
				   	$('#div_1_popup_title').html("Agregar Flota");
				   	$('#div_1_popup_body').html(msg);
				   	$('#div_1_popup_content').width(600);
				   	$('#div_1_popup').modal('show');*/
				   }
				 });
			})

			//$( document ).on( "click", ".btn_editar_flota", function() {
			function btn_editar_flota(id){
				//registro_actual = $(this).parent().parent();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/operacion/transportista/flota.php",
				   data: {id : id, opcion : 'detalle'},
				   dataType: "html",
				   success: function(msg){
				   	BootstrapDialog.show({
			            title: 'Editar Flota',
			            message: $(msg),
			        });
				   	/*
				   	$('#div_1_popup_title').html("Agregar Flota");
				   	$('#div_1_popup_body').html(msg);
				   	$('#div_1_popup_content').width(600);
				   	$('#div_1_popup').modal('show');*/
				   }
				 });
			};

	function eliminarFlota(id, descripcion){
	        
	            BootstrapDialog.confirm({
	            title: 'CUIDADO',
	            message: 'Esta seguro de que quiere eliminar esta flota?<br>' + descripcion,
	            type: BootstrapDialog.TYPE_DANGER, 
	            closable: true, 
	            draggable: false, 
	            btnCancelLabel: 'No, cancelar', 
	            btnOKLabel: 'Si, eliminar', 
	            btnOKClass: 'btn-danger', 
	            callback: function(result) {
	                if(result) {
	                    $.ajax({
							   type: "POST",
							   url: mel_path+"/operacion/transportista/flota.php",
							   data: {accion : 'baja', id : id},
							   dataType: "text json",
							   success: function(retorno){
								if(retorno['estado'] != 0){
									alert(retorno['general']);
								}else{
									$("#" + id).remove();
								}
						   	}
						});
	                }
	            }
	        });
		};

	// mostrar confirmacion de eliminacion de flota
	function pedirConfirmacionEliminarFlota(id,flota)
	{
		BootstrapDialog.show({
            title: 'Administrar Flotas',
            message: $(response),
        });
		$('#confirmar_borrado_flota_title').html("Confirmar eliminaci&oacute;n");
		$('#confirmar_borrado_flota_body').html(flota);
		$("#conf_elim_flota").prop('value', id)
		$('#confirmar_borrado_flota_content').width(500);
		$('#confirmar_borrado_flota').modal('show');
	}


		$('.btn_agregar_resultado_vehiculo').on('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['alta']);
				}else{
					agregar_vehiculo_flota(retorno['datos']);
				}
		   }
		 });
	});
	</script>
	{/literal}