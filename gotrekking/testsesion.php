<?php

require("isLoginGuia.php");
include 'conexion.php';

$correo1 = "GUIA_JV";


$datos_guia = "SELECT * FROM t_guia_trekking where user_guia ='$correo1'";
$buscar = mysqli_query($conexion, $datos_guia);
$row1 = mysqli_fetch_row($buscar);
$userguia = $row1[9];

echo "asdd";

 ?>
