<?php 
include("conexion.php");
$informe = $_POST['informe'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$select = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni='$dni'");
$ver = mysqli_fetch_assoc($select);

if($dni == $ver['dni']){
    header("Location:index.php?nuevoCliente&&clienteExistente");
}
else{
    mysqli_query($conexion, "INSERT INTO clientes VALUES ('$dni', '$nombre', '$apellido')");
    $seleccion = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni='$dni'");
    $ver = mysqli_fetch_assoc($seleccion);
    $dni = $ver['dni'];
    header("Location:index.php?clienteIngresado&&dni=$dni");
}

?>