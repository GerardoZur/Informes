<?php 

include("conexion.php");

require 'fpdf/fpdf.php';

$idRutina = $_GET['idRutina'];

$seleccion = mysqli_query($conexion, "SELECT * FROM rutina WHERE id_rutina='$idRutina'");
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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Perfil Rutina') , 0, 1    , 'C' );
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

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- ALBUMINA') , 0, 0, 'L' );

$pdf -> Cell(40, 5, utf8_decode($ver['albumina']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 2.5 - 4') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- CREATININA') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['creatinina']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Hasta 1.6') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Cinético') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- FOSFATASA ALCALINA') , 0, 0, 'L' );

$pdf -> Cell(40, 5, utf8_decode($ver['fosfatosa']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('Ul/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Hasta 250') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- FÓSFORO') , 0, 0, 'L' );

$pdf -> Cell(40, 5, utf8_decode($ver['fosforo']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 3 - 6') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- G.P.T') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['gpt']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('Ul/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Hasta 50') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- PROTEÍNAS TOTALES') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['proteinas']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 5.7 - 7.5') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- RECUENTO DE PLAQUETAS') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['plaquetas']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 160000 - 500000') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Cont. Hematol. / Frotis') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- UREA') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['urea']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 15 - 45') , 0, 1, 'C' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
$pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );



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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Perfil Rutina') , 0, 1    , 'C' );
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

$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(70, 6, utf8_decode('HEMOGRAMA CANINO') , 0, 1, 'L' );
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(80, 4, utf8_decode('Método: Cont. Hematol. / Frotis') , 0, 1, 'L' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );


$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- HEMATOCRITO') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['hematocrito']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 35 - 55') , 0, 1, 'C' );


$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- ERITROCITOS/GLÓBULOS ROJOS') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['eritrocitos']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 5.000.000 - 8.000.000') , 0, 1, 'C' );


$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- LEUCOCITOS/GLÓBULOS BLANCOS') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['leucocitos']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 5000 - 15000') , 0, 1, 'C' );


$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- HEMOGLOBINA') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['hemoglobina']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 12 - 18') , 0, 1, 'C' );

$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(70, 6, utf8_decode('ÍNDICES HEMATIMÉTRICOS') , 0, 1, 'L' );
$pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- V.C.M') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['vcm']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('fL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 64 - 75') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- H.C.M') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['hcm']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 17 - 23') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- C.H.C.M') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['chcm']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 32 - 36') , 0, 1, 'C' );

$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(70, 6, utf8_decode('FÓRMULA RELATIVA') , 0, 1, 'L' );
$pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Leucocitos inmaduros') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['leucoinmaduro-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Neutrófilos en banda') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['neutrobanda-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Neutrófilos Segmentados') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['neutroseg-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 60 - 77') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Eosinófilos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['eosinofilos-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 2 - 7') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Basófilos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['basofilos-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Linfocitos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['linfocitos-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 12 - 30') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Monocitos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['monocitos-rel']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 3 - 10') , 0, 1, 'C' );

$pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(70, 6, utf8_decode('FÓRMULA ABSOLUTA') , 0, 1, 'L' );
$pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Leucocitos inmaduros') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['leucoinmaduro-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Neutrófilos en banda') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['neutrobanda-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Neutrófilos Segmentados') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['neutroseg-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 3000 - 11000') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Eosinófilos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['eosinofilos-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 100 - 1000') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Basófilos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['basofilos-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 0 - 100') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Linfocitos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['linfocitos-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Rango 1000 - 5000') , 0, 1, 'C' );

$pdf -> SetFont('Arial', 'B', 9);
$pdf -> Cell(70, 5, utf8_decode('- Monocitos') , 0, 0, 'L' );
$pdf -> Cell(40, 5, utf8_decode($ver['monocitos-abs']) , 0, 0, 'C' );
$pdf -> SetFont('Arial', '', 9);
$pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
$pdf -> Cell(40, 5, utf8_decode('Hasta 1200') , 0, 1, 'C' );




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
$pdf -> Cell(60, 7, utf8_decode('Congreso 5325, Córdoba ') , 0, 1    , 'L' );
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Lunes a Sábados 9:00hs a 20:00hs') , 0, 1    , 'L' );
$pdf -> Cell(130, 7, utf8_decode('') , 0, 0    , 'C' );
$pdf -> Cell(60, 7, utf8_decode('Whatsapp: +54 9 351506-6476') , 0, 1    , 'L' );


$pdf -> Cell(190, 5, utf8_decode('________________________________________________________________________________________________________________________') , 0, 1    , 'C' );
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Perfil Rutina') , 0, 1    , 'C' );
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

$pdf -> SetFont('Arial', 'B', 12);
$pdf -> Cell(190, 6, utf8_decode('OBSERVACIONES') , 0, 1, 'C' );
$pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );

$pdf -> SetFont('Arial', '', 10);

$pdf -> MultiCell(190, 10, utf8_decode($ver['observaciones']), 0, 'L' );

