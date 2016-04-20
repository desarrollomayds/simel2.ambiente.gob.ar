<html>
	<head>
		<title>Admin - Reportes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' mapa='false'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='false'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/generador.js"></script>
	</head>
	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> |<a style="color:white;" href="../compartido/mi_cuenta.php">  Mi cuenta </a>|<a style="color:white;" href="../login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
        </div>

		<div id="contenedor-interior">

			<div id="logo" style="width: 100%;">
			<img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" />
			<img style="float: left;margin-left: 120px" src="{$BASE_PATH}/imagenes/logo_mel.gif" />
			<img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" />
			</div>
			<div style="height: 0px;width: 100%;clear:both;"></div>
			<div id="apDiv1">Reportes</div>

			<div id="contenido-interior"><br />

<div id="menu-solapas">
				{if $USUARIO.ROL == 1}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-right:5px;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
				{elseif $USUARIO.ROL == 2}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:80px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>
					<div style="width: 20px;"></div>
<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
{elseif $USUARIO.ROL == 0}
				<span class="titulos"><br />
					<div id="menu-solapas">
						<div class="tabnuevaInactiva"><a href="../operacion/listado_usuarios.php">Usuarios</a> </div>
						<div class="tabnuevaInactiva"><a href="../operacion/listado_roles.php">Roles</a></div>
						<div class="tabnueva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>

<div style="width:100%;">
<!-- Link a reportes -->
<div style="width:95%;float:left;text-align:left;">
<h2>Reportes Manifiestos</h2><br/>
<table class="tabla" style="width:100%;" cellspacing="0" cellpadding="5" border="0">
<tr>
<td class="td" style="background-color:#A8D8EA;">Tipo Reporte</td>
<td class="td" style="background-color:#A8D8EA;">Generar reporte</td>
<td class="td" style="background-color:#A8D8EA;">Descargar Excel</td>
</tr>
	<form method="post" action="reportes/reporte_protocolo_manifiestos.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td">

				<span class="puntero" onclick="$('#id_reporte_protocolo_manifiestos').fadeToggle()" >Protocolo de manifiestos</span>
				<div class="nowrap" id="id_reporte_protocolo_manifiestos" style="display:none">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde" class="has_datepicker"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta" class="has_datepicker"/>
				</div>

			</td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>
		<form method="post" action="reportes/reporte_protocolo_certificados.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td" style="width: 560px;">

				<span class="puntero" onclick="$('#id_reporte_protocolo_manifiestos').fadeToggle()" >Protocolo de Certificados</span>
				<div class="nowrap" id="id_reporte_protocolo_manifiestos" style="display:none">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde" class="has_datepicker"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta" class="has_datepicker"/>
				</div>

			</td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_manifiestos_por_estado.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td"  >
				<span class="puntero" onclick="$('#id_reporte_estado_manifiestos').fadeToggle()" >Listado de Manifiestos</span>
				<div class="nowrap" id="id_reporte_estado_manifiestos" style="display:none">
					<span class="campo-titulo" >Estados</span>
					<SELECT name="estado" >
						<option value="TODOS" selected="selected">TODOS</option>
						<option value="SIN_AUTORIZACION"         >FALTA AUTORIZACION DE LAS PARTES</option>
						<option value="AUTORIZADO"               >AUTORIZADO POR LAS PARTES</option>
						<option value="RECIBIDO_OPERADOR"        >RECIBIDO POR LOS OPERADORES</option>
						<option value="TRATADO_OPERADOR"         >TRATADO POR LOS OPERADORES</option>
					</SELECT><br/>
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"  class="has_datepicker"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"  class="has_datepicker"/>
				</div>
			</td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_y.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td" >
				<span class="puntero" onclick="$('#id_reporte_listado_y').fadeToggle()" >Listado de Y's</span>
				<div class="nowrap" id="id_reporte_listado_y" style="display:none">
					<span class="campo-titulo" >LISTADO DE Y</span>
					<SELECT name="residuo" style="width: 220px;" >
						<option value="">TODOS</option>
						{foreach $RESIDUOS as $RESIDUO}
							<option value='{$RESIDUO.CODIGO}' >{$RESIDUO.CODIGO} - {$RESIDUO.DESCRIPCION|truncate:30}</option>
						{/foreach}
					</SELECT><br/>
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"  class="has_datepicker"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"  class="has_datepicker"/>
					<br/>
					<span class="campo-titulo" >ORIGEN:</span>
					<SELECT name="provincia_origen" >
						<option value="">TODOS</option>
						{foreach $PROVINCIAS as $PROVINCIA}
							<option value='{$PROVINCIA.CODIGO}' >{$PROVINCIA.DESCRIPCION}</option>
						{/foreach}
					</SELECT>
					<br/>
					<span class="campo-titulo" >DESTINO:</span>
					<SELECT name="provincia_destino" >
						<option value="">TODOS</option>
						{foreach $PROVINCIAS as $PROVINCIA}
							<option value='{$PROVINCIA.CODIGO}' >{$PROVINCIA.DESCRIPCION}</option>
						{/foreach}
					</SELECT>
				</div>
			</td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_empresas_registradas.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td">
				<span class="puntero" onclick="$('#id_reporte_empresas_registradas').fadeToggle()" >Listado de empresas registradas</span>
				<div class="nowrap" id="id_reporte_empresas_registradas" style="display:none">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"  class="has_datepicker"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"  class="has_datepicker"/>
				</div>
			</td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_establecimientos.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td" >
				<span class="puntero" onclick="$('#id_reporte_establecimientos').fadeToggle()" >Listado de establecimientos</span>
				<div class="nowrap" id="id_reporte_establecimientos" style="display:none">
					<span class="campo-titulo" >CUIT</span><input type="text" name="cuit_empresa"/><br/>
				</div>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="{$BASE_PATH}/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
	</form>

</tr>
</table>

</div>
<div style="clear:both;"></div>

</div>

</div>
		</div>
	</body>

<html>
