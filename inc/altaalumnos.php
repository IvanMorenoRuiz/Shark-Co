<?php
if (!isset($_SESSION['dni_prof'])) {
    header("location: ../index.html");
    exit;
} else if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../index.html");
    exit;
}

try {
    include_once "conexion.php";

    // Obtener los datos del formulario
    $dni_alu = isset($_POST['dni_alu']) ? $_POST['dni_alu'] : '';
    $nombre_alu = isset($_POST['nombre_alu']) ? $_POST['nombre_alu'] : '';
    $apellido_alu = isset($_POST['apellido_alu']) ? $_POST['apellido_alu'] : '';

    // Verificar si el alumno ya existe
    $query_verificacion = mysqli_prepare($conn, 'SELECT * FROM tbl_alumno WHERE dni_alu = ?');
    if ($query_verificacion === false) {
        echo "Error al preparar la consulta de verificación: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($query_verificacion, 's', $dni_alu);
    mysqli_stmt_execute($query_verificacion);
    mysqli_stmt_store_result($query_verificacion);

    if (mysqli_stmt_num_rows($query_verificacion) > 0) {
        header('Location: ./formAltaAlumnos.php?error');
    } else {
        // Preparar la consulta SQL para insertar el alumno
        $query_insertar = mysqli_prepare($conn, 'INSERT INTO tbl_alumno (dni_alu, nombre_alu, apellido_alu) VALUES (?, ?, ?)');
        if ($query_insertar === false) {
            echo "Error al preparar la consulta de inserción: " . mysqli_error($conn);
            exit;
        }

        mysqli_stmt_bind_param($query_insertar, 'sss', $dni_alu, $nombre_alu, $apellido_alu);

        // Ejecutar la consulta de inserción
        if (mysqli_stmt_execute($query_insertar)) {
            header('Location: ./alumnos.php');
            exit;
        } else {
            echo "Error al insertar el alumno: " . mysqli_error($conn);
            exit;
        }

        mysqli_stmt_close($query_insertar);
    }

    mysqli_stmt_close($query_verificacion);
    mysqli_close($conn);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
