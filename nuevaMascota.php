<?php 
include("conexion.php");
$informe = $_POST['informe'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$tamano = $_POST['tamano'];

mysqli_query($conexion, "INSERT INTO mascotas VALUES (DEFAULT, '$dni', '$nombre', '$especie','$tamano')");
    
$seleccion = mysqli_insert_id($conexion);

header("Location:principal.php?informe=$informe&&dni=$dni&&id=$seleccion&&nuevo&&ingresada#registrado");


?>