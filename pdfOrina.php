<?php 

include("conexion.php");

require 'fpdf/fpdf.php';

$idOrina = $_GET['idOrina'];

$seleccion = mysqli_query($conexion, "SELECT * FROM orina WHERE id_orina='$idOrina'");
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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Análisis de Orina') , 0, 1    , 'C' );
$pdf -> Cell(190, 0, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Paciente: '.$ver_masc['nombre'].' - '.$ver_masc['especie']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Tamaño: '.$ver_masc['tamano']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Fecha: '.$ver['fecha_emision']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Propietario: '.$ver_prop['nombre'].' '.$ver_prop['apellido']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(190, 3, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(70, 8, utf8_decode('Estudio') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Resultado') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Unidad') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Valor de Referencia') , 0, 1, 'C' );
$pdf -> Cell(190, -2, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

if($ver_masc['especie'] == 'Canino'){
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 5, utf8_decode('ORINA COMPLETA') , 0, 0, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Tira refractiva, refractómetro y microscopía.') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Aspecto') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['aspecto']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Color') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['color']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- pH Urinario') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['ph']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 5 - 7') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Densidad') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['densidad']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 1015 - 1045') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Proteínas') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['proteinas']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Glucosa') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['glucosa']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cetona') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cetona']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Bilirrubina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['bilirrubina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Hemoglobina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hemoglobina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Urobilinógeno') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['urobilinogeno']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Nitritos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['nitritos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células Renales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['renales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('5 campos') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células de transición') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['transicion']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('5 campos') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células epiteliales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['epiteliales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 1 - 5') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Leucocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['leucocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 3') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Piocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['piocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Hematíes') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hematies']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 3') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Uratos amorfos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['uratos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Fosfatos amorfos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['fosfatos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales de oxalato de calcio') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_oxalato']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales de ácido úrico') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_acido']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales fosfatos triples') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_fosfatos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Otros cristales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_otros']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );


    $pdf -> SetY(270);
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por ') , 0, 1, 'L' );
    $pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
    $pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );

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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Análisis de Orina') , 0, 1    , 'C' );
$pdf -> Cell(190, 0, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Paciente: '.$ver_masc['nombre'].' - '.$ver_masc['especie']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Tamaño: '.$ver_masc['tamano']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Fecha: '.$ver['fecha_emision']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Propietario: '.$ver_prop['nombre'].' '.$ver_prop['apellido']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(190, 3, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(70, 8, utf8_decode('Estudio') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Resultado') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Unidad') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Valor de Referencia') , 0, 1, 'C' );
$pdf -> Cell(190, -2, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 5, utf8_decode('RELACIÓN PROTEÍNAS URINARIAS/CREATININA URINARIA') , 0, 0, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Inmunoturbidimétrico.') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Proteínas totales urinarias') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['proteinas_totales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Creatininuria') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['creatininuria']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Relación proteína/creatinina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['prot_creat']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> MultiCell(50, 5, utf8_decode('Normal: menor de 0.5
Dudoso: 0.5 - 1.0
Patológico: Mayor de 1.0') , 0, 'L' );



    $pdf -> SetY(270);
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por ') , 0, 1, 'L' );
    $pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
    $pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );


} else{

    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 5, utf8_decode('ORINA COMPLETA') , 0, 0, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Tira refractiva, refractómetro y microscopía.') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Aspecto') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['aspecto']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Color') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['color']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- pH Urinario') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['ph']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 5 - 7') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Densidad') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['densidad']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 1020 - 1050') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Proteínas') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['proteinas']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Glucosa') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['glucosa']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cetona') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cetona']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Bilirrubina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['bilirrubina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Hemoglobina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hemoglobina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Urobilinógeno') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['urobilinogeno']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Nitritos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['nitritos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células Renales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['renales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('5 campos') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células de transición') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['transicion']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('5 campos') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Células epiteliales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['epiteliales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 1 - 5') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Leucocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['leucocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 3') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Piocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['piocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Hematíes') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hematies']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Por campo') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 3') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Uratos amorfos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['uratos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Fosfatos amorfos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['fosfatos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales de oxalato de calcio') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_oxalato']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales de ácido úrico') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_acido']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Cristales fosfatos triples') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_fosfatos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Otros cristales') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['cristales_otros']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );


    $pdf -> SetY(270);
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por ') , 0, 1, 'L' );
    $pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
    $pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );

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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Análisis de Orina') , 0, 1    , 'C' );
$pdf -> Cell(190, 0, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Paciente: '.$ver_masc['nombre'].' - '.$ver_masc['especie']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Tamaño: '.$ver_masc['tamano']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Fecha: '.$ver['fecha_emision']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(95, 6, utf8_decode('Propietario: '.$ver_prop['nombre'].' '.$ver_prop['apellido']) , 0, 0    , 'L' );
$pdf -> Cell(95, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> Cell(190, 3, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(70, 8, utf8_decode('Estudio') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Resultado') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Unidad') , 0, 0, 'C' );
$pdf -> Cell(40, 8, utf8_decode('Valor de Referencia') , 0, 1, 'C' );
$pdf -> Cell(190, -2, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 5, utf8_decode('RELACIÓN PROTEÍNAS URINARIAS/CREATININA URINARIA') , 0, 0, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Inmunoturbidimétrico.') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Proteínas totales urinarias') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['proteinas_totales']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Creatininuria') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['creatininuria']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Relación proteína/creatinina') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['prot_creat']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> MultiCell(50, 5, utf8_decode('Normal: menor de 0.5
Dudoso: 0.5 - 1.0
Patológico: Mayor de 1.0') , 0, 'L' );



    $pdf -> SetY(270);
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por ') , 0, 1, 'L' );
    $pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
    $pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
    $pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );


}


$masc = $ver_masc['nombre'];
$prop = $ver_prop['apellido']; 
$fech = $ver['fecha_emision'];
$inf= "orina";

$pdf -> Output($fech.'-'.$inf.'-'.$masc.'-'.$prop, 'I');


?>