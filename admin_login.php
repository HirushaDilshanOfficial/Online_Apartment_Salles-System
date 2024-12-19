<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Admin Login</title>
    <link rel="stylesheet" href="css/admin_login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <?php include 'admin_header.php';?>
    <main>
        <div class="login-container">
            <h2>Admin Login</h2>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

            <form id="loginForm" action="backend_admin_login.php" method="POST">
                <input type="text" id="workId" name="NIC" placeholder="NIC" required>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <div class="form-footer">
                    <label>
                        <input type="checkbox" id="rememberMe">
                        Remember me
                    </label>
                    <a href="forgot_password.php" class="forgot-password">Forgot password</a>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Login</button>
            </form>
        </div>
    </main>

    <?php include 'admin_footer.php'; ?> 

</body>
</html>