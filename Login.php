<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Sign In</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';
?>
<div class="container">
    <main>
        <div class="login-form">
            <h2>SIGN IN</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="error-message">' . htmlspecialchars($_SESSION['error']) . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form action="back_login.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nic" placeholder="NIC Number" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <select name="user_type" required>
                        <option value="">Select Type</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                    <a href="forgot_password.php">Forgot My Password</a>
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
            <div class="manager-admin-login">
                <a href="manager_login.php">Manager Login</a> | <a href="admin_login.php">Admin Login</a> | <a href="delete_account.php" class="delete-btn">Delete My Account</a>
            </div>
            <div class="signup-link">
                Still don't have an account? <a href="signup.php">Sign Up</a>
            </div>
            <div class="delete-account">
                
            </div>
            <div class="terms">
                <a href="">Terms & conditions</a> | <a href="privacy.php">Privacy</a>
            </div>
        </div>
    </main>
</div>
<?php include 'footer.php'; ?>
</body>
</html>