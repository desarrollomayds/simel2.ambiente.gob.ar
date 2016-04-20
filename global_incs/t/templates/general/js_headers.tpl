<script type="text/javascript">
	var admin_path 	= '{$ADMIN_PATH}';
	var mel_path 	= '{$MEL_PATH}';
	var base_path 	= '{$WEB_PATH}';
	var asset_path  = '{$BASE_PATH}'; // contexto javascript
</script>

<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.noty.packaged.min.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.number.min.js"></script>

{IF isset($bootstrap) and $bootstrap == 'true' }
<script type="text/javascript" src="{$BASE_PATH}/javascript/bootstrap.min.js"></script>
<script src="{$BASE_PATH}/javascript/bootstrap-dialog.min.js"></script>
{/IF}

{IF isset($mapa) and $mapa == 'true' }
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.geocomplete.min.js"></script>
{/IF}

{IF isset($chosen) and $chosen == 'true'}
<script type="text/javascript" src="{$BASE_PATH}/javascript/chosen.jquery.js"></script>
{/IF}

{IF isset($filter) and $filter == 'true'}
<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.filter_input.js"></script>
{/IF}

{IF isset($epoch) and $epoch == 'true'}
<script type="text/javascript" src="{$BASE_PATH}/javascript/epoch_classes.js"></script>
{/IF}

{IF isset($datepicker) and $datepicker == 'true'}
<script type="text/javascript" src="{$BASE_PATH}/javascript/bootstrap-datepicker.js"></script>
{/IF}

{IF isset($cuit) and $cuit == 'true'}
<script type="text/javascript" src="{$BASE_PATH}/javascript/validaciones_cuit.js"></script>
{/IF}

{IF isset($progressButton) and $progressButton == 'true'}
	<script src="{$BASE_PATH}/cpb/js/modernizr.custom.js"></script>
	<script src="{$BASE_PATH}/cpb/js/classie.js"></script>
	<script src="{$BASE_PATH}/cpb/js/uiProgressButton.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/plugins/progressButton.js"></script>
{/IF}

<script type="text/javascript" src="{$BASE_PATH}/javascript/global.js"></script>
