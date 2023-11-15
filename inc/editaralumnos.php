<?php
if (!isset($_POST['num_matricula']) || empty($_POST['num_matricula']) || empty($_POST['dni_alu']) || empty($_POST['nombre_alu']) || empty($_POST['apellido1_alu']) || empty($_POST['apellido2_alu']) || empty($_POST['email_alu']) || empty($_POST['telf_alu']) || empty($_POST['clase'])) {
    header('Location: alumnos.php');
    exit;
}

include_once "conexion.php";

// Obtener los datos del formulario
$num_matricula = $_POST['num_matricula'];
$dni_alu = $_POST['dni_alu'];
$nombre_alu = $_POST['nombre_alu'];
$apellido1_alu = $_POST['apellido1_alu'];
$apellido2_alu = $_POST['apellido2_alu'];
$email_alu = $_POST['email_alu'];
$telf_alu = $_POST['telf_alu'];
$clase = $_POST['clase'];

// Preparar la consulta SQL
$query = $mysqli->prepare('UPDATE ALUMNO SET dni_alu = ?, nombre_alu = ?, apellido1_alu = ?, apellido2_alu = ?, email_alu = ?, telf_alu = ?, clase = ? WHERE num_matricula = ?');
$query->bind_param('sssssssi', $dni_alu, $nombre_alu, $apellido1_alu, $apellido2_alu, $email_alu, $telf_alu, $clase, $num_matricula);

// Ejecutar la consulta
if ($query->execute()) {
    // Actualización exitosa
    header('Location: alumnos.php');
} else {
    // Error en la actualización
    echo "Error al actualizar el alumno: " . $mysqli->error;
}

$query->close();
$mysqli->close();
?>
