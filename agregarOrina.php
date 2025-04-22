<?php 

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$informe = $_POST['informe'];
$dniUser = $_POST['dni'];
$idMascota = $_POST['idMascota'];
$id_profesional = $_POST['profesional'];
$fecha = $_POST['fecha'];

$aspecto = $_POST['aspecto'];
$color = $_POST['color'];
$ph = $_POST['ph'];
$densidad = $_POST['densidad'];
$proteinas = $_POST['proteinas'];
$glucosa = $_POST['glucosa'];
$cetona = $_POST['cetona'];
$bilirrubina = $_POST['bilirrubina'];
$hemoglobina = $_POST['hemoglobina'];
$urobilinogeno = $_POST['urobilinogeno'];
$nitritos = $_POST['nitritos'];
$renales = $_POST['renales'];
$transicion = $_POST['transicion'];
$epiteliales = $_POST['epiteliales'];
$leucocitos = $_POST['leucocitos'];
$piocitos = $_POST['piocitos'];
$hematies = $_POST['hematies'];
$uratos = $_POST['uratos'];
$fosfatos = $_POST['fosfatos'];
$cristales_oxalato = $_POST['cristales_oxalato'];
$cristales_acido = $_POST['cristales_acido'];
$cristales_fosfatos = $_POST['cristales_fosfatos'];
$cristales_otros = $_POST['cristales_otros'];
$proteinas_totales = $_POST['proteinas_totales'];
$creatininuria = $_POST['creatininuria'];
$prot_creat = $_POST['prot_creat'];



mysqli_query($conexion, "INSERT INTO orina VALUES (DEFAULT, '$idMascota','$dniUser' , '$id_profesional' ,'$fecha', '$aspecto','$color','$ph','$densidad','$proteinas','$glucosa','$cetona','$bilirrubina','$hemoglobina','$urobilinogeno','$nitritos','$renales','$transicion','$epiteliales','$leucocitos','$piocitos','$hematies','$uratos','$fosfatos','$cristales_oxalato','$cristales_acido','$cristales_fosfatos','$cristales_otros','$proteinas_totales','$creatininuria','$prot_creat')");

$seleccion = mysqli_insert_id($conexion);

header("Location:principal.php?informe=$informe&&dni=$dniUser&&nuevo&&ingresadoOrina&&idOrina=$seleccion#ingresado");

?>