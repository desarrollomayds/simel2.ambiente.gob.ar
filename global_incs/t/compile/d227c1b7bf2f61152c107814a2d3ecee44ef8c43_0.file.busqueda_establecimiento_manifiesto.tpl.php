<?php /* Smarty version 3.1.27, created on 2016-02-17 16:25:20
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/busqueda_establecimiento_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:93058270856c4c9200aecc7_03885665%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd227c1b7bf2f61152c107814a2d3ecee44ef8c43' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/busqueda_establecimiento_manifiesto.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93058270856c4c9200aecc7_03885665',
  'variables' => 
  array (
    'entidad_buscada' => 0,
    'favoritos' => 0,
    'count' => 0,
    'fav' => 0,
    'entidad_logueada' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c4c9203b1ba4_89609995',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c4c9203b1ba4_89609995')) {
function content_56c4c9203b1ba4_89609995 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '93058270856c4c9200aecc7_03885665';
?>

<div class="backGrey">

	<div class="buscador_entidad_manifiestos">
		<div class="search_title">Busqueda por CUIT</div>
		<div class="col-lg-6">
			<div class="input-group buscador_cuit">
				<input type="text" class="form-control input_numerico" placeholder="Ingrese un CUIT..."
					name='<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
_cuit' id='<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
_cuit'>
				<span class="input-group-btn" id='btn_buscar_cuit_<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
' onclick="buscarCuit();">
					<button class="btn btn-default" type="button">Buscar</button>
				</span>
			</div>
		</div>
	</div>

	<!-- favoritos del usuario logeado -->
	<div class="favoritos" id="favoritos" style="width:455px;">
		<div class="text-left" style="margin:10px 0px 5px 10px;">Favoritos:</div>
		<?php if ($_smarty_tpl->tpl_vars['favoritos']->value) {?>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable(0, null, 0);?>
			<?php
$_from = $_smarty_tpl->tpl_vars['favoritos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['fav'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['fav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['fav']->value) {
$_smarty_tpl->tpl_vars['fav']->_loop = true;
$foreach_fav_Sav = $_smarty_tpl->tpl_vars['fav'];
?>
				<?php if ($_smarty_tpl->tpl_vars['count']->value < 2) {?>
					<div class="fav_icon">
						<a class="btn_establecimiento_favorito" style="float:left" nombre-empresa="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_empresa;?>
" establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['fav']->value->establecimiento_id;?>
" 
						nombre-establecimiento="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_establecimiento;?>
" sucursal="<?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
" cuit="<?php echo $_smarty_tpl->tpl_vars['fav']->value->cuit;?>
" provincia="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_provincia;?>
" localidad="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_localidad;?>
" calle="<?php echo $_smarty_tpl->tpl_vars['fav']->value->calle;?>
"
						numero="<?php echo $_smarty_tpl->tpl_vars['fav']->value->numero;?>
" piso="<?php echo $_smarty_tpl->tpl_vars['fav']->value->piso;?>
"><?php echo $_smarty_tpl->tpl_vars['fav']->value->cuit;?>
: <strong><?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre;?>
</strong> 
						<?php if ($_smarty_tpl->tpl_vars['entidad_buscada']->value == 'generador') {?>
							(Sucursal <strong><?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
</strong>)
						<?php }?>
						</a>
						&nbsp;
						<div class="hand" style="float:left;padding-left:5px;">
							<a class="btn_eliminar_favorito" id-relacion-favorito="<?php echo $_smarty_tpl->tpl_vars['fav']->value->id_relacion_favorito;?>
" nombre="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre;?>
" sucursal="<?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
" data-toggle="modal" data-target="#confirmar_borrado_fav" title="Eliminar favorito" onclick="pedirConfirmacionEliminarFavorito($(this));">
							<i class="fa fa-trash-o"></i></a>
						</div>
					</div>
				<?php }?>

				
				<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>

				<?php if ($_smarty_tpl->tpl_vars['count']->value > 2) {?>
					<div class="fav_icon fav_hidden">
						<a class="btn_establecimiento_favorito" style="float:left" nombre-empresa="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_empresa;?>
" establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['fav']->value->establecimiento_id;?>
" nombre-establecimiento="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_establecimiento;?>
" sucursal="<?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
" cuit="<?php echo $_smarty_tpl->tpl_vars['fav']->value->cuit;?>
" provincia="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_provincia;?>
" localidad="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre_localidad;?>
" calle="<?php echo $_smarty_tpl->tpl_vars['fav']->value->calle;?>
"
						numero="<?php echo $_smarty_tpl->tpl_vars['fav']->value->numero;?>
" piso="<?php echo $_smarty_tpl->tpl_vars['fav']->value->piso;?>
"><?php echo $_smarty_tpl->tpl_vars['fav']->value->cuit;?>
: <strong><?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre;?>
</strong>
						<?php if ($_smarty_tpl->tpl_vars['entidad_buscada']->value == 'generador') {?>
							(Sucursal <strong><?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
</strong>)
						<?php }?>
						</a>
						&nbsp;
						<div class="hand" style="float:left;padding-left:5px;">
						<a class="btn_eliminar_favorito" id-relacion-favorito="<?php echo $_smarty_tpl->tpl_vars['fav']->value->id_relacion_favorito;?>
" nombre="<?php echo $_smarty_tpl->tpl_vars['fav']->value->nombre;?>
" sucursal="<?php echo $_smarty_tpl->tpl_vars['fav']->value->sucursal;?>
" data-toggle="modal" data-target="#confirmar_borrado_fav" title="Eliminar favorito" onclick="pedirConfirmacionEliminarFavorito($(this));">
						<i class="fa fa-trash-o"></i>
						</a>
						</div>
					</div>
				<?php }?>

			<?php
$_smarty_tpl->tpl_vars['fav'] = $foreach_fav_Sav;
}
?>

			<?php if ($_smarty_tpl->tpl_vars['count']->value > 2) {?>
				<div id="more_favs" onclick="toggleFavs();">[+]</div>
			<?php }?>

			<div id="hide_favs" style="display:none;" onclick="toggleFavs();">[-]</div>
		<?php } else { ?>
			<p class="text-left">Aun no ha cargado favoritos.</p>
		<?php }?>

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

		<table class="lista_busqueda_entidades" id="lista_busqueda_<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
"
			border="0" cellpadding="5" cellspacing="0">
			<tr>
				<th class="invisible">Id</th>
				<th>&nbsp;</th>
				<th>Raz&oacute;n social</th>
				<?php if ($_smarty_tpl->tpl_vars['entidad_buscada']->value == 'generador') {?>
					<th>Sucursal</th>
				<?php }?>
				<th>Cuit</th>
				<th>Provincia</th>
				<th>Localidad</th>
				<th>Domicilio</th>
				<th>&nbsp;</th>
			</tr>
		</table>

		<div class="clear20"></div>

		<div style="margin-left:260px;">
			<div class="btn_establecer_resultado_<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
 modal_buttons" data-dismiss="modal" style="display:none;">
				<button type="button" class="btn btn-success btn-sm">Aceptar</button>
			</div>
			<button class="btn btn-success btn-sm" type="button" id='btn_agregar_sucursal' name="btn_agregar_sucursal" data-toggle="modal" data-target="#alta_temprana_popup" style="display:none;margin-left:10px;" onclick="altaTempranaSucursal();">Agregar sucursal</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning btn-sm" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
		</div>
		<div class="clear20"></div>
	</div>
</div>


<?php echo '<script'; ?>
>
	// asigno las vars con la info desde el php
	var entidad_buscada = '<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
';
	var entidad_logueada = '<?php echo $_smarty_tpl->tpl_vars['entidad_logueada']->value;?>
';

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

<?php echo '</script'; ?>
>
<?php }
}
?>