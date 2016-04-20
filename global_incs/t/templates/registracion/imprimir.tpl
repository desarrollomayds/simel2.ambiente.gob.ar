<div style="width:100%;color: #333333;font-size:9px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;">

    <div id="container">
        <div style="float:left;margin-left:30px;width:70px;">
            <img src="{$BASE_PATH}/imagenes/logo_impresion.gif" />
        </div>
        <div style="float:left;margin:29px 0px 0px 110px;"><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE <br> DIRECCION DE RESIDUOS PELIGROSOS</strong></div>
    </div>
    <div style="clear:both;"></div>

    <div style="padding:5px">
        <table style="width:755px;border: 1px solid black;border-collapse:collapse;font-size:11px; font-family: Arial,Helvetica,sans-serif;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>DATOS DE LA EMPRESA</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CUIT: </strong>{$EMPRESA.CUIT}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>ROLES: </strong>{if $EMPRESA.ROLES.GENERADOR}
                    Generador
                    {/if}
                    {if $EMPRESA.ROLES.TRANSPORTISTA}
                    Transportista
                    {/if}
                    {if $EMPRESA.ROLES.OPERADOR}
                    Operador
                    {/if}
                </td>
                <td style="border: 1px solid black;"><strong>Fec. Ini. Act: </strong>{$EMPRESA.FECHA_INICIO_ACT}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$EMPRESA.NOMBRE}</td>
                <td style="border: 1px solid black;"><strong>TELEFONO: </strong>{$EMPRESA.NUMERO_TELEFONICO}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong>{$EMPRESA.CALLE_R}&nbsp;<strong>N&uacute;mero: </strong>{$EMPRESA.NUMERO_R}&nbsp;<strong>Piso: </strong>{$EMPRESA.PISO_R}&nbsp;<strong>Oficina: </strong>{$EMPRESA.OFICINA_R}<strong><br>Provincia: </strong>{$EMPRESA.PROVINCIA_R_}<strong>&nbsp;Localidad: </strong>{$EMPRESA.LOCALIDAD_R_}<br><strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_R}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong>{$EMPRESA.CALLE_L}&nbsp;<strong>N&uacute;mero: </strong>{$EMPRESA.NUMERO_L}&nbsp;<strong>Piso: </strong>{$EMPRESA.PISO_L}&nbsp;<strong>Oficina: </strong>{$EMPRESA.OFICINA_L}<strong><br>Provincia: </strong>{$EMPRESA.PROVINCIA_L_}<strong>&nbsp;Localidad: </strong>{$EMPRESA.LOCALIDAD_L_}<br><strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_L}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO: <br><strong>Calle: </strong>{$EMPRESA.CALLE_C}<strong>&nbsp;N&uacute;mero: </strong>{$EMPRESA.NUMERO_C}<strong>&nbsp;Piso: </strong>{$EMPRESA.PISO_C}<strong>&nbsp;Oficina: </strong>{$EMPRESA.OFICINA_C}<strong><br>Provincia: </strong>{$EMPRESA.PROVINCIA_C_}<strong>&nbsp;Localidad: </strong>{$EMPRESA.LOCALIDAD_C_}<br><strong>C. Postal: </strong>{$EMPRESA.CPOSTAL_C}</td>
            </tr>
        </table>

    

    <br><br><br>
    {foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
        <table style="width:755px;border: 1px solid black;font-size:11px; font-family: Arial,Helvetica,sans-serif;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE LEGAL</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$REPRESENTANTE.NOMBRE}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong>{$REPRESENTANTE.APELLIDO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>CUIT: </strong>{$REPRESENTANTE.CUIT}</td>
            </tr>

        </table>

    
    <br><br>
    {/foreach}

    {foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE TECNICO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$REPRESENTANTE.NOMBRE}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong>{$REPRESENTANTE.APELLIDO}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
                <td style="border: 1px solid black;"><strong>CUIT: </strong>{$REPRESENTANTE.CUIT}</td>
                <td height="20" ><strong>Cargo: </strong>{$REPRESENTANTE.CARGO}</td>
            </tr>

        </table>

    
    <br><br><br>

    {/foreach}
    {foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$ESTABLECIMIENTO.NOMBRE}</td>
                <td  style="border: 1px solid black;"><strong>TIPO: </strong>{$ESTABLECIMIENTO.TIPO_}</td>
                <td colspan="2"style="border: 1px solid black;"><strong>USUARIO: </strong>{$ESTABLECIMIENTO.USUARIO}</td>


            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CAA: </strong>{$ESTABLECIMIENTO.CAA_NUMERO}</td>
                <td colspan="3" style="border: 1px solid black;"><strong>CAA VENCIMIENTO: </strong>{$ESTABLECIMIENTO.CAA_VENCIMIENTO}</td>
            </tr>
            <tr>
                <td colspan="4"><strong>Expediente / A&ntilde;o: </strong>{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO} / {$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</td>
            </tr>
            <tr>
                <td  colspan="4" style="border: 1px solid black;"><strong>ACTIVIDAD: </strong>
                {$ESTABLECIMIENTO.ACTIVIDAD} - {$ESTABLECIMIENTO.ACTIVIDAD_}</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DESCRIPCION: </strong>{$ESTABLECIMIENTO.DESCRIPCION}</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DIRECCI&Oacute;N EMAIL: </strong>{$ESTABLECIMIENTO.DIRECCION_EMAIL}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong>{$ESTABLECIMIENTO.CALLE_R}&nbsp;<strong>N&uacute;mero: </strong>{$ESTABLECIMIENTO.NUMERO_R}&nbsp;<strong>Piso: </strong>{$ESTABLECIMIENTO.PISO_R}&nbsp;<strong><br>Provincia: </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}<strong>&nbsp;Localidad: </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}<br><strong>C. Postal: </strong>{$ESTABLECIMIENTO.CPOSTAL_R}</td>

            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO:<br><strong>Calle: </strong>{$ESTABLECIMIENTO.CALLE_C}<strong>&nbsp;N&uacute;mero: </strong>{$ESTABLECIMIENTO.NUMERO_C}<strong>&nbsp;Piso: </strong>{$ESTABLECIMIENTO.PISO_C}<strong><br>Provincia: </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}<strong>&nbsp;Localidad: </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}<br><strong>C. Postal: </strong>{$ESTABLECIMIENTO.CPOSTAL_C}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMENCLATURA CATASTRAL </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</td>
                <td  style="border: 1px solid black;" colspan="3"><strong>HABILITACIONES: </strong>{$ESTABLECIMIENTO.HABILITACIONES}</td>
            </tr>
        </table>
        <br>
        
        {foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong>{$ESTABLECIMIENTO.NOMBRE}</td>
                <td colspan="3" rowspan="2" style="border: 1px solid black;"><strong>RESIDUO: </strong>{$PERMISO.RESIDUO} - {$PERMISO.RESIDUO_}</td>


            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CANTIDAD: </strong>{if $ESTABLECIMIENTO.TIPO == 1}{$PERMISO.CANTIDAD}{else}-{/if}</td>
            </tr>

            {if $ESTABLECIMIENTO.TIPO == 3}
            <tr>
                <td colspan="4" style="border: 1px solid black;"><strong>PERMISOS DE ELIMINACION DE RESIDUOS: </strong><br>
                    <ul>
                        {foreach $PERMISO.ELIMINACION as $ELIMINACION}
                            <li>{$PERMISO.ELIMINACION_[$ELIMINACION]}</li>
                        {/foreach}
                    </ul>
                </td>
            </tr>
            {/if}

        </table>
        <br>
      {/foreach}

      {if $ESTABLECIMIENTO.TIPO == 2}

        {foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
            <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                <tr>
                    <td colspan="4" style="background-color: gainsboro;border: 1px solid black;text-align:center;"><strong>VEHICULO REGISTRADO</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong>{$ESTABLECIMIENTO.NOMBRE}</td>
                    <td style="border: 1px solid black;"><strong>DOMINIO: </strong>{$VEHICULO.DOMINIO}</td>
                    <td colspan="2" style="border: 1px solid black;"><strong>DESCRIPCION: </strong>{$VEHICULO.DESCRIPCION}</td>
                </tr>

            </table>

            <br>

            {foreach $VEHICULO.PERMISOS as $PERMISO}
            <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                <tr>
                    <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL VEHICULO</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>VEHICULO: </strong>{$VEHICULO.DOMINIO}</td>
                    <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO: </strong>{$PERMISO.RESIDUO} - {$PERMISO.RESIDUO_}</td>
                </tr>
                <tr>
                    <td  style="border: 1px solid black;"><strong>CANTIDAD: </strong>{$PERMISO.CANTIDAD}</td>
                    <td style="border: 1px solid black;"><strong>ESTADO: </strong>{$PERMISO.ESTADO_}</td>
                </tr>
            </table>
            {/foreach}
        {/foreach}
      {/if}
    <br><br><br>
    {/foreach}

<div style="width:90%;text-align: center;margin:auto;">
<table> 
        <!--
        <tr>
                <td height="20" bgcolor="#EAEAE5"><img src="http://manifiestos/me/registracion/barcode.php?code={$CODIGO}"></td>
        </tr>
        -->
        <tr>
                <td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de registraci&oacute;n: </strong>{$CODIGO}</td>
        </tr>
</table>
</div>
</div>
</div>


