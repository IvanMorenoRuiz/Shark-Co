<?php
session_start();
if (!isset($_SESSION['dni_prof'])) {
    header("location: ./index.html");
    exit;
} else if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ./index.html");
    exit;
}
// if (!isset($_POST['num_matricula']) || empty($_POST['num_matricula']) || empty($_POST['dni_alu']) || empty($_POST['nombre_alu']) || empty($_POST['apellido_alu']))  {
//     header('Location: ../alumnos.php');
//     exit;
// }

try {
    include_once('./conexion.php');

// Obtener los datos del formulario
$num_matricula = $_POST['num_matricula'];
$dni_alu = $_POST['dni_alu'];
$nombre_alu = $_POST['nombre_alu'];
$apellido_alu = $_POST['apellido_alu'];

    $query1 = "UPDATE tbl_alumno SET dni_alu = ?, nombre_alu = ?, apellido_alu = ? WHERE num_matricula = ?";

    $stmt = mysqli_stmt_init($conn);
    $stmt = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt, "sssi", $dni_alu, $nombre_alu, $apellido_alu, $num_matricula);
    mysqli_stmt_execute($stmt);

    $result1 = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: ../alumnos.php');
} catch(Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage();
}