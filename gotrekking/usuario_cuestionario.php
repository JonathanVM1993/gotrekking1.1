<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style8.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
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
    p{
      font-family: 'Poppins', sans-serif;
      color: #FFFFFF;
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
				<li><a href=""></a>Postularme como guia</li>
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
						<div class="cuestionario" id="cuestionario">
              <form action="p_ingresarcuestionario.php" name="formcuestionario" id="formcuestionario" enctype="multipart/form-data" method="post">
              <p>¿Que viaje deseas realizar?</p>
              <select name="id_viaje" id="id_viaje">
                <option value="$row[0]" selected>Eligir viaje</option>
                <?php
                include "conexion.php";
              $query = "SELECT * from t_viaje";
              $mostrar1 = mysqli_query($conexion,$query);
                while ($row=mysqli_fetch_array($mostrar1))
                  {?>
                  <option value="<?php echo "$row[0]";?>"><?php echo "$row[1]"?></option>
                  <?php } ?>
              </select>
              <p>¿Has realizado trekking anteriormente?</p>
              <input type="radio" name="realizado" value="Si">Si<br>
              <input type="radio" name="realizado" value="No">No<br>
              <p>¿Que equipamento Outdoor posees?</p>
              <p>Calzado:</p>
              <select name="calzado" id="calzado">
                <option value="">         </option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
              <p>Primera o segunda capa:</p>
              <select name="capa" id="capa">
                <option value="">         </option>
                <option value="No">No</option>
                <option value="Primera">Primera</option>
                <option value="Segunda">Segunda</option>
                <option value="Ambas">Ambas</option>
              </select>
              <p>Baston de apoyo</p>
              <select name="baston" id="baston">
                <option value="">         </option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
              <p>¿Cuanta actividad física realizas a la semana?</p>
              <input type="radio" name="actividad" value="0">Ninguna<br>
              <input type="radio" name="actividad" value="1">1 vez<br>
              <input type="radio" name="actividad" value="2">2 veces<br>
              <input type="radio" name="actividad" value="3">3 veces<br>
              <input type="radio" name="actividad" value="4">4 o más<br>
              <p>¿Cuanto mides?</p>
              <input type="text" id="altura" name="altura">
              <p>¿Cuanto pesas?</p>
              <input type="text" id="peso" name="peso">
              <p>¿Cuentas con alguna enfermedad o problema físico?</p>
              <input type="text" id="problema" name="problema">
              <p>Nivel de experiencia:</p>
              <select name="id_nivel" id="id_nivel">
              <option value="$row1[0]" selected>Seleccione nivel</option>
              <?php
              include "conexion.php";
              $query2 = "SELECT * from nivel_viaje";
              $mostrar3 = mysqli_query($conexion,$query2);
              while ($row2=mysqli_fetch_array($mostrar3))
                {?>
                <option value="<?php echo "$row2[0]";?>"><?php echo "$row2[1]"?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Enviar cuestionario">
						<input type='button' value='Volver' name ='btnR'id='btnR' onclick='irViajes()'>
              </form>
            </div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
</body>
</html>
