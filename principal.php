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
$dni = $_GET["dni"];
$cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni=$dni");
$listarCliente=mysqli_fetch_assoc($cliente); 
?>
<header>
<div class="container-seccionh"> 
    <span class="vein"></span>
    <h1 class="titulo">Cliente: <?php echo $listarCliente['nombre']." ".$listarCliente['apellido'].""?></h1>
    <span class="vein"><a href="index.php" class="btn-back">Volver</a></span> 
</div>
<br>
<a class="btn-nuevaM" href="principal.php?dni=<?php echo $listarCliente['dni']?>&&historial">Historial de Informes</a>
<br>
<div class="container-seccion">
        <div class="botonera">
            <a href="principal.php?informe=Coproparasitologico&&dni=<?php echo $dni; ?>&&nuevo" class="btn-informe">COPROPARASITOLÓGICO</a>
            <a href="principal.php?informe=Hemopatogenos&&dni=<?php echo $dni; ?>&&nuevo" class="btn-informe">PERFIL HEMOPATÓGENOS</a>
            <a href="principal.php?informe=Orina&&dni=<?php echo $dni; ?>&&nuevo" class="btn-informe">ANÁLISIS DE ORINA</a>
            <a href="principal.php?informe=Rutina&&dni=<?php echo $dni; ?>&&nuevo" class="btn-informe">ANÁLISIS DE RUTINA</a>
        </div> 
    </div>
</header>
<body>
    <?php
