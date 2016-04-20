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
        <li><a href="listado_cat_residuos_peligrosos.php">Codigos Categorias Residuos</a></li>
        <li class="active">Listado</li>
    </ol>
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo" name='criterio' value="{$criterio}">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    {if $residuos|@count > 0}
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

                {foreach $residuos as $r}
                    <tr>
                        <td>{$r->codigo}</td>
                                <td>{$r->categoria}</td>
                                <td>{$r->descripcion}</td>
                        
                        
                        <td align="center">
                            <button type="button" class="btn btn-info edit" onclick="operarSolicitud({$r->codigo})" data-toggle="modal" data-target="#cambios_popup">
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

    </script>
{/literal}
</html>