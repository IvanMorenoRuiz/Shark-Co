<?php

include_once "conexion.php";

// Obtener los datos del formulario
$dni_alu = isset($_POST['dni_alu']) ? $_POST['dni_alu'] : '';
$nombre_alu = isset($_POST['nombre_alu']) ? $_POST['nombre_alu'] : '';
$apellido_alu = isset($_POST['apellido_alu']) ? $_POST['apellido_alu'] : '';


// Preparar la consulta SQL
$query = mysqli_prepare($conn, 'INSERT INTO tbl_alumno (dni_alu, nombre_alu, apellido_alu) VALUES (?, ?, ?)');
if ($query === false) {
    // Error en la preparación de la consulta
    echo "Error al preparar la consulta: " . mysqli_error($conn);
    exit;
}

mysqli_stmt_bind_param($query, 'sss', $dni_alu, $nombre_alu, $apellido_alu);

// Ejecutar la consulta
if (mysqli_stmt_execute($query)) {
    // Inserción exitosa
    header('Location: ../alumnos.php');
    exit;
} else {
    // Error en la inserción
    echo "Error al insertar el alumno: " . mysqli_error($conn);
    exit;
}

mysqli_stmt_close($query);
mysqli_close($conn);
?>

