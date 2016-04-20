{**
 *	Template compartido para los popups de busqueda de entidades en la manipulación de Manifiestos.
 *	Desde php, el template debe recibir las variables:
 *
 *		- favoritos: los favoritos de la entidad logueada
 *		- entidad_buscada: la entidad que se busca en formato string, por ej, "generador".
 *		- entidad_logueada: es el tipo de usuario que esta logeado en el sistema. Idem que arriba, espera el string.
 *		- tipo_manifiesto: por ahora no se usa, pero esta disponible por si más adelante es necesario distinguir
 *		  el tpl entre manifiestos simples, multiples o slop.
 *}
<div class="backGrey">

	<div class="buscador_entidad_manifiestos">
		<div class="search_title">Busqueda por CUIT</div>
		<div class="col-lg-6">
			<div class="input-group buscador_cuit">
				<input type="text" class="form-control input_numerico" placeholder="Ingrese un CUIT..."
					name='{$entidad_buscada}_cuit' id='{$entidad_buscada}_cuit'>
				<span class="input-group-btn" id='btn_buscar_cuit_{$entidad_buscada}' onclick="buscarCuit();">
					<button class="btn btn-default" type="button">Buscar</button>
				</span>
			</div>
		</div>
	</div>

	<!-- favoritos del usuario logeado -->
	<div class="favoritos" id="favoritos" style="width:455px;">
		<div class="text-left" style="margin:10px 0px 5px 10px;">Favoritos:</div>
		{if $favoritos}
			{assign var=count value=0}
			{foreach from=$favoritos item=fav}
				{if $count < 2}
					<div class="fav_icon">
						<a class="btn_establecimiento_favorito" style="float:left" nombre-empresa="{$fav->nombre_empresa}" establecimiento-id="{$fav->establecimiento_id}" 
						nombre-establecimiento="{$fav->nombre_establecimiento}" sucursal="{$fav->sucursal}" cuit="{$fav->cuit}" provincia="{$fav->nombre_provincia}" localidad="{$fav->nombre_localidad}" calle="{$fav->calle}"
						numero="{$fav->numero}" piso="{$fav->piso}">{$fav->cuit}: <strong>{$fav->nombre}</strong> 
						{if $entidad_buscada == 'generador'}
							(Sucursal <strong>{$fav->sucursal}</strong>)
						{/if}
						</a>
						&nbsp;
						<div class="hand" style="float:left;padding-left:5px;">
							<a class="btn_eliminar_favorito" id-relacion-favorito="{$fav->id_relacion_favorito}" nombre="{$fav->nombre}" sucursal="{$fav->sucursal}" data-toggle="modal" data-target="#confirmar_borrado_fav" title="Eliminar favorito" onclick="pedirConfirmacionEliminarFavorito($(this));">
							<i class="fa fa-trash-o"></i></a>
						</div>
					</div>
				{/if}

				{* por default mostramos hasta 2 favoritos *}
				{assign var=count value=$count + 1}

				{if $count > 2}
					<div class="fav_icon fav_hidden">
						<a class="btn_establecimiento_favorito" style="float:left" nombre-empresa="{$fav->nombre_empresa}" establecimiento-id="{$fav->establecimiento_id}" nombre-establecimiento="{$fav->nombre_establecimiento}" sucursal="{$fav->sucursal}" cuit="{$fav->cuit}" provincia="{$fav->nombre_provincia}" localidad="{$fav->nombre_localidad}" calle="{$fav->calle}"
						numero="{$fav->numero}" piso="{$fav->piso}">{$fav->cuit}: <strong>{$fav->nombre}</strong>
						{if $entidad_buscada == 'generador'}
							(Sucursal <strong>{$fav->sucursal}</strong>)
						{/if}
						</a>
						&nbsp;
						<div class="hand" style="float:left;padding-left:5px;">
						<a class="btn_eliminar_favorito" id-relacion-favorito="{$fav->id_relacion_favorito}" nombre="{$fav->nombre}" sucursal="{$fav->sucursal}" data-toggle="modal" data-target="#confirmar_borrado_fav" title="Eliminar favorito" onclick="pedirConfirmacionEliminarFavorito($(this));">
						<i class="fa fa-trash-o"></i>
						</a>
						</div>
					</div>
				{/if}

			{/foreach}

			{if $count > 2}
				<div id="more_favs" onclick="toggleFavs();">[+]</div>
			{/if}

			<div id="hide_favs" style="display:none;" onclick="toggleFavs();">[-]</div>
		{else}
			<p class="text-left">Aun no ha cargado favoritos.</p>
		{/if}

		<input type="hidden" id="cuit_favorito_clickeado" name="cuit_favorito_clickeado" />
		<input type="hidden" id="id_establecimiento_favorito_clickeado" name="id_establecimiento_favorito_clickeado" />
	</div>

	<div style="clear:both;"></div>

	<!-- Alta temprana Generador -->
	<div id="alta_temprana_generador" style="display:none; margin-top:10px;">
		<form class="form-inline">
			<div class="search_title text-center" style="background-color: #D5D5CC;padding: 10px;">El establecimiento no se encuentra registado en SIMEL. <br> Puede realizar un alta temprana del mismo para poder continuar con el Manifiesto
			</div>
			<div align="center" style="margin: 10px;">
				<button class="btn btn-success" type="button" id='btn_alta_temprana' data-toggle="modal" data-target="#alta_temprana_popup" onclick="altaTempranaEmpresa();">Realizar el Alta temprana</button>
				<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
			</div>
			<div style="clear:both;"></div>
		<form>
	</div>

	<div id="resultado_entidades" style="display:none;">

		<table class="lista_busqueda_entidades" id="lista_busqueda_{$entidad_buscada}"
			border="0" cellpadding="5" cellspacing="0">
			<tr>
				<th class="invisible">Id</th>
				<th>&nbsp;</th>
				<th>Raz&oacute;n social</th>
				{if $entidad_buscada == 'generador'}
					<th>Sucursal</th>
				{/if}
				<th>Cuit</th>
				<th>Provincia</th>
				<th>Localidad</th>
				<th>Domicilio</th>
				<th>&nbsp;</th>
			</tr>
		</table>

		<div class="clear20"></div>

		<div style="margin-left:260px;">
			<div class="btn_establecer_resultado_{$entidad_buscada} modal_buttons" data-dismiss="modal" style="display:none;">
				<button type="button" class="btn btn-success btn-sm">Aceptar</button>
			</div>
			<button class="btn btn-success btn-sm" type="button" id='btn_agregar_sucursal' name="btn_agregar_sucursal" data-toggle="modal" data-target="#alta_temprana_popup" style="display:none;margin-left:10px;" onclick="altaTempranaSucursal();">Agregar sucursal</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning btn-sm" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
		</div>
		<div class="clear20"></div>
	</div>
