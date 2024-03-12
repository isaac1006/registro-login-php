<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    
    <title>Pagina Principal</title>
</head>
<header>
    <h1>Bienvenido a la escuela de formacion en deportes IAR</h1>
</header>
<body>
    <div class="registro">
        <h2>Para registrarse digilencie los datos del formulario: </h2>
        <form action="registrar.php" method="post">
            <label for="nombre">Nombre
                <input type="text" name="nombre">
            </label>
            <label for="apellido">Apellido
                <input type="text" name="apellido">
            </label>
            <label for="edad">Edad
                <input type="number" name="edad">
            </label>
            <label for="deporte">Seleccione el deporte a registrar:</label>
            <select name="deporte" id="deporte">
                <option value="futbol">Futbol</option>
                <option value="ciclismo">Ciclismo</option>
                <option value="natacion">Natacion</option>
                <option value="volleyball">Volleyball</option>
                <option value="tiroalblanco">Tiro al blanco</option>
            </select>
            <label for="contrasena">Contraseña
                <input type="password" name="contrasena">
            </label>
            <label for="confirmarContrasena">Confirmar contraseña
                <input type="password" name="confirmarContrasena" required>
            </label>
            <label for="correo">Correo
                <input type="email" name="correo" placeholder="email@dominio.com" required>
            </label>
            <button class="enviar" type="submit">Registrarse</button>
        </form>
    </div>
    <h1> Click abajo para inciar sesion:  </h1>
    <a href="sesion.php">Iniciar Sesion</a>
    
 
</body>

</html>


