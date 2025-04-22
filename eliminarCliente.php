<?php 
include("conexion.php");

$dni = $_GET["dni"];
$consulta = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni=$dni");
$listarConsulta=mysqli_fetch_assoc($consulta);
?>

<div class="eliminarC">
        <h1 class="titleElim"><?php echo "Eliminar cliente "?> <br> <?php echo "Nombre: ".$listarConsulta['nombre'].""?> <br> <?php echo  "DNI:  ".$listarConsulta['dni'].""?></h1>
        <h2 class="titleElim">Todas las mascotas e informes relacionados también se eliminarán.</h2>
        
        <a class="btn-eliminar btn-form" href="index.php?ok&&dni=<?php echo $dni;?>">Eliminar</a>
        <a class="btn-volver btn-form" href="index.php?registro">Volver</a>
</div>
