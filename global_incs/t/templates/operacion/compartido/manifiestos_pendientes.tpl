<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	{include file='general/meta.tpl'}
	<title>Manifiestos Pendientes</title>

	{if $ROL == '1'}
		{assign var = tipo value='generador'}
		{assign var = addon value="0"}
	{elseif $ROL == '2'}
		{assign var = tipo value='transportista'}
	{elseif $ROL == '3'}
		{assign var = tipo value='operador'}
	{/if}
	{assign var = usuario_actual value="ESTADO_{$tipo|upper}"}
	<!-- esto es para pasarle el valor del smarty a jquery -->
	<script type="text/javascript"> 
	var tipo = "{$tipo}"; 
	</script> 
	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true' datepicker='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true' datepicker='true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
</head>

<body>
  <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

	<div id="contenedor-interior">
	{include file='general/logos.tpl'}
	<div id="apDiv1">{$tipo|ucfirst}<br /></div>

	<div id="contenido-interior"><br />
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			{include file='operacion/cabecera.tpl'}
			<!-- DATOS, ESTADISTICAS Y ALERTA -->

			<span class="titulos"><br />
				{include file="operacion/$tipo/menu_solapas.tpl"}

				<div style="height:2px; background-color:#5D9E00"></div>
				<div class="clear20"></div>
					<strong>MANIFIESTOS PENDIENTES</strong>
				</span>
				<br />
			</span>
			<br />

			{include file='general/buscador_manifiestos.tpl' form_action="manifiestos_pendientes.php" tipo_manifiesto="{$criterios.tipo_manifiesto}" filtros="{$filtros_buscador}" pendiente_por={$criterios.pendiente_por}}

			<!-- tabs -->
			<ul class="nav nav-tabs">
				<li role="presentation" {if $criterios.tipo_manifiesto == TipoManifiesto::SIMPLE} class="active" {/if}>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" {if $criterios.tipo_manifiesto == TipoManifiesto::MULTIPLE} class="active" {/if}>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" {if $criterios.tipo_manifiesto == TipoManifiesto::SLOP} class="active" {/if}>
					<a href="manifiestos_pendientes.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<br />

			<ul class="nav nav-tabs">
				<li role="presentation" {if $criterios.pendiente_por == 'mi'} class="active" {/if}>
					<a href="manifiestos_pendientes.php?tipo_manifiesto={$criterios.tipo_manifiesto}&pendiente_por=mi">Falta mi aprobaci&oacute;n</a>
				</li>
				<li role="presentation" {if $criterios.pendiente_por == 'otros'} class="active" {/if}>
					<a href="manifiestos_pendientes.php?tipo_manifiesto={$criterios.tipo_manifiesto}&pendiente_por=otros">Falta aprobaci&oacute;n de alguna de las otras partes</a>
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
								{foreach $MANIFIESTOS as $MANIFIESTO}
									<tr>
										<td id='id'>{$MANIFIESTO.ID}</td>
										<td>{$MANIFIESTO.FECHA_CREACION}</td>
										<td>{$MANIFIESTO.CREADOR}</td>
										<td>{$MANIFIESTO.ESTABLECIMIENTO}</td>
										<td>
										{if $MANIFIESTO.ESTADO_GENERADOR[0] == "a"}
										<div style="color:green">Generador <i class="fa fa-thumbs-o-up"></i></div>
										{/if}
										{if $MANIFIESTO.ESTADO_OPERADOR == "a"}
										<div style="color:green">Operador <i class="fa fa-thumbs-o-up"></i></div>
										{/if}
										{if $MANIFIESTO.ESTADO_TRANSPORTISTA == "a"}
										<div style="color:green">Transportista <i class="fa fa-thumbs-o-up"></i></div>
										{/if}
										</td>
										<td><div data-loading-text="Buscando..." class='btn_operar_manifiesto' align="center"><i class="fa fa-search fa-lg hand" style="line-height:30px;"></i></div></td>
									</tr>
								{foreachelse}
									<tr>
										<td>No se han encontrado resultados.</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
				</div>
			</div>
			{if $MANIFIESTOS}
				{$pagination}
			{/if}

			{*
			<div align="right" style="margin-top:20px;">
				<a class="btn btn-primary btn-sm" href='?exportar&tipo_manifiesto={$criterios.tipo_manifiesto}&pendiente_por={$criterios.pendiente_por}'>
					Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
				</a>
			</div>
			*}
		</div>
	</div>

	{include file='general/popup.tpl' ID_POPUP='operar_manifiesto'}
	{include file='general/popup.tpl' ID_POPUP='mel'}
	{include file='general/popup.tpl' ID_POPUP='buscar_flota'}
	{include file="operacion/popups.tpl"}
</body>


<script type="text/javascript">
{literal}
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
{/literal}
</script>

</html>


