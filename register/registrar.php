<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreUsuario = $_POST['nombre_usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $correoElectronico = $_POST['correo_electronico'];
    $nombreCompleto = $_POST['nombre_completo'];
    $fechaRegistro = date('Y-m-d H:i:s');  // Fecha y hora actual

    // Validar que el correo electrónico termine en "@fje.edu"
    if (substr($correoElectronico, -8) === "@fje.edu") {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuarios (NombreUsuario, Contraseña, CorreoElectronico, NombreCompleto, FechaRegistro)
                VALUES ('$nombreUsuario', '$contrasena', '$correoElectronico', '$nombreCompleto', '$fechaRegistro')";

        if (mysqli_query($conn, $sql)) {
            echo "Registro exitoso. El usuario ha sido agregado a la base de datos.";
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    } else {
        echo "La dirección de correo electrónico no es válida. Debe ser de dominio @fje.edu.";
    }

    mysqli_close($conn);
}
?>
