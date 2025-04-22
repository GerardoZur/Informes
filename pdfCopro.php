<?php 

include("conexion.php");

require 'fpdf/fpdf.php';

$idCopro = $_GET['idCopro'];

$seleccion = mysqli_query($conexion, "SELECT * FROM coproparasitologico WHERE id_coproparasitologico='$idCopro'");
$ver = mysqli_fetch_assoc($seleccion);

$id_prof = $ver['id_profesional'];
$profesional = mysqli_query($conexion, "SELECT * FROM profesional WHERE dni='$id_prof'");
$ver_prof = mysqli_fetch_assoc($profesional);

$id_masc = $ver['id_mascota'];
$mascota = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota='$id_masc'");
$ver_masc = mysqli_fetch_assoc($mascota);

$id_prop = $ver['dni_cliente'];
$propietario = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni='$id_prop'");
$ver_prop = mysqli_fetch_assoc($propietario);


$pdf = new FPDF();
$pdf -> AddPage();
$pdf->Image("assets/imagenes/Logo_Vete.png", 0, 0, 0, 50);
$pdf -> SetFont('Arial', 'B', 8);
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Veterinaria El Libertador') , 0, 1    , 'L' );
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Congreso 5325, Córdoba') , 0, 1    , 'L' );
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Lunes a Sábados 9:00hs a 20:00hs') , 0, 1    , 'L' );
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Whatsapp: +54 9 351506-6476') , 0, 1    , 'L' );


$pdf -> Cell(190, 5, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Coproparasitológico Seriado') , 0, 1    , 'C' );
$pdf -> Cell(190, 0, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Paciente: '.$ver_masc['nombre'].' - '.$ver_masc['especie']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Tamaño: '.$ver_masc['tamano']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Fecha: '.$ver['fecha']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Propietario: '.$ver_prop['nombre'].' '.$ver_prop['apellido']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(190, 3, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(95, 8, utf8_decode('Estudio') , 0, 0, 'C' );
$pdf -> Cell(95, 8, utf8_decode('Resultado') , 0, 1, 'C' );
$pdf -> Cell(190, -2, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(80, 2, utf8_decode('PARASITÓLIGICO SERIADO EN MATERIA FECAL') , 0, 1, 'L' );

$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 7, utf8_decode('Método: Solución azucarada saturada de Brenbrook y sulfato de Zinc') , 0, 1, 'L' );
$pdf -> Cell(190, 8, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(100, 6, utf8_decode('- Exámen Macroscópico') , 0, 0, 'L' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> MultiCell(90, 6, utf8_decode($ver['macro']) );

$pdf -> Cell(190, 20, utf8_decode('') , 0, 1    , 'C' );


$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(100, 6, utf8_decode('- Exámen Microscópico') , 0, 0, 'L' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> MultiCell(90, 6, utf8_decode($ver['micro']) );

$pdf -> SetY(270);
$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por: ') , 0, 1, 'L' );
$pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
$pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
$pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );

$masc = $ver_masc['nombre'];
$prop = $ver_prop['apellido']; 
$fech = $ver['fecha'];
$inf= "copro";

$pdf -> Output($fech.'-'.$inf.'-'.$masc.'-'.$prop, 'I');

?>