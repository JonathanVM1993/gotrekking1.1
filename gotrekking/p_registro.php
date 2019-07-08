<script>
	function registroExito(){
		alert("Bienvenido usuario :");
	}

	function probando(){
		alert("Verificando");
	}

</script>

<script src="js/funciones2.js"></script>

<?php
	    include 'conexion.php';

			$correo1 = $_POST['txtCorreo'];
			$nombres1 = $_POST['txtNombres'];
			$apellidos1 = $_POST['txtApellidos'];
			$edad1 = $_POST['txtEdad'];
			$rut1 = $_POST['txtRut'];
			$password1 = $_POST['txtContraseña'];
			$enfermedad1 = $_POST['txtEnfermedad'];
			$foto = $_FILES['foto'];

			$nombreArchivo = $_FILES['foto']['tmp_name'];

			$nom_random = rand(1, 10000);
			$nom = $nom_random;


			$ruta= "fotousuarios/".$nom.".jpg";
			move_uploaded_file($foto["tmp_name"], $ruta);

			echo "<script>probando()</script>";

			$insertar = "INSERT INTO t_usuario(correo,nombres,apellidos,edad,rut,password,enfermedad,imagen)VALUES('$correo1','$nombres1','$apellidos1','$edad1','$rut1','$password1','$enfermedad1','$ruta')";


			$verificar_usuario = mysqli_query($conexion, "SELECT * FROM t_usuario WHERE correo = '$correo1'");



			if (mysqli_num_rows($verificar_usuario) > 0) {
				echo "El usuario ya se encuentra registrado con este correo";
				echo "<script>registroExito()</script>";
				exit;
			}

			$resultado = mysqli_query($conexion,$insertar);
			if (!$resultado) {
				echo 'Error al registrarse';
				echo "<script>registroExito()</script>";

			}
			else{
				echo "<script>registroExito()</script>";

			}
			mysqli_close($conexion);
 ?>
