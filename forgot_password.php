<?php
session_start();

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];  

    // Choose the table based on the user type
    switch ($user_type) {
        case 'admin':
            $sql = "SELECT * FROM admin WHERE NIC = '$nic' AND email = '$email'";
            break;
        case 'manager':
            $sql = "SELECT * FROM managers WHERE NIC = '$nic' AND Email = '$email'";
            break;
        case 'seller':
            $sql = "SELECT * FROM seller WHERE NIC = '$nic' AND email = '$email'";
            break;
        case 'buyer':
            $sql = "SELECT * FROM buyers WHERE NIC = '$nic' AND email = '$email'";
            break;
        default:
            $error = "Invalid user type";
            break;
    }

    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        // Redirect to reset password page if details match
        $_SESSION['reset_nic'] = $nic;
        $_SESSION['user_type'] = $user_type;  // Save user type in session
        header("Location: reset_password.php");
        exit();
    } else {
        $error = "Invalid NIC or Email";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot_password.css">
</head>
<body>
    <main>
        <h2>Forgot Password</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form action="forgot_password.php" method="POST">
            <input type="text" name="nic" placeholder="NIC" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="user_type" class="select" required>
                <option value="" disabled selected>Select User Type</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="seller">Seller</option>
                <option value="buyer">Buyer</option>
            </select>
            <button type="submit">Submit</button>
            <a href="admin_login.php" class="back">BACK</a>
        </form>
    </main>
</body>
</html>
