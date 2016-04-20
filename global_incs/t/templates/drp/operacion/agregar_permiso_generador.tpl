<!DOCTYPE html>
<html>
<head>
    {include file='general/meta.tpl'}
    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' chosen='true'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' chosen='true'}
    
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=50,height=50,left = 655,top = 359');");
}
// End -->
</script>
</head>



<body style="margin-top:30px">
{include file='drp/operacion/menuBootstrap.tpl'}

<div class="main">
    <ol class="breadcrumb">
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Agregar Permiso Generador</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="exampleInputName2">Usuario</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="CUIT/N" name='criterio' value="{$criterio}">
            <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>

{if $accion == "Asignar"}

    {if $mensaje}
    <script>
        mostrarMensaje("exclamation-triangle", 'Residuo Agregado.', "success");
    </script>
    {else}
    <script>
        mostrarMensaje("exclamation-triangle", 'Residuo NO Agregado.', "alert");
    </script>
    {/if}

{/if}


    {if $establecimientos|@count > 0}
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>Cuit</th>
                    <th>Raz&oacute;n social</th>
                    <th>Domicilio</th>
                    <th>Localidad</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                {foreach $establecimientos as $e}
                    <tr>
                        <td id="usuario">{$e->usuario}</td>
                        <td id="nombre">{$e->nombre}</td>
                        <td id="domicilio">{$e->calle} {$e->numero}</td>
                        <td id="localidad">{obtener_localidad($e->localidad)}</td>
                        <td >
                            <button type="button" class="btn btn-info edit" onclick="asignarResiduoGenerador({$e->id})" data-toggle="modal" data-target="#asignar_popup">
                                <span class="fa fa-eye"></span>
                            </button>    
                        </td>
                    </tr>
                {/foreach}

                </tbody>
            </table>
            <!--{$paginador}-->
        </div>
    {else}

        {if $accion == "Buscar"}        
        
        <div class="alert alert-info">
            <p>No existen generadores sin residuos para ese criterio.</p>
        </div>
        
        {/if}

    {/if}

</div>
</div>

{include file='general/popup.tpl' ID_POPUP='asignar'}
</body>
{literal}

<script>

    function asignarResiduoGenerador(establecimiento_id)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/agregar_permiso_generador.php",
            data: {establecimiento_id: establecimiento_id, accion: 'mostrar_popup_seleccion'},
            dataType: "html",
            success: function(html_response) {
                $('#asignar_popup_title').html('Asignar Permiso al establecimiento');
                $('#asignar_popup_body').html(html_response);
                $('#asignar_popup_content').width(800);
            }
             
       });
        /*mostrarMensaje("exclamation-triangle", 'Residuo Agregado.', "success");*/
    }
</script>

{/literal}
</html>