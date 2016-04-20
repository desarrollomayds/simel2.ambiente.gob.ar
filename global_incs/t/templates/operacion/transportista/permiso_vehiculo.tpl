<div class="backGrey">
{if $EXTRA}

    <input type='hidden' name='permiso_vehiculo' id='permiso_vehiculo' value='{$VEHICULO_ID}'>
    <input type='hidden' name='permiso_id' id='permiso_id' value='{$PERMISO_ID}'>
    <input type='hidden' name='permiso_accion' id="permiso_accion" value='{$ACCION}'>

    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

        <tr>
            <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Residuo<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='permiso_residuo' id='permiso_residuo' class="permiso_residuo" style='width: 300px'>
                    <option value="">[SELECCIONE TIPO DE RESIDUO]</option>
                    {foreach $RESIDUOS as $RESIDUO}
                        <option value='{$RESIDUO->codigo}' {if $RESIDUO->codigo == $PERMISO->residuo}selected{/if}>{$RESIDUO->codigo} - {$RESIDUO->descripcion}</option>
                    {/foreach}
                </select>
            </td>
        </tr>

        <tr id="residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cantidad (kg)<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='{$PERMISO->cantidad}' size='35'></td>
        </tr>

        <tr id="cantidad-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="cantidad-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Estado<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='permiso_estado' id='permiso_estado'>
                    <option value="">[SELECCIONE EL ESTADO DE LA SUSTANCIA]</option>
                    <option value='1' {if $PERMISO->estado == 1}selected{/if}>L&iacute;quido</option>
                    <option value='2' {if $PERMISO->estado == 2}selected{/if}>S&oacute;lido</option>
                    <option value='3' {if $PERMISO->estado == 3}selected{/if}>Semi-s&oacute;lido</option>
                </select>
            </td>
        </tr>

        <tr id="estado-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="estado-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

    </table>

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            <a href="javascript:void(0)" class="btn btn-success" onClick="aceptar_permisos_vehiculo()">Aceptar</a>
        </div>
    </div>

    {else}
        <div class="alert alert-danger" role="alert">Para poder agregar un permiso a un veh&iacute;culo es necesario primero agregar al menos un permiso al establecimiento.</div>

        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 text-right">
                <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Volver</a>
            </div>
        </div>

    {/if}
</div>

{literal}
<script>
    $(".permiso_residuo").chosen({width: "396px"});
    $('#permiso_cantidad').filter_input({regex:'[0-9]'});

    function aceptar_permisos_vehiculo()
    {
        var campos  = [ 'accion', 'establecimiento', 'vehiculo', 'id', 'residuo', 'cantidad', 'estado', 'duplicado' ];
        var prefijo = 'permiso';

        $.ajax({
            type: "POST",
            url: mel_path+"/operacion/transportista/permiso_vehiculo.php",
            data:
            {
                accion          : $("#permiso_accion").val(),
                vehiculo        : $("#permiso_vehiculo").val(),
                permiso         : $("#permiso_id").val(),
                residuo         : $("#permiso_residuo").val(),
                cantidad        : $("#permiso_cantidad").val(),
                estado          : $("#permiso_estado").val()
            },
            dataType: "text json",
            success: function(retorno)
            {
                if(retorno['estado'] == 0){
                    location.reload();
                }
                else
                {

                    for(campo in campos){
                        texto_errores = '';
                        campo = campos[campo];

                        if(retorno['errores'][campo] != null){

                            if (campo == 'duplicado' && retorno['errores'][campo])
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