if(isset($_GET['historial'])){
    include("verInformes.php"); 
    }

        if(isset($_GET['nuevo'])){ 
            $informe =$_GET['informe'];
            ?>
        <div class="elegirCont">
        <h1 class="subtitle">Elegir Mascota : Informe <?php echo $informe ;?></h1>

        <?php 
        
        $mascotaRegistro = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_cliente=$dni");
        $row_cntM = mysqli_num_rows($mascotaRegistro);
        
        if($row_cntM == 0){
            echo "<p class=campoInput>Para cargar el informe hay que agregar una mascota</p>";
        }
        else{

        ?>
        <table class="tableMasc">
        

           <?php            

           while($listarMascota=mysqli_fetch_assoc($mascotaRegistro)){
        ?>
        
        <tr class="campos">
        <td class="masc n"> &#8226; <?php echo $listarMascota['nombre'];?></td>
            <td class="masc"><?php echo $listarMascota['especie'];?></td>
            <td class="masc"><?php echo $listarMascota['tamano'];?></td>
            <td class="masc"><a class="btn-seleccion" href="informe.php?informe=<?php echo $informe;?>&&nuevo&&dni=<?php echo $dni;?>&&id=<?php echo $listarMascota['id_mascota'];?>">Seleccionar</a> </td>
            <td class="masc"><a class="btn-eliminar" href="principal.php?informe=<?php echo $informe;?>&&dni=<?php echo $dni;?>&&id=<?php echo $listarMascota['id_mascota'];?>&&nuevo&&elimMascota">Eliminar </a> </td>
            
        </tr> 
        

   <?php }?>
   </table>
   <?php } ?>
        <div class="cont0">
        <a class="btn-nuevaM" href="principal.php?informe=<?php echo $informe;?>&&nuevo&&dni=<?php echo $listarCliente['dni']?>&&mascota#nuevaMascota">Nueva Mascota</a>
        </div>
        <?php 

            if(isset($_GET['mascota'])){ ?>

        <form class="ingreso" action="nuevaMascota.php" method="POST" name="nuevaMascota" id="nuevaMascota">   
            <input type="hidden" name="dni" value="<?php echo $dni;?>">
            <input type="hidden" name="informe" value="<?php echo $informe;?>">
            <div>
            <label for="nombre">NOMBRE</label><br>
            <input autocomplete="off" class="campoInput" type="text" name="nombre" required>
            </div>
            <div class="campos">
            <label>ESPECIE</label>
            <div>
            <label for="canino">Canino</label>
            <input class="radio" type="radio" name="especie" id="canino" value="Canino" checked>
            <label for="felino">Felino</label>
            <input class="radio" type="radio" name="especie" id="felino" value="Felino" >
            </div>
            </div>
                    
            <div class="campos">
            <label>TAMAÑO</label>   
            <div> 
            <label for="pequeno">Pequeño</label>
            <input class="radio" type="radio" name="tamano" id="pequeno" value="Pequeño" checked>
            <label for="mediano">Mediano</label>
            <input class="radio" type="radio" name="tamano" id="mediano" value="Mediano" >
            <label for="grande">Grande</label>
            <input class="radio" type="radio" name="tamano" id="grande" value="Grande">
            </div>
            </div>
            <input class="campoInput" type="submit" value="Ingresar Mascota">
        </form> <?php } ?>
         
       <?php
        if(isset($_GET['ingresadoCopro'])){ 
            $idCopro = $_GET['idCopro']; 
            ?>
        <div class="nuevoCliente trein" id="ingresado">
        <p>Informe Copro : ID <?php echo $idCopro;?> fue ingresado correctamente. </p><br>
            <a class="btn-seleccion" href="pdfCopro.php?idCopro=<?php echo $idCopro;?>" target="_blank">Ver PDF - Informe Copro</a>
        </div>

 <?php } 
 if(isset($_GET['ingresadoRutina'])){ 
    $idRutina = $_GET['idRutina'];
    ?>
<div class="nuevoCliente trein" id="ingresado">
<p>Informe de Rutina : ID <?php echo $idRutina;?> fue ingresado correctamente. </p><br>
    <a class="btn-seleccion" href="pdfRutina.php?idRutina=<?php echo $idRutina;?>" target="_blank" >Ver PDF - Informe Rutina</a>
</div>

<?php }
if(isset($_GET['ingresadoHemo'])){ 
    $idHemo = $_GET['idHemo'];
    ?>
<div class="nuevoCliente trein" id="ingresado">
    <p>Informe Hemopatógenos : ID <?php echo $idHemo;?> fue ingresado correctamente. </p><br>
    <a class="btn-seleccion" href="pdfHemo.php?idHemo=<?php echo $idHemo;?>" target="_blank">Ver PDF - Informe Hemopatógenos</a>
</div>

<?php }
if(isset($_GET['ingresadoOrina'])){ 
    $idOrina = $_GET['idOrina'];
    ?>
<div class="nuevoCliente trein" id="ingresado">
<p>Informe Orina : ID <?php echo $idOrina;?> fue ingresado correctamente. </p><br>
    <a target="_blank"class="btn-seleccion" href="pdfOrina.php?idOrina=<?php echo $idOrina;?>" target="_blank">Ver PDF - Informe Orina</a>
</div>

<?php } 


if(isset($_GET['elimMascota'])){ 
    $informe = $_GET['informe'];
    $dni = $_GET['dni'];
    $id = $_GET["id"];

    $consulta = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id");
    $listarConsulta=mysqli_fetch_assoc($consulta);
    ?>
    <div class="eliminarC">
<h1 class="titleElim"><?php echo "Eliminar paciente: "?> <br><br> <?php echo $listarConsulta['nombre'];?></h1>
<h1 class="titleElim"> Todos los informes asociados se eliminarán </h1>

<a class="btn-eliminar btn-form" href="eliminarMascota.php?informe=<?php echo $informe;?>&&dni=<?php echo $dni;?>&&id=<?php echo $id;?>">Eliminar</a>
<a class="btn-volver btn-form" href="principal.php?informe=<?php echo $informe;?>&&dni=<?php echo $dni;?>&&nuevo">Volver</a>
</div>
   <?php }

    if(isset($_GET['ingresada'])){ 
        
        $n = $_GET['dni'];
        $i = $_GET['id'];
        $id = $_GET['id'];
    $selec = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota='$id'");
    $nro = mysqli_fetch_assoc($selec); ?>
    <div class="tarjElim">
    <p id="registrado">Se hizo registro de <?php echo $nro['nombre']; ?></p>
    </div>

     <?php   }



}?>
        
</body>