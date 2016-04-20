<?php /* Smarty version 3.1.27, created on 2015-12-09 14:07:06
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_listado_empresas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:139210788856685fba9e04a0_94529764%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34596a72d66b2a918e329ab56ef1ac75e979f741' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_listado_empresas.tpl',
      1 => 1449680783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139210788856685fba9e04a0_94529764',
  'variables' => 
  array (
    'ROL_ID' => 0,
    'EMPRESA' => 0,
    'REPRESENTANTE' => 0,
    'ESTABLECIMIENTO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56685fbad32af5_07269336',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56685fbad32af5_07269336')) {
function content_56685fbad32af5_07269336 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '139210788856685fba9e04a0_94529764';
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

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>"true"), 0);
?>

</head>

<body style="padding-top:60px;">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_empresas.php">Empresas</a></li>
				<li class="active">Detalle</li>
			</ol>
			<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
							<div class="col-md-8">
								<h2>INFORMACI&Oacute;N</h2>
							</div>
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la empresa</a></li>
							<li role="presentation"><a href="#Establecimiento" aria-controls="Establecimiento" role="tab" data-toggle="tab" id="linkEst">Establecimientos</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
								<div class="bs-example">
									<p>
										<strong>Cuit: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>

										<br>
										<strong>Roles: </strong>
										<?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['GENERADOR']) {?> Generador <?php }?> <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['TRANSPORTISTA']) {?> Transportista <?php }?> <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['OPERADOR']) {?> Operador <?php }?>
										<br>
										<strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NOMBRE'];?>

										<br>
										<strong>Fec. Ini. Act: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/fecinact" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>
</span>
										<br>
										<strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/telef" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>
</span>
									</p>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrecalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrenum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrepiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrreofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr1" data-name="Emp/pro1" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_'];?>
</span>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr2" data-name="Emp/loca1" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_'];?>
</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrecp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL'];?>
</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlecalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlenum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlepiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrleofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr3" data-name="Emp/pro2" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_'];?>
</span>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr4" data-name="Emp/loca2" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_'];?>
</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlecp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_L'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_L'];?>
</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcocalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrconum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcopiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcoofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr5" data-name="Emp/pro3" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_'];?>
</span>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr6" data-name="Emp/loca3" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_'];?>
</span>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcocp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_C'];?>
"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_C'];?>
</span>
										</div>
									</div>
								</div>
								<br>
								<p class="registro-titulo bg-info">Representante Legal</p>
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['REPRESENTANTES_LEGALES'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['REPRESENTANTE']->value) {
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = true;
$foreach_REPRESENTANTE_Sav = $_smarty_tpl->tpl_vars['REPRESENTANTE'];
?>
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/nom" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</span>
										<br>
										<strong>Apellido: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/ape" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/fn" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-array="1" data-values="tdni1" data-name="RL/tdni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</span>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/dni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</span>
										<br>
										<strong>Cuit: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/cuit" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</span>
									</p>
								</div>
								<br> <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>
								<p class="registro-titulo bg-info">Representante T&eacute;cnico</p>
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['REPRESENTANTES_TECNICOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['REPRESENTANTE']->value) {
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = true;
$foreach_REPRESENTANTE_Sav = $_smarty_tpl->tpl_vars['REPRESENTANTE'];
?>
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/nom" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</span>
										<br>
										<strong>Apellido: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/ape" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/fn" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-array="1" data-values="tdni2" data-name="RT/tdni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</span>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/dni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</span>
										<br>
										<strong>Cargo: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/cargo" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
</span>
										<br>
										<strong>Cuit: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/cuit" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>

									</p>
								</div>
								<br> <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>
							</div>
							<div role="tabpanel" class="bs-example tab-pane tabUnique" id="Establecimiento">
								<ul class="nav nav-tabs js-mupe">
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['ESTABLECIMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value) {
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = true;
$foreach_ESTABLECIMIENTO_Sav = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO'];
?>
									<li class="est_tab" establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
"><a href="subt_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" role="tab" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</a></li>
								<?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>
								</ul>
								<div style="margin:20px;display:block;" id="establecimiento_loading">
									<i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom"></i>
								</div>
								<div style="display:none;" id="establecimiento_info"></div>
								<!-- aca estaba el content del establecimiento -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'permisos','HIDDEN_INFO'=>'true'), 0);
?>

			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'vehiculos','HIDDEN_INFO'=>'true'), 0);
?>

			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'permisos_vehiculos','HIDDEN_INFO'=>'true'), 0);
?>

		</div>
</body>


<?php echo '<script'; ?>
>
	var multMenu=false;
	var empresa_id = '<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
';

	$(document).ready(function() {

		$(".js-mupe").find("li").first().addClass("active");

		// ajax call para obtener info de establecimientos.
		$(".est_tab").on("click", function() {
			var establecimiento_id = $(this).attr('establecimiento-id');
			console.info("establecimiento_id : " + establecimiento_id);
			$('div#establecimiento_info').hide();
			$("div#establecimiento_loading").show();

			$.ajax({
				type: "GET",
				url: admin_path+"/operacion/ajax/ajax_obtener_informacion_establecimiento.php",
				data: {establecimiento_id: establecimiento_id},
				dataType: "html",
				success: function(html_response){
					$('#establecimiento_info').html(html_response);
					$('div#establecimiento_loading').hide();
					$("div#establecimiento_info").show();
				}
			});
		});


	}); // end of $(document).ready()

<?php echo '</script'; ?>
>

</html>
<?php }
}
?>