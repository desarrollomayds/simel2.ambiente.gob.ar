<?php /* Smarty version 3.1.27, created on 2016-03-15 12:06:52
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/agregar_permiso_generador.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:206310647756e8250c768729_49752252%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d65ffde70eaa0096e46624f8ccb9caa7d9678d' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/agregar_permiso_generador.tpl',
      1 => 1458054684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206310647756e8250c768729_49752252',
  'variables' => 
  array (
    'criterio' => 0,
    'accion' => 0,
    'mensaje' => 0,
    'establecimientos' => 0,
    'e' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e8250c87daa0_72704584',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e8250c87daa0_72704584')) {
function content_56e8250c87daa0_72704584 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '206310647756e8250c768729_49752252';
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

    
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=50,height=50,left = 655,top = 359');");
}
// End -->
<?php echo '</script'; ?>
>
</head>



<body style="margin-top:30px">
<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="main">
    <ol class="breadcrumb">
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Agregar Permiso Generador</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Usuario</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="CUIT/N" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>

<?php if ($_smarty_tpl->tpl_vars['accion']->value == "Asignar") {?>

    <?php if ($_smarty_tpl->tpl_vars['mensaje']->value) {?>
    <?php echo '<script'; ?>
>
        mostrarMensaje("exclamation-triangle", 'Residuo Agregado.', "success");
    <?php echo '</script'; ?>
>
    <?php } else { ?>
    <?php echo '<script'; ?>
>
        mostrarMensaje("exclamation-triangle", 'Residuo NO Agregado.', "alert");
    <?php echo '</script'; ?>
>
    <?php }?>

<?php }?>


    <?php if (count($_smarty_tpl->tpl_vars['establecimientos']->value) > 0) {?>
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Domicilio</th>
                    <th>Localidad</th>
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
                        <td id="domicilio"><?php echo $_smarty_tpl->tpl_vars['e']->value->calle;?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value->numero;?>
</td>
                        <td id="localidad"><?php echo obtener_localidad($_smarty_tpl->tpl_vars['e']->value->localidad);?>
</td>
                        <td >
                            <button type="button" class="btn btn-info edit" onclick="asignarResiduoGenerador(<?php echo $_smarty_tpl->tpl_vars['e']->value->id;?>
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

        <?php if ($_smarty_tpl->tpl_vars['accion']->value == "Buscar") {?>        
        
        <div class="alert alert-info">
            <p>No existen generadores sin residuos para ese criterio.</p>
        </div>
        
        <?php }?>

    <?php }?>

</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'asignar'), 0);
?>

</body>


<?php echo '<script'; ?>
>

    function asignarResiduoGenerador(establecimiento_id)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/agregar_permiso_generador.php",
            data: {establecimiento_id: establecimiento_id, accion: 'mostrar_popup_seleccion'},
            dataType: "html",
            success: function(html_response) {
                $('#asignar_popup_title').html('Asignar Permiso al establecimiento');
                $('#asignar_popup_body').html(html_response);
                $('#asignar_popup_content').width(800);
            }
             
       });
        /*mostrarMensaje("exclamation-triangle", 'Residuo Agregado.', "success");*/
    }
<?php echo '</script'; ?>
>


</html><?php }
}
?>