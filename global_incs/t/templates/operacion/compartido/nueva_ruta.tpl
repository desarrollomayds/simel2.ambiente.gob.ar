<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
<div class="container" style="width: 550px;">
  <div class="panel-group" id="accordion2">
    <div class="panel panel-default">
      <div class="panel-heading">
		<div class="input-group buscador_cuit" id="input_nombre">  
			<input type="text" style="width:410px;" class="form-control" placeholder="Nombre de ruta"
				name='nombre_de_ruta' id='nombre_de_ruta'>
			<span class="input-group-btn" data-toggle="collapse" data-parent="#accordion2">
				<button class="btn btn-default" type="button" onclick="btn_guardar_nombre_ruta()">Guardar</button>
			</span>
		</div>

      </div>
      <div id="collapse_nuevo" class="panel-collapse collapse">
        <div class="panel-body">
        	<div>
				<div class="col-lg-6" style="float:left">
					<div class="input-group buscador_cuit" style="width:450px;">
						<input type="text" class="form-control input_numerico" placeholder="Ingrese un CUIT..."
							name='{$entidad_buscada}_cuit' id='cuit'>
						<span class="input-group-btn" data-parent="#accordion2" href="#collapse_nuevo">
							<button class="btn btn-default" onclick="buscarPorCuit()" type="button">Buscar y seleccionar generador</button>
						</span>
					</div>
				</div>
			</div>
			<div style='float:left;padding:10px;width:100%;' id='generadores'></div>
			<div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div> 
</div>