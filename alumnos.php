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

<style>
    * {
        margin: 0;
        padding: 0;
        color: white;

        font-family: 'Rubik', sans-serif;
    }

    html {
        color: white;
        font-family: 'Rubik', sans-serif;
    }

    body {
        background-color: #043689;
    }

    body::before {
        content: "";
        position: fixed;
        height: 100%;
        width: 100%;
        background-size: cover;
        z-index: -1;
        filter: blur(7px);
    }

    header {
        background-image: linear-gradient(rgba(0, 0, 0, 1) 15%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.1) 90%, transparent 100%);

        display: flex;
        align-items: center;
        justify-content: space-evenly;
        width: 100%;
        height: 15vh;
        z-index: 1000;
        text-align: center;
        position: fixed;
    }

    .tabla1 {
        background-color: #022969;
        border-radius: 3vh 3vh 0 0;
        padding: 1vh;
        padding-top: 0;
    }

    .alumnos {
        padding-top: 15vh;
    }

    #editar {
        background: linear-gradient(to right, #043689, #137391);
        width: 10vh;
        height: 3vh;
        border-radius: 4vh;
        font-size: 1.6vh;
        border: none;
        transition: all 0.3s;
    }

    #editar:hover {
        font-weight: 500;
        font-size: 1.9vh;
        background: white;
        color: #0b548d;
    }

    #eliminar {
        background: linear-gradient(to right, #dc3545, #b41d6e);
        width: 12vh;
        height: 3vh;
        border-radius: 4vh;
        font-size: 1.6vh;
        border: none;
        transition: all 0.3s;
    }

    #eliminar:hover {
        font-weight: 500;
        font-size: 1.9vh;
        background: white;
        color: #dc3545;
    }

    #titulo {
        text-align: center;
        font-size: 4vh;
        margin-bottom: 2vh;
    }

    #oscuro {
        height: max-content;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .primerosbordes {
        border-radius: 3vh 0 0 3vh;
        padding-left: 1vh;
    }

    .ultimosbordes {
        border-radius: 0 3vh 3vh 0;
        padding-right: 1vh;
    }

    .sinfondo {
        background-color: #022969;
        width: 4vh;
        padding: 1vh;
    }

    table {
        text-align: center;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    table .noresaltar:hover {
        background-image: none;
        background-color: none;
        background-color: transparent;
    }

    table tr:hover {
        border-radius: 3vh;
        background-color: black;
        cursor: pointer;
    }

    td {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1.2vh 0;
    }


    td .sihover:hover {
        background-color: white;
        padding: 1.2vh 0;
    }


    .titulos {
        padding-top: 1.5vh;
        padding-bottom: 1vh;
        font-weight: 500;
        font-size: 2vh;
    }

    td {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1.2vh 0;
    }

    .separaciones {
    width: 100%;
    border-spacing: 0 3px;
}

    .flechas {
        height: 1.6vh;
    }

    .nav-logo {
        width: 25vh;
        cursor: pointer;
    }

    .nav {
        list-style: none;
    }

    .nav-links {
        list-style: none;
    }

    .nav-links li {
        display: inline-block;
        padding: 0 20px;
    }

    .nav-links li a {
        transition: all 0.3s ease 0s;
    }

    .nav-links li a:hover {
        font-size: 2.4vh;
    }

    .altaboton,
    li,
    a {
        font-weight: 500;
        font-size: 2vh;
        color: white;
        text-decoration: none;
    }

    .altaboton {
        padding: 9px 25px;
        color: white;
        background: linear-gradient(to right, #022969, #011535);
        border: none;
        width: 12vh;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }

    .altaboton:hover {
        background: white;
        color: #043689;
        font-size: 2.5vh;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body::-webkit-scrollbar {
        width: 12px;
    }

    body::-webkit-scrollbar-track {
        background: #120c2b;
    }

    body::-webkit-scrollbar-thumb {
        background-color: #022969;
    }

    /* ------------ */

    .inputs {
        font-weight: 300;
        margin-top: 2vh;
    }

    .inputs label {
        margin-bottom: 0vh;
        display: block;
    }

    form {
        display: block;
    }

    .inputforms {
        height: 2vh;
        border-radius: 0.5vh;
        border-style: solid;
        width: 100%;
        padding: 8px;
        padding-right: 1.5vh;
        font-size: 16px;
        background-color: rgba(0, 0, 0, 1);
        color: white;
    }

    .boton {
        margin-top: -2vh;
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 2vh;
        border: none;
        background: linear-gradient(to right, #b41d6e, #043689);
        color: white;
        border-radius: 4vh;
        cursor: pointer;
        transition: 0.5s;
    }

    .boton:hover {
        background: white;
        color: #0444ab;
        font-size: 2.4vh;
        transition: 0.5s;
    }

    #registrarse {
        color: white;
        font-weight: 300;
        font-size: 1.5vh;
        text-align: center;
    }

    .logoutimg {
        height: 4vh;
        margin: 0.6vh;
        margin-right: 0.9vh;
        transition: all 0.3s ease 0s;
    }

    .logoutimg:hover {
        height: 4.5vh;
        filter: grayscale(100%) brightness(50%) sepia(100%) hue-rotate(-50deg) saturate(1000%) contrast(1);
    }

    /* .boton {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 2vh;
        border: none;
        background: linear-gradient(to right, #022969, #011535);
        color: white;
        border-radius: 4vh;
        cursor: pointer;
        transition: 0.5s;
    }

    .boton:hover {
        background: white;
        color: #011535;
        font-size: 2.2vh;
        transition: 0.5s;
    } */


    .logoutboton {
        color: white;
        background: linear-gradient(to right, #022969, #011535);
        border: none;
        border-radius: 4vh;
        cursor: pointer;
        transition: all 0.3s ease 0s;
        margin-right: 5vh;
    }

    .logoutboton:hover {
        color: #043689;
        background: white;
    }

    .buscador {
        margin-left: 6vh;
    }

    .buscador input {
        border-style: solid;
        border-color: white;
        width: 20vh;
        padding: 8px;
        font-size: 16px;
        background-color: rgba(0, 0, 0, 0.4);
        color: #fff;
        border-radius: 4vh;
    }

    .buscador input:focus {
        outline: none;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .buscador button {
        margin-left: -5vh;
        color: white;
        background: linear-gradient(to right, #022969, #011535);
        border: none;
        font-size: 1.8vh;
        font-weight: 500;
        height: 4.5vh;
        width: 10vh;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }

    .buscador button:hover {
        background: white;
        color: #043689;
        font-size: 2vh;
        height: 5vh;
    }

    /* -------------- */


    @media only screen and (max-width: 950px) {
        .column-3 {
            width: 50%;
        }

        header {
            height: 20vh;
            flex-direction: column;
            align-items: center;
        }

        .headerparte1 {
            width: 100%;
        }

        .box {
            width: 70%;
        }

        .popup {
            width: 70%;
        }

        #titulo {
            margin-top: 5vh;
        }

        .alumnos {
            padding-top: 16vh;
        }

        .buscador input {
            background-color: black;
        }

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin: 0 0 1rem 0;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            position: absolute;
            top: 0;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        /*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
        td:nth-of-type(1):before {
            content: "Id";
        }

        td:nth-of-type(2):before {
            content: "DNI";
        }

        td:nth-of-type(3):before {
            content: "Nombre";
        }

        td:nth-of-type(4):before {
            content: "Primer Apellido";
        }

        td:nth-of-type(5):before {
            content: "Segundo apellido";
        }

        td:nth-of-type(6):before {
            content: "Email";
        }

        td:nth-of-type(7):before {
            content: "Telefono";
        }

        td:nth-of-type(8):before {
            content: "Clase";
        }
    }
</style>

</html>