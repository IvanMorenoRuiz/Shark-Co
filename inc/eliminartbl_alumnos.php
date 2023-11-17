<?php

session_start();
if (!isset($_SESSION['dni_prof'])) {
    header("location: ../index.html");
    exit;
} else if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.html");
    exit;
}
if (!isset($_GET['num_matricula']) || empty($_GET['num_matricula'])) {
    header('Location: ./alumnos.php');
    exit;
}

try{
    
include_once "./conexion.php";

// Obtener el ID del alumno a eliminar
$num_matricula = $_GET['num_matricula'];

// Preparar la consulta SQL
$query = $conn->prepare('DELETE FROM tbl_alumno WHERE num_matricula = ?');
$query->bind_param('i', $num_matricula);

// Ejecutar la consulta
if ($query->execute()) {
    // Eliminación exitosa
    header('Location: ../alumnos.php');
} else {
    // Error en la eliminación
    echo "Error al eliminar el alumno: " . $conn->error;
}

$query->close();
$conn->close();
}catch(Exception $e){
    echo "Error : ". $e->getMessage();
}

?>