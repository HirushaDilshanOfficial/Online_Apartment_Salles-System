<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Check what is being received
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // receive all the data
    $nic = isset($_POST['NIC']) ? $_POST['NIC'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $location = isset($_POST['location']) ? $_POST['location'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;

    // Check for null values before executing the insert
    if (is_null($name)) {
        die("Error: Name field is empty.");
    }
    if (is_null($phone)) {
        die("Error: Phone field is empty.");
    }
    if (is_null($email)) {
        die("Error: Email field is empty.");
    }
    if (is_null($location)) {
        die("Error: Location field is empty.");
    }
    if (is_null($message)) {
        die("Error: Message field is empty.");
    }

    // insertion
    $stmt = $con->prepare("INSERT INTO contact_us (NIC, name, phone, email, location, message) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    $stmt->bind_param("ssssss", $nic, $name, $phone, $email, $location, $message);

    if ($stmt->execute()) {
        echo "Contact information submitted successfully.";
        header("Location: contactUs.php?status=success");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
    exit();
} else {
    echo "Invalid request method.";
}
?>
