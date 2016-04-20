<?php /* Smarty version 3.1.27, created on 2016-02-02 21:29:07
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/form_manifiesto_slop_padre.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:211502956156b149d31c9f84_96379438%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06a6a10c3e92a78cb062bffa91d98a18ece5334b' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/form_manifiesto_slop_padre.tpl',
      1 => 1454437416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211502956156b149d31c9f84_96379438',
  'variables' => 
  array (
    'PERFIL' => 0,
    'BASE_PATH' => 0,
    'nombre_seccion' => 0,
    'ESTABLECIMIENTO' => 0,
    'rol' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b149d33b9916_79330810',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b149d33b9916_79330810')) {
function content_56b149d33b9916_79330810 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '211502956156b149d31c9f84_96379438';
if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('transportista', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 'operador') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Operadores', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('operador', null, 0);?>
<?php }?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','progressButton'=>'true','chosen'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','cuit'=>'true','progressButton'=>'true','mapa'=>'true','chosen'=>'true'), 0);
?>

		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/slop.js"><?php echo '</script'; ?>
>
	</head>

	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
		<div id="contenedor-interior">
			  <?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<div id="apDiv1"><?php echo $_smarty_tpl->tpl_vars['nombre_seccion']->value;?>
</div>

		<div id="contenido-interior">
		<br />
			
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<br/>
			<span class="titulos">
			<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['PERFIL']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			</span>

			<div class="clear20"></div>
			<!-- arranca el form de manifiesto slop -->
			<div class="titulo_manifiesto">Creaci&oacute;n manifiesto SLOP</div>

			<div class="alert alert-info" role="alert" style="display:none;" id="mensaje_slop_con_barcaza">
				Ud est&aacute; generando un manifiesto que tendr&aacute; vinculado manifiestos SLOP relacionados, en los cuales se indican los transportistas y veh&iacute;culos que participar&aacute;n.
			</div>

			<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="<?php echo TipoManifiesto::SLOP;?>
"/>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Empresa Naviera/Mar&iacute;tima - Buque</p>
				<div id="tabla_generador" style="display:none;">
					<table class="table table-hover table-striped" id="lista_generadores">
						<thead>
							<tr>
								<th class="invisible">ID</th>
								<th>Raz&oacute;n Social</th>
								<th>Nombre del buque</th>
								<th>CUIT</th>
								<th>Domicilio</th>
								<th>Tel</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="contenedor_buscar" id="seleccion_generador">
					<span class="legend">Seleccione la empresa</span>
					<div class="buscar_button">
						<button type="button" class="btn btn-success btn-sm" id='btn_buscar_empresa_maritima'>Buscar</button>
					</div>
				</div>
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
				<div id="tabla_transportista" <?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?> style="display:block;" <?php } else { ?> style="display:none;" <?php }?>>
					<table class="table table-hover table-striped" id="lista_transportistas">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Domicilio</th>
								<th>Expediente</th>
								<th>CUIT</th>
								<th>CAA</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
								<tr>
									<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE_EMPRESA'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CUIT'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
</td>
								</tr>
							<?php }?>
						</tbody>						
					</table>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value != 'transportista') {?>
					<div class="contenedor_buscar" id="seleccion_transportista">
						<span class="legend">Seleccione un Transportista</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_transportista'>Buscar</button>
						</div>
					</div>
				<?php }?>
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
				<div id="tabla_operador" <?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'operador') {?> style="display:block;" <?php } else { ?> style="display:none;" <?php }?>>
					<table class="table table-hover table-striped" id="lista_operadores">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Domicilio</th>
								<th>Expediente</th>
								<th>CUIT</th>
								<th>CAA</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'operador') {?>
								<tr>
									<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE_EMPRESA'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
 <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CUIT'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
</td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value != 'operador') {?>
					<div class="contenedor_buscar" id="seleccion_operador">
						<span class="legend">Seleccione un Operador</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_operador' data-toggle="modal" data-target="#mel_popup">Buscar</button>
						</div>
					</div>
				<?php }?>
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuo</p>
				<div id="tabla_residuos" style="display:none;">
					<table class="table table-hover table-striped" id="lista_residuos">
						<thead>
							<tr>
								<th class="invisible">ID</th>
								<th>Tipo Cont.</th>
								<th>Cantidad Cont.</th>
								<th>Residuo</th>
								<th>Cantidad Est.</th>
								<th>Estado</th>
								<th>Peligrosidad</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="contenedor_buscar" id="seleccione_residuo">
					<span class="legend">Seleccione el Residuo</span>
					<div class="buscar_button">
						<button type="button" class="btn btn-success btn-sm" id="btn_agregar_residuo" data-toggle="modal" data-target="#mel_popup">Buscar</button>
					</div>
				</div>
			</div>

			<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culo / Barcaza</p>
					<div id="tabla_vehiculos" style="display:none;">
						<table class="table table-hover table-striped" id="lista_vehiculos">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Dominio / Matr&iacute;cula</th>
									<th>Tipo</th>
									<th>Tipo Caja</th>
									<th>Descripci&oacute;n</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccion_vehiculos">
						<span class="legend">Seleccione un veh&iacute;culo</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo' data-toggle="modal" data-target="#mel_popup" disabled>Buscar Veh&iacute;culo</button>
						</div>
					</div>
				</div>
			<?php }?>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
					<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" placeholder="Escriba aqu&iacute; todas las observaciones que considere necesarias a tener en cuenta sobre el manifiesto"></textarea>
				</div>

			<div align="center" style="margin-top:25px;">

				<div id='progress-button_btn_f' class="progress-button elastic" >
					<button id="btn_finalizar_b" data-target="#mel_popup"><span>Finalizar</span></button>
					<svg class="progress-circle" width="70" height="70"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
					<svg class="checkmark" width="70" height="70"><path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/></svg>
					<svg class="cross" width="70" height="70"><path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/></svg>
				</div>

			</div>
			</div>

		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('operacion/popups.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	</body>



<?php echo '<script'; ?>
 language="javascript">
	// Boton de progreso para Finalizar
	newProgressButton('progress-button_btn_f','submit_slop_padre');

	$(document).on('click', '.btn_establecer_resultado_operador', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/operador.php",
			data: {accion : "alta", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(response){
				if (response['estado'] != 0) {
					mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
				} else {
					completar_tabla_entidad('operador', response['datos']);
				}
			}
		});
	});

	$(document).on('click', '.btn_establecer_resultado_transportista', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/operador/transportista.php",
			data: {accion : "alta", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(response){
				if(response['estado'] != 0){
					mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
				}else{
					completar_tabla_entidad('transportista', response['datos']);
					activar_boton_buscar_residuos('transportista', 2);
					limpiar_tabla_residuos();
				}
			}
		});
	});

	/**
	 * @override para particularidades de Manifiesto SLOP. 
	 */
	function agregar_vehiculo_unico(vehiculo_id)
	{
		//console.info("Ejecutando agregar_vehiculo_unico() dentro de form_manifiesto_slop_padre.tpl");
		//console.info("lista_vehiculos tr:" + $('#lista_vehiculos tr').length);
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
					if (retorno['estado'] != 0) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['alta'],"warning");
					} else {
						datos = "<tr id=" + vehiculo_id + "><td class='invisible' id='id'>" + id + "</td><td id='dominio'>" + retorno['datos']['DOMINIO'] + "</td><td id='tipo_vehiculo'>" + retorno['datos']['TIPO_VEHICULO'] + "</td><td id='tipo_caja'>" + retorno['datos']['TIPO_CAJA'] + "</td><td id='descripcion'>" + retorno['datos']['DESCRIPCION'] + "</td><td align='center'><a href='#' value=" + retorno['datos']['ID'] + " class='btn_borrar_vehiculo' onclick=\"btn_borrar_vehiculo_unico(" + vehiculo_id + ")\"><i class='fa fa-times fa-2x'></i></a></td></tr>";
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

	function submit_slop_padre(instance)
	{
		var rol = '<?php echo $_smarty_tpl->tpl_vars['rol']->value;?>
';
		var observaciones = $("textarea#observaciones_manifiesto").val();

		var botonFinalizar = progessButton;
		botonFinalizar.init(instance);
		botonFinalizar.setProgress(0.1);
		var resultado = true;
		botonFinalizar.setProgress(0.4);
		var residuo_cantidad_estimada = $("input#residuo_cantidad_estimada").val();

		if (residuo_cantidad_estimada != '') {
			var as = $.ajax({
				type: "POST",
				url: mel_path+"/operacion/"+rol+"/manifiestos_slop.php",
				data: {tipo_slop: 'slop', residuo_cantidad_estimada: residuo_cantidad_estimada, observaciones: observaciones},
				dataType: "text json",
				async: false,
				success: function(retorno)
				{
					botonFinalizar.setProgress(0.7);

					if(retorno['estado'] == 0) {
						mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
						window.location.replace(mel_path+"/operacion/"+rol+"/manifiestos_pendientes.php");
						resultado = true;
					} else {
						var texto_errores = '';

						for (error in retorno['errores']) {
							texto_errores += retorno['errores'][error] + '<br>';
						}
						mostrarMensaje("exclamation-triangle",texto_errores,"error");
						resultado = false;
					}
				}
			});
		} else {
			botonFinalizar.setProgress(0.7);
			mostrarMensaje("exclamation-triangle", "Debe indicar la cantidad estimada","error");
			resultado = false;
		}

		botonFinalizar.stopProgress(resultado);
	};

<?php echo '</script'; ?>
>

</html>
<?php }
}
?>