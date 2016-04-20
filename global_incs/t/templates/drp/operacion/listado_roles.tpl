<html>
	<head>
		<title>Admin - Listado de roles</title>
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
            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> |<a style="color:white;" href="../compartido/mi_cuenta.php">  Mi cuenta </a>|<a style="color:white;" href="../login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
        </div>

		<div id="contenedor-interior">

			<div id="logo" style="width: 100%;">
			<img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" />
			<img style="float: left;margin-left: 120px" src="{$BASE_PATH}/imagenes/logo_mel.gif" />
			<img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" />
			</div>
			<div style="height: 0px;width: 100%;clear:both;"></div>
			<div id="apDiv1">Roles</div>

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
						<div class="tabnueva"><a href="../operacion/listado_roles.php">Roles</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>

						<a href='agregar_rol.php'><img style="float: right;margin-right: 10px;" src="{$BASE_PATH}/imagenes/admin/agregar_usuario.gif" title="Agregar rol" /></a>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>

			<br/>
			<form method='post' action=''>
				<br/>
				<center>
                    <div class="tablaBuscar">Criterio :&nbsp;&nbsp;<input type='text' name='criterio' value=''>&nbsp;&nbsp;<input class="ui-el-minibutton" type='submit' value='buscar'>&nbsp;&nbsp;</div>
				</center>
			</form>
			<br>
			<table width="100%" border="0" cellpadding="5" cellspacing="0" style="font-size: 13px;">
				<tr style="height: 15px;">
					<td bgcolor="#A8D8EA" class="invisible">CODIGO</td>
					<td bgcolor="#A8D8EA" class="td" align="center">DESCRIPCION</td>
					<td bgcolor="#A8D8EA" class="td" align="center">MIEMBROS</td>
					<td bgcolor="#A8D8EA" class="td" align="center">ESTADO</td>
					<td bgcolor="#A8D8EA" align="center">OPCIONES</td>
				</tr>

				{foreach $ROLES as $ROL}
				<tr style="border-bottom:1px solid #A4A4A4; height: 35px;">
					<td class="invisible" id="codigo">{$ROL.CODIGO}</td>
					<td id="descripcion">{$ROL.DESCRIPCION}</td>
					<td id="estado" align="center">{$ROL.MIEMBROS}</td>
					<td id="estado" align="center">{$ROL.ESTADO_}</td>
					{if $ROL.CODIGO eq 0 or $ROL.CODIGO eq 1 or $ROL.CODIGO eq 2}
						<td align="center"></td>
					{else}
						<td align="center">
						<a href='#' id='ref' class='btn_eliminar_usuario' data-contenido="Est&aacute; a punto de eliminar el rol {$ROL.DESCRIPCION}" data-codigo="{$ROL.CODIGO}" codigo="{$ROL.CODIGO}" class="btn-default btn-xs" data-toggle="modal" data-target="#Modal_confirm"><img src="{$BASE_PATH}/imagenes/admin/eliminar.gif" title="Eliminar rol" /></a>
						</td>
					{/if}
				</tr>
				{/foreach}
			</table>
				<div style="margin-top:25px;text-align:center">P&aacute;ginas
	            <table align="center">
					{foreach $PAGINAS as $PAGINA}
						<a href="/operacion/listado.php?p={$PAGINA+1-1}"> {$PAGINA+1} </a>
					{/foreach}
				</table>
				</div>
		</div>
		<br />
		<!-- Modal -->
		<div class="modal fade" id="Modal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	</body>

	{literal}
	<script>
		$(document).ready(function(){
			var registro_actual;

			$('#eliminar').click(function() {
				codigo_actual = $("input#codigo").val();
				
				$.ajax({
				   type: "POST",
				   url: "../operacion/editar_rol.php",
				   data: {accion : 'baja', codigo : codigo_actual},
				   dataType: "text json",
				   success: function(retorno){
								if(retorno['estado'] == 0){
									$("#Modal_confirm").modal('hide');
		        		 			$("#Modal_confirm").on('hidden.bs.modal', function () {
									location.reload();
									})
								}else{
									alert(retorno['errores']['general']);
								}
				   }
				});
			});
		});
	</script>
	<script type="text/javascript">
		$('#Modal_confirm').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var contenido = button.data('contenido');
		  var codigo = button.data('codigo');
		  var modal = $(this);
		  modal.find('.modal-body').text(contenido);
		  modal.find('input#codigo').val(codigo);
		});
	</script>
	{/literal}
<html>

