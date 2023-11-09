<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ./login.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ./login.php");
    exit;
}
?>

<?php
include "./conexion.php";
$order = "num_matricula";
if (isset($_GET["order"])) {
    $order = $_GET["order"];
}
$query1 = "SELECT * from alumno";
$query2 = "SELECT * from profesor";
$result1 = $mysqli->query($query1);
$result2 = $mysqli->query($query2);
// Verificar si se ha enviado una consulta de búsqueda
if (isset($_POST['buscar'])) {
    // Obtener el nombre ingresado en el formulario de búsqueda
    $nombre = $_POST['nombre'];

    // Realizar la consulta a la base de datos para buscar coincidencias de nombres
    $query = "SELECT * FROM alumno WHERE nombre_alu LIKE '%$nombre%' ORDER BY $order";
    $result1 = $mysqli->query($query);
}
?>

<?php
if (isset($_POST['eliminar_alumno'])) {
    $numMatricula = $_POST['num_matricula'];
    $query = "DELETE FROM alumno WHERE num_matricula = '$numMatricula'";
    if ($mysqli->query($query1)) {
        echo "El alumno ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar al alumno: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Vision - Inicio</title>
    <link rel="shortcut icon" href="./src/LOGO/_55770202-d102-434c-ab15-1b4f4bb9e1a3.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="oscuro">
        <header>
            <div class="flex headerparte1">
                <a href="./salir.php"><button class="logoutboton"><img class="logoutimg" src="./src/LOGOUT.png" alt=""></button></a>
                <a href="./alumnos.php"><img class="nav-logo" src="./src/LOGO/LOGO NOMBRE SHARKANDCO.png" alt=""></a>
            </div>
            <!-- <nav class="nav">
                <ul class="nav-links">
                    <li>
                        <a href="#" id="btnAlumnos">Alumnos</a>
                    </li>
                    <li>
                        <a href="#" id="btnProfesores">Profesores</a>
                    </li>
                </ul>
            </nav> -->
            <div class="alta flex">
                <a href="#popupalta"><button class="altaboton button flex">Alta</button></a>
                <form class="buscador flex" method="POST" action="">
                    <input type="text" name="nombre" placeholder="Buscar por nombre">
                    <button type="submit" name="buscar">Buscar</button>
                </form>
            </div>
        </header>
        <div class="alumnos">
            <!-- TABLA ALUMNOS -->
            <div id="tablaAlumnos">
                <!-- <div>
                    <h3 id="titulo">Tabla Alumnos</h3>
                </div> -->
                <table class="tabla1 separaciones">

                    <thead>
                        <tr class="noresaltar">
                            <th class="titulos">Id</th>
                            <th class="titulos">Matricula</th>
                            <th class="titulos">DNI</th>
                            <th class="titulos">Nombre</th>
                            <th class="titulos">Apellidos</th>
                            <th class="titulos"></th>
                            <th class="titulos"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if ($result1) {
                            while ($row = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='primerosbordes'>" . $row["num_matricula"] . "</td>";
                                echo "<td>" . $row["dni_alu"] . "</td>";
                                echo "<td>" . $row["dni_alu"] . "   </td>";
                                echo "<td>" . $row["nombre_alu"] . "</td>";
                                echo "<td class='ultimosbordes'>" . $row["apellido1_alu"] . "</td>";
                                echo "<td class='sinfondo nohover'><a href='formEditarAlumnos.php?num_matricula=" . $row["num_matricula"] . "'><button id='editar' class='editar'>Editar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='eliminaralumnos.php?num_matricula=" . $row["num_matricula"] . "'><button id='eliminar'>Eliminar</button></a></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ---------------- -->
</body>

<script>
    const btnAlumnos = document.getElementById("btnAlumnos");
    const btnProfesores = document.getElementById("btnProfesores");

    const tablaAlumnos = document.getElementById("tablaAlumnos");
    const tablaProfesores = document.getElementById("tablaProfesores");

    tablaAlumnos.style.display = "block";
    tablaProfesores.style.display = "none";

    btnAlumnos.addEventListener("click", function() {
        tablaAlumnos.style.display = "block";
        tablaProfesores.style.display = "none";
    });

    btnProfesores.addEventListener("click", function() {
        tablaAlumnos.style.display = "none";
        tablaProfesores.style.display = "block";
    });
</script>

</html>