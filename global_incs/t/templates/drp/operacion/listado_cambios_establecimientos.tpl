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
                <li><a href="listado_cambios_establecimientos.php">Cambios pendientes</a></li>
                <li class="active">Listado</li>
            </ol>

            <form class="form-inline" style="margin-top:20px;">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="CUIT" name='cuit' value="{$cuit}">
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            {if $cambios_solicitados|@count > 0}
                <div class="table-responsive bs-example">
                    <table class="table table-hover table-striped" id="listadoPendientes">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CUIT</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Establecimiento</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Usuario DRP</th>
                                <th>Procesado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            {foreach $cambios_solicitados as $cambio_obj}
                            <tr>
                                <td>{$cambio_obj->id}</td>
                                <td>{$cambio_obj->cuit}</td>
                                <td>{$cambio_obj->empresa}</td>
                                <td>{$cambio_obj->establecimiento}</td>
                                <td>{$cambio_obj->fecha_solicitud->format('Y-m-d H:i:s')}</td>
                                <td>{$cambio_obj->estado}</td>
                                <td>{if $cambio_obj->usuario_drp} {$cambio_obj->usuario_drp} {else} - {/if}</td>
                                <td>{if $cambio_obj->fecha_procesado} {$cambio_obj->fecha_procesado->format('Y-m-d H:i:s')} {else} - {/if}</td>

                                <td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-info" solicitud-id="{$cambio_obj->id}" title="Ver solicitud" onclick="operarSolicitud($(this));" data-toggle="modal" data-target="#cambios_popup">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </td>
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
                    <p>No existen solicitudes de cambios pendientes.</p>
                </div>

            {/if}
        </div>
    </div>

    {include file='general/popup.tpl' ID_POPUP='cambios' HIDDEN_INFO='true'}
    {include file='general/popup.tpl' ID_POPUP='detalle_establecimiento' HIDDEN_INFO='true'}

</body>

<script>
    $(document).ready(function() {
        /*

        $("#listadoPendientes .edit").each(function() {
            $(this).click(function() {
                window.location = admin_path+"/operacion/edit_registro_pendiente.php?id=" + $(this).attr("data-id");
            });
        });

*/
    });

    function operarSolicitud(buttonObj)
    {
        var solicitud_id = buttonObj.attr('solicitud-id');
        console.info("solicitud_id: "+solicitud_id);

        $.ajax({
            type: "GET",
            url: admin_path+"/operacion/set_cambios_establecimientos.php",
            data: {
                solicitud_id: solicitud_id,
            },
            dataType: "html",
            success: function(html_response) {
                $('#cambios_popup_title').html('Cambios Solicitados');
                $('#cambios_popup_body').html(html_response);
                $('#cambios_popup_content').width(800);
                // $('input#cambios_hidden_info').val(nombre_container);
            }
        });
    }
</script>

</html>
