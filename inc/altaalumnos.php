<?php
if (!isset($_POST['num_matricula']) || empty($_POST['num_matricula']) || empty($_POST['dni_alu']) || empty($_POST['nombre_alu']) || empty($_POST['apellido_alu'])) {
    header('Location: ../alumnos.php');
    exit;
}

include_once "conexion.php";

// Obtener los datos del formulario
$num_matricula = $_POST['num_matricula'];
$dni_alu = $_POST['dni_alu'];
$nombre_alu = $_POST['nombre_alu'];
$apellido_alu = $_POST['apellido_alu'];

// Preparar la consulta SQL
$query = mysqli_prepare($conn, 'INSERT INTO tbl_alumno (num_matricula, dni_alu, nombre_alu, apellido_alu) VALUES (?, ?, ?, ?)');
if ($query === false) {
    // Error en la preparación de la consulta
    echo "Error al preparar la consulta: " . mysqli_error($conn);
    exit;
}

mysqli_stmt_bind_param($query, 'ssss', $num_matricula, $dni_alu, $nombre_alu, $apellido_alu);

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

