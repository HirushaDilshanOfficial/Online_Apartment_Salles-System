<?php
session_start();
session_destroy(); // Destroy the current session
header("Location: Login.php"); // Redirect to login page
exit();
?>