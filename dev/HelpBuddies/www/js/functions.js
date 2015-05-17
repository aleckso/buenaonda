$(document).ready(readyFn);

function readyFn(){
	checkFacebook();
}

function checkFacebook(){
	$("#home_user_info").html("");
	var xmlHttp = getXMLHttp();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			var response = xmlHttp.responseText;
			$("#home_user_info").html(response);
		}
	}
	xmlHttp.open("POST", "http://helpbuddies.alexsosa.net/index.php", true);
	var parameters = "";
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(parameters);
}











