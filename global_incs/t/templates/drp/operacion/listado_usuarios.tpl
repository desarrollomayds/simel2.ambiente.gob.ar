<html>
	<head>
		<title>Admin - Listado de usuarios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

			{include file='general/logos.tpl'}
			<div id="apDiv1">Usuarios</div>

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
						<div class="tabnueva"><a href="../operacion/listado_usuarios.php">Usuarios</a> </div>
						<div class="tabnuevaInactiva"><a href="../operacion/listado_roles.php">Roles</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>

						<a href='agregar_usuario.php'><img style="float: right;margin-right: 10px;" src="{$BASE_PATH}/imagenes/admin/agregar_usuario.gif" title="Agregar usuario" /></a>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>
			<br/>
			<form method='post' action=''>
				<br/>
				<center>
                    <div class="tablaBuscar">Criterio :&nbsp;&nbsp;<input type='text' name='criterio' value=''>&nbsp;&nbsp;<input class="btn btn-default" type='submit' value='Buscar'>&nbsp;&nbsp;</div>
				</center>
			</form>

			<br>
			<table width="100%" border="0" cellpadding="5" cellspacing="0" style="font-size: 13px;">
				<tr style="height: 15px;">
					<td width=""  bgcolor="#A8D8EA" class="invisible">ID</td>
					<td width=""  bgcolor="#A8D8EA" class="td" align="center">NOMBRE DE USUARIO</td>
					<td width="" bgcolor="#A8D8EA" class="td" align="center">ROL</td>
					<td width="" bgcolor="#A8D8EA" class="td" align="center">ESTADO</td>
					<td width="" bgcolor="#A8D8EA" align="center" colspan="3">OPCIONES</td>
				</tr>

				{foreach $USUARIOS as $USUARIO}

				<tr style="border-bottom:1px solid #A4A4A4; height: 35px;">
					<td class="invisible" id="id">{$USUARIO.ID}</td>
					<td id="login">{$USUARIO.LOGIN}</td>
					<td id="rol" align="center">{$USUARIO.ROL_}</td>
					<td id="estado_" align="center">{$USUARIO.ESTADO_}</td>
                    <td align="center">
                    	<!--<a href='../operacion/editar_usuario.php?id={$USUARIO.ID}'>-->
                    	<a href='../operacion/editar_usuario.php?id={$USUARIO.ID}' class='btn_editar_usuario' data-target="#Modal_editar" data-toggle="modal" data-contenido="Est&aacute; editando los datos del usuario {$USUARIO.LOGIN}" data-id="{$USUARIO.ID}">
                    		<img src="{$BASE_PATH}/imagenes/admin/editar.gif" title="Editar usuario" />
                    	</a>
                    </td>
                    <td align="center">
                    	<a href='#' class='btn_eliminar_usuario' data-target="#Modal_eliminar" data-toggle="modal" data-contenido="Est&aacute; a punto de eliminar al usuario {$USUARIO.LOGIN}" data-id="{$USUARIO.ID}">
                    		<img src="{$BASE_PATH}/imagenes/admin/eliminar.gif" title="Eliminar usuario" />
                    	</a>
                    </td>
                    <td align="center">
                    	<a href='#' class='btn_resetear_usuario' data-target="#Modal_resetear" data-toggle="modal" data-contenido="Est&aacute; a punto de resetar la contrase&ntilde;a del usuario {$USUARIO.LOGIN}" data-id="{$USUARIO.ID}">
                    		<img src="{$BASE_PATH}/imagenes/admin/password.gif" title="Restablecer contrase&ntilde;a" />
                    	</a>
                    </td>
				</tr>
				{/foreach}
			</table>
				<div style="margin-top:25px;text-align:center">P&aacute;ginas
	        <table align="center">
					{foreach $PAGINAS as $PAGINA}
						<a href="{$ADMIN_PATH}/operacion/listado_usuarios.php?p={$PAGINA+1-1}"> {$PAGINA+1} </a>
					{/foreach}
			</table>
			</div>
		</div>
		<br>
		<!-- Modal eliminar-->
		<div class="modal fade" id="Modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header" style="text-align:center">
		        <p><h3>Confimaci&oacute;n de eliminaci&oacute;n</h3></p>
		      </div>
		      <div class="modal-body" style="text-align:center">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
		      </div>
		      	<input type="hidden" id="codigo" name="codigo" value="">
		    </div>
		  </div>
		</div>
		<!-- Modal resetear-->
		<div class="modal fade" id="Modal_resetear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header" style="text-align:center">
		        <p><h3>Restablecer contrase&ntilde;a</h3></p>
		      </div>
		      <div class="modal-body" style="text-align:center">
		      </div>
		      <div class="modal-footer" style="text-align:center">
		      <table border="0" align="center">
		      	<tr>
		      		<td style="padding:10px;">Nueva contrase&ntilde;a</td><td><input type="password" id="pass" name="codigo" value="" required></td>
		      	</tr>
		      	<tr>
		      		<td style="padding:10px;">Repetir contrase&ntilde;a</td><td><input type="password" id="pass_confirm" name="codigo" value="" required></td>
		      	</tr>
		      </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-danger" id="resetear">Restablecer</button>
		      </div>
		      	<input type="hidden" id="codigo_reset" name="codigo_reset" value="">
		    </div>
		  </div>
		</div>
		<!-- Modal editar-->
		<div class="modal fade" id="Modal_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">

		    </div>
		  </div>
		</div>
	</body>

	{literal}
	<script>
		$(document).ready(function(){
			var registro_actual;

			$('#eliminar').click(function() {
				codigo_actual = $("input#codigo").val();

				$.ajax({
				   type: "POST",
				   url: "../operacion/editar_usuario.php",
				   data: {accion : 'baja', id : codigo_actual},
				   dataType: "text json",
				   success: function(retorno){
								if(retorno['estado'] == 0){
									$("#Modal_eliminar").modal('hide');
		        		 			$("#Modal_eliminar").on('hidden.bs.modal', function () {
									location.reload();
									})
								}else{
									alert(retorno['errores']['general']);
								}
				   }
				});
			});
			$('#resetear').click(function() {
				codigo_actual = $("input#codigo_reset").val();
				pass = $("input#pass").val();
				pass_confirm = $("input#pass_confirm").val();

				if ((pass.length < 1) || (pass_confirm.length < 1)){
					mostrarMensaje("exclamation-triangle","Ambos campos son obligatorios","error");
				} else {
					if (pass.length < 6){
						mostrarMensaje("exclamation-triangle","La contrase&ntilde;a debe tener como m&iacute;nimo seis caracteres","error");
					} else {
						if (pass == pass_confirm){
							$.ajax({
							   type: "POST",
							   url: "../operacion/resetear_usuario.php",
							   data: {id : codigo_actual, password: pass},
							   dataType: "text json",
							   success: function(retorno){
											if(retorno['estado'] == 0){
												$("#Modal_resetear").modal('hide');
												mostrarMensaje("","Contrase&ntilde;a actualizada de forma exitosa","success");
											}else{
												alert(retorno['errores']['general']);
											}
							   }
							});
						} else {
							mostrarMensaje("exclamation-triangle","Los campos son distintos","error");
						}
					}
				}
			})
		});
	</script>
	<script type="text/javascript">
		$('#Modal_eliminar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var contenido = button.data('contenido');
		  var id = button.data('id');
		  var modal = $(this);
		  modal.find('.modal-body').text(contenido);
		  modal.find('input#codigo').val(id);
		});
		$('#Modal_resetear').on('show.bs.modal', function (event) {
		  $("input#pass").val("");
		  $("input#pass_confirm").val("");
		  var button = $(event.relatedTarget);
		  var contenido = button.data('contenido');
		  var id = button.data('id');
		  var modal = $(this);
		  modal.find('.modal-body').text(contenido);
		  modal.find('input#codigo_reset').val(id);
		});
		$("#Modal_editar").on("hidden.bs.modal", function(){
		    $('#Modal_editar').removeData('bs.modal');
		});
	</script>
	{/literal}
<html>
