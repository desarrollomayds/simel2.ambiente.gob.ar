<?php /* Smarty version 3.1.27, created on 2016-01-26 16:03:20
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/rechazar_usuarios.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:163413502956a7c2f8d5ec06_20931612%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19f2e2b1379efcf22a34d1f147bd12f1eaaf744f' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/rechazar_usuarios.tpl',
      1 => 1453835128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163413502956a7c2f8d5ec06_20931612',
  'variables' => 
  array (
    'criterio' => 0,
    'establecimientos' => 0,
    'e' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a7c2f8e40306_48613177',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a7c2f8e40306_48613177')) {
function content_56a7c2f8e40306_48613177 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '163413502956a7c2f8d5ec06_20931612';
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
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Rechazar Usuario</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="CUIT/N" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    <?php if (count($_smarty_tpl->tpl_vars['establecimientos']->value) > 0) {?>
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
$_from = $_smarty_tpl->tpl_vars['establecimientos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['e']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
$foreach_e_Sav = $_smarty_tpl->tpl_vars['e'];
?>
                    <tr>
                        <td id="usuario"><?php echo $_smarty_tpl->tpl_vars['e']->value->usuario;?>
</td>
                        <td id="nombre"><?php echo $_smarty_tpl->tpl_vars['e']->value->nombre;?>
</td>
                        <td id="tipo"><?php if ($_smarty_tpl->tpl_vars['e']->value->tipo == 1) {?> Generador 
                                        <?php } else { ?> Operador <?php }?></td>
                        <td id="flag"><?php if ($_smarty_tpl->tpl_vars['e']->value->flag == 't') {?> 
                                        <span class="label label-success">Activo</span> 
                                        <?php } else { ?> 
                                        <span class="label label-danger">Rechazado</span> 
                                        <?php }?></td>
                        <td ><?php if ($_smarty_tpl->tpl_vars['e']->value->flag == 't') {?> 
                        <FORM class="form-inline" method="POST">
                            <input type="hidden" name="accion" value="rechazar">
                            <input type="hidden" name="establecimiento_id" value="<?php echo $_smarty_tpl->tpl_vars['e']->value->id;?>
">
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </FORM>    
                        
                        <?php }?>
                            <!--<a href="javascript:void(0)" class="btn btn-danger" onclick="rechazarUsuario(<?php echo $_smarty_tpl->tpl_vars['e']->value->id;?>
)">Rechazar</a>-->
                        </td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['e'] = $foreach_e_Sav;
}
?>

                </tbody>
            </table>
            <!--<?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>
-->
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            <p>No existe establecimiento con el CUIT/Nro solicitado.</p>
        </div>
    <?php }?>
</div>
</div>
</body>

<!--
<?php echo '<script'; ?>
>

    function rechazarUsuario(establecimientoID){
        $.ajax({
            type: "post",
            url: admin_path+"/operacion/rechazar_usuarios.php",
            data: {
                establecimiento_id: establecimientoID,
                accion: rechazar
            },
            dataType: "text json",

            success: function(respuesta) {
                if (respuesta.success) {
                    mostrarMensajeYRedireccionar('Usuario Rechazado Exitosamente !!!');
                } else {
                    BootstrapDialog.alert({
                        title: 'Ha ocurrido un error.',
                        message: 'No se pudo rechazar el ID: ' + respuesta.id,
                        type: BootstrapDialog.TYPE_DANGER,
                    });
                }
            },
            complete:
        });         
    }
<?php echo '</script'; ?>
>
-->

</html><?php }
}
?>