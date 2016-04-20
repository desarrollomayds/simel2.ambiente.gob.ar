<script type="text/javascript">
	var admin_path 	= '{$ADMIN_PATH}';
	var mel_path 	= '{$MEL_PATH}';
	var base_path 	= '{$WEB_PATH}';
	var asset_path  = '{$BASE_PATH}'; // contexto javascript
</script>

<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.noty.packaged.min.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.number.min.js"></script>

{if $bootstrap == 'true' }
	<script type="text/javascript" src="{$BASE_PATH}/javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$ADMIN_PATH}/assets/js/xeditable/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<script type="text/javascript" src="{$ADMIN_PATH}/assets/js/bootstrap-responsive-tabs.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/bootstrap-dialog.min.js"></script>
{/if}

{IF isset($mapa) and $mapa == 'true' }
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.geocomplete.min.js"></script>
{/IF}


{if isset($datepicker) and $datepicker == 'true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/bootstrap-datepicker.js"></script>
{/if}

{if isset($chosen) and $chosen == 'true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/chosen.jquery.js"></script>
{/if}

{if isset($graphs) and $graphs == 'true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/nvd3/build/d3.min.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/nvd3/build/nv.d3.min.js"></script>
{/if}

<script type="text/javascript" src="{$BASE_PATH}/javascript/global.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/admin/base.js"></script>