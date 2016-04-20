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

        <div class="main">
            <ol class="breadcrumb">
                <li><a href="listado_manifiestos_pendientes_de_aprobacion.php">Manifiestos Pendientes de aprobaci&oacute;n por la DRP</a></li>
                <li class="active">Listado</li>
            </ol>
            <form class="form-inline">
                <div class="form-group">
                    <label for="criterio">Criterio</label>
                    <input style="width:250px;" type="text" class="form-control" id="criterio" placeholder="Raz&oacute;n social o CUIT del creador" name='criterio' value="{$criterio}">
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            {if $manifiestos_pendientes|@count > 0}
                <div class="table-responsive bs-example">
                    <table class="table table-hover table-striped" id="manif_pendientes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cuit</th>
                                <th>Creado Por</th>
                                <th>Sucursal</th>
                                <th>Fecha creaci&oacute;n</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            {foreach $manifiestos_pendientes as $m}
                            <tr>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="id">{$m->id}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$m->cuit}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$m->nombre_establecimiento}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="sucursal">{$m->sucursal}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="fecha_creacion">{$m->fecha_creacion}</td>
                                <td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-info" onclick="verDetalleManifiesto({$m->id});" data-toggle="modal" data-target="#pendientes_popup">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                    <!--<a href='detalle.php?id={$PENDIENTE.ID}'>ver detalle</a>-->
                                </td>
                            </tr>
                            {/foreach}

                        </tbody>
                    </table>
                    {$paginador}
                </div>
            {else}

                <div class="alert alert-info">
                    <p>En estos momentos no hay ning&uacute;n manifiesto pendiente de aprobaci&oacute;n.</p>
                </div>

            {/if}
        </div>
    </div>

    {include file='general/popup.tpl' ID_POPUP='pendientes'}
</body>

<script>

    function verDetalleManifiesto(manifiesto_id)
    {
        console.info("verDetalleManifiesto: "+manifiesto_id);

        $.ajax({
            type: "GET",
            url: admin_path+"/operacion/set_manifiestos_pendientes_de_aprobacion.php",
            data: {
                manifiesto_id: manifiesto_id,
            },
            dataType: "html",
            success: function(html_response) {
                $('#pendientes_popup_title').html('Manifiesto Concentrador Pendiente');
                $('#pendientes_popup_body').html(html_response);
                $('#pendientes_popup_content').width(1024);
            }
        });
    }
</script>

</html>
