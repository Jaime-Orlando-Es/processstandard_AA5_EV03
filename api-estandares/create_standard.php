<?php
// create_standard.php

// Include database connection
require_once 'config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive input data
    $machine = $_POST['machine'] ?? '';
    $reference = $_POST['reference'] ?? '';

    // Validate input
    if (empty($machine) || empty($reference)) {
        echo json_encode(['error' => '⚠️ Machine and reference are required']);
        exit;
    }

    try {
        // Prepare the SQL statement to insert the new standard
        $stmt = $conexion->prepare("INSERT INTO standards (machine, reference) VALUES (?, ?)");
        $stmt->execute([$machine, $reference]);

        echo json_encode(['message' => '✅ Standard registered successfully']);
    } catch (PDOException $e) {
        echo json_encode(['error' => '❌ Error registering standard: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => '❌ Only POST method is allowed']);
}
?>