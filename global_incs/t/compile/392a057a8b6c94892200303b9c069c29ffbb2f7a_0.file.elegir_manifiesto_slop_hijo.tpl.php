<?php /* Smarty version 3.1.27, created on 2016-04-04 16:42:30
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/elegir_manifiesto_slop_hijo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1099057945702c3a6cd4e73_58514533%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '392a057a8b6c94892200303b9c069c29ffbb2f7a' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/elegir_manifiesto_slop_hijo.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1099057945702c3a6cd4e73_58514533',
  'variables' => 
  array (
    'PERFIL' => 0,
    'BASE_PATH' => 0,
    'nombre_seccion' => 0,
    'tipo_manifiesto' => 0,
    'manifiestos_en_los_que_participo' => 0,
    'manif' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5702c3a6e62e63_04997914',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5702c3a6e62e63_04997914')) {
function content_5702c3a6e62e63_04997914 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1099057945702c3a6cd4e73_58514533';
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
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','progressButton'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','cuit'=>'true','progressButton'=>'true','filter'=>'true'), 0);
?>

		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/transportista.js"><?php echo '</script'; ?>
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

			
			<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="<?php echo $_smarty_tpl->tpl_vars['tipo_manifiesto']->value;?>
"/>

			<div class="clear20"></div>
			<div class="titulo_manifiesto">Creaci&oacute;n manifiesto SLOP Relacionado</div>

			<strong>Manifiestos Padre en los que participa:</strong>

			<?php if ($_smarty_tpl->tpl_vars['manifiestos_en_los_que_participo']->value) {?>
				<table class="table table-hover table-bordered">
					<tr>
						<td class="invisible">ID</td>
						<td>ID Protocolo</td>
						<td>Empresa Naviera</td>
						<td>Buque</td>
						<td>Crear Relaci&oacute;n</td>
					</tr>
					<?php
$_from = $_smarty_tpl->tpl_vars['manifiestos_en_los_que_participo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['manif'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['manif']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['manif']->value) {
$_smarty_tpl->tpl_vars['manif']->_loop = true;
$foreach_manif_Sav = $_smarty_tpl->tpl_vars['manif'];
?>
	  					<tr>
	  						<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['manif']->value->id;?>
</td>
	  						<td><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['manif']->value->id_protocolo_manifiesto);?>
</td>
	  						<td><?php echo $_smarty_tpl->tpl_vars['manif']->value->empresa_naviera;?>
</td>
	  						<td><?php echo $_smarty_tpl->tpl_vars['manif']->value->buque;?>
</td>
	  						<td><i class="fa fa-plus-circle hand" style="margin-left:30px;" data-toggle="modal" data-target="#mel_popup" onclick="generarManifiestoRelacionado(<?php echo $_smarty_tpl->tpl_vars['manif']->value->id_protocolo_manifiesto;?>
);"></i></td>
	  					</tr>
					<?php
$_smarty_tpl->tpl_vars['manif'] = $foreach_manif_Sav;
}
?>
				</table>
			<?php } else { ?>
				A&uacute;n no ha participado en un manifiesto SLOP.
			<?php }?>

			<div class="clear20"></div>
			
			<div style="">			
				<form class="form-inline">
					<div class="form-group">
						<label>Buscar por ID de protocolo</label>
						<input type="text" class="form-control input_numerico" placeholder="Nro protocolo" name="nro_protocolo" id="nro_protocolo">
						<button class="btn btn-default" type="button" onclick="generarManifiestoRelacionado();">Buscar</button>
					</div>
				</form>
			</div>
			<div class="clear20"></div>
		</div>

	</body>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>




<?php echo '<script'; ?>
 language="javascript">

	// lo hago dinamico aunque solo el transportista puede generar slop hijos.
	var perfil = '<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
';

	$('input#nro_protocolo').filter_input({regex:'[0-9]'});

	function generarManifiestoRelacionado(nro_protocolo)
	{
		var nro_protocolo = (typeof nro_protocolo !== 'undefined') ? nro_protocolo : $("input#nro_protocolo").val();
		
		if (nro_protocolo != '') {
			// console.info("popupManifiestoHijo. Manif. Padre protocolo: "+nro_protocolo);
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/"+perfil+"/manifiestos_slop.php",
				data: {tipo_slop: 'relacionado', action: 'create', protocolo_id: nro_protocolo},
				success: function(response) {
					if (typeof(response) == 'string') {
						$('#mel_popup').modal('show');
						$('#mel_popup_title').html("Crear SLOP Relacionado");
						$('#mel_popup_body').html(response);
						$('#mel_popup_content').width(750);
					} else {
						$('#mel_popup').modal('hide');
						mostrarMensaje("exclamation-triangle", response.errorMsg, "error");
					}
				}
			});
		} else {
			mostrarMensaje("exclamation-triangle", "Especifique el nro de protocolo a buscar","error");
		}
	}

<?php echo '</script'; ?>
>

</html>
<?php }
}
?>