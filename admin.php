<?php
session_start();ini_set('disp

lay_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

// Check if user is logged in, else redirect
if (!isset($_SESSION['NIC'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch admin data using basic query
$admin_id = $_SESSION['NIC'];
$sql = "SELECT NIC, username, email FROM admin WHERE NIC = '$admin_id'";
$result = $con->query($sql);
$admin = $result->fetch_assoc();

// Get admin details or use default values
$admin_name = $admin['username'] ?? 'Unknown';
$admin_email = $admin['email'] ?? 'No email provided';
$admin_work_id = $admin['NIC'] ?? 'No ID provided';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Admin Dashboard</title>
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    
<?php  include 'admin_header.php';?>
    <main>
        <div class="admin-profile">
            <div class="admin-header">
                <h2>Admin</h2>
                <form method="POST" action="admin_logout.php">
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
            <div class="profile-pic"></div>
            <h3 class="admin-name"><?php echo $admin_name; ?></h3>
            <table>
                <tr><th>Work ID</th><th>Name</th><th>Email</th></tr>
                <tr>
                    <td><?php echo $admin_work_id; ?></td>
                    <td><?php echo $admin_name; ?></td>
                    <td><?php echo $admin_email; ?></td>
                </tr>
            </table>
            <h4>Edit Profile</h4>
            <form method="POST" action="backend_admin.php">
                <input type="text" name="work_id" placeholder="Work ID" >
                <input type="text" name="username" placeholder="User Name" >
                <input type="email" name="email" placeholder="Email" >
                <button type="submit" name="update_admin">Update</button>
            </form>
        </div>

        <div class="content">
            <h2>Administrator</h2>
            <hr>
            
            <?php
            // Seller data
            echo "<h3>Seller Data</h3>";
            $sql = "SELECT NIC, username, Email, phone_number FROM seller";
            $result = $con->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>NIC</th><th>Username</th><th>Email</th><th>Contact No</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["NIC"]."</td>"."<td>".$row["username"]."</td>"."<td>".$row["Email"]."</td>"."<td>".$row["phone_number"]."</td>";
                    echo "<tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Seller Data Available</p>";
            }

            // Buyer data
            echo "<h3>Buyer Data</h3>";
            $sql = "SELECT NIC, username, email, phone_number FROM buyers";
            $result = $con->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>NIC</th><th>Username</th><th>Email</th><th>Contact No</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["NIC"]."</td>"."<td>".$row["username"]."</td>"."<td>".$row["email"]."</td>"."<td>".$row["phone_number"]."</td>";
                    echo "<tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Buyer Data Available</p>";
            }
            ?>
            
            <!-- Forms for Updating Seller and Buyer Data -->
            <div class="form-group">
                <div class="form-column">
                    <h4>Seller Data Update</h4>
                    <form method="POST" action="backend_admin.php">
                        <input type="text" name="nic" placeholder="NIC" required>
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="contact" placeholder="Contact no">
                        <button type="submit" name="update_seller">Update</button>
                    </form>
                </div>
                
                <div class="form-column">
                    <h4>Buyer Data Update</h4>
                    <form method="POST" action="backend_admin.php">
                        <input type="text" name="nic" placeholder="NIC" required>
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="contact" placeholder="Contact no">
                        <button type="submit" name="update_buyer">Update</button>
                    </form>
                </div>

                <div class="form-column">
                    <h4>Create Manager Account</h4>
                    <form method="POST" action="backend_admin.php">
                        <input type="text" name="nic" placeholder="Work ID" required>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" name="create_manager">Create</button>
                    </form>
                </div>
            </div>

            <p>Do you want to delete user/buyer/manager accounts? <a href="delete.php">Delete</a></p>
        </div>
    </main>

    <?php include 'admin_footer.php'; ?> 

    
    <?php
    $con->close();
    ?>
</body>
</html>