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

include "./inc/conexion.php"; // Incluye tu archivo de conexión



$order = "num_matricula";
if (isset($_GET["order"])) {
    $order = $_GET["order"];
}
try {
    $num_matricula = $_GET['num_matricula'];
    $nombre = $_GET['nombre_alu'];
    
    $query1 = "SELECT tbl_alumno_nota_assignatura.*, tbl_assignatura.nombre_assignatura 
               FROM tbl_alumno_nota_assignatura 
               JOIN tbl_assignatura ON tbl_alumno_nota_assignatura.id_assignatura = tbl_assignatura.id_assignatura
               WHERE num_matricula = ?";
    
    $stmt = mysqli_stmt_init($conn);
    $stmt = mysqli_prepare($conn, $query1);
    mysqli_stmt_bind_param($stmt, "s", $num_matricula);
    mysqli_stmt_execute($stmt);
    
    $result1 = mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} catch(Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage();
}


if (isset($_POST['buscar'])) {
    $nombre = $_POST['nombre'];

    $query = "SELECT * FROM tbl_alumno WHERE nombre_alu LIKE '%$nombre%' ORDER BY $order";
    $result1 = mysqli_query($conn, $query); 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shark & Co</title>
    <link rel="shortcut icon" href="./src/LOGO/_55770202-d102-434c-ab15-1b4f4bb9e1a3.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./stylesnotas.css">
</head>

<body>
    <div id="oscuro">
        <header>
            <div class="flex headerparte1">
                <a href="./alumnos.php"><img class="nav-logo" src="./src/LOGO/LOGO NOMBRE SHARKANDCO.png" alt=""></a>
            </div>
            <div class="alta flex">
                <a href="javascript:history.back()"><button class="atrasboton"><img class="atrasimg" src="./src/atras.png" alt=""></button></a>
            </div>
        </header>
        <div class="alumnos">
            <!-- TABLA ALUMNOS -->
            <div id="tablaAlumnos">
                <div>
                <h3 id="titulo">Notas de  <?php echo $nombre; ?> </h3>

                </div>
                <table class="tabla1 separaciones">

                    <thead>
                        <tr class="noresaltar">
                            <th class="titulos">Asignatura</th>
                            <th class="titulos">Notas</th>
                            <th class="titulos"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $nombre = ""; 
                        if ($result1) {
                            while ($row = mysqli_fetch_assoc($result1)) { // Utiliza mysqli_fetch_assoc
                                echo "<tr>";
                                echo "<td class='primerosbordes'>" . $row["nombre_assignatura"] . "</td>";
                                echo "<td class='ultimosbordes'>" . $row["nota_alumno"] . "</td>";
                                echo "<td class='sinfondo nohover'><a href='editarNotas.php?nombre_assignatura=" . $row["nombre_assignatura"] . "&nota_alumno=" . $row["nota_alumno"] . "&idAlu=".$row['id_alumno_nota_assignatura']."'><button id='notas'>Editar</button></a></td>";
                                echo "<td class='sinfondo nohover'><a href='./inc/eliminarNotas.php?nombre_assignatura=" . $row["nombre_assignatura"] . "&nota=" . $row["nota_alumno"] . "&idAlu=".$row['id_alumno_nota_assignatura']."'><button id='eliminar'>Eliminar</button></a></td>";
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