<?php
// config.php

// Conexión usando socket de MAMP (recomendado en Mac)
$dsn = 'mysql:host=localhost;dbname=api_usuarios;port=8889;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
$user = 'root';
$pass = 'JE5628';

try {
    // Crear conexión PDO
    $conexion = new PDO($dsn, $user, $pass);

    // Establecer el modo de errores a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "✅ Conexión establecida correctamente";

} catch (PDOException $e) {
    // Mostrar error si falla la conexión
    die("❌ Error en la conexión: " . $e->getMessage());
}
?>