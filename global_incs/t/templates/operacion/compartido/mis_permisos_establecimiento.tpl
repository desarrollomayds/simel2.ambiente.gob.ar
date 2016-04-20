<div class="backGrey">

    <input type='hidden' name='permiso_accion' id='permiso_accion' value='{$ACCION}' size='50'>
    <input type='hidden' name='permiso_id'     id='permiso_id'     value='{$PERMISO->id}' size='50'>

    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">

        <tr>
            <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Residuo<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='permiso_residuo' id='permiso_residuo' class="permiso_residuo" style='width: 300px'>
                    <option value="">[SELECCIONE TIPO DE RESIDUO]</option>
                    {foreach $RESIDUOS as $RESIDUO}
                        <option value='{$RESIDUO.CODIGO}' {if $RESIDUO.CODIGO == $PERMISO->residuo}selected{/if}>{$RESIDUO.CODIGO} - {$RESIDUO.DESCRIPCION}</option>
                    {/foreach}
                </select>
            </td>
        </tr>

        <tr id="permiso_residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="permiso_residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        {if $ROL_ID == '1'}
        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cantidad (kg)<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='{$PERMISO->cantidad}' size='35'></td>
        </tr>

        <tr id="permiso_cantidad-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="permiso_cantidad-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        {/if}

        {if $ROL_ID == '3'}
        <tr>
            <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Operaciones<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='operaciones_residuo' id='operaciones_residuo' class="operaciones_residuo" style='width: 300px' multiple="multiple">
                    {foreach $OPERACIONES as $OPERACION}
                        <option value='{$OPERACION.CODIGO}'
                         {foreach $MIS_RESIDUOS as $ELIMINACION}
                            {if $OPERACION.CODIGO == $ELIMINACION->operacion_residuo}
                                selected
                            {/if}
                        {/foreach} 
                        >{$OPERACION.CODIGO} - {$OPERACION.DESCRIPCION}
                        </option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr id="operaciones_residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="operaciones_residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        {/if}
    </table>

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            <a href="javascript:void(0)" class="btn btn-success" onClick="aceptar_permisos()">Aceptar</a>
        </div>
    </div>

</div>

{literal}
<script>
    $(".permiso_residuo").chosen({width: "396px"});
    $(".operaciones_residuo").chosen({width: "396px"});

    function aceptar_permisos()
    {

        var campos = ['accion', 'id', 'permiso_residuo', 'permiso_cantidad', 'operaciones_residuo', 'permiso_estado', 'duplicado', 'residuo_pendiente'];

        $.ajax({
            type: "POST",
            url: mel_path + "/operacion/compartido/mis_permisos_establecimiento.php",
            data: {
                accion: $("#permiso_accion").val(),
                id: $("#permiso_id").val(),
                permiso_residuo: $("#permiso_residuo").val(),
                permiso_cantidad: $("#permiso_cantidad").val(),
                operaciones_residuo: JSON.stringify($("#operaciones_residuo").val())
            },
            dataType: "text json",
            success: function(retorno) {

                if (retorno['estado'] == 0)
                {   
                    location.reload();
                }
                else
                {

                    for(campo in campos){
                        texto_errores = '';
                        campo = campos[campo];

                        if(retorno['errores'][campo] != null){


                            if ((campo == 'duplicado' || campo == 'residuo_pendiente') && retorno['errores'][campo])
                            {
                                mostrarMensaje('exclamation-triangle',retorno['errores'][campo],'warning');
                                return false;
                            }
                            else
                            {
                                cerrar_mensajes();
                            }

                            texto_errores = retorno['errores'][campo];
                            $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                            $('#' + campo).addClass('error_de_carga');
                        }else{
                            $('#' + campo).removeClass('error_de_carga');
                        }

                        if(texto_errores != ''){
                            $('#' + campo + '-error').html(texto_errores);
                            $('#' + campo + '-td').show();
                            $('#' + campo + '-error').show();
                            ;
                        }else{
                            $('#' + campo + '-error').hide();
                            $('#' + campo + '-td').hide();
                        }
                    }

                    mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                    return false;
                }

            }
        });
    }

</script>
{/literal}