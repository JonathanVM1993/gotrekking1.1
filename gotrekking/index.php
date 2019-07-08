<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style5.css">
	<link rel="stylesheet" href="css/boton.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones6.js"></script>
	<script src="js/jsboton.js"></script>
	<script>
		$(document).ready(function() {
			//boton registrar
			$("#btnIniciar").click(function(){
				var parametros = {
					correo: $("#txtCorreoL").val(),
					contraseña: $("#txtContraseñaL").val()

				};
				$.ajax({
				url: 'p_login.php',
				type: 'post',
				data: parametros,
				error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
				beforeSend: function(){
					// mostrar algo antes de que cargue el archivo del servidor
					// gif
					$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
				},
				success: function(parametroRetorno){
					// mostrar el resultado del archivo
					$("#cargando1").html(parametroRetorno);
				}
				});
			});
			// boton registrar
			});
	</script>
	<script>
	var animateButton = function(e) {

		e.preventDefault;
		//reset animation
		e.target.classList.remove('animate');

		e.target.classList.add('animate');
		setTimeout(function(){
			e.target.classList.remove('animate');
		},700);
	};

	var bubblyButtons = document.getElementsByClassName("bubbly-button");

	for (var i = 0; i < bubblyButtons.length; i++) {
		bubblyButtons[i].addEventListener('click', animateButton, false);
	}
	</script>

	<style>
		h1{
			font-family: 'Poppins', sans-serif;
			font-size: 400%;
			color: #FFFFFF;
		}

		a{
			color: #FFFFFF;
		}
		li{
			font-family: 'Poppins', sans-serif;
			font-size: 100%;
			color: #FFFFFF;
			list-style: none;
		}

	</style>
</head>
<body>
	<div id="contenedor">
		<div id="arriba">
		<div id="logoGoTrekking">
			<nav>
				<ul class="navLogo">
					<li id="Logo">
					</li>
				</ul>
			</nav>
		</div>
		<div class="divarriba" id="listarriba">
			<nav class="navlistaarriba">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="noticias.php">Noticias</a></li>
				<li><a href="usuario_viajes.php">Ver viajes</a></li>
				<li><a href="usuario_postulacion.php">Postularme como guia</a></li>
			</ul>
			</nav>
		</div>
		<div class="arribaSesion" id="arribaSesion">
			<nav class="arribasesion1">
			<ul>
			<?php
			require_once("p_isLogin.php");
			if ($estado) {
			 		?>
			 		<div id="sesion" class="sindecoracionLink">
			 		<form action="p_cerrarsesion.php">
						<div class="li_misesion">
								<li><p><a href="">Mis viajes</a></p></li>
								<li><p><a href="">Mi perfil</a></p></li>
								<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
						</div>
						<div class="foto_perfil">
							<img src="<?php echo $getFoto?>" width="100%" height="100%">
						</div>
			 		</form>
			 		</div>
			 		<?php
			 	}
			 	else{
			 		?>
				<form name="formulario-registro" id="formulario-registro" enctype="multipart/form-data" method="post">
				<li><p>Correo :</p><input class="sinborde" type="text" placeholder="Ingrese correo" id="txtCorreoL" name="txtCorreoL"></li>
				<li><p>Contraseña :</p><input class="sinborde" type="password" placeholder="Contraseña" id="txtContraseñaL" name="txtContraseñaL"></li>
				<li><p><input type="button" class= "bubbly-button" value="Iniciar sesion" id="btnIniciar"></p></li>
				<li><p><input type="button" class= "bubbly-button" value= "Registrarse" onclick="irRegistrar()"></p></li>
			</form>
			<?php
			 	}?>
			</ul>
			</nav>
		</div>


		</div>
		<div class="content-all">
					<div class="unete1" id="unete">
						<strong><h1>Unete a la aventura de tu vida</h1></strong>
						<p>Inscríbete para recibir fechas de actividades
						noticias, consejos, datos de salidas, talleres de Gotrekking.
						No te puedes perder el comienzo de esta aventura, solo debes
						registrarte para comenzar!
						</p>
						<br>
						<p>Si deseas registrarte y obtener más información haz click <a href="registrarse.html">>>aquí<<</a></p>
					</div>
					</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
</body>
</html>
