<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NIC = $_POST['NIC'];
    $password = $_POST['password'];

    //query to check user credentials
    $sql = "SELECT * FROM managers WHERE NIC = '$NIC'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        //password check 
        if ($password === $user['password']) {
            $_SESSION['NIC'] = $user['NIC'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid manager login  credentials, please try again.";
        }
    } else {
        $error = "Invalid manager login credentials, please try again.";
    }
}
?>