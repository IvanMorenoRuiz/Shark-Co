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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharks&Co</title>
    <link rel="shortcut icon" href="./src/LOGO/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
     <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const form = document.querySelector('form');
            const dniInput = document.getElementById('dni_alu');
            const nombreInput = document.getElementById('nombre_alu');
            const apellidoInput = document.getElementById('apellido_alu');
            const submitButton = document.querySelector('.boton');

            form.addEventListener('submit', function (event) {
                let hasError = false;

                if (!/^\d{8}[A-Z]$/.test(dniInput.value)) {
                    dniInput.nextElementSibling.innerHTML = 'Número de DNI incorrecto.';
                    hasError = true;
                } else {
                    dniInput.nextElementSibling.innerHTML = '';
                }

                if (!/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/.test(nombreInput.value)) {
                    nombreInput.nextElementSibling.innerHTML = 'Introduce el nombre.';
                    hasError = true;
                } else {
                    nombreInput.nextElementSibling.innerHTML = '';
                }

                if (!/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/.test(apellidoInput.value)) {
                    apellidoInput.nextElementSibling.innerHTML = 'Introduce el apellido.';
                    hasError = true;
                } else {
                    apellidoInput.nextElementSibling.innerHTML = '';
                }

                if (hasError) {
                    event.preventDefault(); // Evita que el formulario se envíe si hay errores
                    submitButton.disabled = true; // Deshabilita el botón si hay errores
                }
            });

            // Habilitar el botón si los campos son válidos nuevamente
            dniInput.addEventListener('input', enableButton);
            nombreInput.addEventListener('input', enableButton);
            apellidoInput.addEventListener('input', enableButton);

            function enableButton() {
                submitButton.disabled = false; // Habilitar el botón cuando se corrija un campo inválido
            }
        });
    </script>
</head>

<body>
    <header class="flex">
        <div class="nav">
            <a href="./alumnos.php"><img class="nav-logo" src="./src/LOGO/LOGO NOMBRE SHARKANDCO.png" alt=""></a>
     
        </div>
    </header>
    <div class="flex" id="oscuro">
        <div class="container">
            <h2 id="titulo">Formulario Editar Alumno</h2>

            <form action="./inc/editaralumnos.php" method="POST">

                <div class="inputs">
                <input type="text" hidden name="num_matricula" value="<?php echo $_GET['num_matricula'] ?>" id="num_matricula" class="form-control nota" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <label for="dni_alu">DNI:</label>
                    <input type="text" name="dni_alu" id="dni_alu" class="form-control nombre_alu" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $_GET['dniAlu']; ?>">
                 <p></p>
                </div>

                <div class="inputs">
                    <label for="nombre_alu">Nombre:</label>
                    <input type="text" name="nombre_alu" id="nombre_alu" class="form-control inputforms" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $_GET['nombre_alu']; ?>">
                    <p></p>

                </div>

                <div class="inputs">
                    <label for="apellido_alu">Apellidos:</label>
                    <input type="text" name="apellido_alu" id="apellido_alu" class="form-control inputforms" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $_GET['apellidoAlu']; ?>">
                    <p></p>

                </div>

                <button type="submit" class="boton">Confirmar</button>
            </form>
        </div>
    </div>
</body>

</html>


<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Rubik', sans-serif;
    }

    html {
        color: white;
        font-family: 'Rubik', sans-serif;
    }

    body::before {
        content: "";
        position: fixed;
        height: 100vh;
        width: 100%;
        background: url(./src/FONDOCOLOR2.jpg);
        background-size: cover;
        z-index: -1;
    }

    header {
        background-image: linear-gradient(rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 100%);
        height: 20vh;
    }

    .nav img {
        height: 12vh;
    }

    .container {
        margin-top: -5vh;
        height: fit-content;
        width: 400px;
        padding: 4vh;
        padding-bottom: 2vh;
        background-color: rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        animation: fade-in 1s ease-in-out;
        border-radius: 4vh;
    }

    .container .boton {
        margin-top: 3vh;
        margin-bottom: 2vh;
    }

    #titulo {
        font-weight: 500;
        font-size: 3.5vh;
    }

    #oscuro {
        margin-top: 0vh;
        height: 80vh;
        background-color: rgba(0, 0, 0, 0.4);
    }

    @keyframes fade-in {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .container h2 {
        text-align: center;
        margin-top: 0;
    }

    .inputs {
        margin-top: 2vh;
        margin-right: 2vh;
    }

    .inputs label {
        margin-bottom: 1vh;
    }

    .inputs label {
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: none;
        background-color: rgba(0, 0, 0, 0.4);
        color: #fff;
        border-radius: 4px;
    }

    .form-control:focus {
        outline: none;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .boton {
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
        transition: 0.5s;
        font-size: 2.3vh;
    }

    #registrarse {
        color: white;
        font-weight: 300;
        font-size: 1.5vh;
        text-align: center;
    }

    .alert-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 20px;
    }

    .alert {
        display: none;
        margin-top: 10px;
        padding: 10px;
        background-color: #ff3333;
        color: #fff;
        border-radius: 4px;
        text-align: center;
    }

    .show {
        display: block;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
    }

    .modal-contenido {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        position: relative;
    }

    .cerrar {
        color: rgba(0, 0, 0, 0.8);
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .cerrar:hover,
    .cerrar:focus {
        color: rgba(0, 0, 0, 0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .btn-continuar {
        display: none;
    }

    .btn-cerrar {
        display: none;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column-2 {
        width: 50%;
        float: left;
    }

    @media only screen and (max-width: 780px) {

        header {
            height: 15vh;
        }

        #oscuro {
            height: 85vh;
        }

        #titulo {
            font-size: 2.8vh;
        }

        .nav img {
            height: 6vh;
        }

        .container {
            width: 290px;
            padding: 4vh;
            padding-bottom: 2vh;
        }

        .column-2 {
            width: 50%;
        }

    }
</style>

</html>