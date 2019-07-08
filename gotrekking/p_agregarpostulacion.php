
<script>
function volver(){
  location.href = "usuario_postulacion.php";
}

function correcto(){
  alert("Su postulacion ha sido enviada con exito");
}

function incorrecto(){
  alert("Error al enviar la postulacion");
}

function yaEnviado(){
  alert("Usted ya ha enviado una postulacion");
}

</script>
<?php

require 'p_isLogin.php';
include 'conexion.php';


date_default_timezone_set("America/Santiago");
$todo = date("20y-m-d");
$id_usuario = $getId;

$experiencia = $_POST['txtExperiencia'];
$foto = $_FILES['img'];

$nombre_archivo = $_FILES['img']['tmp_name'];

$nom_random = rand(1, 10000);
$nom = $nom_random;
$ruta= "curriculum/".$nom.".jpg";
move_uploaded_file($foto["tmp_name"], $ruta);

$query = "INSERT INTO postulacion(fecha_postulacion,experiencia,id_usuario,curriculum) VALUES ('$todo',
  '$experiencia','$id_usuario','$ruta')";
$verificar = "SELECT * FROM postulacion WHERE id_usuario='$id_usuario'";
$ejecutar = mysqli_query($conexion, $verificar);

if (mysqli_num_rows($ejecutar) > 0) {
  echo "<script>yaEnviado()</script>";
  echo "<script>volver()</script>";
  exit;
}

$insertar = mysqli_query($conexion, $query);

if (!$insertar) {
  echo "<script>incorrecto()</script>";
  echo "<script>volver()</script>";
}
else{
  echo "<script>correcto()</script>";
  echo "<script>volver()</script>";
}


?>
