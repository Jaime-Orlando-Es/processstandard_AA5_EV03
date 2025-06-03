<?php
// register_standard.php
// Servicio para registrar un nuevo estándar en la tabla 'standards'

// Incluir archivo de conexión a la base de datos
require_once 'config.php';

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener valores desde la solicitud
    $machine = $_POST['machine'] ?? '';
    $reference = $_POST['reference'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($machine) || empty($reference)) {
        echo json_encode(['error' => '⚠️ Los campos "machine" y "reference" son obligatorios']);
        exit;
    }

    try {
        // Preparar y ejecutar la inserción del nuevo registro
        $stmt = $conexion->prepare("INSERT INTO standards (machine, reference) VALUES (?, ?)");
        $stmt->execute([$machine, $reference]);

        echo json_encode(['message' => '✅ Estándar registrado correctamente']);
    } catch (PDOException $e) {
        // Manejo de errores de base de datos
        echo json_encode(['error' => '❌ Error al registrar el estándar: ' . $e->getMessage()]);
    }
} else {
    // Solicitud inválida
    echo json_encode(['error' => '❌ Solo se permite el método POST']);
}
?>