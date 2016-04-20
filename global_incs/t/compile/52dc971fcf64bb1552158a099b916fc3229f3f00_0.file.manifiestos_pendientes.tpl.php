<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:12
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_pendientes.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:454718423564f1f74e284a2_66621879%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52dc971fcf64bb1552158a099b916fc3229f3f00' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_pendientes.tpl',
      1 => 1445614974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '454718423564f1f74e284a2_66621879',
  'variables' => 
  array (
    'ROL' => 0,
    'tipo' => 0,
    'BASE_PATH' => 0,
    'PERFIL' => 0,
    'criterios' => 0,
    'filtros_buscador' => 0,
    'MANIFIESTOS' => 0,
    'MANIFIESTO' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f750ff110_16083102',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f750ff110_16083102')) {
function content_564f1f750ff110_16083102 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '454718423564f1f74e284a2_66621879';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Manifiestos Pendientes</title>

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
	<!-- esto es para pasarle el valor del smarty a jquery -->
	<?php echo '<script'; ?>
 type="text/javascript"> 
	var tipo = "<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
"; 
	<?php echo '</script'; ?>
> 
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
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

	<div id="apDiv1"><?php echo ucfirst($_smarty_tpl->tpl_vars['tipo']->value);?>
<br /></div>

	<div id="contenido-interior"><br />
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<!-- DATOS, ESTADISTICAS Y ALERTA -->

			<span class="titulos"><br />
				<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['tipo']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


				<div style="height:2px; background-color:#5D9E00"></div>
				<div class="clear20"></div>
					<strong>MANIFIESTOS PENDIENTES</strong>
				</span>
				<br />
			</span>
			<br />

			<?php ob_start();
echo $_smarty_tpl->tpl_vars['criterios']->value['pendiente_por'];
$_tmp2=ob_get_clean();
echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"manifiestos_pendientes.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto']),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value),'pendiente_por'=>$_tmp2), 0);
?>


			<!-- tabs -->
			<ul class="nav nav-tabs">
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto'] == TipoManifiesto::SIMPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto'] == TipoManifiesto::MULTIPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto'] == TipoManifiesto::SLOP) {?> class="active" <?php }?>>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<br />

			<ul class="nav nav-tabs">
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['pendiente_por'] == 'mi') {?> class="active" <?php }?>>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=<?php echo $_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto'];?>
&pendiente_por=mi">Falta mi aprobaci&oacute;n</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['pendiente_por'] == 'otros') {?> class="active" <?php }?>>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=<?php echo $_smarty_tpl->tpl_vars['criterios']->value['tipo_manifiesto'];?>
&pendiente_por=otros">Falta aprobaci&oacute;n de alguna de las otras partes</a>
				</li>
			</ul>

		<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active">
					<div class="table-responsive bs-example">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Id Operaci&oacute;n</th>
									<th>Fecha creaci&oacute;n</th>
									<th>Emp. Creador</th>
									<th>Est. Creador</th>
									<th>Aprobado por</th>
									<th>Visualizar</th>
								</tr>
							</thead>
							<tbody>
								<?php
$_from = $_smarty_tpl->tpl_vars['MANIFIESTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['MANIFIESTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['MANIFIESTO']->value) {
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = true;
$foreach_MANIFIESTO_Sav = $_smarty_tpl->tpl_vars['MANIFIESTO'];
?>
									<tr>
										<td id='id'><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_CREACION'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['CREADOR'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ESTABLECIMIENTO'];?>
</td>
										<td>
										<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['ESTADO_GENERADOR'][0] == "a") {?>
										<div style="color:green">Generador <i class="fa fa-thumbs-o-up"></i></div>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['ESTADO_OPERADOR'] == "a") {?>
										<div style="color:green">Operador <i class="fa fa-thumbs-o-up"></i></div>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['ESTADO_TRANSPORTISTA'] == "a") {?>
										<div style="color:green">Transportista <i class="fa fa-thumbs-o-up"></i></div>
										<?php }?>
										</td>
										<td><div data-loading-text="Buscando..." class='btn_operar_manifiesto' align="center"><i class="fa fa-search fa-lg hand" style="line-height:30px;"></i></div></td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['MANIFIESTO'] = $foreach_MANIFIESTO_Sav;
}
if (!$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop) {
?>
									<tr>
										<td>No se han encontrado resultados.</td>
									</tr>
								<?php
}
?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTOS']->value) {?>
				<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

			<?php }?>

			
		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'operar_manifiesto'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'buscar_flota'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ("operacion/popups.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</body>


<?php echo '<script'; ?>
 type="text/javascript">

	var registro_actual;

	$(document).on('click', '.btn_editar_manifiesto', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/editar_manifiesto.php",
		   data: {id : registro_actual.find('#id').html()},
		   dataType: "html",
		   success: function(msg){
			$('#mel_popup_title').html("Editar Manifiesto");
			$('#mel_popup_body').html(msg);
			$('#mel_popup_content').width(800);
			$('#mel_popup').modal('show');
		   }
		 });
	})

	$(document).on('click', '.btn_operar_manifiesto', function() {
		var $btn = $(this).button('loading');
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/" + tipo + "/operar_manifiesto.php",
		   data: {id : registro_actual.find('#id').html()},
		   dataType: "html",
		   success: function(msg){
			$btn.button('reset');
			BootstrapDialog.show({
				title: 'Manifiesto',
				message: $(msg),
				size: BootstrapDialog.SIZE_WIDE,
			});
		   }
		 });
	})

	var colores = new Array();


