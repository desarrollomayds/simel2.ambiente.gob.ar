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
		<title>Mensajes - Bandeja de entrada</title>
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

           <table width="800" border="0" cellpadding="5" cellspacing="0" class="tabla" style="font-size: 13px;text-align: left;">
				<tr style="height: 15px;">
                                    <td bgcolor="#A8D8EA" class="td"><strong>ASUNTO</strong></td>
                                        <td bgcolor="#A8D8EA" style="width: 140px;" class="td"><strong>FECHA MENSAJE</strong></td>
										 <td bgcolor="#A8D8EA" style="width: 140px;" class="td"><strong>ESTADO</strong></td>
				</tr>
            {foreach $MENSAJES as $MENSAJE}
                 <tr class='mensaje'>
              {if $MENSAJE@iteration is even by 1}
               {assign var="COLOR_LINEA" value="#EAEAE5"}
              {else}
               {assign var="COLOR_LINEA" value="#F7F7F5"}
              {/if}
              <td class="hand"  bgcolor="{$COLOR_LINEA}" style='display: none' id='id'>{$MENSAJE.ID}</td>
                  <td class="hand"   bgcolor="{$COLOR_LINEA}">{$MENSAJE.TITULO}</td>
                  <td class="hand"   bgcolor="{$COLOR_LINEA}">{$MENSAJE.FECHA_ENVIO}</td>
				  {IF $MENSAJE.ESTADO == 'p'}
				   <td class="hand"   bgcolor="{$COLOR_LINEA}">NO LE&Iacute;DO</td>
				  {ELSE}
				   <td class="hand"   bgcolor="{$COLOR_LINEA}">LE&Iacute;DO</td>
				  {/IF}

                </tr >
            {/foreach}

			 {foreach $MENSAJESLEIDOS as $MENSAJE}
                 <tr class='mensaje'>
              {if $MENSAJE@iteration is even by 1}
               {assign var="COLOR_LINEA" value="#EAEAE5"}
              {else}
               {assign var="COLOR_LINEA" value="#F7F7F5"}
              {/if}
              <td class="hand"  bgcolor="{$COLOR_LINEA}" style='display: none' id='id'>{$MENSAJE.ID}</td>
                  <td class="hand"   bgcolor="{$COLOR_LINEA}">{$MENSAJE.TITULO}</td>
                  <td class="hand"   bgcolor="{$COLOR_LINEA}">{$MENSAJE.FECHA_ENVIO}</td>
				   {IF $MENSAJE.ESTADO == 'p'}
				   <td class="hand"   bgcolor="{$COLOR_LINEA}">NO LE&Iacute;DO</td>
				  {ELSE}
				   <td class="hand"   bgcolor="{$COLOR_LINEA}">LE&Iacute;DO</td>
				  {/IF}
                </tr >
            {/foreach}
                                </table>
                <div class="clear20"></div>
              <div align='right' style='width: 100%'>
                Paginas :
      				{foreach $PAGINAS as $PAGINA}
      					<a href="/operacion/generador/mensajeria/bandeja_de_entrada.php?p={$PAGINA+1-1}">{$PAGINA+1}</a>&nbsp;
      				{/foreach}
              </div>
            </div>
        </div>
	</body>
	{literal}
  <script>
		$('.mensaje').live('click', function() {
			registro_actual = $(this);

      window.location.replace("visualizar_mensaje.php?id=" + registro_actual.find('#id').html())
		})
  </script>
{/literal}
</html>