<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
	{include file='general/popup.tpl' ID_POPUP='cambios'}

	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' chosen="true"}
</head>

<body style="padding-top:60px;">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="abm_alta_codigo_categoria">Listados C&oacute;digo Categor&iacute;a</a></li>
				<li class="active">Listado</li>
			</ol>
			<div class="col-md-4 text-right">
			</div>
			<input id="rol_id" type="hidden" value="{$ROL_ID}">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la categoria</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
								<div class="bs-example">
									<p>
										<strong>Codigo: </strong>{$RESIDUO.CODIGO}
										<br>
										<strong>Categoria: </strong>{$RESIDUO.CATEGORIA}
										<br>
										<strong>Descripcion: </strong><span data-pk="{$RESIDUO.CODIGO}" data-name="Codigo" codigo="{$RESIDUO.codigo}" class="editableFeld">{$RESIDUO.DESCRIPCION}</span>
										<br>
									</p>
						        	 <div class="clear20"></div>
    								<td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-primary aceptar" codigo="{$r->codigo}" value="Aceptar" onclick="aceptarCodigoCategoria();">
                                    </button>
                       				 </td>
        						</div>
        
            
        					</div>
    					</div>

    				<div class="clear20"></div>

								</div>
							</div>
					</div>
			   	</div>
			</div>
</body>

{literal}
<script>
	var multMenu=false;
	//var codigo = '{/literal}{$RESIDUO.CODIGO}{literal}';

	//$(document).ready(function() {
		$(".validar").click(function() {
			window.location="aceptar.php?id="+codigo;
			
		});

		$(".rechazar").click(function() {
			window.location="rechazar.php?id="+codigo;
		});


		$('.editableFeld').each(function() {
			var opts = Array();
			if($(this).data('array')=="1") {
				opts.source = window[$(this).attr('data-values')];
				opts.type = 'select';
				opts.value = $(this).attr('codigo');
			}

			if($(this).attr('data-type')=="textarea") {
				opts.type = 'textarea';
			}
			opts.pk = $(this).attr('data-pk');
			opts.name = $(this).attr('data-name');
			opts.url = admin_path+"/operacion/edit_categoria.php",
			opts.emptytext = '';
			opts.success = function(response, newValue) {
				if($(this).data('name')=="codigo") {
					$('#residuo'+$(this).data('descripcion')).html(newValue);
				}

				if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
					$(this).parent().parent().find('#callbPerm').html(newValue);
				}

			};
			$(this).editable(opts);
		});
	//}); // end of $(document).ready()
</script>

<script>
		function aceptarCodigoCategoria() {
			var campos  = ['codigo','categoria'	'descripcion' ];

						
            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/abm_alta_codigo_categoria.tpl",
                data: {
                    //form_values,
                    
                    codigo: $('#codigo').val()
                    categoria: $('#categoria').val()
                    descripcion: $('#descripcion').val()
                    accion: "aceptar",
                         },
                dataType: "text json",
                
                success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Categoría Modificada.');
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: rsp_obj.err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
			 });
		};
	</script>
	{/literal}
</html>
