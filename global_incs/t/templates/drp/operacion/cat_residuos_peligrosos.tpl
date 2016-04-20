<div class="backGrey" style="padding:10px;">

    <form class="form-horizontal" id="tablas-forms">

        <input id="geocomplete" type="hidden">
        <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

        <input type="hidden" name="residuo" id="residuo" value="{$residuo}">
        <input type="hidden" name ="codigo" id="codigo" value="{$residuo->codigo}">
        <input type="hidden" name ="codigo" id="codigo" value="{$residuo->codigo}">
        

        <p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Informaci&oacute;n Residuos Peligrosos</p>

        <div class="form-group">
            <label class="col-sm-3 control-label">C&oacute;digo</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="{$residuo->codigo}" id="codigo" name="codigo" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Categor&oacute;a</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="{$residuo->categoria}" id="categoria" name="categoria" value="{$residuo->categoria}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Descripci&oacute;n</span></label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="descripcion" name="descripcion" value="{$residuo->descripcion}" disabled>
            </div>
        </div>

        
        

        <div style="clear:both;"></div>

        

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-6 text-left">
            <a href="javascript:void(0)" class="btn btn-success" onClick="cat_residuos_peligrosos()">Aceptar</a>
        </div>
        <div class="col-xs-6 text-right">
            <a href="javascript:void(0)" class="btn btn-danger" onClick="cancelar()">Cancelar</a>
        </div>
    </div>

    <div class="clear20"></div>
</div>

{literal}
    <script>
        $(document).ready(function() {
            removeFieldErrors();


        function cat_residuos_peligrosos()
        {
            var campos = ['codigo','categoria','descripcion']

           
            

            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/cat_residuos_peligrosos.php",
                data: {
                    //form_values,
                    accion: "aprobar",
                    codigo: $('#codigo').val(),
                    categoria: $('#categoria').val(),
                    descripcion: $('#descripcion').val(),
                    
                },
                dataType: "text json",
                success: function(retorno)
                {   
                    if (retorno['estado'] == 0) 
                    {
                        location.reload();
                    }
                    else 
                    {
                        valicacion_formulario_modal(retorno['errores']);

                        mostrarMensaje('exclamation-triangle', 'Hubo errores a la hora de procesar el formulario, revise los campos indicados.', 'warning');
                        return false;
                    }
                }
            });
        }

        function cancelar()
        {
            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/cat_residuos_peligrosos.php",
                data: {
                    accion: "rechazar",
                    residuos: $("#residuo").val(),
                },
                dataType: "json",
                success: function(data)
                {
                    if (data.respuesta)
                        location.reload();
                }
            });
        }

    </script>
{/literal}