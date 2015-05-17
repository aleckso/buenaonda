$(document).ready(readyFn);

function readyFn(){

	
}

function setFotoPrincipal(foto){
	$('#home_user_box').css("background-image", "url("+foto+")");
	$('#home_user_photo').css("background-image", "url("+foto+")");
}


function setProyectoInsertForm(){
	$("#contenido").html("");
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var response = xmlHttp.responseText;
			$("#contenido").html(response);
		}
	}
	xmlHttp.open("POST", "proyectoInsertForm.php", true);
	var parameters = "";
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(parameters);
}

function insertProyecto(){
	$("#contenido").html("");
	var xmlHttp = getXMLHttp();
	var id_proyecto="";
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var response = xmlHttp.responseText;
			id_proyecto = response;
			proyectoUpdateFotos(id_proyecto);
		}
	}
	xmlHttp.open("POST", "proyectoInsertAction.php", true);
	var parameters = "titulo="+document.getElementById("title").value+"&descripcion="+document.getElementById("descripcion").value;
	alert(parameters);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(parameters);
}

function proyectoUpdateFotos(id_proyecto){
	$("#contenido").html("");
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var response = xmlHttp.responseText;
			$("#contenido").html(response);
		}
	}
	xmlHttp.open("POST", "proyectoUpdateFotos.php?id_proyecto=<?=$id_proyecto;?>", true);
	var parameters = "id_proyecto="+id_proyecto;
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(parameters);
}

function showLogout(){
	$("#home_logout").show();
}

function hideLogout(){
	$("#home_logout").hide();
}

function showLevel(level){
	var porcentaje = (level * 200)/100;
	$('#home_user_level').css("width", porcentaje+"px");
}

function getCiudades() { 
	document.getElementById('id_ciudad').options.length = 0;
	var xmlHttp = getXMLHttp();
	  xmlHttp.onreadystatechange = function()
	  {
		  
		if(xmlHttp.readyState == 4){
			var myString = xmlHttp.responseText;

	        var mySplitResult = myString.split(",");
			 for(var i=0; i<=mySplitResult.length-1; i++) {
				 var optionData = mySplitResult[i].split("|");
				 var listitem = document.createElement("option");
				 listitem.text=optionData[1];
				 listitem.value=optionData[0];
				 alert(listitem.text);
				// if(i==0) document.getElementById('idCiudad').value=trim(optionData[0]);
				 try {//For FIREFOX
					  document.getElementById('id_ciudad').add(listitem, null);
				 }
				 catch (e) {//For IE
					  document.getElementById('id_ciudad').add(listitem);
				 }
			 }
			 //alert(document.getElementById('idCiudad').value);
		}
		// document.body.style.cursor='auto';
	  }
	  xmlHttp.open("GET", "getCiudades.php?idDepartamento="+$("#id_departamento").val(), true); 
	  xmlHttp.send(null);
}









