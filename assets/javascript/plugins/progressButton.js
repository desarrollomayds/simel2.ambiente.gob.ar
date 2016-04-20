/**
 * ProgressButton v.1.0
 *
 * Author: Lic. Mauricio Aranda
*/

var progessButton = {
		instance: false,
		init: function (instance){
			this.instance = instance;
		},
		setProgress: function(value){
		// value: desde 0 hasta 1 con comas. ej. 0.3 = 30%
			this.instance.setProgress(value);
		},
		stopProgress: function(value){
		//value:  -1 : false 1: true
			if(value != 1)
			value = -1;
			this.instance.setProgress(1);
			this.instance.stop(value);
		}
	};



	/**
 * Definición de los botones de progreso
 *
 * Author: Lic. Mauricio Aranda
	 *
	 * Button: Indica el ID del botón, este ID debe colocarse en el mismo elemento donde se situa la clase progress-button
	 * fcn: Es la función a la que va a llamar cuando se presione sobre el botón. Esta función internamente puede administrar
	 * 		la barra de progreso del botón
	 * vars: Variables adicionales que puede necesitar la función llama el boton
*/
function newProgressButton(button, fcn, vars){

		new UIProgressButton( document.querySelectorAll( '#'+button )[0], {
			callback : function( instance) {
				var params = [instance,vars];
				var fn = window[fcn];				 

				if (typeof fn === "function") {
					fn.apply(null, params)
				};
			}
		} );
}