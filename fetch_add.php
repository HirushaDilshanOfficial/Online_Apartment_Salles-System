<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');  // Set header to return JSON

require 'config.php'; //database connection file

// Ensure no output is sent before or after JSON response
ob_start();  // Start output buffering to capture any potential errors

// Initialize response data
$weeklyData = [];
$monthlyData = [];

// Fetch weekly adds data
$weeklyAddsQuery = "SELECT COUNT(*) as count, WEEK(Date) as week FROM apartments GROUP BY week ORDER BY week";
$weeklyResult = $con->query($weeklyAddsQuery);

// Check if the query is successful
if ($weeklyResult === false) {
    echo json_encode(['error' => 'Error fetching weekly adds data: ' . $con->error]);
    ob_end_flush();  // Flush the buffer
    exit();
}

// Process weekly adds result
while ($row = $weeklyResult->fetch_assoc()) {
    $weeklyData[] = (int)$row['count'];
}

// Fetch monthly adds data
$monthlyAddsQuery = "SELECT COUNT(*) as count, MONTH(Date) as month FROM apartments GROUP BY month ORDER BY month";
$monthlyResult = $con->query($monthlyAddsQuery);

// Check if the query is successful
if ($monthlyResult === false) {
    echo json_encode(['error' => 'Error fetching monthly adds data: ' . $con->error]);
    ob_end_flush();  // Flush the buffer
    exit();
}

// Process monthly adds result
while ($row = $monthlyResult->fetch_assoc()) {
    $monthlyData[] = (int)$row['count'];
}

// Prepare the JSON response
$response = [
    "weekly" => ["data" => $weeklyData],
    "monthly" => ["data" => $monthlyData]
];

// Clear the buffer and output the JSON response
ob_end_clean();
echo json_encode($response);

// Close the database connection
$con->close();
exit();

?>
