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
                <link   rel="stylesheet"       href="/css/newTable.css"         type="text/css" />
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

            body {
                background-image: url("/imagenes/fondo_formulario.gif");
                background-repeat: repeat-x;
                color: #333333;
                font-family: Arial,Helvetica,sans-serif;
                font-size: 12px;
                margin: 0;
            }

        </style>
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

	<body style="text-align: center;">
	  <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

            <div id="login-top" align="center">
			<div style="width:950px" align="right"><strong>Centro de Ayuda</strong> | <a style="color:white;" href=".../{$PERFIL}/mi_cuenta.php">Mi cuenta</a> | <a style="color:white;" href="/login/logout_usuario.php">Cerrar Sesi&oacute;n</a></div>
		</div>

		<div id="contenedor-interior">

                    <div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>
                    <div id="apDiv1">Generadores<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/generador/cabecera2.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				<span class="titulos">
					<br />

					<!-- MENU -->
					<div align="right"><a href="../" ><img width="115" height="27" id="" src="/imagenes/volver_inicio.gif"/></a></div>

					<!-- MENU -->

					<div style="height:2px; background-color:#5D9E00"></div>
				</span>
				<br />

        <div style="width:800px;height:600px; background-color: #F5F5ED;margin: auto;margin-top: 50px;">
        <div class="mailMenu" style="margin: auto;">
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;" href="bandeja_de_entrada.php">
                    <img src="/imagenes/Mail-ICONO-recibido.png"/>
                    <strong>Recibidos</strong>
                </a>
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="bandeja_de_salida.php">
                   <img src="/imagenes/Mail-ICONO-enviado.png"/>
                    <strong> Enviados</strong>
                </a>
                   <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="redactar_mensaje.php">
                   <img src="/imagenes/Mail-ICONO-redactar.png"/>
                    <strong> Redactar</strong>
                </a>
            </div>


            <table width="800" border="0" cellpadding="5" cellspacing="0" class="tabla" style="font-size: 13px;text-align: left;">
                     <input type='hidden' name='mensaje_padre' id='mensaje_padre' value='{$MENSAJE.ID}'>
				<tr style="height: 15px;">
                                    <td colspan="2" bgcolor="#A8D8EA" class="td"><strong>VISTA DE MENSAJE</strong></td>

				</tr>
                                 <tr>
                                     <td style="width: 150px"><strong>TITULO:</strong></td>
                        <td >{$MENSAJE.TITULO}</td>
                    </tr>
                    <tr>
                        <td><strong>FECHA ENVIO:</strong></td>
                        <td> {$MENSAJE.FECHA_ENVIO}</td>
                    </tr>

                    <tr>
                        <td><strong>MENSAJE:</strong></td>
                        <td>{$MENSAJE.CUERPO}</td>
                    </tr>
                     {if $MENSAJE.SENTIDO == 1}
                    <tr>
                        <td><strong>RESPUESTA:</strong></td>
                        <td> <textarea name="mensaje_cuerpo" id="mensaje_cuerpo" style="height:115px;width: 630px;margin: auto;" class="wide"></textarea>
               </td>
                    </tr>
                     {/if}
                                </table>
                                <div class="clear20"></div>
                                <div style="float: right;">
                                {if $MENSAJE.SENTIDO == 1}
                <input type="submit" class="ui-el-minibutton hand"  style="margin:0px 0px 0px 15px; " value="Responder"  id="btn_enviar" class="generic" name="preview_post">
                <input type="submit" class="ui-el-minibutton hand"  style="margin:0px 0px 0px 15px; " value="Cancelar"  id="btn_cancelar" class="generic" name="preview_post">
                {/if}
                </div>

            <br/>


        </div>
            </body>
{literal}
  <script>
		$('#btn_cancelar').click(function() {
			registro_actual = $(this).parent().parent();
                        window.location.replace("bandeja_de_entrada.php");
		});

  	$('#btn_enviar').click(function() {
  		var campos  = [	'titulo', 'severidad', 'cuerpo', 'general' ];
  		var prefijo = 'mensaje';

  		$.ajax({
  			type: "POST",
  			url: "/mensajeria/redactar_mensaje.php",
  			data:	{	padre      : $("#mensaje_padre").val(),
    						titulo     : "-",
    						cuerpo     : $("#mensaje_cuerpo").val(),
  					},
  			dataType: "text json",
  			success: function(retorno){
                      console.log(retorno);

  										if(retorno['estado'] == 0){
  											alert("Mensaje enviado correctamente");
                        window.location.replace("bandeja_de_entrada.php")
  										}else{
  											texto_errores = '';
  											for(campo in campos){
  												campo = campos[campo];

  												if(retorno['errores'][campo] != null){
  													texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
  													$('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
  													$('#' + prefijo + '_' + campo).addClass('error_de_carga');
  												}else{
  													$('#' + prefijo + '_' + campo).removeClass('error_de_carga');
  												}

  												if(texto_errores != ''){
  													$('#sumario_errores_redactar_mensaje td:first').html(texto_errores);
  													$('#sumario_errores_redactar_mensaje').show();
  													;
  												}else{
  													$('#sumario_errores_redactar_mensaje').hide();
  												}
  											}
  										}
  									}

  		 });
  	})

  </script>
{/literal}
</html>
