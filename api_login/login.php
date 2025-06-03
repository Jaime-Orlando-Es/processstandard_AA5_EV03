<?php
// login.php

// Incluir archivo de conexión
require_once 'config.php';
var_dump($_POST);

// Verificar si es método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos enviados
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($usuario) || empty($contrasena)) {
        echo json_encode(['error' => '⚠️ Usuario y contraseña son requeridos']);
        exit;
    }

    try {
        // Consultar si el usuario existe
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar contraseña
        if ($user && password_verify($contrasena, $user['contrasena'])) {
            echo json_encode(['mensaje' => '✅ Autenticación exitosa']);
        } else {
            echo json_encode(['error' => '❌ Usuario o contraseña incorrectos']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => '❌ Error en la autenticación: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => '❌ Solo se permite método POST']);
}
?>