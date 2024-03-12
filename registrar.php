<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Verificar que los datos del método sean válidos, no nulos, no esten vacion //
    $campos = array('nombre', 'apellido', 'edad', 'deporte', 'contrasena', 'confirmarContrasena', 'correo');
    $valido = true;
    foreach ($campos as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            $valido = false;
            break; // Detiene el bucle si se encuentra un campo vacío
        }
    }
    if ($valido){   
        // Todos los campos presentes no estan vacios //
        // verifico que la contraseña coincida // 
        if ($_POST['contrasena'] === $_POST['confirmarContrasena']) {

            //Guardo los datos del post en varibales //
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $edad=$_POST['edad'];
            $deporte=$_POST['deporte'];
            $contrasena=$_POST['contrasena'];
            $correo=$_POST['correo'];
            
            //llamar a la funcion conexion cuando deseo veridicar la conexion//
             /* $conectar= conexion();
                 registrarDeportista($nombre,$apellido,$edad,$deporte,$contrasena,$correo); //funcion para registar el usuario //
            */

             //EJECUCION PRINCIPAL DE MI PROGRAMA //
            $existe=correoExiste($correo);  //esta funcion le envio el correo, y evaluo si existe sino existe lo registro //
            var_dump($existe);
            // Llamo a la función correoExiste y obtengo el mensaje
            $mensaje = correoExiste($correo);
            var_dump($mensaje);
            // Verifico el mensaje y registro al deportista si el correo no está registrado
             if (strpos($mensaje, 'no está registrado') !== false) { //strpos se utiliza para verificar si la subcadena "no está registrado" está presente en la variable $mensaje//
                    registrarDeportista($nombre, $apellido, $edad, $deporte, $contrasena, $correo);
                    echo "Usuario registrado correctamente.";
                    // dirijo a iniciar sension //
                    header("Location: sesion.php");
            exit;
             } else {
                    echo $mensaje;
                    echo '<h1>Click si desea iniciar sesion <a href="sesion.php">Iniciar Sesión</a></h1>';
                   
             }

            //registro de deprotista //
            } else {
                echo "Error: la contraseña no coincide";
                
            }
    } else {
        // Al menos uno de los campos está vacío o no está establecido
        echo "Error: Todos los campos son obligatorios";
        echo '<a href="./index.php">Registre nuevamente</a>';
    }
}
function conexion() {
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

function correoExiste($correo) { // funcion con el valor de correo //
    $mensaje=''; //variable para alamcenar el mensaje //
    $verificarCorreoExi = "SELECT COUNT(*) AS total FROM `deportistas` WHERE correo = '$correo'"; /*consulta con alias total para guardar la consulta en verificarCorreo */
    $conectar = conexion();
    $existe;

    if ($existe = $conectar->query($verificarCorreoExi)) {
        $row = $existe->fetch_assoc();

        if (intval($row['total']) == 1) {
            $mensaje = "El correo ya está registrado. Inicie sesión o use otro correo.";
        }else{
            $mensaje = "El correo no está registrado.  Desea registrarlo?";
             
        }

    }else{
      echo"error en la consulta  ";
    }
    // Cerrar la conexión // 
    $conectar->close();
    return $mensaje; // devolver el mensaje //


}
function registrarDeportista($nombre,$apellido,$edad,$deporte,$contrasena,$correo){
    //preparo la consulta //
    $sqlRegistrar="INSERT INTO `deportistas`(`nombre`, `apellido`, `edad`, `deporte`,`contrasena`,`correo`) VALUES ('$nombre', '$apellido',$edad, '$deporte', '$contrasena', '$correo')";
    //llamo la funcion conexion //
    $conectar=conexion();
    //ejecuto la consulta y verifico si hay errores en la consulta//
    if($conectar->query($sqlRegistrar)===TRUE){
    //verifico el registro de los datos //
        echo "se guardaron los datos correctamente  ";
    }else{
        echo "error en el registro de los datos ";
    }
    $conectar->close();
    
}
?>
 