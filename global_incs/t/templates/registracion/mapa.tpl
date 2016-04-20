<div id="map" style="width: 300px; height: 300px"></div>

<div align="right" style="width: 100px;margin-top:-40px;float: right;"><br />  
    <a id='btn_aceptar_2'  href='#'><img class="hand" src="/imagenes/boton_aceptar.gif" width="91" height="30" /></a>
</div>

<div id="map"></div>

{literal}
    <script>
	    var map      = null;
	    var geocoder = null;
	
		function load() {
			if (GBrowserIsCompatible()) {
				map = new GMap2(document.getElementById("map"));
				
				map.setCenter(new GLatLng(-34.60828,-58.3708375), 15);
				map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());
				
				geocoder = new GClientGeocoder();
				
				//---------------------------------//
				//   MARCADOR AL HACER CLICK
				//---------------------------------//
				GEvent.addListener(map, "click",	function(marker, point) {
														if (marker) {
															null;
														} else {
															map.clearOverlays();
															var marcador = new GMarker(point);
															map.addOverlay(marcador);
															// document.form_mapa.coordenadas.value = point.y+","+point.x;
															$("#{/literal}{$CAMPO_LATITUD}{literal}").val(point.y);
															$("#{/literal}{$CAMPO_LONGITUD}{literal}").val(point.x);
														}
													}
								);
				//---------------------------------//
				//   FIN MARCADOR AL HACER CLICK
				//---------------------------------//
			}
		}
	
		//---------------------------------//
		//           GEOCODER
		//---------------------------------//		
		function showAddress(address, zoom) {
			if (geocoder) {
				geocoder.getLatLng(address,	function(point) {
												if (!point) {
													alert(address + " not found");
												} else {
													map.setCenter(point, zoom);
													var marker = new GMarker(point);
													map.addOverlay(marker);
													//marker.openInfoWindowHtml("<b>"+address+"</b><br>Coordenadas:<br>Latitud : "+point.y+"<br>Longitud : "+point.x+"<a href=http://www.mundivideo.com/fotos_pano.htm?lat="+point.y+"&lon="+point.x+"&mapa=3 TARGET=fijo><br><br>Fotografias</a>");
													// marker.openInfoWindowHtml("<b>Coordenadas:</b> "+point.y+","+point.x);
													//document.form_mapa.coordenadas.value = point.y+","+point.x;
													//parent.document.f_solapa_1.latitud.value = point.y+","+point.x;
													
													//parent.document.f_solapa_1.latitud.value = point.y;
													//parent.document.f_solapa_1.longitud.value = point.x;
												}
											}
								);
			}
		}
	    //---------------------------------//
	    //     FIN DE GEOCODER
		//---------------------------------//

	    $().ready(function(){
			load();
			showAddress("{/literal}{$PUNTO_INICIO}{literal}");
		});	
		
	    $("#btn_aceptar_2").click(function(){
			$("#div_popup_2").removeClass('div_mapa');
			$("#div_popup_2").hide();
			$('#bigscreen').hide();
		});	
		
    </script> 

{/literal}
