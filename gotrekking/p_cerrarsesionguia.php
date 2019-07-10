<script>
	function irInicio(){
		window.location = "index.php";

		function noSesion(){
			alert("No se encuentra ninguna sesion iniciada");
		}

		function cerrarSesion(){
			alert("Sesion cerrada correctamente adiós guía");
		}
	}
</script>

<?php    
    include 'conexion.php';

	session_start();

	if (!isset($_SESSION["usuarioguia"])) {
			echo "<script>noSesion()</script>";
			echo "<script>irInicio()</script>";
	}
	else{
			echo "<script>cerrarSesion()</script>";
			session_destroy();
			echo "<script>irInicio()</script>";
	}
	echo "Adios: ".$_SESSION["administrador"];
	mysqli_close($conexion);

 ?>
