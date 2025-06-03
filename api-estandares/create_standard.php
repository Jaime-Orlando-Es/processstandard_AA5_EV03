<?php
// create_standard.php
// Servicio para registrar un nuevo estándar en la tabla 'standards'

// Incluir archivo de conexión a la base de datos
require_once 'config.php';

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener datos enviados por el formulario
    $machine = $_POST['machine'] ?? '';
    $reference = $_POST['reference'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($machine) || empty($reference)) {
        echo json_encode(['error' => '⚠️ Los campos "machine" y "reference" son obligatorios']);
        exit;
    }

    try {
        // Preparar la consulta SQL para insertar el nuevo estándar
        $stmt = $conexion->prepare("INSERT INTO standards (machine, reference) VALUES (?, ?)");
        $stmt->execute([$machine, $reference]);

        // Confirmación de inserción exitosa
        echo json_encode(['message' => '✅ Estándar registrado exitosamente']);
    } catch (PDOException $e) {
        // Manejo de errores en la base de datos
        echo json_encode(['error' => '❌ Error al registrar el estándar: ' . $e->getMessage()]);
    }

} else {
    // Método no permitido
    echo json_encode(['error' => '❌ Solo se permite el método POST']);
}
?>