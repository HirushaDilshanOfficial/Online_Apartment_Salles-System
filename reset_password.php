<?php
session_start();

require 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (!isset($_SESSION['reset_nic']) || !isset($_SESSION['user_type'])) {
    header("Location: forgot_password.php");
    exit();
}

$error = null; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($newPassword == $confirmPassword) {
        $nic = $_SESSION['reset_nic'];
        $user_type = $_SESSION['user_type'];

        // Store the password without encryption
        $plainPassword = $newPassword;

        switch ($user_type) {
            case 'admin':
                $sql = "UPDATE admin SET password = '$plainPassword' WHERE NIC = '$nic'";
                break;
            case 'manager':
                $sql = "UPDATE managers SET password = '$plainPassword' WHERE NIC = '$nic'";
                break;
            case 'seller':
                $sql = "UPDATE seller SET password = '$plainPassword' WHERE NIC = '$nic'";
                break;
            case 'buyer':
                $sql = "UPDATE buyers SET password = '$plainPassword' WHERE NIC = '$nic'";
                break;
            default:
                $error = "Invalid user type";
                break;
        }

        if ($con->query($sql) === TRUE) {
            // Unset session variables
            unset($_SESSION['reset_nic']);
            unset($_SESSION['user_type']);
        
            // Redirect to appropriate login page based on user type
            switch ($user_type) {
                case 'admin':
                    $login_page = 'admin_login.php';
                    break;
                case 'manager':
                    $login_page = 'manager_login.php';
                    break;
                case 'seller':
                    $login_page = 'seller_login.php';
                    break;
                case 'buyer':
                    $login_page = 'buyer_login.php';
                    break;
                default:
                    $login_page = 'index.php'; // fallback page
                    break;
            }
        
            echo "<script>alert('Password updated successfully'); window.location.href = '$login_page';</script>";
            exit();
        }
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/forgot_password.css">
    <script src="reset.js" defer></script>
</head>
<body>
    <main>
        <h2>Reset Password</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form action="reset_password.php" method="POST"  onsubmit="checkPassword();">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Reset Password</button>
            <a href="forgot_password.php" class="back">BACK</a>
        </form>
    </main>
</body>
</html>
