<?php
if (!isset($_GET['num_matricula']) || empty($_GET['num_matricula'])) {
    header('Location: ./alumnos.php');
    exit;
}

include_once "./ini/conexion.php";

// Obtener el ID del alumno a eliminar
$num_matricula = $_GET['num_matricula'];

// Preparar la consulta SQL
$query = $conn->prepare('DELETE FROM tbl_alumno WHERE num_matricula = ?');
$query->bind_param('i', $num_matricula);

// Ejecutar la consulta
if ($query->execute()) {
    // Eliminación exitosa
    header('Location: ./alumnos.php');
} else {
    // Error en la eliminación
    echo "Error al eliminar el alumno: " . $conn->error;
}

$query->close();
$conn->close();
?>

<script src="./js/eliminar.js"></script>
