<?php /* Smarty version 3.1.27, created on 2016-01-14 15:54:27
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_altas_masivas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:900130805697eee30971f8_35286344%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33e6ffd4d7b096f367f736755b3e4e9036072834' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_altas_masivas.tpl',
      1 => 1446062340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '900130805697eee30971f8_35286344',
  'variables' => 
  array (
    'ERRORES' => 0,
    'linea' => 0,
    'err' => 0,
    'err_desc' => 0,
    'field' => 0,
    'success' => 0,
    'failed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5697eee31495a0_17235827',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5697eee31495a0_17235827')) {
function content_5697eee31495a0_17235827 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '900130805697eee30971f8_35286344';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false'), 0);
?>

    <!-- carga de js y files especificos para la seccion -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false'), 0);
?>

</head>
<body style="margin-top:30px">

    <?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


        <div class="main">
            <ol class="breadcrumb">
                <li><a href="#">Altas Masivas</a></li>
                <li class="active">Listado</li>
            </ol>
                <table border='0'>
                <tr><td colspan="2">Carga masiva de establecimientos<button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button></td></tr></table>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['ERRORES']->value) {?>
                    <div class="table-responsive bs-example">
                        <table class="table table-hover table-striped" id="lista_generadores"> 
                            <thead>
                                <th>Linea</th>
                                <th>Estado</th>
                                <th>Descripci&oacute;n</th>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->tpl_vars['ERRORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['err'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['err']->_loop = false;
$_smarty_tpl->tpl_vars['linea'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['linea']->value => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
$foreach_err_Sav = $_smarty_tpl->tpl_vars['err'];
?>
                                    <tr>
                                        <td align="center"><?php echo $_smarty_tpl->tpl_vars['linea']->value;?>
</td>
                                        <td align="center"><?php if ($_smarty_tpl->tpl_vars['err']->value) {?> <b style="color:red;">Revisar informaci&oacute;n</b> <?php } else { ?> <b style="color:green;">Creado correctamente</b> <?php }?></td>
                                        <td align="center">
                                            <?php if ($_smarty_tpl->tpl_vars['err']->value) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['err']->value['empresa']) {?>
                                                    <span style="float:left;">Empresa:</span>
                                                    <div style="clear:both;"></div>
                                                    <div class="errors">
                                                        <ul style="list-style-type: none;">
                                                            <?php
$_from = $_smarty_tpl->tpl_vars['err']->value['empresa'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['err_desc'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['err_desc']->_loop = false;
$_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value => $_smarty_tpl->tpl_vars['err_desc']->value) {
$_smarty_tpl->tpl_vars['err_desc']->_loop = true;
$foreach_err_desc_Sav = $_smarty_tpl->tpl_vars['err_desc'];
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['err_desc']->value) {?>
                                                                    <li><span style="float:left;"><b><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
:</b>&nbsp;<?php echo $_smarty_tpl->tpl_vars['err_desc']->value;?>
</span></li><br />
                                                                <?php }?>
                                                            <?php
$_smarty_tpl->tpl_vars['err_desc'] = $foreach_err_desc_Sav;
}
?>
                                                        </ul>
                                                    </div>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['err']->value['establecimiento']) {?>
                                                    <span style="float:left;">Establecimiento:</span>
                                                    <div style="clear:both;"></div>
                                                    <div class="errors">
                                                        <ul style="list-style-type: none;">
                                                            <?php
$_from = $_smarty_tpl->tpl_vars['err']->value['establecimiento'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['err_desc'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['err_desc']->_loop = false;
$_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value => $_smarty_tpl->tpl_vars['err_desc']->value) {
$_smarty_tpl->tpl_vars['err_desc']->_loop = true;
$foreach_err_desc_Sav = $_smarty_tpl->tpl_vars['err_desc'];
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['err_desc']->value) {?>
                                                                    <li><span style="float:left;"><b><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
:</b>&nbsp;<?php echo $_smarty_tpl->tpl_vars['err_desc']->value;?>
</span></li><br />
                                                                <?php }?>
                                                            <?php
$_smarty_tpl->tpl_vars['err_desc'] = $foreach_err_desc_Sav;
}
?>
                                                        </ul>
                                                    </div>
                                                <?php }?>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['err'] = $foreach_err_Sav;
}
?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-info" role="alert" style="font-weight:bold;">Ingrese el archivo CSV con los establecimientos que desee dar de alta.</div>
                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
                    <?php echo '<script'; ?>
 type="text/javascript">
                    
                        BootstrapDialog.show({
                            title: 'Proceso de archivo',
                            message: '<center>Archivo procesado con exito</center>',
                            buttons: [{
                                label: 'Cerrar',
                                action: function(dialogRef){
                                    dialogRef.close();
                                }
                            }]
                        });
                    
                    <?php echo '</script'; ?>
>
                <?php } elseif ($_smarty_tpl->tpl_vars['failed']->value) {?>
                    <?php echo '<script'; ?>
 type="text/javascript">
                    
                        BootstrapDialog.alert({
                            title: 'Proceso de archivo',
                            message: '<center>Hay l&iacute;neas d&oacute;nde se han encontrado errores. Solucionelos y vuelva a subir las mismas.</center>',
                            type: BootstrapDialog.TYPE_DANGER,
                            buttons: [{
                                label: 'Cerrar',
                                action: function(dialogRef){
                                    dialogRef.close();
                                }
                            }]
                        });
                    
                    <?php echo '</script'; ?>
>
                <?php }?>
        </div>

    </body>
</html>
<?php echo '<script'; ?>
 type="text/javascript">

    $("#cargar_archivo_excel").click(function(){
        var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="listado_altas_masivas.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

        BootstrapDialog.show({
            title: 'Cargar archivo CSV',
            message: $mensaje,
            buttons: [{
                label: 'Cancelar',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }, {
                label: 'Cargar',
                action: function(dialogRef){
                    if ($('[type=file]').val()){
                        var ext = $('[type=file]').val().split('.').pop();
                        if (ext == 'csv'){
                            $("#upload").submit();
                            dialogRef.close();
                        } else {
                            BootstrapDialog.alert({
                                title: 'Informaci&oacute;n',
                                message: 'El archivo seleccionado no es CSV',
                            });
                            return false;
                        }
                    } else {
                        BootstrapDialog.alert({
                            title: 'Informaci&oacute;n',
                            message: 'Debe seleccionar un archivo a cargar',
                        });
                        return false;
                    }
                }
            }]
        });
    });

<?php echo '</script'; ?>
><?php }
}
?>