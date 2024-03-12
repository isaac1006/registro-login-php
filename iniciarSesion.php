<?php
// PROGRAMA PRINCIPAL SESION // 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica que existan los campos y no sean nulos //
    if (isset($_POST['correo'], $_POST['contrasenaIngresada'])) {
        $correo = $_POST['correo'];
        $contrasenaIngresada = $_POST['contrasenaIngresada'];

        // Verifico que los campos no estén vacíos para ejecutar la funcion //
        if (!empty($correo) && !empty($contrasenaIngresada)) {
            // Llamo a la función para validar la contraseña
            validarContraseña($correo, $contrasenaIngresada);
        } else {
            echo "Error: Correo y contraseña no pueden estar vacíos.";
        }
    } else {
        echo "Error: Correo y contraseña son obligatorios.";
    }
}
function conexion() { /* funcion conexion a la base de datos*/
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "educaciondb";
    $puerto = "3306";

    // Concatenar la conexión
    $conn = new mysqli($host, $user, $password, $database, $puerto);

    // Verificar la conexión
    if ($conn->connect_errno) {
        echo "Error en la conexión a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    } else {
        echo $conn->host_info . "\n" . "No hay error en la conexión";
    }

    // Devolver el objeto de conexión
    return $conn;
}
function validarContraseña($correo, $contrasenaIngresada) {
    // Llamo a la función de conexión
    $conectar = conexion();

    // Consulto la contraseña, nombre, apellido y edad del correo
    $obtener_datos = "SELECT `contrasena`, `nombre`, `apellido`, `edad`,`deporte` FROM `deportistas` WHERE correo = '$correo'";

 
    // Ejecuto la consulta
    if ($resultado = $conectar->query($obtener_datos)) {
        $row = $resultado->fetch_assoc();

        // Verifico si la contraseña ingresada coincide con la almacenada en la base de datos
        if($row['contrasena'] == $contrasenaIngresada){
            if ($row['edad']>=18) {
              // Usuario mayor de edad, redirijo a una página para mayores
              header("Location: mayores.php?nombre=" . $row['nombre'] . "&apellido=" . $row['apellido'] . "&deporte=" . $row['deporte'] . "&edad=" . $row['edad']);
              exit();
            
            } else {
                // Usuario menor de edad, redirijo a una página para menores
                header("Location: menores.php?nombre=" . $row['nombre'] . "&apellido=" . $row['apellido'] . "&deporte=" . $row['deporte'] . "&edad=" . $row['edad']);
                exit();
            }
            //cierro //
            exit(); 
           
        } else {
            // Contraseña no coincide
            echo '<h1>La contraseña no es correcta :  <a href="sesion.php">Inicia Sesión nuevamente</a></h1>';
        }
        // Libero el resultado
        $resultado->free();
    } else {
        // Error en la consulta
        echo "Error en la consulta de la contraseña.";
    }

    // Cierro la conexión
    $conectar->close();
}
?>