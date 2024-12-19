<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="Account.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="header">
            <h1>User</h1>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <div class="profile-section" style="display: flex; justify-content: center; align-items: center; height: 200px;">
            <div class="profile-image">
                <img src="profilephoto.jpg" alt="Profile photo" style="border:2px ; width: 250px; height: 200px;">
            </div>
            <div class="profile-details">
                <h2>Hiruni Fernando</h2>
                <table border="1">
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
                <form action="update_profile.php" method="post">
                    <input type="text" name="username" placeholder="User Name">
                    <input type="email" name="email" placeholder="Email">
                    <button type="submit">Update</button>
                </form>
            </div>
            <div class="change-password">
                <h3>Change Password</h3>
                <form action="update_password.php" method="post">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                    <button type="submit">Update</button>
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