$(function(){
			$('#cantidad').filter_input({regex:'[0-9]'});
		});


colores['#A8D8EA'] = '#F7F7F5';
colores['#EAEAE5'] = '#F7F7F5';
colores['#F7F7F5'] = '#EAEAE5';

function llenar_lista_busqueda_vehiculos(vehiculos){
		$('#lista_busqueda_vehiculos').find('tr:gt(0)').remove();

		for(var indice in vehiculos){
			vehiculo = vehiculos[indice];

			color = colores[$('#lista_busqueda_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
			if(color == undefined)
				color = '#F7F7F5';

			datos = "\
			<tr>\
				<td bgcolor='" + color + "' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='credencial'>" + vehiculo["CREDENCIAL_SERIE"] + " - " + vehiculo["CREDENCIAL_NUMERO"] + "</td>\
				<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_agregar_resultado_vehiculo'><img src='/imagenes/boton_agregar.gif'/></a></td>\
			</tr>";

			$('#lista_busqueda_vehiculos> tbody:last').append(datos);
		}

}

$(document).on('click', '.borrar_actual', function() {
registro_actual = $(this).parent().parent();

  id =  registro_actual.find('#id').html();


$.ajax({
	   type: "POST",
	   url: mel_path+"/operacion/transportista/residuos_transportados.php",
	   data: {accion : "baja", id : id},
	   dataType: "text json",
	   success: function(retorno){

			if(retorno != 'NULL'){
			registro_actual.remove();


			}else{
				alert("Ocurrio un inconveniente al agregar el traslado de residuo al Vehiculo");
			}
	   }
	 });



});


$(document).on('click', '.aceptar_traslado', function() {
   cantidad = $("#cantidad").val();
   fecha = 'fecha';
  id =  $("#id_aceptar").html();
  id_residuo = $("#id_residuo").html();

 residuo =  $("#residuo1").val();
 estado =  $("#estado1").val();

$.ajax({
	   type: "POST",
	   url: mel_path+"/operacion/transportista/residuos_transportados.php",
	   data: {accion : "alta", id : id, cantidad :  cantidad, fecha : fecha, id_residuo : id_residuo},
	   dataType: "text json",
	   success: function(retorno){

			if(retorno != 'NULL'){
				//alert("Se agrego correctamente el traslado de residuos al veh&iacute;culo");
				datos = "\
			<tr>\
				<td  class='invisible' id='id'>" + retorno+ "</td>\
				<td  class='invisible' id='id_residuo'>" + id_residuo + "</td>\
				<td  class='td' >"+cantidad+"</td>\
				<td  class='td' >"+residuo+"</td>\
				<td  class='td' >"+estado+"</td>\
				<td align='center'  ><img class='borrar_actual' src='/imagenes/proceso_delete.png'/></td>\
			</tr>";

			$('#addAgregados> tbody:last').append(datos);
			}else{
				alert("Ocurrio un inconveniente al agregar el traslado de residuo al Veh&iacute;culo");
			}
	   }
	 });





	$("#tablaagregar").toggle();

});

$(document).on('click', '.trasladar_residuo_div', function() {

$("#cantidad").val("");
  registro_actual = $(this).parent().parent();
  id = registro_actual.find('#id').html();
  id_residuo = registro_actual.find('#id_res').html();
  residuo = registro_actual.find('#resi').html();
  estado = registro_actual.find('#estado').html();


  $("#id_aceptar").html(id);
  $("#id_residuo").html(id_residuo);
  $("#residuo1").val(residuo);
  $("#estado1").val(estado);

$("#tablaagregar").css("display","block");

});




$(document).on('click', '.btn_agregar_resultado_vehiculo', function() {
	registro_actual = $(this).parent().parent();

	$.ajax({
	   type: "POST",
	   url: mel_path+"/operacion/transportista/vehiculo_edicion.php",
	   data: {accion : "alta", id : registro_actual.find('#id').html()},
	   dataType: "text json",
	   success: function(retorno){
			if(retorno['estado'] != 0){
				alert(retorno['errores']['alta']);
			}else{
				agregar_vehiculo(retorno['datos']);
			}
	   }
	 });
});



$('#btn_buscar_vehiculos').click(function() {
	$.ajax({
	   type: "POST",
	   url: mel_path+"/operacion/transportista/vehiculo_edicion.php",
	   data: {accion : "busqueda", criterio : $('#vehiculo_criterio').val()},
	   dataType: "text json",
	   success: function(retorno){
			if(retorno['estado'] != 0){
				alert(retorno['errores']['busqueda']);
			}else{
				llenar_lista_busqueda_vehiculos(retorno['datos']);
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