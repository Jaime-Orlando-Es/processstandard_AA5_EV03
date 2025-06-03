<?php
// get_standards.php
// Servicio para consultar todos los registros de la tabla 'standards'

// Incluir archivo de conexión a la base de datos
require_once 'config.php';

try {
    // Ejecutar la consulta SQL para obtener todos los estándares
    $stmt = $conexion->query("SELECT * FROM standards");

    // Obtener resultados como arreglo asociativo
    $standards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar los datos en formato JSON
    echo json_encode($standards);

} catch (PDOException $e) {
    // Manejo de errores en la base de datos
    echo json_encode(['error' => '❌ Error al obtener los estándares: ' . $e->getMessage()]);
}
?>