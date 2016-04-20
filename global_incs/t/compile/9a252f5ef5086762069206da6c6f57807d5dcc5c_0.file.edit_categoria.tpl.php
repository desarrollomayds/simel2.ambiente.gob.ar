<?php /* Smarty version 3.1.27, created on 2016-02-01 15:21:30
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_categoria.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:90300478556afa22a644174_45363799%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a252f5ef5086762069206da6c6f57807d5dcc5c' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_categoria.tpl',
      1 => 1454350336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90300478556afa22a644174_45363799',
  'variables' => 
  array (
    'ROL_ID' => 0,
    'RESIDUO' => 0,
    'COLOR_LINEA' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56afa22a70c1a2_75440675',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56afa22a70c1a2_75440675')) {
function content_56afa22a70c1a2_75440675 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '90300478556afa22a644174_45363799';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>"true"), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios'), 0);
?>


	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>"true"), 0);
?>

</head>

<body style="padding-top:60px;">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


		<div class="main">
			<ol class="breadcrumb">
				<li><a href="abm_alta_codigo_categoria">Listados C&oacute;digo Categor&iacute;a</a></li>
				<li class="active">Listado</li>
			</ol>
			<div class="col-md-4 text-right">
			</div>
			<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
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
										<strong>Codigo: </strong><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>

										<br>
										<strong>Categoria: </strong><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CATEGORIA'];?>

										<br>
										<strong>Descripcion: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
" data-name="Codigo" codigo="<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['codigo'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['DESCRIPCION'];?>
</span>
										<br>
									</p>
						        	 <div class="clear20"></div>
    								<td align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td">
                                    <button type="button" class="btn btn-primary aceptar" codigo="<?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
" value="Aceptar" onclick="aceptarCodigoCategoria();">
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


<?php echo '<script'; ?>
>
	var multMenu=false;
	//var codigo = '<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
';

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
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
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
	<?php echo '</script'; ?>
>
	
</html>
<?php }
}
?>