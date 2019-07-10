<script>
	function registroExito(){
		alert("Bienvenido usuario :");
	}

	function probando(){
		alert("Verificando");
	}

</script>

<script src="js/funciones2.js"></script>

<?php
	include 'conexion.php';

	$nombreviaje = $_POST['txtNombre'];
	$fecha_viaje = $_POST['txtFecha'];
	$guia = $_POST['id'];
	$imagen1 = $_FILES['img1'];
	$imagen2 = $_FILES['img2'];
	$imagen3 = $_FILES['img3'];
	$imagengoogle = $_FILES['img4'];
	$descripcion = $_POST['txtDescripcion'];
	$ubicacion1= $_POST['txtUbicacion'];
	$nivel1 = $_POST['id_nivel'];
	$precio1= $_POST['txtPrecio'];
	$horaviaje = $_POST['txtHora'];

	$nombreArchivo1 = $_FILES['img1']['tmp_name'];
	$nombreArchivo2 = $_FILES['img2']['tmp_name'];
	$nombreArchivo3 = $_FILES['img3']['tmp_name'];
	$nombreArchivo4 = $_FILES['img4']['tmp_name'];

	$nom_random = rand(1, 10000);
	$nom1 = rand(1, 10000);
	$nom2 = rand(1, 10000);
	$nom3 = rand(1, 10000);
	$nom4 = rand(1, 10000);

	$ruta1= "fotosviaje/".$nom1.".jpg";
	$ruta2= "fotosviaje/".$nom2.".jpg";
	$ruta3= "fotosviaje/".$nom3.".jpg";
	$ruta4= "fotosviaje/".$nom4.".jpg";

	move_uploaded_file($imagen1["tmp_name"], $ruta1);
	move_uploaded_file($imagen2["tmp_name"], $ruta2);
	move_uploaded_file($imagen3["tmp_name"], $ruta3);
	move_uploaded_file($imagengoogle["tmp_name"], $ruta4);

	$insertar = "INSERT INTO t_viaje(nombre_viaje,fecha_viaje,id_guia,imagen1,imagen2,imagen3,imagen4,descripcion_viaje,ubicacion,nivel,precio_viaje,hora_reunion)VALUES('$nombreviaje','$fecha_viaje','$guia','$ruta1','$ruta2','$ruta3','$ruta4','$descripcion','$ubicacion1','$nivel1','$precio1','$horaviaje')";

	$resultado = mysqli_query($conexion,$insertar);

	if (!$resultado) {
		echo "Error al agregar el viaje";
	}else{
		echo "El viaje ha sido agregado con exito";
	}

	echo "$nombreviaje";
	echo "$fecha_viaje";
	echo "$guia";
	echo "$nombreArchivo1";
	echo "$nombreArchivo2";
	echo "$nombreArchivo3";
	echo "$nombreArchivo4";
	echo "$descripcion";
	echo "$ubicacion1";

	echo "<a href='admin_agregarviaje.php'>Volver</a>";

	echo "<script>probando()</script>";




 ?>
