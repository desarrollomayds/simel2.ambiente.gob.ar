<html>
    <head>
        <title>Detalle de registraci&oacute;n</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <script type="text/javascript" src="/javascript/jquery.js"></script>
        <script type="text/javascript" src="/javascript/jquery-ui.js"></script>
        <script type="text/javascript" src="/javascript/epoch_classes.js"></script>
        <script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
        <script type="text/javascript" src="/javascript/jquery.print_element.js"></script>
        <script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
        <script src="http://maps.google.com/maps?language=es&hl=es&file=api&v=2.95&key={$GOOGLE_MAPS_KEY}" type="text/javascript" charset="ISO-8859-1" id="scriptlento"></script>

        <link   rel="stylesheet"       href="/css/epoch_styles.css"    type="text/css" />
        <link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
        <link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
        <link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
        <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />


        <script type="text/javascript">

            function centerPopup(divId) {
                var oDiv = $('#' + divId);

                //var divHeight = oDiv.outerHeight(true);
                //var divWidth  = oDiv.outerWidth(true);
                var divHeight = oDiv.outerHeight();
                var divWidth = oDiv.outerWidth();
                var windowHeight = $(window).height();
                var windowWidth = $(window).width();

                oDiv.css({
                    'left': (windowWidth - divWidth) / 2 + $(window).scrollLeft() + 'px',
                    'top': (windowHeight - divHeight) / 2 + $(window).scrollTop() + 'px'
                });

                expand2Window();
            }
            function expand2Window() {

                var myBody = $(window);
                $('#bigscreen').show();
                $('#bigscreen').height(myBody.height());
                $('#bigscreen').width(myBody.width());
                $('#bigscreen').css({
                    'top': $(window).scrollTop() + 'px'
                });

            }

            $(window).resize(function() {
                if ($('#bigscreen').css("display") == "block") {
                    centerPopup('div_popup');
                    centerPopup('div_popup_2');
                    centerPopup('div_popup_3');
                    expand2Window();
                }

            });
            $(window).scroll(function() {
                if ($('#bigscreen').css("display") == "block") {
                    centerPopup('div_popup');
                    centerPopup('div_popup_2');
                    centerPopup('div_popup_3');
                    expand2Window();
                }
            });

            function cerrar() {
                $('#bigscreen').css("display", "none");
                $('#div_popup').css("display", "none");
                $('#div_popup_2').css("display", "none");
                $('#div_popup_3').css("display", "none");


            }
            function cerraruno() {
                $('#bigscreen').css("display", "none");

            }





        </script>


        {literal}
        <style type="text/css">
            <!--
            #apDiv1 {
                position:relative;
                left:415px;
                top:44px;
                width:378px;
                height:53px;
                z-index:1;
                background-image: url(/imagenes/cabecera_formulario.gif);
                background-repeat: no-repeat;
                padding-top: 30px;
                padding-left: 30px;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16px;
                color: #FFFFFF;
                text-align: left;
            }
            .style1 {color: #A8D8EA}
            -->
        </style>
        <link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
        {/literal}
        <!--[if IE]>
                        <link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
        <!--[else]>
        <![endif]-->
    </head>
    <body>
        <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>


        <div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>        <div id="apDiv1">DRP<br /></div>
            <div id="contenido-form"><br />

                <br><br><br>
                <!--[if IE]>
                                        <div id="menu-solapas">
                {if $USUARIO.ROL == 1}
                                                <div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
                {elseif $USUARIO.ROL == 2}
                                                <div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>

                                                <div class="tabnueva" style="width:170px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>

                                                <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>

                                                <div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>

                                                <div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/reportes.php">Reportes</a></div>
                {elseif $USUARIO.ROL == 0}
                                                <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

                                                <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_roles.php">Roles</a></div>

                                                <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/reportes.php">Reportes</a></div>
                {/if}
                                        </div>
                <div style="border-bottom:1px solid #5D9E00;width:100%;margin-top:-20px;"></div>
                <!--[if !IE]> -->



                <div id="menu-solapas">
                    {if $USUARIO.ROL == 1}
                    <div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
                    {elseif $USUARIO.ROL == 2}
                    <div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>

                    <div class="tabnueva" style="width:170px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>

                    <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>

                    <div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>

                    <div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/reportes.php">Reportes</a></div>
                    {elseif $USUARIO.ROL == 0}
                    <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

                    <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_roles.php">Roles</a></div>

                    <div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/reportes.php">Reportes</a></div>
                    {/if}
                </div>
                <div style="height:2px; background-color:#5D9E00"></div>

                <![endif]-->



                <br>
                <span class="titulos"><br /></span>
               <table width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size: 13px;">
				<tr style="height: 15px;">

                                    <td colspan="2" width=""  bgcolor="#A8D8EA" class="td"><strong>REDACTAR MENSAJE</strong></td>
				</tr>
                                <tr>
                                    <td bgcolor="EAEAE5" class="td" id="nombre">RAZON SOCIAL: </td>
                                    <td bgcolor="EAEAE5" class="td" id="nombre">&nbsp;&nbsp;&nbsp;{$EMPRESA.NOMBRE}</td>
                                </tr>
                                 <tr>
                                     <td bgcolor="EAEAE5" class="td" id="nombre">CUIT:</td>
                                    <td bgcolor="EAEAE5" class="td" id="nombre">&nbsp;&nbsp;&nbsp;{$EMPRESA.CUIT}</td>
                                </tr>
                                <tr>
                              <td bgcolor="EAEAE5" class="td" id="nombre">
                                        ESTABLECIMIENTO:</td>
                                    <td bgcolor="EAEAE5" class="td" id="nombre">
                                        &nbsp;&nbsp;&nbsp;
                            <select id='establecimiento' name='establecimiento'>
                                {foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
                                <option value='{$ESTABLECIMIENTO.ID}'>{$ESTABLECIMIENTO.NOMBRE}</option>
                                {/foreach}
                            </select>
                            </td>

                            </tr>
                            <tr>
                                <td bgcolor="EAEAE5" class="td" id="nombre">ASUNTO:</td>
                                <td bgcolor="EAEAE5" class="td" id="nombre"> &nbsp;&nbsp;&nbsp;<input type='text' name='titulo' style="width: 600px;" id='titulo' value=''></td>
                                </tr>
                                <tr>
                                     <td bgcolor="EAEAE5" class="td" id="nombre">MENSAJE:</td>
                                <td bgcolor="EAEAE5" class="td" id="nombre"> &nbsp;&nbsp;&nbsp;<textarea type='text' name='cuerpo'  style="width: 600px;" id='cuerpo' value=''></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;
                                    </td>
                                    <td><input type='button' name='btn_enviar' class="ui-el-minibutton hand" id='btn_enviar' style="float: right;" value='Enviar Mensaje'></td>
                                </tr>
                                </table>


                </body>
                {literal}
                <script>
                                    $('#btn_enviar').click(function() {
                                        var campos = ['titulo', 'severidad', 'cuerpo', 'general'];
                                        var prefijo = 'mensaje';

                                        $.ajax({
                                            type: "POST",
                                            url: "/operacion/redactar_mensaje.php",
                                            data: {
                                                destino: $('#establecimiento :selected').val(),
                                                titulo: $("#titulo").val(),
                                                cuerpo: $("#cuerpo").val()
                                            },
                                            dataType: "text json",
                                            success: function(retorno) {
                                                if (retorno['estado'] == 0) {
                                                    alert("Mensaje enviado correctamente");
                                                    window.location.replace("/operacion/bandeja_de_entrada.php");
                                                } else {
                                                    texto_errores = '';
                                                    for (campo in campos) {
                                                        campo = campos[campo];

                                                        if (retorno['errores'][campo] != null) {
                                                            texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
                                                            $('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                                                            $('#' + prefijo + '_' + campo).addClass('error_de_carga');
                                                        } else {
                                                            $('#' + prefijo + '_' + campo).removeClass('error_de_carga');
                                                        }

                                                        if (texto_errores != '') {
                                                            $('#sumario_errores_redactar_mensaje td:first').html(texto_errores);
                                                            $('#sumario_errores_redactar_mensaje').show();
                                                            ;
                                                        } else {
                                                            $('#sumario_errores_redactar_mensaje').hide();
                                                        }
                                                    }
                                                }
                                            }

                                        });
                                    })
                </script>
                {/literal}
                </html>
