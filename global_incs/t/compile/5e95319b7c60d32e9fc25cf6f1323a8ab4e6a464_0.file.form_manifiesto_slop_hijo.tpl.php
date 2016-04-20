<?php /* Smarty version 3.1.27, created on 2015-12-02 11:29:37
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/form_manifiesto_slop_hijo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:800889517565f0051539bb8_77296535%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e95319b7c60d32e9fc25cf6f1323a8ab4e6a464' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/form_manifiesto_slop_hijo.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '800889517565f0051539bb8_77296535',
  'variables' => 
  array (
    'MANIFIESTO' => 0,
    'TRANSPORTISTA' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565f00516f1428_27742793',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565f00516f1428_27742793')) {
function content_565f00516f1428_27742793 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '800889517565f0051539bb8_77296535';
?>
<input type="hidden" id="manifiesto_padre" name="manifiesto_padre" value="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
"/>

<div class="alert alert-info" role="alert" style="font-weight:bold;">
	Ud est&aacute; por crear un manifiesto slop relacionado que se vincular&aacute; al manifiesto Nro <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO']);?>

</div>

<div style="clear:both;"></div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Empresa Naviera/Mar&iacute;tima - Buque</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th class="invisible">ID</th>
				<th>Nombre</th>
				<th>CUIT</th>
				<th>Domicilio</th>
				<th>Tel</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['ID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['NOMBRE_EMPRESA'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['CALLE_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['NUMERO_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['PISO_R'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['GENERADORES'][0]['NUMERO_TELEFONICO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th class="invisible">ID</th>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>CUIT</th>
				<th>CAA</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['ID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE_EMPRESA'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO_R'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_ANIO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th class="invisible">ID</td>
				<th>Nombre</th>
				<th>CUIT</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>CAA</th>
			</tr>
		</th>
		<tbody>
			<tr>
				<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['ID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['NOMBRE_EMPRESA'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['CALLE_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['NUMERO_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['PISO_R'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['EXPEDIENTE_ANIO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OPERADORES'][0]['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culo</p>
	<table class="table table-hover table-striped" id="lista_vehiculos" style="display:none";>
		<thead>
			<tr>
				<th class="invisible">ID</th>
				<th>Dominio</th>
				<th>Descripci&oacute;n</th>
				<th>Borrar</th>
			</tr>
		<thead>
		<tbody></tbody>
	</table>
	<div class="contenedor_buscar" id="seleccion_vehiculos" style="background-color:white;width:auto;">
		<span class="legend">Seleccione un Vehiculo</span>
		<div class="buscar_button">
			<button type="button" class="btn btn-success btn-sm" onclick="buscarVehiculo();" data-toggle="modal" data-target="#vehiculo_popup">Buscar  Veh&iacute;culo</button>
		</div>
	</div>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos declarados en Manifiesto Cabecera</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Residuo</td>
				<td>Descripci&oacute;n</td>
				<td>Cantidad Cont.</td>
				<td>Cantidad Est.</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
$_from = $_smarty_tpl->tpl_vars['MANIFIESTO']->value['RESIDUOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['RESIDUO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['ESTADO_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['CANTIDAD_CONTENEDORES'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['res']->value['CANTIDAD_ESTIMADA'];?>
</td>
				<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Residuo</td>
				<td>Descripci&oacute;n</td>
				<td>Cantidad Cont.</td>
				<td>Cantidad Est.</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Y9</td>
				<td>L&iacute;quidos</td>
				<td><input type="text" size="4" id="residuo_cantidad_contenedores" name="residuo_cantidad_contenedores" value=""></td>
				<td><input type="text" size="4" id="residuo_cantidad_estimada" name="residuo_cantidad_estimada" value=""></td>
			</tr>
		</tbody>
	</table>
</div>

<div align="center" style="margin-top:25px;">
	<button type="button" class="btn btn-success btn-sm" onclick="submit_slop_hijo($(this));" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Finalizar</button>
</div>


<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'vehiculo'), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ('operacion/popups.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
 language="javascript">

//newProgressButton('progress-button_btn_f','submit_slop_hijo');

function buscarVehiculo()
{
	$.ajax({
	   type: "POST",
	   url: mel_path+"/operacion/transportista/vehiculo.php",
	   data: {accion : "busqueda", excluir_barcazas: "si"},
	   dataType: "text json",
	   success: function(retorno){
			if(retorno['estado'] != 0){
				alert(retorno['errores']['busqueda']);
			}else{
				$('#vehiculo_popup_title').html("Asignar Veh&iacute;culo");
				$('#vehiculo_popup_body').html(llenar_lista_vehiculos(retorno['datos']));
				$('#vehiculo_popup_content').width(600)
			}
	    }
	});
}

function llenar_lista_vehiculos(vehiculos)
{
	datos="<div class='panel panel-default'><div class='panel-heading' style='background-color:#A8D8EA;'>";
	datos+="<table width='100%' style='margin-left: 5px;' border='0' cellpadding='5' cellspacing='0' class='tabla' id='lista_vehiculo'><tr><td width='107' class='invisible'>Id</th><td width='107'>Dominio</th><td width='107'>Descripci&oacute;n</th><td width='60' align='center'>&nbsp;</td></tr></table></div>";
	datos+="<table width='99%' style='margin:5px; padding:10px;' border='0' cellpadding='15' cellspacing='0' id='lista_vehiculo'>";
	for(var indice in vehiculos){
		vehiculo = vehiculos[indice];

		color = colores[$('#lista_vehiculo> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos+= "\
		<tr>\
			<td style='padding:5px;' bgcolor='" + color + "' width='107' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
			<td style='padding:5px;' bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
			<td style='padding:5px;' bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
			<td style='padding:5px;' width='60' align='center' bgcolor='" + color + "' ><a class='asignar_vehiculo'><button type='button' class='btn btn-success' value=" + vehiculo["ID"] + " id='agregar_unico_vehiculo' onclick=\"agregar_vehiculo_unico(" + vehiculo['ID'] + ")\">Asignar</button></a></td>\
		</tr>";
	}
	datos+="</table></div>";
	datos+="<div style='width:100%;padding:10px;text-align:center;'><button type='button' class='btn btn-danger btn-sm' data-toggle='modal' style='margin: 15px;' data-dismiss='#vehiculo_popup' data-target='#vehiculo_popup'>Cerrar</button></div>";
	return datos;
}

function agregar_vehiculo_unico(vehiculo_id)
{
	$("#btn_aceptar_1").removeAttr("disabled");

	// 1 porque ese tr corresponde a los titulos de la tabla
	if ($('#lista_vehiculos tr').length <= 1) {
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "alta", id : vehiculo_id},
		   dataType: "text json",
		   success: function(retorno)
		   {
				if(retorno['estado'] != 0){
					mostrarMensaje("exclamation-triangle",retorno['errores']['alta'],"warning");
				}else{
					datos = "<tr id=" + vehiculo_id + "><td class='invisible' id='id'>" + id + "</td><td id='nombre'>" + retorno['datos']['DOMINIO'] + "</td><td id='domicilio'>" + retorno['datos']['DESCRIPCION'] + "</td><td align='center'><a href='#' value=" + retorno['datos']['ID'] + " class='btn_borrar_vehiculo' onclick=\"btn_borrar_vehiculo_unico(" + vehiculo_id + ")\"><i class='fa fa-times fa-2x'></i></a></td></tr>";

					$('#lista_vehiculos> tbody:last').append(datos);
					$("#lista_vehiculos").show();
					$('#vehiculo_popup').modal('hide');
					$("div#seleccion_vehiculos span").hide();
				}
		    }
		});
	} else {
		mostrarMensaje("exclamation-triangle", "No puede cargar m&aacute;s de un veh&iacute;culo en el manifiesto","error");
	}
}

function submit_slop_hijo(objButton)
{
	var btn = objButton.button('loading');
	// pequeñas validaciones
	var error_msg = runValidations();

	if (error_msg == '')
	{
		var manifiesto_padre = $("input#manifiesto_padre").val();
		var cant_contenedores = $("input#residuo_cantidad_contenedores").val();
		var cant_estimada = $("input#residuo_cantidad_estimada").val();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/manifiestos_slop.php",
			data: {
				tipo_slop: 'relacionado',
				manifiesto_padre: manifiesto_padre,
				cant_contenedores: cant_contenedores,
				cant_estimada: cant_estimada
			},
			dataType: "text json",
			success: function(response){
				objButton.button('reset');
				if(response['estado'] == 0) {
					mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
					window.location.replace(mel_path+"/operacion/transportista/manifiestos_proceso.php");
					resultado = true;
				} else {
					var texto_errores = '';

					for (error in response['errores']) {
						texto_errores += response['errores'][error] + '<br>';
					}
					mostrarMensaje("exclamation-triangle",texto_errores,"error");
					resultado = false;
				}
			}
		});
	}
	else
	{
		mostrarMensaje("exclamation-triangle", error_msg,"error");
	}
}

function runValidations()
{
	var err_msg = '';

	if ($('#lista_vehiculos tr').length <= 1) {
		err_msg = "Debe cargar un veh&iacute;culo en el manifiesto.";
	}

	if ($("input#residuo_cantidad_contenedores").val() == '' || $("input#residuo_cantidad_estimada").val() == '') {
		if (err_msg != '') {
			err_msg += '<br />';
		}
		err_msg += "Complete todos los campos relacionados al residuo.";
	}

	return err_msg;
}
<?php echo '</script'; ?>
>
<?php }
}
?>