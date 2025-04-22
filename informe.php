<?php date_default_timezone_set('America/Argentina/Cordoba');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1, maximum-scale=2,user-scalable=yes">
    <link rel="stylesheet" href="styles.css">
    <title>Informes</title>
</head>
<?php
include("conexion.php");
$informe = $_GET['informe'];
$dni = $_GET["dni"];
$cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni=$dni");
$listarCliente=mysqli_fetch_assoc($cliente); 
$idMascota = $_GET['id'];
$paciente = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$idMascota");
$listarPaciente=mysqli_fetch_assoc($paciente); 
?>
<header>
<div class="container-seccionh"> 
    <span class="vein"></span> 
    <h1 class="titulo">Cliente: <?php echo $listarCliente['nombre']." ".$listarCliente['apellido'].""?></h1>
    <span class="vein"><a href="principal.php?informe=<?php echo $informe;?>&&dni=<?php echo $dni; ?>&&nuevo" class="btn-back">Volver</a>
    </span>
</div>
    <h1 class="titulo">Paciente: <?php echo $listarPaciente['nombre'];?></h1>
    <h1 class="titulo">Informe: <?php echo $informe;?></h1>
</header>
<br>
<body>
   
<?php if($informe == "Coproparasitologico"){ ?>

    <form class="formm" action="agregarCopro.php" method="POST" name="agregarCopro">
        <input type="hidden" name="informe" value="<?php echo $informe;?>" >
        <input type="hidden" name="dni" value="<?php echo $dni;?>" >
        <input type="hidden" name="idMascota" value="<?php echo $idMascota;?>" >

        <label>PROFESIONAL</label><br>  
        <label for="German">Germán Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="German" value="20000000" checked> <br>
        <label for="Laura">Laura Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="Laura" value="21000000"> <br><br>

        
        <label for="fecha">FECHA (DD/MM/AAAA)</label><br>
        <input class="i-nuevo" autocomplete="off" type="text" name ="fecha" required ><br><br>
        <h1 class="subtitle" for="micro">Exámen Microscópico</h1><br>
        <textarea class="i-nuevo" autocomplete="off" cols='40%' name="micro" required></textarea><br><br>
        <h1 class="subtitle" for="macro">Exámen Macroscópico</h1><br>
        <textarea class="i-nuevo" autocomplete="off" cols="40%" name="macro" required></textarea><br><br>
        <input class="i-nuevo" type="submit" value="Enviar Informe">

    </form>

<?php } ?> 

