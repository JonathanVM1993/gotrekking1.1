<script>
function prueba(){
  alert("Llega");
}

function errorInserto(){
  alert("Error al ingresar datos");
}

function exito(){
  alert("Ingreso de datos a bitácora exitoso");
}

function volver(){
  location.href = "guia_escribirbitacora.php";
}
</script>

<?php
session_start();
require('isLoginGuia.php');
include "conexion.php";

$id_viaje = $_POST['id_viaje'];
$des_b = $_POST['d_bit'];

$id_guia = $getIdGuia;

date_default_timezone_set("America/Santiago");
$fecha = date("20y-m-d");


$query = "INSERT INTO bitacora_viajero(id_guia_viajero,id_guia_viaje,descripcion_viaje,fecha_ingreso) VALUES('$id_guia','$id_viaje','$des_b','$fecha')";
$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
  echo "<script>errorInserto()</script>";
  echo "<script>volver()</script>";
}
else{
  echo "<script>exito()</script>";
  echo "<script>volver()</script>";
}

mysqli_close($conexion);
?>
