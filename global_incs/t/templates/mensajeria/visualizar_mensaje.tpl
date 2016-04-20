
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  		<script type="text/javascript" src="/javascript/jquery.js"></script>
  		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
  		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
  		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
  		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
        <title></title>
        <style>
            body {
                background-image: url("/imagenes/fondo_formulario.gif");
                background-repeat: repeat-x;
                color: #333333;
                font-family: Arial,Helvetica,sans-serif;
                font-size: 12px;
                margin: 0;
            }
            input.text_field, textarea {
    background: url("/imagenes/input_bg.gif") repeat-x scroll center top #FFFFFF;
    border: 1px solid #BBBBBB;
    color: #222222;
    font: 13px 'Lucida Grande',Helvetica,Arial,sans-serif;
    /*margin: 0;*/
    outline: 0 none;
    padding: 7px;
}
   button.positive, button.negative, button.generic, input.generic {
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #F5F5F5;
    border-color: #DDDDDD #CCCCCC #CCCCCC #DDDDDD;
    border-radius: 5px 5px 5px 5px;
    border-right: 1px solid #CCCCCC;
    border-style: solid;
    border-width: 1px;
    color: #565656;
    cursor: pointer;
    font: 15px/36px "Helvetica Neue",Helvetica,Arial,sans-serif;
    height: 36px;
    margin: 0;
    overflow: visible;
    padding: 0 14px 0 12px;
    width: 1px;
     width: auto;
}
            Table Style

            table a:link {
                color: #666;
                font-weight: bold;
                text-decoration:none;
            }
            table a:visited {
                color: #999999;
                font-weight:bold;
                text-decoration:none;
            }
            table a:active,
            table a:hover {
                color: #bd5a35;
                text-decoration:underline;
            }
            table {
                width:550px;
                font-family:Arial, Helvetica, sans-serif;
                color:#666;
                font-size:12px;
                text-shadow: 1px 1px 0px #fff;
                background:#eaebec;
                margin:20px;
                border:#ccc 1px solid;

                -moz-border-radius:3px;
                -webkit-border-radius:3px;
                border-radius:3px;

                -moz-box-shadow: 0 1px 2px #d1d1d1;
                -webkit-box-shadow: 0 1px 2px #d1d1d1;
                box-shadow: 0 1px 2px #d1d1d1;
            }
            table th {
                padding:10px;
                border-top:1px solid #fafafa;
                border-bottom:1px solid #e0e0e0;

                background: #ededed;
                background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
                background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
            }
            table th:first-child{
                text-align: left;
                padding-left:20px;
            }
            table tr:first-child th:first-child{
                -moz-border-radius-topleft:3px;
                -webkit-border-top-left-radius:3px;
                border-top-left-radius:3px;
            }
            table tr:first-child th:last-child{
                -moz-border-radius-topright:3px;
                -webkit-border-top-right-radius:3px;
                border-top-right-radius:3px;
            }
            table tr{
                text-align: center;
                padding-left:20px;
            }
            table tr td:first-child{
                text-align: left;
                padding-left:20px;
                border-left: 0;
            }
            table tr td {
                padding:10px;
                border-top: 1px solid #ffffff;
                border-bottom:1px solid #e0e0e0;
                border-left: 1px solid #e0e0e0;

                background: #fafafa;
                background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
                background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
            }
            table tr.even td{
                background: #f6f6f6;
                background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
                background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
            }
            table tr:last-child td{
                border-bottom:0;
            }
            table tr:last-child td:first-child{
                -moz-border-radius-bottomleft:3px;
                -webkit-border-bottom-left-radius:3px;
                border-bottom-left-radius:3px;
            }
            table tr:last-child td:last-child{
                -moz-border-radius-bottomright:3px;
                -webkit-border-bottom-right-radius:3px;
                border-bottom-right-radius:3px;
            }
            table tr:hover td{
                background: #f2f2f2;
                background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
                background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);
            }
            .arriba:hover{
                background-color: #F2F2F2;
                padding:  5px;
                border-radius:3px;
                cursor: pointer;
                cursor: hand;
            }
            .mailMenu{
                width:540px;
                height: 71px;
                padding: 0 0 8px 7px;
                text-align: center;
                border-bottom: 0 none;
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.46);
                background-color: #FFFFFF;
                border-bottom: 2px solid #BBBBBB;
                border-radius: 10px 10px 10px 10px;
                margin: 20px 0 0;
                padding: 15px 20px;
                position: relative;
                word-wrap: break-word;
            }
            .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_text .new_post_label_icon {
                background-position: 2px -5px;
            }
            .new_post_label .new_post_label_icon {
                background-image: url("/imagenes/iconos.png");
                background-repeat: no-repeat;
                display: block;
                height: 90px;
                left: 0;
                position: absolute;
                top: 5px;
                width: 76px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_photo .new_post_label_icon {
                background-position: -73px -5px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_quote .new_post_label_icon {
                background-position: -148px -5px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_link .new_post_label_icon {
                background-position: -223px -5px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_chat .new_post_label_icon {
                background-position: -298px -5px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_audio .new_post_label_icon {
                background-position: -373px -5px;
            }
            #posts .post.new_post .new_post_label {
                color: #575D69;
                float: left;
                font-size: 15px;
                font-weight: normal;
                height: 20px;
                left: 0 !important;
                opacity: 0.9;
                padding-bottom: 18px;
                padding-right: 1px;
                padding-top: 61px;
                position: relative !important;
                text-align: center;
                text-decoration: none;
                top: 0 !important;
                width: 75px;
            }
            #new_post_label_video .new_post_label_icon {
                background-position: -448px -5px;
            }
        </style>
    </head>
    <body style="text-align: center;">

        <div style="width:800px;height:600px; background-color: #F5F5ED;margin: auto;margin-top: 50px;">
            <br/><br/>
            <div class="mailMenu" style="margin: auto;">
                <a id="new_post_label_text" class="new_post_label" href="/mensajeria/bandeja_de_entrada.php">
                    Recibidos
                    <span class="new_post_label_icon"></span>
                </a>
                <a id="new_post_label_text" class="new_post_label" href="/mensajeria/bandeja_de_salida.php">
                    Enviados
                    <span class="new_post_label_icon"></span>
                </a>
                <a id="new_post_label_photo" class="new_post_label" href="/mensajeria/redactar_mensaje.php">
                    Redactar
                    <span class="new_post_label_icon"></span>
                </a>
            </div>

            <br/>


             <!-- Mensajes ver mensaje-->
            <div class="mailMenu" style="margin: auto;width:600px;height: 400px;text-align: left;overflow:auto;">
                <input type='hidden' name='mensaje_padre' id='mensaje_padre' value='{$MENSAJE.ID}'>

                <table cellspacing='0'style="margin:auto;margin-top: 25px;"> <!-- cellspacing='0' is important, must stay -->
                    <tr>
                        <th colspan="3">{$MENSAJE.TITULO} {$MENSAJE.FECHA_ENVIO}</th>
                    </tr>
                    <tr>
                        <td colspan="3">{$MENSAJE.CUERPO}</td>
                    </tr>
                </table>

                {if $MENSAJE.SENTIDO == 1}
                <br/>
                <div style="margin: auto;width: 540px;">
                <textarea name="mensaje_cuerpo" id="mensaje_cuerpo" style="height:60px;width: 530px;margin: auto;" class="wide"></textarea>
                </div>
                <br/>
                <div style="margin-left:25px;margin-top: 15px;">
                <input type="submit" style="margin:0px 0px 0px 15px; " value="Responder"  id="btn_enviar" class="generic" name="preview_post">
                <input type="submit" style="margin:0px 0px 0px 15px; " value="Cancelar"  id="btn_cancelar" class="generic" name="preview_post">
                {/if}
               </div>

            </div>





        </div>
            </body>
{literal}
  <script>
		$('#btn_cancelar').click(function() {
			registro_actual = $(this).parent().parent();

      window.location.replace("/mensajeria/bandeja_de_entrada.php")
		})

  	$('#btn_enviar').click(function() {
  		var campos  = [	'titulo', 'severidad', 'cuerpo', 'general' ];
  		var prefijo = 'mensaje';

  		$.ajax({
  			type: "POST",
  			url: "/mensajeria/redactar_mensaje.php",
  			data:	{	padre      : $("#mensaje_padre").val(),
    						titulo     : "-",
    						cuerpo     : $("#mensaje_cuerpo").val(),
  					},
  			dataType: "text json",
  			success: function(retorno){
                      console.log(retorno);

  										if(retorno['estado'] == 0){
  											alert("Mensaje enviado correctamente");
                        window.location.replace("/mensajeria/bandeja_de_entrada.php")
  										}else{
  											texto_errores = '';
  											for(campo in campos){
  												campo = campos[campo];

  												if(retorno['errores'][campo] != null){
  													texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
  													$('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
  													$('#' + prefijo + '_' + campo).addClass('error_de_carga');
  												}else{
  													$('#' + prefijo + '_' + campo).removeClass('error_de_carga');
  												}

  												if(texto_errores != ''){
  													$('#sumario_errores_redactar_mensaje td:first').html(texto_errores);
  													$('#sumario_errores_redactar_mensaje').show();
  													;
  												}else{
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
