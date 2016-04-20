{if $PERFIL == 'generador'}
  {assign var=nombre_seccion value='Generadores'}
{elseif $PERFIL == 'transportista'}
  {assign var=nombre_seccion value='Transportistas'}
{elseif $PERFIL == 'operador'}
  {assign var=nombre_seccion value='Operadores'}
{/if}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Mensajes - Redactar mensaje</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' progressButton='true' chosen='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true' progressButton='true' chosen='true'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
	</head>

	<body style="text-align: center;">
	  <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

    <div id="login-top" align="center">
      <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
      </div>
    </div>

		<div id="contenedor-interior"><div id="logo" style="width: 100%;"> <img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
		<div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">{$nombre_seccion}<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				<span class="titulos">
					<br />

					<!-- MENU -->
					<div align="right"><a href="../" ><img width="115" height="27" id="" src="{$BASE_PATH}/imagenes/volver_inicio.gif"/></a></div>

					<!-- MENU -->

					<div style="height:2px; background-color:#5D9E00"></div>
				</span>
				<br />

        <div style="width:800px;height:600px; background-color: #F5F5ED;margin: auto;margin-top: 50px;">
            <div class="mailMenu" style="margin: auto;">
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;" href="bandeja_de_entrada.php">
                    <img src="{$BASE_PATH}/imagenes/Mail-ICONO-recibido.png"/>
                    <strong>Recibidos</strong>
                </a>
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="bandeja_de_salida.php">
                   <img src="{$BASE_PATH}/imagenes/Mail-ICONO-enviado.png"/>
                    <strong> Enviados</strong>
                </a>
                   <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="redactar_mensaje.php">
                   <img src="{$BASE_PATH}/imagenes/Mail-ICONO-redactar.png"/>
                    <strong> Redactar</strong>
                </a>
            </div>

            <br/>
          <table width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size: 13px;text-align: left;">
				<tr style="height: 15px;">

                                    <td colspan="2" width=""  bgcolor="#A8D8EA" class="td"><strong>REDACTAR MENSAJE</strong></td>
				</tr>
                            <tr>
                                <td bgcolor="EAEAE5" class="td" >ASUNTO:</td>
                                <td bgcolor="EAEAE5" class="td" > &nbsp;&nbsp;&nbsp;<input type='text' id="mensaje_titulo" name="mensaje_titulo" value="" style="width: 600px;" /></td>
                                </tr>
                                <tr>
                                     <td bgcolor="EAEAE5" class="td" >MENSAJE:</td>
                                <td bgcolor="EAEAE5" class="td" > &nbsp;&nbsp;&nbsp;<textarea type='text'  id="mensaje_cuerpo" name="mensaje_cuerpo" value=""  style="width: 600px;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;
                                    </td>
                                    <td><input type='submit' name='btn_enviar' class="ui-el-minibutton hand" id='btn_enviar' style="float: right;" value='Enviar Mensaje'/></td>
                                </tr>
                                </table>
        </div>
            </body>
{literal}

  <script>
	var rol = '{/literal}{$PERFIL}{literal}';

	$('#btn_cancelar').click(function() {
    	window.location.replace(mel_path+"/"+rol+"/mensajeria/bandeja_de_entrada.php")
	})

  	$('#btn_enviar').click(function() {
  		var campos  = [	'titulo', 'severidad', 'cuerpo', 'general' ];
  		var prefijo = 'mensaje';

  		$.ajax({
  			type: "POST",
  			url: mel_path+"/operacion/"+rol+"/mensajeria/redactar_mensaje.php",
  			data:	{	titulo     : $("#mensaje_titulo").val(),
    						cuerpo     : $("#mensaje_cuerpo").val()
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
