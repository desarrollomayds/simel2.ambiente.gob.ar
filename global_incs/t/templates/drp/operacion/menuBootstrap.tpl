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
                <li style="color:white;padding:16px;font-size:13px;">Usuario: <b>{$USUARIO->nombre} {$USUARIO->apellido}</b></li>
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
                <img src="{$BASE_PATH}/images/LogoDRP.png" class="img-responsive center-block" />
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="{$BASE_PATH}/imagenes/logo_mel.gif" class="img-responsive center-block" />
            </div>
            <div class="col-md-4 col-xs-4 text-center">
                <img src="{$BASE_PATH}/imagenes/logo.gif" class="img-responsive center-block" />
            </div>
        </div>
    </div>

    {if $SHOWMENU == TRUE}
        <div class="bs-example" data-example-id="simple-nav-justified" style="padding:5px;">
           <ul class="nav nav-pills nav-justified">

                {* Agrupamos modulos de registro *}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="../{$MODULOS_ADMINISTRACION[5]->modlink}">{$MODULOS_ADMINISTRACION[5]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[10]->modlink}">{$MODULOS_ADMINISTRACION[10]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[11]->modlink}">{$MODULOS_ADMINISTRACION[11]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[14]->modlink}">{$MODULOS_ADMINISTRACION[14]->modnombremenu}</a></li>
                    </ul>
                </li>

                {* Agrupamos modulos de estadíticas *}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estad&iacute;sticas <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="../{$MODULOS_ADMINISTRACION[16]->modlink}">{$MODULOS_ADMINISTRACION[16]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[17]->modlink}">{$MODULOS_ADMINISTRACION[17]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[18]->modlink}">{$MODULOS_ADMINISTRACION[18]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[20]->modlink}">{$MODULOS_ADMINISTRACION[20]->modnombremenu}</a></li>
                        <li><a href="../{$MODULOS_ADMINISTRACION[19]->modlink}">{$MODULOS_ADMINISTRACION[19]->modnombremenu}</a></li>
                    </ul>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[15]->modlink}">{$MODULOS_ADMINISTRACION[15]->modnombremenu}</a>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[6]->modlink}">{$MODULOS_ADMINISTRACION[6]->modnombremenu}</a>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[7]->modlink}">{$MODULOS_ADMINISTRACION[7]->modnombremenu}</a>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[9]->modlink}">{$MODULOS_ADMINISTRACION[9]->modnombremenu}</a>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[12]->modlink}">{$MODULOS_ADMINISTRACION[12]->modnombremenu}</a>
                </li>

                <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[13]->modlink}">{$MODULOS_ADMINISTRACION[13]->modnombremenu}</a>
                </li>

                 <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[23]->modlink}">{$MODULOS_ADMINISTRACION[23]->modnombremenu}</a>
                </li>

                 <li role="presentation" id="{$modulo->modlink}">
                    <a href="../{$MODULOS_ADMINISTRACION[24]->modlink}">{$MODULOS_ADMINISTRACION[24]->modnombremenu}</a>
                </li>

            </ul>
        </div>
    {/if}

{literal}
<script>
    $(document).ready(function() {
        var array = window.location.pathname.split( '/' );
        console.debug(array);
        var url = array[2]+'/'+array[3];

        $('li[id="'+url+'"]').attr('class', 'active');
    });
</script>
{/literal}