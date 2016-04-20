<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

	<form class="form-inline" id="upload" enctype="multipart/form-data" action="#" method="POST">

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="abm_alta_codigo_categoria.php">Listados C&oacute;digo Categor&iacute;a</a></li>
				<li class="active">Listado</li>
			</ol>

			<div class="table-responsive bs-example" style="font-size: 12px;">
				<form class="form-inline" style="margin-top:20px;">
					<h5><b>Criterio de B&uacute;squeda</b></h5>
					<div class="form-group">
						<label for="exampleInputName2">Criterio&nbsp;</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo" name='criterio' value="{$criterio}">
					</div>
					<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
				</form>
			</div>
			
			<div class="table-responsive bs-example" style="font-size: 12px;">
				<div class="form-group" style="">
					<div class="form-group">	
						<label for="protocolo_id">Agregar C&oacute;digo Categor&iacute;a</label><br />
						<div class="input-group">
							<div class="input-group-addon">C&oacute;digo</div><input type="text" class="form-control" id="codigo" placeholder="C&oacute;digo">
							<div class="input-group-addon">Categor&iacute;a</div><input typ<e="text" class="form-control" id="categoria" placeholder="Categori&iacute;a">
							<div class="input-group-addon">Descripci&oacute;n</div><input type="text" class="form-control" id="descripcion" placeholder="Descripci&oacute;n">
						</div>
					</div>
					<input type="button" class="btn btn-primary" style="margin-top:22px;" value="Agregar" onclick="agregarCodigoCategoria();" />
					<div style="clear:both;"></div>
				</div>
			</div>
			<br>

			{* listado de categorias *}
			{if $residuos|@count > 0}
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoCodigo">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Categor&iacute;a</th>
								<th>Descripci&oacute;n</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							{foreach $residuos as $r}
							<tr>
								<td>{$r->codigo}</td>
								<td>{$r->categoria}</td>
								<td>{$r->descripcion}</td>
								<td align="center" bgcolor="{$COLOR_LINEA}" class="td">
									<button type="button" class="btn_editar_empresa" data-id="{$RESIDUO.codigo}">
										<span class="fa fa-eye"></span>
									</button>
								</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
					{$paginador}
				</div>
			{else}
				<div class="alert alert-info">
					<p>No existen residuos.</p>
				</div>
			{/if}
		</div>

	</form>
</body>

<script>
	$(document).ready(function() {});


	function agregarCodigoCategoria()
	{
		var codigo = $("#codigo").val();
		var categoria = $("#categoria").val();
		var descripcion = $("#descripcion").val();
		var err_msg = '';

		if ( ! codigo.length) {
			err_msg += 'Indique el c&oacute;digo.<br/>';
		}

		if ( ! categoria.length) {
			err_msg += 'Indique la categor&iacute;a.<br/>';
		}

		if ( ! descripcion.length) {
			err_msg += 'Indique la descripc&iacute;on.';
		}

		if (err_msg != '') {
			BootstrapDialog.alert({
				title: 'Errores.',
				message: err_msg,
				type: BootstrapDialog.TYPE_DANGER,
			});

			return false;
		}

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/ajax/ajax_abm_codigo_categoria.php",
			data: {
				codigo: codigo,
				categoria: categoria,
				descripcion: descripcion,
				accion: 'agregar',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Categoría Agregada.');
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: rsp_obj.err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
		
	}

</script>
<script>
		$(document).ready(function(){
			var registro_actual;

			$('#btn_editar_empresa').click(function() {
				registro_actual = $(this).attr("data-id");
				console.log(registro_actual);

				$.ajax({
				   type: "GET",
				   url: "/operacion/cat_residuos_peligrosos.php",
				   data: {codigo : registro_actual},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
</script>
</html>
