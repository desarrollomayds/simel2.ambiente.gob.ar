<div style="width:780px;color: #333333;font-size:9px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;">
    <br/><br/>
    <div style="margin-left: 10px;">
    <div style="width:760px;">
        <table style="width:755px;border: 1px solid black;border-collapse:collapse;font-size:11px; font-family: Arial,Helvetica,sans-serif;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>DATOS DE LA EMPRESA</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CUIT:</strong>{$EMPRESA.CUIT}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>ROLES:</strong>{if $EMPRESA.ROLES.GENERADOR}
                    Generador
                    {/if}
                    {if $EMPRESA.ROLES.TRANSPORTISTA}
                    Transportista
                    {/if}
                    {if $EMPRESA.ROLES.OPERADOR}
                    Operador
                    {/if}
                </td>
                <td style="border: 1px solid black;"><strong>Fec. Ini. Act:</strong>{$EMPRESA.FECHA_INICIO_ACT}</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE:</strong>{$EMPRESA.NOMBRE}</td>
                <td style="border: 1px solid black;"><strong>TELEFONO:</stronge>{$EMPRESA.NUMERO_TELEFONICO}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>MAIL:</strong>{$EMPRESA.DIRECCION_EMAIL}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL:<br/><strong>Calle : </strong>{$EMPRESA.CALLE_R}&nbsp<strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_R}&nbsp<strong>Piso : </strong>{$EMPRESA.PISO_R}&nbsp<strong>Oficina : </strong>{$EMPRESA.OFICINA_R}<strong><br/>Provincia : </strong>{$EMPRESA.PROVINCIA_R_}<strong>&nbspLocalidad : </strong>{$EMPRESA.LOCALIDAD_R_}</td>

            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO<br/><strong>Calle : </strong>{$EMPRESA.CALLE_C}<strong>&nbsp;N&uacute;mero : </strong>{$EMPRESA.NUMERO_C}<strong>&nbsp;Piso : </strong>{$EMPRESA.PISO_C}<strong>&nbsp;Oficina : </strong>{$EMPRESA.OFICINA_C}<strong><br/>Provincia : </strong>{$EMPRESA.PROVINCIA_C_}<strong>&nbsp;Localidad : </strong>{$EMPRESA.LOCALIDAD_C_}</td>
            </tr>
        </table>

    </div>

    <br/><br/>
    {foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
    <div style="width:760px;">
        <table style="width:755px;border: 1px solid black;font-size:11px; font-family: Arial,Helvetica,sans-serif;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE LEGAL</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE:</strong>{$REPRESENTANTE.NOMBRE}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO:</strong>{$REPRESENTANTE.APELLIDO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO:</strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO:</strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
                <td style="border: 1px solid black;"><strong>N&uacute;mero:</strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>CUIT:</strong>{$REPRESENTANTE.CUIT}</td>
            </tr>

        </table>

    </div>
    <br/><br/>
    {/foreach}

    {foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
    <div style="width:760px;">
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE TECNICO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE:</strong>{$REPRESENTANTE.NOMBRE}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO:</strong>{$REPRESENTANTE.APELLIDO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO:</strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO:</strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
                <td style="border: 1px solid black;"><strong>N&uacute;mero:</strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
                <td style="border: 1px solid black;"><strong>CUIT:</strong>{$REPRESENTANTE.CUIT}</td>
                <td height="20" ><strong>Cargo : </strong>{$REPRESENTANTE.CARGO}</td>
            </tr>

        </table>

    </div>
    <br/><br/>

    {/foreach}
    {foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
    <div style="width:760px;">
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE:{$ESTABLECIMIENTO.NOMBRE}</strong>{$EMPRESA.CUIT}</td>
                <td  style="border: 1px solid black;"><strong>TIPO:</strong>{$ESTABLECIMIENTO.TIPO_}</td>
                <td colspan="2"style="border: 1px solid black;"><strong>USUARIO:</strong>{$ESTABLECIMIENTO.USUARIO}</td>


            </tr>
            <tr>
                <td  colspan="4" style="border: 1px solid black;"><strong>ACTIVIDAD:</strong>{$ESTABLECIMIENTO.ACTIVIDAD_}</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DESCRIPCION:</strong>{$ESTABLECIMIENTO.DESCRIPCION}</td>

            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL:<br/><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_R}&nbsp<strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_R}&nbsp<strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_R}&nbsp<strong><br/>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}<strong>&nbspLocalidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}</td>

            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO<br/><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_C}<strong>&nbsp;N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_C}<strong>&nbsp;Piso : </strong>{$ESTABLECIMIENTO.PISO_C}<strong><br/>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}<strong>&nbsp;Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMENCLATURA CATASTRAL </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</td>
                <td  style="border: 1px solid black;" colspan="3"><strong>HABILITACIONES:</strong>{$ESTABLECIMIENTO.HABILITACIONES}</td>
            </tr>
        </table>

    </div>

    <br/><br/>
    {/foreach}

{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
        {foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
    <div style="width:760px;">
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE TECNICO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO:</strong>{$ESTABLECIMIENTO.NOMBRE}</td>
                <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO:</strong>{$PERMISO.RESIDUO_}</td>


            </tr>
            <tr>
                <td  style="border: 1px solid black;"><strong>ESTADO:</strong>{$PERMISO.ESTADO_}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE INICIO:</strong>{$PERMISO.FECHA_INICIO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE FIN:</strong>{$PERMISO.FECHA_FIN}</td>
                <td style="border: 1px solid black;"><strong>CANTIDAD:</strong>{$PERMISO.CANTIDAD}</td>

            </tr>

        </table>

    </div>
    <br/><br/>
      {/foreach}
{/foreach}


{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
        {foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
 <div style="width:760px;">
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="background-color: gainsboro;border: 1px solid black;text-align:center;"><strong>VEHICULO REGISTRADO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO:</strong>{$ESTABLECIMIENTO.NOMBRE}</td>
                <td style="border: 1px solid black;"><strong>DOMINIO:</strong>{$VEHICULO.DOMINIO}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>DESCRIPCION:</strong>{$VEHICULO.DESCRIPCION}</td>

            </tr>

        </table>

    </div>
    <br/><br/>

          {/foreach}
{/foreach}


{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
        {foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
                {foreach $VEHICULO.PERMISOS as $PERMISO}

  <div style="width:760px;">
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISO DE TRASLADO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>VEHICULO:</strong>{$VEHICULO.DOMINIO}</td>
                <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO:</strong>{$PERMISO.RESIDUO_}</td>


            </tr>
            <tr>
                <td  style="border: 1px solid black;"><strong>CANTIDAD:</strong>{$PERMISO.CANTIDAD}</td>
                <td style="border: 1px solid black;"><strong>ESTADO:</strong>{$PERMISO.ESTADO_}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE INICIO:</strong>{$PERMISO.FECHA_INICIO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE FIN:</strong>{$PERMISO.FECHA_FIN}</td>

            </tr>

        </table>

    </div>
    <br/><br/>
                {/foreach}
        {/foreach}
{/foreach}
<div style="width:90%;text-align: center;margin:auto;">
<table>
        <tr>
                <td height="20" bgcolor="#EAEAE5"><img src="/registracion/barcode.php?code={$EMPRESA.ID}"></td>
        </tr>
        <tr>
                <td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de registraci&oacute;n: </strong>{$EMPRESA.ID}</td>
        </tr>
</table>
</div>
 </div>
</div>



