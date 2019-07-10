<?php
    include 'conexion.php';
    session_start();
    $estado = false;
    if (isset($_SESSION["administrador"])) {
    	$estado1 = true;
    	$getSesion = $_SESSION["usuario2"];
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);

 ?>
