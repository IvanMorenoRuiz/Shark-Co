<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contrasena = $_POST['contrasena'];
    $hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);
} else {
    $hashContraseña = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor contraseñas cifradas</title>
</head>
<body>
    <h2>Convertidor contraseñas cifradas</h2>

    <form action="contraseñas.php" method="POST">
        <p>Introduce la pwd:</p>
        <br>
        <input type="text" name="contrasena" id="">
        <p></p>
        <input type="submit" value="enviar">
    </form>

    <?php if (!empty($hashContraseña)) { ?>
        <p>Contraseña cifrada: <?php echo $hashContraseña; ?></p>
    <?php } ?>
</body>
</html>
