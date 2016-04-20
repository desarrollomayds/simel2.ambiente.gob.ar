<style type="text/css">{literal}
	.error {border-color:red;color:red;}
{/literal}</style>

<div class="backGrey" id="residuos_popup">

<!--    <input type='hidden' name='residuo_accion' id='residuo_accion' value='{$ACCION}' size='50'> -->
	<input type='hidden' name='residuo_id' id='residuo_id' value='{$RESIDUO.ID}' size='50'>
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Residuo</label>
			<div class="col-sm-10">
				<select class="form-control residuos" name='residuo' id='residuo'>
					<option></option>
					{foreach $residuos as $res}
						<option value='{$res->codigo}' {if $res->codigo == $permiso_establecimiento->residuo}selected{/if}>{$res->codigo} - {$res->descripcion}
						</option>
					{/foreach}
				</select>
				<div style="display:none" id="residuo-error"></div>
			</div>
		</div>

		{if $establecimiento->tipo == Establecimiento::GENERADOR}
			<div class="form-group">
				<label class="col-sm-2 control-label">Cantidad estimada (kg)</label>
				<div class="col-sm-10">
					<input type='text' class="form-control" name='cantidad' id='cantidad' value='{$permiso_establecimiento->cantidad}' size='30'>
					<div style="display:none" id="cantidad-error"></div>
				</div>
			</div>
			<div style="clear:both;"></div>
		{/if}

		{if $establecimiento->tipo == Establecimiento::OPERADOR}
			<div class="form-group">
				<label class="col-sm-2 control-label">Tratamientos</label>
				<div class="col-sm-10">
					<select name='tratamientos' id='tratamientos' class="tratamientos" style='width: 300px' multiple="multiple">
		                {foreach $tratamientos as $trat}
		                    <option value='{$trat->codigo}'
			                    {foreach $permiso_establecimiento->tratamientos as $trat_definido}
			                        {if $trat->codigo == $trat_definido->operacion_residuo}
			                            selected
			                        {/if}
			                    {/foreach}
		                    >{$trat->codigo} - {$trat->descripcion}
		                    </option>
		                {/foreach}
		            </select>
		            <div style="display:none" id="tratamientos-error"></div>
		        </div>
			</div>
		{/if}

		{* Hidden data *}
		<input type="hidden" id="establecimiento_id" name="establecimiento_id" value="{$establecimiento->id}" />

		{if isset($permiso_establecimiento)}
			<input type="hidden" id="permiso_id" name="permiso_id" value="{$permiso_establecimiento->id}"/>
		{/if}

	</form>

    <div align="right">
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar' onclick="btn_aceptar_permisos_establecimiento();">Aceptar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

    <div class="clear20"></div>
</div>

{literal}
<script>
	$(".residuos").chosen({width:"100%;"});
	$(".tratamientos").chosen({width:"100%;"});

	$(document).ready(function() {
		removeFieldErrors();
	});

	function btn_aceptar_permisos_establecimiento()
	{
		var residuo = $("select#residuo").val();
		var cantidad = $("input#cantidad").val();
		var tratamientos = JSON.stringify($("#tratamientos").val());
		var establecimiento_id = $("input#establecimiento_id").val();
		var permiso_id = $("input#permiso_id").val();

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_permisos_establecimiento.php",
			data: {
				accion: "set",
				permiso_id: permiso_id,
				residuo: residuo,
				cantidad: cantidad,
				tratamientos: tratamientos,
				establecimiento_id: establecimiento_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					var nombre_container = $('input#permisos_hidden_info').val();
					var html = parsePermisoEstablecimientoHtml(retorno['permiso_obj'], nombre_container);

					if (nombre_container == 'nuevo_permiso_'+retorno['permiso_obj'].tipo_establecimiento+'_'+retorno['permiso_obj'].establecimiento_id) {
						$('div#container_establecimiento_permisos_'+retorno['permiso_obj'].tipo_establecimiento+'_'+retorno['permiso_obj'].establecimiento_id).append(html);
					} else {
						$('div#'+nombre_container).replaceWith(html);
					}


					$('#permisos_popup').modal('hide');
				} else {
					parseErrors(retorno['errores']);
				}
			}
		});
	}

	function parsePermisoEstablecimientoHtml(permiso_obj, nombre_container)
	{
		console.debug(permiso_obj);
		//id: "736", establecimiento_id: 326, residuo: "Y10C", cantidad: null, tratamientos: Array[0]}cantidad: nullestablecimiento_id: 326id: "736"residuo: "Y10C"tratamientos: Array[0]__proto__: Object

		var html = ' \
				<div class="bs-example residuos_establecimiento" id="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'"> \
				<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" permiso-id="'+permiso_obj.id+'" onclick="borrarPermisoEstablecimiento($(this), '+permiso_obj.establecimiento_id+');" container="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'" title="Borrar" rol="'+permiso_obj.tipo_establecimiento+'"></i> \
				<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso" onclick="setPermisoEstablecimiento($(this), '+permiso_obj.establecimiento_id+','+permiso_obj.id+');" container="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'" data-toggle="modal" data-target="#permisos_popup"></i> \
				<p> \
					<strong>CSC: </strong><span id="callbPerm">'+permiso_obj.residuo+'</span> \
					<br> \
					<strong>Descripci&oacute;n: </strong><span>'+permiso_obj.descripcion+'</span> \
					<br> \
				';

		if (permiso_obj.tipo_establecimiento == 'generador') {
			html += ' \
					<strong>Cantidad: </strong><span>'+permiso_obj.cantidad+'</span> \
					<br>';
		}

		if (permiso_obj.tipo_establecimiento == 'operador') {
			html += '<strong>Tratamientos: </strong> \
				</p> \
				<ul>';

			$.each(permiso_obj.tratamientos, function(key, value) {
				console.info(value);
				html += '<li>'+value+'</li>';
			});

			html += '</ul></div>';
				
		// este cierre aplica a rol != operador.
		} else {
			html += '</p></div>';
		}

		return html;
	}
</script>
{/literal}