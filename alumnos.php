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


else{


include_once("./inc/conexion.php");

$order = "num_matricula";
if (isset($_GET["order"])) {
    $order = $_GET["order"];
}

$query1 = "SELECT * from tbl_alumno";
$result1 = $conn->query($query1);
// query para busqueda formulario
if (isset($_POST['buscar'])) {
    $termino_busqueda = $_POST['nombre'];

    if (is_numeric($termino_busqueda)) {
        $query = "SELECT * FROM tbl_alumno WHERE num_matricula LIKE '%$termino_busqueda%' ORDER BY $order";
    } else {
        $query = "SELECT * FROM tbl_alumno WHERE nombre_alu LIKE '%$termino_busqueda%' ORDER BY $order";
    }

    $result1 = $conn->query($query);
}

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

<?php
    // Procesar la solicitud de mostrar un número específico de alumnos
    if (isset($_POST['mostrar'])) {
    // Obtener el número de alumnos a mostrar del formulario
    $numAlumnos = $_POST['numAlumnos'];

    // Validar y ajustar el número de alumnos si es necesario
    $numAlumnos = ($numAlumnos > 0 && $numAlumnos <= 100) ? $numAlumnos : 10; // Establecer un valor predeterminado si es necesario

    // Realizar la consulta SQL limitando el número de resultados
    $query = "SELECT * FROM tbl_alumno LIMIT $numAlumnos";
    $result1 = $conn->query($query);
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
                <a href="./formAltaAlumnos.php"><button class="altaboton button flex">Alta</button></a>
                <a href="./notasAlumnos.php"><button class="altaboton button flex">Notas</button></a>
                <form class="buscador flex" method="POST" action="">
                    <input type="text" name="nombre" placeholder="Nombre/Matricula">
                    <button type="submit" name="buscar">Buscar</button>
                </form>
            </div>
            <div class="buscador flex">
            <form class="buscador flex" method="POST" action="">
                <input type="text" id="numAlumnos" name="numAlumnos" placeholder="Número de alumnos a mostrar:" min="1" max="100">
                <button type="submit" id="mostrar" name="mostrar">Mostrar</button>
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
                                echo "<td>" . $row["dni_alu"] . "   </td>";
                                echo "<td>" . $row["nombre_alu"] . "</td>";
                                echo "<td class='ultimosbordes'>" . $row["apellido_alu"] . "</td>";
                                echo "<td class='sinfondo nohover'><a href='formEditaralumnos.php?num_matricula=" . $row["num_matricula"] . "&dniAlu=". $row["dni_alu"]."&nombre_alu=" . $row["nombre_alu"] ."&apellidoAlu=". $row["apellido_alu"] ."'><button id='editar' class='editar'>Editar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='./inc/eliminartbl_alumnos.php?num_matricula=" . $row["num_matricula"] . "'><button id='eliminar'>Eliminar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='notas.php?nombre_alu=" . $row["nombre_alu"] . "&num_matricula=" . $row["num_matricula"] . "'><button id='notas'>Notas</button></a></td>";
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