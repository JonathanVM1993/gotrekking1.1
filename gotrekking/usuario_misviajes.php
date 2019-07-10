<script>
	function errorSession(){
		alert("Debe hacer login primero");
		window.location = "index.php";
	}
</script>

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
			font-size: 300%;
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
    p{
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

			</ul>
			</nav>
		</div>
		<div class="arribaSesion" id="arribaSesion">
      <nav class="arribasesion1">
      <ul>
      <?php
      require("p_isLogin.php");
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
      <div class="proximos_viajes">
        <h1>Mis proximos viajes</h1>

      <div class="tabla_pagados">
        <?php
          include "conexion.php";

          $queryviajes = "SELECT cliente,n_viaje,estado_pago from usuarios_viaje WHERE cliente = $getId";
        	$mostrar = mysqli_query($conexion,$queryviajes);
            echo "<table class='tabla_pagados' border= '1px'>
          			<tr>
          			<th><p>Nombre viaje</p></th>
          			<th><p>Fecha viaje</p></th>
          			<th><p>Ubicacion</p></th>
          			<th><p>Precio viaje</p></th>
                <th><p>Estado pago</p></th>
          			</tr>
          			";
          	while ($row1=mysqli_fetch_array($mostrar)) {
              $viaje = $row1[1];
              $estado_pago = $row1[2];
              $estado_nopagado = "Pagado";
              $querycomparar = "SELECT nombre_viaje, fecha_viaje, ubicacion, precio_viaje from t_viaje WHERE id_viaje=$viaje";
              $ejecutar = mysqli_query($conexion, $querycomparar);
              while ($row2 = mysqli_fetch_row($ejecutar)) {
                echo "<table border= '1px'class='tabla_pagados' table-layout='fixed' text-align='left' text-size-adjust='auto' text-align='left'>
                <tr>
                <td><p>$row2[0]</p></td>
                <td><p>$row2[1]</p></td>
                <td><p>$row2[2]</p></td>
                <td><p>$row2[3]</p></td>
                <td><p>$estado_pago</p></td>
                </tr>
                <tr>
                <td>";if($estado_pago==$estado_nopagado) {
                  echo "<p>Ya está pagado este viaje!</p>";
                }
                else{
                  echo "<button>Pagar</button>";
                } echo"</td>
                </tr>
                </table>";
              }
            }
            ?>
         </div>
         <button <button class= "bubbly-button" value= "Registrarse" onclick="volverPerfil()">Volver</button>
      </div>

		</div>
	</div>
</body>
</html>
