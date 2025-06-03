<?php
// config.php
// Configuración de conexión a la base de datos process_standard (MAMP - Mac)

// Conexión usando socket de MAMP
$dsn = 'mysql:host=localhost;dbname=process_standard;port=8889;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock';
$user = 'root';
$pass = 'JE5628'; // contraseña

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