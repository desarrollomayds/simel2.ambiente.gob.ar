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
                <li><a href="listado_registros_rechazados.php">Registraciones Rechazadas</a></li>
                <li class="active">Listado</li>
            </ol>
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Criterio</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' >
                </div>
                <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
            </form>
            <br>
            {if $RECHAZADOS|@count > 0}
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
                                <th><center>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            {foreach $RECHAZADOS as $RECHAZADO}
                            <tr>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$RECHAZADO->nombre}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$RECHAZADO->cuit}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="roles">
                                    {if $RECHAZADO->rol_generador}&nbsp;G&nbsp;{/if}
                                    {if $RECHAZADO->rol_transportista}&nbsp;T&nbsp;{/if}
                                    {if $RECHAZADO->rol_operador}&nbsp;O&nbsp;{/if}
                                </td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="dom_">{$RECHAZADO->calle}&nbsp;{$RECHAZADO->numero}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="id_">{$RECHAZADO->id}</td>
                                <td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{if $RECHAZADO->fecha_inscripcion} {$RECHAZADO->fecha_inscripcion->format('Y-m-d')} {/if}</td>
                                <td align="center" bgcolor="{$COLOR_LINEA}" class="td">
                                    <button type="button" class="btn btn-info edit" onclick="habilitar({$RECHAZADO->id});" data-id="{$RECHAZADO->id}">
                                        Volver a pendiente
                                    </button>
                                </td>
                            </tr>
                            {/foreach}

                        </tbody>
                    </table>
                    {$PAGINADOR}
                </div>
            {else}

                <div class="alert alert-info">
                    <p>En estos momentos no hay rechazados.</p>
                </div>

            {/if}
        </div>
    </div>
</body>

<script type="text/javascript">
{literal}
    function habilitar(id){
            BootstrapDialog.show({
            title: 'Volver a pendiente',
            message: '<center>Esta seguro de volver este registro a estado pendiente?',
            buttons: [{
                    label: 'No, cancelar',
                    action: function(dialog) {
                        dialog.close();
                    }
                }, {
                    label: 'Si, volver a pendiente',
                    action: function(dialog) {
                        $.ajax({
                           type: "POST",
                           url: admin_path+"/operacion/listado_registros_rechazados.php",
                           data: {accion : "volver", id : id},
                           dataType: "text json",
                           success: function(retorno){
                                if(retorno['error']){
                                alert(retorno['error']);
                                }else{
                                    BootstrapDialog.show({
                                    title: 'Informaci&oacute;n',
                                    message: '<center>Operaci&oacute; exitosa',
                                    buttons: [{
                                        label: 'Cerrar',
                                        cssClass: 'btn-primary',
                                        action: function(){
                                            BootstrapDialog.closeAll();
                                            $(location).attr('href', admin_path+'/operacion/listado_registros_rechazados.php');
                                        }
                                    }]
                                });
                                }
                            }
                        });
                    }
                }]
        });
    }
{/literal}
</script>

</html>