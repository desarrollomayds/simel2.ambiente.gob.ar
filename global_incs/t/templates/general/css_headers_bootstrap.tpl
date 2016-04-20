{if isset($bootstrap) and $bootstrap =='true'}
	<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{$ADMIN_PATH}/assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="{$ADMIN_PATH}/assets/css/multitabs-responsive.css"/>
	<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
{/if}

{if isset($datepicker) and $datepicker == 'true'}
	<link rel="stylesheet" href="{$BASE_PATH}/css/bootstrap-datepicker.css" type="text/css" />
{/if}

{if isset($chosen) and $chosen == 'true'}
	<link rel="stylesheet" href="{$BASE_PATH}/css/chosen.min.css" type="text/css" />
{/if}

{if isset($graphs) and $graphs == 'true'}
	<link rel="stylesheet" href="{$BASE_PATH}/javascript/nvd3/build/nv.d3.min.css" type="text/css" />
{/if}

<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/style.css"/>
<!-- estilos usados por Noty -->
<link rel="stylesheet" href="{$BASE_PATH}/css/animate.css" type="text/css" />
<link rel="stylesheet" href="{$BASE_PATH}/css/buttons.css" type="text/css" />