<?php
session_start();
if (!isset($_SESSION['dni_prof'])) {
    header("location: ./index.php");
    exit;
} else if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ./index.php");
    exit;
}


else{


include_once("./inc/conexion.php");

$order = "num_matricula";
if (isset($_GET["order"])) {
    $order = $_GET["order"];
}

$query1 = "SELECT * from tbl_alumno";
$result1 = $conn->query($query1);
// Verificar si se ha enviado una consulta de búsqueda
if (isset($_POST['buscar'])) {
    // Obtener el nombre ingresado en el formulario de búsqueda
    $nombre = $_POST['nombre'];

    // Realizar la consulta a la base de datos para buscar coincidencias de nombres
    $query = "SELECT * FROM tbl_alumno WHERE nombre_alu LIKE '%$nombre%' ORDER BY $order";
    $result1 = $conn->query($query);
}
?>

<?php
if (isset($_POST['eliminar_tbl_alumno'])) {
    $numMatricula = $_POST['num_matricula'];
    $query = "DELETE FROM tbl_alumno WHERE num_matricula = '$numMatricula'";
    if ($conn->query($query1)) {
        echo "El tbl_alumno ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar al tbl_alumno: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARKANDCO - Inicio</title>
    <link rel="shortcut icon" href="./src/LOGO/_55770202-d102-434c-ab15-1b4f4bb9e1a3.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div id="oscuro">
        <header>
            <div class="flex headerparte1">
                <a href="./inc/salir.php"><button class="logoutboton"><img class="logoutimg" src="./src/LOGOUT.png" alt=""></button></a>
                <a href="./alumnos.php"><img class="nav-logo" src="./src/LOGO/LOGO NOMBRE SHARKANDCO.png" alt=""></a>
            </div>
            <!-- <nav class="nav">
                <ul class="nav-links">
                    <li>
                        <a href="#" id="btntbl_alumnos">tbl_alumnos</a>
                    </li>
                    <li>
                        <a href="#" id="btntbl_profesores">tbl_profesores</a>
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
            <!-- TABLA tbl_alumnoS -->
            <div id="tablaAlumnos">
                <!-- <div>
                    <h3 id="titulo">Tabla tbl_alumnos</h3>
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
                                echo "<td class='ultimosbordes'>" . $row["apellido_alu"] . "</td>";
                                echo "<td class='sinfondo nohover'><a href='formEditartbl_alumnos.php?num_matricula=" . $row["num_matricula"] . "'><button id='editar' class='editar'>Editar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='eliminartbl_alumnos.php?num_matricula=" . $row["num_matricula"] . "'><button id='eliminar'>Eliminar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='./notas.php'><button id='notas'>Notas</button></a></td>";
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
    const btntbl_alumnos = document.getElementById("btnAlumnos");
    const btntbl_profesores = document.getElementById("btnProfesores");

    const tablatbl_alumnos = document.getElementById("btnAlumnos");
    const tablatbl_profesores = document.getElementById("btnProfesores");

    tablatbl_alumnos.style.display = "block";
    tablatbl_profesores.style.display = "none";

    btntbl_alumnos.addEventListener("click", function() {
        tablatbl_alumnos.style.display = "block";
        tablatbl_profesores.style.display = "none";
    });

    btntbl_profesores.addEventListener("click", function() {
        tablatbl_alumnos.style.display = "none";
        tablatbl_profesores.style.display = "block";
    });
</script>

</html>
<?php
}