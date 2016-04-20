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
                <li><a href="#">Altas Masivas</a></li>
                <li class="active">Listado</li>
            </ol>
                <table border='0'>
                <tr><td colspan="2"><b>Carga masiva de altas tempranas (los establecimientos creados ser&aacute;n visualizados bajo la secci&oacute;n "Altas Tempranas").</b><button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button></td></tr></table>
                <br>
                {if $ERRORES}
                    <div class="table-responsive bs-example">
                        <table class="table table-hover table-striped" id="lista_generadores"> 
                            <thead>
                                <th>Linea</th>
                                <th>Estado</th>
                                <th>Descripci&oacute;n</th>
                            </thead>
                            <tbody>
                                {foreach $ERRORES as $linea => $err}
                                    <tr>
                                        <td align="center">{$linea}</td>
                                        <td align="center">{if $err} <b style="color:red;">Revisar informaci&oacute;n</b> {else} <b style="color:green;">Creado correctamente</b> {/if}</td>
                                        <td align="center">
                                            {if $err}
                                                {if $err.empresa}
                                                    <span style="float:left;">Empresa:</span>
                                                    <div style="clear:both;"></div>
                                                    <div class="errors">
                                                        <ul style="list-style-type: none;">
                                                            {foreach $err.empresa as $field => $err_desc}
                                                                {if $err_desc}
                                                                    <li><span style="float:left;"><b>{$field}:</b>&nbsp;{$err_desc}</span></li><br />
                                                                {/if}
                                                            {/foreach}
                                                        </ul>
                                                    </div>
                                                {/if}
                                                {if $err.establecimiento}
                                                    <span style="float:left;">Establecimiento:</span>
                                                    <div style="clear:both;"></div>
                                                    <div class="errors">
                                                        <ul style="list-style-type: none;">
                                                            {foreach $err.establecimiento as $field => $err_desc}
                                                                {if $err_desc}
                                                                    <li><span style="float:left;"><b>{$field}:</b>&nbsp;{$err_desc}</span></li><br />
                                                                {/if}
                                                            {/foreach}
                                                        </ul>
                                                    </div>
                                                {/if}
                                            {/if}
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                {else}
                    <div class="alert alert-info" role="alert" style="font-weight:bold;">Ingrese el archivo CSV con los establecimientos que desee dar de alta.</div>
                {/if}
                
                {if $success}
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
                {elseif $failed}
                    <script type="text/javascript">
                    {literal}
                        BootstrapDialog.alert({
                            title: 'Proceso de archivo',
                            message: '<center>Hay l&iacute;neas d&oacute;nde se han encontrado errores. Solucionelos y vuelva a subir las mismas.</center>',
                            type: BootstrapDialog.TYPE_DANGER,
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
        </div>

    </body>
</html>
<script type="text/javascript">
{literal}
    $("#cargar_archivo_excel").click(function(){
        var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="listado_altas_masivas.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

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