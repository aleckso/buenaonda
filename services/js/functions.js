$(document).ready(readyFn);

function readyFn(){

	$("#loginForm").validate({
			rules: {
				email: { required: true, email: true },
				contrasena: { required: true, minlength: 6 }
			},
			messages: {
				email: "Ingrese un email válido",
				contrasena: "Minimo 6 caracteres"
			}
	});

	$("#registroForm").validate({
			rules: {
				nombre: { required: true, minlength: 3 },
				cedula: { required: true, minlength: 3, number: true },
				email: { required: true, email: true },
				contrasena: { required: true, minlength: 6 },
				contrasena_conf: { equalTo: "#contrasena" }
			},
			messages: {
				nombre: "Minimo 3 caracteres",
				cedula: "Minimo 3 caracteres numéricos",
				email: "Ingrese un email válido",
				contrasena: "Minimo 6 caracteres",
				contrasena_conf: "Las contraseñas no coinciden"
			}
	});

	$("#articuloForm").validate({
			rules: {
				articulo: { required: true, minlength: 3 },
				precio: { required: true, minlength: 3, number: true }
			},
			messages: {
				articulo: "Minimo 3 caracteres",
				precio: "Minimo 3 caracteres numéricos"
			}
	});

	getArticuloList();
}

function setFotos(foto1, foto2, foto3, foto4){
	$('#foto_principal').css("background-image", "url("+foto1+")");
	$('#foto_1').css("background-image", "url("+foto1+")");
	$('#foto_2').css("background-image", "url("+foto2+")");
	$('#foto_3').css("background-image", "url("+foto3+")");
	$('#foto_4').css("background-image", "url("+foto4+")");
}

function setPrincipal(foto){
	$('#foto_principal').css("background-image", "url("+foto+")");
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











