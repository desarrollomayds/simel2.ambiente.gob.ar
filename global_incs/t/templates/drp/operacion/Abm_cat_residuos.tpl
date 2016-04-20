<!DOCTYPE html>
<html>
<head>
    {include file='general/meta.tpl'}
    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' chosen='true'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' chosen='true'}
</head>

<body style="margin-top:30px">
{include file='drp/operacion/menuBootstrap.tpl'}

<div class="main">
    <ol class="breadcrumb">
        <!--<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>-->
        <li class="active">Modificar Descripcion Categoria</li>
    </ol>
    <form class="form-inline" method="POST">
        <div class="form-group">
         <label for="exampleInputName2">Codigo</label>
         <input type="text" class="form-control" id="exampleInputName2" placeholder="CODIGO" name='criterio' value="{$criterio}">
         <input type="hidden" name="accion" value="buscar">
        </div>
        <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
    </form>
    <br>
    {if $residuos|@count > 0}
        <div class="table-responsive bs-example">
            <table class="table table-hover table-striped" id="listadoPendientes">
                <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Categoria</th>
                    <th>Descricpci&oacute;n</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                {foreach $residuos as $e}
                    <tr>
                        <td id="codigo">{$e->codigo}</td>
                        <td id="categoria">{$e->categoria}</td>
                        <td id="descripcion">{$e->descripcion} </td>
                        <td >
                            <button type="button" class="btn btn-info edit" onclick="asignarDescripcion({$e->codigo})" data-toggle="modal" data-target="#asignar_popup">
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
        <div class="alert alert-info">
            <p>No existen residuos para ese criterio.</p>
        </div>
    {/if}
</div>
</div>

{include file='general/popup.tpl' ID_POPUP='asignar'}
</body>
{literal}

<script>

    function asignarDescripcion(codigo)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/Abm_cat_residuos.php",
            data: {codigo: codigo, accion: 'mostrar_popup_seleccion'},
            dataType: "html",
            success: function(html_response) {
                $('#asignar_popup_title').html('Asignar Permiso al establecimiento');
                $('#asignar_popup_body').html(html_response);
                $('#asignar_popup_content').width(800);
            }
       });
    }
</script>

{/literal}
</html>