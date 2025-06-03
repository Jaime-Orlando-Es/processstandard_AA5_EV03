<?php
// config.php
// ✅ Configuración de conexión a base de datos con PDO (MAMP)

// Parámetros de conexión a la base de datos
$host = '127.0.0.1';
$port = 8889; // Puerto por defecto de MySQL en MAMP
$db   = 'api_usuarios'; // Nombre de la base de datos
$user = 'root';
$pass = 'JE5628'; // Contraseña

try {
    // Crear conexión PDO
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);

    // Activar el modo de errores por excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexión exitosa (comentado por defecto)
    // echo "✅ Conexión establecida correctamente";
} catch (PDOException $e) {
    // Manejo de error si la conexión falla
    die("❌ Error de conexión: " . $e->getMessage());
}
?>