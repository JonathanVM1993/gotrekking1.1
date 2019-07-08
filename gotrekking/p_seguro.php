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
    	echo "Bienvenido: ".$_SESSION["administrador"];
    }
    else{
    	echo "<script>errorSession()</script>";


    }
    mysqli_close($conexion);

 ?>