{if $PERFIL == 'generador'}
	{assign var=nombre_seccion value='Generadores'}
{elseif $PERFIL == 'transportista'}
	{assign var=nombre_seccion value='Transportistas'}
{elseif $PERFIL == 'operador'}
	{assign var=nombre_seccion value='Operadores'}
{/if}

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' progressButton='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' cuit='true' progressButton='true' filter='true'}
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
			<div id="apDiv1">{$nombre_seccion}</div>

		<div id="contenido-interior">
		<br />
			
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			{include file='operacion/cabecera.tpl'}
			<br/>
			<span class="titulos">
			{include file="operacion/{$PERFIL}/menu_solapas.tpl"}
			</span>

			<div style="height:2px; background-color:#5D9E00"></div>

			<br />

			{* mantengo para el submit el tipo manifiesto *}
			<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="{$tipo_manifiesto}"/>

			<div class="clear20"></div>
			<div class="titulo_manifiesto">Creaci&oacute;n manifiesto SLOP Relacionado</div>

			<strong>Manifiestos Padre en los que participa:</strong>

			{if $manifiestos_en_los_que_participo}
				<table class="table table-hover table-bordered">
					<tr>
						<td class="invisible">ID</td>
						<td>ID Protocolo</td>
						<td>Empresa Naviera</td>
						<td>Buque</td>
						<td>Crear Relaci&oacute;n</td>
					</tr>
					{foreach $manifiestos_en_los_que_participo as $manif}
	  					<tr>
	  						<td class="invisible">{$manif->id}</td>
	  						<td>{formatear_id_protocolo_manifiesto($manif->id_protocolo_manifiesto)}</td>
	  						<td>{$manif->empresa_naviera}</td>
	  						<td>{$manif->buque}</td>
	  						<td><i class="fa fa-plus-circle hand" style="margin-left:30px;" data-toggle="modal" data-target="#mel_popup" onclick="generarManifiestoRelacionado({$manif->id_protocolo_manifiesto});"></i></td>
	  					</tr>
					{/foreach}
				</table>
			{else}
				A&uacute;n no ha participado en un manifiesto SLOP.
			{/if}

			<div class="clear20"></div>
			
			<div style="">			
				<form class="form-inline">
					<div class="form-group">
						<label>Buscar por ID de protocolo</label>
						<input type="text" class="form-control input_numerico" placeholder="Nro protocolo" name="nro_protocolo" id="nro_protocolo">
						<button class="btn btn-default" type="button" onclick="generarManifiestoRelacionado();">Buscar</button>
					</div>
				</form>
			</div>
			<div class="clear20"></div>
		</div>

	</body>

	{include file='general/popup.tpl' ID_POPUP='mel'}
{literal}


<script language="javascript">

	// lo hago dinamico aunque solo el transportista puede generar slop hijos.
	var perfil = {/literal}'{$PERFIL}'{literal};

	$('input#nro_protocolo').filter_input({regex:'[0-9]'});

	function generarManifiestoRelacionado(nro_protocolo)
	{
		var nro_protocolo = (typeof nro_protocolo !== 'undefined') ? nro_protocolo : $("input#nro_protocolo").val();
		
		if (nro_protocolo != '') {
			// console.info("popupManifiestoHijo. Manif. Padre protocolo: "+nro_protocolo);
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/"+perfil+"/manifiestos_slop.php",
				data: {tipo_slop: 'relacionado', action: 'create', protocolo_id: nro_protocolo},
				success: function(response) {
					if (typeof(response) == 'string') {
						$('#mel_popup').modal('show');
						$('#mel_popup_title').html("Crear SLOP Relacionado");
						$('#mel_popup_body').html(response);
						$('#mel_popup_content').width(750);
					} else {
						$('#mel_popup').modal('hide');
						mostrarMensaje("exclamation-triangle", response.errorMsg, "error");
					}
				}
			});
		} else {
			mostrarMensaje("exclamation-triangle", "Especifique el nro de protocolo a buscar","error");
		}
	}

</script>
{/literal}
</html>
