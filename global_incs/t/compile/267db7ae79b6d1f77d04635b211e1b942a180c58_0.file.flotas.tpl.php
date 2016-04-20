<?php /* Smarty version 3.1.27, created on 2015-11-20 14:29:33
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flotas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1370897702564f587d364cb7_41004486%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '267db7ae79b6d1f77d04635b211e1b942a180c58' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flotas.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1370897702564f587d364cb7_41004486',
  'variables' => 
  array (
    'FLOTAS' => 0,
    'FLOTA' => 0,
    'COLOR_LINEA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f587d458a60_49871525',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f587d458a60_49871525')) {
function content_564f587d458a60_49871525 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1370897702564f587d364cb7_41004486';
?>

		<div class="panel panel-default">
			<div style="padding:5px;">
				
				<table style="color:black;font-size: 12px;background-color:#A8D8EA;" width="100%" border="0" cellpadding="15" cellspacing="15" id="lista_flotas">
					<tr>
						<td height="" bgcolor="#4D90FE" class="invisible">ID</td>
						<td height="30" width='800' bgcolor="#A8D8EA">DESCRIPCION</td>
						<td height="" width='50' bgcolor="#A8D8EA">EDITAR</td>
						<td height="" width='50' bgcolor="#A8D8EA">ELIMINAR</td>
					</tr>

					<?php
$_from = $_smarty_tpl->tpl_vars['FLOTAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['FLOTA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['FLOTA']->_loop = false;
$_smarty_tpl->tpl_vars['FLOTA']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['FLOTA']->value) {
$_smarty_tpl->tpl_vars['FLOTA']->_loop = true;
$_smarty_tpl->tpl_vars['FLOTA']->iteration++;
$foreach_FLOTA_Sav = $_smarty_tpl->tpl_vars['FLOTA'];
?>
						<?php if (!(1 & $_smarty_tpl->tpl_vars['FLOTA']->iteration / 1)) {?>
							<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#EAEAE5", null, 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#F7F7F5", null, 0);?>
						<?php }?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['ID'];?>
">
						<td width="77" height="30" align="center" valign="middle" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="invisible" id='id'><?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['ID'];?>
</td>
						<td width="77" height="30" align="left" valign="middle" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td"><?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['DESCRIPCION'];?>
</td>
                                                <td width="25" align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td"><a class='btn_editar_flota hand' <a onclick='btn_editar_flota("<?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['ID'];?>
")'><span title="Editar Flota" class="fa fa-pencil-square-o"></span></a></td>
                                                <td width="25" align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td"><a class='btn_borrar_flota hand' onclick='eliminarFlota("<?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['ID'];?>
","<?php echo $_smarty_tpl->tpl_vars['FLOTA']->value['DESCRIPCION'];?>
")'><span title="Eliminar Flota" class="fa fa-times"></span></a></td>
					</tr>
					<?php
$_smarty_tpl->tpl_vars['FLOTA'] = $foreach_FLOTA_Sav;
}
?>
				</table>
					<div style="width:100%;padding:10px;text-align:center;">
						<button type="button" class="btn btn-success btn-sm" id='btn_agregar_flota' data-toggle="modal" style="margin: 15px;">Agregar</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm" data-toggle="modal" style="margin: 15px;">Cerrar</button>
					</div>
				<span class="titulos"></span>
			</div>
		</div>


	
	<?php echo '<script'; ?>
>
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
	<?php echo '</script'; ?>
>
	<?php }
}
?>