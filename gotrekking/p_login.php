<script>
	function exito(){
		alert("Bienvenido Usuario");
		window.location = "usuario_perfil.php";
	}

	function exitoAdmin(){
		alert("Bienvenido administrador");
		window.location = "panel_admin.php";
	}

	function noEncontrado(){
		alert("Usuario no se encuentra registrado");
		window.location = "index.php";
	}
</script>

<?php
	    include 'conexion.php';
	    session_start();
	    $correo1 = $_POST['correo'];
	    $contraseña1 = $_POST['contraseña'];

	    $verificar_admin = mysqli_query($conexion, "SELECT correo and password FROM t_admin WHERE correo = '$correo1' AND password = '$contraseña1'");
	    $verificar_usuario = mysqli_query($conexion, "SELECT correo and password FROM t_usuario WHERE correo = '$correo1' AND password = '$contraseña1'");


	    if(mysqli_num_rows($verificar_admin) > 0){
	    	$user = "administrador";
	    	echo "<script>exitoAdmin()</script>";
			$_SESSION["administrador"] = $user;
	    }

	    else if(mysqli_num_rows($verificar_usuario) > 0){
				$datos_usuario = "SELECT * FROM t_usuario where correo = '$correo1'";
				$mostrar = mysqli_query($conexion,$datos_usuario);
				$row = mysqli_fetch_row($mostrar);

				$_SESSION["foto"] = $row[8];
				$_SESSION["id"] = $row[0];
				$_SESSION["rut"] = $row[5];
				$_SESSION["nombres"] = $row[2];
	      $_SESSION["apellidos"] = $row[3];
				$_SESSION["edad"] = $row[4];
	      $_SESSION["enfermedad"] = $row[7];

	    	echo "<script>exito()</script>";
	    	//asignamos al usuario la variable session lo cual sería el correo
	    	$user2 = $correo1;
	    	$_SESSION["usuario2"] = $user2;
	    }
		else{
			echo "<script>noEncontrado()</script>";
		}


 ?>
