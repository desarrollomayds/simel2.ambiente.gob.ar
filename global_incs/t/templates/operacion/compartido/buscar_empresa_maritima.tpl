{if isset($action) and $action == 'busqueda'}

	{if $data.estado == 'ok'} {* parse de establecimientos buques 20008742031 *}
		<div class='input-group buscador_cuit' id='resultado_cuit' style='width:100%;'>

			<p><b>Empresa:</b> {$data.establecimientos[0].NOMBRE_EMPRESA}</p>
			<p><b>CUIT:</b> {$data.establecimientos[0].CUIT}</p>

			<table class="table table-hover table-striped" style="margin-top:20px;">
				<thead>
					<tr>
						<th class="invisible">ID</th>
						<th>Buque</th>
						<th>Domicilio</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					{foreach $data.establecimientos as $est}
						<tr>
							<td class="invisible">{$est.ID}</td>
							<td>{$est.NOMBRE_ESTABLECIMIENTO}</td>
							<td>{$est.CALLE} {$est.NUMERO} {$est.PISO}</td>
							<td><button type='button' class='btn btn-default pull-right' data-dismiss='modal' onclick='agregar_empresa("{$est.ID}")'>Agregar</button></td>
						</tr>
					{/foreach}
				</tbody>
			</table>
	   	</div>

	   	<div align="center">
	   		<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal' onclick='registrar_nueva_empresa("solo_buque");'>Agregar Buque</button>
	   	</div>
	{elseif $data.descripcion == "ofrecer_alta_temprana"} {* show alta temprana  20002664039 *}
		<div class='input-group buscador_cuit' id='resultado_cuit' style='width:100%;'>
	    	<table border='1' align='center'>
	    		<tr>
	    			<td align='center' style='padding:7px;line-height:40px;'>
    					<h5>El CUIT no se encuentra registrado. ¿Desea registrar una nueva empresa naviera/mar&iacute;tima?</h5>
    					<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal' onclick='registrar_nueva_empresa("empresa_buque");'>Registrar empresa</button>
    				</td>
    			</tr>
    		</table>
    	</div>
	{/if}

{else} <!-- Carga default -->

	<div class="alert alert-danger" role="alert" style="display:none;" id="msj_error"></div>

	<div class="container" style="width: 550px;">
	  <div class="panel-group" id="accordion2">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        
			<div class="input-group buscador_cuit">
				<input type="text" style="width:410px;" class="form-control" placeholder="CUIT"
					name='empresa_cuit' id='empresa_cuit' required>
				<span class="input-group-btn" data-parent="#accordion2" href="#collapse_nuevo">
					<button class="btn btn-default" type="button" onclick="buscar_empresa_cuit()">Buscar</button>
				</span>
			</div>
			
	      </div>
	      <div id="collapse_nuevo" class="panel-collapse collapse" style="width:100%px;">
	        <div class="panel-body">
	        	<div>
					<div class="col-lg-12">
						<div class="input-group buscador_cuit" id="resultado_cuit">
							
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
	        </div>
	      </div>
	    </div>
	  </div> 
	</div>

{/if}