</div>

{literal}
<script>
	// asigno las vars con la info desde el php
	var entidad_buscada = '{/literal}{$entidad_buscada}{literal}';
	var entidad_logueada = '{/literal}{$entidad_logueada}{literal}';

	$('#'+entidad_buscada+'_cuit').filter_input({regex:'[0-9]'});
	$('#cuit_alta_temprana').filter_input({regex:'[0-9]'});

	// Establecimientos favoritos
	$('.btn_establecimiento_favorito').on('click', function() {
		var establecimientos = extraer_info_boton_favoritos($(this));
		llenar_lista_busqueda(entidad_buscada, establecimientos);
		$("input#cuit_favorito_clickeado").val($(this).attr('cuit'));
		$("input#id_establecimiento_favorito_clickeado").val($(this).attr('establecimiento-id'));
	});

	// mostrar confirmacion de eliminacion de favorito
	function pedirConfirmacionEliminarFavorito(fav)
	{
		var id_relacion_favorito = fav.attr('id-relacion-favorito');
		var nombre = fav.attr('nombre');
		var sucursal = fav.attr('sucursal');
		var leyenda = nombre +" ("+sucursal+")";
		
		$('#confirmar_borrado_fav_title').html("Confirmar eliminaci&oacute;n");
		$('#confirmar_borrado_fav_body').html(leyenda);
		$("#conf_elim_fav").prop('value', id_relacion_favorito)
		$('#confirmar_borrado_fav_content').width(500);
	}

	// eliminar favorito
	function eliminarFavorito()
	{
		var valor = $('#conf_elim_fav').attr("value");
		var tipo_manifiesto = $('input#tipo_manifiesto').val();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/"+entidad_logueada+"/"+entidad_buscada+".php",
			data: {accion : "eliminar_favorito", id_relacion_favorito: valor, entidad_logueada: entidad_logueada, entidad_buscada: entidad_buscada, tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
			success: function(retorno){
				//console.debug(retorno);
				$('#mel_popup_body').html(retorno);
			}
		});
	}

	// Ajax - buscar entidad por CUIT
	function buscarCuit()
	{
		var cuit = $('#'+entidad_buscada+'_cuit').val();
		var tipo_manifiesto = $('input#tipo_manifiesto').val();
		//console.info('cuit: '+cuit+" - tipo manifiesto: "+tipo_manifiesto);
		//return false;

		if (cuitConFormatoValido(cuit)) {
			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/"+entidad_logueada+"/"+entidad_buscada+".php",
				data: {accion : "busqueda", criterio : cuit, tipo_manifiesto: tipo_manifiesto},
				dataType: "text json",
				success: function(response)
				{
					if(response['estado'] != 0) {

						if (response['errores']['busqueda'] == 'ofrecer_alta_temprana') {
							$("#resultado_entidades").hide();
							$("div#alta_temprana_generador").show();
						}
						else {
							mostrarMensaje("exclamation-triangle", response['errores']['busqueda'], "warning");
						}

					} else {

						llenar_lista_busqueda(entidad_buscada, response['datos']);

						for (i = 0; i < response['datos'].length; i++) {
							if (response['datos'][i]['ES_FAVORITO'] == 'no') {
								callback_favoritos(entidad_logueada, entidad_buscada, response['datos'][i]);
							}
						}
					}
				}
			});
		} else {
			mostrarMensaje("exclamation-triangle", "CUIT inv&aacute;lido", "error");
			$("#resultado_entidades").hide();
			$("div#alta_temprana_generador").hide();
		}
	}

	// Alta temprana para generador inexistente
	function altaTempranaEmpresa()
	{
		var cuit = $('input#generador_cuit').val();
		var tipo_manifiesto = $('input#tipo_manifiesto').val();
		realizarAltaTemprana(cuit, 'no', tipo_manifiesto);
	}

	function altaTempranaSucursal()
	{
		// el cuit puede venir por el lado de favorito o del campo de busqueda cuit del generador
		var cuit = $("input#cuit_favorito_clickeado").val();
		var tipo_manifiesto = $('input#tipo_manifiesto').val();

		if ( ! cuit.length) {
			cuit = $('input#generador_cuit').val();
		}

		realizarAltaTemprana(cuit, 'yes', tipo_manifiesto);
	}

	/**
	 * Dan el funcionamiento del [+] y [-] favoritos en la busqueda de entidades.
	 */
	function toggleFavs()
	{
		$('.fav_hidden').toggle();
		$("div#more_favs").toggle();
		$('div#hide_favs').toggle();
	}

</script>
{/literal}