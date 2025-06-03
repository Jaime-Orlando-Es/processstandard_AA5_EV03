<?php
// search_standard.php
// Servicio para buscar estándares en la tabla 'standards' según los parámetros enviados

// Incluir archivo de conexión a la base de datos
require_once 'config.php';

// Verificar que la solicitud sea de tipo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener parámetros de búsqueda
    $machine = $_GET['machine'] ?? '';
    $reference = $_GET['reference'] ?? '';

    try {
        // Construir consulta SQL base
        $sql = "SELECT * FROM standards WHERE 1=1";
        $params = [];

        // Agregar condiciones si hay valores ingresados
        if (!empty($machine)) {
            $sql .= " AND machine LIKE ?";
            $params[] = "%$machine%";
        }

        if (!empty($reference)) {
            $sql .= " AND reference LIKE ?";
            $params[] = "%$reference%";
        }

        // Preparar y ejecutar la consulta
        $stmt = $conexion->prepare($sql);
        $stmt->execute($params);

        // Obtener y retornar los resultados en formato JSON
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);

    } catch (PDOException $e) {
        // Manejo de errores
        echo json_encode(['error' => '❌ Error al buscar estándares: ' . $e->getMessage()]);
    }
} else {
    // Método no permitido
    echo json_encode(['error' => '❌ Solo se permite el método GET']);
}
?>