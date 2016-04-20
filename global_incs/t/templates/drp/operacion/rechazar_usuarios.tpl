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
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Rechazar Usuario</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="CUIT/N" name='criterio' value="{$criterio}">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    {if $establecimientos|@count > 0}
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                {foreach $establecimientos as $e}
                    <tr>
                        <td id="usuario">{$e->usuario}</td>
                        <td id="nombre">{$e->nombre}</td>
                        <td id="tipo">{if $e->tipo == 1} Generador 
                                        {else} Operador {/if}</td>
                        <td id="flag">{if $e->flag == 't'} 
                                        <span class="label label-success">Activo</span> 
                                        {else} 
                                        <span class="label label-danger">Rechazado</span> 
                                        {/if}</td>
                        <td >{if $e->flag == 't'} 
                        <FORM class="form-inline" method="POST">
                            <input type="hidden" name="accion" value="rechazar">
                            <input type="hidden" name="establecimiento_id" value="{$e->id}">
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </FORM>    
                        
                        {/if}
                            <!--<a href="javascript:void(0)" class="btn btn-danger" onclick="rechazarUsuario({$e->id})">Rechazar</a>-->
                        </td>
                    </tr>
                {/foreach}

                </tbody>
            </table>
            <!--{$paginador}-->
        </div>
    {else}
        <div class="alert alert-info">
            <p>No existe establecimiento con el CUIT/Nro solicitado.</p>
        </div>
    {/if}
</div>
</div>
</body>
{literal}
<!--
<script>

    function rechazarUsuario(establecimientoID){
        $.ajax({
            type: "post",
            url: admin_path+"/operacion/rechazar_usuarios.php",
            data: {
                establecimiento_id: establecimientoID,
                accion: rechazar
            },
            dataType: "text json",

            success: function(respuesta) {
                if (respuesta.success) {
                    mostrarMensajeYRedireccionar('Usuario Rechazado Exitosamente !!!');
                } else {
                    BootstrapDialog.alert({
                        title: 'Ha ocurrido un error.',
                        message: 'No se pudo rechazar el ID: ' + respuesta.id,
                        type: BootstrapDialog.TYPE_DANGER,
                    });
                }
            },
            complete:
        });         
    }
</script>
-->
{/literal}
</html>