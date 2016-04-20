<!DOCTYPE html>
<html>
<head>

	{include file='general/meta.tpl'}

	<title>Registraci&oacute;n - &Uacute;ltimo paso</title>

	{include file='general/css_headers.tpl' bootstrap='true'}
	{include file='general/js_headers.tpl' bootstrap='true'}

</head>

<body>

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
					<input id="rol_id" type="hidden" value="{$ROL_ID}">
					<div class="row">
						<div class="col-xs-12">
							<div id="registro-cuerpo">

								<p class="text-primary">INFORMACI&Oacute;N</p>

								<p class="registro-titulo bg-primary">Datos de la empresa</p>

								<table width="100%" border="0" style="font-size: 12px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">

									<tr>
										<td  colspan="6" bgcolor="#EAEAE5">
											<strong>Cuit: </strong>{$EMPRESA.CUIT}
										</td>
				                    </tr>
				                    
				                    <tr>
				                        <td  colspan="6" bgcolor="#EAEAE5"><strong>Roles: </strong>
											{if $EMPRESA.ROLES.GENERADOR}
												Generador
											{/if}
											{if $EMPRESA.ROLES.TRANSPORTISTA}
												Transportista
											{/if}
											{if $EMPRESA.ROLES.OPERADOR}
												Operador
											{/if}
										</td>
	                                </tr>
	                                
	                                <tr>
	                                    <td colspan="6" bgcolor="#EAEAE5">
	                                     	<strong>Nombre: </strong>{$EMPRESA.NOMBRE}
	                                    </td>
	                                </tr>

	                                <tr>
										<td colspan="6" bgcolor="#EAEAE5">
											<strong>Fec. Ini. Act: </strong>{$EMPRESA.FECHA_INICIO_ACT}
										</td>
	                                </tr>

	                                <tr>
										<td  colspan="6" bgcolor="#EAEAE5">
											<strong>N&uacute;mero Telef&oacute;nico: </strong>{$EMPRESA.NUMERO_TELEFONICO}
										</td>
									</tr>

									<tr>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong>{$EMPRESA.CALLE_R}&nbsp;
											<br>
											<strong>N&uacute;mero: </strong>{$EMPRESA.NUMERO_R}&nbsp;
											<strong>Piso: </strong>{$EMPRESA.PISO_R}&nbsp;
											<strong>Oficina: </strong>{$EMPRESA.OFICINA_R}&nbsp;
											<br>
											<strong>Provincia: </strong>{$EMPRESA.PROVINCIA_R_}
											<br>
											<strong>Localidad: </strong>{$EMPRESA.LOCALIDAD_R_}
											<br>
											<strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_R}
										</td>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong>{$EMPRESA.CALLE_L}&nbsp;
											<br>
											<strong>N&uacute;mero: </strong>{$EMPRESA.NUMERO_L}&nbsp;
											<strong>Piso: </strong>{$EMPRESA.PISO_L}&nbsp;
											<strong>Oficina: </strong>{$EMPRESA.OFICINA_L}&nbsp;
											<br>
											<strong>Provincia: </strong>{$EMPRESA.PROVINCIA_L_}
											<br>
											<strong>Localidad: </strong>{$EMPRESA.LOCALIDAD_L_}
											<br>
											<strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_L}
										</td>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong>{$EMPRESA.CALLE_C}&nbsp;
											<br>
											<strong>N&uacute;mero: </strong>{$EMPRESA.NUMERO_C}&nbsp;
											<strong>Piso: </strong>{$EMPRESA.PISO_C}&nbsp;
											<strong>Oficina: </strong>{$EMPRESA.OFICINA_C}&nbsp;
											<br>
											<strong>Provincia: </strong>{$EMPRESA.PROVINCIA_C_}
											<br>
											<strong>Localidad: </strong>{$EMPRESA.LOCALIDAD_C_}
											<br>
											<strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_C}
										</td>
									</tr>

								</table>

								<br>

								<p class="registro-titulo bg-info">Representante Legal</p>

								{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
									<table width="100%" border="0" style="font-size: 12px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td bgcolor="#EAEAE5"><strong>Nombre: </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Apellido: </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Fecha de nacimiento: </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Tipo de documento: </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>N&uacute;mero de documento: </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cuit: </strong>{$REPRESENTANTE.CUIT}</td></tr>
									</table>
                                	<br>
								{/foreach}

								<p class="registro-titulo bg-info">Representante T&eacute;cnico</p>

								{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
									<table width="100%" border="0" style="font-size: 12px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td bgcolor="#EAEAE5"><strong>Nombre: </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Apellido: </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Fecha de nacimiento: </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Tipo de documento: </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>N&uacute;mero de documento: </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cargo: </strong>{$REPRESENTANTE.CARGO}</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cuit: </strong>{$REPRESENTANTE.CUIT}</td></tr>
									</table>
                              		<br>
								{/foreach}

								

								{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
								<p class="registro-titulo bg-primary">Establecimiento</p>
									<table width="100%" border="0" style="font-size: 12px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Nombre: </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Tipo: </strong>{$ESTABLECIMIENTO.TIPO_}</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Usuario: </strong>{$ESTABLECIMIENTO.USUARIO}</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Actividad: </strong>{$ESTABLECIMIENTO.ACTIVIDAD_}</td></tr>
		                                <tr>
											<td colspan="6" bgcolor="#EAEAE5">
												<strong>CAA: </strong>{$ESTABLECIMIENTO.CAA_NUMERO}<br />
											</td>
		                                </tr>
										<tr>
											<td colspan="6" bgcolor="#EAEAE5">
												<strong>CAA Vencimiento: </strong>{$ESTABLECIMIENTO.CAA_VENCIMIENTO}
											</td>
		                                </tr>
		                                <tr>
		                                	<td colspan="6" bgcolor="#EAEAE5"><strong>Expediente / A&ntilde;o: </strong>{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO} / {$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</td>
		                                </tr>

										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Descripci&oacute;n: </strong>{$ESTABLECIMIENTO.DESCRIPCION}</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Direcci&oacute;n Email: </strong>{$ESTABLECIMIENTO.DIRECCION_EMAIL}</td></tr>

										<tr>
                                            <td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
                                            	<strong>Domicilio real</strong>
                                            	<br><br>
                                            	<strong>Calle: </strong>{$ESTABLECIMIENTO.CALLE_R}
                                            	<br>
                                            	<strong>N&uacute;mero: </strong>{$ESTABLECIMIENTO.NUMERO_R}
                                            	<strong>Piso: </strong>{$ESTABLECIMIENTO.PISO_R}
                                            	<br>
                                            	<strong>Provincia: </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}
                                            	<br>
                                            	<strong>Localidad: </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}
                                            	<br>
                                            	<strong>C. Postal: </strong>{$ESTABLECIMIENTO.CPOSTAL_R}
                                            </td>
											<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
												<strong>Domicilio constituido</strong>
												<br><br>
												<strong>Calle: </strong>{$ESTABLECIMIENTO.CALLE_C}
												<br>
												<strong>N&uacute;mero: </strong>{$ESTABLECIMIENTO.NUMERO_C}
												<strong>Piso: </strong>{$ESTABLECIMIENTO.PISO_C}
												<br>
												<strong>Provincia: </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}
												<br>
												<strong>Localidad: </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}
                                            	<br>
                                            	<strong>C. Postal: </strong>{$ESTABLECIMIENTO.CPOSTAL_C}
											</td>
											<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
												<strong>Nomenclatura Catastral: </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}&nbsp;&nbsp;&nbsp;&nbsp;
												<br>
												<strong>Habilitaciones: </strong>{$ESTABLECIMIENTO.HABILITACIONES}&nbsp;&nbsp;&nbsp;&nbsp;<br>
											</td>
										</tr>
									</table>
				                    <br>
				                    <p class="registro-titulo bg-info">Permisos</p>
										{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
											<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
												<tr><td bgcolor="#EAEAE5"><strong>Establecimiento: </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
												<tr><td  bgcolor="#EAEAE5"><strong>C&oacute;digo: </strong>{$PERMISO.RESIDUO}</td></tr>
												<tr><td  bgcolor="#EAEAE5"><strong>Residuo: </strong>{$PERMISO.RESIDUO_}</td></tr>
												{if $ESTABLECIMIENTO.TIPO == 1}
												<tr><td  bgcolor="#EAEAE5"><strong>Cantidad: </strong>{$PERMISO.CANTIDAD}&nbsp;kg</td></tr>
												{/if}
												{if $ESTABLECIMIENTO.TIPO == 3}
												<tr><td  bgcolor="#EAEAE5"><strong>Permisos de eliminaci&oacute;n de residuos: </strong>
													<ul>
														{foreach $PERMISO.ELIMINACION as $ELIMINACION}
															<li>{$PERMISO.ELIMINACION_[$ELIMINACION]}</li>
														{/foreach}
													</ul>
												</td></tr>
												{/if}
											</table>
									<br>
										{/foreach}

										{if $ESTABLECIMIENTO.TIPO == 2}
					                    <p class="registro-titulo bg-info">Veh&iacute;culos</p>
											{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
												<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
													<tr><td  bgcolor="#EAEAE5"><strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
													<tr><td  bgcolor="#EAEAE5"><strong>Dominio: </strong>{$VEHICULO.DOMINIO}</td></tr>
													<tr><td  bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
												</table>
												
												<br>
												<p class="registro-titulo bg-warning">Permisos del Veh&iacute;culo {$VEHICULO.DOMINIO}</p>
												{foreach $VEHICULO.PERMISOS as $PERMISO}

													<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
														<tr><td  bgcolor="#EAEAE5"><strong>C&oacute;digo: </strong>{$PERMISO.RESIDUO}</td></tr>
														<tr><td  bgcolor="#EAEAE5"><strong>Residuo: </strong>{$PERMISO.RESIDUO_}</td></tr>
														<tr><td  bgcolor="#EAEAE5"><strong>Cantidad: </strong>{$PERMISO.CANTIDAD}&nbsp;kg</td></tr>
														<tr><td bgcolor="#EAEAE5"><strong>Estado: </strong>{$PERMISO.ESTADO_}</td></tr>
													</table>

													<br>
												{/foreach}
											{/foreach}
										{/if}

								{/foreach}

					    	    <div class="row" style="margin-top:50px;">
								    <div class="col-xs-12 text-right">
								    	<a class="btn btn-default" href="paso_2.php">Volver</a>
								    	<a class="btn btn-success" href="finalizar.php">Finalizar</a>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>