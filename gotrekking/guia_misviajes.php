<script>
	function errorSession(){
		alert("Usted no tiene permiso jeje");
		window.location = "index.php";
	}
  function correctoFinalizar(){
  alert("Viaje finalizado con exito");
}

</script>
<?php
    include 'conexion.php';
    session_start();
    if (isset($_SESSION["usuarioguia"])) {
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
	<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style9.css">
	<link rel="stylesheet" href="css/boton.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones10.js"></script>
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
			font-family: 'Open+Sans', sans-serif;
			font-size: 200%;
			color: #FFFFFF;
		}
		a{
			color: #FFFFFF;
		}
		li{
			font-family: 'Open+Sans', sans-serif;
			font-size: 100%;
			color: #FFFFFF;
			list-style: none;
		}
    p{
      font-family: 'Open+Sans', sans-serif;
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
		<div class="divarribaGuia" id="listarribaGuia">
			<nav class="navlistaarriba">
			<ul>
				<li><a href="guia_misviajes.php">Mis viajes</a></li>
				<li><a href="guia_escribirbitacora.php">Escribir en Bitacora</a></li>
				<li><a href="guia_mibitacora.php">Mi bitacora</a></li>
        <li><a href="guia_modificar.php">Modificar perfil</a></li>
			</ul>
			</nav>
		</div>
		<div class="sesion" id="arribaSesionGuia">
					<form action="p_cerrarsesionguia.php">
			 			<button type="submit" class= "bubbly-button" admin>Cerrar sesion</button>
			 		</form>
		</div>
		</div>
		<div class="content-all">
					<div id="guia_misviajes" class="guia_misviajes">
            <h1>Próximos viajes por realizar</h1>
            <?php
              require("isLoginGuia.php");
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

            			}
                    $getCantidad = $getCantidad+1;
                    $insertarcantidad = "UPDATE t_guia_trekking SET viajes_realizados='$getCantidad' WHERE id_guia='$getIdGuia'";
                    $ejecutar = mysqli_query($conexion, $insertarcantidad);
            				echo "<script>correctoFinalizar()</script>";
            				header('location:guia_misviajes.php');
            	}
            else{
              $query = "SELECT nombre_viaje,fecha_viaje,ubicacion,hora_reunion,id_viaje FROM t_viaje WHERE id_guia ='$getIdGuia'";
              $ejecutar = mysqli_query($conexion, $query);
              echo "
                <table class='tabla_pagados'>
              <tr>
                <td><p>Finalizar viaje</p></td>
                <td><p>Inscritos</p></td>
                <td><p></p></td>
                <td><p>Nombre viaje</p></td>
                <td><p>Fecha viaje</p></td>
                <td><p>Ubicacion</p></td>
                <td><p>Hora reunion</p></td>
              </tr>
              </table>
              ";
              while ($row=mysqli_fetch_row($ejecutar)) {
                echo "
                <table class='tabla_pagados'>
                <tr>
                <td>
                <form method='POST'>
                  <input type='hidden' name='id' value='$row[4]''>
                  <input type='submit' name='eliminar' value='Finalizar'>
                </form>
                <td>
                  <form action='p_verlistainscritos.php' method='POST'>
                  <input type='hidden' name='viaje_id' value='$row[4]'/>
                  <input type='submit' value='Inscritos'/>
                  </form>
                </td>
                <td>
                  <td><p>$row[0]</p></td>
                  <td><p>$row[1]</p></td>
                  <td><p>$row[2]</p></td>
                  <td><p>$row[3]</p></td>
                </tr>
                </table>";
                }
                }
             ?>
             <button onclick="volverGuiaPerfil()">Volver</button>
					</div>

		</div>
	</div>
</body>
</html>
