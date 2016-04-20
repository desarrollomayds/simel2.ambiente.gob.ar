<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
                <li><a href="#">Formularios</a></li>
                <li class="active">Listado</li>
            </ol>

            <div class="alert alert-info" role="alert" style="font-weight:bold;">
                * Tenga en cuenta que la carga de formularios es acumulativa por establecimiento. Si ud agrega manifiestos a un establecimiento, las manifiestos anteriores se mantienen y se suman los nuevos.</a>
            </div>

            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n Social o CUIT" name='criterio' value="{$CRITERIO}">
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
                <table border='0'>
                    <tr>
                        <td colspan="2">Proceso de Formularios<button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="table-responsive bs-example">
                    <table border='0' class="table table-hover table-striped">
                        <tr>
                            <td class="bg-info" align="center">Raz&oacute;n Social</td>
                            <td class="bg-info" align="center">Usuario del establecimiento</td>
                            <td class="bg-info" align="center" height="35">Cantidad de formularios</td>
                            <td class="bg-info" align="center" height="35">Fecha de registraci&oacute;n</td>
                    {if $FORMULARIOS.error}
                        <tr><td colspan="6" height="35" align="center">No se han encontrado formularios</td></tr>
                    {else}
                        {foreach $FORMULARIOS as $FORMULARIO}
                        <tr>
                            <td align="center">{$FORMULARIO->razon_social}</td>
                            <td align="center">{$FORMULARIO->usuario}</td>
                            <td align="center">{$FORMULARIO->cantidad}</td>
                            <td align="center">{if $FORMULARIO->fecha_registracion} {$FORMULARIO->fecha_registracion->format('Y-m-d')} {else} &nbsp;-&nbsp;{/if}</td>
                        </tr>
                        {/foreach}
                    {/if}
                    </table>
                </div>
                {$PAGINADOR}

                {if $MOSTRAR_ALERTAS}
                    {if $ERROR}
                        <script type="text/javascript">
                        {literal}
                            BootstrapDialog.alert({
                                title: 'Ha ocurrido un error.',
                                message: '{/literal}{$ERROR.descripcion}{literal}',
                                type: BootstrapDialog.TYPE_DANGER,
                            });
                        {/literal}
                        </script>
                    {else}
                        <script type="text/javascript">
                        {literal}
                            BootstrapDialog.show({
                                title: 'Proceso de archivo',
                                message: '<center>Archivo procesado con exito</center>',
                                buttons: [{
                                    label: 'Cerrar',
                                    action: function(dialogRef){
                                        dialogRef.close();
                                    }
                                }]
                            });
                        {/literal}
                        </script>
                    {/if}
                {/if}
        </div>

    </body>
</html>
<script type="text/javascript">
{literal}
    $("#cargar_archivo_excel").click(function(){
        var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="administracion_formularios.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

        BootstrapDialog.show({
            title: 'Cargar archivo CSV',
            message: $mensaje,
            buttons: [{
                label: 'Cancelar',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }, {
                label: 'Cargar',
                action: function(dialogRef){
                    if ($('[type=file]').val()){
                        var ext = $('[type=file]').val().split('.').pop();
                        if (ext == 'csv'){
                            $("#upload").submit();
                            dialogRef.close();
                        } else {
                            BootstrapDialog.alert({
                                title: 'Informaci&oacute;n',
                                message: 'El archivo seleccionado no es CSV',
                            });
                            return false;
                        }
                    } else {
                        BootstrapDialog.alert({
                            title: 'Informaci&oacute;n',
                            message: 'Debe seleccionar un archivo a cargar',
                        });
                        return false;
                    }
                }
            }]
        });
    });
{/literal}
</script>