<?php if($informe == "Rutina"){ ?>
    <form class="formm" action="agregarRutina.php" method="POST" name="agregarRutina">
        <input type="hidden" name="informe" value="<?php echo $informe;?>" >
        <input type="hidden" name="dni" value="<?php echo $dni;?>" >
        <input type="hidden" name="idMascota" value="<?php echo $idMascota;?>" >

        <label for="profesional">PROFESIONAL</label> <br>
        <label for="German">Germán Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="German" value="20000000" checked> <br>
        <label for="Laura">Laura Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="Laura" value="21000000"> <br><br>
        
        <span class="camposForm">
        <label for="fecha">FECHA (DD/MM/AAAA)</label>
        <input class="inputForm" autocomplete="off" type="text" name ="fecha" required></span><br><br>
        
        <span class="camposForm">
        <label for="albumina">ALBUMINA</label>
        <input class="inputForm" autocomplete="off" name="albumina" type="text" required></span><br>
        <span class="camposForm">
        <label for="creatinina">CREATININA</label>
        <input class="inputForm" autocomplete="off" name="creatinina" type="text" required></span><br>
        <span class="camposForm">
        <label for="fosfatosa">FOSFATASA ALCALINA</label>
        <input class="inputForm" autocomplete="off" name="fosfatosa" type="text" required></span><br>
        <span class="camposForm">
        <label for="fosforo">FÓSFORO</label>
        <input class="inputForm" autocomplete="off" name="fosforo" type="text" required></span><br>
        <span class="camposForm">
        <label for="gpt">G.P.T</label>
        <input class="inputForm" autocomplete="off" name="gpt" type="text" required></span><br>
        <span class="camposForm">
        <label for="proteinas">PROTEÍNAS TOTALES</label>
        <input class="inputForm" autocomplete="off" name="proteinas" type="text" required></span><br>
        <span class="camposForm">
        <label for="plaquetas">RECUENTO DE PLAQUETAS</label>
        <input class="inputForm" autocomplete="off" name="plaquetas" type="text" required></span><br>
        <span class="camposForm">
        <label for="urea">UREA</label>
        <input class="inputForm" autocomplete="off" name="urea" type="text" required></span><br>
        
        <h1 class="titulo">Hemograma</h1><br>
        <span class="camposForm">
        <label for="hematocrito">HEMATOCRITO</label>
        <input class="inputForm" autocomplete="off" name="hematocrito" type="text" required></span><br>
        <span class="camposForm">
        <label for="eritrocitos">ERITROCITOS/Glóbulos Rojos</label>
        <input class="inputForm" autocomplete="off" name="eritrocitos" type="text" required></span><br>
        <span class="camposForm">
        <label for="leucocitos">LEUCOCITOS/Glóbulos Blancos</label>
        <input class="inputForm" autocomplete="off" name="leucocitos" type="text" required></span><br>
        <span class="camposForm">
        <label for="hemoglobina">HEMOGLOBINA</label>
        <input class="inputForm" autocomplete="off" name="hemoglobina" type="text" required></span><br>
        
        <h1 class="titulo">Indices Hematimétricos</h1><br>

        <span class="camposForm">
        <label for="vcm">V.C.M</label>
        <input class="inputForm" autocomplete="off" name="vcm" type="text" required></span><br>
        <span class="camposForm">
        <label for="hcm">H.C.M</label>
        <input class="inputForm" autocomplete="off" name="hcm" type="text" required></span><br>
        <span class="camposForm">
        <label for="chcm">C.H.C.M</label>
        <input class="inputForm" autocomplete="off" name="chcm" type="text" required></span><br>
        
        
        <h1 class="titulo" >Fórmula Absoluta</h1><br>
        
        <span class="camposForm">
        <label for="leucoinmaduro-abs">LEUCOCITOS INMADUROS</label>
        <input class="inputForm" autocomplete="off" name="leucoinmaduro-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="neutrobanda-abs">NEUTRÓFILOS EN BANDA</label>
        <input class="inputForm" autocomplete="off" name="neutrobanda-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="neutroseg-abs">NEUTRÓFILOS SEGMENTADOS</label>
        <input class="inputForm" autocomplete="off" name="neutroseg-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="eosinofilos-abs">EOSINÓFILOS</label>
        <input class="inputForm" autocomplete="off" name="eosinofilos-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="basofilos-abs">BASÓFILOS</label>
        <input class="inputForm" autocomplete="off" name="basofilos-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="linfocitos-abs">LINFOCITOS</label>
        <input class="inputForm" autocomplete="off" name="linfocitos-abs" type="text" required></span><br>
        <span class="camposForm">
        <label for="monocitos-abs">MONOCITOS</label>
        <input class="inputForm" autocomplete="off" name="monocitos-abs" type="text" required></span><br>
        
        <h1 class="titulo">OBSERVACIONES</h1><br>
        
        <textarea class="i-nuevo" name="observaciones" id="observaciones" rows="5" cols="30" required>OBSERVACIONES</textarea><br><br>

        <input class="campoInput"type="submit" value="Generar - Perfil Rutina">

    </form>

<?php } ?>

