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

try {
    include_once('./conexion.php');

// Obtener los datos del formulario
$num_matricula = $_POST["num_matricula"];
$asignatura = $_POST["asignatura"];
$nota = $_POST["nota"];;
$intMatricula = (int)$num_matricula;
$intasignatura = (int)$asignatura;

    $query1 = "INSERT INTO tbl_alumno_nota_assignatura (num_matricula, nota_alumno, id_assignatura) VALUES (?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    $stmt = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt, "isi", $intMatricula,$nota, $intasignatura);
    mysqli_stmt_execute($stmt);

    $result1 = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: ../alumnos.php');
} catch(Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage();
}