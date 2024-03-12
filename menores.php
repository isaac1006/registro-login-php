<?php
include('iniciarSesion.php');
 $a=conexion();
 var_dump($a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido joven deportista</h1>
<h1>Hola : <?php echo $_GET["nombre"] . ' ' . $_GET["apellido"]; ?>!</h1>
    <p><strong>Deporte:</strong> <?php echo $_GET["deporte"]; ?></p>
    <p><strong>Edad:</strong> <?php echo $_GET["edad"]; ?></p>

    <!-- Agregar más contenido -->

    <p><a href="cerrar_sesion.php">Cerrar Sesión</a></p>
 
    
</body>
</html>