<?php /* Smarty version 3.1.27, created on 2016-02-12 14:18:56
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/Abm_cat_residuos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:37105757956be140075e0d1_31107566%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8026ffceea4a7d6193f19fc29f0d6ce2cd1b1e6c' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/Abm_cat_residuos.tpl',
      1 => 1455297696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37105757956be140075e0d1_31107566',
  'variables' => 
  array (
    'criterio' => 0,
    'residuos' => 0,
    'e' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56be140082ffd5_17107548',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56be140082ffd5_17107548')) {
function content_56be140082ffd5_17107548 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '37105757956be140075e0d1_31107566';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>'true'), 0);
?>

    <!-- carga de js y files especificos para la seccion -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>'true'), 0);
?>

</head>

<body style="margin-top:30px">
<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <ol class="breadcrumb">
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Modificar Descripcion Categoria</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
         <label for="exampleInputName2">Codigo</label>
         <input type="text" class="form-control" id="exampleInputName2" placeholder="CODIGO" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
         <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    <?php if (count($_smarty_tpl->tpl_vars['residuos']->value) > 0) {?>
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Categoria</th>
                    <th>Descricpci&oacute;n</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php
$_from = $_smarty_tpl->tpl_vars['residuos']->value;
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
                        <td id="codigo"><?php echo $_smarty_tpl->tpl_vars['e']->value->codigo;?>
</td>
                        <td id="categoria"><?php echo $_smarty_tpl->tpl_vars['e']->value->categoria;?>
</td>
                        <td id="descripcion"><?php echo $_smarty_tpl->tpl_vars['e']->value->descripcion;?>
 </td>
                        <td >
                            <button type="button" class="btn btn-info edit" onclick="asignarDescripcion(<?php echo $_smarty_tpl->tpl_vars['e']->value->codigo;?>
)" data-toggle="modal" data-target="#asignar_popup">
                                <span class="fa fa-eye"></span>
                            </button>    
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
            <p>No existen residuos para ese criterio.</p>
        </div>
    <?php }?>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'asignar'), 0);
?>

</body>


<?php echo '<script'; ?>
>

    function asignarDescripcion(codigo)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/Abm_cat_residuos.php",
            data: {codigo: codigo, accion: 'mostrar_popup_seleccion'},
            dataType: "html",
            success: function(html_response) {
                $('#asignar_popup_title').html('Asignar Permiso al establecimiento');
                $('#asignar_popup_body').html(html_response);
                $('#asignar_popup_content').width(800);
            }
       });
    }
<?php echo '</script'; ?>
>


</html><?php }
}
?>