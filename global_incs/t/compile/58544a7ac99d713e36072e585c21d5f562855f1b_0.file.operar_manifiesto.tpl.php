<?php /* Smarty version 3.1.27, created on 2016-03-16 11:03:10
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/operar_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:94437323756e9679e0a4349_15781016%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58544a7ac99d713e36072e585c21d5f562855f1b' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/operar_manifiesto.tpl',
      1 => 1445284247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94437323756e9679e0a4349_15781016',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ROL' => 0,
    'tipo' => 0,
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'KEY' => 0,
    'ESTADO_GENERADOR' => 0,
    'GENERADOR' => 0,
    'TRANSPORTISTAS' => 0,
    'ESTADO_TRANSPORTISTA' => 0,
    'TRANSPORTISTA' => 0,
    'VEHICULOS' => 0,
    'VEHICULO' => 0,
    'OPERADORES' => 0,
    'ESTADO_OPERADOR' => 0,
    'ACEPTADO_OPERADOR' => 0,
    'OPERADOR' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'usuario_actual' => 0,
    'addon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e9679e498a57_68663535',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e9679e498a57_68663535')) {
function content_56e9679e498a57_68663535 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '94437323756e9679e0a4349_15781016';
?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/transportista.js"><?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['ROL']->value == '1') {?>
	<?php $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable('generador', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable("0", null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['ROL']->value == '2') {?>
	<?php $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable('transportista', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['ROL']->value == '3') {?>
	<?php $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable('operador', null, 0);?>
<?php }?>
<?php ob_start();
echo mb_strtoupper($_smarty_tpl->tpl_vars['tipo']->value, 'UTF-8');
$_tmp1=ob_get_clean();
$_smarty_tpl->tpl_vars['usuario_actual'] = new Smarty_Variable("ESTADO_".$_tmp1, null, 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'asignar_flota'), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'asignar_vehiculo'), 0);
?>


<?php echo $_smarty_tpl->getSubTemplate ('operacion/popups.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="headerPopUp" style="padding:6px;">
	OPERAR CON EL MANIFIESTO SELECCIONADO
</div>

<div class="alert alert-info" role="alert" style="display:none;" id="mensaje_slop_con_barcaza">
	Al elegir una barcaza est&aacute; indicando que este manifiesto tendr&aacute; otros manifiestos SLOP relacionados, en los cuales se indican los transportistas y veh&iacute;culos que participar&aacute;n.
</div>

<div id="mensaje_comprobante_no_valido" style=" background-color:#EAEAE5;width:95%; padding:5px; display: none">
	<strong>COMPROBANTE SIN VALIDEZ</strong>
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
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
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
$_smarty_tpl->tpl_vars['KEY'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['GENERADOR']->value) {
$_smarty_tpl->tpl_vars['GENERADOR']->_loop = true;
$foreach_GENERADOR_Sav = $_smarty_tpl->tpl_vars['GENERADOR'];
?>
				<tr>
					<?php if ($_smarty_tpl->tpl_vars['ESTADO_GENERADOR']->value[$_smarty_tpl->tpl_vars['KEY']->value] == "a") {?>
						<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
					<?php } elseif ($_smarty_tpl->tpl_vars['ESTADO_GENERADOR']->value[$_smarty_tpl->tpl_vars['KEY']->value] == "p") {?>
						<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
					<?php }?>
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
if (!$_smarty_tpl->tpl_vars['GENERADOR']->_loop) {
?>
				<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::SIMPLE_RES_544_94) {?>
					<td colspan="6">Resoluci&oacute;n 544/94</td>
				<?php }?>
			<?php
}
?>
		</div>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportistas</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['TRANSPORTISTAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TRANSPORTISTA']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value) {
$_smarty_tpl->tpl_vars['TRANSPORTISTA']->_loop = true;
$foreach_TRANSPORTISTA_Sav = $_smarty_tpl->tpl_vars['TRANSPORTISTA'];
?>
				<tr>
					<?php if ($_smarty_tpl->tpl_vars['ESTADO_TRANSPORTISTA']->value == "a") {?>
						<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
					<?php } elseif ($_smarty_tpl->tpl_vars['ESTADO_TRANSPORTISTA']->value == "p") {?>
						<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
					<?php }?>
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
			<?php
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = $foreach_TRANSPORTISTA_Sav;
}
?>
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example" id="tabla_vehiculos">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culos Asignados</p>
	<table class="table table-hover table-striped" id="lista_vehiculos">
		<thead>
			<tr>
				<td class="invisible">Id</td>
				<td>Dominio</td>
				<td>Tipo</td>
				<td>Tipo Caja</td>
				<td>Descripci&oacute;n</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['VEHICULOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
				<tr>
					<td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td>
					<td><i class="fa fa-truck fa-2x"></i></td>	
				</tr>
			<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
if (!$_smarty_tpl->tpl_vars['VEHICULO']->_loop) {
?>
				<tr>
					<td id="vehiculos_no_asignados" colspan="6">A&uacute;n no se han asignado veh&iacute;culos.</td>
				</tr>
			<?php
}
?>
		</tbody>
	</table>
</div>

</div>
<?php if (!$_smarty_tpl->tpl_vars['VEHICULOS']->value && $_smarty_tpl->tpl_vars['tipo']->value == 'transportista') {?>
<table style="margin:6px;" cellpadding="5" cellspacing="5" border="0" width="99%">
<tr><td style="text-align: right;">
	<div id="seleccion_vehiculos">
		<div class="buscar_button">
			<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo2' data-target="#mel_popup">Buscar  Veh&iacute;culo</button>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SLOP) {?>
				<button type="button" class="btn btn-success btn-sm" id='btn_asignar_flota2' data-target="#mel_popup">Buscar Flota</button>
			<?php }?>
		</div>
	</div>
</td></tr>
</table>
<?php }?>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['OPERADORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['OPERADOR'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['OPERADOR']->_loop = false;
$_smarty_tpl->tpl_vars['OPERADOR']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['OPERADOR']->value) {
$_smarty_tpl->tpl_vars['OPERADOR']->_loop = true;
$_smarty_tpl->tpl_vars['OPERADOR']->iteration++;
$foreach_OPERADOR_Sav = $_smarty_tpl->tpl_vars['OPERADOR'];
?>
				<?php if (!(1 & $_smarty_tpl->tpl_vars['OPERADOR']->iteration / 1)) {?>
					<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#EAEAE5", null, 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#F7F7F5", null, 0);?>
				<?php }?>
			<tr>
				<?php if ($_smarty_tpl->tpl_vars['ESTADO_OPERADOR']->value == "a") {?>
					<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
				<?php } elseif ($_smarty_tpl->tpl_vars['ESTADO_OPERADOR']->value == "p") {?>
					<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
				<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['ACEPTADO_OPERADOR']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
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
			<?php
$_smarty_tpl->tpl_vars['OPERADOR'] = $foreach_OPERADOR_Sav;
}
?>
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Tipo Cont.</td>
				<td>Cantidad Cont.</td>
				<td>Residuo</td>
				<td>Cantidad Est.</td>
				<td>Unidad</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RESIDUO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['RESIDUO']->value) {
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = true;
$foreach_RESIDUO_Sav = $_smarty_tpl->tpl_vars['RESIDUO'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['UNIDAD_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO_'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
		</tbody>
	</table>
</div>

<div class="clear20"></div>
<?php if ($_smarty_tpl->tpl_vars[''.($_smarty_tpl->tpl_vars['usuario_actual']->value)]->value[$_smarty_tpl->tpl_vars['addon']->value] == "a") {?>
    <br/><br/>
    Este manifiesto ya se encuentra Aceptado. A la espera de la aceptaci&oacute;n o rechazo de las demas partes.
    <?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['ESTADO_AUTORIZACION_DRP'] == 0) {?>
    	<b>Sigue pendiente la autorizaci&oacute;n por parte de la DRP para operar el manifiesto.</b>
    <?php }?>
    <br/>
    <?php } else { ?>
<div style="text-align: center">

	<?php if (empty($_smarty_tpl->tpl_vars['VEHICULOS']->value) && $_smarty_tpl->tpl_vars['tipo']->value == 'transportista') {?>
    	<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == "2" && is_null($_smarty_tpl->tpl_vars['MANIFIESTO']->value['MANIFIESTO_PADRE'])) {?>
			<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
		<?php } else { ?>
    		<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" disabled="disabled" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
    	<?php }?>
	<?php } else { ?>
	<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
	<?php }?>
	&nbsp;&nbsp;&nbsp;
	<button type="button" id="btn_rechazar_1" class="btn btn-danger btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Rechazar</button>
	&nbsp;&nbsp;&nbsp;
	<button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Cancelar</button>
</div>
<?php }?>
<div class="clear20"></div>


    <?php echo '<script'; ?>
>
	var acciones = new Array();

	acciones['ASIGNAR']    = 'desasignar';
	acciones['DESASIGNAR'] = 'asignar';

	$("#btn_cerrar_popup_1").click(function(){
		$("#div_popup").hide();
                    cerrar();
	});

	$("#btn_cancelar_1").click(function(){
		$("#div_popup").hide();
                    cerrar();
	});

	$("#btn_imprimir_1").click(function(){
		$("#acciones").hide();
		$("#mensaje_comprobante_no_valido").show();
		$("#div_popup").printElement();
		$("#mensaje_comprobante_no_valido").hide();
		$("#acciones").show();
	});

	$("#btn_aceptar_1").click(function(){
		$(this).button('loading');

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/" + tipo + "/operar_manifiesto.php",
		   data: {accion : "aceptar", id : <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
},
		   dataType: "text json",
		   success: function(retorno){
		   		$(this).button('reset');
				if(retorno['estado'] != 0){
					mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
				}else{
					setTimeout(function(){
						mostrarMensaje("exclamation-triangle","Manifiesto Aprobado","success");
					}, 1000);

					if (tipo != 'operador') {
						window.location.replace(mel_path+"/operacion/" + tipo + "/manifiestos_proceso.php");
					} else {
						window.location.replace(mel_path+"/operacion/operador/manifiestos_en_camino.php");
					}
				}
		    }
		});
	});

	$("#btn_rechazar_1").click(function(){
		$(this).button('loading');
		BootstrapDialog.show({
            title: 'Rechazar',
            message: 'Esta apunto de rechazar este manifiesto, debe ingresar un motivo del rechazo: <textarea class="form-control" id="motivo"></textarea>',
            type: BootstrapDialog.TYPE_DANGER, 
            onshown: function(dialog) {
                dialog.getButton('rechazar').disable();
                $('#motivo').keyup(function() {
                	dialog.getButton('rechazar').enable();
			    });
               
            },
            buttons: [{
		    	id: 'cancelar',      
				label: 'Cancelar',
				cssClass: 'btn-primary', 
				autospin: false,
				action: function(dialogRef){    
				    dialogRef.close();
				}
		    },{
				id: 'rechazar',      
		        label: 'Rechazar',
		        cssClass: 'btn-danger', 
		        autospin: false,
		        action: function(dialogRef){
			            $.ajax({
					    type: "POST",
					    url: mel_path+"/operacion/" + tipo + "/operar_manifiesto.php",
					    data: {accion : "rechazar", id : <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
, motivo : $('#motivo').val()},
					    dataType: "text json",
					    success: function(retorno){
					    	$(this).button('reset');
							if(retorno['estado'] != 0){
								alert(retorno['errores']['general']);
							}else{
								setTimeout(function(){
									mostrarMensaje("exclamation-triangle","Manifiesto Rechazado","success");
								}, 1000);
								window.location.replace(mel_path+"/operacion/operador/manifiestos_rechazados.php");
							}
					    }
					});
			        dialogRef.close();
			        $('#mel_popup').modal('hide');
		        }
		    }],
        });
	});
	$('#btn_asignar_flota2').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/seleccion_flota.php",
			dataType: "html",
			success: function(msg){
				BootstrapDialog.show({
		            title: 'Buscar Flota',
		            message: $(msg),
		        });
			}
		});
	});

	/**
	 * @override para particularidades de Manifiesto SLOP. 
	 */
	function agregar_vehiculo_unico(vehiculo_id)
	{
		$("#btn_aceptar_1").removeAttr("disabled");
		
		// 1 porque ese tr corresponde a los titulos de la tabla
		if ($('#lista_vehiculos tr').length <= 2) {
			$("td#vehiculos_no_asignados").hide();
			$.ajax({
			   type: "POST",
			   url: mel_path+"/operacion/transportista/vehiculo.php",
			   data: {accion : "alta", id : vehiculo_id},
			   dataType: "text json",
			   success: function(retorno)
			   {
					if (retorno['estado'] != 0) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['alta'],"warning");
					} else {
						datos = "<tr bgcolor='#fff' id=" + vehiculo_id + "><td class='invisible' id='id'>" + id + "</td><td id='dominio'>" + retorno['datos']['DOMINIO'] + "</td><td id='tipo_vehiculo'>" + retorno['datos']['TIPO_VEHICULO'] + "</td><td id='tipo_caja'>" + retorno['datos']['TIPO_CAJA'] + "</td><td id='descripcion'>" + retorno['datos']['DESCRIPCION'] + "</td><td align='center'><a href='#' value=" + retorno['datos']['ID'] + " class='btn_borrar_vehiculo' onclick=\"btn_borrar_vehiculo_unico(" + vehiculo_id + ")\"><i class='fa fa-times fa-2x'></i></a></td></tr>";
						$('#lista_vehiculos> tbody:last').append(datos);
						$("div#tabla_vehiculos").show();

						if (retorno['datos']['TIPO_VEHICULO'] == 'BA') {
							$("div#mensaje_slop_con_barcaza").show();
						} else {
							$("div#mensaje_slop_con_barcaza").hide();
						}
					}
			    }
			});
			$("div#seleccion_vehiculos span").hide();
		} else {
			mostrarMensaje("exclamation-triangle", "No puede cargar m&aacute;s de un veh&iacute;culo en el manifiesto","error");
		}
	};
<?php echo '</script'; ?>
>

<?php }
}
?>