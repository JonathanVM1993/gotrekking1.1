<?php


    include 'conexion.php';

    session_start();

    $estado = false;

    if (isset($_SESSION["usuario2"])) {
    	$estado = true;
    	$getCorreo = $_SESSION["usuario2"];
      $getFoto = $_SESSION["foto"];
      $getId = $_SESSION["id"];
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);

 ?>
