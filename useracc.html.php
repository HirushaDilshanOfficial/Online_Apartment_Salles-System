<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Make sure session is started
include 'config.php';

$username = $_SESSION['username'];

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT NIC, first_name, last_name, email, phone_number FROM buyers WHERE username = ?");
$stmt->bind_param("s", $username);  // "s" means the username is a string
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

// Get user details or use default values
$user_NIC = $admin['NIC'] ?? 'No NIC provided';
$user_fname = $admin['first_name'] ?? 'Unknown';
$user_lname = $admin['last_name'] ?? 'Unknown';
$user_email = $admin['email'] ?? 'No email provided';
$user_no = $admin['phone_number'] ?? 'Unknown';

$stmt->close();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>User Account</title>  
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/user.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
<body>

    <div class="details" style="height: 150px">
      <img src="images/user.png" width="200px" height="200px">
      <input type="file">
      
      <div class="name" style=" width:1300px; height:150px; float:right">
          <br><br><h2>User Name: <?php echo htmlspecialchars($username); ?></h2> <!-- Safely output username -->
      </div>
  
      <div class="log-out">
          <a href="editacc.html" class="edit-btn">Edit profile</a>
          <a href="#" id="delete_btn" class="delete-btn">Delete</a>
          <a href="logout.php" class="logout-btn">Log out</a>
      </div>
    </div>

    <table>
      <tr>
          <th>NIC</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
      </tr>
      <tr>
          <td><?php echo htmlspecialchars($user_NIC); ?></td>
          <td><?php echo htmlspecialchars($user_fname); ?></td>
          <td><?php echo htmlspecialchars($user_lname); ?></td>
          <td><?php echo htmlspecialchars($user_email); ?></td>
          <td><?php echo htmlspecialchars($user_no); ?></td>
      </tr>
    </table>

    <!-- Add JavaScript for confirmation -->
    <script>
        document.getElementById('delete_btn').addEventListener('click', function(e) {
            if (confirm("Are you sure you want to delete your account?")) {
                window.location.href = "useracc.php?action=delete"; // Redirect to PHP file for deletion
            }
        });
    </script>

    <!-- Footer start -->
</body>
</html>
