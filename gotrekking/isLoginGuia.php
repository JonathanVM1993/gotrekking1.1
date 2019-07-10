<?php
    include 'conexion.php';


    $estado = false;

    if (isset($_SESSION["usuarioguia"])) {
    	$estado = true;
    	$getUserGuia = $_SESSION["usuarioguia"];
      $getIdGuia = $_SESSION["idguia"];
      $getRutGuia = $_SESSION["rutGuia"];
      $getCorreo = $_SESSION["correo"];
      $getCantidad = $_SESSION["cantidad"];
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);


 ?>
