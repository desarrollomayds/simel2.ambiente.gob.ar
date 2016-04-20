<?php /* Smarty version 3.1.27, created on 2016-02-01 15:21:27
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/abm_alta_codigo_categoria.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:79552052456afa227d45df4_68712841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23fea4a5a49fb6de9894006bce99063fffb39431' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/abm_alta_codigo_categoria.tpl',
      1 => 1454351030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79552052456afa227d45df4_68712841',
  'variables' => 
  array (
    'criterio' => 0,
    'r' => 0,
    'residuos' => 0,
    'COLOR_LINEA' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56afa227e40555_81862906',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56afa227e40555_81862906')) {
function content_56afa227e40555_81862906 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '79552052456afa227d45df4_68712841';
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

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios'), 0);
?>

</head>

<body style="margin-top:30px">
<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios'), 0);
?>


<div class="main">
    <ol class="breadcrumb">
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Codigos de Categorias</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
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
                    <FORM class="form-inline" method="POST">
                            <input type="hidden" name="accion" value="agregar">
                            <input type="hidden" name="residuo_id" value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
">
                            <button type="submit" class="btn btn-danger">Agregar</button>
                    </FORM>    
                </div>
            </div>
    <br>
    <?php if (count($_smarty_tpl->tpl_vars['residuos']->value) > 0) {?>
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

                <?php
$_from = $_smarty_tpl->tpl_vars['residuos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['r']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
$foreach_r_Sav = $_smarty_tpl->tpl_vars['r'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['r']->value->categoria;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['r']->value->descripcion;?>
</td>
                                <td align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td">
                                    <button type="button" class="btn btn-info edit" codigo="<?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </td>
                        
                        
                            <!--<a href="javascript:void(0)" class="btn btn-danger" onclick="rechazarUsuario(<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
)">Rechazar</a>-->
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['r'] = $foreach_r_Sav;
}
?>

                </tbody>
            </table>
           <?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            <p>No existe residuo con el Codigo solicitado.</p>
        </div>
    <?php }?>
</div>
</div>
</body>

<?php echo '<script'; ?>
>
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

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function() {
        $("#listadoCodigo .edit").each(function() {
            $(this).click(function() {
                window.location = admin_path+"/operacion/edit_categoria.php?id=" + $(this).attr("codigo");

            });
        })
    });
<?php echo '</script'; ?>
>
</html>

</html><?php }
}
?>