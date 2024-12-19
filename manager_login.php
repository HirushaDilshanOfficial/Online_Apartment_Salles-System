<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="login-page">
        <div class="form-box login">
            <h2>Manager Login</h2>
            <form id="loginForm" method="POST" action="W_login.php" onsubmit="return validateLoginForm()">
                <div class="input-box">
                    <label>NIC</label>
                    <input type="text" id="NIC" name="NIC"  required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" id="password" name="password"  required>
                </div>
                <label>
                    <input type="checkbox" name="remember">Remember me  
                </label>
                <a href="forgot_password.php" class="forgot-password">Forgot password</a>
                <button type="submit" id="submit" class="submit">Login</button>
                <p id="error-msg" class="error-msg"></p>
            </form>
        </div>
    </div>
    <!--<script src="js/script.js"></script>-->

    <?php include 'footer.php'; ?>

</body>

</html>
