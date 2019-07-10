<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";
	}
</script>

<?php

    include 'conexion.php';

    session_start();

    if (isset($_SESSION["administrador"])) {
    	echo "Se encuentra actualmente en el panel de control de : ".$_SESSION["administrador"];
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style9.css">
	<link rel="stylesheet" href="css/boton.css">
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
				<li><a href="">Ver viajes</a></li>

			</ul>
			</nav>
		</div>
		<div class="arribaSesion" id="arribaSesion">
					<form action="p_cerrarsesionadmin.php">
			 			<p>Modo administrador</p>
			 			<button type="submit" class= "bubbly-button">Cerrar sesion</button>
			 		</form>
		</div>


		</div>
		<div class="content-all">
					<div id="admin_menu" class="admin_menu">
						<h1>Registrar guía</h1>
						<form name="formularioguia" id="formularioguia" enctype="multipart/form-data" method="post">
							<table class="tablaregistrar">
								<tr>
									<td><p>Nombre guía:</p></td>
									<td><input class="sinborde"	id="txtNombre" name="txtNombre" type="text"></td>
								</tr>
								<tr>
									<td><p>Apellido parterno guía:</p></td>
									<td><input class="sinborde"	id="txtApellidoP" name="txtApellidoP" type="text"></td>
								</tr>
								<tr>
									<td><p>Apellido materno guía:</p></td>
									<td><input class="sinborde"	id="txtApellidoM" name="txtApellidoM" type="text"></td>
								</tr>
								<tr>
									<td><p>Rut:</p></td>
									<td><input class="sinborde"	id="txtRut" name="txtRut" type="text"></td>
								</tr>
								<tr>
									<td><p>Teléfono:</p></td>
									<td><input class="sinborde"	id="txtTelefono" name="txtTelefono" type="text"></td>
								</tr>
								<tr>
									<td><p>Correo:</p></td>
									<td><input class="sinborde"	id="txtCorreo" name="txtCorreo" type="text"></td>
								</tr>
								<tr>
									<td><p>Password:</p></td>
									<td><input class="sinborde"	id="txtPassword" name="txtPassword" type="text"></td>
								</tr>
								<tr>
							<td><input type="button" class= "bubbly-button" value="Registrar" name ="btnR"id="btnR" onclick="registrar_guia()"></td>
								</tr>
								<td><input type="button" class= "bubbly-button" value="Volver" name ="btnR"id="btnR" onclick="volver_panel()" ></td>
							</table>
						</form>

					</div>
		</div>
				<div class="cargando1" id="cargando1" style='display: none'>
				</div>
		</div>
	</div>
</body>
</html>
