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
                <td style="border: 1px solid black;"><strong>CUIT: </strong>{$EMPRESA->cuit}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>ROLES: </strong>
                    {foreach $ESTABLECIMIENTOS as $ESTABLECIMIENTO}
                        {if $ESTABLECIMIENTO->tipo == 1}
                            Generador
                        {/if}
                        {if $ESTABLECIMIENTO->tipo == 2}
                            Transportista
                        {/if}
                        {if $ESTABLECIMIENTO->tipo == 3}
                            Operador
                        {/if}
                    {/foreach}
                </td>
                <td style="border: 1px solid black;"><strong>Fec. Ini. Act: </strong>
                    {if $EMPRESA->fecha_inicio_act != ''}
                        {$EMPRESA->fecha_inicio_act->format('Y-m-d')}
                    {else}
                        &nbsp;
                    {/if}
                    </td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$EMPRESA->nombre}</td>
                <td style="border: 1px solid black;"><strong>TELEFONO: </strong>{$EMPRESA->numero_telefonico}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong>{$EMPRESA->calle}&nbsp;<strong>N&uacute;mero: </strong>{$EMPRESA->numero}&nbsp;<strong>Piso: </strong>{$EMPRESA->piso}&nbsp;<strong>Oficina: </strong>{$EMPRESA->oficina}<strong><br>Provincia: </strong>{obtener_provincia($EMPRESA->provincia)} ({$EMPRESA->provincia})<strong>&nbsp;Localidad: </strong>{obtener_localidad($EMPRESA->localidad)} ({$EMPRESA->localidad})<br><strong>C. Postal: </strong>{$EMPRESA->codigo_postal}</td>

            </tr>

            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO LEGAL: <br><strong>Calle: </strong>{$EMPRESA->calle_l}&nbsp;<strong>N&uacute;mero: </strong>{$EMPRESA->numero_l}&nbsp;<strong>Piso: </strong>{$EMPRESA->piso_l}&nbsp;<strong>Oficina: </strong>{$EMPRESA->oficina_l}<strong><br>Provincia: </strong>{obtener_provincia($EMPRESA->provincia_l)} ({$EMPRESA->provincia_l})<strong>&nbsp;Localidad: </strong>{obtener_localidad($EMPRESA->localidad_l)} ({$EMPRESA->localidad_l})<br><strong>C. Postal: </strong>{$EMPRESA->codigo_postal_l}</td>
            </tr>

            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO: <br><strong>Calle: </strong>{$EMPRESA->calle_c}<strong>&nbsp;N&uacute;mero: </strong>{$EMPRESA->numero_c}<strong>&nbsp;Piso: </strong>{$EMPRESA->piso_c}<strong>&nbsp;Oficina: </strong>{$EMPRESA->oficina_c}<strong><br>Provincia: </strong>{obtener_provincia($EMPRESA->provincia_c)} ({$EMPRESA->provincia_c})<strong>&nbsp;Localidad: </strong>{obtener_localidad($EMPRESA->localidad_c)} ({$EMPRESA->localidad_c})<br><strong>C. Postal: </strong>{$EMPRESA->codigo_postal_c}</td>
            </tr>
        </table>

    <br><br><br>

    {foreach $EMPRESA->representantes_legales as $REPRESENTANTE}
        <table style="width:755px;border: 1px solid black;font-size:11px; font-family: Arial,Helvetica,sans-serif;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE LEGAL</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$REPRESENTANTE->nombre}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong>{$REPRESENTANTE->apellido}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>
                    {if $REPRESENTANTE->fecha_nacimiento != ''}
                        {$REPRESENTANTE->fecha_nacimiento->format('Y-m-d')}
                    {else}
                        &nbsp;
                    {/if}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong>{$REPRESENTANTE->tipo_documento}</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong>{$REPRESENTANTE->numero_documento}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>CUIT: </strong>{$REPRESENTANTE->cuit}</td>
            </tr>
        </table>
        <br><br>
    {/foreach}


    {foreach $EMPRESA->representantes_tecnicos as $REPRESENTANTE}
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE TECNICO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$REPRESENTANTE->nombre}</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong>{$REPRESENTANTE->apellido}</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>
                    {if $REPRESENTANTE->fecha_nacimiento != ''}
                        {$REPRESENTANTE->fecha_nacimiento->format('Y-m-d')}
                    {else}
                        &nbsp;
                    {/if}
               </td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong>{$REPRESENTANTE->tipo_documento}</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong>{$REPRESENTANTE->numero_documento}</td>
                <td style="border: 1px solid black;"><strong>CUIT: </strong>{$REPRESENTANTE->cuit}</td>
                <td height="20" ><strong>Cargo: </strong>{$REPRESENTANTE->cargo}</td>
            </tr>
        </table>
        <br><br><br>
    {/foreach}


    {foreach $ESTABLECIMIENTOS as $ESTABLECIMIENTO}
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong>{$ESTABLECIMIENTO->nombre}</td>
                <td  style="border: 1px solid black;"><strong>TIPO: </strong>{obtener_tipo($ESTABLECIMIENTO->tipo)}</td>
                <td colspan="2"style="border: 1px solid black;"><strong>USUARIO: </strong>{$ESTABLECIMIENTO->usuario}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CAA: </strong>{$ESTABLECIMIENTO->caa_numero}</td>
                <td colspan="3" style="border: 1px solid black;"><strong>CAA VENCIMIENTO: </strong>{if $ESTABLECIMIENTO->caa_vencimiento != ''}{$ESTABLECIMIENTO->caa_vencimiento->format('Y-m-d')}{else}&nbsp;{/if}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Expediente / A&ntilde;o: </strong>{$ESTABLECIMIENTO->expediente_numero} / {$ESTABLECIMIENTO->expediente_anio}
                </td>
            </tr>
            <tr>
                <td  colspan="4" style="border: 1px solid black;"><strong>ACTIVIDAD: </strong>
                {$ESTABLECIMIENTO->codigo_actividad} - {utf8_encode(obtener_actividad($ESTABLECIMIENTO->codigo_actividad))}</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DESCRIPCION: </strong>{$ESTABLECIMIENTO->descripcion}</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DIRECCI&Oacute;N EMAIL: </strong>{$ESTABLECIMIENTO->email}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong>{$ESTABLECIMIENTO->calle}&nbsp;<strong>N&uacute;mero: </strong>{$ESTABLECIMIENTO->numero}&nbsp;<strong>Piso: </strong>{$ESTABLECIMIENTO->piso}&nbsp;<strong><br>Provincia: </strong>{obtener_provincia($ESTABLECIMIENTO->provincia)} ({$ESTABLECIMIENTO->provincia})<strong>&nbsp;Localidad: </strong>{obtener_localidad($ESTABLECIMIENTO->localidad)} ({$ESTABLECIMIENTO->localidad})<br><strong>C. Postal: </strong>{$ESTABLECIMIENTO->codigo_postal}</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO:<br><strong>Calle: </strong>{$ESTABLECIMIENTO->calle_c}<strong>&nbsp;N&uacute;mero: </strong>{$ESTABLECIMIENTO->numero_c}<strong>&nbsp;Piso: </strong>{$ESTABLECIMIENTO->piso_c}<strong><br>Provincia: </strong>{obtener_provincia($ESTABLECIMIENTO->provincia_c)} ({$ESTABLECIMIENTO->provincia_c})<strong>&nbsp;Localidad: </strong>{obtener_localidad($ESTABLECIMIENTO->localidad_c)} ({$ESTABLECIMIENTO->localidad_c})<br><strong>C. Postal: </strong>{$ESTABLECIMIENTO->codigo_postal_c}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMENCLATURA CATASTRAL </strong>{$ESTABLECIMIENTO->nomenclatura_catastral_circ} - {$ESTABLECIMIENTO->nomenclatura_catastral_sec} - {$ESTABLECIMIENTO->nomenclatura_catastral_manz} - {$ESTABLECIMIENTO->nomenclatura_catastral_parc} - {$ESTABLECIMIENTO->nomenclatura_catastral_sub_parc}</td>
                <td  style="border: 1px solid black;" colspan="3"><strong>HABILITACIONES: </strong>{$ESTABLECIMIENTO->habilitaciones}</td>
            </tr>
        </table>
        <br>

        {foreach $ESTABLECIMIENTO->permisos_establecimientos as $PERMISO}
            <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                <tr>
                    <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL ESTABLECIMIENTO</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong>{$ESTABLECIMIENTO->nombre}</td>
                    <td colspan="3" rowspan="2" style="border: 1px solid black;"><strong>RESIDUO: </strong>{$PERMISO->residuo} - {obtener_categoria_residuo($PERMISO->residuo)}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>CANTIDAD: </strong>{if $ESTABLECIMIENTO->tipo == 1}{$PERMISO->cantidad}{else}-{/if}</td>
                </tr>

                {if $ESTABLECIMIENTO->tipo == 3}
                    <tr>
                        <td colspan="4" style="border: 1px solid black;"><strong>PERMISOS DE ELIMINACION DE RESIDUOS: </strong><br>
                            <ul>
                                {foreach $PERMISO->tratamientos as $TRATAMIENTO}
                                    <li>{$TRATAMIENTO->operacion_residuo}</li>
                                {/foreach}
                            </ul>
                        </td>
                    </tr>
                {/if}

            </table>
            <br>
        {/foreach}

          {if $ESTABLECIMIENTO->tipo == 2}

            {foreach $ESTABLECIMIENTO->vehiculos as $VEHICULO}
                <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                    <tr>
                        <td colspan="4" style="background-color: gainsboro;border: 1px solid black;text-align:center;"><strong>VEHICULO REGISTRADO</strong></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;"><strong>ESTABLECIMIENTO: </strong>{$ESTABLECIMIENTO->nombre}</td>
                        <td style="border: 1px solid black;"><strong>DOMINIO: </strong>{$VEHICULO->dominio}</td>
                        <td colspan="2" style="border: 1px solid black;"><strong>DESCRIPCION: </strong>{$VEHICULO->descripcion}</td>
                    </tr>

                </table>

                <br>

                {foreach $VEHICULO->permisos_vehiculos as $PERMISO}
                    <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                        <tr>
                            <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL VEHICULO</strong></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;"><strong>VEHICULO: </strong>{$VEHICULO->dominio}</td>
                            <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO: </strong>{$PERMISO->residuo} - {obtener_categoria_residuo($PERMISO->residuo)}</td>
                        </tr>
                        <tr>
                            <td  style="border: 1px solid black;"><strong>CANTIDAD: </strong>{$PERMISO->cantidad}</td>
                            <td style="border: 1px solid black;"><strong>ESTADO: </strong>{obtener_estado($PERMISO->estado)}</td>
                        </tr>
                    </table>
                {/foreach}
            {/foreach}
          {/if}
        <br><br><br>
    {/foreach}

<div style="width:90%;text-align: center;margin:auto;">
<table> 
    <tr>
       <td height="20" bgcolor="#EAEAE5"><img src="http://manifiestos/me/registracion/barcode.php?code={$CODIGO}"></td>
    </tr>
    <tr>
            <td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de registraci&oacute;n: </strong>{$CODIGO}</td>
    </tr>
</table>
</div>
</div>
</div>


