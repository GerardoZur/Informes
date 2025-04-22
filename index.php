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
?>
<header class="head">
    <h1>Informes de Laboratorio</h1>
</header>
<body>

    <div class="cont1">
    <form class="ingreso" action="ingreso.php" method="POST" name="ingresar" id="ingresar">
            <label class="textCen" for="dni">INGRESAR DNI</label>
            <input type="hidden" name="informe" value="<?php echo $informe;?>"  >
            <input class="campoInput" autocomplete="off" type="number" name="dni" required>
            <input class="campoInput" type="submit" value="Verificar">
            <?php 
            if(isset($_GET['clienteInexistente'])){?>
            <p>Cliente Inexistente</p>

          <?php  }
            ?>
    </form>
    </div>
    <div class="cont0">
        <a href="index.php?nuevoCliente#nuevoCliente" class="btn-nuevoC">Nuevo Cliente</a>
        <a href="index.php?registro" class="btn-nuevoC">Registro de clientes</a>
    </div> 

    <?php
    if(isset($_GET['nuevoCliente'])){ ?>
    <form class="nuevoCliente" action="nuevoCliente.php" method="POST" name="nuevoCliente" id="nuevoCliente">
            <input type="hidden" name="informe" value="<?php echo $informe; ?>">
            <label class="textCen" for="dni">DNI cliente</label>
            <input class="i-nuevo" autocomplete="off" type="text" name="dni"  pattern="{9}" required>
            <label class="textCen" for="nombre">Nombre</label>
            <input class="i-nuevo" autocomplete="off" type="text" name="nombre" required>
            <label class="textCen" for="apellido">Apellido</label>
            <input class="i-nuevo" autocomplete="off" type="text" name="apellido" required>
            <input class="campoInput" type="submit" value="Nuevo Cliente">
           <?php if(isset($_GET['clienteExistente'])){?>
                <p>El DNI ingresado coincide con uno existente</p>
                <?php } ?>
        </form>
        
            

    <?php } ?>
    <?php 
    if(isset($_GET['registro'])){
    include("registroClientes.php");
    }

 
        
   if(isset($_GET['clienteIngresado'])){ 
    include("clienteIngresado.php");}

     if(isset($_GET['eliminar'])){ 

        include("eliminarCliente.php");
       
     } 

    if(isset($_GET['ok'])){
        include("clienteEliminado.php");
         
    } ?>


</body>