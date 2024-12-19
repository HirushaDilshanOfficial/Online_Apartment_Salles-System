<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    
    // Debug information
    error_log("Login attempt - NIC: $nic, User Type: $user_type");
    
    if (empty($user_type)) {
        $_SESSION['error'] = "Please select a user type.";
        header("Location: Login.php");
        exit();
    }
    
    if ($user_type === 'seller') {
        // Seller login logic
        $sql = "SELECT * FROM seller WHERE NIC = ?";
        $stmt = $con->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if ($user['password'] === $password) {
                    $_SESSION['Email'] = $user['email'];
                    $_SESSION['user_type'] = 'seller';
                    $_SESSION['NIC'] = $nic;
                    $_SESSION['username'] = $user['username'];
                    
                    header("Location: sellerDashboard.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Invalid password for buyer account.";
                }
            } else {
                $_SESSION['error'] = "NIC not found for buyer account.";
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = "Database error for buyer login.";
        }
    } 
    else {
        // Buyer login logic
        $sql = "SELECT * FROM buyers WHERE NIC = ?";
        $stmt = $con->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if ($user['password'] === $password) {
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['user_type'] = 'buyer';
                    $_SESSION['NIC'] = $nic;
                    $_SESSION['username'] = $user['username'];
                    
                    header("Location: insert_N.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Invalid password for buyer account.";
                }
            } else {
                $_SESSION['error'] = "NIC not found for buyer account.";
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = "Database error for buyer login.";
        }
    }
    
    header("Location: Login.php");
    exit();
}
?>
