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

include "../inc/conexion.php";

try {
    $query = "SELECT tbl_assignatura.nombre_assignatura, AVG(tbl_alumno_nota_assignatura.nota_alumno) AS notamedia
               FROM tbl_alumno_nota_assignatura 
               JOIN tbl_assignatura ON tbl_alumno_nota_assignatura.id_assignatura = tbl_assignatura.id_assignatura
               GROUP BY tbl_alumno_nota_assignatura.id_assignatura";

    $result = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARKANDCO - Nota Media Asignaturas</title>
    <link rel="shortcut icon" href="../src/LOGO/_55770202-d102-434c-ab15-1b4f4bb9e1a3.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div id="oscuro">
        <header>
            <div class="flex headerparte1">
                <a href="../alumnos.php"><img class="nav-logo" src="../src/LOGO/LOGO NOMBRE SHARKANDCO.png" alt=""></a>
            </div>
            <div class="filtro">
                <div class="flex">
                    <a href="../notasAlumnos.php"><button class="botonesnotasprinc button flex">NOTAS</button></a>
                    <a href="./notamedia.php"><button class="botonesnotas button flex">Nota media asignaturas</button></a>
                    <a href="./mediamasalta.php"><button class="botonesnotas button flex">Media mas alta</button></a>
                    <a href="./mejoralumno.php"><button class="botonesnotas button flex">Mejor alumno</button></a>
                </div>
            </div>
            <div class="alta flex">
                <a href="javascript:history.back()"><button class="atrasboton"><img class="atrasimg" src="../src/atras.png" alt=""></button></a>
            </div>
            </header>
        <div class="alumnos">
            <div id="tablaNotasMedias">
                <div>
                    <h3 id="titulo">Nota Media Asignaturas</h3>
                </div>
                <table id="tablaAlumnos" class="tabla1 separaciones">
                    <thead>
                        <tr class="noresaltar">
                            <th class="titulos">Asignatura</th>
                            <th class="titulos">Nota Media</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='primerosbordes'>" . $row["nombre_assignatura"] . "</td>";
                                echo "<td class='ultimosbordes'>" . number_format($row["notamedia"], 2) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>