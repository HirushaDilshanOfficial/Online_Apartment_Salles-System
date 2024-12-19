<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Sign Up</title>
    <link rel="stylesheet" href="css/sign up.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>

<?php
include 'header.php';
?>
    <div class="container">
        <main>
            <div class="signup-form">
                <h2>SIGN UP</h2>
                <form action="back_signup.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="NIC" placeholder="NIC" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone_number" placeholder="Contact no" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <select name="user_type" required>
                            <option value="">Select Type</option>
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                        </select>
                    </div>
                    <button type="submit" class="signup-btn">SIGN UP</button>
                </form>
                <div class="login-link">
                    Already have an account? <a href="login.php">Login</a>
                </div>
                <div class="terms">
                    <a href="Terms&Conditions.php">Terms & Conditions</a> | <a href="privacy.php">Privacy</a>
                </div>
            </div>
        </main>
    </div>

<?php
include 'footer.php';
?>
</body>
</html>
