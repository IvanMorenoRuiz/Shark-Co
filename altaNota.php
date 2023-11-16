<?php
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $asignatura = $_POST["asignatura"];
    $nota = $_POST["nota"];
    $num_matricula = $_POST["num_matricula"]; // Cambiado de $_GET a $_POST

    // Insertar datos en la tabla tbl_alumno_nota_assignatura
    $query = "INSERT INTO tbl_alumno_nota_assignatura (num_matricula, nota_alumno, id_assignatura) VALUES ('$num_matricula', '$nota', '$asignatura')";
    
    if ($conn->query($query) === TRUE) {
        echo "Notas añadidas correctamente";
    } else {
        echo "Error al añadir notas: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
