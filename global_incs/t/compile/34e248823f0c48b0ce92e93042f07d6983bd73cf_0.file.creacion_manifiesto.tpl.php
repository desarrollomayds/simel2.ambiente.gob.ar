<?php /* Smarty version 3.1.27, created on 2016-02-02 15:24:39
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/creacion_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:198750644456b0f46716cc95_35480202%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34e248823f0c48b0ce92e93042f07d6983bd73cf' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/creacion_manifiesto.tpl',
      1 => 1454437466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198750644456b0f46716cc95_35480202',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'PERFIL' => 0,
    'tipo_manifiesto' => 0,
    'TRANSPORTISTA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b0f4674832b0_54655150',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b0f4674832b0_54655150')) {
function content_56b0f4674832b0_54655150 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '198750644456b0f46716cc95_35480202';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<title>Crear manifiesto</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','progressButton'=>'true','chosen'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','cuit'=>'true','progressButton'=>'true','chosen'=>'true'), 0);
?>

		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/transportista.js"><?php echo '</script'; ?>
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

			<div id="apDiv1">Transportistas</div>
			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<!-- DATOS, ESTADISTICAS Y ALERTA -->
				<br/>

				<?php echo $_smarty_tpl->getSubTemplate ('operacion/transportista/menu_solapas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<div style="height:2px; background-color:#5D9E00"></div>

				
				<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="<?php echo $_smarty_tpl->tpl_vars['tipo_manifiesto']->value;?>
"/>

				<div class="clear20"></div>
				<div class="titulo_manifiesto">Creaci&oacute;n de manifiesto Simple
					<?php if ($_smarty_tpl->tpl_vars['tipo_manifiesto']->value == TipoManifiesto::SIMPLE_RES_544_94) {?>
						Res. 544/94
					<?php } elseif ($_smarty_tpl->tpl_vars['tipo_manifiesto']->value == TipoManifiesto::SIMPLE_CONCENTRADOR) {?>
						Concentrador
					<?php }?>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Generador</p>
					<div id="tabla_generador" style="display:none;">
						<table class="table table-hover table-striped" id="lista_generadores">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Nombre</th>
									<th>Sucursal</th>
									<th>Domicilio</th>
									<th>Expediente</th>
									<th>CUIT</th>
									<th>CAA</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>

					
					<?php if ($_smarty_tpl->tpl_vars['tipo_manifiesto']->value == TipoManifiesto::SIMPLE_RES_544_94) {?>
						<div>
							<table class="table table-hover table-striped" id="lista_generadores">
								<tr>
									<th>Nombre</th>
								</tr>
								<tr>
									<td>Resoluci&oacute;n 544/94</td>
								</tr>
							</table>
						</div>
					<?php } else { ?>
						<div class="contenedor_buscar" id="seleccion_generador">
							<span class="legend">Seleccione un Generador</span>
							<div class="buscar_button">
								<button type="button" class="btn btn-success btn-sm" id='btn_buscar_generador' data-toggle="modal" data-target="#mel_popup">Buscar</button>
							</div>
						</div>
						<br />
					<?php }?>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Transportista</p>
					<div id="tabla_transportista">
						<table class="table table-hover table-striped" id="lista_transportista">
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
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Operador</p>
					<div id="tabla_operador" style="display:none">
						<table class="table table-hover table-striped" id="lista_operadores">
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
							<tbody></tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccion_operador">
						<span class="legend">Seleccione un Operador</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_operador' data-toggle="modal" data-target="#mel_popup">Buscar</button>
						</div>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos de los Residuos</p>
					<div id="tabla_residuos" style="display:none">
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
						<span class="legend">Seleccione Residuos</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id="btn_agregar_residuo" data-toggle="modal" data-target="#mel_popup" disabled>Buscar</button>
						</div>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos de los Veh&iacute;culos</p>
					<div id="tabla_vehiculos" style="display:none">
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
						<span class="legend">Seleccione Flotas</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo' data-toggle="modal" data-target="#mel_popup" disabled>Buscar  Veh&iacute;culo</button>
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_flota' data-toggle="modal" data-target="#mel_popup" disabled>Buscar Flota</button>
						</div>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
					<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" placeholder="Escriba aqu&iacute; todas las observaciones que considere necesarias a tener en cuenta sobre el manifiesto"></textarea>
				</div>


				<div align="center" style="margin-top:25px;">

					<div id='progress-button_btn_f' class="progress-button elastic" >
						<button id="btn_finalizar_b" data-target="#mel_popup"
						seccion="simple"><span>Finalizar</span></button>
						<svg class="progress-circle" width="70" height="70"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
						<svg class="checkmark" width="70" height="70"><path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/></svg>
						<svg class="cross" width="70" height="70"><path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/></svg>
					</div>

				</div>

				<!--
				<div align="center" style="margin-top:25px;">
					<button type="button" class="btn btn-success btn-sm" id='btn_finalizar' data-target="#mel_popup"
						seccion="multiple">Finalizar</button>
				</div>
				-->
			</div>
		</div>

		<div id='div_popup' class='invisible'></div>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'vehiculos_por_dominio'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'alta_temprana'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'flotas'), 0);
?>


		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'div_1'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'div_2'), 0);
?>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'div_3'), 0);
?>


		<?php echo $_smarty_tpl->getSubTemplate ('operacion/popups.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	</body>

	


	<?php echo '<script'; ?>
 language="javascript">

		// Boton de progreso para Finalizar
		newProgressButton('progress-button_btn_f','btn_finalizar');

		var tipo_manifiesto = <?php echo $_smarty_tpl->tpl_vars['tipo_manifiesto']->value;?>


		$(document).on('click', '.btn_establecer_resultado_generador', function() {
			registro_actual = $(this).parent().parent();

			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/transportista/generador.php",
				data: {accion : "alta", id : registro_actual.find('input:checked').val()},
				dataType: "text json",
				success: function(response){
					if(response['estado'] != 0){
						mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
					}else{
						completar_tabla_entidad('generador', response['datos']);
						activar_boton_buscar_residuos('transportista', tipo_manifiesto);
						limpiar_tabla_residuos();
						limpiar_tabla_vehiculos();
					}
				}
			});
		});

		$(document).on('click', '.btn_establecer_resultado_operador', function() {
			registro_actual = $(this).parent().parent();

			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/transportista/operador.php",
				data: {accion : "alta", id : registro_actual.find('#id').html()},
				dataType: "text json",
				success: function(response){
					if(response['estado'] != 0){
						mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
					}else{
						completar_tabla_entidad('operador', response['datos']);
						activar_boton_buscar_residuos('transportista', tipo_manifiesto);
						limpiar_tabla_residuos();
						limpiar_tabla_vehiculos();
					}
				}
			});
		});

	<?php echo '</script'; ?>
>
	
</html>
<?php }
}
?>