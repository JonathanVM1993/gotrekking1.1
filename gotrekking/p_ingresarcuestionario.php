<?php

require("p_isLogin.php");
include "conexion.php";

$id_usuario = $getId;
$nivel_experiencia1 = $_POST['id_nivel'];
$idViaje = $_POST['id_viaje'];
$trekking_anterior1 = $_POST['realizado'];
$calzado = $_POST['calzado'];
$capa1 = $_POST['capa'];
$baston1 = $_POST['baston'];
$actividad = $_POST['actividad'];
$estatura1 = $_POST['altura'];
$peso1 = $_POST['peso'];
$enfermedad1 = $_POST['problema'];


// 11  3  1     Si        Si    Primera    Si    4    1,70   70kg     Ninguna //
// id lvl idv   ant      calzado   capa  baston act  estatura peso   Enfermedad
$query = "INSERT INTO cuestionario(usuario_cuestionario,nivel_experiencia,viaje_cuestionario,trekking_anterior
,calzado,capa,baston,act_fisica,estatura,peso,enfermedad_problema) VALUES('$id_usuario','$nivel_experiencia1',
'$idViaje','$trekking_anterior1','$calzado','$capa1','$baston1','$actividad','$estatura1','$peso1','$enfermedad1')";
$estadop = "No pagado";
$queryinscripcion = "INSERT INTO usuarios_viaje(cliente,n_viaje,estado_pago)VALUES('$id_usuario','$idViaje','$estadop')";

$verificar_usuario = "SELECT usuario_cuestionario AND viaje_cuestionario FROM cuestionario WHERE usuario_cuestionario='$id_usuario'
AND viaje_cuestionario ='$idViaje'";
$verificar = mysqli_query($conexion, $verificar_usuario);
echo "<a href='usuario_cuestionario.php'>Volver</a>";

echo "
<form action='usuario_pagar.php' method='post'>
<input type='hidden' id='id_viaje' name='id_viajes' value='$idViaje'>
<input type='submit'value='Pagar'/>
</form>
";

if (mysqli_num_rows($verificar) > 0) {
  echo "El usuario ya realizó el cuestionario";
  echo "<script>registroExito()</script>";
  exit;
}
$resultado = mysqli_query($conexion,$query);
$agregar_lista = mysqli_query($conexion, $queryinscripcion);

if (!$resultado) {
  echo "No se han podido ingresar los datos";
}
else{
  echo "Datos agregados correctamente";
}
if (!$agregar_lista) {
  echo "Usuario no se ha podido inscribir en la lista del viaje";
}





mysqli_close($conexion);
?>
