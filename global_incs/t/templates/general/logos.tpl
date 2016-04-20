<div id='alertas'>{$ALERTA.mensaje}</div>
<div id="logo" style="width: 100%;">
	<a href="{$HOME_URL}"><img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" /></a>
	<a href="{$HOME_URL}"><img style="float: left;margin-left: 120px" src="{$BASE_PATH}/imagenes/logo_mel.gif" /></a>
	<a href="{$HOME_URL}"><img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" /></a>
</div>
<div style="height: 0px;width: 100%;clear:both;"></div>
{if $MODULO_BOLETAS == 'si'}
<script type="text/javascript">
	$( document ).ready(function() {
    	$( ".imgBox" ).show();
	});
</script>
{/if}
