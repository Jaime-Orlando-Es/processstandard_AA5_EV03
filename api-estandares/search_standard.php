<?php
// search_standard.php

// Include database connection
require_once 'config.php';

// Check if it's a GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get query parameters
    $machine = $_GET['machine'] ?? '';
    $reference = $_GET['reference'] ?? '';

    try {
        // Build base SQL query
        $sql = "SELECT * FROM standards WHERE 1=1";
        $params = [];

        // Add conditions dynamically based on input
        if (!empty($machine)) {
            $sql .= " AND machine LIKE ?";
            $params[] = "%$machine%";
        }

        if (!empty($reference)) {
            $sql .= " AND reference LIKE ?";
            $params[] = "%$reference%";
        }

        // Prepare and execute query
        $stmt = $conexion->prepare($sql);
        $stmt->execute($params);

        // Fetch and return results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    } catch (PDOException $e) {
        echo json_encode(['error' => '❌ Error searching standards: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => '❌ Only GET method is allowed']);
}
?>