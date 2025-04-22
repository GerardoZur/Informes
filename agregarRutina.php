<?php 

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$informe = $_POST['informe'];
$dniUser = $_POST['dni'];
$idMascota = $_POST['idMascota'];
$id_profesional = $_POST['profesional'];
$fecha = $_POST['fecha'];

$albumina =$_POST['albumina'];
$creatinina =$_POST['creatinina'];
$fosfatosa =$_POST['fosfatosa'];
$fosforo =$_POST['fosforo'];
$gpt =$_POST['gpt'];
$proteinas =$_POST['proteinas'];
$plaquetas =$_POST['plaquetas'];
$urea =$_POST['urea'];



$hematocrito = $_POST['hematocrito'];
$eritrocitos = $_POST['eritrocitos'];
$leucocitos = $_POST['leucocitos'];
$hemoglobina = $_POST['hemoglobina'];

$vcm = $_POST['vcm'];
$hcm = $_POST['hcm'];
$chcm = $_POST['chcm'];

$leucoinmaduro_abs = $_POST['leucoinmaduro-abs'];
$neutrobanda_abs = $_POST['neutrobanda-abs'];
$neutroseg_abs = $_POST['neutroseg-abs'];
$eosinofilos_abs = $_POST['eosinofilos-abs'];
$basofilos_abs = $_POST['basofilos-abs'];
$linfocitos_abs = $_POST['linfocitos-abs'];
$monocitos_abs = $_POST['monocitos-abs'];

$total= $leucoinmaduro_abs + $neutrobanda_abs + $neutroseg_abs + $eosinofilos_abs + $basofilos_abs + $linfocitos_abs + $monocitos_abs;


$leucoinmaduro_rel = round($leucoinmaduro_abs * 100 / $total);
$neutrobanda_rel = round($neutrobanda_abs * 100 / $total);
$neutroseg_rel = round($neutroseg_abs * 100 / $total);
$eosinofilos_rel = round($eosinofilos_abs * 100 / $total);
$basofilos_rel = round($basofilos_abs * 100 / $total);
$linfocitos_rel = round($linfocitos_abs * 100 / $total);
$monocitos_rel = round($monocitos_abs * 100 / $total);


$observaciones = $_POST['observaciones'];

mysqli_query($conexion, "INSERT INTO rutina VALUES (DEFAULT, '$idMascota','$dniUser' , '$id_profesional' ,'$fecha', '$albumina','$creatinina','$fosfatosa','$fosforo','$gpt','$proteinas','$plaquetas','$urea','$hematocrito','$eritrocitos','$leucocitos','$hemoglobina','$vcm','$hcm','$chcm','$leucoinmaduro_rel','$neutrobanda_rel','$neutroseg_rel','$eosinofilos_rel','$basofilos_rel','$linfocitos_rel','$monocitos_rel','$leucoinmaduro_abs','$neutrobanda_abs','$neutroseg_abs','$eosinofilos_abs','$basofilos_abs','$linfocitos_abs','$monocitos_abs','$observaciones')");

$seleccion = mysqli_insert_id($conexion);

header("Location:principal.php?informe=$informe&&dni=$dniUser&&nuevo&&ingresadoRutina&&idRutina=$seleccion#ingresado");
?>