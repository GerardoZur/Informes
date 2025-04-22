<?php
$dni = $_GET['dni'];

        mysqli_query($conexion, "DELETE FROM coproparasitologico WHERE dni_cliente = $dni" );
        mysqli_query($conexion, "DELETE FROM hemopatogenos WHERE dni_cliente = $dni" );
        mysqli_query($conexion, "DELETE FROM orina WHERE dni_cliente = $dni" );
        mysqli_query($conexion, "DELETE FROM rutina WHERE dni_cliente = $dni" );

        mysqli_query($conexion, "DELETE FROM mascotas WHERE id_cliente = $dni" );

        mysqli_query($conexion, "DELETE FROM clientes WHERE dni = $dni" );

        echo "<br>";
        echo "<p>Cliente Eliminado</p>";
?>