$pdf -> SetY(270);
$pdf -> SetFont('Arial', 'B', 10);
$pdf -> Cell(60, 0, utf8_decode('Firmado electrónicamente por ') , 0, 1, 'L' );
$pdf->Image($ver_prof['firma'], 70, 245, 0, 30);
$pdf -> SetFont('Arial', '', 8);
$pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 1, 'C' );
$pdf -> Cell(190, 3, utf8_decode('M.P: '.$ver_prof['matricula']) , 0, 0, 'C' );
$pdf -> Cell(190, 3, utf8_decode($ver_prof['nombre']) , 0, 0, 'C' );



} else{
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- ALBUMINA') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['albumina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 2.3 - 3.4') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- CREATININA') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['creatinina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Hasta 1.6') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Cinético') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- FOSFATASA ALCALINA') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['fosfatosa']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Ul/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Hasta 90') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- FÓSFORO') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['fosforo']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 2.4 - 8.2') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- G.P.T') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['gpt']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('Ul/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Desde 17 a 78') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- PROTEÍNAS TOTALES') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['proteinas']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 5.7 - 8') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Espectrofotométrico') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- RECUENTO DE PLAQUETAS') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['plaquetas']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 175000 - 500000') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Cont. Hematol. / Frotis') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- UREA') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['urea']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mg/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 30 - 60') , 0, 1, 'C' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Enzimático') , 0, 1, 'L' );
    $pdf -> Cell(190, 6, utf8_decode('') , 0, 1    , 'C' );
    
    
    
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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Perfil Rutina') , 0, 1    , 'C' );
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
    
    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(70, 6, utf8_decode('HEMOGRAMA CANINO') , 0, 1, 'L' );
    $pdf -> SetFont('Arial', '', 8);
    $pdf -> Cell(80, 4, utf8_decode('Método: Cont. Hematol. / Frotis') , 0, 1, 'L' );
    $pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
    
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- HEMATOCRITO') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hematocrito']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 27 - 50') , 0, 1, 'C' );
    
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- ERITROCITOS/GLÓBULOS ROJOS') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['eritrocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 5.000.000 - 10.000.000') , 0, 1, 'C' );
    
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- LEUCOCITOS/GLÓBULOS BLANCOS') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['leucocitos']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 5000 - 15000') , 0, 1, 'C' );
    
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- HEMOGLOBINA') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hemoglobina']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 9 - 15') , 0, 1, 'C' );
    
    $pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 6, utf8_decode('ÍNDICES HEMATIMÉTRICOS') , 0, 1, 'L' );
    $pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- V.C.M') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['vcm']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('fL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 40 - 55') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- H.C.M') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['hcm']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 13 - 17') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- C.H.C.M') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['chcm']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('g/dL') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 30 - 36') , 0, 1, 'C' );
    
    $pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 6, utf8_decode('FÓRMULA RELATIVA') , 0, 1, 'L' );
    $pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Leucocitos inmaduros') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['leucoinmaduro-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Neutrófilos en banda') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['neutrobanda-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('0 - 3') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Neutrófilos Segmentados') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['neutroseg-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('60 - 77') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Eosinófilos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['eosinofilos-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 2 - 7') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Basófilos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['basofilos-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 1') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Linfocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['linfocitos-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 15 - 35') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Monocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['monocitos-rel']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('%') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 2 - 5') , 0, 1, 'C' );
    
    $pdf -> Cell(190, 4, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(70, 6, utf8_decode('FÓRMULA ABSOLUTA') , 0, 1, 'L' );
    $pdf -> Cell(190, 1, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Leucocitos inmaduros') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['leucoinmaduro-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Neutrófilos en banda') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['neutrobanda-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 0 - 300') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Neutrófilos Segmentados') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['neutroseg-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 2500 - 12000') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Eosinófilos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['eosinofilos-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 100 - 1000') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Basófilos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['basofilos-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Menos de 100') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Linfocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['linfocitos-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Rango 1500 - 7000') , 0, 1, 'C' );
    
    $pdf -> SetFont('Arial', 'B', 9);
    $pdf -> Cell(70, 5, utf8_decode('- Monocitos') , 0, 0, 'L' );
    $pdf -> Cell(40, 5, utf8_decode($ver['monocitos-abs']) , 0, 0, 'C' );
    $pdf -> SetFont('Arial', '', 9);
    $pdf -> Cell(40, 5, utf8_decode('mm3') , 0, 0, 'C' );
    $pdf -> Cell(40, 5, utf8_decode('Menos de 1000') , 0, 1, 'C' );
    
    
    
    
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
$pdf -> Cell(190, 6, utf8_decode('Informe Laboratorio : Perfil Rutina') , 0, 1    , 'C' );
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
    $pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', 'B', 12);
    $pdf -> Cell(190, 6, utf8_decode('OBSERVACIONES') , 0, 1, 'C' );
    $pdf -> Cell(190, 2, utf8_decode('') , 0, 1    , 'C' );
    
    $pdf -> SetFont('Arial', '', 10);
    
    $pdf -> MultiCell(190, 10, utf8_decode($ver['observaciones']), 0, 'L' );
    
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
$inf= "rutina";

$pdf -> Output($fech.'-'.$inf.'-'.$masc.'-'.$prop, 'I');

?>