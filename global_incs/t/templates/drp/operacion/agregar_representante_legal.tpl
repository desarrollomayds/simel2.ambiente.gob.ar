<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            AGREGAR REPRESENTANTE LEGAL
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="495" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;margin-top:-5px;">

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">Nombre :</td>
            <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='resp_nombre'   id='resp_nombre'   value='' size=''></label></td>
        </tr>

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">Apellido :</td>
            <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='resp_apellido' id='resp_apellido'   value='' size=''></label></td>
        </tr>

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de nacimiento :</td>
            <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='resp_fecha_nacimiento' id='resp_fecha_nacimiento'   value='' size='' readonly="true"><input type='button' value='...' id='btn_cal_resp_fecha_nacimiento'></label></td>
        </tr>

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">Tipo de Documento :</td>
            <td width="328" bordercolor="#EAEAE5"><label><select style="font-size: 11px;" name='resp_tipo_doc' id='resp_tipo_doc' style='width: 300px'>
                        {foreach $TIPOS_DOCUMENTO as $TIPO_DOCUMENTO}
                        <option value='{$TIPO_DOCUMENTO.ID}'>{$TIPO_DOCUMENTO.DESCRIPCION}</option>
                        {/foreach}
                    </select></label></td>
        </tr>

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero de Documento :</td>
            <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='resp_nro_doc'  id='resp_nro_doc'  maxlength='9'  value='' size='30'></label></td>
        </tr>

        <tr>
            <td width="147" height="25" align="right" bordercolor="#EAEAE5">Cuit :</td>
            <td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='resp_cuit'     id='resp_cuit'     maxlength='11' value='' size='30'></label></td>
        </tr>

        <tr id='sumario_errores' class='invisible'>
            <td colspan="2" align="left" color="red"></td>
        </tr>
    </table>
    <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>

</div>
{literal}
<script>
                    var resp_fecha_nacimiento_instance = null;
                    $(function(){
            $('#resp_cuit').filter_input({regex:'[0-9]'});
                    $('#resp_nro_doc').filter_input({regex:'[0-9]'});
                    resp_fecha_nacimiento_instance = new Epoch('resp_fecha_nacimiento_container', 'popup', document.getElementById('resp_fecha_nacimiento'), 0);
            });
                    $('#btn_cal_resp_fecha_nacimiento').click(function() {
            resp_fecha_nacimiento_instance.toggle();
            })

                    $('#btn_cerrar').click(function() {
            $('#div_popup').hide();
                    $('#bigscreen').css("display", "block");
            })

                    $('#btn_cancelar2').click(function() {
            $('#div_popup').hide();
                    cerrar();
            })

                    $('#btn_aceptar').click(function() {
            var campos = [ 'id', 'nombre', 'apellido', 'fecha_nacimiento', 'tipo_doc', 'nro_doc', 'cuit' ];
                    var prefijo = 'resp';
                    $.ajax({
            type: "POST",
                    url: "/operacion/agregar_representante_legal.php",
                    data:	{	empresa          : {/literal}{$EMPRESA}{literal},
                    nombre           : $("#resp_nombre").val(),
                    apellido         : $("#resp_apellido").val(),
                    fecha_nacimiento : $("#resp_fecha_nacimiento").val(),
                    tipo_doc         : $("#resp_tipo_doc").val(),
                    nro_doc          : $("#resp_nro_doc").val(),
                    cuit             : $("#resp_cuit").val()
            },
                    dataType: "text json",
                    success: function(retorno){
            if (retorno['estado'] == 0){
            location.reload();
            } else{
            texto_errores = '';
                    for (campo in campos){
            campo = campos[campo];
                    if (retorno['errores'][campo] != null){
            texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
                    $('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                    $('#' + prefijo + '_' + campo).addClass('error_de_carga');
            } else{
            $('#' + prefijo + '_' + campo).removeClass('error_de_carga');
            }
            }

            if (texto_errores != ''){
            $('#sumario_errores td:first').html(texto_errores);
                    $('#sumario_errores').show();
                    ;
            } else{
            $('#sumario_errores').hide();
            }
            }
            }
            });
            })
</script>
{/literal}