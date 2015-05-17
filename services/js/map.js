var ubicacionX = 4.657656613192351;
var ubicacionY = -74.09355664569091;
var ubicacionX2 = 4.657656613192351;
var ubicacionY2 = -74.09355664569091;
var ubicacionZoom=14;
var map;
var map2;
var oMarcadores = new Array();
var oDetMarcadores = new Array();
var det_markers = new Array();
var infoWindow;
var search;
var enableMarkerClick = true;
var isEditMap = false;
var isClickMap = false;

function det_cargarMapa() {//Funcion que incializa el mapa 
        var mapOptions = {
          center: new google.maps.LatLng(ubicacionX2, ubicacionY2),//coor donde iniciara el mapa
          zoom: 14,
          scrollwheel: false,
          panControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.LARGE,
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map2 = new google.maps.Map(document.getElementById("det_banner_map"), mapOptions);
        google.maps.event.addListener(map2, 'click', function(event) {
		    placeMarker(newMarker, event.latLng);
		 });
}

function des_deleteAllMarkers(){
  for (var i = 0; i < det_markers.length; i++) {
    det_markers[i].setMap(null);
  }
}

function cargarStreetView() {
  var panoramaOptions = {
    position: new google.maps.LatLng(ubicacionX2, ubicacionY2),
    pov: {
      heading: 165,
      pitch: 0
    },
    zoom: 1,
    scrollwheel: false
  };
  var myPano = new google.maps.StreetViewPanorama(
	document.getElementById('banner_streetview'),
	panoramaOptions);
	myPano.setVisible(true);
}

function placeMarker(marker, location) {
	var ubic = String(location);
	var ubic2 = ubic.replace("(", "")
	var ubic3 = ubic2.replace(")", "")
	$('#ubicacion').val(ubic3);
	$('#zoom').val(map.getZoom());
    marker.setPosition(location);
}

function det_changeLocation(){
	alert('det_changeLocation()');
		var xmlHttp = getXMLHttp();
		  xmlHttp.onreadystatechange = function(){
			  
			if(xmlHttp.readyState == 4){
				var myString = xmlHttp.responseText;
		        var mySplitResult = myString.split(",");
		        alert(mySplitResult[0]);
		        alert(mySplitResult[1]);
			}
			// document.body.style.cursor='auto';
		  }
		  xmlHttp.open("GET", "getCiudadLocation.php?idCiudad="+$("#id_ciudad").val(), true); 
		  xmlHttp.send(null);
}
