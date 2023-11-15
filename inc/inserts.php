<?php
include_once "conexion.php";

$entrar = $_POST['entrar'];
if ($entrar == 1) {
    $DNIAlu = $_POST['dni_alu'];
    $NombreAlu = $_POST['nombre_alu'];
    $Apellido1Alu = $_POST['apellido1_alu'];
    $Apellido2Alu = $_POST['apellido2_alu'];
    $EmailAlu = $_POST['email_alu'];
    $TelfAlu = $_POST['telf_alu'];
    $ClaseAlu = $_POST['clase_alu'];

    if (!preg_match("/^\d{8}[A-Z]$/", $DNIAlu)) {
        header("location: alumnos.php");
        exit();
    }
    if (strlen($NombreAlu) > 20 || strlen($NombreAlu) < 1) {
        header("location: alumnos.php");
        exit();
    }
    if (strlen($Apellido1Alu) > 20 || strlen($Apellido1Alu) < 1) {
        header("location: alumnos.php");
        exit();
    }
    if (strlen($Apellido2Alu) > 20) {
        header("location: alumnos.php");
        exit();
    }
    if (!filter_var($EmailAlu, FILTER_VALIDATE_EMAIL)) {
        header("location: alumnos.php");
        exit();
    }
    if (!preg_match("/^\d{9}$/", $TelfAlu)) {
        header("location: alumnos.php");
        exit();
    }
    $sql = "INSERT INTO ALUMNO VALUES (null, '$DNIAlu', '$NombreAlu', '$Apellido1Alu', '$Apellido2Alu', '$EmailAlu', '$TelfAlu', CURDATE(), '$ClaseAlu');";
    $insertar = $mysqli->query($sql);
    if ($insertar) {
        // Inserción exitosa
        header('Location: alumnos.php');
    } else {
        // Error en la inserción
        echo "Error al insertar el alumno: " . $mysqli->error;
    }
}
?>