<?php if($informe == "Orina"){ ?>
    <form class="formm" action="agregarOrina.php" method="POST" name="agregarOrina">
        <input type="hidden" name="informe" value="<?php echo $informe;?>" >
        <input type="hidden" name="dni" value="<?php echo $dni;?>" >
        <input type="hidden" name="idMascota" value="<?php echo $idMascota;?>" >

        <label for="profesional">PROFESIONAL</label> <br>
        <label for="German">Germán Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="German" value="20000000" checked> <br>
        <label for="Laura">Laura Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="Laura" value="21000000"> <br><br>

        <span class="camposForm">
        <label for="fecha">FECHA (DD/MM/AAAA)</label>
        <input class="inputForm" autocomplete="off" type="text" name ="fecha" required></span><br><br>

        <h1 class="subtitle">Orina Completa</h1><br>

        <span class="camposForm">
        <label for="aspecto">ASPECTO</label>
        <input class="inputForm" autocomplete="off" name="aspecto" type="text" required></span><br>
        <span class="camposForm">
        <label for="color">COLOR</label>
        <input class="inputForm" autocomplete="off" name="color" type="text" required></span><br>
        <span class="camposForm">
        <label for="ph">pH URINARIO</label>
        <input class="inputForm" autocomplete="off" name="ph" type="text" required></span><br>
        <span class="camposForm">
        <label for="densidad">DENSIDAD</label>
        <input class="inputForm" autocomplete="off" name="densidad" type="text" required></span><br>
        <span class="camposForm">
        <label for="proteinas">PROTEÍNAS</label>
        <input class="inputForm" autocomplete="off" name="proteinas" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="glucosa">GLUCOSA</label>
        <input class="inputForm" autocomplete="off" name="glucosa" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="cetona">CETONA</label>
        <input class="inputForm" autocomplete="off" name="cetona" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="bilirrubina">BILIRRUBINA</label>
        <input class="inputForm" autocomplete="off" name="bilirrubina" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="hemoglobina">HEMOGLOBINA</label>
        <input class="inputForm" autocomplete="off" name="hemoglobina" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="urobilinogeno">UROBILINÓGENO</label>
        <input class="inputForm" autocomplete="off" name="urobilinogeno" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="nitritos">NITRITOS</label>
        <input class="inputForm" autocomplete="off" name="nitritos" type="text" value="No contiene" required></span><br>
        <span class="camposForm">
        <label for="renales">CÉLULAS RENALES</label>
        <input class="inputForm" autocomplete="off" name="renales" type="text" required></span><br>
        <span class="camposForm">
        <label for="transicion">CÉLULAS DE TRANSICIÓN</label>
        <input class="inputForm" autocomplete="off" name="transicion" type="text" required></span><br>
        <span class="camposForm">
        <label for="epiteliales">CÉLULAS EPITELIALES</label>
        <input class="inputForm" autocomplete="off" name="epiteliales" type="text" required></span><br>
        <span class="camposForm">
        <label for="leucocitos">LEUCOCITOS</label>
        <input class="inputForm" autocomplete="off" name="leucocitos" type="text" required></span><br>
        <span class="camposForm">
        <label for="piocitos">PIOCITOS</label>
        <input class="inputForm" autocomplete="off" name="piocitos" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="hematies">HEMATÍES</label>
        <input class="inputForm" autocomplete="off" name="hematies" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="uratos">URATOS AMORFOS</label>
        <input class="inputForm" autocomplete="off" name="uratos" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="fosfatos">FOSFATOS AMORFOS</label>
        <input class="inputForm" autocomplete="off" name="fosfatos" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="cristales_oxalato">CRISTALES DE OXALATO DE CALCIO</label>
        <input class="inputForm" autocomplete="off" name="cristales_oxalato" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="cristales_acido">CRISTALES DE ÁCIDO ÚRICO</label>
        <input class="inputForm" autocomplete="off" name="cristales_acido" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="cristales_fosfatos">CRISTALES DE FOSFATOS TRIPLES</label>
        <input class="inputForm" autocomplete="off" name="cristales_fosfatos" type="text" value="No se observa" required></span><br>
        <span class="camposForm">
        <label for="cristales_otros">OTROS CRISTALES</label>
        <input class="inputForm" autocomplete="off" name="cristales_otros" type="text" value="No se observa" required></span><br>
        
        <h1 class="subtitle">Relacion Proteinas Urinarias/Creatinina Urinaria</h1><br>
        
        <span class="camposForm">
        <label for="proteinas_totales">PROTEÍNAS TOTALES URINARIAS</label>
        <input class="inputForm" autocomplete="off" name="proteinas_totales" type="text" required></span><br>
        <span class="camposForm">
        <label for="creatininuria">CREATININURIA</label>
        <input class="inputForm" autocomplete="off" name="creatininuria" type="text" required></span><br>
        <span class="camposForm">
        <label for="prot_creat">RELACIÓN PROTEÍNA/CREATININA</label>
        <input class="inputForm" autocomplete="off" name="prot_creat" type="text" required></span><br><br>
        <input class="campoInput" type="submit" value ="Generar Informe - Orina">

    </form>

<?php } ?>

