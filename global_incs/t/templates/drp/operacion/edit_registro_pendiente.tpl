<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
</head>

<body style="padding-top:60px;">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>
				<li class="active">Solicitud de Registro</li>
			</ol>
			<input id="rol_id" type="hidden" value="{$ROL_ID}">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
							<div class="col-md-8">
								<h2>INFORMACI&Oacute;N</h2>
							</div>
							<div class="col-md-4 text-right">
								<button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
								<button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i> Descargar</button>
								<button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
							</div>
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la empresa</a></li>
							<li role="presentation"><a href="#Establecimiento" aria-controls="Establecimiento" role="tab" data-toggle="tab" id="linkEst">Establecimiento</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
								<div class="bs-example">
									<p>
										<strong>Cuit: </strong>{$EMPRESA.CUIT}
										<br>
										<strong>Roles: </strong>
										{if $EMPRESA.ROLES.GENERADOR} Generador {/if} {if $EMPRESA.ROLES.TRANSPORTISTA} Transportista {/if} {if $EMPRESA.ROLES.OPERADOR} Operador {/if}
										<br>
										<strong>Nombre: </strong>{$EMPRESA.NOMBRE}
										<br>
										<strong>Fec. Ini. Act: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/fecinact" data-id="{$EMPRESA.FECHA_INICIO_ACT }" class="editableFeld">{$EMPRESA.FECHA_INICIO_ACT}</span>
										<br>
										<strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/telef" data-id="{$EMPRESA.NUMERO_TELEFONICO }" class="editableFeld">{$EMPRESA.NUMERO_TELEFONICO}</span>
									</p>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecalle" data-id="{$EMPRESA.CALLE_R}" class="editableFeld">{$EMPRESA.CALLE_R}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrenum" data-id="{$EMPRESA.NUMERO_R}" class="editableFeld">{$EMPRESA.NUMERO_R}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrepiso" data-id="{$EMPRESA.PISO_R}" class="editableFeld">{$EMPRESA.PISO_R}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrreofi" data-id="{$EMPRESA.OFICINA_R}" class="editableFeld">{$EMPRESA.OFICINA_R}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr1" data-name="Emp/pro1" data-id="{$EMPRESA.PROVINCIA_R_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_R_}</span>
											<script>var arr1 = {$EMPRESA.PROVINCIA_ARR};</script>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr2" data-name="Emp/loca1" data-id="{$EMPRESA.LOCALIDAD_R_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_R_}</span>
											<script>var arr2 = {$EMPRESA.LOCALIDAD_ARR};</script>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecp" data-id="{$EMPRESA.CODIGO_POSTAL}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL}</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecalle" data-id="{$EMPRESA.CALLE_L}" class="editableFeld">{$EMPRESA.CALLE_L}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlenum" data-id="{$EMPRESA.NUMERO_L}" class="editableFeld">{$EMPRESA.NUMERO_L}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlepiso" data-id="{$EMPRESA.PISO_L}" class="editableFeld">{$EMPRESA.PISO_L}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrleofi" data-id="{$EMPRESA.OFICINA_L}" class="editableFeld">{$EMPRESA.OFICINA_L}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr3" data-name="Emp/pro2" data-id="{$EMPRESA.PROVINCIA_L_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_L_}</span>
											<script>var arr3 = {$EMPRESA.PROVINCIA_L_ARR};</script>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr4" data-name="Emp/loca2" data-id="{$EMPRESA.LOCALIDAD_L_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_L_}</span>
											<script>var arr4 = {$EMPRESA.LOCALIDAD_L_ARR};</script>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecp" data-id="{$EMPRESA.CODIGO_POSTAL_L}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL_L}</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocalle" data-id="{$EMPRESA.CALLE_C}" class="editableFeld">{$EMPRESA.CALLE_C}</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrconum" data-id="{$EMPRESA.NUMERO_C}" class="editableFeld">{$EMPRESA.NUMERO_C}</span>&nbsp;
											<strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcopiso" data-id="{$EMPRESA.PISO_C}" class="editableFeld">{$EMPRESA.PISO_C}</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcoofi" data-id="{$EMPRESA.OFICINA_C}" class="editableFeld">{$EMPRESA.OFICINA_C}</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr5" data-name="Emp/pro3" data-id="{$EMPRESA.PROVINCIA_C_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_C_}</span>
											<script>var arr5 = {$EMPRESA.PROVINCIA_C_ARR};</script>
											<br>
											<strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr6" data-name="Emp/loca3" data-id="{$EMPRESA.LOCALIDAD_C_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_C_}</span>
											<script>var arr6 = {$EMPRESA.LOCALIDAD_C_ARR};</script>
											<br>
											<strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocp" data-id="{$EMPRESA.CODIGO_POSTAL_C}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL_C}</span>
										</div>
									</div>
								</div>
								<br>
								<p class="registro-titulo bg-info">Representante Legal</p>
								{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/nom" data-id="{$REPRESENTANTE.NOMBRE}" class="editableFeld">{$REPRESENTANTE.NOMBRE}</span>
										<br>
										<strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/ape" data-id="{$REPRESENTANTE.APELLIDO}" class="editableFeld">{$REPRESENTANTE.APELLIDO}</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}" class="editableFeld">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni1" data-name="RL/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}" class="editableFeld">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
										<script>var tdni1 = {$REPRESENTANTE.TIPO_DOCUMENTO_ARR};</script>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}" class="editableFeld">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
										<br>
										<strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/cuit" data-id="{$REPRESENTANTE.CUIT}" class="editableFeld">{$REPRESENTANTE.CUIT}</span>
									</p>
								</div>
								<br> {/foreach}
								<p class="registro-titulo bg-info">Representante T&eacute;cnico</p>
								{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/nom" data-id="{$REPRESENTANTE.NOMBRE}" class="editableFeld">{$REPRESENTANTE.NOMBRE}</span>
										<br>
										<strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/ape" data-id="{$REPRESENTANTE.APELLIDO}" class="editableFeld">{$REPRESENTANTE.APELLIDO}</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}" class="editableFeld">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni2" data-name="RT/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}" class="editableFeld">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
										<script>var tdni2 = {$REPRESENTANTE.TIPO_DOCUMENTO_ARR};</script>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}" class="editableFeld">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
										<br>
										<strong>Cargo: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cargo" data-id="{$REPRESENTANTE.CARGO}" class="editableFeld">{$REPRESENTANTE.CARGO}</span>
										<br>
										<strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cuit" data-id="{$REPRESENTANTE.CUIT}" class="editableFeld">{$REPRESENTANTE.CUIT}
									</p>
								</div>
								<br> {/foreach}
							</div>
							<div role="tabpanel" class="bs-example tab-pane tabUnique" id="Establecimiento">
								<ul class="nav nav-tabs js-mupe">
								{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
									<li><a  href="#subt_{$ESTABLECIMIENTO.ID}" role="tab" data-toggle="tab">{$ESTABLECIMIENTO.NOMBRE}</a></li>
								{/foreach}
								</ul>
								<div class="tab-content">
									{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
									<div role="tabpanel" class="bs-example tab-pane tabUnique" id="subt_{$ESTABLECIMIENTO.ID}">
										<p>
											<strong>Nombre: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/nomb" data-id="{$ESTABLECIMIENTO.NOMBRE}" class="editableFeld">{$ESTABLECIMIENTO.NOMBRE}</span>
											<br>
											<strong>Tipo: </strong>{$ESTABLECIMIENTO.TIPO_}
											<br>
											<strong>Usuario: </strong>{$ESTABLECIMIENTO.USUARIO}
											<h3 class="bg-warning">
												<strong>CAA: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/caanu" data-id="{$ESTABLECIMIENTO.CAA_NUMERO}" class="editableFeld">{$ESTABLECIMIENTO.CAA_NUMERO}</span>
												<strong>Vencimiento: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/caaven" data-id="{$ESTABLECIMIENTO.CAA_VENCIMIENTO}" class="editableFeld">{$ESTABLECIMIENTO.CAA_VENCIMIENTO}</span>
											 </h3>
										</p>
										<h3 class="bg-warning">
											<strong>Expediente: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exnu" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}" class="editableFeld">{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}</span>
											<strong>A&ntilde;o: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exanio" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}" class="editableFeld">{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</span>
										</h3>
										<strong>Actividad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-type="textarea" data-name="Est/act" data-id="{$ESTABLECIMIENTO.ACTIVIDAD_}" class="editableFeld">{$ESTABLECIMIENTO.ACTIVIDAD_}</span>
										<br>
										<strong>Descripci&oacute;n: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-type="textarea" data-name="Est/desc" data-id="{$ESTABLECIMIENTO.DESCRIPCION}" class="editableFeld">{$ESTABLECIMIENTO.DESCRIPCION}</span>
										<br>
										<strong>Direcci&oacute;n Email: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/email" data-id="{$ESTABLECIMIENTO.EMAIL}" class="editableFeld">{$ESTABLECIMIENTO.EMAIL}</span>

										<hr>
										<div class="row">
											<div class="col-md-4">
												<strong>Domicilio real</strong>
												<br>
												<br>
												<strong>Calle: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/recalle" data-id="{$ESTABLECIMIENTO.CALLE_R}" class="editableFeld">{$ESTABLECIMIENTO.CALLE_R}</span>
												<br>
												<strong>N&uacute;mero: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/renum" data-id="{$ESTABLECIMIENTO.NUMERO_R}" class="editableFeld">{$ESTABLECIMIENTO.NUMERO_R}</span>
												<strong>Piso: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/repiso" data-id="{$ESTABLECIMIENTO.PISO_R}" class="editableFeld">{$ESTABLECIMIENTO.PISO_R}</span>
												<br>
												<strong>Provincia: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="reprov{$ESTABLECIMIENTO.ID}" data-name="Est/reprov" data-id="{$ESTABLECIMIENTO.PROVINCIA_R_ID}" class="editableFeld">{$ESTABLECIMIENTO.PROVINCIA_R_}</span>
												<script>var reprov{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.PROVINCIA_ARR};</script>
												<br>
												<strong>Localidad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="reloc{$ESTABLECIMIENTO.ID}" data-name="Est/reloca1" data-id="{$ESTABLECIMIENTO.LOCALIDAD_R_ID}" class="editableFeld">{$ESTABLECIMIENTO.LOCALIDAD_R_}</span>
												<script>var reloc{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.LOCALIDAD_ARR};</script>
												<br>
												<strong>C. Postal: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/recp" data-id="{$ESTABLECIMIENTO.CODIO_POSTAL}" class="editableFeld">{$ESTABLECIMIENTO.CODIO_POSTAL}</span>
											</div>
											<div class="col-md-4">
												<strong>Domicilio constituido</strong>
												<br>
												<br>
												<strong>Calle: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cacalle" data-id="{$ESTABLECIMIENTO.CALLE_C}" class="editableFeld">{$ESTABLECIMIENTO.CALLE_C}</span>
												<br>
												<strong>N&uacute;mero: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/canum" data-id="{$ESTABLECIMIENTO.NUMERO_C}" class="editableFeld">{$ESTABLECIMIENTO.NUMERO_C}</span>
												<strong>Piso: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/capiso" data-id="{$ESTABLECIMIENTO.PISO_C}" class="editableFeld">{$ESTABLECIMIENTO.PISO_C}</span>
												<br>
												<strong>Provincia: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="caprov{$ESTABLECIMIENTO.ID}" data-name="Est/caprov" data-id="{$ESTABLECIMIENTO.PROVINCIA_C_ID}" class="editableFeld">{$ESTABLECIMIENTO.PROVINCIA_C_}</span>
												<script>var caprov{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.PROVINCIA_C_ARR};</script>
												<br>
												<strong>Localidad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="caloc{$ESTABLECIMIENTO.ID}" data-name="Est/caloca1" data-id="{$ESTABLECIMIENTO.LOCALIDAD_C_ID}" class="editableFeld">{$ESTABLECIMIENTO.LOCALIDAD_C_}</span>
												<script>var caloc{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.LOCALIDAD_C_ARR};</script>
												<br>
												<strong>C. Postal: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cacp" data-id="{$ESTABLECIMIENTO.CODIO_POSTAL_C}" class="editableFeld">{$ESTABLECIMIENTO.CODIO_POSTAL_C}</span>
											</div>
											<div class="col-md-4">
												<strong>Nomenclatura Catastral: </strong>
												<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catacir" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC}</span> -
												<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catasec" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC}</span> -
												<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cataman" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}</span> -
												<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catapar" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}</span> -
												<span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catasup" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</span> &nbsp;&nbsp;&nbsp;&nbsp;
												<br>
												<strong>Habilitaciones: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/nocasub" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUBPARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUBPARC}</span>&nbsp;&nbsp;&nbsp;&nbsp;
											</div>
										</div>
										<br>
										<div id="container_establecimiento_permisos_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}">
											<p class="registro-titulo bg-info">Permisos
												<i class="fa fa-plus-square" style="float:right;cursor:hand;cursor:pointer;"
													onclick="setPermisoEstablecimiento($(this), {$ESTABLECIMIENTO.ID});"
													container="nuevo_permiso_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}"
													data-toggle="modal" data-target="#permisos_popup"></i>
											</p>
											{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
												<div class="bs-example" id="container_residuo_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}_{$PERMISO.RESIDUO}">
													<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
													permiso-id="{$PERMISO.ID}" onclick="borrarPermisoEstablecimiento($(this), {$ESTABLECIMIENTO.ID});" container="container_residuo_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}_{$PERMISO.RESIDUO}" title="Borrar Permiso" rol="{obtener_tipo($ESTABLECIMIENTO.TIPO)}"></i>
													<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso" onclick="setPermisoEstablecimiento($(this), {$ESTABLECIMIENTO.ID},{$PERMISO.ID});" container="container_residuo_{obtener_tipo($ESTABLECIMIENTO.TIPO)}_{$ESTABLECIMIENTO.ID}_{$PERMISO.RESIDUO}"
													data-toggle="modal" data-target="#permisos_popup"></i>
													<p>
														<strong>CSC: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span>
														<br>
														<strong>Descripci&oacute;n: </strong><span>{$PERMISO.RESIDUO_}</span>
														<br>
														{if $ESTABLECIMIENTO.TIPO == 1}
															<strong>Cantidad: </strong>
															<span>{$PERMISO.CANTIDAD}</span>
															<br> 
														{/if}

														{if $ESTABLECIMIENTO.TIPO == 3}
															<strong>Tratamientos: </strong>
															<ul>
																{foreach $PERMISO.TRATAMIENTOS as $TRAT}
																	<li>{$TRAT}</li>
																{/foreach}
															</ul>
														{/if}
													</p>
												</div>
											{/foreach}
										</div> <!-- end div container_establecimiento_permisos -->

										{if $ESTABLECIMIENTO.TIPO == 2}
										<p class="registro-titulo bg-info">Veh&iacute;culos
											<i class="fa fa-plus-square" style="float:right;cursor:hand;cursor:pointer;"
												onclick="setVehiculo($(this), {$ESTABLECIMIENTO.ID});"
												container="nuevo_vehiculo" data-toggle="modal" data-target="#vehiculos_popup"></i>
										</p>
											<div id="container_vehiculos_transportista">
												{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
													<div class="bs-example vehiculos_establecimiento" id="container_vehiculo_{$VEHICULO.ID}">
														<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
															vehiculo-id="{$VEHICULO.ID}" onclick="borrarVehiculo($(this), {$ESTABLECIMIENTO.ID});" container="container_vehiculo_{$VEHICULO.ID}" title="Borrar Veh&iacute;culo"></i>

														<i class="fa fa-key" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Agregar Permiso al Veh&iacute;culo" onclick="setPermisoVehiculo($(this), {$VEHICULO.ID});" container="nuevo_permiso_vehiculo_{$VEHICULO.ID}" establecimiento-id="{$ESTABLECIMIENTO.ID}" data-toggle="modal" data-target="#permisos_vehiculos_popup"></i>

														<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Veh&iacute;culo" onclick="setVehiculo($(this), {$ESTABLECIMIENTO.ID},{$VEHICULO.ID});" container="container_vehiculo_{$VEHICULO.ID}" data-toggle="modal" data-target="#vehiculos_popup"></i>
														<p>
															<strong>Dominio/Matr&iacute;cula: </strong><span>{$VEHICULO.DOMINIO}</span><br>
															<strong>Tipo veh&iacute;culo: </strong><span>{TipoVehiculo::get_descripcion_by_codigo($VEHICULO.TIPO_VEHICULO)}</span><br>
															<strong>Tipo caja: </strong><span>{TipoCaja::get_descripcion_by_codigo($VEHICULO.TIPO_CAJA)}</span><br>
															<strong>Descripci&oacute;n: </strong><span>{$VEHICULO.DESCRIPCION}</span>
														</p>
													</div> <!-- end of container_vehiculo_{$VEHICULO.ID} -->

													<div class="bs-example" id="container_permisos_vehiculo_{$VEHICULO.ID}" style="    margin-left: 35px;">
														<p class="registro-titulo bg-warning">
															<b>Permisos del Veh&iacute;culo:</b>
														</p>
														{foreach $VEHICULO.PERMISOS as $PERMISO}
															<div class="bs-example permisos_vehiculo_{$VEHICULO.ID}" id="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}">
																<p>
																<!-- iconos permisos vehiculos -->
																	<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
																	vehiculo-id="{$VEHICULO.ID}" onclick="borrarPermisoVehiculo($(this), {$PERMISO.ID}, {$VEHICULO.ID});" container="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}" title="Borrar Permiso Veh&iacute;culo" establecimiento-id="{$ESTABLECIMIENTO.ID}"></i>

																	<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso Veh&iacute;culo" onclick="setPermisoVehiculo($(this), {$VEHICULO.ID}, {$PERMISO.ID});" container="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}"
																	establecimiento-id="{$ESTABLECIMIENTO.ID}"
																	data-toggle="modal" data-target="#permisos_vehiculos_popup"></i>

																	<strong>CSC: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span><br>
																	<strong>Descripci&oacute;n: </strong><span>{$PERMISO.RESIDUO_}</span><br>
																	<strong>Cantidad: </strong><span>{$PERMISO.CANTIDAD} kg</span><br>
																	<strong>Estado: </strong><span>{$PERMISO.ESTADO_}</span>

																</p>
															</div>
														{/foreach}
													</div> <!-- end of container_permisos_vehiculo_{$VEHICULO.ID} -->
												{/foreach}
											</div> <!-- end of container_vehiculos_transportista -->
										{/if}

									</div>
									{/foreach}
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
							<button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i></i> Descargar</button>
							<button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
						</div>
					</div>
				</div>
			</div>
			{include file='general/popup.tpl' ID_POPUP='permisos' HIDDEN_INFO='true'}
			{include file='general/popup.tpl' ID_POPUP='vehiculos' HIDDEN_INFO='true'}
			{include file='general/popup.tpl' ID_POPUP='permisos_vehiculos' HIDDEN_INFO='true'}
		</div>
</body>

{literal}
<script>
	var multMenu=false;
	var empresa_id = '{/literal}{$EMPRESA.ID}{literal}';

	$(document).ready(function() {
		$(".validar").click(function() {
			window.location="aceptar.php?id="+empresa_id;
		});

		  $(".descargar").click(function() {
			window.open("descargar.php?id="+empresa_id);
		});

		$(".rechazar").click(function() {
			window.location="rechazar.php?id="+empresa_id;
		});

		$(".js-mupe").find("li").first().addClass("active");
		$("#Establecimiento .tab-content").find(".tab-pane").first().addClass("active");
		$('#linkEst').click(function (e) {
			if(!multMenu) {
				$(".js-mupe").find("li").first().find("a").click();
				multMenu = true;
				$('.js-mupe').bootstrapResponsiveTabs();
				$(".js-mupe").find("li").first().find("a").click();
			}
		});

		$('.editableFeld').each(function() {
			var opts = Array();
			if($(this).data('array')=="1") {
				opts.source = window[$(this).attr('data-values')];
				opts.type = 'select';
				opts.value = $(this).attr('data-id');
			}

			if($(this).attr('data-type')=="textarea") {
				opts.type = 'textarea';
			}
			opts.pk = $(this).attr('data-pk');
			opts.name = $(this).attr('data-name');
			opts.url = 'editField.php';
			opts.emptytext = '';
			opts.success = function(response, newValue) {
				if($(this).data('name')=="Veh/dom") {
					$('#vh2_'+$(this).data('pk')).html(newValue);
				}
				if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
					$(this).parent().parent().find('#callbPerm').html(newValue);
				}

			};
			$(this).editable(opts);
		});
	}); // end of $(document).ready()

	function setPermisoEstablecimiento(obj, establecimiento_id, permiso_id)
	{
		var permiso_id = (typeof permiso_id !== 'undefined') ? permiso_id : null;
		var popup_title = permiso_id ? 'Editar permiso del establecimiento' : 'Agregar permiso al establecimiento';
		var nombre_container = obj.attr('container');

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permisos_establecimiento.php",
		    data: {establecimiento_id: establecimiento_id, permiso_id: permiso_id},
		    dataType: "html",
			success: function(html_response){
				$('#permisos_popup_title').html(popup_title);
				$('#permisos_popup_body').html(html_response);
				$('#permisos_popup_content').width(800);
				$('input#permisos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoEstablecimiento(obj, establecimiento_id)
	{
		var permiso_id = obj.attr('permiso-id');
		var nombre_container = obj.attr('container');
		console.info('nombre_container: '+nombre_container);

		if ( ! esElUnicoResiduo(obj.attr('rol'), establecimiento_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el residuo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permisos_establecimiento.php",
						   data: {accion: "delete", permiso_id: permiso_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								} else {
									BootstrapDialog.alert({
										title: 'No es posible borrar el residuo',
										message: retorno['errores']['delete_error'],
										type: BootstrapDialog.TYPE_DANGER,
									});
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el residuo',
				message: 'No puede eliminar el residuo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible modificar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoResiduo(rol, establecimiento_id)
	{
		var residuos_por_rol = $('div[id^="container_residuo_'+rol+'_'+establecimiento_id+'_"]');
		return residuos_por_rol.length == 1;
	}

	function setVehiculo(obj, establecimiento_id, vehiculo_id)
	{
		var vehiculo_id = (typeof vehiculo_id !== 'undefined') ? vehiculo_id : null;
		var popup_title = vehiculo_id ? 'Editar veh&iacute;culo' : 'Agregar veh&iacute;culo';
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_vehiculo.php",
		    data: {establecimiento_id: establecimiento_id, vehiculo_id: vehiculo_id},
		    dataType: "html",
			success: function(html_response){
				$('#vehiculos_popup_title').html(popup_title);
				$('#vehiculos_popup_body').html(html_response);
				$('#vehiculos_popup_content').width(700);
				$('input#vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarVehiculo(obj, establecimiento_id)
	{
		var vehiculo_id = obj.attr('vehiculo-id');
		var nombre_container_vehiculo = obj.attr('container');
		var nombre_container_permisos_vehiculo = 'container_permisos_vehiculo_'+vehiculo_id;
		console.info("nombre_container_vehiculo: "+nombre_container_vehiculo);
		console.info("nombre_container_permisos_vehiculo: "+nombre_container_permisos_vehiculo);

		if ( ! esElUnicoVehiculo()) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el veh&iacute;culo y sus permisos&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_vehiculo.php",
						   data: {accion: "delete", vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container_vehiculo).remove();
									$("div#"+nombre_container_permisos_vehiculo).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el veh&iacute;culo',
				message: 'No puede eliminar el veh&iacute;culo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoVehiculo()
	{
		return $("div.vehiculos_establecimiento").length == 1;
	}

	function setPermisoVehiculo(obj, vehiculo_id, permiso_vehiculo_id)
	{
		var permiso_vehiculo_id = (typeof permiso_vehiculo_id !== 'undefined') ? permiso_vehiculo_id : null;
		var popup_title = permiso_vehiculo_id ? 'Editar permiso del veh&iacute;culo' : 'Agregar permiso al veh&iacute;culo';
		var establecimiento_id = obj.attr('establecimiento-id');

		// container="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}"
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permiso_vehiculo.php",
		    data: {
		    	establecimiento_id: establecimiento_id,
		    	vehiculo_id: vehiculo_id,
		    	permiso_vehiculo_id: permiso_vehiculo_id
		    },
		    dataType: "html",
			success: function(html_response){
				$('#permisos_vehiculos_popup_title').html(popup_title);
				$('#permisos_vehiculos_popup_body').html(html_response);
				$('#permisos_vehiculos_popup_content').width(700);
				$('input#permisos_vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoVehiculo(obj, permiso_vehiculo_id, vehiculo_id)
	{
		var establecimiento_id = obj.attr('establecimiento-id');
		var nombre_container = obj.attr('container');
		console.info("container permiso vehiculo: "+nombre_container);

		if ( ! esElUnicoPermisoDelVehiculo(vehiculo_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el permiso del veh&iacute;culo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permiso_vehiculo.php",
						   data: {accion: "delete", permiso_vehiculo_id: permiso_vehiculo_id, vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el permiso del veh&iacute;culo',
				message: 'No puede eliminar el permiso del veh&iacute;culo ya que es &uacute;nico que posee. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoPermisoDelVehiculo(vehiculo_id)
	{
		return $("div.permisos_vehiculo_"+vehiculo_id).length == 1;
	}

</script>
{/literal}
</html>
