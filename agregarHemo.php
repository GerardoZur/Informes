<?php 

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$informe = $_POST['informe'];
$dniUser = $_POST['dni'];
$idMascota = $_POST['idMascota'];
$id_profesional = $_POST['profesional'];
$fecha = $_POST['fecha'];

$albumina = $_POST['albumina'];
$parasitos_resultado = $_POST['parasitos_resultado'];
$parasitos_descripcion = $_POST['parasitos_descripcion'];
$parasitos_resultado_buffy = $_POST['parasitos_resultado_buffy'];
$parasitos_descripcion_buffy = $_POST['parasitos_descripcion_buffy'];
$prot_total = $_POST['prot_total'];
$prot_total = $_POST['prot_total'];
$recuento_plaquetas = $_POST['recuento_plaquetas'];
$hematocrito = $_POST['hematocrito'];

$eritrocito = $_POST['eritrocitos'];
$leucocitos = $_POST['leucocitos'];
$hemoglobina = $_POST['hemoglobina'];
$vcm = $_POST['vcm'];
$hcm = $_POST['hcm'];
$chcm = $_POST['chcm'];

$leu_inmaduros = $_POST['leu_inmaduros'];
$neutro_banda = $_POST['neutro_banda'];
$neutro_seg = $_POST['neutro_seg'];
$eosino = $_POST['eosino'];
$baso = $_POST['baso'];
$linfo = $_POST['linfo'];
$mono = $_POST['mono'];

$total = $leu_inmaduros + $neutro_banda + $neutro_seg + $eosino + $baso + $linfo + $mono;

$leuco_inmaduro = bcdiv($leu_inmaduros * 100 / $total, '1',2);
$neutrofilo_banda = bcdiv($neutro_banda * 100 / $total, '1', 2);
$neutrofilo_seg = bcdiv($neutro_seg * 100 / $total, '1', 2);
$eosinofilos = bcdiv($eosino * 100 / $total, '1', 2);
$basofilos = bcdiv($baso * 100 / $total, '1', 2);
$linfocitos = bcdiv($linfo * 100 / $total, '1', 2);
$monocitos = bcdiv($mono * 100 / $total, '1', 2);

$observaciones = $_POST['observaciones'];

mysqli_query($conexion, "INSERT INTO hemopatogenos VALUES (DEFAULT, '$idMascota','$dniUser' , '$id_profesional' ,'$fecha', 
'$albumina','$parasitos_resultado','$parasitos_descripcion', '$parasitos_resultado_buffy','$parasitos_descripcion_buffy','$prot_total','$recuento_plaquetas','$hematocrito', '$eritrocito',
'$leucocitos','$hemoglobina','$vcm','$hcm','$chcm','$leuco_inmaduro','$neutrofilo_banda','$neutrofilo_seg','$eosinofilos',
'$basofilos','$linfocitos','$monocitos','$leu_inmaduros','$neutro_banda','$neutro_seg','$eosino','$baso'
,'$linfo','$mono','$observaciones')");

$seleccion = mysqli_insert_id($conexion);

header("Location:principal.php?informe=$informe&&dni=$dniUser&&nuevo&&ingresadoHemo&&idHemo=$seleccion#ingresado");


?>