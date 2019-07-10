<script>
	function errorSession(){
		alert("Usted no tiene permiso jeje");
		window.location = "index.php";
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
	<link rel="stylesheet" href="css/style10.css">
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
					<div id="guia_bitacoraE" class="guia_bitacoraE">
            <h1>Bitácora del viajero</h1>
            <form action="p_agregarb.php"name="form-b" id="form-b" enctype="multipart/form-data" method="post">
            <?php
              require('isLoginGuia.php');
              include ("conexion.php");
             ?>
             <td>
               <select name="id_viaje" id="id_viaje">
               <option value="$row1[0]" selected>Seleccione viaje</option>
               <?php
               include "conexion.php";
             $query1 = "SELECT nombre_viaje,id_viaje,id_guia from t_viaje WHERE id_guia ='$getIdGuia'";
             $mostrar1 = mysqli_query($conexion,$query1);
               while ($row1=mysqli_fetch_array($mostrar1))
                 {?>
                 <option value="<?php echo "$row1[1]";?>"><?php echo "$row1[0]"?></option>
                 <?php } ?>
             </select>
             </td>
             <p>Agrega historia a tu bitacora</p>
             <textarea name="d_bit" id="d_bit" rows="8" cols="50"></textarea>
             <br>
             <button name ="btnR"id="btnR" onclick="agregar_bitacora()">Agregar</button>
             </form>
					</div>
		</div>
	</div>
</body>
</html>
