<?php /* Smarty version 3.1.27, created on 2016-02-04 15:37:05
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_manifiestos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:119219333056b39a51c0fbd3_14735957%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '496c712e3136d50a89fc2fc840d9f3f6868de4a2' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_manifiestos.tpl',
      1 => 1454610782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119219333056b39a51c0fbd3_14735957',
  'variables' => 
  array (
    'filtros' => 0,
    'manifiestos' => 0,
    'm' => 0,
    'estados' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b39a51e567d7_03593614',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b39a51e567d7_03593614')) {
function content_56b39a51e567d7_03593614 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '119219333056b39a51c0fbd3_14735957';
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
                <li><a href="listado_manifiestos.php">Manifiestos</a></li>
                <li class="active">Listado</li>
            </ol>

            <div class="table-responsive bs-example">

                <div id="container_form" style="width:800px;float:left;padding:10px;">
                    <h4>Filtros de b&uacute;squeda:</h4>
                    <hr>
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="manifiesto_id" class="col-sm-2 control-label">ID Operaci&oacute;n</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="manifiesto_id" placeholder="ID Operaci&oacute;n del manifiesto" name='manifiesto_id' value="<?php echo $_smarty_tpl->tpl_vars['filtros']->value['manifiesto_id'];?>
">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="protocolo_id" class="col-sm-2 control-label">Protocolo</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="protocolo_id" placeholder="Protocolo del manifiesto" name='protocolo_id' value="<?php echo $_smarty_tpl->tpl_vars['filtros']->value['protocolo_id'];?>
">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="establecimiento" class="col-sm-2 control-label">Establecimiento</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="establecimiento" placeholder="Nombre o usuario del establecimiento creador" name='establecimiento' value="<?php echo $_smarty_tpl->tpl_vars['filtros']->value['establecimiento'];?>
">
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="tipo_manifiesto" class="col-sm-2 control-label">Tipo Manifiesto</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="tipo_manifiesto" name="tipo_manifiesto">
                                <option value="all" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['tipo_manifiesto'] == 'all') {?>selected<?php }?>>Todos</option>
                                <option value="0"   <?php if ($_smarty_tpl->tpl_vars['filtros']->value['tipo_manifiesto'] == '0') {?>selected<?php }?>>Simple</option>
                                <option value="1"   <?php if ($_smarty_tpl->tpl_vars['filtros']->value['tipo_manifiesto'] == '1') {?>selected<?php }?>>M&uacute;ltiple</option>
                                <option value="2"   <?php if ($_smarty_tpl->tpl_vars['filtros']->value['tipo_manifiesto'] == '3') {?>selected<?php }?>>SLOP</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="estado" name="estado">
                                <option value="all">Todos</option>
                                <option value="a" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "a") {?>selected<?php }?>>Aprobado</option>
                                <option value="f" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "f") {?>selected<?php }?>>Finalizado</option>
                                <option value="p" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "p") {?>selected<?php }?>>Pendiente</option>
                                <option value="r" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "r") {?>selected<?php }?>>Rechazado</option>
                                <option value="e" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "e") {?>selected<?php }?>>Recibido</option>
                                <option value="v" <?php if ($_smarty_tpl->tpl_vars['filtros']->value['estado'] == "v") {?>selected<?php }?>>Vencido</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                           <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
                        </div>
                      </div>
                    </form>
                </div>
                <div style="clear:both"></div>
                <hr>

                <?php if (count($_smarty_tpl->tpl_vars['manifiestos']->value) > 0) {?>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Protocolo</th>
                                <th>Cuit</th>
                                <th>Est. creador</th>
                                <th>Fecha creaci&oacute;n</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th><center>Manifiesto</th>
                                <th><center>Certificado<br /> Recepci&oacute;n</th>
                                <th><center>Constancia<br /> tratamiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->tpl_vars['manifiestos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['m']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
$foreach_m_Sav = $_smarty_tpl->tpl_vars['m'];
?>
                                <tr>
                                    <td class="td" id="id"><?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
</td>
                                    <td class="td" id="id">
                                        <?php if ($_smarty_tpl->tpl_vars['m']->value->id_protocolo_manifiesto) {?>
                                            <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['m']->value->id_protocolo_manifiesto);?>

                                        <?php } else { ?>
                                            &nbsp;-&nbsp;
                                        <?php }?>
                                    </td>
                                    <td class="td" id="cuit"><?php echo $_smarty_tpl->tpl_vars['m']->value->cuit;?>
</td>
                                    <td class="td" id="nombre"><?php echo $_smarty_tpl->tpl_vars['m']->value->nombre_establecimiento;?>
</td>
                                    <td class="td" id="fecha_creacion"><?php if ($_smarty_tpl->tpl_vars['m']->value->fecha_creacion) {?> <?php echo $_smarty_tpl->tpl_vars['m']->value->fecha_creacion->format('Y-m-d');?>
 <?php }?></td>
                                    <td class="td" id="tipo_manifiesto"><?php echo obtener_tipo_manifiesto($_smarty_tpl->tpl_vars['m']->value->tipo_manifiesto);?>
</td>
                                    <td class="td" id="estado"><?php echo $_smarty_tpl->tpl_vars['estados']->value[$_smarty_tpl->tpl_vars['m']->value->estado];?>
</td>
                                    <td><button type="button" class="btn btn-info edit" onclick="verInfoManifiesto(<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
);" data-toggle="modal" data-target="#manifiesto_preview_popup"><i class="fa fa-eye"></i></button></td>
                                    <?php if ($_smarty_tpl->tpl_vars['m']->value->estado == 'p' || $_smarty_tpl->tpl_vars['m']->value->estado == 'v' || $_smarty_tpl->tpl_vars['m']->value->estado == 'r') {?>
                                        <td height="50"></td><td></td><td></td>
                                        <?php } else { ?>
                                        <td align="center" class="td">
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
&documento=manifiesto">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                        </td>
                                        <td align="center" class="td">
                                            <?php if ($_smarty_tpl->tpl_vars['m']->value->estado == 'e' || $_smarty_tpl->tpl_vars['m']->value->estado == 'f') {?>
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
&documento=constancia">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                            <?php }?>
                                        </td>
                                        <td align="center" class="td">
                                            <?php if ($_smarty_tpl->tpl_vars['m']->value->estado == 'f') {?>
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
&documento=certificado">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                            <?php }?>    
                                        </td>
                                    <?php }?>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['m'] = $foreach_m_Sav;
}
?>
                        </tbody>
                    </table>
                    <?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

                <?php } else { ?>

                    <div class="alert alert-info">
                        <p>En estos momentos no hay ning&uacute;n manifiesto cargado.</p>
                    </div>

                <?php }?>
            </div>
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'manifiesto_preview'), 0);
?>

</body>

<?php echo '<script'; ?>
>

    function verInfoManifiesto(manifiesto_id)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/ajax/ajax_obtener_informacion_manifiesto.php",
            data: { manifiesto_id: manifiesto_id },
            dataType: "html",
            success: function(html_response) {
                $('#manifiesto_preview_popup_title').html('Informaci&oacute;n Manifiesto');
                $('#manifiesto_preview_popup_body').html(html_response);
                $('#manifiesto_preview_popup_content').width(1024);
            }
        });
    }
<?php echo '</script'; ?>
>

</html>
<?php }
}
?>