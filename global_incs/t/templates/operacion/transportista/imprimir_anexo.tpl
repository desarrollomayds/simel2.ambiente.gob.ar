        <div style="width: 900px;margin: auto;border:2px solid #dcdbd6;">
              <div style="float: left;margin-left: 30px;"><img src="/imagenes/logo_impresion.gif"/></div>
            <div style="text-align: left;margin-left: 110px;font-size: 13px;"><br/><b>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE <br/> SUBSECRETARIA DE CONTROL Y FISCALIZACION AMBIENTAL Y PREVENCION DE LA CONTAMINACION.<br/>DIRECCION NACIONAL DE CONTROL AMBIENTAL <br/>DIRECCION DE RESIDUOS PELIGROSOS</b></div>
           <div style="padding-top: 35px;width: 5px; clear: both;"></div>
                <div style="float: left;margin-left: 100px;"> </div><div style="float: right;margin-right: 50px;border:1px solid black;padding: 10px;margin-top: -50px;font-size: 11px;"><b>Manifiesto Nro {"%06d"|sprintf:$MANIFIESTO.NUMERO_PROTOCOLO}</b></div>
        <br/><br/><br/>
                <div style="margin-left:90px;font-size: 12px;"><b>ANEXO MANIFIESTO (TRASLADOS DE RESIDUOS POR DOMINIO)</b></div>
                <div style="width: 30px;clear: both;height: 15px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 12px; font-family: Verdana,Arial,Helvetica;" border=""  >
{foreach $OPERADORES as $OPERADOR}
                    <tr style="border:1px solid black; height: 35PX;">
                         <td style="border:1px solid black;">OPERADOR</td>
                        <td style="border:1px solid black;">{$OPERADOR.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>

                    </tr>
{/foreach}
{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
                    <tr style="border:1px solid black; height: 35PX;">
                      <td style="border:1px solid black;">TRANSPORTISTA</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>

                    </tr>
{/foreach}
{foreach $GENERADORES as $GENERADOR}
                     <tr style="border:1px solid black; height: 35PX;">
                      <td style="border:1px solid black;">GENERADOR</td>
                        <td style="border:1px solid black;">{$GENERADOR.NOMBRE_EMPRESA}</td>
                        <td style="border:1px solid black;">{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>

                    </tr>
{/foreach}

                </table>
                    <div style="width: 30px;clear: both;height: 15px;"></div>
               <!-- <div style="margin-left:90px;font-size: 12px;"><b>RESIDUOS</b></div>
                <div style="width: 30px;clear: both;height: 15px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 12px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black; height: 35PX;">
                         <td style="border:1px solid black;">CATEGORIA SOMETIDA A CONTROL</td>
                        <td style="border:1px solid black;">CANTIDAD ESTIMADA</td>
                        <td style="border:1px solid black;">CANTIDAD REAL</td>

                    </tr>



{foreach $RESIDUOS as $RESIDUO}
                    <tr style="border:1px solid black; height: 35PX;">
                      <td style="border:1px solid black;">{$RESIDUO.RESIDUO}</td>
                        <td style="border:1px solid black;">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
                        <td style="border:1px solid black;">{$RESIDUO.CANTIDAD_REAL}</td>

                    </tr>
{/foreach}
  </table>-->
                 <div style="width: 30px;clear: both;height: 15px;"></div>
       <div style="width: 30px;clear: both;height: 15px;"></div>
                <div style="margin-left:90px;font-size: 12px;"><b>TRASLADOS DE RESIDUOS POR DOMINIO</b></div>
                <div style="width: 30px;clear: both;height: 15px;"></div>
                <table cellspacing="0" cellpadding="" style="border-collapse:collapse;margin-top: 25px;border:1px solid black;margin: auto;width: 720px;font-size: 12px; font-family: Verdana,Arial,Helvetica;" border=""  >
                    <tr style="border:1px solid black; height: 35PX;">
                         <td style="border:1px solid black;">DOMINIO</td>
                         <td style="border:1px solid black;">RESIDUO</td>
                        <td style="border:1px solid black;">CANTIDAD</td>
                        <td style="border:1px solid black;">FECHA</td>

                    </tr>
{foreach $TRASLADO as $TRAS}
                    <tr style="border:1px solid black; height: 35PX;">

                    {foreach $VEHICULOS as $VEHICULO}
                    {IF $TRAS.ID_VEHICULO == $VEHICULO.ID}
                      <td style="border:1px solid black;">
                      {$VEHICULO.DOMINIO}

                      </td>
                      {/IF}

                      {/foreach}
                      <td style="border:1px solid black;">
                      {foreach $RESIDUOS as $RESIDUO}
                        {IF $RESIDUO.ID == $TRAS.ID_RESIDUO_MANIFIESTO}

                        {$RESIDUO.RESIDUO}
                        {/IF}
                        </td>
                        {/foreach}
                        <td style="border:1px solid black;">{$TRAS.CANTIDAD}</td>
                        <td style="border:1px solid black;">{$TRAS.FECHA_TRASLADO}</td>

                    </tr>
{/foreach}

   </table>
                 <div style="width: 30px;clear: both;height: 15px;"></div>



                 <div style="width: 30px;clear: both;height: 15px;"></div>
                 <div style="float: right;margin-right: 50px;">....................................<br/>FIRMA Y SELLO TRANSPORTISTA</div>
                 <div style="width: 30px;clear: both;height: 15px;"></div>


        </div>