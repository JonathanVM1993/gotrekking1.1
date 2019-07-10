<?php
session_start();
require('isLoginGuia.php');
include ("conexion.php");
$id_guia = $_SESSION["usuarioguia"];

echo "$id_guia";

 ?>
