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
try {
    session_start();
    $nota = $_GET['nota'];
    $idAlu = $_GET['idAlu'];
    $notaInt = (int)$nota;
    $idAluInt = (int)$idAlu;
    echo $nota;
    echo $idAlu;
    $previousPage = $_SERVER['HTTP_REFERER'];


include('./conexion.php');
    $query1 = "UPDATE `tbl_alumno_nota_assignatura` SET `nota_alumno`= ? WHERE `id_alumno_nota_assignatura`= ?";

    $stmt = mysqli_stmt_init($conn);
    $stmt = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt, "ii", $notaInt, $idAluInt);
    mysqli_stmt_execute($stmt);

    $result1 = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../alumnos.php");
} catch(Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage();
}
