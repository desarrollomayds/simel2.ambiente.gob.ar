<html>
	<head>
		<title>{$TITULO}</title>
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



		<style type="text/css">
			{literal}
			<!--
			.td {
				font-size:10px;
				text-align:left;
			}
			-->
			{/literal}
		</style>
		<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
	</head>
	<body style="overflow:hidden;">


		<div style="background-color:#F5F5ED;background-color: #F5F5ED;width: 95%;height: 92%;overflow: auto;padding: 15px;margin: 1%;margin-bottom:25px;">



				{if $RESULTADO|count}

					<br>
					<table border="0" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size:10px;border:solid gray 1px;">
						<tr>
							{foreach item=CAMPO from=$CAMPOS}
								<td style="font-weight:bold;text-align:center;" class="td">{$CAMPO}</td>
							{/foreach}
						</tr>
						{foreach $RESULTADO as $FILA_ACTUAL}
						<tr>
							{foreach $FILA_ACTUAL as $ACTUAL}
								<td class="td" >{$ACTUAL}</td>
							{/foreach}
						</tr>
						{/foreach}
					</table>
				{else}
					<table border="0" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size:10px;border:solid gray 1px;">
						<tr>
							<td style="font-weight:bold;text-align:center;" class="td">No se han encontrando resultados</td>
						</tr>
					</table>
				{/if}



			<!--
			<div style="float:right; margin-top:25px;">P&aacute;ginas
				<table>
					{foreach $PAGINAS as $PAGINA}
						<a href="/operacion/listado.php?p={$PAGINA+1-1}">{$PAGINA+1}</a>&nbsp;
					{/foreach}
				</table>
			</div>
			-->

		</div>

	</body>
<html>
