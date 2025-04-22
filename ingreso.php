<?php 
include("conexion.php");

$dni = $_POST['dni'];
$informe = $_POST['informe'];

$seleccion = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni='$dni'");
$ver = mysqli_fetch_assoc($seleccion);

if($dni == $ver['dni']){
        $num = $ver['dni'];
        header("Location:principal.php?dni=$num");
}
else{
    header("Location:index.php?clienteInexistente");
}

?>