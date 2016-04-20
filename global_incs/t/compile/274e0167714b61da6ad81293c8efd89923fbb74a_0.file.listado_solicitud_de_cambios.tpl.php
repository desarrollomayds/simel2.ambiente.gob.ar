<?php /* Smarty version 3.1.27, created on 2015-11-20 10:40:08
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_solicitud_de_cambios.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:645161915564f22b8da09a8_88952361%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '274e0167714b61da6ad81293c8efd89923fbb74a' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_solicitud_de_cambios.tpl',
      1 => 1444851987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '645161915564f22b8da09a8_88952361',
  'variables' => 
  array (
    'criterio' => 0,
    'cambios_solicitados' => 0,
    'cambio_obj' => 0,
    'COLOR_LINEA' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f22b8e8dde8_50133393',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f22b8e8dde8_50133393')) {
function content_564f22b8e8dde8_50133393 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '645161915564f22b8da09a8_88952361';
?>
<!DOCTYPE html>
<html>
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
                <li><a href="listado_solicitud_de_cambios.php">Solicitudes de Cambios</a></li>
                <li class="active">Listado</li>
            </ol>

            <form class="form-inline" style="margin-top:20px;">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            <?php if (count($_smarty_tpl->tpl_vars['cambios_solicitados']->value) > 0) {?>
                <div class="table-responsive bs-example">
                    <table class="table table-hover table-striped" id="listadoPendientes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CUIT</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Establecimiento</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Usuario DRP</th>
                                <th>Procesado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->tpl_vars['cambios_solicitados']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cambio_obj'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cambio_obj']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cambio_obj']->value) {
$_smarty_tpl->tpl_vars['cambio_obj']->_loop = true;
$foreach_cambio_obj_Sav = $_smarty_tpl->tpl_vars['cambio_obj'];
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->id;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->cuit;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->empresa;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->establecimiento;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->fecha_solicitud->format('Y-m-d H:i:s');?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->estado;?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['cambio_obj']->value->usuario_drp) {?> <?php echo Usuario::find($_smarty_tpl->tpl_vars['cambio_obj']->value->usuario_drp)->login;?>
 <?php } else { ?> - <?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['cambio_obj']->value->fecha_procesado) {?> <?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->fecha_procesado->format('Y-m-d H:i:s');?>
 <?php } else { ?> - <?php }?></td>

                                <td align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td">
                                    <button type="button" class="btn btn-info" solicitud-id="<?php echo $_smarty_tpl->tpl_vars['cambio_obj']->value->id;?>
" title="Ver solicitud" onclick="operarSolicitud($(this));" data-toggle="modal" data-target="#cambios_popup">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['cambio_obj'] = $foreach_cambio_obj_Sav;
}
?>
                        </tbody>
                    </table>
                    <?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

                </div>
            <?php } else { ?>

                <div class="alert alert-info">
                    <p>No existen solicitudes de cambios pendientes.</p>
                </div>

            <?php }?>
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios','HIDDEN_INFO'=>'true'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'detalle_establecimiento','HIDDEN_INFO'=>'true'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'detalle_vehiculo','HIDDEN_INFO'=>'true'), 0);
?>


</body>

<?php echo '<script'; ?>
>
    $(document).ready(function() {});

    function operarSolicitud(buttonObj)
    {
        var solicitud_id = buttonObj.attr('solicitud-id');
        console.info("solicitud_id: "+solicitud_id);

        $.ajax({
            type: "GET",
            url: admin_path+"/operacion/set_solicitud_de_cambios.php",
            data: {
                solicitud_id: solicitud_id,
            },
            dataType: "html",
            success: function(html_response) {
                if (html_response != 'error') {
                    $('#cambios_popup_title').html('Cambios Solicitados');
                    $('#cambios_popup_body').html(html_response);
                    $('#cambios_popup_content').width(800);
                    // $('input#cambios_hidden_info').val(nombre_container);
                }
                else {
                    BootstrapDialog.alert({
                        title: 'Ha ocurrido un error.',
                        message: 'No fue posible identificar la solicitud. Por favor contacte al administrador del sitio.',
                        type: BootstrapDialog.TYPE_DANGER,
                    });
                    $('#cambios_popup').modal('hide');
                }
            }
        });
    }
<?php echo '</script'; ?>
>

</html>
<?php }
}
?>