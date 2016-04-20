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
			-->
		</style>
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
		{/literal}
<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->
	</head>
	<body>
		<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>	<div id="apDiv1">DRP<br /><br /></div>

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




			</br></br>


<div style="width:100%;height:500px;">
<!-- Link a reportes -->
<div style="width:95%;float:left;text-align:left;">
<h2>Reportes Manifiestos</h2><br/>
<table class="tabla" style="width:100%;" cellspacing="0" cellpadding="5" border="0">
<tr>
<td class="td" style="background-color:#A8D8EA;">Tipo Reporte</td>
<td class="td" style="background-color:#A8D8EA;">Fecha Inicio</td>
<td class="td" style="background-color:#A8D8EA;">Fecha Final</td>
<td class="td" style="background-color:#A8D8EA;">Generar reporte</td>
<td class="td" style="background-color:#A8D8EA;">Descargar Excel</td>
</tr>
<tr>
<td class="td">Usuarios 1</td>
<td class="td"><input type="text" name="fechaInicio"/></td>
<td class="td"><input type="text" name="fechaFinal"/></td>
<td class="td"><img src="/imagenes/report.png"/></td>
<td class="td"><img src="/imagenes/xls.png"/></td>

</tr>
<tr>
<td class="td">Usuarios 1</td>
<td class="td"><input type="text" name="fechaInicio"/></td>
<td class="td"><input type="text" name="fechaFinal"/></td>
<td class="td"><img src="/imagenes/report.png"/></td>
<td class="td"><img src="/imagenes/xls.png"/></td>

</tr>
<tr>
<td class="td">Usuarios 1</td>
<td class="td"><input type="text" name="fechaInicio"/></td>
<td class="td"><input type="text" name="fechaFinal"/></td>
<td class="td"><img src="/imagenes/report.png"/></td>
<td class="td"><img src="/imagenes/xls.png"/></td>

</tr>
<tr>
<td class="td">Usuarios 1</td>
<td class="td"><input type="text" name="fechaInicio"/></td>
<td class="td"><input type="text" name="fechaFinal"/></td>
<td class="td"><img src="/imagenes/report.png"/></td>
<td class="td"><img src="/imagenes/xls.png"/></td>

</tr>
<tr>
<td class="td">Usuarios 1</td>
<td class="td"><input type="text" name="fechaInicio"/></td>
<td class="td"><input type="text" name="fechaFinal"/></td>
<td class="td"><img src="/imagenes/report.png"/></td>
<td class="td"><img src="/imagenes/xls.png"/></td>

</tr>
</table>
</div>


</div>

</div>
		</div>
		<!--<div id='div_registraciones_s'></div>

		</div>-->
	</body>

{literal}
<script>
$(document).ready(function(){
	var labels_registraciones_s = [
									{/literal}
									{foreach $ESTADISTICA_REGISTRACIONES.SEMANALES as $REGISTRACIONES}
										{$REGISTRACIONES.SEMANA},
									{/foreach}
									{literal}
								];

	var datos_registraciones_s = [
									{/literal}
									{foreach $ESTADISTICA_REGISTRACIONES.SEMANALES as $REGISTRACIONES}
										{$REGISTRACIONES.CANTIDAD},
									{/foreach}
									{literal}
								];

	var labels_registraciones_m = [
									{/literal}
									{foreach $ESTADISTICA_REGISTRACIONES.MENSUALES as $REGISTRACIONES}
										{$REGISTRACIONES.MES},
									{/foreach}
									{literal}
								];

	var datos_registraciones_m = [
									{/literal}
									{foreach $ESTADISTICA_REGISTRACIONES.MENSUALES as $REGISTRACIONES}
										{$REGISTRACIONES.CANTIDAD},
									{/foreach}
									{literal}
								];

    var plot1 = $.jqplot('div_registraciones_s', [datos_registraciones_s], {
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true}
        },

        series:[ {label : 'cantidad'} ],

        legend: {
            show: true,
            placement: 'outsideGrid'
        },

		axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: labels_registraciones_s
            },

            yaxis: {
                pad: 1.05,
                tickOptions: {formatString: '%d'}
            }
        }
    });																																									label:'SEMANA'

	});
</script>
{/literal}

<html>
