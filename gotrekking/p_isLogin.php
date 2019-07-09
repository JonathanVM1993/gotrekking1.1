<?php


    include 'conexion.php';

    session_start();

    $estado = false;

    if (isset($_SESSION["usuario2"])) {
    	$estado = true;
    	$getCorreo = $_SESSION["usuario2"];
      $getFoto = $_SESSION["foto"];
      $getId = $_SESSION["id"];
      $getRut = $_SESSION["rut"];
      $getNombres = $_SESSION["nombres"];
      $getApellidos = $_SESSION["apellidos"];
      $getEdad = $_SESSION["edad"];
      $getEnfermedad = $_SESSION["enfermedad"];
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);

 ?>
