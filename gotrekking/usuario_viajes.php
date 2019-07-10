<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style8.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="http://localhost:35729/livereload.js" charset="utf-8">	</script>
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
				<li><a href="ver_viajes.php">Ver viajes</a></li>
				<li><a href="">Postular como guia</a></li>
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
				<li><p><input type="button" value="Iniciar sesion" id="btnIniciar"></p></li>
				<li><p><input type="button" value= "Registrarse" onclick="irRegistrar()"></p></li>
			</form>
			<?php
			 	}?>
			</ul>
			</nav>
		</div>

		</div>
		<div class="content-all">
					<?php
					include 'conexion.php';
						$query = "SELECT * FROM t_viaje";
						$mostrar = mysqli_query($conexion, $query);

						while ($row=mysqli_fetch_array($mostrar)) {
							$nombreviaje = $row[1];
							$fecha = $row[2];
							$descripcion = $row[8];
							$ubicacion = $row[011];
							$rutaimagen1 = $row[4];
							$rutaimagen2 = $row[5];
							$rutaimagen3 = $row[6];
							$rutaimagen4 = $row[7];
							$nivelexperiencia = $row[012];
							$precio_viaje = $row[013];
							$query_nivel = "SELECT nivel_de_viaje FROM nivel_viaje WHERE id_nivel ='$nivelexperiencia'";
							$buscar_nivel = mysqli_query($conexion, $query_nivel);
							$resultado = mysqli_fetch_array($buscar_nivel);
							$nivel = $resultado[0];

							echo "<div class='viaje1'>
							<div class='viaje_descripcion'><p>Nombre viaje: $nombreviaje</p>
							<p>Fecha: $fecha</p>
							<p>Ubicacion: $ubicacion</p>
							<p>Descripcion: $descripcion</p>
							<p>Nivel viaje: $nivel</p>
							<p>Precio viaje: $precio_viaje</p>
              ";
						  require_once("p_isLogin.php");
							if ($estado) {
								echo "<input type='button' value='Inscribirme' name ='btnR'id='btnR' onclick='irCuestionario()'>";
							}
							echo "
							<input type='button' value='Volver' name ='btnR'id='btnR' onclick='ir_inscripcion()'>
							</div>
							<div class='imagen'> <img src='$rutaimagen1' width='100%' height='100%'> </div>
							<div class='imagen'> <img src='$rutaimagen2' width='100%' height='100%'></div>
							<div class='imagen'> <img src='$rutaimagen3' width='100%' height='100%'></div>
							<div class='imagen'> <img src='$rutaimagen4' width='100%' height='100%'></div>
						</div>";
						}
					 ?>
					</div>
					<div class="cargando1" id="cargando1" style='display: none'>

					</div>
		</div>
	</div>
</body>
</html>
