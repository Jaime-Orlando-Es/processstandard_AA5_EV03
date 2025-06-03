<?php
// get_standards.php

// Include database connection
require_once 'config.php';

try {
    // Prepare and execute the query to retrieve all standards
    $stmt = $conexion->query("SELECT * FROM standards");

    // Fetch all records as an associative array
    $standards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data in JSON format
    echo json_encode($standards);
} catch (PDOException $e) {
    echo json_encode(['error' => '❌ Error retrieving standards: ' . $e->getMessage()]);
}
?>