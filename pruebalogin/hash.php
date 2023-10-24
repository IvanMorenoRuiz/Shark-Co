<?php
$contrasena = "poiPOI123"; // Reemplaza esto con la contraseña que deseas convertir en hash

$hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);

echo $hashContraseña;