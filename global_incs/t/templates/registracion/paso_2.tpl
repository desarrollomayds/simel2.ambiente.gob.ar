<!DOCTYPE html>
<html>
<head>

	{include file='general/meta.tpl'}

	<title>Registraci&oacute;n - Paso 2</title>
	
	<!-- Carga de header global -->
	{include file='general/css_headers.tpl' bootstrap='true' epoch='true' datepicker='true'}
	<!-- Carga de header global -->
	{include file='general/js_headers.tpl' bootstrap='true' mapa='true' filter='true' epoch='true' datepicker='true' cuit='true'}

</head>
	
	<body onload="actualizar_mapa('map','');">

	{include file='general/popup.tpl' ID_POPUP='mel'}

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-logos">
						<div class="row">
							<div class="col-xs-4"><img src="{$BASE_PATH}/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo_mel.gif" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo.gif" class="img-responsive"></div>
						</div>
					</div>

					<div id="registro-bloque">
						<div class="row">
							<div class="col-xs-12">
								<div id="registro-cuerpo">
									<p class="text-primary">LA EMPRESA TIENE EXPEDIENTE DE</p>

										<form id='form_datos_empresa' action='paso_2.php' method='POST'>

									    <div class="form-group">
									  
									  		<label class="control-label">Que opciones corresponden a su empresa:</label>

										  		<label class="checkbox-inline">
												  <input type="checkbox" id="rol_generador" name="rol_generador" value="1" {if $EMPRESA.ROLES.GENERADOR == 1}checked{/if}> Generador
												</label>
												<label class="checkbox-inline">
												  <input type="checkbox" id="rol_transportista" name="rol_transportista" value="2" {if $EMPRESA.ROLES.TRANSPORTISTA == 2}checked{/if}> Transportista
												</label>
												<label class="checkbox-inline">
												  <input type="checkbox" id="rol_operador" name="rol_operador" value="3" {if $EMPRESA.ROLES.OPERADOR      == 3}checked{/if}> Operador
												</label>

											<div id="roles-td" style="display:none"><div id="roles-error" style="text-align:left;color:red;display:none;"></div></div>
									    
									    </div>

									    
									    <p class="registro-titulo bg-primary">Datos de la empresa</p>

											<input id="geocomplete" type="hidden">
											<input id="pais_r" type="hidden" data-nombre="ARGENTINA">

												<div style=" background-color:#EAEAE5; padding:5px">
													<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n Social<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='{$RAZON_SOCIAL}' size='35' readonly='t'/></td>
														</tr>

														<tr id="nombre-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="nombre-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio de actividades<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<input type='text'   name='fecha_inicio_act' id='fecha_inicio_act' value='{$EMPRESA.FECHA_INICIO_ACT}'>
															</td>
														</tr>

														<tr id="fecha_inicio_act-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="fecha_inicio_act-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO REAL</td>
															<td></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='provincia_r' id='provincia_r'  class='{if $ERRORES.PROVINCIA_R}error_de_carga{/if}'>
																	<option value="">[SELECCIONE UNA PROVINCIA]</option>
																	{foreach $PROVINCIAS as $PROVINCIA}
																		<option  value='{$PROVINCIA.CODIGO}' data-nombre='{$PROVINCIA.DESCRIPCION}' {if $EMPRESA.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
																	{/foreach}
																</select>
															</td>
														</tr>

														<tr id="provincia_r-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='localidad_r' id='localidad_r'  class='{if $ERRORES.LOCALIDAD_R}error_de_carga{/if}'>
																	<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALICADES]</option>
																	{foreach $LOCALIDADES_R as $LOCALIDAD}
																		<option  value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
																	{/foreach}
																</select>
															</td>
														</tr>

														<tr id="localidad_r-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>


														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_r' id='calle_r' value='{$EMPRESA.CALLE_R}' size='35' class='{if $ERRORES.CALLE_R}error_de_carga{/if}'></td>
														</tr>

														<tr id="calle_r-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="calle_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_r' id='numero_r' value='{$EMPRESA.NUMERO_R}' size='35' class='{if $ERRORES.NUMERO_R}error_de_carga{/if}'></td>
														</tr>

														<tr id="numero_r-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="numero_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_r' id='piso_r' value='{$EMPRESA.PISO_R}' size='35' class='{if $ERRORES.PISO_R}error_de_carga{/if}'></td>
														</tr>

														<tr id="piso_r-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="piso_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_r' id='oficina_r' value='{$EMPRESA.OFICINA_R}' size='35' class='{if $ERRORES.OFICINA_R}error_de_carga{/if}'></td>
														</tr>

														<tr id="oficina_r-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="oficina_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r' value='{$EMPRESA.CPOSTAL_R}' size='35' class='{if $ERRORES.CPOSTAL_R}error_de_carga{/if}'></td>
														</tr>

														<tr id="cpostal_r-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;"  class="titulos"></td>
															<td>
																<div style="display:none">
																	<span id="latitud_r" data-geo="lat">lat</span>
												  					<span id="longitud_r" data-geo="lng">lng</span>
																</div>
																<div class="map" style="width: 100%; height: 300px"></div>
															</td>
														</tr>

														<tr>
															<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO LEGAL</td>
															<td></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='provincia_l' id='provincia_l'  class='{if $ERRORES.PROVINCIA_L}error_de_carga{/if}'>
																<option value="">[SELECCIONE UNA PROVINCIA]</option>
																	{foreach $PROVINCIAS as $PROVINCIA}
																		<option  value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_L == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
																	{/foreach}
																</select>
															</td>
														</tr>

														<tr id="provincia_l-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="provincia_l-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='localidad_l' id='localidad_l'  class='{if $ERRORES.LOCALIDAD_L}error_de_carga{/if}'>
																	<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALICADES]</option>
																	{foreach $LOCALIDADES_L as $LOCALIDAD}
																		<option  value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_L == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
																	{/foreach}
																</select>
															</td>
														</tr>

														<tr id="localidad_l-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="localidad_l-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_l' id='calle_l' value='{$EMPRESA.CALLE_L}' size='35' class='{if $ERRORES.CALLE_L}error_de_carga{/if}'></td>
														</tr>

														<tr id="calle_l-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="calle_l-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_l' id='numero_l' value='{$EMPRESA.NUMERO_L}' size='35' class='{if $ERRORES.NUMERO_L}error_de_carga{/if}'></td>
														</tr>

														<tr id="numero_l-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="numero_l-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_l' id='piso_l' value='{$EMPRESA.PISO_L}' size='35' class='{if $ERRORES.PISO_L}error_de_carga{/if}'></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_l' id='oficina_l' value='{$EMPRESA.OFICINA_L}' size='35' class='{if $ERRORES.OFICINA_L}error_de_carga{/if}'></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='cpostal_l' id='cpostal_l' value='{$EMPRESA.CPOSTAL_L}' size='35' class='{if $ERRORES.CPOSTAL_L}error_de_carga{/if}'></td>
														</tr>

														<tr id="cpostal_l-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="cpostal_l-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
								                            <td></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='provincia_c' id='provincia_c'  class='{if $ERRORES.PROVINCIA_C}error_de_carga{/if}'>
																	<option value="">[SELECCIONE UNA PROVINCIA]</option>
																	<option value="2" data-nombre="CIUDAD AUTONOMA DE BS AS" {if $EMPRESA.PROVINCIA_C == 2}selected{/if}>CIUDAD AUTONOMA DE BS AS</option>
																	<!--
																	{foreach $PROVINCIAS as $PROVINCIA}
																		<option  value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
																	{/foreach}
																	-->
																</select>
															</td>
														</tr>

														<tr id="provincia_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5">
																<select  name='localidad_c' id='localidad_c'  class='{if $ERRORES.LOCALIDAD_C}error_de_carga{/if}'>
																	<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALICADES]</option>
																	{foreach $LOCALIDADES_C as $LOCALIDAD}
																		<option  value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_C == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
																	{/foreach}
																</select>
															</td>
														</tr>

														<tr id="localidad_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_c' id='calle_c' value='{$EMPRESA.CALLE_C}' size='35' class='{if $ERRORES.CALLE_C}error_de_carga{/if}'></td>
														</tr>

														<tr id="calle_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="calle_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_c' id='numero_c' value='{$EMPRESA.NUMERO_C}' size='35' class='{if $ERRORES.NUMERO_C}error_de_carga{/if}'></td>
														</tr>

														<tr id="numero_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="numero_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_c' id='piso_c' value='{$EMPRESA.PISO_C}' size='35' class='{if $ERRORES.PISO_C}error_de_carga{/if}'></td>
														</tr>

														<tr id="piso_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="piso_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_c' id='oficina_c' value='{$EMPRESA.OFICINA_C}' size='35' class='{if $ERRORES.OFICINA_C}error_de_carga{/if}'></td>
														</tr>

														<tr id="oficina_c-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="oficina_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c' value='{$EMPRESA.CPOSTAL_C}' size='35' class='{if $ERRORES.CPOSTAL_C}error_de_carga{/if}'></td>
														</tr>

														<tr id="cpostal_c-td" style="display:none">
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

														<tr>
															<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero Telef&oacute;nico<span class="obligatorio">*</span>:&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_telefonico' id='numero_telefonico' value='{$EMPRESA.NUMERO_TELEFONICO}' size='35' class='txt {if $ERRORES.NUMERO_TELEFONICO}error_de_carga{/if}'></td>
														</tr>

														<tr id="numero_telefonico-td" style="display:none">
															<td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
															<td width="450" bordercolor="#EAEAE5"><div id="numero_telefonico-error" style="text-align:left;color:red;display:none;"></div></td>
														</tr>

													</table>
												</div>
											</form>
											<br>
											<p class="text-primary">RESPONSABLES LEGALES</p>

											<table class="table table-striped"  id="lista_resp_legales">
										      <thead>
										        <tr class="registro-tabla-header">
										          	<th class="invisible">&nbsp;</th>
										          	<th>NOMBRE</th>
										          	<th>APELLIDO</th>
										          	<th class="text-center">FEC. NACIMIENTO</th>
										          	<th class="text-center">TIPO DOC.</th>
										          	<th class="text-center">NRO DOC.</th>
										          	<th class="text-center">CUIT</th>
										          	<th class="text-center">ACCIONES</th>
										        </tr>
										      </thead>
										      <tbody>
												<tr id="lista_resp_legales-td" style="display:none">
													<td colspan="7" style="padding:20px 0px;"><div id="lista_resp_legales-error" style="text-align:left;color:red;display:none;"></div></td>
												</tr>

												{foreach $REPRESENTANTES_LEGALES as $REPRESENTANTE}
										        <tr>
										          	<td class="invisible" id="id">{$REPRESENTANTE.ID}</td>
													<td id="nombre">{$REPRESENTANTE.NOMBRE}</td>
													<td id="apellido">{$REPRESENTANTE.APELLIDO}</td>
													<td class="text-center" id="fecha_nacimiento">{$REPRESENTANTE.FECHA_NACIMIENTO}</td>
													<td class="text-center" id="tipo_doc">{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
													<td class="text-center" id="nro_doc">{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
													<td class="text-center" id="cuit">{$REPRESENTANTE.CUIT}</td>
													<td class="text-center">
														<a class="btn btn-primary btn_editar_resp_legal btn-xs" href="#" data-toggle="modal" data-target="#mel_popup" rel="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o fa-lg"></i></a>
														<a class="btn btn-danger btn_borrar_resp_legal btn-xs" href="javascript:void(0);" rel="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash-o fa-lg"></i></a>
													</td>
										        </tr>
										        {/foreach}

										      </tbody>
										    </table>
										    <div align="right" style="background-color:#F5F5ED"><a href="javascript:void(0);" class="btn btn-warning" id="btn_agregar_resp_legal" data-toggle="modal" data-target="#mel_popup">Agregar</a></div>
											<br>
											<p class="text-primary">RESPONSABLES TECNICOS</p>

											<table class="table table-striped"  id="lista_resp_tecnicos">
										      <thead>
										        <tr class="registro-tabla-header">
										          	<th class="invisible">&nbsp;</th>
										          	<th>NOMBRE</th>
										          	<th>APELLIDO</th>
										          	<th class="text-center">FEC. NACIMIENTO</th>
										          	<th class="text-center">TIPO DOC.</th>
										          	<th class="text-center">NRO DOC.</th>
										          	<th class="text-center">CARGO</th>
										          	<th class="text-center">CUIT</th>
										          	<th class="text-center">ACCIONES</th>
										        </tr>
										      </thead>
										      <tbody>
												<tr id="lista_resp_tecnicos-td" style="display:none">
													<td colspan="8" style="padding:20px 0px;"><div id="lista_resp_tecnicos-error" style="text-align:left;color:red;display:none;"></div></td>
												</tr>

												{foreach $REPRESENTANTES_TECNICOS as $REPRESENTANTE}
										        <tr>
										          	<td class="invisible" id="id">{$REPRESENTANTE.ID}</td>
													<td id="nombre">{$REPRESENTANTE.NOMBRE}</td>
													<td id="apellido">{$REPRESENTANTE.APELLIDO}</td>
													<td class="text-center" id="fecha_nacimiento">{$REPRESENTANTE.FECHA_NACIMIENTO}</td>
													<td class="text-center" id="tipo_doc">{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
													<td class="text-center" id="nro_doc">{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
													<td class="text-center" id="cargo">{$REPRESENTANTE.CARGO}</td>
													<td class="text-center" id="cuit">{$REPRESENTANTE.CUIT}</td>
													<td class="text-center">
														<a class="btn btn-primary btn_editar_resp_tecnico btn-xs" href="#" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
														<a class="btn btn-danger btn_borrar_resp_tecnico btn-xs" href="javascript:void(0);" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
													</td>
										        </tr>
										        {/foreach}

										      </tbody>
										    </table>
										    <div align="right" style="background-color:#F5F5ED"><a href="javascript:void(0);" class="btn btn-warning" id="btn_agregar_resp_tecnico" data-toggle="modal" data-target="#mel_popup">Agregar</a></div>

										    
										    <div class="row" style="margin-top:50px;">
											    <div class="col-xs-12 text-right">
											    	<a class="btn btn-default" href="paso_1.php">Volver</a>
											    	<a class="btn btn-success" id="btn_siguiente" href="javascript:void(0);">Continuar</a>
											    </div>
										    </div>


										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
	{literal}
	<script type="text/javascript">
		var registro_actual           = null;

		//representantes legales
		function modificar_representante_legal(representante){
			registro_actual.find('#nombre').html(representante['NOMBRE']);
			registro_actual.find('#apellido').html(representante['APELLIDO']);
			registro_actual.find('#fecha_nacimiento').html(representante['FECHA_NACIMIENTO']);
			registro_actual.find('#tipo_doc').html(representante['TIPO_DOCUMENTO_']);
			registro_actual.find('#nro_doc').html(representante['NUMERO_DOCUMENTO']);
			registro_actual.find('#cuit').html(representante['CUIT']);

			registro_actual = null;
		}

		function agregar_representante_legal(representante){

			datos = "\
			<tr>\
				<td class='invisible' id='id'>" + representante["ID"] + "</td>\
				<td id='nombre'>" + representante["NOMBRE"] + "</td>\
				<td id='apellido'>" + representante["APELLIDO"] + "</td>\
				<td class='text-center' id='fecha_nacimiento'>" + representante["FECHA_NACIMIENTO"] + "</td>\
				<td class='text-center' id='tipo_doc'>" + representante["TIPO_DOCUMENTO_"] + "</td>\
				<td class='text-center' id='nro_doc'>" + representante["NUMERO_DOCUMENTO"] + "</td>\
				<td class='text-center' id='cuit'>" + representante["CUIT"] + "</td>\
				<td class='text-center'>\
					<a class='btn btn-primary btn_editar_resp_legal btn-xs' href='javascript:void(0);' data-toggle='modal' data-target='#mel_popup' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
					<a class='btn btn-danger btn_borrar_resp_legal btn-xs' href='javascript:void(0);' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
				</td>\
				</tr>";

			$('#lista_resp_legales> tbody:last').append(datos);
		}
		//representantes legales

		//representantes tecnicos
		function modificar_representante_tecnico(representante){
			registro_actual.find('#nombre').html(representante['NOMBRE']);
			registro_actual.find('#apellido').html(representante['APELLIDO']);
			registro_actual.find('#fecha_nacimiento').html(representante['FECHA_NACIMIENTO']);
			registro_actual.find('#tipo_doc').html(representante['TIPO_DOCUMENTO_']);
			registro_actual.find('#nro_doc').html(representante['NUMERO_DOCUMENTO']);
			registro_actual.find('#cargo').html(representante['CARGO']);
			registro_actual.find('#cuit').html(representante['CUIT']);

			registro_actual = null;
		}

		function agregar_representante_tecnico(representante){

			datos = "\
			<tr>\
				<td class='invisible' id='id'>" + representante["ID"] + "</td>\
				<td id='nombre'>" + representante["NOMBRE"] + "</td>\
				<td id='apellido'>" + representante["APELLIDO"] + "</td>\
				<td class='text-center' id='fecha_nacimiento'>" + representante["FECHA_NACIMIENTO"] + "</td>\
				<td class='text-center' id='tipo_doc'>" + representante["TIPO_DOCUMENTO_"] + "</td>\
				<td class='text-center' id='nro_doc'>" + representante["NUMERO_DOCUMENTO"] + "</td>\
				<td class='text-center' id='cargo'>" + representante["CARGO"] + "</td>\
				<td class='text-center' id='cuit'>" + representante["CUIT"] + "</td>\
				<td class='text-center'>\
					<a class='btn btn-primary btn_editar_resp_tecnico btn-xs' href='javascript:void(0);' data-toggle='modal' data-target='#mel_popup' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
					<a class='btn btn-danger btn_borrar_resp_tecnico btn-xs' href='javascript:void(0);' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
				</td>\
			</tr>";

			$('#lista_resp_tecnicos> tbody:last').append(datos);
		}
		//representantes tecnicos

		//localidades
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

		function actualizar_localidades_l(){
			$.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_l").val()}, function(json){
				$('#localidad_l').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_l').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				var opciones = $("#localidad_l option");

				opciones.sort(function(a,b) {
				    if (a.text > b.text) return 1;
				    else if (a.text < b.text) return -1;
				    else return 0
				})

				$("#localidad_l").empty().append( opciones );

				$("#localidad_l").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

				$('#localidad_l').val($('#localidad_l option:first').val());

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
		//localidades

		$(function(){
			//representantes legales
			$(document).on('click','.btn_borrar_resp_legal', function(){
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "POST",
				   url: mel_path+"/registracion/responsable_legal.php",
				   data: {accion : "baja", id : registro_actual.find('#id').html()},
				   dataType: "text json",
				   success: function(retorno){
						if(retorno['estado'] != 0){
							alert(retorno['errores']['baja']);
						}else{
							registro_actual.remove();
						}
				   }
				 });
			});

			$(document).on('click','.btn_editar_resp_legal', function(){
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "GET",
				   url: mel_path+"/registracion/responsable_legal.php?id=" + registro_actual.find('#id').html(),
				   dataType: "html",
                   beforeSend: function()
	               {
	               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
	               },
				   success: function(msg)
				   {
   			  	 		$('#mel_popup_title').html("Editar responsable legal");
						$('#mel_popup_body').html(msg);
						$('#mel_popup_content').width(600);
				   }
				});
			});

			$('#btn_agregar_resp_legal').click(function() {

				$('#lista_resp_legales-error').hide();
				$('#lista_resp_legales-td').hide();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/registracion/responsable_legal.php",
				   dataType: "html",
                   beforeSend: function()
	               {
	               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
	               },
				   success: function(msg){

   			  	 	$('#mel_popup_title').html("Agregar responsable legal");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);

				   }
				 });
			});
			//representantes legales

			//representantes tecnicos
			$(document).on('click','.btn_borrar_resp_tecnico', function(){
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "POST",
				   url: mel_path+"/registracion/responsable_tecnico.php",
				   data: {accion : "baja", id : registro_actual.find('#id').html()},
				   dataType: "text json",
				   success: function(retorno){
						if(retorno['estado'] != 0){
							alert(retorno['errores']['baja']);
						}else{
							registro_actual.remove();
						}
				   }
				 });
			});

			$(document).on('click','.btn_editar_resp_tecnico', function(){
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "GET",
				   url: mel_path+"/registracion/responsable_tecnico.php?id=" + registro_actual.find('#id').html(),
				   dataType: "html",
				   beforeSend: function()
	               {
	               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
	               },
				   success: function(msg){
   			  	 	$('#mel_popup_title').html("Editar responsable t&eacute;cnico");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);
				   }
				 });
			});

			$('#btn_agregar_resp_tecnico').click(function() {

				$('#lista_resp_tecnicos-error').hide();
				$('#lista_resp_tecnicos-td').hide();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/registracion/responsable_tecnico.php",
				   dataType: "html",
				   beforeSend: function()
	               {
	               	$("#mel_popup_body").html('<div class="row"><div class="col-lg-12 text-center"><i class="fa fa-spinner fa-spin fa-4x"></i></div><div class="col-lg-12 text-center">Cargando...</div></div>');
	               },
				   success: function(msg){
   			  	 	$('#mel_popup_title').html("Agregar responsable t&eacute;cnico");
					$('#mel_popup_body').html(msg);
					$('#mel_popup_content').width(600);
				   }
				 });
			})
			//representantes tecnicos

			//datos empresa
			$(function(){
				$('#numero_r').filter_input({regex:'[0-9]'});
				$('#numero_l').filter_input({regex:'[0-9]'});
				$('#numero_c').filter_input({regex:'[0-9]'});
				$('#numero_telefonico').filter_input({regex:'[0-9 \\-]'});

		        $('#fecha_inicio_act').datepicker({
		          format: 'dd/mm/yyyy',
		          startView: 'decade',
		          endDate: new Date()
		        }).on('changeDate', function(e){
		            $(this).datepicker('hide');
		        });
				
			});


			$('#provincia_r').on('change', function() {
				limpiar_calle_num('r');
				actualizar_localidades_r();
				actualizar_mapa('map','');
			});


			$('#localidad_r').on('change', function() {
				limpiar_calle_num('r');
   				actualizar_mapa('map','');
			});	

			$("#calle_r").on('change', function() {

				if ($("#numero_r").val())
					actualizar_mapa('map','');
			});	

			$("#numero_r").on('change', function() {

				if ($("#calle_r").val())
					actualizar_mapa('map','');
			});	

			$('#provincia_l').on('change', function() {
				actualizar_localidades_l();
			});	

			$('#provincia_c').on('change', function() {
				actualizar_localidades_c();
			});	

			//datos empresa

			$('#btn_siguiente').click(function() {

				//Fecha inicio actividad
				if ($("#fecha_inicio_act").val().length > 0)
				{
					if (comprobar_fecha($("#fecha_inicio_act").val()))
					{	
						mostrarMensaje('exclamation-triangle','La fecha de actividad no puede ser una fecha mayor a la actual.','warning');
						return false;
					}
					else
					{
						cerrar_mensajes();
					}
				}

				var campos  = [	'roles', 'nombre', 'fecha_inicio_act',
								'calle_r', 'numero_r', 'piso_r', 'oficina_r', 'provincia_r', 'localidad_r', 'cpostal_r',
								'latitud_r', 'longitud_r',
								'calle_l', 'numero_l', 'piso_l', 'oficina_l', 'provincia_l', 'localidad_l', 'cpostal_l',
								'calle_c', 'numero_c', 'piso_c', 'oficina_c', 'provincia_c', 'localidad_c', 'cpostal_c',
								'numero_telefonico', 'lista_resp_legales', 'lista_resp_tecnicos'];

				$.ajax({
					type: "POST",
					url: mel_path+"/registracion/paso_2.php",
					data:	{	nombre            : $("#nombre").val(),
								fecha_inicio_act  : $("#fecha_inicio_act").val(),

								calle_r           : $("#calle_r").val(),
								numero_r          : $("#numero_r").val(),
								piso_r            : $("#piso_r").val(),
								oficina_r         : $("#oficina_r").val(),
								provincia_r       : $("#provincia_r").val(),
								localidad_r       : $("#localidad_r").val(),
								cpostal_r 		  : $("#cpostal_r").val(),

								latitud_r         : $("#latitud_r").text(),
								longitud_r        : $("#longitud_r").text(),

								calle_l           : $("#calle_l").val(),
								numero_l          : $("#numero_l").val(),
								piso_l            : $("#piso_l").val(),
								oficina_l         : $("#oficina_l").val(),
								provincia_l       : $("#provincia_l").val(),
								localidad_l       : $("#localidad_l").val(),
								cpostal_l 		  : $("#cpostal_l").val(),

								calle_c           : $("#calle_c").val(),
								numero_c          : $("#numero_c").val(),
								piso_c            : $("#piso_c").val(),
								oficina_c         : $("#oficina_c").val(),
								provincia_c       : $("#provincia_c").val(),
								localidad_c       : $("#localidad_c").val(),
								cpostal_c		  : $("#cpostal_c").val(),

								numero_telefonico : $("#numero_telefonico").val(),
								
								rol_generador     : ($("#rol_generador").is(':checked')) ? $("#rol_generador").val() : 0,
								rol_transportista : ($("#rol_transportista").is(':checked')) ? $("#rol_transportista").val() : 0,
								rol_operador      : ($("#rol_operador").is(':checked')) ? $("#rol_operador").val() : 0
							},
					dataType: "text json",
					success: function(retorno){
						if(retorno['estado'] == 0)
						{
							window.location.replace(retorno['siguiente']);
						}
						else
						{
							for(campo in campos){
								texto_errores = '';
								campo = campos[campo];

								if(retorno['errores'][campo] != null){

									texto_errores = retorno['errores'][campo];
									$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
									$('#' + campo).addClass('error_de_carga');
								}else{
									$('#' + campo).removeClass('error_de_carga');
								}

								if(texto_errores != ''){
									$('#' + campo + '-error').html(texto_errores);
									$('#' + campo + '-td').show();
									$('#' + campo + '-error').show();
									;
								}else{
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

		});
	</script>
	{/literal}

</html>