<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
	<link rel="stylesheet" href="css/style8.css">
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

					<div id="perfil_user" class="perfil_user">
          <h1>Mi perfil</h1>
          <?php
          include "conexion.php";
          $id = $getId;
          $queryperfil = "SELECT * FROM t_usuario WHERE id_usuario = $id";
          $ejecutarperfil = mysqli_query($conexion, $queryperfil);
          $rowperfil = mysqli_fetch_row($ejecutarperfil);
          $getCorreo = $rowperfil[1];
          $getRutaFoto = $rowperfil[8];
          echo "<p>Correo: $getCorreo</p>";
          echo "<p>Nombres: $getNombres</p>";
          echo "<p>Apellidos: $getApellidos</p>";
          echo "<p>Rut: $getRut</p>";
          echo "<p>Edad: $getEdad</p>";
          echo "<p>Enfermedad: $getEnfermedad</p>";
          echo "<button>Modificar</button>";
           ?>
					</div>
          <div id="foto_p" name="foto_p" class="foto_p">
          <img src="<?php echo $getFoto?>" alt="" height="100%" width="100%">
          </div>

		</div>
	</div>
</body>
</html>
