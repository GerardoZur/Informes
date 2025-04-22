<section class="hist">
    <div class="container-seccionh">
        <span class="diez"></span>
        <h1 class="titulo">Historial de informes</h1>
        <span class="diez">
        <a class="btn-closeH" href="principal.php?dni=<?php echo $listarCliente['dni'];?>"><img class="close" src="assets/imagenes/Close.png" alt=""></a>
        </span>
    </div>
<div class="contHistorial">
<div class="copro">
<?php 

$informeCoproRegistro = mysqli_query($conexion, "SELECT * FROM coproparasitologico WHERE dni_cliente=$dni ORDER BY fecha DESC");
$row_cnt = mysqli_num_rows($informeCoproRegistro);
 if($row_cnt == 0){ ?>
    <p class="titleCopro">Sin informes Copro</p>
     <?php }
    else{ ?>
    <p class="titleCopro">Coproparasitológico</p>
    <?php
while($listarCopro=mysqli_fetch_assoc($informeCoproRegistro)){
    $id_m = $listarCopro['id_mascota'];
    $mascotas = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id_m");
    $listarMascota= mysqli_fetch_assoc($mascotas);
?> <section class="sit">
<p class="camposH">  &#8226; <?php echo $listarCopro['fecha'];?> <?php echo $listarMascota['nombre'];?></p>
<a class="verA" href="pdfCopro.php?idCopro=<?php echo $listarCopro['id_coproparasitologico'];?>" target="_blank"><img class="verImg" src="assets/imagenes/Ver.png" alt=""> </a> 
<a class="verA" href="eliminarEstudio.php?id=<?php echo $listarCopro['id_coproparasitologico'];?>&&informe=coproparasitologico&&dni=<?php echo $dni;?>"><img class="verImg" src="assets/imagenes/Eliminar.png" alt=""></a> 
</section> 

 <?php } ?>


<?php } ?>
</div>
<div class="copro">
<?php

$informeHemoRegistro = mysqli_query($conexion, "SELECT * FROM hemopatogenos WHERE dni_cliente=$dni");
$row_cnt = mysqli_num_rows($informeHemoRegistro);
 if($row_cnt == 0){ ?>

    <p class="titleCopro">Sin informes Hemopatógenos</p> <?php }
    else{ ?>

    <p class="titleCopro">Hemopatógenos</p>
    <?php
while($listarHemo=mysqli_fetch_assoc($informeHemoRegistro)){
   $id_m = $listarHemo['id_mascota'];
    $mascotas = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id_m");
    $listarMascota= mysqli_fetch_assoc($mascotas);
?> <section class="sit">
<p class="camposH">  &#8226; <?php echo $listarHemo['fecha_emision'];?> <?php echo $listarMascota['nombre'];?></p>
<a class="verA" href="pdfHemo.php?idHemo=<?php echo $listarHemo['id_hemopatogenos'];?>" target="_blank"><img class="verImg" src="assets/imagenes/Ver.png" alt=""> </a> 
<a class="verA" href="eliminarEstudio.php?id=<?php echo $listarHemo['id_hemopatogenos'];?>&&informe=hemopatogenos&&dni=<?php echo $dni;?>"><img class="verImg" src="assets/imagenes/Eliminar.png" alt=""></a> 
</section>
<?php } ?>


<?php } ?>
</div>
<div class="copro">
<?php

$informeOrinaRegistro = mysqli_query($conexion, "SELECT * FROM orina WHERE dni_cliente=$dni");
$row_cnt = mysqli_num_rows($informeOrinaRegistro);
 if($row_cnt == 0){ ?>
    <p class="titleCopro">Sin informes Orina</p> <?php }
    else{ ?>

    <p class="titleCopro">Informes Orina</p>
    <?php
while($listarOrina=mysqli_fetch_assoc($informeOrinaRegistro)){
    $id_m = $listarOrina['id_mascota'];
    $mascotas = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id_m");
    $listarMascota= mysqli_fetch_assoc($mascotas);
?> <section class="sit">
<p class="camposH">  &#8226; <?php echo $listarOrina['fecha_emision'];?> <?php echo $listarMascota['nombre'];?></p>
<a class="verA" href="pdfOrina.php?idOrina=<?php echo $listarOrina['id_orina'];?>" target="_blank"><img class="verImg" src="assets/imagenes/Ver.png" alt=""> </a> 
<a class="verA" href="eliminarEstudio.php?id=<?php echo $listarOrina['id_orina'];?>&&informe=orina&&dni=<?php echo $dni;?>"><img class="verImg" src="assets/imagenes/Eliminar.png" alt=""></a> 
</section>

<?php } ?>


<?php } ?>
</div>
<div class="copro">
<?php

$informeRutinaRegistro = mysqli_query($conexion, "SELECT * FROM rutina WHERE dni_cliente=$dni ORDER BY fecha_emision DESC");



$row_cnt = mysqli_num_rows($informeRutinaRegistro);
 if($row_cnt == 0){ ?>
    <p class="titleCopro">Sin informes Rutina</p> <?php }
    else{ ?>

    <p class="titleCopro">Informes Rutina</p>
    <?php
while($listarRutina=mysqli_fetch_assoc($informeRutinaRegistro)){
    $id_m = $listarRutina['id_mascota'];
    $mascotas = mysqli_query($conexion, "SELECT * FROM mascotas WHERE id_mascota=$id_m");
    $listarMascota= mysqli_fetch_assoc($mascotas);
?> <section class="sit">
        <p class="camposH">  &#8226; <?php echo $listarRutina['fecha_emision'];?> <?php echo $listarMascota['nombre'];?></p>
        <a class="verA" href="pdfRutina.php?idRutina=<?php echo $listarRutina['id_rutina'];?>" target="_blank"><img class="verImg" src="assets/imagenes/Ver.png" alt=""> </a> 
        <a class="verA" href="eliminarEstudio.php?id=<?php echo $listarRutina['id_rutina'];?>&&informe=rutina&&dni=<?php echo $dni;?>"><img class="verImg" src="assets/imagenes/Eliminar.png" alt=""></a> 
    </section>
        <?php } ?>


<?php } ?>
</div>
<div>
</section>