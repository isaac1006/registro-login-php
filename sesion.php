<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    
    <title>Document</title>
</head>
<body>
    <div class="ingreso">
        <h1> Iniciar sesión</h1>
        <form action="iniciarSesion.php" method="POST">
            <label for="correo">Correo
                <input type="email" name="correo">
            </label>
            <label for="confirmarContrasena">Contraseña
                <input type="password" name="contrasenaIngresada" required>
            </label>
            <button type="submit" class="enviar">Ingresar</button>
        </form>
    </div>
    <h2>Para registrarse <a href="index.php">Click aqui</a></h2>
</body>
</html>