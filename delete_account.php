<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';
require 'config.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    if (empty($user_type)) {
        $error = "Please select a user type.";
    } else {
        $table = ($user_type === 'seller') ? 'seller' : 'buyers';
        
        $sql = "SELECT * FROM $table WHERE NIC = ?";
        $stmt = $con->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if ($user['password'] === $password) {
                    // Delete the account
                    $delete_sql = "DELETE FROM $table WHERE NIC = ?";
                    $delete_stmt = $con->prepare($delete_sql);
                    
                    if ($delete_stmt) {
                        $delete_stmt->bind_param("s", $nic);
                        if ($delete_stmt->execute()) {
                            $success = "Your account has been successfully deleted.";
                            // Clear any existing session
                            session_unset();
                            session_destroy();
                        } else {
                            $error = "Error deleting account. Please try again.";
                        }
                        $delete_stmt->close();
                    } else {
                        $error = "Database error. Please try again.";
                    }
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "NIC not found.";
            }
            $stmt->close();
        } else {
            $error = "Database error. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Delete Account</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #ecf0f1;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        main {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .delete-account-form h2 {
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        select {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
        }

        .delete-btn {
            background-color: var(--error-color);
            color: white;
            border: none;
            padding: 0.8rem;
            width: 100%;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .error-message, .success-message {
            text-align: center;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .error-message {
            background-color: #fadbd8;
            color: var(--error-color);
        }

        .success-message {
            background-color: #d4edda;
            color: var(--success-color);
        }

        .back-to-login {
            text-align: center;
            margin-top: 1rem;
        }

        .back-to-login a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <main>
        <div class="delete-account-form">
            <h2>DELETE MY ACCOUNT</h2>
            <?php
            if (!empty($error)) {
                echo '<div class="error-message">' . htmlspecialchars($error) . '</div>';
            }
            if (!empty($success)) {
                echo '<div class="success-message">' . htmlspecialchars($success) . '</div>';
            }
            ?>
            <form action="delete_account.php" method="POST">
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
                <button type="submit" class="delete-btn">DELETE MY ACCOUNT</button>
            </form>
            <div class="back-to-login">
                <a href="Login.php">Back to Login</a>
            </div>
        </div>
    </main>
</div>
<?php include 'footer.php'; ?>
</body>
</html>