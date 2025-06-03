<?php
// register.php

// Incluir la conexión a la base de datos
require_once 'config.php';

// Verificar si se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos enviados
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validar que no estén vacíos
    if (empty($usuario) || empty($contrasena)) {
        echo json_encode(['error' => '⚠️ Usuario y contraseña son requeridos']);
        exit;
    }

    // Encriptar la contraseña
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    try {
        // Preparar consulta para insertar el usuario
        $stmt = $conexion->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $stmt->execute([$usuario, $contrasenaHash]);

        echo json_encode(['mensaje' => '✅ Usuario registrado correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => '❌ Error al registrar: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => '❌ Solo se permite método POST']);
}
?>