<!DOCTYPE html>
<html>
<head>
    {include file='general/meta.tpl'}
    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='true' filter='true'}
</head>

<body style="margin-top:30px">
{include file='drp/operacion/menuBootstrap.tpl'}

{include file='general/popup.tpl' ID_POPUP='cambios'}

<div class="main">
    <ol class="breadcrumb">
        <li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>
        <li class="active">Listado</li>
    </ol>
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="{$criterio}">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    {if $altas_tempranas|@count > 0}
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Establecimiento</th>
                    <th>Sucursal</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                {foreach $altas_tempranas as $alta_temprana}
                    <tr>
                        <td id="cuit">{$alta_temprana->cuit}</td>
                        <td id="razon_social">{$alta_temprana->razon_social}</td>
                        <td id="establecimiento">{$alta_temprana->establecimiento}</td>
                        <td id="sucursal">{$alta_temprana->sucursal}</td>
                        <td id="sucursal">{if $alta_temprana->tipo == Establecimiento::GENERADOR} Generador {else} Operador {/if}</td>
                        <td align="center">
                            <button type="button" class="btn btn-info edit" onclick="operarSolicitud({$alta_temprana->establecimiento_id})" data-toggle="modal" data-target="#cambios_popup">
                                <span class="fa fa-eye"></span>
                            </button>
                        </td>
                    </tr>
                {/foreach}

                </tbody>
            </table>
            {$paginador}
        </div>
    {else}
        <div class="alert alert-info">
            <p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
        </div>
    {/if}
</div>
</div>
</body>
{literal}
    <script>

            function operarSolicitud(establecimientoID)
            {

                $.ajax({
                    type: "GET",
                    url: admin_path+"/operacion/alta_temprana.php",
                    data: {
                        establecimiento: establecimientoID,
                    },
                    dataType: "html",
                    success: function(html_response) {
                        $('#cambios_popup_title').html('Cambios Solicitados');
                        $('#cambios_popup_body').html(html_response);
                        $('#cambios_popup_content').width(800);
                    }
                });

            }

    </script>
{/literal}
</html>