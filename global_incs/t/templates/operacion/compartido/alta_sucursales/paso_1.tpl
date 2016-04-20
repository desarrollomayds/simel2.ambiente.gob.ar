<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

	<title>Crear manifiesto</title>

	<!-- Carga de header global -->
	{include file='general/css_headers.tpl' bootstrap='true' chosen='true' datepicker='true'}
	{include file='general/js_headers.tpl' bootstrap='true' mapa='true' chosen='true' datepicker='true'}

</head>

<body onload="actualizar_mapa('map','');">

	{include file='general/popup.tpl' ID_POPUP='mel'}
	{include file='general/popup.tpl' ID_POPUP='mel2'}

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
	<div id="contenedor-interior">
		{include file='general/logos.tpl'}
		<div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>

		<div id="apDiv1">Mi Cuenta<br></div>
		<div id="contenido-interior">

			<br>
			<span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../../{$PERFIL}/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../../{$PERFIL}/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    {if $ROL_ID == 2}
                        <div class="tabnueva">
                            <a href="../../{$PERFIL}/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    {else}
                        <div class="tabnueva">
                            <a href="../../{$PERFIL}/alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    {/if}
                </div>
				<div style="height:2px; background-color:#5D9E00"></div>
			</span>
			<br>

			<form>
				<input id="geocomplete" type="hidden">
				<input id="pais_r" type="hidden" data-nombre="ARGENTINA">

				<input type='hidden' name='establecimiento_usuario_id' id='establecimiento_usuario_id' value='{$USUARIO_ID}' size='50'>
				<input type='hidden' name='establecimiento_accion'     id='establecimiento_accion'     value='{$ACCION}'     size='50'>
				<input type='hidden' name='establecimiento_id'         id='establecimiento_id'         value='{$ESTABLECIMIENTO.ID}'  size='50'>

				<p class="registro-titulo bg-primary">Agregar sucursal</p>

				<table width="100%" cellspacing="0"  cellpadding="5" border="0" style="text-align: left;font-size: 13px" id="tablas-forms" class="tabla">

	                <tr>
	                    <td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&deg; de Sucursal<span class="obligatorio">*</span>:</td>
	                    <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_numero'   id='establecimiento_numero' value='{$SUCURSAL}' size='30' disabled></td>
	                </tr>

	                <tr id="establecimiento_numero-td" style="display:none">
	                    <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
	                    <td bordercolor="#EAEAE5"><div id="establecimiento_numero-error" style="text-align:left;color:red;display:none;"></div></td>
	                </tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Nombre<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text' name='establecimiento_nombre'   id='establecimiento_nombre'   value='{$ESTABLECIMIENTO.NOMBRE}' size='30'></td>
					</tr>

					<tr id="establecimiento_nombre-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td bordercolor="#EAEAE5"><div id="establecimiento_nombre-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Usuario<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text' name='usuario'   id='usuario'   value='{$NOMBRE_USUARIO}' size='30' disabled></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Contrase&ntilde;a<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='password'   name='contrasenia'   id='contrasenia'   value='{$ESTABLECIMIENTO.CONTRASENIA}' size='30'></td>
					</tr>

					<tr id="contrasenia-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td bordercolor="#EAEAE5"><div id="contrasenia-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero CAA - Fecha:</td>
						<td bordercolor="#EAEAE5">

							<input type='text'   name='caa_numero'      id='caa_numero'      value='{$ESTABLECIMIENTO.CAA_NUMERO}'      size='10'>

							-

							<input type='text'   name='caa_vencimiento' id='caa_vencimiento' value='{$ESTABLECIMIENTO.CAA_VENCIMIENTO}' size='10' readonly="true">
						</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&deg; Expediente<span class="obligatorio">*</span> - A&ntilde;o<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">

							<input type='text'   name='establecimiento_expediente_numero'   id='expediente_numero'   value='{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}' size='10'>

							-

							<input type='text'   name='expediente_anio'     id='expediente_anio'     value='{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}'   size='4'>

						</td>
					</tr>

					<tr id="expediente_numero-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="expediente_numero-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr id="expediente_anio-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="expediente_anio-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Actividad principal<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">

							<select style="width: 280px;" name='establecimiento_actividad' id='establecimiento_actividad' >
								<option></option>
								{foreach $ACTIVIDADES as $ACTIVIDAD}
								<option value='{$ACTIVIDAD.CODIGO}'>{$ACTIVIDAD.CODIGO} - {$ACTIVIDAD.DESCRIPCION}</option>
								{/foreach}
							</select>
						</td>

					</tr>

					<tr id="establecimiento_actividad-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="establecimiento_actividad-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Breve descripci&oacute;n del proceso productivo<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><textarea type='text'   name='descripcion'   id='descripcion' style="width:100%;height:80px;resize:vertical;">{$ESTABLECIMIENTO.DESCRIPCION}</textarea></td>
					</tr>

					<tr id="descripcion-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="descripcion-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
			            <td align="left" colspan="2" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO REAL</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">
							<select style="width: 280px;" name='provincia_r' id='provincia_r'>
								<option value="">[SELECCIONE UNA PROVINCIA]</option>
								{foreach $PROVINCIAS as $PROVINCIA}
								<option value='{$PROVINCIA.CODIGO}' data-nombre='{$PROVINCIA.DESCRIPCION}' {if $ESTABLECIMIENTO.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
								{/foreach}
							</select></td>
						</tr>

						<tr id="provincia_r-td" style="display:none">
							<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
							<td width="450" bordercolor="#EAEAE5"><div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div></td>
						</tr>

						<tr>
							<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:</td>
							<td bordercolor="#EAEAE5">
								<select style="width: 380px;" name='localidad_r' id='localidad_r'>
									<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
								</select></td>
							</tr>

							<tr id="localidad_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='calle_r'   id='calle_r'   value='{$ESTABLECIMIENTO.CALLE_R}' size='30'></td>
							</tr>

							<tr id="calle_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="calle_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='numero_r'   id='numero_r'   value='{$ESTABLECIMIENTO.NUMERO_R}' size='30'></td>
							</tr>

							<tr id="numero_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="numero_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Piso:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='piso_r'   id='piso_r'   value='{$ESTABLECIMIENTO.PISO_R}' size='30'></td>
							</tr>

					        <tr>
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
					            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r' value='{$ESTABLECIMIENTO.CPOSTAL_R}' size='30'></td>
					        </tr>

					        <tr id="cpostal_r-td" style="display:none">
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
					            <td bordercolor="#EAEAE5"><div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div></td>
					        </tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Coordenadas geogr&aacute;ficas de la sucursal<span class="obligatorio">*</span>:</td>
								<td width="450px" bordercolor="#EAEAE5">
									<div>
										<span id="latitud_r" data-geo="lat" style="display:none">{$ESTABLECIMIENTO.LATITUD_R}</span>
										<span id="longitud_r" data-geo="lng" style="display:none">{$ESTABLECIMIENTO.LONGITUD_R}</span>
									</div>
									<div class="mapa-sucursal" style="width: 450px; height: 300px"></div>
								</td>
							</tr>

							<tr>
					            <td align="left" colspan="2" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5">	<select style="width: 280px;" name='provincia_c' id='provincia_c'>
									<option value="">[SELECCIONE UNA PROVINCIA]</option>
									{foreach $PROVINCIAS as $PROVINCIA}
									<option value='{$PROVINCIA.CODIGO}' {if $ESTABLECIMIENTO.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select></td>
							</tr>

							<tr id="provincia_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5">	<select style="width: 380px;" name='localidad_c' id='localidad_c'>
									<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
								</select></td>
							</tr>

							<tr id="localidad_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='calle_c'   id='calle_c'   value='{$ESTABLECIMIENTO.CALLE_C}' size='30'></td>
							</tr>

							<tr id="calle_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="calle_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>				

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='numero_c'   id='numero_c'   value='{$ESTABLECIMIENTO.NUMERO_C}' size='30'></td>
							</tr>

							<tr id="numero_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="numero_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Piso:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='piso_c'   id='piso_c'   value='{$ESTABLECIMIENTO.PISO_C}' size='30'></td>
							</tr>
        
					        <tr>
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
					            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c' value='{$ESTABLECIMIENTO.CPOSTAL_C}' size='30'></td>
					        </tr>

					        <tr id="cpostal_c-td" style="display:none">
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
					            <td bordercolor="#EAEAE5"><div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div></td>
					        </tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Nomenclatura Catastral:</td>
								<td bordercolor="#EAEAE5">

									Circ <select name='nomenclatura_catastral_circ' id='nomenclatura_catastral_circ'>
									{foreach $NOMENCLATURA_CATASTRAL_CIRC as $CIRC}
									<option value='{$CIRC}' {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC == $CIRC}selected{/if}>{$CIRC}</option>
									{/foreach}
								</select>



								Sec <select name='nomenclatura_catastral_sec' id='nomenclatura_catastral_sec'>
								{foreach $NOMENCLATURA_CATASTRAL_SEC as $SEC}
								<option value='{$SEC}' {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC == $SEC}selected{/if}>{$SEC}</option>
								{/foreach}
							</select>



							Manz     <input type='text' name='nomenclatura_catastral_manz'     id='nomenclatura_catastral_manz'     value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}'     size='4'>



							Parc     <input type='text' name='nomenclatura_catastral_parc'     id='nomenclatura_catastral_parc'     value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}'     size='4'>



							Sub Parc <input type='text' name='nomenclatura_catastral_sub_parc' id='nomenclatura_catastral_sub_parc' value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}' size='4'>

						</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Habilitaciones<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text'   name='habilitaciones'   id='habilitaciones'   value='{$ESTABLECIMIENTO.HABILITACIONES}' size='30'></td>
					</tr>

					<tr id="habilitaciones-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="habilitaciones-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

		            <tr>
		                <td width="20%" height="25" align="left" bordercolor="#EAEAE5">Direcci&oacute;n de Email<span class="obligatorio">*</span>:&nbsp;</td>
		                <td bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email' value='{$ESTABLECIMIENTO.DIRECCION_EMAIL}' size='35'></td>
		            </tr>

		            <tr id="direccion_email-td" style="display:none">
		                <td width="20%" height="10" align="left" bordercolor="#EAEAE5">&nbsp;</td>
		                <td bordercolor="#EAEAE5"><div id="direccion_email-error" style="text-align:left;color:red;display:none;"></div></td>
		            </tr>

					<tr>
						<td width="100%" height="25" align="center" bordercolor="#EAEAE5" colspan='3'>
							<input type="button" class="btn btn-warning" value="Administrar permisos" id="btn_permisos_establecimiento" name="btn_permisos_establecimiento" data-toggle="modal" data-target="#mel_popup"/>
						</td>
					</tr>

				</table>
			</form>
			<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
				<tbody>
					<tr>
						{if not $CAMBIOS_PENDIENTES}
						<td align="right"><input type="button" class="btn btn-success" value="Crear sucursal" id="btn_guardar_cambios" name="btn_guardar_cambios"/></td>
						{else}
						<script>
							$(function() {
								$("#alerta-micuenta").show().html("Para requerir un nuevo cambio deber&aacute; esperar a que se eval&uacute;e el actual.");
							});
						</script>
						{/if}
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</body>

