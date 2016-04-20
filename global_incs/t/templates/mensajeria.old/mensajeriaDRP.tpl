<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Crear manifiesto</title>

        <script type="text/javascript" src="/javascript/jquery.js"></script>
        <script type="text/javascript" src="/javascript/jquery-ui.js"></script>
        <script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
        <script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
        <link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
        <link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
        <link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
        <link   rel="stylesheet"       href="/css/interior.css"        type="text/css" />
        <link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
        <script type="text/javascript">

            function centerPopup(divId){
                var oDiv = $('#'+ divId);

                //var divHeight = oDiv.outerHeight(true);
                //var divWidth  = oDiv.outerWidth(true);
                var divHeight = oDiv.outerHeight();
                var divWidth  = oDiv.outerWidth();
                var windowHeight = $(window).height();
                var windowWidth =  $(window).width();

                oDiv.css({
                    'left':  (windowWidth  - divWidth) /2  + $(window).scrollLeft() + 'px', 
                    'top':   (windowHeight - divHeight) /2 + $(window).scrollTop()  + 'px'
                });

                expand2Window();
            }
            function expand2Window(){

                var myBody = $(window);
                $('#bigscreen').show();
                $('#bigscreen').height( myBody.height() );
                $('#bigscreen').width(  myBody.width() );
                $('#bigscreen').css({
                    'top': $(window).scrollTop()  + 'px'
                });

            }

            $(window).resize(function() {
                if($('#bigscreen').css("display")=="block"){
                    centerPopup('div_popup');
                    centerPopup('div_popup_2');
                    centerPopup('div_popup_3');
                    expand2Window();
                }

            });
            $(window).scroll(function() {
                if($('#bigscreen').css("display")=="block"){
                    centerPopup('div_popup');
                    centerPopup('div_popup_2');
                    centerPopup('div_popup_3');
                    expand2Window();
                }
            });

            function cerrar(){
                $('#bigscreen').css("display","none");
                $('#div_popup').css("display","none");
                $('#div_popup_2').css("display","none");
                $('#div_popup_3').css("display","none");


            }
            function cerraruno(){
                $('#bigscreen').css("display","none");

            }





        </script>



        <style type="text/css">
            {literal}

            <!--
            .TextoMensaje{
                float:left;width:58%; height:80px; margin-top:10px;background-color:white;  border-radius: 5px 5px 5px 5px;overflow:auto;
                }
            .MensajeCabecera{
                float:left;width:30%;margin-top:10px;text-align:left;padding-left:30px;
                }
            .Mensaje{
                 color:grey;
                
                
                }
            #apDiv1 {
                position:relative;
                left:555px;
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

	.mensajesOver:hover{
	background-color:grey;
	width:100%;
	
	}	
            .style1 {color: #A8D8EA}
            -->
        </style>
        <link href="/css/interior.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            <!--
            .style2 {
                color: #66B31C;
                font-weight: bold;
            }
            -->
            {/literal}
        </style>
    </head>

    <body style="text-align: center;">
        <div id="bigscreen" onclick="cerrar()" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

        <div id="login-top" align="center" >

            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> |<a style="color:white;" href="/micuenta/micuenta.php">  Mi cuenta </a>|<a style="color:white;" href="/login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
        </div>
        <div id="contenedor-interior" ><div id="logo"> <img src="/imagenes/logo.gif" width="179" height="83" vspace="5" /> </div>
            <div id="apDiv1">Mensajeria<br />
            </div>
            <div id="contenido-interior" style="height:500px;">
              <br/>
<div align="right"><img width="115" height="27" id="" src="/imagenes/volver_inicio.gif"/></div>

                <br />
                <span class="titulos"><br />

                    
                    <div style="height:2px; background-color:#5D9E00"></div>
                </span>
                <br /> 
                


<div style="width:200px;height:400px;background-color:#EAEAE5;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;text-align:left;float:left;">
<p style="padding:5px;">Ultimos Mensajes:<br/></p>

<div style="margin-left:15px;margin-right:15px;">
 <img src="/imagenes/Rmail.png" style="margin-top:5px;"/>  <strong style"margin-top:-10px;">Titulo Mensaje 1 </strong>
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> Empresa 1 
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> 12/03/2002 
</div>

<div class="mensajesOver" style="margin-left:15px;margin-right:15px;">
 <img src="/imagenes/Rmail.png" style="margin-top:5px;"/>  <strong style"margin-top:-10px;">Titulo Mensaje 1 </strong>
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> Empresa 1 
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> 12/03/2002 
</div>




<div style="margin-left:15px;margin-right:15px;">
 <img src="/imagenes/Rmail.png" style="margin-top:5px;"/>  <strong style"margin-top:-10px;">Titulo Mensaje 1 </strong>
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> Empresa 1 
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> 12/03/2002 
</div>

<div style="margin-left:15px;margin-right:15px;">
 <img src="/imagenes/Rmail.png" style="margin-top:5px;"/>  <strong style"margin-top:-10px;">Titulo Mensaje 1 </strong>
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> Empresa 1 
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> 12/03/2002 
</div>

<div style="margin-left:15px;margin-right:15px;">
 <img src="/imagenes/Rmail.png" style="margin-top:5px;"/>  <strong style"margin-top:-10px;">Titulo Mensaje 1 </strong>
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> Empresa 1 
<br/>
<div style="margin-left:10px;width:12px;height:12px;float:left;"></div> 12/03/2002 
</div>

</div>

<div style="width:670px;height:70px;background-color:#EAEAE5;float:right;border-radius:3px;"></div>

            </div>










    </body>
</html>


