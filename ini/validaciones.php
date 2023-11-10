<?php
session_start();

if(!filter_has_var(INPUT_POST,'inicio')) {
    header('Location : '. '../index.php');
    exit();
    } else {// comprobamos que la solicitud se envie con POST
    $email = $_POST["email"];
    $password = $_POST["password"];
// Validación del dominio del correo electrónico
if (empty($email) || empty($password)) {
    header("Location: ../index.php?emptyUsr");
    exit;
} else if (empty($password)){
    header("Location: ../index.php?emptyPwd");
    exit;
} else if (empty($email)){
    header("Location: ../index.php?empty");
}else if (strpos($email, "@fje.edu") === false) {
    // Utiliza la función strpos para buscar la cadena "@fje.edu" en el correo electrónico ($email).
    // Si no se encuentra la cadena, strpos devolverá `false`.
    header("Location: ../index.php?correo");

    exit();
    // La función exit() termina inmediatamente la ejecución del script PHP, lo que significa que el código posterior a esta línea no se ejecutará.
}

    // Incluye el archivo que contiene la conexión a la base de datos.
    include_once("./conexion.php");

   

    // Resto del código para validar el inicio de sesión...

    // Se prepara una consulta SQL para seleccionar datos de la tabla "Usuarios" donde el campo "CorreoElectronico" sea igual al valor de la variable $email.
    $query = "SELECT dni_prof, contrasena_prof, nombre_prof FROM tbl_profesor WHERE email_prof = ?";
    $stmt = mysqli_prepare($conn, $query); // Se prepara la consulta SQL en la conexión $conn.

    // Se vincula el valor de $email como un parámetro en la consulta SQL (tipo string).
    mysqli_stmt_bind_param($stmt, "s", $email);
    // Se ejecuta la consulta con el valor $email.
    mysqli_stmt_execute($stmt);
    // Se almacena el resultado de la consulta.
    mysqli_stmt_store_result($stmt);

    // Si la consulta devuelve al menos una fila (es decir, el correo electrónico existe en la base de datos).
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Se vinculan las columnas de la consulta con variables PHP.
        mysqli_stmt_bind_result($stmt, $dni_prof, $hashedPassword, $nombre_prof);
        // Se obtienen los valores de las columnas en las variables correspondientes.
        mysqli_stmt_fetch($stmt);
               // Se verifica si la contraseña proporcionada ($password) coincide con la contraseña almacenada en la base de datos ($hashedPassword).
        if (password_verify($password, $hashedPassword)) { 
            // Inicio de sesión exitoso
            session_start();
            // Se almacena el ID de usuario en la sesión.
            $_SESSION["dni_prof"] = $dni_prof;
            // Redirige al usuario a una página de contenido (la línea comentada no está activa).
            header("Location: ../alumnos.php");
        } else {
        // Si el correo electrónico no existe en la base de datos, se redirige de vuelta a la página de inicio de sesión con un mensaje de error.
        header("Location: ../index.php?error");
        }
    }
    // Se cierra el statement de MySQL.
    mysqli_stmt_close($stmt);
    // Se cierra la conexión a la base de datos.
    mysqli_close($conn);
}
?>