{literal}
<script type="text/javascript">

	$(function() {

		$("#establecimiento_actividad").chosen({width: "450px"});

		actualizar_mapa('mapa-sucursal','');


		$('#establecimiento_numero_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_numero_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_numero').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_anio').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_manz').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_parc').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex:'[0-9]'});

		$('#caa_vencimiento').datepicker({
			format: 'dd/mm/yyyy'
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });

		$("#establecimiento_actividad").on('change',function(){

			$("#establecimiento_actividad-td").hide();

		});

// creacion_manifiesto.tpl

$('#btn_permisos_establecimiento').on('click', function() {
	$.ajax({
		type: "GET",
		url: mel_path+"/operacion/compartido/alta_sucursales/permisos_establecimiento.php",
		dataType: "html",
		success: function(msg){
			$('#mel_popup_title').html("Residuos permitidos");
			$('#mel_popup_body').html(msg);
			$('#mel_popup_content').width(600);
		}
	});
});

$('#btn_guardar_cambios').on('click', function() {
	var campos = [	'establecimiento_numero', 'establecimiento_nombre', 'usuario',
	'caa_numero', 'caa_vencimiento', 'expediente_numero', 'expediente_anio',
	'establecimiento_actividad', 'descripcion', 'contrasenia', 'tipo', 'caa_numero', 'caa_vencimiento',
	'calle_r', 'numero_r', 'piso_r', 'provincia_r', 'localidad_r', 'cpostal_r', 'latitud_r', 'longitud_r',
	'calle_c', 'numero_c', 'piso_c', 'provincia_c', 'localidad_c', 'cpostal_c',
	'nomenclatura_catastral_circ', 'nomenclatura_catastral_sec', 'nomenclatura_catastral_manz',
	'nomenclatura_catastral_parc', 'nomenclatura_catastral_sub_parc',
	'habilitaciones',  'general', 'direccion_email', 'permisos_establecimientos'
	];

	$.ajax({
		type: "POST",
		url:  mel_path+"/operacion/compartido/alta_sucursales/paso_1.php",
		data:
		{
			accion                          : 'alta',
			usuario 						: $("#usuario").val(),
			establecimiento_numero 			: $("#establecimiento_numero").val(),
			establecimiento_nombre          : $("#establecimiento_nombre").val(),
			tipo                            : $("#establecimiento_tipo").val(),
			contrasenia     				: $("#contrasenia").val(),
			caa_numero                      : $("#caa_numero").val(),
			caa_vencimiento                 : $("#caa_vencimiento").val(),
			expediente_numero 				: $("#expediente_numero").val(),
			expediente_anio   				: $("#expediente_anio").val(),
			establecimiento_actividad		: $("#establecimiento_actividad").val(),
			descripcion       				: $("#descripcion").val(),
			provincia_r       				: $("#provincia_r").val(),
			localidad_r       				: $("#localidad_r").val(),
			calle_r           				: $("#calle_r").val(),
			numero_r          				: $("#numero_r").val(),
			piso_r            				: $("#piso_r").val(),
			cpostal_r 						: $("#cpostal_r").val(),
            latitud_r 						: $("#latitud_r").text(),
            longitud_r  					: $("#longitud_r").text(),
			calle_c                         : $("#calle_c").val(),
			numero_c                        : $("#numero_c").val(),
			piso_c                          : $("#piso_c").val(),
			provincia_c                     : $("#provincia_c").val(),
			localidad_c                     : $("#localidad_c").val(),
			cpostal_c 						: $("#cpostal_c").val(),
			nomenclatura_catastral_circ     : $("#nomenclatura_catastral_circ").val(),
			nomenclatura_catastral_sec      : $("#nomenclatura_catastral_sec").val(),
			nomenclatura_catastral_manz     : $("#nomenclatura_catastral_manz").val(),
			nomenclatura_catastral_parc     : $("#nomenclatura_catastral_parc").val(),
			nomenclatura_catastral_sub_parc : $("#nomenclatura_catastral_sub_parc").val(),
			habilitaciones                  : $("#habilitaciones").val(),
			direccion_email 				: $("#direccion_email").val()
		},
		dataType: "text json",
		success: function(retorno){
			if(retorno['estado'] == 0)
			{	
				mostrarMensaje('','Sucursal registrada. A continuaci&oacute;n ser&aacute; redireccionado.','success');

				setTimeout(function () {
			        location.reload();
			    }, 5000);
				
			}
			else
			{
                for(campo in campos){
                    texto_errores = '';
                    campo = campos[campo];

                    if (retorno['errores'][campo] != null && (campo == 'permisos_establecimientos'))
                    {
                        mostrarMensaje('exclamation-triangle',retorno['errores'][campo],'warning');
                        return false;
                    }
                    else
                    {
                        cerrar_mensajes();
                    }

                    if(retorno['errores'][campo] != null){

                        texto_errores = retorno['errores'][campo];
                        $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                        $('#' + campo).addClass('error_de_carga');
                    }
                    else
                    {
                        $('#' + campo).removeClass('error_de_carga');
                    }

                    if(texto_errores != '')
                    {
                        $('#' + campo + '-error').html(texto_errores);
                        $('#' + campo + '-td').show();
                        $('#' + campo + '-error').show();
                    }
                    else
                    {
                        $('#' + campo + '-error').hide();
                        $('#' + campo + '-td').hide();
                    }

                }

                mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                return false;
			}
		}
	});
});


var cambio_localidad_pendiente = null;

$('#provincia_r').on('change',function() {
	limpiar_calle_num('r','');
	actualizar_localidades_r();
	actualizar_mapa('mapa-sucursal','');
});

$('#localidad_r').on('change',function() {
	limpiar_calle_num('r','');
	actualizar_mapa('mapa-sucursal','');
});

$('#provincia_c').on('change',function() {
	actualizar_localidades_c();
});

$("#calle_r").on('change', function() {

	if ($("#numero_r").val())
		actualizar_mapa('mapa-sucursal','');
});	

$("#numero_r").on('change', function() {

	if ($("#calle_r").val())
		actualizar_mapa('mapa-sucursal','');
});	

function actualizar_localidades_r(){

	$.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
		
		$('#localidad_r').find('option').remove();

		$.each(json, function(codigo, descripcion) {
			$('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
		});

		var opciones = $("#localidad_r option");

		opciones.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0
		})

		$("#localidad_r").empty().append( opciones );

		$("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

		$('#localidad_r').val($('#localidad_r option:first').val());

	});
}

function actualizar_localidades_c(){

	$.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_c").val()}, function(json){
		$('#localidad_c').find('option').remove();

		$.each(json, function(codigo, descripcion) {
			$('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
		});

		var opciones = $("#localidad_c option");

		opciones.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0
		})

		$("#localidad_c").empty().append( opciones );

		$("#localidad_c").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

		$('#localidad_c').val($('#localidad_c option:first').val());

	});
}
});
</script>

{/literal}
</html>