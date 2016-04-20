<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
</head>

<body style="margin-top:30px">
    {include file='drp/operacion/menuBootstrap.tpl'}
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
        <div class="main">
            <ol class="breadcrumb">
                <li><a href="#">Registraciones Pendientes</a></li>
                <li class="active">Lista</li>
            </ol>
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' >
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            {if $PENDIENTES|@count > 0}
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
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            {foreach $PENDIENTES as $PENDIENTE}
                            <tr>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$PENDIENTE.NOMBRE}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.CUIT}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.ROLES_}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="dom_">{$PENDIENTE.DOMICILIO_REAL}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="id_">{$PENDIENTE.ID}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.FECHA_INSCRIPCION}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.ESTADO_}</td>
                                <td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-info edit" data-id="{$PENDIENTE.ID}">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                    <!--<a href='detalle.php?id={$PENDIENTE.ID}'>ver detalle</a>--></td>
                            </tr>
                            {/foreach}

                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination pull-">
                            {foreach $PAGINAS as $PAGINA}
                            <li><a href="?p={$PAGINA+1-1}">{$PAGINA+1}</a></li>
                            {/foreach}
                        </ul>
                    </nav>
                </div>
            {else}

                <div class="alert alert-info">
                    <p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
                </div>

            {/if}
        </div>
    </div>
</body>

<script>
    $(function() {
        $("#listadoPendientes .edit").each(function() {
            $(this).click(function() {
                window.location = admin_path+"/operacion/detalleBootstrap.php?id=" + $(this).attr("data-id");
            });
        })
    });
</script>

</html>
