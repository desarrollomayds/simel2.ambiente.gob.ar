<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
</head>

<body style="margin-top:30px">
    {include file='drp/operacion/menuBootstrap.tpl'}

        <div class="main">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
            </ol>
            <form class="form-inline">
                <div class="alert alert-info">
                    <p>A continuaci&oacute;n se mostrar&aacute;n los registros de empresas pendientes y las modificaciones de establecimientos pendientes de aprobaci&oacute;n por parte de los administradores.</p>
                    <p>Los registros o cambios asignados se desvincular&aacute;n de la cuenta pasadas 24 horas desde su asignaci&oacute;n.</p>
                </div>
            </form>

            <div class="row" style="padding:15px">
            		
            		<a href="listado_registros_pendientes.php">
			            <div class="col-xs-12 col-md-5" style="border: 1px solid #ddd">
			            	<h3>Registraciones Pendientes</h3>
			            	<p>Cantidad: <b>{$REGISTROS}</b></p>
			            	<p>Asignadas: X</p>
			            </div>
			        </a>

		            <div class="col-xs-12 col-md-5 col-md-offset-2" style="border: 1px solid #ddd">
		            	<h3>Modificaciones Pendientes</h3>
		            	<p>Cantidad: <b>X</b></p>
		            	<p>Asignadas: X</p>
		            </div>

	        </div>







            <br>
            
        </div>
    </div>
</body>

<script>

</script>

</html>
