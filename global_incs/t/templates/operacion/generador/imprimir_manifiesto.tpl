        <div style="width: 750px;margin: auto;border:2px solid #dcdbd6;font-family:calibri,Verdana,Arial;">
            <div style="float: left;"><img src="{$BASE_PATH}/imagenes/logo_impresion.gif"/></div>
            <div style="text-align: center"><br/><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE <br/> DIRECCI&Oacute;N DE RESIDUOS PELIGROSOS</strong></div>
           <div style="padding-top: 5px;width: 5px; clear: both;"></div>
                <div style="float: left;margin-left: 100px;"><strong> Manifiesto Ley 24.051</strong></div><div style="float: right;margin-right: 50px;"><strong> Nro {$CODIGO}</strong></div>

<br/>
                <div style="font-size:12px;margin-left:15px;">DATOS IDENTIFICATORIOS/ GENERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                        <td style="border:1px solid black;">NOMBRE</td>
                        <td style="border:1px solid black;">DOMICILIO DE LA PLANTA</td>
                        <td style="border:1px solid black;">EXPEDIENTE</td>
                        <td style="border:1px solid black;">CUIT</td>
                        <td colspan="2" style="text-align: center;border:1px solid black;">C.A.A</td>
                    </tr>
{foreach $GENERADORES as $GENERADOR}
                     <tr style="border:1px solid black;">
                        <td style="border:1px solid black;">{$GENERADOR.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
                        <td style="border:1px solid black;">{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
                        <td style="border:1px solid black;">{$GENERADOR.CUIT}</td>
                        <td style="border:1px solid black;">{$GENERADOR.CAA_NUMERO}</td>
                        <td style="border:1px solid black;">{$GENERADOR.CAA_VENCIMIENTO}</td>
                    </tr>
{/foreach}

                </table>
                 <div style="width: 30px;clear: both;height: 5px;"></div>
                <div style="font-size:12px;margin-left:15px;margin-left:15px;">DATOS IDENTIFICATORIOS/ TRANSPORTISTA</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                        <td style="border:1px solid black;">NOMBRE</td>
                        <td style="border:1px solid black;">DOMICILIO DE LA PLANTA</td>
                        <td style="border:1px solid black;">EXPEDIENTE</td>
                        <td style="border:1px solid black;">CUIT</td>
                        <td colspan="2" style="text-align: center;border:1px solid black;">C.A.A</td>
                    </tr>
{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
                     <tr style="border:1px solid black;">
                        <td style="border:1px solid black;">{$TRANSPORTISTA.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.CUIT}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.CAA_NUMERO}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
                    </tr>
{/foreach}

                </table>
                  <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">DATOS IDENTIFICATORIOS/ OPERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                        <td style="border:1px solid black;">NOMBRE</td>
                        <td style="border:1px solid black;">DOMICILIO DE LA PLANTA</td>
                        <td style="border:1px solid black;">EXPEDIENTE</td>
                        <td style="border:1px solid black;">CUIT</td>
                        <td colspan="2" style="text-align: center;border:1px solid black;">C.A.A</td>
                    </tr>
{foreach $OPERADORES as $OPERADOR}
                     <tr style="border:1px solid black;">
                        <td style="border:1px solid black;">{$OPERADOR.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
                        <td style="border:1px solid black;">{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
                        <td style="border:1px solid black;">{$OPERADOR.CUIT}</td>
                        <td style="border:1px solid black;">{$OPERADOR.CAA_NUMERO}</td>
                        <td style="border:1px solid black;">{$OPERADOR.CAA_VENCIMIENTO}</td>
                    </tr>
{/foreach}
                </table>

                  <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">VEH&Iacute;CULO</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
         <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">

                        <td style="border:1px solid black;width: 200px;">No PATENTE</td>
                        <td style="border:1px solid black;width: 200px;">TIPO</td>
                        <td colspan="2" style="text-align: center;border:1px solid black;">CREDENCIAL S.A Y D.S.</td>
                    </tr>
{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
	{foreach $TRANSPORTISTA.VEHICULOS as $VEHICULO}
                     <tr style="border:1px solid black;">
                        <td style="border:1px solid black;">{$VEHICULO.DOMINIO}</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">{$VEHICULO.CREDENCIAL_SERIE}</td>
                        <td style="border:1px solid black;">{$VEHICULO.CREDENCIAL_NUMERO}</td>
                    </tr>
	{/foreach}
{/foreach}

                </table>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">INFORMACI&Oacute;N DE RESIDUOS</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                  <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border="0"  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                     <td colspan="2" style="text-align: center;border:1px solid black;">CONTENEDORES</td>
                        <td style="border:1px solid black;">*CSC EST. </td>
                        <td style="border:1px solid black;">*CSC REAL</td>
                         <td style="border:1px solid black;width: 200px;">DESCRIPCI&Oacute;N</td>
                        <td style="border:1px solid black;">CANTIDAD ESTIMADA EN KGS.</td>
                         <td style="border:1px solid black;">CANTIDAD REAL EN KGS. </td>
                         <td style="border:1px solid black;">ESTADO FISICO</td>


                    </tr>
                     <td >TIPO</td>
                     <td style="border-right:1px solid black; ">NRO.</td>
                     <td style="background-color: #dcdbd6;">&nbsp; </td>
                        <td style="background-color: #dcdbd6;">&nbsp; </td>
                         <td style="background-color: #dcdbd6;">&nbsp; </td>
                        <td style="background-color: #dcdbd6;">&nbsp; </td>
                         <td style="background-color: #dcdbd6;">&nbsp;  </td>
                         <td style="background-color: #dcdbd6;">&nbsp; </td>
                    </tr>

{foreach $RESIDUOS as $RESIDUO}
                    <tr>
                        <td style="border:1px solid black;">{$RESIDUO.CONTENEDOR}</td>
                        <td style="border:1px solid black;">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">{$RESIDUO.RESIDUO}</td>
                        <td style="border:1px solid black;">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
                        <td style="border:1px solid black;">{$RESIDUO.CANTIDAD_REAL}</td>
                        <td style="border:1px solid black;">{$RESIDUO.ESTADO_}</td>
                    </tr>
{/foreach}

                  </table>
        <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">INFORMACION DE EMERGENCIA OPERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
         <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">

                        <td style="border:1px solid black;">TEL </td>
                        <td style="border:1px solid black;">DOMICILIO CONSTITUIDO</td>

                    </tr>
{foreach $OPERADORES as $OPERADOR}
                    <tr style="border:1px solid black;height: 30px;">

                        <td style="border:1px solid black;height: 30px;">{$OPERADOR.NUMERO_TELEFONICO}</td>
                        <td style="border:1px solid black;height: 30px;">{$OPERADOR.CALLE_C} {$OPERADOR.NUMERO_C} {$OPERADOR.PISO_C}</td>

                    </tr>
{/foreach}
         </table>
                  <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">INFORMACI&Oacute;N DE EMERGENCIA GENERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
         <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">

                        <td style="border:1px solid black;">TEL </td>
                        <td style="border:1px solid black;">DOMICILIO CONSTITUIDO</td>

                    </tr>
{foreach $GENERADORES as $GENERADOR}
                    <tr style="border:1px solid black;height: 30px;">

                        <td style="border:1px solid black;height: 30px;">{$GENERADOR.NUMERO_TELEFONICO}</td>
                        <td style="border:1px solid black;height: 30px;">{$GENERADOR.CALLE_C} {$GENERADOR.NUMERO_C} {$GENERADOR.PISO_C}</td>

                    </tr>
{/foreach}
         </table>
                  <div style="width: 30px;clear: both;height: 5px;"></div>
                 <div style="font-size:12px;margin-left:15px;">INFORMACI&Oacute;N DE EMERGENCIA TRANSPORTISTA</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
         <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">

                        <td style="border:1px solid black;">TEL </td>
                        <td style="border:1px solid black;">DOMICILIO CONSTITUIDO</td>

                    </tr>
{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
                    <tr style="border:1px solid black;height: 30px;">

                        <td style="border:1px solid black;height: 30px;">{$TRANSPORTISTA.NUMERO_TELEFONICO}</td>
                        <td style="border:1px solid black;height: 30px;">{$TRANSPORTISTA.CALLE_C} {$TRANSPORTISTA.NUMERO_C} {$TRANSPORTISTA.PISO_C}</td>

                    </tr>
{/foreach}
         </table>
                     <div style="width: 30px;clear: both;height: 5px;"></div>
                  <div style="font-size:12px;margin-left:15px;">CERTIFICACION GENERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                         <td style="border:1px solid black;">FIRMA</td>
                        <td style="border:1px solid black;">ACLARACI&Oacute;N</td>
                        <td style="border:1px solid black;">DNI</td>
                        <td style="border:1px solid black;">CARGO</td>
                        <td style="border:1px solid black;">FECHA</td>
                    </tr>
                     <tr style="border:1px solid black;">
                         <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>


                </table>
                   <div style="width: 30px;clear: both;height: 5px;"></div>
                  <div style="font-size:12px;margin-left:15px;">CERTIFICACI&Oacute;N TRANSPORTISTA</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                         <td style="border:1px solid black;">FIRMA</td>
                        <td style="border:1px solid black;">ACLARACI&Oacute;N</td>
                        <td style="border:1px solid black;">DNI</td>
                        <td style="border:1px solid black;">CARGO</td>
                        <td style="border:1px solid black;">FECHA</td>
                    </tr>
                     <tr style="border:1px solid black;">
                         <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>


                </table>

                   <div style="width: 30px;clear: both;height: 5px;"></div>
                  <div style="font-size:12px;margin-left:15px;">CERTIFICACI&Oacute;N OPERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 10px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black;background-color:#E7E7E7;">
                         <td style="border:1px solid black;">FIRMA</td>
                        <td style="border:1px solid black;">ACLARACI&Oacute;N</td>
                        <td style="border:1px solid black;">DNI</td>
                        <td style="border:1px solid black;">CARGO</td>
                        <td style="border:1px solid black;">FECHA</td>
                    </tr>
                     <tr style="border:1px solid black;">
                         <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>
                        <td style="border:1px solid black;">&nbsp;</td>


                </table>
<center>
<table>
	<tr>
		<td height="20" bgcolor="#EAEAE5"><img src="{$MEL_PATH}/registracion/barcode.php?code={$CODIGO}"></td>
	</tr>
	<tr>
		<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de protocolo: </strong>{$CODIGO}</td>
	</tr>
<table>
</center>
              <div style="text-align: left;font-size:12px;margin-left:15px;">DECLARACION JURADA: CERTIFICACI&Oacute;N DEL GENERADOR</div>
                <div style="width: 30px;clear: both;height: 5px;"></div>
                        <div style="text-align: left;font-size:9px;margin-left:15px;">Declaro bajo juramente, que la informaci&oacute;n y los datos manifestados en la presente, son veraces y se ajustan a la legislaci&oacute;n vigente en la materia.</div>

                  <div style="text-align: left;font-size:9px;margin-left:15px;">Este manifiesto puede tener anexos especificando los veh&iacute;culos que lo transportan. *CSC: Categor&iacute; a Control (AnexoI).</div>



        </div>




<script>
{literal}

{/literal}
</script>

