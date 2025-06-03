<?php
// config.php

// Database connection parameters
$host = '127.0.0.1';
$port = 8889; // Default MAMP MySQL port
$db   = 'api_usuarios'; // Replace with your actual database name if different
$user = 'root';
$pass = 'JE5628'; // Replace with your actual password

try {
    // Create PDO connection
    $conexion = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);

    // Set error mode to exceptions
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "✅ Connection established successfully";
} catch (PDOException $e) {
    // Show error if connection fails
    die("❌ Connection error: " . $e->getMessage());
}
?>