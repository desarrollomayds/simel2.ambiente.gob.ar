<?php /* Smarty version 3.1.27, created on 2016-03-28 18:18:55
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_registros_rechazados.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:100308883556f99fbf738465_29046926%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b25fb0f6b1ea8fdb38ed5a98acf1e560185b2f6e' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_registros_rechazados.tpl',
      1 => 1444851987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100308883556f99fbf738465_29046926',
  'variables' => 
  array (
    'RECHAZADOS' => 0,
    'COLOR_LINEA' => 0,
    'RECHAZADO' => 0,
    'PAGINADOR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f99fbf911be3_51843721',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f99fbf911be3_51843721')) {
function content_56f99fbf911be3_51843721 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '100308883556f99fbf738465_29046926';
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
                <li><a href="listado_registros_rechazados.php">Registraciones Rechazadas</a></li>
                <li class="active">Listado</li>
            </ol>
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' >
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            <?php if (count($_smarty_tpl->tpl_vars['RECHAZADOS']->value) > 0) {?>
                <div class="table-responsive bs-example">
                    <table class="table table-hover table-striped" id="listadoPendientes">
                        <thead>
                            <tr>
                                <th>Raz&oacute;n social</th>
                                <th>Cuit</th>
                                <th>Roles</th>
                                <th>Domicilio Real</th>
                                <th>Nro. de solicitud</th>
                                <th>Fecha de inscripci&oacute;n</th>
                                <th><center>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
$_from = $_smarty_tpl->tpl_vars['RECHAZADOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RECHAZADO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RECHAZADO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['RECHAZADO']->value) {
$_smarty_tpl->tpl_vars['RECHAZADO']->_loop = true;
$foreach_RECHAZADO_Sav = $_smarty_tpl->tpl_vars['RECHAZADO'];
?>
                            <tr>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="nombre"><?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->nombre;?>
</td>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="cuit"><?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->cuit;?>
</td>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="roles">
                                    <?php if ($_smarty_tpl->tpl_vars['RECHAZADO']->value->rol_generador) {?>&nbsp;G&nbsp;<?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['RECHAZADO']->value->rol_transportista) {?>&nbsp;T&nbsp;<?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['RECHAZADO']->value->rol_operador) {?>&nbsp;O&nbsp;<?php }?>
                                </td>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="dom_"><?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->calle;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->numero;?>
</td>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="id_"><?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->id;?>
</td>
                                <td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="cuit"><?php if ($_smarty_tpl->tpl_vars['RECHAZADO']->value->fecha_inscripcion) {?> <?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->fecha_inscripcion->format('Y-m-d');?>
 <?php }?></td>
                                <td align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td">
                                    <button type="button" class="btn btn-info edit" onclick="habilitar(<?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->id;?>
);" data-id="<?php echo $_smarty_tpl->tpl_vars['RECHAZADO']->value->id;?>
">
                                        Volver a pendiente
                                    </button>
                                </td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['RECHAZADO'] = $foreach_RECHAZADO_Sav;
}
?>

                        </tbody>
                    </table>
                    <?php echo $_smarty_tpl->tpl_vars['PAGINADOR']->value;?>

                </div>
            <?php } else { ?>

                <div class="alert alert-info">
                    <p>En estos momentos no hay rechazados.</p>
                </div>

            <?php }?>
        </div>
    </div>
</body>

<?php echo '<script'; ?>
 type="text/javascript">

    function habilitar(id){
            BootstrapDialog.show({
            title: 'Volver a pendiente',
            message: '<center>Esta seguro de volver este registro a estado pendiente?',
            buttons: [{
                    label: 'No, cancelar',
                    action: function(dialog) {
                        dialog.close();
                    }
                }, {
                    label: 'Si, volver a pendiente',
                    action: function(dialog) {
                        $.ajax({
                           type: "POST",
                           url: admin_path+"/operacion/listado_registros_rechazados.php",
                           data: {accion : "volver", id : id},
                           dataType: "text json",
                           success: function(retorno){
                                if(retorno['error']){
                                alert(retorno['error']);
                                }else{
                                    BootstrapDialog.show({
                                    title: 'Informaci&oacute;n',
                                    message: '<center>Operaci&oacute; exitosa',
                                    buttons: [{
                                        label: 'Cerrar',
                                        cssClass: 'btn-primary',
                                        action: function(){
                                            BootstrapDialog.closeAll();
                                            $(location).attr('href', admin_path+'/operacion/listado_registros_rechazados.php');
                                        }
                                    }]
                                });
                                }
                            }
                        });
                    }
                }]
        });
    }

<?php echo '</script'; ?>
>

</html><?php }
}
?>