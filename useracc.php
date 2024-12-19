<!DOCTYPE html>
<html>
<head>
    <title>User Account</title>  
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<?php
require 'config.php'; // Database connection

// Assuming user is logged in and you have a session storing the username or NIC
session_start();

// Example: storing the logged-in username in the session
$loggedInUsername = $_SESSION['username']; // Assuming username is stored in session after login

// Fetch user information from the database
$sql = "SELECT * FROM buyers WHERE username = ?";
if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("s", $loggedInUsername);  // Bind the username
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();  // Fetch user data
    } else {
        echo "User not found.";
    }
    
    $stmt->close();
} else {
    echo "Error: " . $con->error;
}
$con->close();
?>


<!-- User details -->
<div class="details" style="height: 150px">
    <img src="images/user.png" width="200px" height="200px">
    <input type="file">

    <div class="name" name = "username" style="width:1300px; height:150px; float:right">
        <br><br><h2>User Name: <?php echo htmlspecialchars($user['Username']); ?></h2>
    </div>

    <div class="log-out">
        <a href="editacc.html" class="edit-btn">Edit profile</a>
        <a href="#" class="delete-btn">Delete</a>
        <a href="logout.php" class="logout-btn">Log out</a>
    </div>
</div>

<!-- Account Information -->
 <?php
$username = $_SESSION['username'];
$sql = "SELECT NIC, first_name, last_name, email, phone_number FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();

// Get admin details or use default values
$user_NIC = $user['NIC'] ?? 'No NIC provided';
$user_fname = $user['fname'] ?? 'Unknown';
$user_lname = $user['lname'] ?? 'Unknown';
$user_email = $user['email'] ?? 'No email provided';
$user_no = $user['no'] ?? 'Unknown';
?>
<?php

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Simulate deletion logic
    // Here, you'd normally run the database query to delete the user's account
    // Example: 
    // $userId = $_SESSION['user_id']; 
    // $query = "DELETE FROM users WHERE id = $userId";
    // mysqli_query($conn, $query);

    echo "<script>alert('Account deleted successfully.'); window.location.href = 'index.php';</script>"; // Redirect to homepage
} else {
    echo "No action taken.";
}

?>
