$(document).ready(readyFn);

function readyFn(){

	
}

function setFotoPrincipal(foto){
	$('#home_user_box').css("background-image", "url("+foto+")");
	$('#home_user_photo').css("background-image", "url("+foto+")");
}


function getArticuloList(id_tipo_articulo){
	$("#content_list").html("");
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var response = xmlHttp.responseText;
			$("#content_list").html(response);
		}
	}
	xmlHttp.open("POST", "articuloList.php", true);
	var parameters = "";
	if(id_tipo_articulo){
		parameters = "id_tipo_articulo="+id_tipo_articulo;
	}
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(parameters);
}

function showBadgeDescription(){
	$("#home_badge_description").slideDown();
}

function hideBadgeDescription(){
	$("#home_badge_description").slideUp();
}











