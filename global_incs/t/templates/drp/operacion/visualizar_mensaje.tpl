<html>
	<head>
		<title>auditoria - listado de registraciones pendientes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
                <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
<link   rel="stylesheet"       href="/css/newTable.css"         type="text/css" />
<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->


		{literal}
		 <style>
            body {
                background-image: url("/imagenes/fondo_formulario.gif");
                background-repeat: repeat-x;
                color: #333333;
                font-family: Arial,Helvetica,sans-serif;
                font-size: 12px;
                margin: 0;
            }

        </style>
		{/literal}
	</head>
	<body>
		<div id="contenedor-form">

<div id="contenedor-interior"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">DRP<br /></div>
<!--<div id="logo"><img src="/imagenes/logo.gif" width="179" height="83" vspace="5" /></div><div id="apDiv1">Cambios pendientes<br /></div>-->

		<div id="contenido-form">
			<br><br>

			<br/>
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

			<div style="width:800px;height:600px; background-color: #F5F5ED;margin: auto;">
            <br/><br/>
           <div class="mailMenu" style="margin: auto;">
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;" href="/operacion/bandeja_de_entrada.php">
                    <img src="/imagenes/Mail-ICONO-recibido.png"/>
                    <strong>Recibidos</strong>

                </a>
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="/operacion/bandeja_de_salida.php">
                   <img src="/imagenes/Mail-ICONO-enviado.png"/>
                    <strong> Enviados</strong>

                </a>
            </div>

            <br/>
            <table width="800" border="0" cellpadding="5" cellspacing="0" class="tabla" style="font-size: 13px;">
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
                     {if $MENSAJE.SENTIDO == 0}
                    <tr>
                        <td><strong>RESPUESTA:</strong></td>
                        <td> <textarea name="mensaje_cuerpo" id="mensaje_cuerpo" style="height:115px;width: 630px;margin: auto;" class="wide"></textarea>
               </td>
                    </tr>
                     {/if}
                                </table>
                                <div class="clear20"></div>
                                <div style="float: right;">
                                {if $MENSAJE.SENTIDO == 0}
                <input type="submit" class="ui-el-minibutton hand"  style="margin:0px 0px 0px 15px; " value="Responder"  id="btn_enviar" class="generic" name="preview_post">
                <input type="submit" class="ui-el-minibutton hand"  style="margin:0px 0px 0px 15px; " value="Cancelar"  id="btn_cancelar" class="generic" name="preview_post">
                {/if}
                </div>
            </div>
        </div>
            </body>
{literal}
  <script>
		$('#btn_cancelar').click(function() {
			registro_actual = $(this).parent().parent();

      window.location.replace("/operacion/bandeja_de_entrada.php")
		})

  	$('#btn_enviar').click(function() {
  		var campos  = [	'titulo', 'severidad', 'cuerpo', 'general' ];
  		var prefijo = 'mensaje';

  		$.ajax({
  			type: "POST",
  			url: "/operacion/redactar_mensaje.php",
  			data:	{	padre      : $("#mensaje_padre").val(),
    						titulo     : "-",
    						cuerpo     : $("#mensaje_cuerpo").val(),
  					},
  			dataType: "text json",
  			success: function(retorno){
                      console.log(retorno);

  										if(retorno['estado'] == 0){
  											alert("Mensaje enviado correctamente");
                        window.location.replace("/operacion/bandeja_de_entrada.php")
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