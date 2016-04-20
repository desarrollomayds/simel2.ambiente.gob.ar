	<!-- popup confirmar eliminicion favoritos -->
	<div id="confirmar_borrado_fav" class="modal fade">
		<div class="modal-dialog" id="confirmar_borrado_fav_content">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
					<h4 id="confirmar_borrado_fav_title" class="modal-title" style="color:#31708f;"></h4>
				</div>
				<div id="confirmar_borrado_fav_body" class="modal-body">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="conf_elim_fav" value=""
				onclick="eliminarFavorito();">Eliminar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- popup confirmar eliminicion flota -->
	<div id="confirmar_borrado_flota" class="modal fade">
		<div class="modal-dialog" id="confirmar_borrado_flota_content">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
					<h4 id="confirmar_borrado_flota_title" class="modal-title" style="color:#31708f;"></h4>
				</div>
				<div id="confirmar_borrado_flota_body" class="modal-body">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="conf_elim_flota" value=""
				onclick="eliminarFlota();">Eliminar</button>
				</div>
			</div>
		</div>
	</div>