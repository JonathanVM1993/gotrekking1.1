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
	<link rel="stylesheet" href="css/style5.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones.js"></script>
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

		<div id="tabla_mostrar_guias" class="table_guias">
			<?php
	include "conexion.php";

	if (isset($_POST['eliminar'])){
		$id_viaje = $_POST['id'];
		$eliminar = "DELETE FROM t_viaje where id_viaje = '".$id_viaje."' ";
		$query = "SELECT * from t_viaje";

    $eliminarcuestionario = "DELETE FROM cuestionario where viaje_cuestionario = '$id_viaje'";
    $ejecutar = mysqli_query($conexion, $eliminarcuestionario);

    $eliminarusuariodelviaje = "DELETE FROM usuarios_viaje where n_viaje ='$id_viaje'";
    $ejecutareliminarviaje = mysqli_query($conexion, $eliminarusuariodelviaje);

		error_reporting(E_ERROR | E_PARSE);
			$ejecutar = mysqli_query($conexion,$eliminar);
			if (!$ejecutar) {
				echo "<script>errorEliminar()</script>";
				header('location:admin_verviajes.php');
			}
				echo "Guía eliminado correctamente";
				header('location:admin_verviajes.php');

	}else{
	$query = "SELECT * from t_viaje";
	$mostrar = mysqli_query($conexion,$query);


	while ($row = mysqli_fetch_row($mostrar)) {
	$id = $row[0];
	echo "<table>
			<td><p>Id:</p>$row[0]</td>
		  <td><p>Nombre:</p>$row[1]</td>
		  <td><p>Fecha viaje:</p>$row[2]</td>
		  <td><p>Id guia:</p>$row[3]</td>
		  <td><p>Ubicacion:</p>$row[9]</td>
		  <td><p>Precio:</p>$row[11]</td>
		  <td>
		  <form method='POST'>
		  	<input type='hidden' name='id' value='$row[0]''>
		  	<input type='submit' name='eliminar' value='Eliminar'>
		  </form>
      <td>
        <form action='p_verlistapagados.php' method='POST'>
        <input type='hidden' name='viaje_id' value='$row[0]'/>
        <input type='submit' value='Inscritos'/>
        </form>
      </td>
      </td>
			</tr>
		  </table>
	";

	}
	echo '<a href="panel_admin.php">Volver</a>';
}
	mysqli_close($conexion);

 ?>
		</div>
		</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
</body>
</html>
