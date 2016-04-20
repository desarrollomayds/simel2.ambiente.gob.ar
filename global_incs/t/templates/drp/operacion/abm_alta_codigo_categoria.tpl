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
        <li class="active">Codigos de Categorias de Residuos</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Criterio</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Codigo" name='criterio' value="{$criterio}">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    {if $residuos|@count > 0}
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoCodigo">
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
                        <td id="codigo">{$r->codigo}</td>
                        <td id="categoria">{$r->categoria}</td>
                        <td id="descripcion">{$r->descripcion}</td> 
                        <td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-info edit" codigo="{$r->codigo}">
                                        <span class="fa fa-eye"></span>
                                    </button>
                        </td>
                        
                        <FORM class="form-inline" method="POST">
                            <input type="hidden" name="accion" value="editar">
                            <input type="hidden" name="codigo" value="{$r->codigo}">
                            <button type="submit" class="btn btn-danger">Edtar</button>
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