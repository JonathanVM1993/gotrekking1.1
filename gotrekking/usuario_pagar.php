<?php

include "conexion.php";


$id_del_viaje = $_POST['id_viajes'];
$pagado = "Pagado";

$query = "UPDATE usuarios_viaje SET estado_pago='$pagado' WHERE n_viaje ='$id_del_viaje'";
$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
  echo "Error al hacer el pago";
}
else{
  echo "Pago realizado con exito";
  echo "<a href='index.php'>Volver a inicio</a>";
}

 ?>
