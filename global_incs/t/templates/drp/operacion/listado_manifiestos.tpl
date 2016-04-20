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
                <li><a href="listado_manifiestos.php">Manifiestos</a></li>
                <li class="active">Listado</li>
            </ol>

            <div class="table-responsive bs-example">

                <div id="container_form" style="width:800px;float:left;padding:10px;">
                    <h4>Filtros de b&uacute;squeda:</h4>
                    <hr>
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="manifiesto_id" class="col-sm-2 control-label">ID Operaci&oacute;n</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="manifiesto_id" placeholder="ID Operaci&oacute;n del manifiesto" name='manifiesto_id' value="{$filtros['manifiesto_id']}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="protocolo_id" class="col-sm-2 control-label">Protocolo</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="protocolo_id" placeholder="Protocolo del manifiesto" name='protocolo_id' value="{$filtros['protocolo_id']}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="establecimiento" class="col-sm-2 control-label">Establecimiento</label>
                        <div class="col-sm-9">
                          <input style="max-width:578px;" type="text" class="form-control" id="establecimiento" placeholder="Nombre o usuario del establecimiento creador" name='establecimiento' value="{$filtros['establecimiento']}">
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="tipo_manifiesto" class="col-sm-2 control-label">Tipo Manifiesto</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="tipo_manifiesto" name="tipo_manifiesto">
                                <option value="all" {if $filtros['tipo_manifiesto'] == 'all'}selected{/if}>Todos</option>
                                <option value="0"   {if $filtros['tipo_manifiesto'] == '0'}selected{/if}>Simple</option>
                                <option value="1"   {if $filtros['tipo_manifiesto'] == '1'}selected{/if}>M&uacute;ltiple</option>
                                <option value="2"   {if $filtros['tipo_manifiesto'] == '3'}selected{/if}>SLOP</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="estado" name="estado">
                                <option value="all">Todos</option>
                                <option value="a" {if $filtros['estado'] == "a"}selected{/if}>Aprobado</option>
                                <option value="f" {if $filtros['estado'] == "f"}selected{/if}>Finalizado</option>
                                <option value="p" {if $filtros['estado'] == "p"}selected{/if}>Pendiente</option>
                                <option value="r" {if $filtros['estado'] == "r"}selected{/if}>Rechazado</option>
                                <option value="e" {if $filtros['estado'] == "e"}selected{/if}>Recibido</option>
                                <option value="v" {if $filtros['estado'] == "v"}selected{/if}>Vencido</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                           <button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
                        </div>
                      </div>

                <div align="right" >
                    <a class="btn btn-primary btn-sm" href='?exportar=yes&tipo_manifiesto={$TIPO_MANIFIESTO}'>
                        Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
                    </a>
                </div>

                      
                    </form>
                </div>
                <div style="clear:both"></div>
                <hr>

                {if $manifiestos|@count > 0}
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Protocolo</th>
                                <th>Cuit</th>
                                <th>Est. creador</th>
                                <th>Fecha creaci&oacute;n</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th><center>Manifiesto</th>
                                <th><center>Certificado<br /> Recepci&oacute;n</th>
                                <th><center>Constancia<br /> tratamiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $manifiestos as $m}
                                <tr>
                                    <td class="td" id="id">{$m->id}</td>
                                    <td class="td" id="id">
                                        {if $m->id_protocolo_manifiesto}
                                            {formatear_id_protocolo_manifiesto($m->id_protocolo_manifiesto)}
                                        {else}
                                            &nbsp;-&nbsp;
                                        {/if}
                                    </td>
                                    <td class="td" id="cuit">{$m->cuit}</td>
                                    <td class="td" id="nombre">{$m->nombre_establecimiento}</td>
                                    <td class="td" id="fecha_creacion">{if $m->fecha_creacion} {$m->fecha_creacion->format('Y-m-d')} {/if}</td>
                                    <td class="td" id="tipo_manifiesto">{obtener_tipo_manifiesto($m->tipo_manifiesto)}</td>
                                    <td class="td" id="estado">{$estados[$m->estado]}</td>
                                    <td><button type="button" class="btn btn-info edit" onclick="verInfoManifiesto({$m->id});" data-toggle="modal" data-target="#manifiesto_preview_popup"><i class="fa fa-eye"></i></button></td>
                                    {if $m->estado == 'p' || $m->estado == 'v' || $m->estado == 'r'}
                                        <td height="50"></td><td></td><td></td>
                                        {else}
                                        <td align="center" class="td">
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id={$m->id}&documento=manifiesto">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                        </td>
                                        <td align="center" class="td">
                                            {if $m->estado == 'e' || $m->estado == 'f'}
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id={$m->id}&documento=constancia">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                            {/if}
                                        </td>
                                        <td align="center" class="td">
                                            {if $m->estado == 'f'}
                                            <a type="button" class="btn btn-info" href="imprimir_documentos.php?id={$m->id}&documento=certificado">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                            {/if}    
                                        </td>
                                    {/if}
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                    {$paginador}
                {else}

                    <div class="alert alert-info">
                        <p>En estos momentos no hay ning&uacute;n manifiesto cargado.</p>
                    </div>

                {/if}
            </div>
        </div>
    </div>

    {include file='general/popup.tpl' ID_POPUP='manifiesto_preview'}
</body>

<script>

    function verInfoManifiesto(manifiesto_id)
    {
        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/ajax/ajax_obtener_informacion_manifiesto.php",
            data: { manifiesto_id: manifiesto_id },
            dataType: "html",
            success: function(html_response) {
                $('#manifiesto_preview_popup_title').html('Informaci&oacute;n Manifiesto');
                $('#manifiesto_preview_popup_body').html(html_response);
                $('#manifiesto_preview_popup_content').width(1024);
            }
        });
    }
</script>

</html>
