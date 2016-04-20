<?php /* Smarty version 3.1.27, created on 2015-11-20 10:27:57
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/procesar_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1194903520564f1fdd54bac2_32354515%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff70e4cc298b8f37ed5090119be1b90a64b443be' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/procesar_manifiesto.tpl',
      1 => 1445284307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1194903520564f1fdd54bac2_32354515',
  'variables' => 
  array (
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'GENERADOR' => 0,
    'TRANSPORTISTA' => 0,
    'OPERADOR' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'cant_residuos_procesados' => 0,
    'cant_residuos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1fdd786607_78675296',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1fdd786607_78675296')) {
function content_564f1fdd786607_78675296 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1194903520564f1fdd54bac2_32354515';
?>
<div class="alert alert-info" role="alert" style="font-weight:bold;">
	Ud est&aacute; por indicar el tratamiento a los residuos del manifiesto Nro <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO']);?>

</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Informaci&oacute;n del Manifiesto</p>
	<table class="table table-hover table-striped">
		<tbody>
			<tr>
				<td><b>Empresa Creadora:</b></td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['CREADOR']['NOMBRE_EMPRESA'];?>
</td>
			</tr>
			<tr>
				<td><b>Fecha de Creaci&oacute;n</b></td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_CREACION'];?>
</td>
			</tr>
			<tr>
				<td><b>Fecha de Recepci&oacute;n</b></td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_RECEPCION'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['GENERADORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['GENERADOR'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['GENERADOR']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['GENERADOR']->value) {
$_smarty_tpl->tpl_vars['GENERADOR']->_loop = true;
$foreach_GENERADOR_Sav = $_smarty_tpl->tpl_vars['GENERADOR'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['PISO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CUIT'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['GENERADOR'] = $foreach_GENERADOR_Sav;
}
?>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO'];?>
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
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>



<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped" id="lista_residuos">
		<thead>
			<tr>
				<th class="invisible">Id</th>
				<th>Residuo</th>
				<th>Tipo Cont.</th>
				<th>Cant. Cont.</th>
				<th>Cant. Est.</th>
				<th>Cant. Real</th>
				<th>Estado</th>
				<th>Tratamiento</th>
				<th>Procesado</th>
			</tr>
		</thead>
		<tbody>
			
			<?php $_smarty_tpl->tpl_vars['cant_residuos'] = new Smarty_Variable(count($_smarty_tpl->tpl_vars['RESIDUOS']->value), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['cant_residuos_procesados'] = new Smarty_Variable(0, null, 0);?>
			<?php
$_from = $_smarty_tpl->tpl_vars['RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RESIDUO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = false;
$_smarty_tpl->tpl_vars['RESIDUO']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['RESIDUO']->value) {
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = true;
$_smarty_tpl->tpl_vars['RESIDUO']->iteration++;
$foreach_RESIDUO_Sav = $_smarty_tpl->tpl_vars['RESIDUO'];
?>
				<tr>
					<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_REAL'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO_'];?>
</td>
					<td align="center">
						<div class="btn_tratamiento_residuo" style="text-align:right;margin-right:20px;">
							<?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['TRATAMIENTO'] && $_smarty_tpl->tpl_vars['RESIDUO']->value['FECHA_TRATAMIENTO']) {?>
								(<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['TRATAMIENTO'];?>
)
							<?php } else { ?>
								
							<?php }?>
							<i class="fa fa-pencil-square-o fa-lg hand" onclick="tratamientoResiduo($(this));" residuo-id="<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
" residuo-codigo="<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
" data-toggle="modal" data-target="#tratamientos_popup"></i>
						</div>
					</td>
					<td align="center">
						<?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['TRATAMIENTO'] && $_smarty_tpl->tpl_vars['RESIDUO']->value['FECHA_TRATAMIENTO']) {?>
							<?php $_smarty_tpl->tpl_vars['cant_residuos_procesados'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cant_residuos_procesados']->value+1, null, 0);?>
							<i class="fa fa-check" style="color:#449d44;"></i>
						<?php } else { ?>
							&nbsp;
						<?php }?>
					</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
		</tbody>
	</table>
</div>

	<div id="tratamientos_definidos" style="display:none;">
		<span id="titulos" style="font-size:14px;font-weight:bold;">Tratamiento del Residuo</span>

		<table style="width:750px;margin:5px 0px 20px 0px;text-align:center;" class="tabla" id="lista_tratamientos">
			<tr>
				<td style="width:50px;word-wrap: break-word;">Residuo</td>
				<td style="width:50px;word-wrap: break-word;">Tratamiento</td>
				<td style="word-wrap: break-word;">Descripcion</td>
			</tr>

			<?php
$_from = $_smarty_tpl->tpl_vars['RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RESIDUO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = false;
$_smarty_tpl->tpl_vars['RESIDUO']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['RESIDUO']->value) {
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = true;
$_smarty_tpl->tpl_vars['RESIDUO']->iteration++;
$foreach_RESIDUO_Sav = $_smarty_tpl->tpl_vars['RESIDUO'];
?>
				<?php if (!(1 & $_smarty_tpl->tpl_vars['RESIDUO']->iteration / 1)) {?>
					<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#EAEAE5", null, 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#F7F7F5", null, 0);?>
				<?php }?>
				<tr id="tr_residuo_relacion_<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
" style="display:none;">
					<td bgcolor="#F7F7F5" class="td" style="width:100px;"><span id="residuo"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</span></td>
					<td bgcolor="#F7F7F5" class="td" style="width:100px;"><span id="tratamiento_residuo_<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
" name="tratamiento_residuo_<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
"></span></td>
					<td bgcolor="#F7F7F5" class="td"><span id="tratamiento_descripcion_<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
"></span></td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>

		</table>
	</div>
</div>

<!-- hidden fields with usefull data -->
<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
" />

<div align="right" id="acciones"><br />
	<?php if ($_smarty_tpl->tpl_vars['cant_residuos_procesados']->value == $_smarty_tpl->tpl_vars['cant_residuos']->value) {?>
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar_1' onclick="finalizarManifiesto($(this));" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Finalizar</button>
	<?php }?>
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>


<?php echo '<script'; ?>
>


	function tratamientoResiduo(objRow)
	{
		var manifiesto_id = $("input#id").val();
		var residuo_relacion_id = objRow.attr('residuo-id');
		var residuo_codigo = objRow.attr('residuo-codigo');
		//console.info("consiguiendo tratamiento para residuo-relacion-id: "+residuo_relacion_id+" ("+residuo_codigo+")");

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/operador/procesar_residuo.php",
			data: {
				id: manifiesto_id,
				residuo_codigo: residuo_codigo,
				residuo_relacion_id: residuo_relacion_id
			},
			dataType: "html",
			success: function(response)
			{
				$('#tratamientos_popup_title').html("Tratamiento de Residuo");
				$('#tratamientos_popup_body').html(response);
				$('#tratamientos_popup_content').width(750);
				showTratamientosPopup();
			}
		});
		$(".tratamientos").chosen({width: "396px"});
	}

	function showTratamientosPopup()
	{
		$('#tratamientos_popup_title').show();
		$('#tratamientos_popup_body').show();
		$('#tratamientos_popup_content').show();
	}

	function hideTratamientosPopup()
	{
		$('#tratamientos_popup_title').hide();
		$('#tratamientos_popup_body').hide();
		$('#tratamientos_popup_content').hide();
	}

	function showTratamientoSeleccionado(id_relacion_residuo)
	{
		$("div#tratamientos_definidos").show();
		$("tr#tr_residuo_relacion_"+id_relacion_residuo).show();
	}

	function clearTratamientoSeleccionado()
	{
		$("span#tratamiento_codigo").val('');
		$("span#tratamiento_descripcion").val('');
		$("div#tratamientos_definidos").hide();	
	}

	function finalizarManifiesto(objButton)
	{
		var id_manifiesto = $("input#id").val();
		var residuos = new Array();
		var tratamientos = new Array();
		var fecha_tratamiento = $("input#fecha_tratamiento").val();

		objButton.button('loading');

		$('#lista_tratamientos').find("span[name^='tratamiento_residuo_']").each(function(index, value){
			obj = $(value);
			residuos.push(obj.attr('name').substr(20));
			tratamientos.push(obj.text());
		});

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/operador/procesar_manifiesto.php",
			data: {
				id: id_manifiesto,
				residuos: residuos,
				fecha_tratamiento: fecha_tratamiento,
				tratamientos: tratamientos
			},
			dataType: "text json",
			success: function(retorno) {
				objButton.button('reset');
				if (retorno['estado'] != 0) {
					// alert(retorno['errores']['general']);
					mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
				} else {
					$('#mel_popup_title').toggle();
					$('#mel_popup_body').toggle();
					$('#mel_popup_content').toggle();
					mostrarMensaje("exclamation-triangle","Recepci&oacute;n confirmada","success");
					location.reload();
				}
			}
		});
	}


<?php echo '</script'; ?>
>
<?php }
}
?>