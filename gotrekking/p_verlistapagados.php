<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";

		function errorEliminar(){
			alert("No puede eliminar al guía ya que se encuentra en un viaje");
		}
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
	<link rel="stylesheet" href="css/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones5.js"></script>
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
			 			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
			 		</form>
		</div>


		</div>
		<div class="content-all">

		<div id="tabla_mostrar_guias" class="tabla_pagados">
      <?php

      include "conexion.php";
      $id_viaje = $_POST['viaje_id'];
      $query = "SELECT * FROM usuarios_viaje WHERE n_viaje = '$id_viaje'";
      $ejecutar = mysqli_query($conexion, $query);

      while ($row = mysqli_fetch_row($ejecutar)) {
        $queryuser = "SELECT * FROM t_usuario WHERE id_usuario='$row[1]'";
        $queryejecutar = mysqli_query($conexion, $queryuser);
        $row1 = mysqli_fetch_row($queryejecutar);
        $nombreuser = $row1[2];
        $apellidouser = $row1[3];
        $estadopago = $row[3];
        $viaje = $row[3];
      echo "$id_viaje";
      echo "<table class='tabla_pagados' border='1px'>
      <tr>
        <td>Nombre:$nombreuser $apellidouser</td>
        <td>Estado pago: $estadopago</td>
        <td><input type='button' value='Ver cuestionario' name ='btnR'id='btnR' onclick='volver_viajes()'></td>
      </tr>
      </table>";
      }
       ?>
      <input type='button' value='Volver' name ='btnR'id='btnR' onclick='volver_viajes()'>
		</div>
		</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
</body>
</html>