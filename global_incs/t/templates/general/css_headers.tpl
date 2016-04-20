<!-- en estas 3 hojas hay estilos generales y para popups. hay que unificar en algun momento -->
<link rel="stylesheet" href="{$BASE_PATH}/css/general.css" type="text/css" />
<link rel="stylesheet" href="{$BASE_PATH}/css/interior.css" type="text/css" /><!-- este tiene que desaparecer -->
<link rel="stylesheet" href="{$BASE_PATH}/css/daterangepicker.css" type="text/css" />

{IF isset($bootstrap) and $bootstrap == 'true'}
<link rel="stylesheet"  href="{$BASE_PATH}/css/bootstrap.css" type="text/css" />
<link href="{$BASE_PATH}/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<link href="{$BASE_PATH}/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
{/IF}

<link rel="stylesheet" type="text/css" href="{$ACTUAL_PATH}/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/css/style.css"/>

{IF isset($chosen) and $chosen == 'true'}
<link rel="stylesheet" href="{$BASE_PATH}/css/chosen.min.css" type="text/css" />
{/IF}

{IF isset($epoch) and $epoch == 'true'}
<link rel="stylesheet" href="{$BASE_PATH}/css/epoch_styles.css" type="text/css" />
{/IF}

{IF isset($formularios) and $formularios == 'true'}
<link rel="stylesheet" href="{$BASE_PATH}/css/formularios.css" type="text/css" />
{/IF}

{IF isset($datepicker) and $datepicker == 'true'}
<link rel="stylesheet" href="{$BASE_PATH}/css/bootstrap-datepicker.css" type="text/css" />
{/IF}

{IF isset($progressButton) and $progressButton == 'true'}
<!-- estilos Circulas progress button -->
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/cpb/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/cpb/css/component.css" />
{/IF}

<!-- estilos usados por Noty -->
<link rel="stylesheet" href="{$BASE_PATH}/css/animate.css" type="text/css" />
<link rel="stylesheet" href="{$BASE_PATH}/css/buttons.css" type="text/css" />
