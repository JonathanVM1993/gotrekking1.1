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
	<link rel="stylesheet" href="css/style5.css">
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

	    <div id="agregarviaje" class="agregarviaje">

	    	<form action="p_agregarviaje.php" name="formularioviaje" id="formularioviaje" enctype="multipart/form-data" method="post">
	    		<table>
	    			<tr>
	    				<td><p>Nombre viaje:</p></td>
	    				<td><input type="text" class="sinborde" id="txtNombre" name="txtNombre"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Fecha viaje:</p></td>
	    				<td><input value="aa-mm-dd" type="datetime" class="sinborde" id="txtFecha" name="txtFecha" maxlength="10"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Seleccionar guía:</p></td>
	    				<td>
	    					<select name="id" id="id">
	    						<option value="$row[0]" selected>Eligir guia</option>
	    						<?php
	    						include "conexion.php";
								$query = "SELECT * from t_guia_trekking";
								$mostrar = mysqli_query($conexion,$query);

	    						while ($row=mysqli_fetch_array($mostrar))
	    							{?>
	    							<option value="<?php echo "$row[0]";?>"><?php echo "$row[1] $row[2]"?></option>
	    							<?php } ?>
	    					</select>

	    				</td>
	    			</tr>
	    			<tr>
	    				<td><p>Imagen 1:</p></td>
	    				<td><input class="sinborde" type="file" name="img1"  id="img1"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Imagen 2:</p></td>
	    				<td><input class="sinborde" type="file" name="img2"  id="img2"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Imagen 3:</p></td>
	    				<td><input class="sinborde" type="file" name="img3"  id="img3"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Imagen Google Maps:</p></td>
	    				<td><input class="sinborde" type="file" name="img4"  id="img4"></td>
	    			</tr>
	    			<tr>
	    				<td><p>Descripcion viaje:</p></td>
	    				<td><textarea name="txtDescripcion" id="txtDescripcion"  cols="30" rows="10"></textarea>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td><p>Ubicación:</p></td>
	    				<td><input class="sinborde" type="text" name="txtUbicacion"  id="txtUbicacion"></td>
	    			</tr>
						<tr>
	    				<td><p>Nivel viaje:</p></td>
	    				<td>
								<select name="id_nivel" id="id_nivel">
								<option value="$row1[0]" selected>Seleccione nivel</option>
								<?php
								include "conexion.php";
							$query1 = "SELECT * from nivel_viaje";
							$mostrar1 = mysqli_query($conexion,$query1);
								while ($row1=mysqli_fetch_array($mostrar1))
									{?>
									<option value="<?php echo "$row1[0]";?>"><?php echo "$row1[1]"?></option>
									<?php } ?>
							</select>
							</td>
	    			</tr>
						<tr>
	    				<td><p>Precio viaje:</p></td>
	    				<td><input class="sinborde" type="text" name="txtPrecio"  id="txtPrecio"></td>
	    			</tr>
						<tr>
	    				<td><p>Ingrese hora reunion:</p></td>
	    				<td><input class="sinborde" type="text" name="txtHora"  id="txtHora"></td>
	    			</tr>
	    			<tr>
							<td><input type="submit" value="Registrar" name ="btnR"id="btnR"></td>
						</tr>
						<tr>
							<td><input type="button" value="Volver" name ="btnR"id="btnR" onclick="volver_panel()"></td>
						</tr>

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
