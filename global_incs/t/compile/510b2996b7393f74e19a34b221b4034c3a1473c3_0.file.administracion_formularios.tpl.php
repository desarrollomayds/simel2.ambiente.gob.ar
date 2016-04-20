<?php /* Smarty version 3.1.27, created on 2016-02-05 14:32:16
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/administracion_formularios.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:124779743956b4dca02c7221_00546313%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '510b2996b7393f74e19a34b221b4034c3a1473c3' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/administracion_formularios.tpl',
      1 => 1444851986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124779743956b4dca02c7221_00546313',
  'variables' => 
  array (
    'CRITERIO' => 0,
    'FORMULARIOS' => 0,
    'FORMULARIO' => 0,
    'PAGINADOR' => 0,
    'MOSTRAR_ALERTAS' => 0,
    'ERROR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4dca03cf4b6_86014328',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4dca03cf4b6_86014328')) {
function content_56b4dca03cf4b6_86014328 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '124779743956b4dca02c7221_00546313';
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
                <li><a href="#">Formularios</a></li>
                <li class="active">Listado</li>
            </ol>

            <div class="alert alert-info" role="alert" style="font-weight:bold;">
                * Tenga en cuenta que la carga de formularios es acumulativa por establecimiento. Si ud agrega manifiestos a un establecimiento, las manifiestos anteriores se mantienen y se suman los nuevos.</a>
            </div>

            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n Social o CUIT" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['CRITERIO']->value;?>
">
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
                <table border='0'>
                    <tr>
                        <td colspan="2">Proceso de Formularios<button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="table-responsive bs-example">
                    <table border='0' class="table table-hover table-striped">
                        <tr>
                            <td class="bg-info" align="center">Raz&oacute;n Social</td>
                            <td class="bg-info" align="center">Usuario del establecimiento</td>
                            <td class="bg-info" align="center" height="35">Cantidad de formularios</td>
                            <td class="bg-info" align="center" height="35">Fecha de registraci&oacute;n</td>
                    <?php if ($_smarty_tpl->tpl_vars['FORMULARIOS']->value['error']) {?>
                        <tr><td colspan="6" height="35" align="center">No se han encontrado formularios</td></tr>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['FORMULARIOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['FORMULARIO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['FORMULARIO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['FORMULARIO']->value) {
$_smarty_tpl->tpl_vars['FORMULARIO']->_loop = true;
$foreach_FORMULARIO_Sav = $_smarty_tpl->tpl_vars['FORMULARIO'];
?>
                        <tr>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['FORMULARIO']->value->razon_social;?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['FORMULARIO']->value->usuario;?>
</td>
                            <td align="center"><?php echo $_smarty_tpl->tpl_vars['FORMULARIO']->value->cantidad;?>
</td>
                            <td align="center"><?php if ($_smarty_tpl->tpl_vars['FORMULARIO']->value->fecha_registracion) {?> <?php echo $_smarty_tpl->tpl_vars['FORMULARIO']->value->fecha_registracion->format('Y-m-d');?>
 <?php } else { ?> &nbsp;-&nbsp;<?php }?></td>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['FORMULARIO'] = $foreach_FORMULARIO_Sav;
}
?>
                    <?php }?>
                    </table>
                </div>
                <?php echo $_smarty_tpl->tpl_vars['PAGINADOR']->value;?>


                <?php if ($_smarty_tpl->tpl_vars['MOSTRAR_ALERTAS']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['ERROR']->value) {?>
                        <?php echo '<script'; ?>
 type="text/javascript">
                        
                            BootstrapDialog.alert({
                                title: 'Ha ocurrido un error.',
                                message: '<?php echo $_smarty_tpl->tpl_vars['ERROR']->value['descripcion'];?>
',
                                type: BootstrapDialog.TYPE_DANGER,
                            });
                        
                        <?php echo '</script'; ?>
>
                    <?php } else { ?>
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
                    <?php }?>
                <?php }?>
        </div>

    </body>
</html>
<?php echo '<script'; ?>
 type="text/javascript">

    $("#cargar_archivo_excel").click(function(){
        var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="administracion_formularios.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

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