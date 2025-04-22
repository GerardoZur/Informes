<?php $n = $_GET['dni'];
    $selec = mysqli_query($conexion, "SELECT * FROM clientes WHERE dni='$n'");
    $nro = mysqli_fetch_assoc($selec); ?>
    <div class="tarjElim">
        <br>
    <p><?php echo $nro['nombre']." ".$nro['apellido'];?> <br>
    Dni:  <?php echo $nro['dni'] ;?><br> 
    Ha sido ingresado</p>
    </div>