<?php
    include("conexion.php");
    $consultaCliente = mysqli_query($conexion, "SELECT * FROM clientes ORDER BY apellido asc");?>
    <table id="tableClien" class="tableClien" cellspacing="0">
        <tr class="cabe">
            <td colspan="2">NOMBRE COMPLETO</td>
            <td>DNI</td>
            <td>INGRESO</td>
            <td><a class="btn-close" href="index.php"><img class="close" src="assets/imagenes/Close.png" alt=""></a></td>
        </tr>   
<?php
    while($listarCliente=mysqli_fetch_assoc($consultaCliente)){ 
        ?>
        <tr class="campos">
            <td><?php echo $listarCliente['apellido'];?></td>
            <td><?php echo $listarCliente['nombre'];?></td>
            <td><?php echo $listarCliente['dni'];?></td>
            <td><a class="btn-seleccion" href="principal.php?dni=<?php echo $listarCliente['dni'];?>">Ingresar</a> </td>
            <td><a class="btn-eliminar" href="index.php?eliminar&&dni=<?php echo $listarCliente['dni'];?>">Eliminar </a> </td>
        </tr>    
        <?php } ?> 
    </table> 
</div>