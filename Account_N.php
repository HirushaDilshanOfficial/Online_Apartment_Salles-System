<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Update the profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check which form was submitted
    if (isset($_POST['update_profile'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        if (!empty($username) && !empty($email)) {
            // Update user information in the database
            $query = "UPDATE buyers SET full_name = ?, email = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $username, $email, $user_id);
            if ($stmt->execute()) {
                header("Location: display_n.php?success=1");
                exit();
            } else {
                echo "Error updating profile";
            }
        } else {
            echo "Please fill in all fields";
        }
    }

    // Update the password
    if (isset($_POST['update_password'])) {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Update password in the database
            $query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $hashed_password, $user_id);
            if ($stmt->execute()) {
                header("Location: display_n.php?password_success=1");
                exit();
            } else {
                echo "Error updating password";
            }
        } else {
            echo "Passwords do not match";
        }
    }
}
?>
