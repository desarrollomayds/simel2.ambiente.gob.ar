<?php /* Smarty version 3.1.27, created on 2016-02-05 14:12:07
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_altas_tempranas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:120519740456b4d7e71c2f17_47711324%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c9a0bfa0788d8d9c9a8d922546dd88bdf8e245f' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_altas_tempranas.tpl',
      1 => 1444851986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120519740456b4d7e71c2f17_47711324',
  'variables' => 
  array (
    'criterio' => 0,
    'altas_tempranas' => 0,
    'alta_temprana' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4d7e725c6a8_78392116',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4d7e725c6a8_78392116')) {
function content_56b4d7e725c6a8_78392116 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '120519740456b4d7e71c2f17_47711324';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

    <!-- carga de js y files especificos para la seccion -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','filter'=>'true'), 0);
?>

</head>

<body style="margin-top:30px">
<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios'), 0);
?>


<div class="main">
    <ol class="breadcrumb">
        <li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>
        <li class="active">Listado</li>
    </ol>
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    <?php if (count($_smarty_tpl->tpl_vars['altas_tempranas']->value) > 0) {?>
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Establecimiento</th>
                    <th>Sucursal</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
$_from = $_smarty_tpl->tpl_vars['altas_tempranas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['alta_temprana'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['alta_temprana']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['alta_temprana']->value) {
$_smarty_tpl->tpl_vars['alta_temprana']->_loop = true;
$foreach_alta_temprana_Sav = $_smarty_tpl->tpl_vars['alta_temprana'];
?>
                    <tr>
                        <td id="cuit"><?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value->cuit;?>
</td>
                        <td id="razon_social"><?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value->razon_social;?>
</td>
                        <td id="establecimiento"><?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value->establecimiento;?>
</td>
                        <td id="sucursal"><?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value->sucursal;?>
</td>
                        <td id="sucursal"><?php if ($_smarty_tpl->tpl_vars['alta_temprana']->value->tipo == Establecimiento::GENERADOR) {?> Generador <?php } else { ?> Operador <?php }?></td>
                        <td align="center">
                            <button type="button" class="btn btn-info edit" onclick="operarSolicitud(<?php echo $_smarty_tpl->tpl_vars['alta_temprana']->value->establecimiento_id;?>
)" data-toggle="modal" data-target="#cambios_popup">
                                <span class="fa fa-eye"></span>
                            </button>
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['alta_temprana'] = $foreach_alta_temprana_Sav;
}
?>

                </tbody>
            </table>
            <?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            <p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
        </div>
    <?php }?>
</div>
</div>
</body>

    <?php echo '<script'; ?>
>

            function operarSolicitud(establecimientoID)
            {

                $.ajax({
                    type: "GET",
                    url: admin_path+"/operacion/alta_temprana.php",
                    data: {
                        establecimiento: establecimientoID,
                    },
                    dataType: "html",
                    success: function(html_response) {
                        $('#cambios_popup_title').html('Cambios Solicitados');
                        $('#cambios_popup_body').html(html_response);
                        $('#cambios_popup_content').width(800);
                    }
                });

            }

    <?php echo '</script'; ?>
>

</html><?php }
}
?>