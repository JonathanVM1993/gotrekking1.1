<script>
	function registroExito(){
		alert("Guia registrado con exito");
	}

	function probando(){
		alert("Verificando");
	}

	function yaRegistrado(){
		alert("El guia ya se encuentra registrado en el sistema");
	}

	function campoVacio(){
		alert("No puede dejar campos vacios");
	}

	function errorRegistro(){
		alert("No se pudo registrar el guia $nombreguia1")
	}
</script>
<?php
		include 'conexion.php';
		$nombre = $_POST['txtNombre'];
		$apellidopaterno = $_POST['txtApellidoP'];
		$apellidomaterno = $_POST['txtApellidoM'];
		$rut = $_POST['txtRut'];
		$telefono = $_POST['txtTelefono'];
		$correo = $_POST['txtCorreo'];
		$password = $_POST['txtPassword'];

		$insertar = "INSERT INTO t_guia_trekking(nom_guia,ap_p_guia,ap_m_guia,rut,telefono,correo,password) VALUES ('$nombre','$apellidopaterno','$apellidomaterno','$rut','$telefono','$correo','$password')";

		$verificar_guia = mysqli_query($conexion,"SELECT * FROM t_guia_trekking WHERE correo = '$correo'");

			if (mysqli_num_rows($verificar_guia) > 0) {
				echo "El usuario ya se encuentra registrado con este correo";
				echo "<script>yaRegistrado()</script>";
				exit;
			}

			$resultado = mysqli_query($conexion,$insertar);
			if (!$resultado) {
				echo 'Error al registrarse';
				echo "<script>errorRegistro()</script>";

			}
			else{
				echo "<script>registroExito()</script>";

			}
			mysqli_close($conexion);

 ?>
