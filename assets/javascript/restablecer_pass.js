//cambio de password
$(document).ready(function() {
	var data	= new Object();
	data.check 	= 'h279hd982hwd82jw';
	$.ajax({
		type: "POST",
		url: "/login/restablecer/index.php",
		data:	data,
		dataType: "json",
		success: function(msg){
			var json_x = msg;
			if (json_x['error']==true) {
				return false;
			} else {
				var cont =json_x['msg'];
				$('#mel_popup_title').html("Restablecer Contrase&ntilde;a");
				$('#mel_popup_body').html(cont);
				$('#mel_popup_content').width(900);
				$('#mel_popup').addClass("modal fade in");
				$('#mel_popup').show();
				//$('#div_popup').show();
				//centerPopup('div_popup');
				//$('#bigscreen').css("display","block");
			}
		}

	});

});
//pass