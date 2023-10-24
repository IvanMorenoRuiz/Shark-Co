<?php


$contrasena = $_POST['contrasena']; // Reemplaza esto con la contraseña que deseas convertir en hash

$hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);

echo $hashContraseña;
?>