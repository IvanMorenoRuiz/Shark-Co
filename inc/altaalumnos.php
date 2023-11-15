<?php
if (!isset($_POST['dni_alu']) || empty($_POST['dni_alu']) || empty($_POST['nombre_alu']) || empty($_POST['apellido1_alu']) || empty($_POST['apellido2_alu']) || empty($_POST['email_alu']) || empty($_POST['telf_alu']) || empty($_POST['clase'])) {
    header('Location: alumnos.php');
    exit;
}

include_once "conexion.php";

// Obtener los datos del formulario
$dni_alu = $_POST['dni_alu'];
$nombre_alu = $_POST['nombre_alu'];
$apellido1_alu = $_POST['apellido1_alu'];
$apellido2_alu = $_POST['apellido2_alu'];
$email_alu = $_POST['email_alu'];
$telf_alu = $_POST['telf_alu'];
$clase = $_POST['clase'];

// Preparar la consulta SQL
$query = $mysqli->prepare('INSERT INTO alumno (dni_alu, nombre_alu, apellido1_alu, apellido2_alu, email_alu, telf_alu, clase) VALUES (?, ?, ?, ?, ?, ?, ?)');
if ($query === false) {
    // Error en la preparación de la consulta
    echo "Error al preparar la consulta: " . $mysqli->error;
    exit;
}
$query->bind_param('sssssss', $dni_alu, $nombre_alu, $apellido1_alu, $apellido2_alu, $email_alu, $telf_alu, $clase);

// Ejecutar la consulta
if ($query->execute()) {
    // Inserción exitosa
    header('Location: alumnos.php');
    exit;
} else {
    // Error en la inserción
    echo "Error al insertar el alumno: " . $query->error;
    exit;
}

$query->close();
$mysqli->close();
?>
