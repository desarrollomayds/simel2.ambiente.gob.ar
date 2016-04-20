<?php /* Smarty version 3.1.27, created on 2016-02-05 11:04:35
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_cat_residuos_peligrosos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:113132453456b4abf354c6c9_81075139%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '246d92d19294c9371cd1308e9dd1c2d231d597c2' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_cat_residuos_peligrosos.tpl',
      1 => 1454681162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113132453456b4abf354c6c9_81075139',
  'variables' => 
  array (
    'criterio' => 0,
    'residuos' => 0,
    'r' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4abf37a91a8_49692990',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4abf37a91a8_49692990')) {
function content_56b4abf37a91a8_49692990 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '113132453456b4abf354c6c9_81075139';
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
        <li><a href="listado_cat_residuos_peligrosos.php">Codigos Categorias Residuos</a></li>
        <li class="active">Listado</li>
    </ol>
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    <?php if (count($_smarty_tpl->tpl_vars['residuos']->value) > 0) {?>
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoCodigos">
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
                        
                        
                        <td align="center">
                            <button type="button" class="btn btn-info edit" onclick="operarSolicitud(<?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
)" data-toggle="modal" data-target="#cambios_popup">
                                <span class="fa fa-eye"></span>
                            </button>
                        </td>
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
            <p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
        </div>
    <?php }?>
</div>
</div>
</body>

    <?php echo '<script'; ?>
>

            function operarSolicitud(codigo)
            {

                $.ajax({
                    type: "GET",
                    url: admin_path+"/operacion/cat_residuos_peligrosos.php",
                    data: {
                        residuo: codigo,
                       
                    },
                    dataType: "html",
                    success: function(html_response) {
                        $('#cambios_popup_title').html('Residuos Peligrosos ');
                        $('#cambios_popup_hidden').html('codigo');
                        $('#cambios_popup_body').html(html_response);
                        $('#cambios_popup_content').width(1800);
                    }
                });

            }

    <?php echo '</script'; ?>
>

</html><?php }
}
?>