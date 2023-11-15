<?php
if (!isset($_POST['num_matricula']) || empty($_POST['num_matricula']) || empty($_POST['dni_alu']) || empty($_POST['nombre_alu']) || empty($_POST['apellido_alu']))  {
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
$query = $conn->prepare('UPDATE tbl_alumno SET dni_alu = ?, nombre_alu = ?, apellido_alu = ? WHERE num_matricula = ?');
$query->bind_param('sssi', $dni_alu, $nombre_alu, $apellido_alu, $num_matricula);

// Ejecutar la consulta
if ($query->execute()) {
    // Actualización exitosa
    header('Location: ../alumnos.php');
} else {
    // Error en la actualización
    echo "Error al actualizar el alumno: " . $conn->error;
}

$query->close();
$conn->close();
?>
