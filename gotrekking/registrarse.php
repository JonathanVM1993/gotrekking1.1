<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style5.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones8.js"></script>
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
				<li><a href="">Noticias</a></li>
				<li><a href="usuario_viajes.php">Ver viajes</a></li>

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
			 		<div id="btn_cerrar" class="sindecoracionLink">
			 		<form action="p_cerrarsesion.php">
			 			<p><a href="">Mi perfil</a></p>
			 			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
			 			<p><?php echo "Bienvenido $getCorreo" ?></p>

			 		</form>
			 		</div>
			 		<?php
			 	}
			 	else{
			 		?>
				<form name="formulario-registro" id="formulario-registro" enctype="multipart/form-data" method="post">
				<li><p>Correo :</p><input class="sinborde" type="text" placeholder="Ingrese correo" id="txtCorreoL" name="txtCorreoL"></li>
				<li><p>Contraseña :</p><input class="sinborde" type="password" placeholder="Contraseña" id="txtContraseñaL" name="txtContraseñaL"></li>
				<li><p><input type="button" value="Iniciar sesion" id="btnIniciar"></p></li>
				<li><p><input type="button" value= "Registrarse" onclick="irRegistrar()"></p></li>
			</form>
			<?php
			 	}

			 ?>



			</ul>
			</nav>
		</div>
		</div>
		<div class="content-all">
		<div class="formulario1" id="formulario">
			<h1>Registrate</h1>
			<ul>
				<form name="formulario-envia" id="formulario-envia" enctype="multipart/form-data" method="post">
					<table class="tablaregistrar">
						<tr>
							<td><p>Correo:</p></td>
							<td><input class="sinborde"  name="txtCorreo"   type="text" id="txtCorreo"></td>
						</tr>
						<tr>
							<td><p>Nombres:</p></td>
							<td><input class="sinborde" name="txtNombres"   type="text" id="txtNombres"></td>
						</tr>
						<tr>
							<td><p>Apellidos:</p></td>
							<td><input class="sinborde" name="txtApellidos"   type="text" id="txtApellidos"></td>
						</tr>
						<tr>
							<td><p>Edad:</p></td>
							<td><input class="sinborde" name="txtEdad"   type="text" id="txtEdad"></td>
						</tr>
						<tr>
							<td><p>Rut:</p></td>
							<td><input class="sinborde" name="txtRut"   type="text" id="txtRut"></td>
						</tr>
						<tr>
							<td><p>Contraseña:</p></td>
							<td><input class="sinborde" name="txtContraseña"  type="text" id="txtContraseña"></td>
						</tr>
						<tr>
							<td><p>Enfermedad:</p></td>
							<td><input class="sinborde" name="txtEnfermedad"  type="text" id="txtEnfermedad"></td>
						</tr>
						<tr>
							<td><p>Foto de perfil:</p></td>
							<td><input class="sinborde" type="file" name="foto"  id="foto"></td>
						</tr>
						<tr>
							<td><input type="button" value="Registrar" name ="btnR"id="btnR" onclick="registrar_usuario()"></td>
						</tr>
					</table>
					</form>
			</ul>
					</div>
					<div class="cargando1" id="cargando1">
					</div>
		</div>
	</div>
</body>
</html>
