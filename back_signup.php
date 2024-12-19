<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

// Retrieve input values from POST request
$nic = $_POST['NIC']; // Ensure the name matches the input field
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $first_name . $last_name; // Generate a username based on names
$contact_no = $_POST['phone_number'];
$password = $_POST['password'];
$user_type = $_POST['user_type']; // Retrieve user_type from POST

// Prepare SQL statement based on user type
if ($user_type == 'buyer') {
    $sql = "INSERT INTO buyers (NIC, first_name, last_name, email, username, phone_number, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
} elseif ($user_type == 'seller') {
    $sql = "INSERT INTO seller (NIC, first_name, last_name, email, username, phone_number, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
} else {
    die("Invalid user type");
}

$stmt = $con->prepare($sql);

// Check for successful preparation
if ($stmt === false) {
    die("Error preparing statement: " . $con->error);
}

$stmt->bind_param("sssssss", $nic, $first_name, $last_name, $email, $username, $contact_no, $password); // Ensure all types are strings

if ($stmt->execute()) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error; // Use $stmt->error for more relevant error messages
}

$stmt->close();
$con->close();

?>
