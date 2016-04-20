<html>
	<head>
		<title>auditoria - listado de registraciones pendientes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.jqplot.js"></script>
		<script type="text/javascript" src="/javascript/jquery.jqplot.plugins/jqplot.barRenderer.min.js"></script>
		<script type="text/javascript" src="/javascript/jquery.jqplot.plugins/jqplot.canvasTextRenderer.min.js"></script>
		<script type="text/javascript" src="/javascript/jquery.jqplot.plugins/jqplot.pointLabels.min.js"></script>

		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery.jqplot.css"   type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
                <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />


		{literal}
		<style type="text/css">
			<!--
			#apDiv1 {
				position:relative;
				left:415px;
				top:44px;
				width:378px;
				height:53px;
				z-index:1;
				background-image: url(/imagenes/cabecera_formulario.gif);
				background-repeat: no-repeat;
				padding-top: 30px;
				padding-left: 30px;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
				color: #FFFFFF;
				text-align: left;
			}
			.style1 {color: #A8D8EA}

			#div_estadistica_registraciones_semanales {
				height: 200px;
				width:  400px;
			}
			.puntero{
				cursor:hand;
				cursor:pointer;
			}
			.nowrap{
				white-space:nowrap;
				background-color: #DEE;
			}
			.campo-titulo{
				width: 150px;
				font-weight: bold;
				display: inline-block;
			}
			-->
		</style>
		<script type="text/javascript" >
			function create_popup(name, width, height){
				window.open('', name, 'width='+width+',height='+height+',status=yes,resizable=yes,scrollbars=yes');
			}
		</script>
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
		{/literal}
<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->
	</head>
	<body>
		<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>
		<div id="apDiv1">DRP<br /><br /></div>

		<div id="contenido-form">
			<br><br><br>
<!--[if IE]>
		<div id="menu-solapas" style="width:900px;">
{if $USUARIO.ROL == 1}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
{elseif $USUARIO.ROL == 2}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>

				<div class="tabnueva" style="width:170px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>

				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>

				<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/reportes.php">Reportes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/reportes.php">Reportes</a></div>
{/if}
			</div>

<div style="border-bottom:1px solid #5D9E00;width:100%;margin-top:-20px;"></div>
<![endif]-->
<!--[if !IE]> -->
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
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				{/if}
			</div>

			<div style="height:2px; background-color:#5D9E00;width:100%;"></div>
<![endif]-->
<!-- <aasdf></aasdf> -->





			</br></br>


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
			<td class="td puntero" onclick="$('#id_reporte_protocolo_manifiestos').fadeToggle()" >Protocolo de manifiestos</td>
			<td class="td" align="center"><input type="image" src="/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
		<tr id="id_reporte_protocolo_manifiestos" style="display:none">
			<td class="td" wrap="nowrap" class="nowrap" colspan="4" >
				<div class="nowrap">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"/>
				</div>
			</td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_manifiestos_por_estado.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td puntero" onclick="$('#id_reporte_estado_manifiestos').fadeToggle()" >Listado de Manifiestos</td>
			<td class="td" align="center"><input type="image" src="/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
		<tr id="id_reporte_estado_manifiestos" style="display:none">
			<td class="td" wrap="nowrap" class="nowrap" colspan="4" >
				<div class="nowrap">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"/><br/>
					<span class="campo-titulo" >Estados</span>
					<SELECT name="estado" >
						<option value="TODOS" selected="selected">TODOS</option>
						<option value="SIN_AUTORIZACION"         >FALTA AUTORIZACION DE LAS PARTES</option>
						<option value="AUTORIZADO"               >AUTORIZADO POR LAS PARTES</option>
						<option value="RECIBIDO_OPERADOR"        >RECIBIDO POR LOS OPERADORES</option>
						<option value="TRATADO_OPERADOR"         >TRATADO POR LOS OPERADORES</option>
					</SELECT>
				</div>
			</td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_y.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td puntero" onclick="$('#id_reporte_listado_y').fadeToggle()" >Listado de Y's</td>
			<td class="td" align="center"><input type="image" src="/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
		<tr id="id_reporte_listado_y" style="display:none">
			<td class="td" wrap="nowrap" class="nowrap" colspan="4" >
				<div class="nowrap">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"/><br/>
					<span class="campo-titulo" >LISTADO DE Y</span>
					<SELECT name="residuo" style="width: 220px;" >
						<option value="">TODOS</option>
						{foreach $RESIDUOS as $RESIDUO}
							<option value='{$RESIDUO.CODIGO}' >{$RESIDUO.CODIGO} - {$RESIDUO.DESCRIPCION|truncate:30}</option>
						{/foreach}
					</SELECT>
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
		</tr>
	</form>
	<form method="post" action="reportes/reporte_empresas_registradas.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td puntero" onclick="$('#id_reporte_empresas_registradas').fadeToggle()" >Listado de empresas registradas</td>
			<td class="td" align="center"><input type="image" src="/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
		<tr id="id_reporte_empresas_registradas" style="display:none">
			<td class="td" wrap="nowrap" class="nowrap" colspan="4" >
				<div class="nowrap">
					<span class="campo-titulo" >Fecha Desde</span><input type="text" name="fecha_desde"/><br/>
					<span class="campo-titulo" >Fecha hasta</span><input type="text" name="fecha_hasta"/>
				</div>
			</td>
		</tr>
	</form>
	<form method="post" action="reportes/reporte_establecimientos.php" target="foo" onSubmit="create_popup('foo', 1024, 500);" >
		<tr>
			<td class="td puntero" onclick="$('#id_reporte_establecimientos').fadeToggle()" >Listado de establecimientos</td>
			<td class="td" align="center"><input type="image" src="/imagenes/report.png" name="ver_reporte"       value="yes" align="center" border="2"/></td>
			<td class="td" align="center"><input type="image" src="/imagenes/xls.png"/   name="descargar_reporte" value="yes" align="center" border="2"/></td>
		</tr>
		<tr id="id_reporte_establecimientos" style="display:none">
			<td class="td" wrap="nowrap" class="nowrap" colspan="4" >
				<div class="nowrap">
					<span class="campo-titulo" >CUIT</span><input type="text" name="cuit_empresa"/><br/>
				</div>
			</td>
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
