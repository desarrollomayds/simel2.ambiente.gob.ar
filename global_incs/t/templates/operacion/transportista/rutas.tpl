<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/interior.css"        type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
   <script type="text/javascript">

			function centerPopup(divId){
				var oDiv = $('#'+ divId);

				//var divHeight = oDiv.outerHeight(true);
				//var divWidth  = oDiv.outerWidth(true);
				var divHeight = oDiv.outerHeight();
				var divWidth  = oDiv.outerWidth();
				var windowHeight = $(window).height();
				var windowWidth =  $(window).width();

				oDiv.css({
					'left':  (windowWidth  - divWidth) /2  + $(window).scrollLeft() + 'px',
					'top':   (windowHeight - divHeight) /2 + $(window).scrollTop()  + 'px'
				});

				expand2Window();
			}
			function expand2Window(){

				var myBody = $(window);
				$('#bigscreen').show();
				$('#bigscreen').height( myBody.height() );
				$('#bigscreen').width(  myBody.width() );
				$('#bigscreen').css({
					'top': $(window).scrollTop()  + 'px'
				});

			}

			$(window).resize(function() {
			    if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
				}

			});
			$(window).scroll(function() {
			     if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
			     }
			});

            function cerrar(){
	      $('#bigscreen').css("display","none");
                   $('#div_popup').css("display","none");
                   $('#div_popup_2').css("display","none");
	           $('#div_popup_3').css("display","none");


	}
              function cerraruno(){
	      $('#bigscreen').css("display","none");

	}





        </script>
		<style type="text/css">
		{literal}
			<!--
			#apDiv1 {
				position:relative;
				left:555px;
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
			-->
		</style>
		<style type="text/css">
		<!--
			.style2 {
				color: #66B31C;
				font-weight: bold;
			}
		-->
		{/literal}
		</style>
	</head>

	<body>
            <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

		<div id="contenedor-interior"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">Transportistas<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				<span class="titulos"><br />
					<div id="menu-solapas">
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="creacion_manifiesto.php">Manifiestos</a></div>
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="creacion_manifiesto_multiples.php">Manifiestos mutiples generadores</a></div>
						<div class="tabnueva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="rutas.php">Rutas</a></div>
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="flotas.php">Flotas</a></div>
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="historial_manifiestos.php">Historial de Manifiestos</a></div>
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="manifiestos_ejecutables.php">Manifiestos en Proceso</a></div>
						<div class="tabnuevaInactiva" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
					</div>

					<div style="height:2px; background-color:#5D9E00"></div>
					<br />

					RUTAS
				</span>
				<br />
				<br />

				<table style="color:black;font-size: 12px;text-align: left;" width="911" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_rutas">
					<tr>
						<td height="" bgcolor="#4D90FE" class="invisible">ID</td>
						<td height="" width='800' bgcolor="#4D90FE" class="td">DESCRIPCION</td>
						<td height="" width='50' bgcolor="#4D90FE" class="td">EDITAR</td>
						<td height="" width='50' bgcolor="#4D90FE" class="td">ELIMINAR</td>
					</tr>

					{foreach $RUTAS as $RUTA}
						{if $RUTA@iteration is even by 1}
							{assign var="COLOR_LINEA" value="#EAEAE5"}
						{else}
							{assign var="COLOR_LINEA" value="#F7F7F5"}
						{/if}
					<tr>
						<td width="77" height="20" align="center" valign="middle" bgcolor="{$COLOR_LINEA}" class="invisible" id='id'>{$RUTA.ID}</td>
						<td width="77" height="20" align="left" valign="middle" bgcolor="{$COLOR_LINEA}" class="td">{$RUTA.DESCRIPCION}</td>
                                                <td width="25" align="left" bgcolor="{$COLOR_LINEA}" class="td"><a class='btn_editar_ruta'><img class="hand" src="/imagenes/editar.png" width="24" height="22" /></a></td>
						<td width="25" align="left" bgcolor="{$COLOR_LINEA}" class="td"><a class='btn_borrar_ruta'><img class="hand"  src="/imagenes/borrar.png" width="24" height="22" /></a></td>
					</tr>
					{/foreach}
				</table>

				<table width="911" border="0" cellpadding="5" cellspacing="0" class="tabla">
					<tr>
                                            <td colspan="7" bgcolor="#EAEAE5"><div align="right"><img class="hand" src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_ruta'/></div></td>
					</tr>
				</table>

				<br /><span class="titulos"><br /></span><br />
			</div>
		</div>

		<div id='div_popup' class='invisible'></div>
		<div id='div_popup_2' class='invisible'></div>
		<div id='div_popup_3' class='invisible'></div>

	</body>

	{literal}
	<script>
			var registro_actual;
			var colores         = new Array();

			colores['#A8D8EA'] = '#F7F7F5';
			colores['#EAEAE5'] = '#F7F7F5';
			colores['#F7F7F5'] = '#EAEAE5';

			function agregar_ruta(ruta){
				color = colores[$('#lista_rutas> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td width='77' bgcolor='" + color + "' class='invisible' id='id'>"   + ruta["ID"] + "</td>\
					<td width='77' bgcolor='" + color + "' class='td'>  "                + ruta["DESCRIPCION"] + "</td>\
					<td width='25' align='left' bgcolor='" + color + "' class='td'><a href='#' class='btn_editar_ruta'><img src='/imagenes/editar.png' width='24' height='22' /></a></td>\
					<td width='25' align='left' bgcolor='" + color + "' class='td'><a href='#' class='btn_borrar_ruta'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
				</tr>";

				$('#lista_rutas> tbody:last').append(datos);
			}


			$('#btn_agregar_ruta').click(function() {
				registro_actual = $(this).parent().parent();

				$.ajax({
				   type: "GET",
				   url: "/operacion/transportista/ruta.php",
				   data: {id : registro_actual.find('#id').html()},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
                                        $('#div_popup').css("width","600");
                                              $('#bigscreen').css("display","block");
				centerPopup('div_popup');
				   }
				 });
			})

			$('.btn_editar_ruta').live('click', function() {
				registro_actual = $(this).parent().parent();

				$.ajax({
				   type: "GET",
				   url: "/operacion/transportista/ruta.php",
				   data: {id : registro_actual.find('#id').html(), opcion : 'detalle'},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
                                        $('#div_popup').css("width","600");
                                              $('#bigscreen').css("display","block");
				centerPopup('div_popup');
				   }
				 });
			})

			$('.btn_borrar_ruta').live('click', function() {
				registro_actual = $(this).parent().parent();

				$.ajax({
				   type: "POST",
				   url: "/operacion/transportista/ruta.php",
				   data: {accion : 'baja', id : registro_actual.find('#id').html()},
				   dataType: "text json",
				   success: function(retorno){
					if(retorno['estado'] != 0){
						alert(retorno['general']);
					}else{
						registro_actual.remove();
					}

				   }
				 });
			})


			$('.btn_agregar_resultado_establecimiento').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/establecimiento_ruta.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					agregar_establecimiento_ruta(retorno['datos']);
				}
		   }
		 });
	});
	</script>
	{/literal}
</html>


