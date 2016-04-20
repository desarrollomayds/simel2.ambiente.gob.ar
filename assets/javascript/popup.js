
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