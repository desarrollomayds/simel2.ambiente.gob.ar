<?php /* Smarty version 3.1.27, created on 2015-11-20 10:43:45
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/seleccion_tipo_manifiesto_slop.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:277836206564f2391cca777_99654395%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2207e656b262f965fd720ce28e25f78a574dd9f' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/seleccion_tipo_manifiesto_slop.tpl',
      1 => 1443651967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277836206564f2391cca777_99654395',
  'variables' => 
  array (
    'PERFIL' => 0,
    'BASE_PATH' => 0,
    'nombre_seccion' => 0,
    'ALERTA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f2391dc5da0_31488439',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f2391dc5da0_31488439')) {
function content_564f2391dc5da0_31488439 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '277836206564f2391cca777_99654395';
if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'generador') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Generadores', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 'operador') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Operadores', null, 0);?>
<?php }?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','cuit'=>'true'), 0);
?>

		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
	</head>

	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
		<div id="contenedor-interior">
			  <?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<div id="apDiv1"><?php echo $_smarty_tpl->tpl_vars['nombre_seccion']->value;?>
</div>

		<div id="contenido-interior">
		<br />
			
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<br/>
			<span class="titulos">
			<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['PERFIL']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			</span>

			<div style="height:2px; background-color:#5D9E00"></div>

			<br />
			<div class="clear20"></div>
			<div id="container">
			<?php if ($_smarty_tpl->tpl_vars['ALERTA']->value['bloqueante'] == 'N' || $_smarty_tpl->tpl_vars['ALERTA']->value['bloqueante'] == '') {?>
				<div class="form-group">
					<label>&#191;Qu&eacute; tipo de Manifiesto SLOP desea generar&#63;</label>
					<div>
						<select class="form-control" name='tipo_slop' id='tipo_slop'>
							<option value='slop' selected>Nuevo Manifiesto SLOP</option>
							<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
								<option value='relacionado'>Nuevo Manifiesto SLOP Relacionado</option>
							<?php }?>
						</select>
					</div>
				</div>

				<input type="hidden" id="perfil" name="perfil" value="<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
"/>

				<div align="right">
					<button type="submit" class="btn btn-success btn-sm" id='btn_crear_manifiesto_slop'>Siguiente</button>
				</div>
			<?php }?>
			</div>
		</div>
		</div>

	</body>




<?php echo '<script'; ?>
 language="javascript">

	$(document).on('click', 'button#btn_crear_manifiesto_slop', function() {

		var perfil = $("input#perfil").val();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/"+perfil+"/manifiestos_slop.php",
			data: {tipo_slop: $("select#tipo_slop").val()},
			success: function(response) {
				if (typeof(response) == 'string') {
			    	document.open();
				    document.write(response);
				    document.close();
			    } else {
				    mostrarMensaje("exclamation-triangle", response.errorMsg, "error");
				}
			}
		});

	});
<?php echo '</script'; ?>
>

</html>
<?php }
}
?>