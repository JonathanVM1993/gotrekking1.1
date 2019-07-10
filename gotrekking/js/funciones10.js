
function irRegistrar(){
			location.href = "registrarse.php";
}

function volverGuiaViajes(){
			location.href = "guia_misviajes.php"
}

function volverGuiaPerfil(){
      location.href = "panel_guia.php";
}

function volverPerfil(){
			location.href = "usuario_perfil.php";
}

function irInicio(){
			location.href = "index.php";
}

function prueba(){
		alert("Funciona");
}

function volver_panel(){
			location.href = "panel_admin.php"
}
function irCuestionario(){
	  location.href = "usuario_cuestionario.php";
}

function irViajes(){
  location.href = "usuario_viajes.php";
}

function volver_viajes(){
  location.href = "admin_verviajes.php";
}

function miPerfil(){
	location.href = "usuario_perfil.php";
}

function registrar_usuario(){

	var parametros = new FormData($("#formulario-envia")[0]);

	$.ajax({
		url: "p_registro.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function registrar_guia(){

	var parametros = new FormData($("#formularioguia")[0]);

	$.ajax({
		url: "p_agregarguia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function registrar_viaje(){

	var parametros = new FormData($("#formularioviaje")[0]);

	$.ajax({
		url: "p_agregarviaje.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}

function agregar_noticia(){

	var parametros = new FormData($("#formularionoticia")[0]);
  alert("asd");
	$.ajax({
		url: "p_agregarnoticia.php",
		type: "post",
		data: parametros,
		contentType: false,
		processData: false,
		error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
		beforesend: function(){
		$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
		},
		success: function(parametroRetorno){
			$("#cargando1").html(parametroRetorno);
		}
	});
}
