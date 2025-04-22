<?php 
include("conexion.php");
$informe = $_GET['informe'];
$id = $_GET["id"];
$dni = $_GET['dni'];

echo $informe;
echo "<br>";
echo $id;
echo $dni;



$consulta = mysqli_query($conexion, "SELECT * FROM $informe WHERE id_$informe=$id");
$listarConsulta=mysqli_fetch_assoc($consulta);

?>

<div class="tarjElim">
<h1 class="titles"><?php echo "Eliminar Estudio: ".$informe;?></h1>

<a class="boton elim" href="eliminarEstudio.php?id=<?php echo $id;?>&&informe=<?php echo $informe;?>&&dni=<?php echo $dni;?>&&ok">Eliminar</a>
<a class="boton elim" href="principal.php?informe=<?php echo $informe;?>&&dni=<?php echo $dni;?>&&nuevo">Volver</a>
</div>

<?php if(isset($_GET['ok'])){

mysqli_query($conexion, "DELETE FROM $informe WHERE id_$informe = $id" );

header("Location:principal.php?informe=$informe&&dni=$dni&&nuevo");

}
?>
