<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="display.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }
        .logout-btn {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        .profile-image img {
            border: 2px solid #ccc;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .profile-details {
            margin-left: 20px;
        }
        .edit-section {
            margin-top: 20px;
        }
        .edit-profile, .change-password {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .feedback {
            margin: 10px 0;
            color: #d9534f; /* Bootstrap danger color */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="header">
            <h1>User Profile</h1>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>

        <div class="profile-section">
            <div class="profile-image">
                <img src="images/girl.jpg" alt="Profile photo">
            </div>
            <div class="profile-details">
                <h2>Hiruni Fernando</h2>
                <table border="1" style="width:100%; border-collapse: collapse;">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>Phone No</th>
                    </tr>
                    <tr>
                        <td>Hiruni Fernando</td>
                        <td>hirufernando@gmail.com</td>
                        <td>1998319918V</td>
                        <td>070 1757176</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="edit-section">
            <div class="edit-profile">
                <h3>Edit Profile</h3>
                <?php if (isset($feedback) && strpos($feedback, "Profile") !== false) echo "<div class='feedback'>$feedback</div>"; ?>
                <form action="display_end.php" method="post">
                    <input type="text" name="username" placeholder="User Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <button type="submit" name="update_profile">Update Profile</button>
                </form>
            </div>
            <div class="change-password">
                <h3>Change Password</h3>
                <?php if (isset($feedback) && strpos($feedback, "Password") !== false) echo "<div class='feedback'>$feedback</div>"; ?>
                <form action="display_end.php" method="post">
                    <input type="password" name="password" placeholder="New Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="submit" name="update_password">Update Password</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
