<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
<!--{$rutas|@print_r} -->
<div class="container" style="width: 550px;">
  <div class="panel-group" id="accordion">

{if $INFO}
    {foreach $INFO as $key => $ruta}
    <div id="{$RUTAS.$key.ID}">
    <div class="panel panel-default">
      <div class="panel-heading">
        
          <i class="fa fa-truck"/> {$RUTAS.$key.DESCRIPCION}
        
        <div class="btn-group btn-group-sm" role="group" style="float:right;">
			<button type="button" class="btn btn-default" data-toggle="collapse" data-parent="#accordion" onclick="$('#collapse{$ruta.ID}').collapse('toggle')"><i class="fa fa-search"/> Ver ruta</button>
			<button type="button" class="btn btn-default" onclick="usar_ruta({$RUTAS.$key.ID})"><i class="fa fa-plus-circle"/> Usar</button>
      <button type="button" class="btn btn-default" onclick="editar_ruta({$RUTAS.$key.ID},'{$RUTAS.$key.DESCRIPCION}')"><i class="fa fa-pencil-square-o"/> Editar</button>
			<button type="button" class="btn btn-default" onclick="eliminar_ruta({$RUTAS.$key.ID},'{$RUTAS.$key.DESCRIPCION}')"><i class="fa fa-trash-o"/> Eliminar</button>
		</div>
		<div class="clearfix"></div>
      </div>
      <div id="collapse{$ruta.ID}" class="panel-collapse collapse">
        <div class="panel-body">
        {foreach $ruta.ESTABLECIMIENTOS as $generador}
        	<i class="fa fa-map-marker"/> {$generador.NOMBRE} - {$generador.LOCALIDAD_R_}, {$generador.PROVINCIA_R_}<br>
        {/foreach}
        </div>
      </div>
    </div>
    </div>
    {/foreach}
{/if}

  </div> 
</div>