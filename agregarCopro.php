<?php 

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$informe = $_POST['informe'];
$dniUser = $_POST['dni'];
$idMascota = $_POST['idMascota'];
$id_profesional = $_POST['profesional'];
$fecha = $_POST['fecha'];
$micro = $_POST['micro'];
$macro = $_POST['macro'];


mysqli_query($conexion, "INSERT INTO coproparasitologico VALUES (DEFAULT, '$idMascota','$dniUser' ,'$id_profesional', '$macro', '$micro', '$fecha')");
        
$seleccion = mysqli_insert_id($conexion);

header("Location:principal.php?informe=$informe&&dni=$dniUser&&nuevo&&ingresadoCopro&&idCopro=$seleccion#ingresado");

?>