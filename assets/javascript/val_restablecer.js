$(document).ready(function(){
	//función click
	$("#btn_submit").click(function(){
		var usuario = $("#usuario").val();
		if(usuario == ""){
			mostrarMensaje("exclamation-triangle","Debe ingresar el CUIT/ID de Establecimiento.","error");
			return false;
		}
		return true;
	});//click
});//ready