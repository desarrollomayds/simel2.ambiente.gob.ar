<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Crear manifiesto</title>

    <!-- Carga de header global -->
    {include file='general/css_headers.tpl' bootstrap='true' datepicker='true'}
    {include file='general/js_headers.tpl' bootstrap='true' mapa='true' datepicker='true'}

</head>

<body>
<div id="login-top" align="center">
    <div style="width:950px" align="right"><strong>Centro de Ayuda</strong> | <a style="color:white;"
                                                                                 href="../{$PERFIL}/mi_cuenta.php">Mi
            cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a
                href='../compartido/boletas_de_pago.php' class="imgBox"></a>
    </div>
</div>
<div id="contenedor-interior">
    {include file='general/logos.tpl'}
    <br>

    <div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>


    <div id="apDiv1">Mi Cuenta<br></div>
    <div id="contenido-interior">

        <br>
            <span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../{$PERFIL}/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../{$PERFIL}/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    {if $ROL_ID == 2}
                        <div class="tabnueva">
                            <a href="../{$PERFIL}/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    {else}
                        <div class="tabnueva">
                            <a href="./alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    {/if}
                </div>
                <div style="height:2px; background-color:#5D9E00"></div>
            </span>
        <br>

        <p class="registro-titulo bg-primary">Cambiar contrase&ntilde;a</p>

        <div class="tablaBuscar" style="text-align:left;">
            <form class="form-inline" onsubmit="return false;">
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_actual"
                           placeholder="Contrase&ntilde;a actual">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_nueva"
                           placeholder="Nueva contrase&ntilde;a">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_nueva_bis"
                           placeholder="Confirmar contrase&ntilde;a">
                </div>
                <input id='btn_cambiar_contrasenia' type="submit" value="Cambiar" class="btn btn-success">
            </form>
        </div>

        <br>

        <p class="registro-titulo bg-primary">CAA</p>

        <div class="tablaBuscar" style="text-align:left;">
            <form class="form-inline" onsubmit="return false;">
                <div class="form-group">
                    Nro CAA:
                    <input type="text" class="form-control" id="establecimiento_caa_numero"
                           value="{$ESTABLECIMIENTO.CAA_NUMERO}" placeholder="Nº de expediente">
                </div>
                <div class="form-group">
                    Fecha Vencimiento:
                    <input type="text" class="form-control" id="establecimiento_caa_vencimiento"
                           value="{$ESTABLECIMIENTO.CAA_VENCIMIENTO}" placeholder="Fecha de caducidad CAA">
                </div>
                <input id='btn_cambiar_caa' type="submit" value="Cambiar" class="btn btn-success">
            </form>
        </div>
        <br>


        <p class="registro-titulo bg-primary">Datos de la empresa</p>

        <div class="table-responsive tablaBuscar">

            <form>

                <input id="geocomplete" type="hidden">
                <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;"
                       id="tablas-forms">

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Nombre<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_nombre'
                                                         id='establecimiento_nombre' value='{$ESTABLECIMIENTO.NOMBRE}'
                                                         size='30'></td>
                    </tr>

                    <tr id="establecimiento_nombre-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="establecimiento_nombre-error"
                                 style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Descripci&oacute;n<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><textarea type='text' name='descripcion' id='descripcion'
                                                            style="min-width:396px;height:80px;resize:vertical;">{$ESTABLECIMIENTO.DESCRIPCION}</textarea>
                        </td>
                    </tr>

                    <tr id="descripcion-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="descripcion-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="left" height="25" bordercolor="#EAEAE5"
                            style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO REAL
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><select style="width: 300px;" name='provincia_r' id='provincia_r'>
                                <option value="">[SELECCIONE UNA PROVINCIA]</option>
                                {foreach $PROVINCIAS as $PROVINCIA}
                                    <option value='{$PROVINCIA.CODIGO}' data-nombre='{$PROVINCIA.DESCRIPCION}'
                                            {if $ESTABLECIMIENTO.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
                                {/foreach}
                            </select></td>
                    </tr>

                    <tr id="provincia_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <select style="width: 396px;" name='localidad_r' id='localidad_r'>
                                <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
                                {foreach $LOCALIDADES_R as $LOCALIDAD}
                                    <option value='{$LOCALIDAD@key}'
                                            {if $ESTABLECIMIENTO.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>

                    <tr id="localidad_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr id="localidad_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Calle<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='calle_r' id='calle_r'
                                                         value='{$ESTABLECIMIENTO.CALLE_R}' size='30'></td>
                    </tr>

                    <tr id="calle_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="calle_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='numero_r' id='numero_r'
                                                         value='{$ESTABLECIMIENTO.NUMERO_R}' size='30'></td>
                    </tr>

                    <tr id="numero_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="numero_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Piso:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='piso_r' id='piso_r'
                                                         value='{$ESTABLECIMIENTO.PISO_R}' size='30'></td>
                    </tr>

                    <tr id="piso_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="piso_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r'
                                                         value='{$ESTABLECIMIENTO.CPOSTAL_R}' size='30'></td>
                    </tr>

                    <tr id="cpostal_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="30" align="left" bordercolor="#EAEAE5" style="padding:5px">Coordenadas
                            geogr&aacute;ficas del establecimiento:
                        </td>
                        <td>
                            <div style="display:none">
                                <span id="latitud_r" data-geo="lat">lat</span>
                                <span id="longitud_r" data-geo="lng">lng</span>
                            </div>
                            <div class="mapa-establecimiento" style="width: 396px; height: 300px"></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="left" height="25" bordercolor="#EAEAE5"
                            style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO CONSTITUIDO
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><select style="width: 300px;" name='provincia_c' id='provincia_c'>
                                <option value="">[SELECCIONE UNA PROVINCIA]</option>
                                <option value="2" data-nombre="CIUDAD AUTONOMA DE BS AS"
                                        {if $ESTABLECIMIENTO.PROVINCIA_C == 2}selected{/if}>CIUDAD AUTONOMA DE BS AS
                                </option>
                                <!--
                            {foreach $PROVINCIAS as $PROVINCIA}
                                <option value='{$PROVINCIA.CODIGO}' {if $ESTABLECIMIENTO.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
                            {/foreach}
                            -->
                            </select></td>
                    </tr>

                    <tr id="provincia_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <select style="width: 396px;" name='localidad_c' id='localidad_c'>
                                <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
                                {foreach $LOCALIDADES_C as $LOCALIDAD}
                                    <option value='{$LOCALIDAD@key}'
                                            {if $ESTABLECIMIENTO.LOCALIDAD_C == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>

                    <tr id="localidad_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Calle<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='calle_c' id='calle_c'
                                                         value='{$ESTABLECIMIENTO.CALLE_C}' size='30'></td>
                    </tr>

                    <tr id="calle_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="calle_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='numero_c' id='numero_c'
                                                         value='{$ESTABLECIMIENTO.NUMERO_C}' size='30'></td>
                    </tr>

                    <tr id="numero_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="numero_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Piso:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='piso_c' id='piso_c'
                                                         value='{$ESTABLECIMIENTO.PISO_C}' size='30'></td>
                    </tr>

                    <tr id="piso_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="piso_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c'
                                                         value='{$ESTABLECIMIENTO.CPOSTAL_C}' size='30'></td>
                    </tr>

                    <tr id="cpostal_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5" rowspan="2">Nomenclatura
                            Catastral<span class="obligatorio">*</span>:&nbsp;</td>
                        <td>

                            Circ <select name='establecimiento_nomenclatura_catastral_circ'
                                         id='establecimiento_nomenclatura_catastral_circ'>
                                {foreach $NOMENCLATURA_CATASTRAL_CIRC as $CIRC}
                                    <option value='{$CIRC}'
                                            {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC == $CIRC}selected{/if}>{$CIRC}</option>
                                {/foreach}
                            </select>


                            Sec <select name='establecimiento_nomenclatura_catastral_sec'
                                        id='establecimiento_nomenclatura_catastral_sec'>
                                {foreach $NOMENCLATURA_CATASTRAL_SEC as $SEC}
                                    <option value='{$SEC}'
                                            {if $ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC == $SEC}selected{/if}>{$SEC}</option>
                                {/foreach}
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td>

                            Manz <input type='text' name='establecimiento_nomenclatura_catastral_manz'
                                        id='establecimiento_nomenclatura_catastral_manz'
                                        value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}' size='4'>


                            Parc <input type='text' name='establecimiento_nomenclatura_catastral_parc'
                                        id='establecimiento_nomenclatura_catastral_parc'
                                        value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}' size='4'>


                            Sub Parc <input type='text' name='establecimiento_nomenclatura_catastral_sub_parc'
                                            id='establecimiento_nomenclatura_catastral_sub_parc'
                                            value='{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}' size='4'>

                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Habilitaciones<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='habilitaciones' id='habilitaciones'
                                                         value='{$ESTABLECIMIENTO.HABILITACIONES}' size='30'></td>
                    </tr>

                    <tr id="habilitaciones-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="habilitaciones-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Direcci&oacute;n Email<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email'
                                                         value='{$ESTABLECIMIENTO.EMAIL}' size='35'></td>
                    </tr>

                    <tr id="direccion_email-td" style="display:none">
                        <td width="15%" height="10" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="direccion_email-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                </table>

            </form>

        </div>

        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
            <tbody>
            <tr>
                {if $CAMBIOS_PENDIENTES == 0}
                    <td align="right"><input type="button" class="btn btn-success" value="Guardar cambios"
                                             id="btn_guardar_cambios" name="btn_guardar_cambios"/></td>
                {else}
                    <script>
                        $(function () {
                            $("#alerta-micuenta").show().html("Para requerir un nuevo cambio deber&aacute; esperar a que se eval&uacute;e el actual.");
                        });
                    </script>
                {/if}
            </tr>
            </tbody>
        </table>
        </form>
        </tbody>


    </div>
</div>
</body>

{literal}
    <script type="text/javascript">

        var registro_actual = null;

        $(function () {

            $("alerta-micuenta").hide();

            $('#establecimiento_caa_vencimiento').datepicker({
                format: 'dd/mm/yyyy',
                startView: 'decade',
                startDate: new Date()
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            coordenadas = $("#latitud_r").text() + ', ' + $("#longitud_r").text();

            actualizar_mapa('mapa-establecimiento', coordenadas);

            $('#numero_r').filter_input({regex: '[0-9]'});
            $('#piso_r').filter_input({regex: '[0-9]'});
            $('#numero_c').filter_input({regex: '[0-9]'});
            $('#piso_c').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_manz').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_parc').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex: '[0-9]'});

            $('#btn_cambiar_contrasenia').on('click', function () {
                var campos = ['general'];
                var prefijo = '';

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        'accion': 'contrasenia',
                        'contrasenia_actual': $('#contrasenia_actual').val(),
                        'contrasenia_nueva': $('#contrasenia_nueva').val(),
                        'contrasenia_nueva_bis': $('#contrasenia_nueva_bis').val()
                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) {
                            mostrarMensaje("", "Contrase&ntilde;a actualizada de forma exitosa", "success");
                            $("#btn_cambiar_contrasenia").attr('disabled', 'disabled');
                        }
                        else {

                            for (campo in campos) {
                                campo = campos[campo];

                                if (retorno['errores'][campo] != null) {
                                    mostrarMensaje("exclamation-triangle", retorno['errores'][campo], "warning");
                                }
                            }
                        }
                    }

                });
            })

            $('#btn_guardar_cambios').click(function () {
                var campos = ['establecimiento_nombre', 'descripcion',
                    'provincia_r', 'localidad_r', 'calle_r', 'numero_r', 'piso_r', 'cpostal_r',
                    'latitud_r', 'longitud_r',
                    'provincia_c', 'localidad_c', 'calle_c', 'numero_c', 'piso_c', 'cpostal_c',
                    'habilitaciones', 'direccion_email', 'general'
                ];

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        accion: 'establecimiento',
                        establecimiento_nombre: $("#establecimiento_nombre").val(),
                        descripcion: $("#descripcion").val(),
                        provincia_r: $("#provincia_r").val(),
                        localidad_r: $("#localidad_r").val(),
                        calle_r: $("#calle_r").val(),
                        numero_r: $("#numero_r").val(),
                        piso_r: $("#piso_r").val(),
                        cpostal_r: $("#cpostal_r").val(),
                        latitud_r: $("#latitud_r").text(),
                        longitud_r: $("#longitud_r").text(),
                        calle_c: $("#calle_c").val(),
                        numero_c: $("#numero_c").val(),
                        piso_c: $("#piso_c").val(),
                        cpostal_c: $("#cpostal_c").val(),
                        provincia_c: $("#provincia_c").val(),
                        localidad_c: $("#localidad_c").val(),
                        nomenclatura_catastral_circ: $("#establecimiento_nomenclatura_catastral_circ").val(),
                        nomenclatura_catastral_sec: $("#establecimiento_nomenclatura_catastral_sec").val(),
                        nomenclatura_catastral_manz: $("#establecimiento_nomenclatura_catastral_manz").val(),
                        nomenclatura_catastral_parc: $("#establecimiento_nomenclatura_catastral_parc").val(),
                        nomenclatura_catastral_sub_parc: $("#establecimiento_nomenclatura_catastral_sub_parc").val(),
                        habilitaciones: $("#habilitaciones").val(),
                        direccion_email: $("#direccion_email").val()
                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) 
                        {

                            // saco el boton
                            $('#btn_guardar_cambios').attr('disabled', 'disabled');
                            
                            mostrarMensajeYRedireccionar('Sus cambios han sido recibos y est&aacute;n pendientes de aprobaci&oacute;n de la DRP');

                        }
                        else {
                            for (campo in campos) {
                                texto_errores = '';
                                campo = campos[campo];

                                if (retorno['errores'][campo] != null) {
                                    texto_errores = retorno['errores'][campo];
                                    $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                                    $('#' + campo).addClass('error_de_carga');
                                }
                                else {
                                    $('#' + campo).removeClass('error_de_carga');
                                }

                                if (texto_errores != '') {
                                    $('#' + campo + '-error').html(texto_errores);
                                    $('#' + campo + '-td').show();
                                    $('#' + campo + '-error').show();
                                    ;
                                }
                                else {
                                    $('#' + campo + '-error').hide();
                                    $('#' + campo + '-td').hide();
                                }

                            }
                            mostrarMensaje('exclamation-triangle', 'Hubo errores a la hora de procesar el formulario, revise los campos indicados.', 'warning');
                            return false;
                        }
                    }
                });
            })

            $('#btn_cambiar_caa').click(function () {
                var campos = [
                    'caa_numero', 'caa_vencimiento'
                ];

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        accion: 'cambio_caa',
                        caa_numero: $("#establecimiento_caa_numero").val(),
                        caa_vencimiento: $("#establecimiento_caa_vencimiento").val()

                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) {
                            
                            // saco el boton
                            $('#btn_cambiar_caa').attr('disabled', 'disabled');
                            
                            mostrarMensajeYRedireccionar('Sus cambios han sido recibos y est&aacute;n pendientes de aprobaci&oacute;n de la DRP');
                        }
                        else {
                            mostrarMensaje("exclamation-triangle", retorno['errores']['general'], "warning");
                            return false;
                        }
                    }
                });
            })

            var cambio_localidad_pendiente = null;

            $('#provincia_r').change(function () {
                limpiar_calle_num('r', '');
                actualizar_localidades_r();
                actualizar_mapa('mapa-establecimiento', '');
            });

            $('#provincia_c').change(function () {
                actualizar_localidades_c();
            });

            $('#localidad_r').change(function () {
                $.ajax({
                    type: "POST",
                    url: mel_path + "/servicios/punto_inicio.php",
                    data: {
                        calle: $("#calle_r").val(),
                        numero: $("#numero_r").val(),
                        provincia: $("#provincia_r").val(),
                        localidad: $("#localidad_r").val()
                    },
                    dataType: "text",
                    success: function (punto_inicio) {
                        actualizar_mapa('mapa-establecimiento', '');
                    }
                });
            })

            function actualizar_localidades_r() {
                $.getJSON(mel_path + '/servicios/localidades.php', {provincia: $("#provincia_r").val()}, function (json) {

                    $('#localidad_r').find('option').remove();

                    $.each(json, function (codigo, descripcion) {
                        $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
                    });

                    $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

                    $('#localidad_r').val($('#localidad_r option:first').val());
                });
            }

            function actualizar_localidades_c() {
                $.getJSON(mel_path + '/servicios/localidades.php', {provincia: $("#provincia_c").val()}, function (json) {

                    $('#localidad_c').find('option').remove();

                    $.each(json, function (codigo, descripcion) {
                        $('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
                    });

                    $("#localidad_c").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

                    $('#localidad_c').val($('#localidad_c option:first').val());
                });
            }

        });

    </script>
{/literal}
</html>