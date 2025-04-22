<?php 
include("conexion.php");
$informe = $_GET['informe'];
$dni = $_GET['dni'];
$id = $_GET["id"];

$consulta = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id");
$listarConsulta=mysqli_fetch_assoc($consulta);


mysqli_query($conexion, "DELETE FROM coproparasitologico WHERE id_mascota = $id" );
mysqli_query($conexion, "DELETE FROM hemopatogenos WHERE id_mascota = $id" );
mysqli_query($conexion, "DELETE FROM orina WHERE id_mascota = $id" );
mysqli_query($conexion, "DELETE FROM rutina WHERE id_mascota = $id" );

mysqli_query($conexion, "DELETE FROM mascotas WHERE id_mascota = $id" );
header("Location:principal.php?informe=$informe&&dni=$dni&&id=$id&&nuevo&&ok");
 