<div id="{$ID_POPUP}_popup" class="modal fade" style="overflow:auto;">
	<div class="modal-dialog" id="{$ID_POPUP}_popup_content">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h4 id="{$ID_POPUP}_popup_title" class="modal-title" style="color:#31708f;"></h4>
			</div>
			<div id="{$ID_POPUP}_popup_body" class="modal-body">

			</div>
		</div>
	</div>

	{if isset($HIDDEN_INFO) and $HIDDEN_INFO == 'true'}
		<input type="hidden" id="{$ID_POPUP}_hidden_info" value="" />
	{/if}

</div>