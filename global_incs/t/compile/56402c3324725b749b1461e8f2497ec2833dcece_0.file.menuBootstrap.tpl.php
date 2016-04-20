<?php /* Smarty version 3.1.27, created on 2016-02-04 15:39:33
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/menuBootstrap.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:157630532456b39ae5edb715_56538688%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56402c3324725b749b1461e8f2497ec2833dcece' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/menuBootstrap.tpl',
      1 => 1454611171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157630532456b39ae5edb715_56538688',
  'variables' => 
  array (
    'USUARIO' => 0,
    'BASE_PATH' => 0,
    'SHOWMENU' => 0,
    'MODULOS_ADMINISTRACION' => 0,
    'modulo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b39ae614fd74_43829639',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b39ae614fd74_43829639')) {
function content_56b39ae614fd74_43829639 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '157630532456b39ae5edb715_56538688';
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Centro de Ayuda</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <!--
            <ul class="nav navbar-nav">
                <li class="active"><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>
            </ul>
        -->
            <ul class="nav navbar-nav navbar-right">
                <li style="color:white;padding:16px;font-size:13px;">Usuario: <b><?php echo $_smarty_tpl->tpl_vars['USUARIO']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['USUARIO']->value->apellido;?>
</b></li>
                <!-- <li class="active"><a href="#">Centro de ayuda</a></li>-->
                <li><a href="mi_cuenta.php">Mi cuenta</a></li>
                <li><a href="../login/logout_usuario.php">Cerrar sesi&oacute;n</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <div id="registro-logos">
            <div class="col-md-4 col-xs-4 text-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" class="img-responsive center-block" />
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" class="img-responsive center-block" />
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" class="img-responsive center-block" />
            </div>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['SHOWMENU']->value == TRUE) {?>
        <div class="bs-example" data-example-id="simple-nav-justified" style="padding:5px;">
           <ul class="nav nav-pills nav-justified">

                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[5]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[5]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[10]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[10]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[11]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[11]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[14]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[14]->modnombremenu;?>
</a></li>
                    </ul>
                </li>

                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estad&iacute;sticas <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[16]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[16]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[17]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[17]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[18]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[18]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[20]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[20]->modnombremenu;?>
</a></li>
                        <li><a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[19]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[19]->modnombremenu;?>
</a></li>
                    </ul>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[15]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[15]->modnombremenu;?>
</a>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[6]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[6]->modnombremenu;?>
</a>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[7]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[7]->modnombremenu;?>
</a>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[9]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[9]->modnombremenu;?>
</a>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[12]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[12]->modnombremenu;?>
</a>
                </li>

                <li role="presentation" id="<?php echo $_smarty_tpl->tpl_vars['modulo']->value->modlink;?>
">
                    <a href="../<?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[13]->modlink;?>
"><?php echo $_smarty_tpl->tpl_vars['MODULOS_ADMINISTRACION']->value[13]->modnombremenu;?>
</a>
                </li>

            </ul>
        </div>
    <?php }?>


<?php echo '<script'; ?>
>
    $(document).ready(function() {
        var array = window.location.pathname.split( '/' );
        console.debug(array);
        var url = array[2]+'/'+array[3];

        $('li[id="'+url+'"]').attr('class', 'active');
    });
<?php echo '</script'; ?>
>
<?php }
}
?>