<?php if($informe == "Hemopatogenos"){ ?>
    <form class="formm" action="agregarHemo.php" method="POST" name="agregarCopro">
        <input type="hidden" name="informe" value="<?php echo $informe;?>" >
        <input type="hidden" name="dni" value="<?php echo $dni;?>" >
        <input type="hidden" name="idMascota" value="<?php echo $idMascota;?>" >

        <label for="profesional">PROFESIONAL</label> <br>
        <label for="German">Germán Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="German" value="20000000" checked> <br>
        <label for="Laura">Laura Zurbriggen</label>
        <input class="radio" type="radio" name="profesional" id="Laura" value="21000000"> <br><br>
        <span class="camposForm width60">
        <label for="fecha">FECHA (DD/MM/AAAA)</label>
        <input class="inputForm" autocomplete="off" type="text" name ="fecha" required></span><br><br>


        <h1 class="subtitle">Parásitos Sanguineos</h1> <br>
        <span class="camposForm">
        <label for="parasitos_resultado">RESULTADO</label>
        <input class="inputForm" autocomplete="off" name="parasitos_resultado" type="text" required></span><br>
        <span class="camposForm">
        <label for="parasitos_descripcion">NOTA</label>
        <input class="inputForm" autocomplete="off" name="parasitos_descripcion" type="text" required></span><br><br>

        <h1 class="subtitle">Parásitos Buffy</h1> <br>

        <span class="camposForm">
        <label for="parasitos_resultado_buffy">RESULTADO</label>
        <input class="inputForm" autocomplete="off" name="parasitos_resultado_buffy" type="text" required></span><br>
        <span class="camposForm">
        <label for="parasitos_descripcion_buffy">NOTA</label>
        <input class="inputForm" autocomplete="off" name="parasitos_descripcion_buffy" type="text" required></span><br><br>
        <span class="camposForm">
        <label for="albumina">ALBUMINA</label>
        <input class="inputForm" autocomplete="off" name="albumina" type="text" required></span><br>
        <span class="camposForm">
        <label for="prot_total">PROTEÍNAS TOTALES</label>
        <input class="inputForm" autocomplete="off" name="prot_total" type="text" required></span><br>
        <span class="camposForm">
        <label for="recuento_plaquetas">RECUENTO DE PLAQUETAS</label>
        <input class="inputForm" autocomplete="off" name="recuento_plaquetas" type="text" required></span><br>
        <h1 class="subtitle">Hemograma</h1><br>

        <span class="camposForm">
        <label for="hematocrito">HEMATOCRITO</label>
        <input class="inputForm" autocomplete="off" name="hematocrito" type="text" required></span><br>
        <span class="camposForm">
        <label for="eritrocitos">ERITROCITOS/Globulos Rojos</label>
        <input class="inputForm" autocomplete="off" name="eritrocitos" type="text" required></span><br>
        <span class="camposForm">
        <label for="leucocitos">LEUCOCITOS/Globulos Blancos</label>
        <input class="inputForm" autocomplete="off" name="leucocitos" type="text" required></span><br>
        <span class="camposForm">
        <label for="hemoglobina">HEMOGLOBINA</label>
        <input class="inputForm" autocomplete="off" name="hemoglobina" type="text" required></span><br>
        <h1 class="subtitle">Indices Hematimetricos</h1><br>
        <span class="camposForm">
        <label for="vcm">V.C.M</label>
        <input class="inputForm" autocomplete="off" name="vcm" type="text" required></span><br>
        <span class="camposForm">
        <label for="hcm">H.C.M</label>
        <input class="inputForm" autocomplete="off" name="hcm" type="text" required></span><br>
        <span class="camposForm">
        <label for="chcm">C.H.C.M</label>
        <input class="inputForm" autocomplete="off" name="chcm" type="text" required></span><br>
        <h1 class="subtitle">Formula Absoluta</h1><br>
        <span class="camposForm">
        <label for="leu_inmaduros">LEUCOCITOS INMADUROS</label>
        <input class="inputForm" autocomplete="off" name="leu_inmaduros" type="text" required></span><br>
        <span class="camposForm">
        <label for="neutro_banda">NEUTRÓFILOS EN BANDA</label>
        <input class="inputForm" autocomplete="off" name="neutro_banda" type="text" required></span><br>
        <span class="camposForm">
        <label for="neutro_seg">NEUTRÓFILOS SEGMENTADOS</label>
        <input class="inputForm" autocomplete="off" name="neutro_seg" type="text" required></span><br>
        <span class="camposForm">
        <label for="eosino">EOSINÓFILOS</label>
        <input class="inputForm" autocomplete="off" name="eosino" type="text" required></span><br>
        <span class="camposForm">
        <label for="baso">BASÓFILOS</label>
        <input class="inputForm" autocomplete="off" name="baso" type="text" required></span><br>
        <span class="camposForm">
        <label for="linfo">LINFOCITOS</label>
        <input class="inputForm" autocomplete="off" name="linfo" type="text" required></span><br>
        <span class="camposForm">
        <label for="mono">MONOCITOS</label>
        <input class="inputForm" autocomplete="off" name="mono" type="text" required></span><br>
        <h1 class="subtitle">OBSERVACIONES</h1><br>
        
        <textarea class="i-nuevo" name="observaciones" id="observaciones" rows="5" cols="30" required>OBSERVACIONES</textarea> <br><br>
        <input class="campoInput" type="submit" value="Enviar Hemopatógeno">
    </form>

<?php } ?>
        
</body>