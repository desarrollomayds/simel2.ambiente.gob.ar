<html>
	<head>
		<title>Admin - Bandeja de entrada</title>
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
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a>
			</div>
		</div>

		<div id="contenedor-interior">

			<div id="logo" style="width: 100%;">
			<img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" />
			<img style="float: left;margin-left: 120px" src="{$BASE_PATH}/imagenes/logo_mel.gif" />
			<img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" />
			</div>
			<div style="height: 0px;width: 100%;clear:both;"></div>
			<div id="apDiv1">Mensajes recibidos</div>

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
						<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnueva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>

			</br></br>

			<form method='post' action=''>

				<center>

  <div style="width:800px; background-color: #F5F5ED;margin: auto;">

            <div class="mailMenu" style="margin: auto;">
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;" href="../operacion/bandeja_de_entrada.php">
                    <img src="{$BASE_PATH}/imagenes/Mail-ICONO-recibido.png"/>
                    <strong>Recibidos</strong>

                </a>
                <a id="new_post_label_text" class="new_post_label" style="font-size: 13px;padding-top: 5px;margin-left: 35px;" href="../operacion/bandeja_de_salida.php">
                   <img src="{$BASE_PATH}/imagenes/Mail-ICONO-enviado.png"/>
                    <strong> Enviados</strong>

                </a>
            </div>

            <br/>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" style="font-size: 13px;">
				<tr style="height: 15px;">
					<td bgcolor="#A8D8EA" class="td"><strong>ASUNTO</strong></td>
                                        <td bgcolor="#A8D8EA" class="td" align="center"><strong>FECHA MENSAJE</strong></td>
										 <td bgcolor="#A8D8EA" class="td" align="center"><strong>ESTABLECIMIENTO</strong></td>
										 <td bgcolor="#A8D8EA" class="td" align="center"><strong>TELEFONO</strong></td>
										 <td bgcolor="#A8D8EA" align="center"><strong>E-MAIL</strong></td>

				</tr>

            {foreach from=$MENSAJES key=k item=MENSAJE }
              <tr style="border-bottom:1px solid #A4A4A4; height: 35px;">
              <td class="hand" style='display: none' id='id'>{$MENSAJE.ID}</td>
                  <td class="hand">{$MENSAJE.TITULO}</td>
                  <td class="hand" align="center">{$MENSAJE.FECHA_ENVIO}</td>
				  <td class="hand">{utf8_decode($CONTACTO[$k][0]['NOMBRE'])}</td>
				   <td class="hand" align="center">{$CONTACTO[$k]['contacto']['NUMERO_TELEFONICO']}</td>
				    <td class="hand">{$CONTACTO[$k]['contacto']['DIRECCION_EMAIL']}</td>
                </tr >
            {/foreach}
                </table>
                 
              	<div style="margin-top:25px;">P&aacute;ginas
	            <table align="center">
					{foreach $PAGINAS as $PAGINA}
						<a href="{$ADMIN_PATH}/operacion/bandeja_de_entrada.php?p={$PAGINA+1-1}"> {$PAGINA+1} </a>
					{/foreach}
				</table>
				</div>
        </div></div>
        <br>
    </body>
{literal}
  <script>
		$('.mensaje').live('click', function() {
			registro_actual = $(this);

      window.location.replace("/operacion/visualizar_mensaje.php?id=" + registro_actual.find('#id').html())
		})
  </script>
{/literal}
</html>